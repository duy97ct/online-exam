<div class="content_baiviet pt-2 pl-3">
	<?php if($baiviet->get('BV_HIEN_TIEU_DE') == true): ?>
	<div class="content_tieude">
		<h3><?= $baiviet->get('BV_TIEU_DE') ?></h3>
		<!-- <span class="span_ngaydang">Ngày đăng: <?= date('d/m/Y', strtotime($baiviet->get('BV_NGAY_TAO'))); ?></span> - -->
		<!-- <span class="span_chuyenmuc">Chuyên mục: <?= $baiviet->get_category()->get('CAT_NAME') ?></span> -->
	</div>
	<?php endif ?>
	<div class="content_noidung">
		<?= $baiviet->get('BV_NOI_DUNG') ?>
	</div>
	
</div>
