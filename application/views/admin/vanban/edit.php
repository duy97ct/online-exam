<!-- Modal -->
<div id="modalEdit" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<form action="admin/vanban/edit" method="POST" id="frmEdit">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Cập nhật văn bản</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4 form-group">
						<label>Số văn bản</label><label class="text-danger">(*)</label>
						<input type="text" name="so" id="mEdit_so" class="form-control" required="required">
						<input type="hidden" name="id" id="mEdit_id" class="form-control">
					</div>
					<div class="col-md-8 form-group">
						<label>Trích yếu</label><label class="text-danger">(*)</label>
						<input type="text" name="trichyeu" id="mEdit_trichyeu" class="form-control" required="required">
					</div>
					<div class="col-md-4 form-group">
						<label>Ngày ban hành</label><label class="text-danger">(*)</label>
						<input type="date" name="ngaybanhanh" id="mEdit_ngaybanhanh" class="form-control" required="required">
					</div>
					<div class="col-md-4 form-group">
						<label>Loại</label><label class="text-danger">(*)</label>
						<select name="loai" id="mEdit_loai" class="form-control">
							<?php foreach ($ds_loai as $loai): ?>
								<option value="<?=$loai->get('VBL_ID')?>"><?=$loai->get('VBL_ID')?></option>
							<?php endforeach ?>
						</select>
					</div>
					
					<div class="col-md-4 form-group">
						<label>Trạng thái</label><label class="text-danger">(*)</label>
						<select name="trangthai" id="mEdit_trangthai" class="form-control">
							<option value="1">Còn hiệu lực</option>
							<option value="0">Hết hiệu lực</option>
						</select>
					</div>
					<div class="col-md-12 form-group">
						<label>Cấp</label><label class="text-danger">(*)</label>
						<select name="cap" id="mEdit_cap" class="form-control">
							<?php foreach ($ds_cap as $cap): ?>
								<option value="<?=$cap->get('VBC_ID')?>"><?=$cap->get('VBC_TEN')?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-md-6 form-group">
						<label>Cơ quan ban hành</label>
						<input type="text" name="coquanbanhanh" id="mEdit_coquanbanhanh" class="form-control">
					</div>
					<div class="col-md-6 form-group">
						<label>Người ký</label>
						<input type="text" name="nguoiky" id="mEdit_nguoiky" class="form-control">
					</div>
					<div class="col-md-12 form-group">
						<label>Tải file</label> <span id="mEdit_url" class="ml-2"></span>
						<input type="file" name="file"  class="form-control">
					</div>
					<div class="col-md-12 form-group">
						<label>Tải file</label> <span id="mEdit_url2" class="ml-2"></span>
						<input type="file" name="file"  class="form-control">
					</div>
					<div class="col-md-12 form-group">
						<label>Tải file</label> <span id="mEdit_url3" class="ml-2"></span>
						<input type="file" name="file"  class="form-control">
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="submit" form="frmEdit" class="btn btn-success">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
		</form>

	</div>
</div>