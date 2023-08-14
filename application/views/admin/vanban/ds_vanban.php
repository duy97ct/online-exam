<div class="row">	
	<div class="col-md-12">	
		<h3>Quản lý văn bản</h3>
	</div>
</div>
<div class="row ">
	<div class="col-md-12 bg-white p-2">
		<div class="form-group">
			<button class="btn btn-success" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Thêm văn bản</button>
			<button class="btn btn-info" data-toggle="modal" data-target="#modalAddloaiVB"><i class="fa fa-plus"></i> Thêm loại văn bản</button>
		</div>		
		<table class="table table-bordered" id="datatable">
			<thead>
				<td>Số</td>
				<td>Trích yếu</td>
				<td>Loại</td>
				<td>Cấp</td>
				<td>Ngày ban hành</td>
				<td>URL</td>
				<td>Action</td>
			</thead>
			<tbody>
				<?php if ($ds_vanban == NULL || count($ds_vanban) == 0): ?>
					<tr>
						<td></td>
						<td>Chưa có văn bản</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php else: ?>
					<?php $stt=1; foreach($ds_vanban as $vanban): ?>
						<tr data-id="<?= $vanban->get('VB_ID') ?>">
							<td> <?= $vanban->get('VB_SO') ?> </td>
							<td> <?= $vanban->get('VB_TRICH_YEU') ?> </td>
							<td> <?= $vanban->get('VB_LOAI') ?> </td>
							<td> <?= $vanban->get_cap()->get('VBC_TEN') ?> </td>
							<td> <?= date('d/m/Y', strtotime($vanban->get('VB_NGAY_BAN_HANH'))) ?> </td>
							<td>
								<a href="media/files/<?=$vanban->get('VB_URL')?>"><i class="fa fa-lg fa-download text-success"></i></a>
								<?php if ($vanban->get('VB_URL2') != NULL): ?>
									<br/>
									<a href="media/files/<?=$vanban->get('VB_URL2')?>" class="text-success"><i class="fa fa-lg fa-download"></i></a>
								<?php endif ?>
								<?php if ($vanban->get('VB_URL3') != NULL): ?>
									<br/>
									<a href="media/files/<?=$vanban->get('VB_URL3')?>" class="text-success"><i class="fa fa-lg fa-download"></i></a>
								<?php endif ?>
							</td>
							<td class="text-right" style="min-width: 100px;">
								<button class="btn btn-warning btnSua"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btnXoa"><i class="fa fa-trash"></i></button>

							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif ?>
					
			</tbody>
		</table>
	</div>
</div>
<?php $this->view('admin/vanban/add'); ?>
<?php $this->view('admin/vanban/addloaivb'); ?>
<?php $this->view('admin/vanban/edit'); ?>

<script>
	$(document).ready(function(){
		$('#datatable').treetable({
			expandable: true,
		});
		// var table = $('#datatable').DataTable({
		// 	"language": {
  //               "url": "assets/datatable/Vietnamese.json"
  //           },
  //           "iDisplayLength": 25,
		// });
		$('.btnXoa').on('click', function(){
			node = $(this);
			Swal.fire({
			  title: 'Xác nhận xóa',
			  text: "Bạn có chắc muốn xóa văn bản này?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  //cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Xóa',
			  cancelButtonText: 'Không xóa',
			}).then((result) => {
			  if (result.value) {
			  	
			    $.ajax({
			    	url: 'admin/vanban/xoa',
			    	type: 'POST',
			    	data: {id:$(node).parents('tr').attr('data-id')},
			    	dataType: 'JSON',

			    	success:function(result){
			    		//$(node).parents('tr').remove();
			    		table.row($(node).parents('tr')).remove().draw();
			    		Swal.fire(
					      'Đã xóa',
					      result.message,
					      result.status,
					    );
					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
			    })
			    
			  }
			})
		});

		$('.btnSua').click(function(){
			var row = $(this).parents('tr');
			var id = $(row).attr('data-id');
			$.ajax({
				url:'admin/vanban/get_ajax',
				type:'POST',
				data:{id:id},
				dataType: 'JSON',
				success: function(result){
					console.log(result);
					if(result.status == 'success'){
						$('#mEdit_id').val(id);
						$('#mEdit_so').val(result.content.VB_SO);
						$('#mEdit_trichyeu').val(result.content.VB_TRICH_YEU);
						$('#mEdit_ngaybanhanh').val(result.content.VB_NGAY_BAN_HANH);
						$('#mEdit_loai').val(result.content.VB_LOAI);
						$('#mEdit_cap').val(result.content.VB_CAP);
						$('#mEdit_trangthai').val(result.content.VB_TRANG_THAI);
						$('#mEdit_coquanbanhanh').val(result.content.VB_CO_QUAN_BAN_HANH);
						$('#mEdit_nguoiky').val(result.content.VB_NGUOI_KY);
						$('#mEdit_url').html(result.content.VB_URL);
						$('#mEdit_url2').html(result.content.VB_URL2);
						$('#mEdit_url3').html(result.content.VB_URL3);
						$('#modalEdit').modal('show');
					}
					
				}
			})
		});

		
		$('#frmAddloaiVB').submit(function(e){
			var formData = new FormData($('#frmAddloaiVB')[0]);
			e.preventDefault();
			$.ajax({
				url:$(this).attr('action'),
				type:$(this).attr('method'),
				data: formData,//$(this).serialize(),
				dataType: 'JSON',
				processData: false,
        		contentType: false,
        		cache: false,
				success: function(result){
					$('#modalAddloaiVB').modal('hide');
					if(result.status == 'success'){
						swal.fire('Thành công', result.message, result.status);
						
					}else{
						console.log(result.error);
						swal.fire('Thất bại',result.message, result.status);
					}
				}
			});
		});

		$('#frmAdd').submit(function(e){
			var formData = new FormData($('#frmAdd')[0]);
			e.preventDefault();
			$.ajax({
				url:$(this).attr('action'),
				type:$(this).attr('method'),
				data: formData,//$(this).serialize(),
				dataType: 'JSON',
				processData: false,
        		contentType: false,
        		cache: false,
				success: function(result){
					$('#modalAdd').modal('hide');
					if(result.status == 'success'){
						swal.fire('Thành công', result.message, result.status);
						
					}else{
						console.log(result.error);
						swal.fire('Thất bại',result.message, result.status);
					}
				}
			});
		});


		$('#frmEdit').submit(function(e){
			var formData = new FormData($('#frmEdit')[0]);
			e.preventDefault();
			$.ajax({
				url:$(this).attr('action'),
				type:$(this).attr('method'),
				data: formData,//$(this).serialize(),
				dataType: 'JSON',
				processData: false,
        		contentType: false,
				success: function(result){
					$('#modalEdit').modal('hide');
					if(result.status == 'success'){
						swal.fire('Thành công', result.message, result.status);
						
					}else{
						console.log(result.error);
						swal.fire('Thất bại',result.message, result.status);
					}
				}
			});
		});

		
	});

</script>