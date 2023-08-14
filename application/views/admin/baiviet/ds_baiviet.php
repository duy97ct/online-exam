<div class="row">	
	<div class="col-md-12">	
		<h3>Quản lý bài viết</h3>
	</div>
</div>
<div class="row ">
	<div class="col-md-12 bg-white p-2">
		<div class="form-group">
			<a href="admin/add_baiviet" class="btn btn-success"><i class="fa fa-plus"></i> Thêm bài viết</a>
		</div>
		
		<table class="table table-bordered" id="datatable">
			<thead>
				<td>ID</td>
				<td>Tiêu đề</td>
				<td>Người đăng</td>
				<td>Chuyên mục</td>
				<td>Ngày đăng</td>
				<td>Action</td>
			</thead>
			<tbody>
				<?php $stt=1; foreach($ds_baiviet as $baiviet): ?>
					<tr data-id="<?= $baiviet->get('BV_ID') ?>">
						<td class="text-right"> <?= $stt++; ?> </td>
						<td><a href="admin/edit_baiviet/<?=$baiviet->get('BV_ID') ?>"> <?= $baiviet->get('BV_TIEU_DE') ?> </a></td>
						<td> <?= $baiviet->get_nguoi_tao()->get('U_TEN') ?> </td>
						<td> <?= $baiviet->get_category()->get('CAT_NAME') ?> </td>
						<td> <?= date('d/m/Y',strtotime($baiviet->get('BV_NGAY_DANG'))) ?> </td>
						<td class="text-right" style="min-width: 100px;">
							<button class="btn btn-warning btnSua" type="submit" ><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btnXoa" type="button" ><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<script>
	
	$(document).ready(function(){
		$('#datatable').dataTable({
			language: {
                url: "assets/datatable/Vietnamese.json"
            },
            "iDisplayLength": 25,
            columnDefs: [
		        { type: 'date-uk', targets: 4 }
		    ]
		});
		$('.btnSua').click(function(){
			id = $(this).parents('tr').attr('data-id');
			window.location.replace('admin/edit_baiviet/'+id);
		});
		$('.btnXoa').click(function(){
			Swal.fire({
			  title: 'Xác nhận xóa',
			  text: "Bạn có chắc muốn xóa bài viết này?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  //cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Xóa',
			  cancelButtonText: 'Không xóa',
			}).then((result) => {
			  if (result.value) {
			  	node = $(this);
			    $.ajax({
			    	url: 'admin/del_baiviet/'+$(node).parents('tr').attr('data-id'),
			    	type: 'GET',
			    	dataType: 'JSON',
			    	success:function(result){
			    		$(node).parents('tr').remove();
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
	});
</script>