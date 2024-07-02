<style>
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        .row {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .col-12 {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
    </style>
<div class="layout-content">
  <div class="container-fluid">
    <div class="carousel box-shadow widget-banner" >
      <div class="owl-carousel owl-theme owl-loader owl-drag" id="quytrinh">
          <a title="Bạo lực gia đình" href="#">
            <img alt="anh ve cuoc thi" class="img-responsive" src="media/images/anhnen.jpg" title=""/>
          </a>
    </div>
  </div>
</div>
<button id="back-to-top" style="display: inline-block;"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

<!-- <script type="text/javascript">

	$(document).ready(function() {
		$('#quytrinh').owlCarousel({
			//loop: true,
			margin: 5,
			responsiveClass: true,
			autoplay:true,
			dots:false,
			loop: true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			responsive: {
				0: {
					items: 1,

				},
				430: {
					items: 2,

				},
				600: {
					items: 2,

				},
				800: {
					items: 3,
				},
				1000: {
					items: 1,

				}
			},
      onInitialized: function() {
            // Lấy ra các phần tử hình ảnh trong carousel và thay đổi kích thước
            $('#quytrinh').find('.owl-item img').css('width', '70%');
        }
		})

	})

</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#quytrinh').owlCarousel({
            margin: 5,
            responsiveClass: true,
            autoplay: true,
            dots: false,
            loop: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 1 },
                430: { items: 2 },
                600: { items: 2 },
                800: { items: 3 },
                1000: { items: 1 }
            },
            onInitialized: function() {
            // Lấy ra các phần tử hình ảnh trong carousel và thay đổi kích thước
            $('#quytrinh .owl-item img').css({
                'width': '50%',
                'height': '50%',
                'object-fit': 'cover'  // Đảm bảo hình ảnh không bị bể hoặc kéo dãn
            });
        });
    });
</script>
<!-- <div class="container"> -->

<div class="row">
	<div class="col-12 col-md-4" style="padding: 10px; flex-direction: column; display: flex">
    <div class="widget-videos">
      <div class="widget-title position-relative">Hướng dẫn</div>
        <div class="widget-content">
          <ul>
            <li>
              <div class="thumbnail">
                <a href="#" target="_blank">
                  <img src="media/images/baolucgiadinh1.jpg" alt="Hướng dẫn thí sinh">
                </a>
              </div>
              <h4><a href="#" target="_blank">Hướng dẫn thí sinh</a></h4>
			  
            </li>
          </ul>
        </div>
      </div>
		</div>
	<div class="col-12 col-md-8" style=" padding: 10px">
		<div class="widget-notifications">
      <div class="widget-title position-relative">
        Thông báo từ Ban Tổ chức
        <span class="icon-notif" style=" width: 10%; right: 10px; bottom: -30px;"></span>
      </div>
	<div class="widget-content">
		<ul>
			<li>
				<a href="gioi_thieu" target="_self">Kế hoạch Tổ chức Cuộc thi trực tuyến &quot;Tìm hiểu pháp luật về phòng, chống bạo lực gia đình trên địa bàn Thành Phố Cần Thơ&quot; năm 2023</a>
				<span>Ngày 16/08/2023</span>
			</li>
			<li>
				<a href="the_le_cuoc_thi" target="_self">Thể lệ Cuộc thi &quot;Tìm hiểu pháp luật về phòng, chống bạo lực gia đình trên địa bàn Thành Phố Cần Thơ&quot; năm 2023</a>
				<span>Ngày 17/08/2023</span>
			</li>
		</ul>
	</div>
</div>

<!----chuc nang cuon ve dau trang-->
<script>
        $(document).ready(function() {
        // Hiển thị nút bấm khi trang web cuộn xuống 200px
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
            $('#back-to-top').fadeIn();
            } else {
            $('#back-to-top').fadeOut();
            }
        });

        // Thêm chức năng bấm nút để cuộn về đầu trang
        $('#back-to-top').click(function() {
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
        });
    </script>