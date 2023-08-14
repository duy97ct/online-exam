<div class="container bg-white pt-3 pb-3">
	<div class="row">
		<div class="col-md-10 offset-md-2">
			<div class="form-group">
				Chúc mừng bạn đã hoàn thành bài thi.
			</div>
			<div class="form-group">
				<h5>THÔNG TIN NGƯỜI THAM GIA</h5>
				<p>Họ tên: <?=$nguoidung->get('ND_TEN') ?></p>
				<p>Số điện thoại: <?=$nguoidung->get('ND_SDT'); ?></p>
				<p>Thời gian thi: <?=date('H:i:s d/m/Y', strtotime($nguoidung->get('ND_NGAY_TAO'))) ?></p>
			</div>
			<div class="form-group">
				<h5>KẾT QUẢ THI</h5>
				<p>Bạn trả lời đúng <?=$ketqua['mark'] ?>/29 câu hỏi</p>
			</div>
			<div class="form-group font-italic">
				<p>Lưu ý:</p>
				<p>- Bạn có thể tham gia thi nhiều lần, hệ thống chỉ ghi nhận kết quả lượt thi cuối cùng.</p>
				<p>- Bạn có thể tham khảo mục "Thông tin tham khảo" để biết thông tin trả lời các câu hỏi trong cuộc thi.</p>
				<br>
				<br>
			</div>

				
		</div>
	</div>	
</div>