<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<title><?=WEBSITE_TITLE?></title>
		<base href="<?=base_url() ?>">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/font-awesome.min.css" media="all" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/bootstrap.min.css" media="all" />
		<!-- slicknav CSS -->
		<link rel="stylesheet" href="assets/template/css/slicknav.min.css">
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" href="assets/template/css/owl.carousel.min.css">
		<!-- Lightbox CSS -->
		<link rel="stylesheet" href="assets/template/css/lightbox.min.css"/>
		<!-- Animate CSS -->
		<link rel="stylesheet" href="assets/template/css/animate.min.css">

		<link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">
		<link rel="stylesheet" href="assets/select2/dist/css/select2.css">

		<!-- Main style CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/style.css" media="all" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/responsive.css" media="all" />
		<!-- Các block trong website -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/block.css" media="all" />
		<!-- Các css của rieng template này -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/custom.css" media="all" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"media="all" />
		
		<script src="assets/template/js/jquery.min.js"></script>
		<script src="assets/sweetalert2/dist/sweetalert2.js"></script>
		<script src="assets/sweetalert2/dist/sweetalert2.all.js"></script>
		<script src="assets/select2/dist/js/select2.js"></script>
		<script src="https://kit.fontawesome.com/af4f4c0266.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- Page loader -->
		<div id="preloader"></div>
		<div class="menubar">
			<div class="menu_shadow">
				<div class="container">
				
					<div class="row">
						<div class="col-md-12">
							<div class="pull-left text-center" id="logo_in_menu1">
								
								<h3 id="slogan" style="font-size: 0.65em; color: #D30505">
								<a href='http://timhieuphapluatbdg.cantho.gov.vn/'>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TÌM HIỂU PHÁP LUẬT VỀ BÌNH ĐẲNG GIỚI 
									<br>PHÒNG NGỪA VÀ ỨNG PHÓ BẠO LỰC TRÊN CƠ SỞ GIỚI
								</a>
								</h3>
							</div>

							<div class="responsive-menu pull-right"></div>
							<div class="mainmenu">
								
								<ul id="primary-menu" >
									<li><a href="index">Trang chủ</a></li>
									<li><a href="gioi_thieu">Giới thiệu</a></li>
									
									<!-- <li><a href="tin_tuc">Tin tức tổng hợp <i class="fa fa-angle-down"></i></a>
										<ul>
											<li><a href="page/tin-tuc-su-kien">Tin tức - Sự kiện</a></li>
											<li><a href="page/thong-tin-tuyen-truyen">Thông tin tuyên truyền</a></li>
											<li><a href="page/thong-bao">Thông báo</a></li>
											
										</ul>
									</li> -->

									<!-- <li><a href="chuong_trinh">Chương trình chuyển đổi số <i class="fa fa-angle-down"></i></a>
										<ul>
											<li><a href="page/ke-hoach-chuyen-doi-so">Kế hoạch chuyển đổi số</a></li>
											<li><a href="page/giai-phap-chuyen-doi-so">Giải pháp chuyển đổi số</a></li>
											<li><a href="page/nhiem-vu-trong-tam">Nhiệm vụ trọng tâm</a></li>
											<li><a href="page/cac-chuong-trinh-de-an-lien-quan">Các chương trình, đề án liên quan</a></li>
											<li><a href="page/ung-dung-chuyen-doi-so">Ứng dụng chuyển đổi số</a></li>
											<li><a href="page/can-tho-chuyen-doi-so">Cần Thơ chuyển đổi số</a></li>
											<li><a href="page/kinh-nghiem-hay-chuyen-doi-so">Kinh nghiệm hay chuyển đổi số</a></li>
											<li><a href="page/danh-gia-xep-hang-chuyen-doi-so">Đánh giá xếp hạng chuyển đổi số</a></li>
											<li><a href="page/hop-tac-chuyen-giao">Hợp tác, chuyển giao</a></li>
											<li><a href="page/nhiem-vu-trong-tam">Nhiệm vụ trọng tâm</a></li>
										</ul>
									</li> -->
									<!-- <li class="active"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
										<ul>
											<li><a href="faq.html">FAQ</a></li>
											<li class="active"><a href="gallery.html">Gallery</a></li>
											<li><a href="cart.html">Cart</a></li>
											<li><a href="checkout.html">Checkout</a></li>
										</ul>
									</li> -->
									<!-- <li><a href="van_ban_lien_quan">Văn bản liên quan</a></li>
									<li><a href="javascript:;">Tài liệu <i class="fa fa-angle-down"></i></a>
										<ul>
											<li><a href="page/tai-lieu-hoi-thao-chuyen-doi-so">Tài liệu - Hội thảo chuyển đổi số</a></li>
											<li><a href="page/sach-tham-khao">Sách tham khảo</a></li>
										</ul>
									</li> -->
									<li><a href="the_le_cuoc_thi">Thể lệ cuộc thi</a></li>
									<li><a href="giai_thuong">Giải thưởng</a></li>
									<!-- <li><a href="page/tham_khao">Thông tin tham khảo</a></li> -->
									<li><a href="lien_he">Liên hệ</a></li>
									<li><a href="ds_ketqua">Tra Cứu Kết Quả</a>
									<li><a href="dangnhap"><i class="fa-solid fa-user-gear fa-bounce" style="color: #195dd2;"></i></a></li>
									<li><a href="kiemtra" target="_parent" class="btn btn-warning form-control main menu " style="text-align: center; width: 150px; color: maroon;" ><strong>THAM GIA THI</strong></a></li>
									
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			
		</div><!-- menu area end -->

		<section class="ftco-section">
			<div class="" id="main_container" style="min-height: 525px; background-color:white">
				<?php if ($page != 'page_trangchu'): ?>
					<div class="header" style="height: 140px; overflow: hidden;">
						<img src="media/images/CanThoPano.png	" style="width: 100%;">
					</div>
				<?php endif ?>
		        <?php $this->view($page) ?>
			</div>
		</section>

		<section>
			<div id="footer" class="footer">
				<div class="row">
					<div class="col-md-6" >
						<h5 class="mb-3">
							<!-- <?=WEBSITE_TITLE ?> -->
						 TÌM HIỂU PHÁP LUẬT VỀ BÌNH ĐẲNG GIỚI
						<br>PHÒNG NGỪA VÀ ỨNG PHÓ BẠO LỰC TRÊN CƠ SỞ GIỚI
						</h5>
						<p>
						<i class="fa-regular fa-calendar-days" style="color: #ffffff;"></i>  Thời gian: Diễn ra từ 15/6/2024 đến hết 15/10/2024
						</p>
						<p>
						<i class="fa-solid fa-house" style="color: #ffffff;"></i> Đơn vị quản lý: Trung tâm Công nghệ thông tin và Truyền thông 
						</p>
					</div>
					<div class="col-md-3 mt-4">
						<?php if ($page != 'kiemtra_test' && $page != 'kiemtra_dangky'): ?>
							<a href="kiemtra" target="_parent" class="btn btn-warning form-control p-3"><h3>Tham gia thi</h3></a>
						<?php endif ?>	
					</div>
					<div class="col-md-3" style="padding-top: 5px; ">
						<?php $this->view('counter/counter'); ?>

						<div class="text-center" style="padding-top: 5px; font-size: 0.7em">
							Xây dựng và thiết kế bởi <a href="http://ctict.cantho.gov.vn" style="color:blue">Trung Tâm CNTT & TT</a>	
						</div>
					</div>
				</div>
					
				
			</div>
		</section>

		

		

		
		
		<!-- Poppers JS -->
		<script src="assets/template/js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/template/js/bootstrap.min.js"></script>
		<!-- slicknav JS -->
		<script src="assets/template/js/jquery.slicknav.min.js"></script>
		<!-- owl carousel JS -->
		<script src="assets/template/js/owl.carousel.min.js"></script>
		<!-- Isotope JS -->
		<script src="assets/template/js/isotope-3.0.4.min.js"></script>
		<!-- Bx slider JS -->
		<script src="assets/template/js/jquery.bxslider.min.js"></script>
		<!-- lightbox JS -->
		<script src="assets/template/js/lightbox.min.js"></script>
		<!-- Wow JS -->
		<script src="assets/template/js/wow-1.3.0.min.js"></script>
		<!-- Google map api -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXNQbOV3ZGoxAQ_H2FtRAS_i9yOdZFfBo&region=GB"></script>
		<!-- Imagezoom JS -->
		<script src="assets/template/js/jquery.imagezoom.js"></script>
		<!-- main JS -->
		<script src="assets/template/js/main.js"></script>
		<script src="https://kit.fontawesome.com/af4f4c0266.js" crossorigin="anonymous"></script>
		<script>
			$('#carousel_slide').carousel({ 
				interval: 5000
			});
			//code run cacoursel sp
			// $('#carousel_sp').on('slide.bs.carousel', function (e) {
			// 	var $e = $(e.relatedTarget);
			// 	console.log($e);
			// 	var idx = $e.index();
			// 	var itemsPerSlide = 5;
			// 	var totalItems = $('#carousel_sp .carousel-item').length;
				
			// 	if (idx >= totalItems-(itemsPerSlide-1)) {
			// 		var it = itemsPerSlide - (totalItems - idx);
			// 		for (var i=0; i<it; i++) {
			// 			// append slides to end
			// 			if (e.direction=="left") {
			// 				$('#carousel_sp .carousel-item').eq(i).appendTo('#carousel_sp .carousel-inner');
			// 			}
			// 			else {
			// 				$('#carousel_sp .carousel-item').eq(0).appendTo('#carousel_sp .carousel-inner');
			// 			}
			// 		}
			// 	}
			// });
  	// 		$('#carousel_sp').carousel({ 
			// 	interval: 2000
			// });

			//code run cacoursel video
			// $('#carousel_video').on('slide.bs.carousel', function (e) {
			// 	var $e = $(e.relatedTarget);
			// 	console.log($e);
			// 	var idx = $e.index();
			// 	var itemsPerSlide = 4;
			// 	var totalItems = $('#carousel_video .carousel-item').length;
				
			// 	if (idx >= totalItems-(itemsPerSlide-1)) {
			// 		var it = itemsPerSlide - (totalItems - idx);
			// 		for (var i=0; i<it; i++) {
			// 			// append slides to end
			// 			if (e.direction=="left") {
			// 				$('#carousel_video .carousel-item').eq(i).appendTo('#carousel_video .carousel-inner');
			// 			}
			// 			else {
			// 				$('#carousel_video .carousel-item').eq(0).appendTo('#carousel_video .carousel-inner');
			// 			}
			// 		}
			// 	}
			// });
  	// 		$('#carousel_video').carousel({ 
			// 	interval: 2000
			// });

			$(document).ready(function() {
				// $('#carousel_sp .carousel-item').first().addClass('active');
				// /* show lightbox when clicking a thumbnail */
				// $('#carousel_sp a.thumb').click(function(event){
				// 	event.preventDefault();
				// 	var content = $('#carousel_sp .modal-body');
				// 	content.empty();
				// 	var title = $(this).attr("title");
				// 	$('#carousel_sp .modal-title').html(title);        
				// 	content.html($(this).html());
				// 	$("#carousel_sp .modal-profile").modal({show:true});
				// });


				// $('#carousel_video .carousel-item').first().addClass('active');
				// /* show lightbox when clicking a thumbnail */
				// $('#carousel_video a.thumb').click(function(event){
				// 	event.preventDefault();
				// 	var content = $('#carousel_video .modal-body');
				// 	content.empty();
				// 	var title = $(this).attr("title");
				// 	$('#carousel_video .modal-title').html(title);        
				// 	content.html($(this).html());
				// 	$("#carousel_video .modal-profile").modal({show:true});
				// });

			});
		</script>
	</body>
</html>
