



<div class="row ">
	<div class="col-md-12 text-center mb-3">
	<!-- <div class="col-md-3"></div> -->
		<form action="ds_ketqua" method="POST">
		<!-- <div class="row" style="margin-top:0px"> -->
			<div class="col-12">
			<br>
			<h4 class="box-form-timkiem-title" style="text-align: center;">	
			TRA CỨU KẾT QUẢ
			</h4>
			<div class="col-12" style="margin-top:10px">
            	<div class="input-group" style="position: relative; margin-bottom: 0; flex: 1 1 auto;">
                <input type="text" class="form-control"  autofocus="" placeholder="Nhập số điện thoại đăng ký thi" maxlength="12"  name="sdt" value="">
                </div>
            </div>
        <!-- </div> -->
			<!-- <span>số điện thoại</span> -->
			<!-- <input type="text" name="sdt"> -->
			<br>
			<button class="btn btn-info">Tra cứu</button>

			<!-- <div class="col-12" style="margin-top:20px;">
                <div class="text-center">
                <input style="max-width: 280px!important;margin: 0 auto;" class="btn btn-info" type="button"  value="Tra cứu">
                </div>
            </div> -->
		
 		</div>
		</form>
	</div>
</div>
<div class="row">
	<?php if(is_array($ds_nguoidung) && count($ds_nguoidung)>0): ?>
		<?php foreach ($ds_nguoidung as $nguoidung) :?>
			<div class="col-md-3 ">
				<div class="div_nguoidung">
				<table style="width: 800px; border: 1px solid black; border-collapse: collapse; text-align: center;">
					<tr  style="background-color:skyblue">
						<th style="border:1px solid black;">Họ tên</th>
						<th style="border:1px solid black;">Số điện thoại</th>
						<th style="border:1px solid black;">Địa chỉ</th>
						<th style="border:1px solid black;">Điểm</th>
					</tr>
					<tr >
						<td style="border:1px solid black; "><strong><a href="xem_kiemtra/<?= $nguoidung->get('ND_ID'); ?>"><?= $nguoidung->get('ND_TEN'); ?></a></strong><br/></td>
						<td style="order:1px solid black;"><?= $nguoidung->get('ND_SDT'); ?></td>
						<td style="border:1px solid black;"><?= $nguoidung->get('ND_DIA_CHI'); ?></td>
						<td style="border:1px solid black;"><?= $nguoidung->get('ND_SO_CAU_DUNG'); ?> / <?= QUESTION_NUMBER ?></td>
					</tr>
					
					</table>
					<!-- <strong><a href="xem_kiemtra/<?= $nguoidung->get('ND_ID'); ?>"><?= $nguoidung->get('ND_TEN'); ?></a></strong><br/> -->
					<!-- SĐT: <?= $nguoidung->get('ND_SDT'); ?><br/> -->
					<!-- Địa chỉ:<?= $nguoidung->get('ND_DIA_CHI'); ?>
					<br>Điem:<?= $nguoidung->get('ND_SO_CAU_DUNG'); ?> / <?= QUESTION_NUMBER ?> -->
					<!-- </table> -->
				</div>
					
					
				
				
			</div>
			
		<?php endforeach;?>
	<?php else: ?>
		<div class="col-md-12">
			Không tìm thấy kết quả phù hợp
		</div>
	<?php endif; ?>
</div>