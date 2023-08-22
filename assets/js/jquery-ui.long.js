var url_site = 'http://10.172.45.102/source_tracnghiem';
$(document).ready(function(){
		
		var phut = 30;
		var giay = 0;
		var timer = setInterval(function(){
			giay--;
			if(giay<0){
				phut--;
				giay=59;
			}
			//console.log(phut,giay);

			//Hiện thời gian cho đẹp hơn
			if(phut <10){
				text_timer = '0' + phut;
			}else{
				text_timer = phut;
			}
			text_timer += ':';
			if(giay <10){
				text_timer += '0' + giay;
			}else{
				text_timer += giay;
			}
			
			$('#time_countdown').html(text_timer);

			//khi đếm đến 0 -> tự động nhấn nút gửi
			if(phut <= 0 && giay <= 0){
				$('#frm_kiemtra').submit();
				clearInterval(timer);
			}
		}, 1000);
	
		
		// $('#sel_donvi').change(function(){
		// 	if($(this).val() == '-1'){
		// 		$('#txt_donvi').removeClass('hidden');
		// 	}else{
		// 		if(!$('#txt_donvi').hasClass('hidden')){
		// 			$('#txt_donvi').addClass('hidden');
		// 		}
		// 	}
		// });
		// $('.input_number').keyup(function(){

		// 	str = $(this).val();
		// 	var regexp = /[0-9]/g;
		// 	var matches_array = str.match(regexp);
		// 	//console.log(str, matches_array);
		// 	$(this).val((matches_array || []).join(''));
		// });

		$('#frm_kiemtra').submit(function(e){
			e.preventDefault();
			// console.log(phut, giay);
			// alert('dangchay2');
			
			if(phut<=0 && giay<=0){
				gui_baithi(this);
			}else{
				confirm = true;
				var check = check_cautraloi();
				//console.log('check');
				if(check != 0){
					//phát hiện có câu chưa trả lời
					confirm = false;//confirm("Bạn chưa trả lời " + check + " câu hỏi. Có chắc chắn muốn gửi bài thi?");
					Swal.fire({
					  title: 'Xác nhận',
					  text: "Bạn chưa trả lời " + check + " câu hỏi. Có chắc chắn muốn gửi bài thi?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#d33',
					  cancelButtonColor: '#3085d6',
					  confirmButtonText: 'Gửi bài thi',
					  cancelButtonText: 'Kiểm tra lại',
					}).then((result) => {
					  if (result.value) {
						confirm = true;
						//Nếu chọn vẫn gửi
						gui_baithi(this);
					  }else{
						//Nếu chọn kiểm tra lại -> bên trên đã đặt confirm = false rồi nên không cần làm gì
						
					  }
					});
					
				}else{
					gui_baithi(this);
				}
			}
				
		});
});

	function gui_baithi(node){
		$(node).addClass('hidden');
		var data = $(node).serialize();
		$(node).find('input[type=radio]').each(function(){
			$(this).val('');
		});
		//$ds_cauhoi = $(node).serialize();
		//console.log($ds_cauhoi);
		$.ajax({
			url: $(node).attr('action'),
			type: $(node).attr('method'),
			data: data,
			dataType: 'JSON',
			success: function(result){
				var user_id = result.id;
				if(result.status == 'success'){
					swal.fire({
						icon: result.status,
						title: 'Thành công',
						text: result.message,
						timer: 3000
					}).then((result) => {
						location.href=url_site+'/kiemtra_kq/'+user_id;
					});
				}else{
					
					swal.fire({
						icon: result.status,
						title: 'Thất bại',
						text: result.message,
						timer: 3000
					}).then((result) => {
						location.href=url_site+'/kiemtra_kq/'+user_id;
					});
				}

			},
			error: function (request, status, error) {
				alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
				console.log(request.responseText, error);
				location.href=url_site;
			}
		});
	}
	function gui_baithi_nhanh(node){
		$(node).addClass('hidden');
		var data = $(node).serialize();
		$(node).find('input[type=radio]').each(function(){
			$(this).val('');
		});
		//$ds_cauhoi = $(node).serialize();
		//console.log($ds_cauhoi);
		$.ajax({
			url: $(node).attr('action'),
			type: $(node).attr('method'),
			data: data,
			dataType: 'JSON',
			success: function(result){
				var user_id = result.id;
				if(result.status == 'success'){
					alert('Thành công:' + result.message);
					location.href=url_site+'/kiemtra_kq/'+user_id;
				}else{
					alert('Thất bại:' + result.message);
					location.href=url_site+'/kiemtra_kq/'+user_id;
				}

			},
			error: function (request, status, error) {
				alert("Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.")
				console.log(request.responseText, error);
				location.href=url_site;
			}
		});
	}

	function check_cautraloi(){
		console.log('check cau tra loi');
		var chua_traloi = 0;
		//Kiểm tra đã check đầy đủ đáp án cho từng câu hỏi
		//Lấy ds câu trả lời của 1 câu hỏi
		$('.div_cauhoi').each(function(){
			console.log($(this));
			//Tìm xem người dùng đã chọn câu trả lời chưa? trả lời rồi: ds_traloi = 1
			var ds_traloi = $(this).find('input[type=radio]:checked');
			console.log(ds_traloi);
			if(ds_traloi.length == 0){
				//Đánh dấu câu chưa trả lời
				chua_traloi++;
				$(this).addClass('div_chuatraloi');
			}else{
				if($(this).hasClass('div_chuatraloi')){
					$(this).removeClass('div_chuatraloi');
				}
			}
			
		});
		console.log(chua_traloi+'/29');
		
		// if(chua_traloi != 0){
		// 	alert("Bạn chưa trả lời " + chua_traloi + " câu hỏi. Có chắc chắn muốn gửi bài thi?");
		// }
		return chua_traloi;
	}