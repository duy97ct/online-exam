<!-- Modal -->
<div id="modalAdd" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<form action="admin/vanban/add" method="POST" id="frmAdd">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Thêm văn bản</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<label>Số văn bản </label><label class="text-danger">(*)</label>
						<input type="text" name="so" class="form-control" required="required">
					</div>
					<div class="col-md-8">
						<label>Trích yếu</label><label class="text-danger">(*)</label>
						<input type="text" name="trichyeu" class="form-control" required="required">
					</div>
					<div class="col-md-4">
						<label>Ngày ban hành</label><label class="text-danger">(*)</label>
						<input type="date" name="ngaybanhanh" class="form-control" required="required">
					</div>
					<div class="col-md-4">
						<label>Loại</label><label class="text-danger">(*)</label>
						<select name="loai" class="form-control">
							<?php foreach ($ds_loai as $loai): ?>
								<option value="<?=$loai->get('VBL_ID')?>"><?=$loai->get('VBL_ID')?></option>
							<?php endforeach ?>
						</select>
					</div>
					
					<div class="col-md-4">
						<label>Trạng thái</label><label class="text-danger">(*)</label>
						<select name="trangthai" class="form-control">
							<option value="1" selected="selected">Còn hiệu lực</option>
							<option value="0">Hết hiệu lực</option>
						</select>
					</div>
					<div class="col-md-12">
						<label>Cấp</label><label class="text-danger">(*)</label>
						<select name="cap" class="form-control">
							<?php foreach ($ds_cap as $cap): ?>
								<option value="<?=$cap->get('VBC_ID')?>"><?=$cap->get('VBC_TEN')?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-md-6">
						<label>Cơ quan ban hành</label>
						<input type="text" name="coquanbanhanh" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Người ký</label>
						<input type="text" name="nguoiky" class="form-control">
					</div>
					<div class="col-md-12">
						<label>Tải file</label><label class="text-danger">(*)</label>
						<input type="file" name="file" class="form-control" required="required">
					</div>
					<div class="col-md-12">
						<label>Tải file (tùy chọn)</label>
						<input type="file" name="file2" class="form-control">
					</div>
					<div class="col-md-12">
						<label>Tải file (tùy chọn)</label>
						<input type="file" name="file3" class="form-control">
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default">Xóa</button>
				<button type="submit" form="frmAdd" class="btn btn-success">Thêm</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
			</div>
		</div>
		</form>

	</div>
</div>