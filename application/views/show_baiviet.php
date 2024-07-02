<div class="container">
	<div class="row">
		<div class="col-md-9 mt-3">
			<div class="content_baiviet">
				<?php if($baiviet->get('BV_HIEN_TIEU_DE') == true): ?>
				<div class="content_tieude">
					<h3><?= $baiviet->get('BV_TIEU_DE') ?></h3>
					<span class="span_ngaydang">Ngày đăng: <?= date('d/m/Y', strtotime($baiviet->get('BV_NGAY_TAO'))); ?></span> -
					<span class="span_chuyenmuc">Chuyên mục: <?= $baiviet->get_category()->get('CAT_NAME') ?></span>
				</div>
				<?php endif ?>
				<?php if ($baiviet->get('BV_HINH_ANH') != NULL): ?>
					<div class="mt-2 mb-2">
						<img class="img_anhminhhoa text-center" src="media/images/<?=$baiviet->get('BV_HINH_ANH') ?>" alt="Ảnh minh họa" title="Ảnh minh họa"/>
					</div>
					
				<?php endif ?>
				<div class="content_noidung">
					<?= $baiviet->get('BV_NOI_DUNG') ?>
				</div>
				
			</div>
		</div>
		<div class="col-md-3 mt-3">
			<?php $this->view('menu_phai'); ?>
		</div>
	</div>
</div>

		