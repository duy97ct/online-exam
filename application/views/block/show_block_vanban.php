<!-- <style type="text/css">
	.btn_cap_ban_hanh{
		height: 55px;
		white-space: normal;
		vertical-align: middle;
	}
</style>
<div class="row">
	<div class="col-md-4">
		<div class="btn btn-primary btn_cap_ban_hanh" style="background-color:#4055fc; border: 0;">Văn bản do quốc hội, chính phủ, thủ tướng Chính phủ ban hành</div>
	</div>
	<div class="col-md-4">
		<div class="btn btn-primary btn_cap_ban_hanh" style="background-color:#258be6; border: 0;">Văn bản do bộ TTTT và các bộ, ngành ban hành</div>
	</div>
	<div class="col-md-4">
		<div class="btn btn-primary btn_cap_ban_hanh" style="background-color:#1ec1d7; border: 0;">Văn bản do địa phương ban hành</div>
	</div>
</div> -->
<!-- tìm kiếm -->
<form id="frmSearch" action="admin/vanban/search" method="POST">
<div class="row form-group">
	<div class="col-md-4 form-group">
		<label>Số văn bản</label>
		<input type="text" name="so" class="form-control">
	</div>
	<div class="col-md-8 form-group">
		<label>Trích yếu</label>
		<input type="text" name="trichyeu" class="form-control">
	</div>
	<div class="col-md-4">
		<label>Loại văn bản</label>
		<select name="loai" class="form-control">
			<option value="">--Tất cả--</option>
			<?php foreach ($ds_loai as $loai): ?>
				<option value="<?=$loai->get('VBL_ID')?>"><?=$loai->get('VBL_ID')?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="col-md-6">
		<label>Cấp</label>
		<select name="cap" class="form-control">
			<option value="">--Tất cả--</option>
			<?php foreach ($ds_cap as $cap): ?>
				<option value="<?=$cap->get('VBC_ID')?>"><?=$cap->get('VBC_TEN')?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="col-md-2" style="margin-top:30px;">
		<button type="submit" class="btn btn-primary form-control"><i class="fa fa-search"></i> Tìm kiếm</button>
	</div>
</div>
</form>
<!-- bảng dữ liệu -->
<div class="row ">
	<div class="col-md-12 bg-white p-2">
			
		<table class="table table-bordered" id="main_table">
			<thead>
				<td>Số</td>
				<td width="50%">Trích yếu</td>
				<td>Loại</td>
				<td>Cấp</td>
				<td>Tải về</td>
				
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		//Khi nhấn nút tìm kiếm
		$('#frmSearch').submit(function(e){
			e.preventDefault();
			$.ajax({
				url:$(this).attr('action'),
				type:$(this).attr('method'),
				data:$(this).serialize(),
				dataType: 'JSON',
				success: function(result){
					
					//console.log(result);
					if(result.status == 'success'){
						// alert('dang chay');
						$('#main_table tbody').empty().html(result.html);
					}
					
				}
			})
		});
		//Khi vừa load vào trang tự nhấn nút tìm kiếm để hiện tất cả dữ liệu
		$('#frmSearch').submit();

		$(".a_show_modal").trigger("click");

	})
	//Khi nhấn vào từng dòng->hiện modal chi tiết văn bản
	$(document).on('click', '.a_show_modal', function(e){
			e.preventDefault();
			var tr = $(this).closest('tr');
			
			//điền thông tin vào modal
			$('#modal_so').html(tr.find('td:eq(0)').html().trim());
			$('#modal_trichyeu').html(tr.find('td:eq(1)').html().trim());
			$('#modal_loai').html(tr.find('td:eq(2)').html().trim());
			$('#modal_cap').html(tr.find('td:eq(3)').html().trim());
			
			$('#modal_ngaybanhanh').html(tr.find('td:eq(4)').html().trim());
			$('#modal_coquanbanhanh').html(tr.find('td:eq(5)').html().trim());
			$('#modal_nguoiky').html(tr.find('td:eq(6)').html().trim());
			$('#modal_trangthai').html(tr.find('td:eq(7)').html().trim());
			$('#modal_url').html(tr.find('td:eq(8)').html().trim());
			//hiện modal
			$('#modalView').modal('show');
		});
</script>

<!-- Modal -->
<div id="modalView" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Văn bản liên quan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<tr>
								<td>Số văn bản</td>
								<td id="modal_so"></td>
							</tr>
							<tr>
								<td>Trích yếu</td>
								<td id="modal_trichyeu"></td>
							</tr>
							<tr>
								<td>Ngày ban hành</td>
								<td id="modal_ngaybanhanh"></td>
							</tr>
							<tr>
								<td>Loại</td>
								<td><span id="modal_loai"></span></td>
							</tr>
							<tr>
								<td>Trạng thái</td>
								<td><span id="modal_trangthai"></span></td>
							</tr>
							<tr>
								<td>Cấp</td>
								<td><span id="modal_cap"></span></td>
							</tr>
							<tr>
								<td>Cơ quan ban hành</td>
								<td><span id="modal_coquanbanhanh"></span></td>
							</tr>
							<tr>
								<td>Người ký</td>
								<td><span id="modal_nguoiky"></span></td>
							</tr>
							<tr>
								<td>Tải file</td>
								<td>
									<span id="modal_url"></span>
								</td>
							</tr>
						</table>
					</div>
						
					
					
					
				</div>
				
			</div>
			
		</div>
		

	</div>
</div>