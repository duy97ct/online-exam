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
					<?= $nguoidung->get('ND_DON_VI_CONG_TAC'); ?>
				</div>
			</div>
		</div>
		<div class="col-md-12 form-group" style="margin-top: 20px;">
			Bạn đã trả lời đúng <?= $mark ?>/<?= $total ?> câu hỏi.
			
		</div>
		<div class="col-md-12 text-center">
			<a href="kiemtra" class="btn btn-secondary">Quay lại</a>
		</div>
	</div>
</form>


	