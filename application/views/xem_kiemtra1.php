<form action="update_kiemtra" method="POST">
		<!-- Thông tin cá nhân -->
		<div class="col-md-12">
			<h3>Phần thông tin cá nhân</h3>
			<div class="row form-group">
				<div class="col-md-4">
					Họ tên
				</div>
				<div class="col-md-8">
					<?= $nguoidung->get('ND_TEN') ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Số điện thoại
				</div>
				<div class="col-md-8">
					<?= $nguoidung->get('ND_SDT') ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Địa chỉ
				</div>
				<div class="col-md-8">
					<?= $nguoidung->get('ND_DIA_CHI'); ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Đơn vị
				</div>
				<div class="col-md-8">
					<?= $nguoidung->get_donvi(); ?>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<h3>Bài thi	</h3>
		</div>
		<!-- ds câu hỏi -->
		<?php $stt=1;$mark=0;$total=0;  foreach($ds_dapan as $dapan): ?>
			<div class="col-md-12 " style="margin-top: 20px;">
				
				Câu <?= $stt++ ?>:
				<?= $dapan->get('CH_TEXT') ?>
				<div class="row" style="padding-left: 20px;">
					<?php $total++; foreach($dapan->ds_cau_tra_loi() as $tra_loi): ?>
						<div class="col-md-6">
							<?php $icon  = ($tra_loi->get('CTL_ID') == $dapan->get('dapan'))?'fa-check-square-o':'fa-square-o' ?>
							<?php
								$color = '#000000';
								 	
								if($tra_loi->get('CTL_DUNG') == 1) {
									$color = '#00FF00';
								}else{
									$color = '#000000';
								}

								if($tra_loi->get('CTL_ID') == $dapan->get('dapan') ){
									if($tra_loi->get('CTL_DUNG') == 1) {
										//Truong hop chon dung
										//$color = '#00FF00';
										$mark ++;
									}else{
										//Truong hop chon nhung khong dung
										$color = '#FF0000';
									}
								}
								
							?>
							<i class="fa <?= $icon ?>" style="color: <?=$color ?>"></i>
							<?= $tra_loi->get('CTL_TEXT') ?>
						</div>
					<?php endforeach; ?>
				</div>
					
			</div>
				
		<?php endforeach; ?>

		<!-- Câu dự đoán số người -->
		<div class="col-md-12 form-group" style="margin-top: 20px;">
			<b>Câu tự luận:</b>
			<br>
			&nbsp;&nbsp; <?= $nguoidung->get('ND_SO_NGUOI') ?>
		</div>
		<div class="col-md-12 form-group" style="margin-top: 20px;">
			Bạn đã trả lời đúng <?= $nguoidung->get_ketqua()['mark'] ?>/<?= $total ?> câu hỏi.
			<br/>
			<i>
				<strong>*Chú thích:</strong>
				<br>
				Màu xanh chỉ ra ô có đáp án đúng
				<br>
				Dấu chọn chỉ ra đáp án bạn chọn
			</i>
		</div>
		<div class="col-md-12 text-center">
			<a href="admin/ds_nguoidung" class="btn btn-secondary">Quay lại</a>
		</div>
	</div>
</form>


	