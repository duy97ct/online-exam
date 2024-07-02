<div class="container bg-white pt-3 pb-3">
	<div class="row">
		<div class="col-md-10 offset-md-2">
			<div class="form-group">
				Chúc mừng bạn đã hoàn thành bài thi.
			</div>
			<div class="form-group">
				<h5 style="color:red">THÔNG TIN NGƯỜI THAM GIA</h5>
				<br>
				<!-- <p>Họ tên: <?=$nguoidung->get('ND_TEN') ?></p>
				<p>Số điện thoại: <?=$nguoidung->get('ND_SDT'); ?></p>
				<p>Đơn vị: <?=$nguoidung->get_donvi() ?> </p>
				<p>Thời gian thi: <?=date('H:i:s d/m/Y', strtotime($nguoidung->get('ND_NGAY_TAO'))) ?></p> -->
				<table style="border: 1px solid black; border-collapse: collapse; width: 500px">
					<tr style="border:1px solid black; padding:5px;">
						<th style="border:1px solid black; padding:5px; background-color:skyblue">Họ tên</th>
						<td style="border:1px solid black; padding:5px; margin: 50px; text-align: center"><?=$nguoidung->get('ND_TEN') ?></td>	
					</tr>
					<tr style="border:1px solid black; padding:5px;">	
						<th style="border:1px solid black; padding:5px; background-color:skyblue">Số điện thoại</th>
						<td style="border:1px solid black; padding:5px; text-align: center"><?=$nguoidung->get('ND_SDT') ?></td>
					</tr>	
					<tr style="border:1px solid black; padding:5px;">
						<th style="border:1px solid black; padding:5px; background-color:skyblue">Đơn vị</th>
						<td style="border:1px solid black; padding:5px; text-align: center"><?=$nguoidung->get_donvi() ?></td>
					</tr>
					<tr style="border:1px solid black; padding:5px;">	
						<th style="border:1px solid black; padding:5px; background-color:skyblue">Thời gian thi</th>
						<td style="border:1px solid black; padding:5px; text-align: center"><?=date('H:i:s d/m/Y', strtotime($nguoidung->get('ND_NGAY_TAO'))) ?></td>
					</tr>
				</table>
			</div>
			<div class="form-group">
				<h5>KẾT QUẢ THI</h5>
				<h4>Bạn trả lời đúng <?=$ketqua['mark'] ?>/40 câu hỏi</h4>
			</div>
			<div class="form-group font-italic">
				<p>Lưu ý:</p>
				<p>- Bạn có thể tham gia thi nhiều lần, hệ thống chỉ ghi nhận kết quả lượt thi cuối cùng.</p>
				<!-- <p>- Bạn có thể tham khảo mục "Thông tin tham khảo" để biết thông tin trả lời các câu hỏi trong cuộc thi.</p> -->
				<br>
				<br>
			</div>

				
		</div>
	</div>	
</div>