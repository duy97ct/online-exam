<div class="row mt-3">
	<div class="col-md-8 mt-3">
		<?php if (CategoryController::get_cat_by_alias($page_name) == NULL): ?>
			Không có thông tin về trang.
		<?php else: ?>
			<?=Controller::show_block(CategoryController::get_cat_by_alias($page_name),'show_baiviet_theo_category') ?>
		<?php endif ?>
		
	</div>
	<div class="col-md-4 mt-3">
		<?php $this->view('menu_phai'); ?>
	</div>
</div>