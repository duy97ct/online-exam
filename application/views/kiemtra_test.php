
	<script src="assets/js/jquery-ui.long.js?<?=date('HisdmY')?>"></script>
	<!-- Trường hợp trong thời gian thi -->
	<div class="container bg-white pt-3 pb-3">
		<form id="frm_kiemtra" action="update_kiemtra" method="POST">
			<div class="row">
				<div id="test_status" class="col-md-12">
					<div class="">
						<div class="row">
							<div class="col-md-12">
								<ul id="step_tree">
									<li class="li_status_step_1 text-success">1. Nhập thông tin cá nhân &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></li>
									<li class="li_status_step_2 text-success">2. Trả lời câu hỏi &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></li>
									<li class="li_status_step_3">3. Hoàn thành</li>
								</ul>
							</div>
							<!-- <div class="col-md-4 text-right">
								<span id="time_status" class="pr-5">30:00</span>
								
							</div> -->
						</div>
							
					</div>
						
				</div>
			</div>
			<div class="row">
				<div id="div_part1_info" class="col-md-3">	
					<div class="card" id="card-information">
						<div class="row mt-3">
							<!-- Thông tin cá nhân -->
							<div class="col-md-12">
								<div class="row form-group">
									<div class="col-md-12" style="text-align: center;">
										Họ tên
										<br>
										<strong><?=$this->session->userdata('nguoiduthi')->get('ND_TEN')?></strong>
										<!-- <input type="text" name="hoten" class="form-control" required="required" style="text-transform: uppercase;"> -->
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12"  style="text-align: center;">
										SĐT
										<br>
										<strong><?=$this->session->userdata('nguoiduthi')->get('ND_SDT')?></strong>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12"  style="text-align: center;">
										Địa chỉ
										<br>
										<strong><?=$this->session->userdata('nguoiduthi')->get('ND_DIA_CHI')?></strong>
										<!-- <input type="text" name="diachi" class="form-control" required="required"> -->
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12"  style="text-align: center;">
										Đơn vị
										<br>
										<strong><?=$this->session->userdata('nguoiduthi')->get_donvi()?></strong>
									</div>
								</div>
								<div style="margin: 25px;text-align: center ;top: 60px; border: 1px solid #76abe2; padding: 1px 20px; width:130px; background-color: #ffffff;">
									<span style="font-size:12px;">Thời gian còn lại</span><br/>
									<span id="time_countdown" style="color: #f00;">
										20:00
									</span>
								</div>
								<div class="col-md-12 text-center" style="padding: 10px">
									<input id="btn_hoanthanh" type="submit" class="btn btn-success" style="width: 180px; font-size: 18px " value="Hoàn thành" style="padding: 10px;margin: 4px;">
									<!-- <input id="btn_hoanthanhnhanh" type="button" class="btn btn-success" value="Hoàn thành nhanh" style="padding: 10px;"> -->
									<br>
									<br>
									<i>(Vui lòng điền số lượng người có đáp án chính xác nhất)</i>
								</div>
							</div>
						</div>
					</div>
							
				</div>
				<div id="div_part2_question" class="col-md-9">
					<!-- ds câu hỏi -->
					<?php $stt=1;  foreach($ds_cau_hoi as $cauhoi): ?>
						<div class="col-md-12 div_cauhoi mt-4">
							
								<strong>Câu <?= $stt++ ?>: <?= $cauhoi->get('CH_TEXT') ?></strong>
								<div class="row" style="padding-left: 20px;">
									<?php $value=1; foreach($cauhoi->ds_cau_tra_loi() as $tra_loi): ?>
										<div class="col-md-6">
											
											<input type="radio" name="cauhoi[<?= $cauhoi->get('CH_ID') ?>]" value="<?= $tra_loi->get('CTL_ID') ?>"/>
											<?= $tra_loi->get('CTL_TEXT') ?>
										</div>
									<?php endforeach; ?>
								</div>
								
						</div>
							
					<?php endforeach; ?>

					<!-- Câu dự đoán số người -->
					<div class="col-md-12 form-group" style="margin-top: 20px;">
						<strong>Câu 20: Có bao nhiêu người tham gia trả lời đúng các câu hỏi trên?</strong>
						<br>
						<input type="number" class="form-control" name="songuoi" required="required">
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
		.div_chuatraloi{
			color: #f00;
		}
	</style>
	<script>
		$(document).ready(function(){
			$('#btn_hoanthanhnhanh').click(function(){
				gui_baithi_nhanh($('#frm_kiemtra'));
			});
			//Các input nhập số (SĐT) chỉ cho phép nhập số
			/* $('.input_number').keyup(function(){

				str = $(this).val();
				var regexp = /[0-9]/g;
				var matches_array = str.match(regexp);
				//console.log(str, matches_array);
				$(this).val((matches_array || []).join(''));
			}); */

			//Khi nhap xong so nguoi moi cho nhan nut hoan thanh


		});
	</script>
