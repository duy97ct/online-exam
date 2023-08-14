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
</style>
<div class="row">
	<div class="col-md-9">
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
	</div>
	<div class="col-md-3">
		<?php $this->view('menu_phai') ?>
	</div>
		
		
</div>