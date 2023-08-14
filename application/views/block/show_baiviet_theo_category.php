<style>
	.ds_baiviet_image{
		
		/**/
		width: 100%;
		height: 100px;
		background-size: cover;
		background-position: center center;
	}
	.ds_baiviet_imange_cover{
		margin: 8px 20px 15px 0px;
		padding: 4px;
		border: 1px solid #ccc;
		width:150px;
		
	}
	.ds_baiviet_tieude{
		color: #ff9005;
		font-weight: bold;
	}
	.category_title{
		border-bottom: 2px solid #ccc;
		padding: 10px 0;
		margin-bottom: 15px;

	}
</style>
	<div>
		<h5 class="category_title"><?=$cat->get('CAT_NAME')?></h5>
	</div>
		<?php if (count($ds_baiviet)>0): ?>
			<?php foreach ($ds_baiviet as $baiviet): ?>
				<div class="col-md-12">
					<div class="pull-left" >
						<div class="ds_baiviet_imange_cover">
							<div class="ds_baiviet_image" style="background-image: url('media/images/<?=($baiviet->get('BV_HINH_ANH') != NULL)?$baiviet->get('BV_HINH_ANH'):'image_blank.jpg' ?>')" alt=""></div>
						</div>
					</div>
					<div class="ds_baiviet_tieude">
						<a href="baiviet/<?=$baiviet->get('BV_ID') ?>">
							<?= $baiviet->get('BV_TIEU_DE') ?>
						</a>	
					</div>
					<div class="ds_baiviet_noidung"><?= strip_tags($baiviet->get('BV_NOI_DUNG')) ?>...</div>
				</div>
				<div class="clearfix"></div>
			<?php endforeach ?>
		<?php else: ?>
			Nội dung đang cập nhật
		<?php endif ?>
			
	
