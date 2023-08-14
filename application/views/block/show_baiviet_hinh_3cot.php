<style>
	.show_baiviet_hinh_3cot_image{
		margin-top: 10px;
		border: 1px solid #eeeeee;
		padding: 3px;
		height: 220px;
		overflow: hidden;
	}
	.show_baiviet_hinh_3cot_title{
		font-weight: 600;
		margin-top: 10px;
		margin-bottom: 10px;
	}
</style>
<div class="block_ditich_hinh">
	<div class="block_ditich_hinh_header">
		<a href="page/<?= $cat->get('CAT_ALIAS_NAME') ?>"><?= $cat->get('CAT_NAME') ?></a>
	</div>
	<div class="block_ditich_hinh_content" >
		<?php if ($ds_baiviet != NULL && count($ds_baiviet) > 0): ?>
			<div class="row mb-2">
				<?php for($i=0; $i<min(4,count($ds_baiviet)); $i++): ?>
					<div class="col-md-6">
						<div class="show_baiviet_hinh_3cot_image">
							<img class="img_hinh" src="media/images/<?= $ds_baiviet[$i]->get('BV_HINH_ANH') ?>" alt="Hình minh họa" style="">
						</div>
						<div class="show_baiviet_hinh_3cot_title">
							<?= $ds_baiviet[$i]->get('BV_TIEU_DE') ?>
						</div>
						<div class="show_baiviet_hinh_3cot_body">
							<?=  strip_tags($ds_baiviet[$i]->get('BV_NOI_DUNG')) ?>...
						</div>
					</div>
				<?php endfor ?>
			</div>
			<!-- <div class="clearfix"></div> -->
		<?php else: ?>
			<div class="row">
				<div class="col-md-12">
					Thông tin đang cập nhật
				</div>
			</div>
		<?php endif ?>
	</div>
</div>
						
					