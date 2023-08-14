<div class="row">	
	<div class="col-md-12 form-group">	
		<h3>Cập nhật bài viết</h3>
	</div>
</div>
<form action="admin/edit2_baiviet/<?=$baiviet->get('BV_ID') ?>" method="POST" style="width:100%" enctype="multipart/form-data">
<div class="row">
	<div class="col-md-12">
		<div class="row">
			
						
				<div class="col-md-12 form-group">
					<label>Tiêu đề</label>
					<input type="text" name="tieude" class="form-control" value="<?=$baiviet->get('BV_TIEU_DE') ?> "	>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Chuyên mục</label>
							<select name="category"class="form-control">
								<?php foreach ($ds_category as $category) : ?>
									<option value="<?=$category->get('CAT_ID') ?>"><?=$category->get('CAT_NAME') ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-12 form-group">
							<label class="mr-3">Hiện tiêu đề:</label>
							<input type="checkbox" name="hien_tieude" value="1" <?= $baiviet->get('BV_HIEN_TIEU_DE')==1?'checked':'' ?> style="height:18px;width:18px" >
						</div>
						<div class="col-md-6 form-group">
							<label for="">Ngày đăng </label>
							<input type="date" id="txt_ngaydang" name ="ngaydang" value="<?= date('Y-m-d',strtotime($baiviet->get('BV_NGAY_DANG'))); ?>" class='form-control'>
						</div>
						<div class="col-md-6 form-group">
							<label for="">Ngày kết thúc</label>
							<?php
								$nkt = $baiviet->get('BV_NGAY_KET_THUC');
								if($nkt != "" && $nkt != 0000-00-00){
									$a = date('Y-m-d',strtotime($nkt));
									echo  "<input type='date' id='txt_ngayketthuc' name ='ngayketthuc' value= '$a' class='form-control'>";
								}
								if($nkt == 0000-00-00 || $nkt == "" ){
									echo "<input type='date' id='txt_ngayketthuc' name ='ngayketthuc' value= '' class='form-control'>";
								}
							
							?>
						</div>
					</div>
				</div>	
				<div class="col-md-6 form-group">
					<label for="">Hình ảnh</label>
					<input type="file" id="txt_hinhanh" name="AVATAR" class="hidden" > <br>
					<img src="media/images/<?= $baiviet->get('BV_HINH_ANH') ?>" alt ="Không hiển thị được hình" width = "auto" height ="100px">
				</div>
				<div class="col-md-12 form-group">
					<label>Nội dung</label>
					<textarea name="noidung" id="editor1" cols="30" rows="10" class="form-control"><?= $baiviet->get('BV_NOI_DUNG') ?></textarea>
				</div>
				<div class="col-md-12 text-center">
					<button class="btn btn-success">Đăng tin</button>
					<a href="admin/ds_baiviet" class="btn btn-default">Quay lại</a>
				</div>
			
		</div>
	</div>	
</div>
</form>
<script>
	$(document).ready(function(){
		CKEDITOR.replace( 'editor1' ,
			{
				language: 'vi',
				filebrowserBrowseUrl : 'node_modules/ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : 'node_modules/ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : 'node_modules/ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : 'node_modules/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : 'node_modules/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : 'node_modules/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			}
		);
	});
</script>
