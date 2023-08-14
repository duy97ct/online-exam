<div class="row ">
	<div class="col-md-12 text-center mb-3">
		<form action="ds_ketqua" method="POST">
		
			<span>số điện thoại</span>
			<input type="text" name="sdt">
			<button class="btn btn-info">Tìm</button>
		
		
		</form>
	</div>
</div>
<div class="row">
	<?php if(is_array($ds_nguoidung) && count($ds_nguoidung)>0): ?>
		<?php foreach ($ds_nguoidung as $nguoidung) :?>
			<div class="col-md-3 ">
				<div class="div_nguoidung">
					<strong><a href="xem_kiemtra/<?= $nguoidung->get('ND_ID'); ?>"><?= $nguoidung->get('ND_TEN'); ?></a></strong><br/>
					SĐT: <?= $nguoidung->get('ND_SDT'); ?><br/>
					Địa chỉ:<?= $nguoidung->get('ND_DIA_CHI'); ?>
				</div>
					
					
				
				
			</div>
			
		<?php endforeach;?>
	<?php else: ?>
		<div class="col-md-12">
			Không tìm thấy kết quả phù hợp
		</div>
	<?php endif; ?>
</div>