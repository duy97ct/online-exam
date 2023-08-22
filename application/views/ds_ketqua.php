<div class="row ">
	<div class="col-md-12 text-center mb-3">
	<!-- <div class="col-md-3"></div> -->
		<form action="ds_ketqua" method="POST" style="width: 800px; margin: auto">
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

			<br>
			<button class="btn btn-info" style="width: 180px;margin: 0 auto; background-color: chocolate;" >Tra cứu</button>


		
 		</div>
		</form>
	</div>
</div>
<div class="row">
		<?php if(is_array($ds_nguoidung) && count($ds_nguoidung)>0): ?>
			<div class="col-md-12 ">
				<div class="div_nguoidung">
				<table style="width: 1000px; border: 1px solid black; border-collapse: collapse; text-align: center; margin: auto; margin-bottom: 50px">
					<tr  style="background-color:skyblue; font-size: 18px">
						<th style="border:1px solid black; padding:5px;">STT</th>
						<th style="border:1px solid black; padding:5px">Họ tên</th>
						<th style="border:1px solid black; padding:5px; width: 150px">Số điện thoại</th>
						<th style="border:1px solid black; padding:5px">Địa chỉ</th>
						<th style="border:1px solid black; padding:5px">Đơn vị</th>
						<th style="border:1px solid black; padding:5px">Điểm</th>
					</tr>
						
							<?php foreach ($ds_nguoidung as $key => $nguoidung) :?>
					<tr >
						<td style="border:1px solid black; white-space:pre-line; padding: 5px "><?= $key +1; ?> </td>
						<td style="border:1px solid black; white-space:pre-line; padding: 5px "><strong><a href="xem_kiemtra/<?= $nguoidung->get('ND_ID'); ?>"><?= $nguoidung->get('ND_TEN'); ?></a></strong><br/></td>
						<td style="border:1px solid black; white-space:pre-line; padding: 5px"><?= $nguoidung->get('ND_SDT'); ?></td>
						<td style="border:1px solid black; white-space:pre-line; padding: 5px"><?= $nguoidung->get('ND_DIA_CHI'); ?></td>
						<td style="border:1px solid black; white-space:pre-line; padding: 5px"><?= $nguoidung->get_donvi(); ?></td>
						<td style="border:1px solid black; white-space:pre-line; padding: 5px; width: 80px"><?= $nguoidung->get('ND_SO_CAU_DUNG'); ?> / <?= QUESTION_NUMBER ?></td>
					</tr>
					<?php endforeach;?>
					</table>
					<!-- <strong><a href="xem_kiemtra/<?= $nguoidung->get('ND_ID'); ?>"><?= $nguoidung->get('ND_TEN'); ?></a></strong><br/> -->
					<!-- SĐT: <?= $nguoidung->get('ND_SDT'); ?><br/> -->
					<!-- Địa chỉ:<?= $nguoidung->get('ND_DIA_CHI'); ?>
					<br>Điem:<?= $nguoidung->get('ND_SO_CAU_DUNG'); ?> / <?= QUESTION_NUMBER ?> -->
					<!-- </table> -->
				</div>				
			</div>		
	<?php else: ?>
		<!-- <div class="col-md-12">
			Không tìm thấy kết quả phù hợp
		</div> -->
	<?php endif; ?>
</div>