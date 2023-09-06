
	<!-- Trường hợp trong thời gian thi -->
	<div class="container bg-white pt-3 pb-3">
		<form action="kiemtra_traloicauhoi" method="POST">
			<div class="row">
				<div id="test_status" class="col-md-12">
					<div>
						<ul id="step_tree">
							<li class="li_status_step_1">1. Nhập thông tin cá nhân &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></li>
							<li class="li_status_step_2">2. Trả lời câu hỏi &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></li>
							<li class="li_status_step_3">3. Hoàn thành</li>
						</ul>
					</div>
					
				</div>
			</div>
			<div >
				
			</div>
			<div id="div_part1_info" class="row mt-3">	
				<!-- Thông tin cá nhân -->
				<div class="col-md-12">
					<h3 class="mb-5">Phần thông tin cá nhân</h3>
					<div class="row form-group">
						<div class="col-md-4">
							Họ tên
						</div>
						<div class="col-md-8">
							<input type="text" name="hoten" class="form-control" required="required" style="text-transform: uppercase;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4">
							Số điện thoại
						</div>
						<div class="col-md-8">
							<input type="text" name="sdt" minlength="8" maxlength="11" class="form-control input_number" required="required">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4">
							Giới tính
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-6">
									<input type="radio" name="gioitinh" class="" value="1" checked="checked"> Nam
								</div>
								<div class="col-md-6">
									<input type="radio" name="gioitinh" class="" value="0" > Nữ
								</div>
							</div>
							
							
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4">
							Địa chỉ
						</div>
						<div class="col-md-8">
							<input type="text" name="diachi" class="form-control" required="required">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4">
							Đơn vị
						</div>
						<div class="col-md-8">
							<i>(Trường hợp không có đơn vị thì chọn "Khác" và không gõ thêm tên đơn vị)</i>
							<select id="sel_donvi" name="donvi" class="select2 form-control" required="required">
								<?php foreach ($ds_donvi as $donvi): ?>
									<?php if ($donvi->get('DV_ID')<52): ?>

									<option value="<?=$donvi->get('DV_ID') ?>"><?=$donvi->get('DV_TEN') ?></option>
									<?php endif; ?>
								<?php endforeach ?>
								<option value="57">Khác</option>
							</select>
						</div>
					</div>
					<div id="div_tendonvi" class="row form-group d-none">
						<div class="col-md-4">
							Tên đơn vị
						</div>
						<div class="col-md-8">
							<input id="sel_tendonvi" type="text" name="tendonvi" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" id="btn_next" class="btn btn-warning">Tiếp theo</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		
	</div>
	<style type="text/css">
		#step_tree li{
			float: left;
			padding: 0.3rem 0.6rem;
			margin-right: 10px;
			
		}
	</style>
	<script>
		$(document).ready(function(){
			$('.select2').select2();
			//Đổi màu step1 thành xanh lá cây
			$('.li_status_step_1').addClass('text-success');
			//Khi chọn đơn vị là khác -> bật input nhập tên đơn vị
			$('#sel_donvi').change(function(){
				if($(this).val() == '57' ){
					$('#div_tendonvi').removeClass('d-none');
				}else{
					$('#div_tendonvi').addClass('d-none');
				}
			})
			//Khi nhập hết info nhấn nút tiếp theo -> ẩn form nhập thông tin, bật form trả lời câu hỏi
			$('#btn_next').click(function(e){
				
				//Thông báo nếu chưa nhập liệu
				if($('input[name="hoten"]').val() == ''){
					//bao loi chua nhap ho ten
					alert('Chưa nhập họ tên người tham gia');
					$('input[name="hoten"]').focus();
					e.preventDefault();
					return false;
				}
				if($('input[name="sdt"]').val() == ''){
					//bao loi chua nhap ho ten
					alert('Chưa nhập số điện thoại người tham gia');
					$('input[name="sdt"]').focus();
					e.preventDefault();
					return false;
				}
				if($('input[name="sdt"]').val().length < 9 || $('input[name="sdt"]').val().length > 11){
					//bao loi chua nhap ho ten
					alert('Số điện thoại không hợp lệ, số điện thoại cá nhân phải đủ 10 số ');
					$('input[name="sdt"]').focus();
					e.preventDefault();
					return false;
				}
				if($('input[name="diachi"]').val() == ''){
					//bao loi chua nhap ho ten
					alert('Chưa nhập địa chỉ người tham gia');
					$('input[name="diachi"]').focus();
					e.preventDefault();
					return false;
				}
				
				
				// $([document.documentElement, document.body]).animate({
				// 	scrollTop: $("#div_part2_question").offset(-10).top;
				// }, 2000);
			});
			//Các input nhập số (SĐT) chỉ cho phép nhập số
			$('.input_number').keyup(function(){

				str = $(this).val();
				var regexp = /[0-9]/g;
				var matches_array = str.match(regexp);
				//console.log(str, matches_array);
				$(this).val((matches_array || []).join(''));
			});

			//Khi nhap xong so nguoi moi cho nhan nut hoan thanh


			//Khi form kiểm tra submit -> gửi AJAX
			// $('#frm_kiemtra').submit(function(e){
			// 	//console.log('aaa');
			// 	e.preventDefault();
			// 	$.ajax({
			// 		url: $(this).attr('action'),
			// 		type: $(this).attr('method'),
			// 		data: $(this).serialize(),
			// 		dataType: 'JSON',
			// 		success: function(result){
			// 			swal.fire(
			// 				result.status,
			// 				result.message,
			// 				result.status
			// 			).then(function() {
			// 				//alert('run');
			// 				window.location.href = "index";
			// 			});

			// 		},
			// 		error: function (request, status, error) {
			// 			alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
			// 			console.log(request.responseText, error);
			// 		}
			// 	});
			// });
		});
		
	</script>
