<div class="row">	
	<div class="col-md-12 form-group">	
		<h3>Quản lý tài khoản</h3>
	</div>
</div>
<div class="row ">
	<div class="col-md-12 form-group">
		<button class="btn btn-success" data-toggle="modal" data-target="#modalAddUser"><i class="fa fa-plus"></i> Thêm tài khoản</button>
	</div>
	<div class="col-md-12 bg-white p-2">
		
		<table class="table" id="datatable">
			<thead>
				<td>STT</td>
				<td>Tài khoản</td>
				<td>Tên</td>
				<td>Mật khẩu</td>
				<td>Trạng thái</td>
				<td>Action</td>
			</thead>
			<tbody>
				<?php $stt=1; foreach($ds_user as $nguoidung): ?>
					<tr data-id="<?= $nguoidung->get('U_USERNAME') ?>">
						<td class="text-right"> <?= $stt++; ?> </td>
						<td> <?= $nguoidung->get('U_USERNAME') ?> </td>
						<td><?= $nguoidung->get('U_TEN') ?></td>
						<td> <a href="javascript:;" class="btn_ChangePass">Đổi mật khẩu</a> </td>
						<td> <?= $nguoidung->get('U_STATUS')==1?'<span class="text-success btnLock">Hoạt động</span>':'<span class="text-danger btnUnlock">Ngừng hoạt động</span>' ?></td>
						<td class="text-right">
							<span class="text-danger btnXoa" type="button" ><i class="fa fa-trash"></i></span>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->view('admin/user/modal_add_user'); ?>
<?php $this->view('admin/user/modal_change_pass'); ?>

<script>
	function reload_maintable(){
		$.ajax({
			url: 'admin/ajax_ds_taikhoan',
			type: 'GET',
			dataType: 'JSON',
			success: function(result){
				console.log(result);
				for(i=0;i<result.length;i++){
					console.log(result[i].data);
				}
			},
			error: function (request, status, error) {
				alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
				console.log(request.responseText, error);
			}
		});
	}
	$(document).ready(function(){
		$('#datatable').dataTable({
			"language": {
                "url": "assets/datatable/Vietnamese.json"
            }
		});
		$('.btnLock').click(function(){
			Swal.fire({
			  title: 'Xác nhận',
			  text: "Bạn có chắc muốn khóa tài khoản này?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  //cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Khóa',
			  cancelButtonText: 'Không khóa',
			}).then((result) => {
			  if (result.value) {
			  	node = $(this);
			    $.ajax({
			    	url: 'admin/lock_user/'+$(node).parents('tr').attr('data-id'),
			    	type: 'GET',
			    	dataType: 'JSON',
			    	success:function(result){

			    		if(result.status == 'success'){
			    			$(node).parents('tr').remove();
				    		Swal.fire(
						      'Đã xóa',
						      result.content,
						      result.status,
						    );
			    		}else{
			    			Swal.fire(
						      'Thất bại',
						      result.content,
						      result.status,
						    );
			    		}
			    		
					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
			    })
			    
			  }
			})

		});
		$('.btnUnlock').click(function(){
			Swal.fire({
			  title: 'Xác nhận',
			  text: "Bạn có chắc muốn mở khóa cho tài khoản này?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  //cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Mở khóa',
			  cancelButtonText: 'Không mở khóa',
			}).then((result) => {
			  if (result.value) {
			  	node = $(this);
			    $.ajax({
			    	url: 'admin/unlock_user/'+$(node).parents('tr').attr('data-id'),
			    	type: 'GET',
			    	dataType: 'JSON',
			    	success:function(result){

			    		if(result.status == 'success'){
			    			$(node).parents('tr').remove();
				    		Swal.fire(
						      'Đã xóa',
						      result.content,
						      result.status,
						    );
			    		}else{
			    			Swal.fire(
						      'Thất bại',
						      result.content,
						      result.status,
						    );
			    		}
			    		
					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
			    })
			    
			  }
			})

		});
		$('.btn_ChangePass').click(function(){
			var row = $(this).parents('tr');
			var id = $(row).attr('data-id');
			$('#hid_username').val(id);
			$('#txt_username').val(id);
			$('#modalChangePass').modal('show');

		});
		$('#frmChangePass').submit(function(e){
			e.preventDefault();
			pass = $(this).find('input[name=new_password]').val();
			pass2 = $(this).find('input[name=new_password2]').val();
			if(pass !== pass2){
				//Truong hop 2 password khac nhau
				alert('Mật khẩu không giống nhau');
				return false;
			}else{
				$.ajax({
					url:$(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize(),
					dataType: 'JSON',
					success: function(result){
						if(result.status == 'success'){
							Swal.fire(
						      'Thành công',
						      result.content,
						      result.status,
						    );
						    $('#modalChangePass').modal('hide');
						}else{
							Swal.fire(
						      'Thất bại',
						      result.content,
						      result.status,
						    );
						}
					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
				})
			}
		});


		$('#frmAddUser').submit(function(e){
			e.preventDefault();
			pass = $(this).find('input[name=new_password]').val();
			pass2 = $(this).find('input[name=new_password2]').val();
			if(pass !== pass2){
				//Truong hop 2 password khac nhau
				alert('Mật khẩu không giống nhau');
				return false;
			}else{
				$.ajax({
					url:$(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize(),
					dataType: 'JSON',
					success: function(result){
						if(result.status == 'success'){
							Swal.fire(
						      'Thành công',
						      result.content,
						      result.status,
						    );
						}else{
							Swal.fire(
						      'Thất bại',
						      result.content,
						      result.status,
						    );
						}
					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
				})
			}
		});

		$('.btnXoa').click(function(){
			Swal.fire({
			  title: 'Xác nhận xóa',
			  text: "Bạn có chắc muốn xóa người dùng này?",
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
			    	url: 'admin/del_user/'+$(node).parents('tr').attr('data-id'),
			    	type: 'GET',
			    	dataType: 'JSON',
			    	success:function(result){

			    		if(result.status == 'success'){
			    			$(node).parents('tr').remove();
				    		Swal.fire(
						      'Đã xóa',
						      result.content,
						      result.status,
						    );
			    		}else{
			    			Swal.fire(
						      'Thất bại',
						      result.content,
						      result.status,
						    );
			    		}
			    		
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