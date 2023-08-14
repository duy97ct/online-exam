<div class="block_ditich_01">
	<div class="block_ditich_01_header">
		<?= $cat->get('CAT_NAME') ?>
	</div>
	<div class="block_ditich_01_content">
		<?php if ($ds_baiviet != NULL && count($ds_baiviet) > 0): ?>
			<ul>
				<?php foreach ($ds_baiviet as $bv): ?>
					<li>
						<a href="baiviet/<?=$bv->get('BV_ID') ?>"><?= $bv->get('BV_TIEU_DE') ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		<?php else: ?>
			Thông tin đang cập nhật
		<?php endif ?>
	</div>
</div>


