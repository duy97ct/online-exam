<div class="row">	
	<div class="col-md-12">	
		<h3>Quản lý Chuyên mục</h3>
	</div>
</div>
<div class="row ">
	<div class="col-md-12 bg-white p-2">
		<div class="form-group">
			<button class="btn btn-success" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-plus"></i> Thêm chuyên mục</button>
		</div>
		
		<table class="table table-bordered" id="datatable">
			<thead>
				<td>ID</td>
				<td>Tên chuyên mục</td>
				<td>Action</td>
			</thead>
			<tbody>
				<?php $stt=1; foreach($ds_category as $category): ?>
					<tr data-id="<?= $category->get('CAT_ID') ?>" data-tt-id="<?= $category->get('CAT_ID') ?>" <?php if($category->get('CAT_PARENT_ID')!= NULL) echo 'data-tt-parent-id="'.$category->get('CAT_PARENT_ID').'"' ?>>
						<td> <?= $category->get('CAT_ID') ?> </td>
						<td> <?= $category->get('CAT_NAME') ?> </td>
						<td class="text-right">
							<button class="btn btn-warning btnSua"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btnXoa"><i class="fa fa-trash"></i></button>

						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->view('admin/category/add_category'); ?>
<?php $this->view('admin/category/edit_category'); ?>

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
			  text: "Bạn có chắc muốn xóa chuyên mục này?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  //cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Xóa',
			  cancelButtonText: 'Không xóa',
			}).then((result) => {
			  if (result.value) {
			  	
			    $.ajax({
			    	url: 'admin/xoa_category',
			    	type: 'GET',
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
				url:'admin/ajax_sua_category',
				type:'POST',
				data:{id:id},
				dataType: 'JSON',
				success: function(result){
					$('#txt_IdEdit').val(result.CAT_ID);
					$('#txt_TenEdit').val(result.CAT_NAME);
					$('#modalEditCategory').modal('show');
				}
			})
		});
		$('#frmEditCategory').submit(function(e){
			e.preventDefault();
			var id = $(this).find('input[name=id]').val();
			var ten = $(this).find('input[name=ten]').val();
			$.ajax({
				url:$(this).attr('action'),
				type:$(this).attr('method'),
				data:$(this).serialize(),
				dataType: 'JSON',
				success: function(result){
					$('#modalEditCategory').modal('hide');
					if(result.status == 'success'){
						swal.fire('Thành công', result.content, result.status);
						$('#datatable').find('tr[data-id='+id+']').find('td:eq(1)').html(ten);
					}else{
						console.log(result.error);
						swal.fire('Thất bại',result.content, result.status);
					}
				}
			})
		});

		
	});

</script>