<div class="layout-content">
  <div class="container-fluid">
    <div class="carousel box-shadow widget-banner" >
      <div class="owl-carousel owl-theme owl-loader owl-drag" id="quytrinh" >
          <a title="Bạo lực gia đình" href="#">
            <img alt="anh ve cuoc thi" class="img-responsive" src="media/images/baolucgiadinh1.jpg" title=""/>
          </a>
    </div>
  </div>
</div>
<button id="back-to-top" style="display: inline-block;"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

<script type="text/javascript">

	// $(document).ready(function() {
	// 	$('#quytrinh').owlCarousel({
	// 		//loop: true,
  //     // width: 70%;
  //     // height: auto;
	// 		margin: 5,
	// 		responsiveClass: true,
	// 		autoplay:true,
	// 		dots:false,
	// 		loop: true,
	// 		autoplayTimeout:3000,
	// 		autoplayHoverPause:true,
	// 		responsive: {
	// 			0: {
	// 				items: 1,

	// 			},
	// 			430: {
	// 				items: 2,

	// 			},
	// 			600: {
	// 				items: 2,

	// 			},
	// 			800: {
	// 				items: 3,
	// 			},
	// 			1000: {
	// 				items: 1,

	// 			}
	// 		}
	// 	})

	// })
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
                $('#quytrinh').find('.owl-item img').css({
                'width': '100%',
                'height': 'auto',
                'max-width': '100%',
                'margin-left': 'auto',
                'margin-right': 'auto'
            });
            }
    });
});

</script>
<div class="container">

<div class="row">
	<div class="col-12 col-md-4" style="padding: 10px">
    <div class="widget-videos">
      <div class="widget-title">Hướng dẫn</div>
        <div class="widget-content">
          <ul>
            <li>
              <div class="thumbnail">
                <a href="#" target="_blank">
                  <img src="media/images/baolucgiadinh1.jpg" alt="Hướng dẫn thí sinh dự thi">
                </a>
              </div>
              <h4><a href="#" target="_blank">Hướng dẫn thí sinh dự thi</a></h4>
            </li>
			<li>
              <div class="thumbnail">
                <a href="#" target="_blank">
                  <img src="media/images/tailieu_thamkhao.jpg" alt="Tài liệu tham khảo">
                </a>
              </div>
              <!-- <h4><a href="media/images/vanbantest.pdf" target="_blank">Tài liệu tham khảo</a></h4> -->
              <h4><a href="https://drive.google.com/drive/u/0/folders/12SFXkrjf3zyg-l5dswtqjCOQmCqxQMca" target="_blank">Tài liệu tham khảo</a></h4>
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
			<!-- <li>
				<a href="https://drive.google.com/file/d/1qEeDWEZ-1L1OiSucsrF6FDW6hOAPyO75/view" target="_self">Kế hoạch Tổ chức Cuộc thi trực tuyến &quot;“Tìm hiểu pháp luật về Bình đẳng giới và phòng ngừa,

ứng phó với bạo lực trên cơ sở giới”&quot; năm 2023</a>
				<span>Ngày 16/08/2023</span>
			</li> -->
			<!-- <li>
				<a href="the_le_cuoc_thi" target="_self">Thể lệ Cuộc thi &quot;Tìm hiểu pháp luật về phòng, chống bạo lực gia đình trên địa bàn Thành Phố Cần Thơ&quot; năm 2023</a>
				<span>Ngày 16/08/2023</span>
			</li> -->
      <li>
				<a href="the_le_cuoc_thi" target="_self">Thể lệ Cuộc thi &quot;Demo thi Online Thành Phố Cần Thơ&quot; năm 2023</a>
				<span>Ngày 16/08/2023</span>
			</li>
      <?php if (count($ds_thongbao)>0): ?>
			<?php foreach ($ds_thongbao as $baiviet): ?>
        <li>
          <a href="baiviet/<?=$baiviet->get('BV_ID') ?>"" target="_self"><?= $baiviet->get('BV_TIEU_DE') ?></a>
          <span>Ngày <?=$baiviet->get('BV_NGAY_DANG') ?></span>
        </li>
      <?php endforeach ?>
      <?php else: ?>
        Nội dung đang cập nhật
      <?php endif ?>
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

<style>
    #quytrinh {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        width: 100%;
        margin-bottom: 20px;
    }

    .item {
        scroll-snap-align: start;
        flex: 0 0 auto;
        margin-right: 10px;
        max-width: 100%; /* Đảm bảo hình ảnh không vượt quá kích thước của phần tử cha */
    }

    .item img {
        width: 100%; /* Hình ảnh co dãn theo chiều rộng của phần tử cha */
        height: auto;
        display: block;
    }

    /* Đảm bảo các phần khác không bị chồng lấn */
    .layout-content {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Cài đặt hiển thị nút back-to-top */
    #back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        background-color: #ccc;
        border: none;
        color: #333;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 16px;
    }
</style>