<div class="row">	
	<div class="col-md-12">	
		<h3>Quản lý người dùng</h3>
	</div>
</div>
<div class="row bg-white p-3">
	<div class="col-md-6  offset-md-3">
		
		<form action="admin/ds_nguoidung" id="frm_Search" method="POST">
			<!-- <div class="row form-group">
				<div class="col-md-4">
					<label for="">Quận huyện</label>
				</div>
				<div class="col-md-8">
					<select name="quanhuyen" class="form-control">
						<option value="">Tất cả quận, huyện</option>
						<?php foreach ($ds_quanhuyen as $quanhuyen): ?>
							<option value="<?=$quanhuyen->get('QH_ID') ?>" 
							<?=($search_quanhuyen == $quanhuyen->get('QH_ID'))?'selected':'' ?> ><?= $quanhuyen->get('QH_TEN') ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div> -->
			<div class="row form-group">
				<div class="col-md-4">
					<label>Từ ngày</label>
					<input type="date" name="tungay" class="form-control" value="<?=$tungay?>" />
				</div>
				<div class="col-md-4">
					<label>Đến ngày</label>
					<input type="date" name="denngay" class="form-control" value="<?=$denngay?>" />
				</div>

				<!-- chọn đơn vị -->
				<div class="col-md-4">
					<form action="admin/ds_nguoidung" id="search_donvi" method="post">
						<label for="lang-select">Chọn Đơn Vị</label>
						<select name="lang" id="lang-select">
							<option value="">--Chọn đơn vị--</option>
							<option value="1">Văn phòng UBND Thành phố Cần Thơ</option>
							<option value="2">Sở Thông tin và Truyền thông</option>
							<option value="3">Sở Công Thương</option>
							<option value="4">Sở Lao động - Thương binh và Xã hội</option>
							<option value="5">Sở Tài chính</option>
							<option value="6">Sở Khoa học và Công nghệ</option>
							<option value="7">Sở Tư pháp</option>
							<option value="8">Sở Tài nguyên và Môi trường</option>
							<option value="9">Sở Nông nghiệp và Phát triển nông thôn</option>
							<option value="10">Sở Kế hoạch và Đầu tư</option>
							<option value="12">Sở Văn hóa, Thể thao và Du lịch</option>
							<option value="13">Sở Giao thông vận tải</option>
							<option value="14">Sở Giáo dục và Đào tạo</option>
							<option value="15">Thành đoàn Cần Thơ</option>
							<option value="16">Sở Y tế</option>
							<option value="18">Ban Quản lý khu chế xuất và khu công nghiệp</option>
							<option value="19">Sở Ngoại vụ</option>
							<option value="20">Văn phòng Hội đồng nhân dân thành phố Cần Thơ</option>
							<option value="21">Sở Nội vụ</option>
							<option value="22">Sở Xây dựng</option>
							<option value="23">Thanh tra thành phố</option>
							<option value="25">Ban Dân tộc thành phố</option>
							<option value="26">UBND quận Ninh Kiều</option>
							<option value="27">UBND quận Ô Môn</option>
							<option value="28">UBND quận Bình Thủy</option>
						</select>
					</form>
				</div>
			</div>
			<!-- chọn đơn vị -->


			<div class="row form-group">
				<div class="col-md-12">
					<input type="checkbox" name="traloi_dung" <?= ($search_traloi_dung == 1)?'checked':'' ?>> &nbsp; <label for="">Trả lời đúng</label>
				</div>
				
			</div>
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button type="submit" form="frm_Search" class="btn btn-primary">Tìm kiếm</button> &nbsp;&nbsp;&nbsp;
					<button type="reset" class="btn btn-default">Nhập lại</button>
					<button type="button" class="btn btn-warning" id="btnXuatExcel">Xuất excel</button>
				</div>
					
			</div>
		</form>
	</div>
	<div class="col-md-12 bg-white">	
		<table class="table table-bordered" id="datatable">
			<thead>
				<td>STT</td>
				<td>Họ tên</td>
				
				<td>SĐT</td>
				<!-- <td>Quận/Huyện</td> -->
				<td>Địa chỉ</td>
				<td>Đơn vị</td>
				<td>Ngày dự thi</td>
				<td>Số câu trả lời đúng</td>
				<td>Dự đoán</td>
				<td>Action</td>
			</thead>
			<tbody>
				<?php if ( is_countable($ds_nguoidung) && count($ds_nguoidung) > 0): ?>
					<?php $stt=1; foreach($ds_nguoidung as $nguoidung): ?>
						<tr data-id="<?= $nguoidung->get('ND_ID') ?>">
							<td class="text-right"> <?= $stt++; ?> </td>
							<td> <?= $nguoidung->get('ND_TEN') ?> </td>
							
							<td> <?= $nguoidung->get('ND_SDT') ?> </td>
							
							<td> <?= $nguoidung->get('ND_DIA_CHI') ?> </td>
							<td> <?= $nguoidung->get_donvi() ?> </td>
							<td><?= date('d/m/Y H:i:s',strtotime($nguoidung->get('ND_NGAY_TAO'))) ?></td>
							<td class="text-center"> <?= $nguoidung->get_ketqua()['mark'] ?></td>
							<!-- <td class="text-center"> <?= $nguoidung->get_ketqua()['mark'] ?>/<?= $nguoidung->get_ketqua()['total'] ?></td> -->
							<td class="text-right"> <?= $nguoidung->get('ND_SO_NGUOI') ?> </td>
							<td class="text-right">
								<a href="admin/xem_kiemtra/<?= $nguoidung->get('ND_ID') ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
								<button class="btn btn-danger btnXoa" type="button" ><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif ?>
					
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#datatable').dataTable({
			"language": {
				"url": "assets/datatable/Vietnamese.json"
			},
			"iDisplayLength": 25,
			 "order": [[ 4, 'desc' ]]
		});

		$('#btnXuatExcel').click(function(e){
			e.preventDefault();
			$.ajax({
				url: 'admin/export_excel_nguoidung',
		    	type: 'POST',
		    	data: $('#frm_Search').serialize(),
		    	dataType: 'JSON',
		    	success:function(kq){
		    		//$(node).parents('tr').remove();
		    		//Code download file
					window.location.href = kq.file;
				},
				error: function (request, status, error) {
					alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
					console.log(request.responseText, error);
				}
			})

		});

		$('.btnXoa').click(function(){
			Swal.fire({
			  title: 'Xác nhận xóa',
			  text: "Bạn có chắc muốn xóa người dùng này?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  //cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Xóa',
			  cancelButtonText: 'Không xóa',
			}).then((result) => {
			  if (result.value) {
				node = $(this);
				$.ajax({
					url: 'del_nguoidung/'+$(node).parents('tr').attr('data-id'),
					type: 'GET',
					dataType: 'JSON',
					success:function(result){
						$(node).parents('tr').remove();
						Swal.fire(
							'Đã xóa',
							result.message,
							result.status,
						);

					},
					error: function (request, status, error) {
						alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
						console.log(request.responseText, error);
					}
				})
				
			  }
			})
		});
	});
</script>