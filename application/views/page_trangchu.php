<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="media/images/poster1.jpg" alt="poster1" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="media/images/poster2.png" alt="poster2" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="media/images/baolucgiadinh1.jpg" alt="poster3" class="d-block" style="width:100%">
    </div>
	<div class="carousel-item">
      <img src="media/images/baolucgiadinh4.jpg" alt="poster4" class="d-block" style="width:100%">
    </div>
	<div class="carousel-item">
      <img src="media/images/poster5.jpg" alt="poster5" class="d-block" style="width:100%">
    </div>
  </div>
    <!-- Indicators/dots -->
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
		<button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
		<button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
		<button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
		<button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>

	</div>
  
  <!-- Left and right controls/icons -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<script>
			// Activate Carousel
		$("#demo").carousel();

		// Enable Carousel Indicators
		$(".carousel-item").click(function(){
		$("#demo").carousel(0);
		});

		// Enable Carousel Controls
		$(".carousel-control-prev").click(function(){
		$("#demo").carousel("prev");
		});
</script>