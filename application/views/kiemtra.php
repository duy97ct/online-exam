<?php 
$begin = new DateTime("2022-05-19 00:00:00");
$end = new DateTime("2022-06-09 23:59:59");
$now = new DateTime("now");
?>
<?php if ($now < $begin || $now > $end): ?>
	<!-- Trường hợp chưa đến thời gian thi -->
	<div class="container bg-white pt-3" style="min-height: 415px;">
		<div class="row mt-3">
			<div class="col-md-12">
				Chưa đến thời gian thi, vui lòng quay lại trong thời gian diễn ra cuộc thi!
			</div>
		</div>
	</div>
		
	
<?php else: ?>
	<!-- Trường hợp trong thời gian thi -->
	<div class="container">
		<div class="row mt-3">	
			<form id="frm_kiemtra"  action="update_kiemtra" method="POST">
				<!-- Thông tin cá nhân -->
				<div class="col-md-12">
					<h3>Phần thông tin cá nhân</h3>
					<div class="row form-group">
						<div class="col-md-4">
							Họ tên
						</div>
						<div class="col-md-8">
							<input type="text" name="hoten" class="form-control" required="required">
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
							Địa chỉ
						</div>
						<div class="col-md-8">
							<input type="text" name="diachi" class="form-control" required="required">
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<h3>Nội dung </h3>
				</div>
				<!-- ds câu hỏi -->
				<?php $stt=1;  foreach($ds_cau_hoi as $cauhoi): ?>
					<div class="col-md-12 mt-4">
						<strong>Câu <?= $stt++ ?>:
						<?= $cauhoi->get('CH_TEXT') ?></strong>
						<div class="row" style="padding-left: 20px;">
							<?php $value=1; foreach($cauhoi->ds_cau_tra_loi() as $tra_loi): ?>
								<div class="col-md-6">
									
									<input type="radio" name="cauhoi[<?= $cauhoi->get('CH_ID') ?>]" value="<?= $tra_loi->get('CTL_ID') ?>">
									<?= $tra_loi->get('CTL_TEXT') ?>
								</div>
							<?php endforeach; ?>
						</div>
							
					</div>
						
				<?php endforeach; ?>

				<!-- Câu dự đoán số người -->
				<div class="col-md-12 form-group" style="margin-top: 20px;">
					Câu 30: Có bao nhiêu người tham gia trả lời đúng các câu hỏi trên?
					<br>
					<input type="number" class="form-control" name="songuoi" required="required">
				</div>
				<div class="col-md-12 text-center">
					<input type="submit" class="btn btn-success" value="Hoàn thành">
				</div>
			
			</form>
		</div>
	</div>
		
	<script>
		$(document).ready(function(){
			$('.input_number').keyup(function(){

				str = $(this).val();
				var regexp = /[0-9]/g;
				var matches_array = str.match(regexp);
				//console.log(str, matches_array);
				$(this).val((matches_array || []).join(''));
			});
			$('#frm_kiemtra').submit(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize(),
					dataType: 'JSON',
					success: function(result){
						swal.fire(result.status,result.message,result.status);

					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
				});
			});
		});
		function input_number(node){
			
		}
</script>
<?php endif ?>