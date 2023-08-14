<script src="assets/js/jquery-ui.long.js"></script>
<form id="frm_kiemtra"  action="update_kiemtra" method="POST">
		<!-- Thông tin cá nhân -->
		<div class="col-md-12">
			<h3>I. Phần thông tin cá nhân</h3>
			<div class="row form-group">
				<div class="col-md-4">
					Họ và tên<span class="text-danger">*</span>
				</div>
				<div class="col-md-8">
					<input type="text" name="hoten" class="form-control" required="required">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Số điện thoại<span class="text-danger">*</span>
				</div>
				<div class="col-md-8">
					<input type="text" name="sdt" minlength="8" maxlength="11" class="form-control input_number" required="required">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Năm sinh: <span class="text-danger">*</span> <br/>
				</div>
				<div class="col-md-8">
					<input type="date" name="namsinh" class="form-control" required="required" />
					<i>(Năm sinh được lấy theo giấy khai sinh, chứng minh nhân dân hoặc thẻ căn cước công dân. Trường hợp không rõ tháng sinh thì lấy tháng đầu tiên của năm, trường hợp không rõ ngày sinh thì lấy ngày đầu tiên của tháng). Trên điện thoại, vui lòng nhấn vào số 2020 để chọn năm sinh.</i>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Giới tính: <span class="text-danger">*</span>
				</div>
				<div class="col-md-4">
					<input type="radio" name="gioitinh" value="1" required="required" /> &nbsp;&nbsp; Nam
				</div>
				<div class="col-md-4">
					<input type="radio" name="gioitinh" value="0"/> &nbsp;&nbsp; Nữ
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Địa chỉ cư trú (Thường trú/Tạm trú)<span class="text-danger">*</span>
				</div>
				<div class="col-md-8">
					<input type="text" name="diachi" class="form-control" required="required">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Đơn vị công tác/học tập
				</div>
				<div class="col-md-8">
					<input type="text" name="donvicongtac" class="form-control" >
					<i>(Nơi công tác, làm việc đối với người đang làm việc, trường học đối với sinh viên, các trường hợp khác có thể không nhập)</i>
				</div>	
				
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					Thuộc/Trực thuộc UBND quận, huyện, sở, ban, ngành, đoàn thể cấp thành phố
					<!-- Đơn vị công tác/học tập -->
				</div>
				<div class="col-md-8">
					<select name="donvi" id="sel_donvi" class="form-control select2">
						<option value="">&nbsp;</option>
						<!--option value="-1">Khác...</option-->
						<?php foreach ($ds_quanhuyen as $dv): ?>
						<option value="<?=$dv->get('QH_ID') ?>"><?= $dv->get('QH_TEN') ?></option>
						<?php endforeach ?>
						
					</select>
					<i>(Nếu không thuộc các đơn vị hiện có, vui lòng chọn "Khác" hoặc không chọn)</i>

					<input type="text" name="ten_donvi" id="txt_donvi" value="" class="hidden form-control mt-3" placeholder="Nhập tên đơn vị...">
				</div>
			</div>
			
		</div>

		<div class="col-md-12">
			<h3>II. Nội dung </h3>
		</div>
		<!-- ds câu hỏi -->
		<?php  $stt=1;  if ($ds_cau_hoi != NULL && count($ds_cau_hoi)>0): ?>
		<?php foreach($ds_cau_hoi as $cauhoi): ?>
			<div class="col-md-12 div_cauhoi mt-5" data-id="<?= $cauhoi->get('CH_ID') ?>" style="margin-top: 20px;">
				<span class="span_cauhoi" style="color: #000; ">
					Câu <?= $stt++ ?>:
					<?= $cauhoi->get('CH_TEXT') ?>
				</span>
					
				<div class="row" style="padding-left: 20px;">
					<input type="radio" class="hidden" name="cauhoi[<?= $cauhoi->get('CH_ID') ?>]" value="" checked>
					<?php $value=1; foreach($cauhoi->ds_cau_tra_loi() as $tra_loi): ?>
						<div class="col-md-6 mt-2">
							<div class="pull-left">
								<input type="radio" name="cauhoi[<?= $cauhoi->get('CH_ID') ?>]" value="<?= $tra_loi->get('CTL_ID') ?>">
							</div>
							<div class="text-justify" style="padding-left: 20px;">
								<?= $tra_loi->get('CTL_TEXT') ?>
							</div>
							
						</div>
					<?php endforeach; ?>
				</div>
					
			</div>
				
		<?php endforeach; ?>
		<?php endif ?>
		
		<!-- Câu dự đoán số người -->
		<div class="col-md-12 form-group" style="margin-top: 20px;">
			<div class="row">
				<div class="col-md-12" style="color:#000">
					Câu <?= $stt ?>: Tỷ lệ % (phần trăm) người tham gia dự thi trả lời đúng 24 (hai mươi bốn) câu hỏi trên?
				</div>
				<div class="col-md-12" style="line-height:40px;">
					<div class="pull-left pr-2">
						Điền bằng số thập phân (ví dụ: 87,65432):
					</div>
					<div class="pull-left">
						<input type="text" id="txt_dudoan" class="form-control text-right" name="songuoi" required="required" maxlength="9" autocomplete="off">
					</div>
					<div class="pull-left">%</div>

				</div>
			</div>
			
			
			
		</div>
		<div class="col-md-12 text-center mt-5">
			<input type="submit" class="btn btn-success" id="btnGuiBaiThi" value="Gửi bài thi" style="font-size: 16pt;padding: 5px 20px;">
		</div>
	</div>
</form>

<div style="position: fixed; left: 20px; top: 10px; border: 1px solid #ccc; padding: 10px 20px; text-align: right; width:130px; background-color: #ffffff;">
<span style="font-size:12px;">Thời gian còn lại</span><br/>
<span id="time_countdown" >
	30:00
</span>
</div>

<script>
	$('document')
</script>
