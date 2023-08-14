<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="assets/slideshow/dist/css/slider-pro.css" media="screen"/>
<script type="text/javascript" src="assets/slideshow/dist/js/jquery.sliderPro.js"></script>
<style>
    #MainSlideshow p.sp-layer{
        width: 100%;
        height: 108px;
    }
    #MainSlideshow p.sp-black a{
        color: #fff;
        width:100%;
    }
    .slider-pro{
        border: 1px solid #cccccc;
    }
    .sp-thumbnail-title{
        padding-left:5px;
        padding-bottom: 15px;
    }
    
</style>
<script type="text/javascript">
    $( document ).ready(function( ) {
        $( '#MainSlideshow' ).sliderPro({
            width: 960,
            height: 500,
            arrows: true,
            buttons: false,
            waitForLayers: true,
            thumbnailWidth: 202,
            thumbnailHeight: 120,
            thumbnailPointer: true,
            autoplay: true,
            autoScaleLayers: false,
            breakpoints: {
                500: {
                    thumbnailWidth: 120,
                    thumbnailHeight: 110,//50
                }
            }
        });
    });
</script>

<div id="MainSlideshow" class="slider-pro">
        <div class="sp-slides">
            <?php for($i=0; $i<count($ds_baiviet); $i++): ?>
                <?php if($ds_baiviet[$i]->get('BV_HINH_ANH') == NULL) $ds_baiviet[$i]->set('BV_HINH_ANH','image_blank.jpg') ?>
                <?php $tomtat = strip_tags($ds_baiviet[$i]->get('BV_NOI_DUNG')); ?>
            <div class="sp-slide">
                <img class="sp-image" src="assets/slideshow/src/css/images/blank.gif"
                    data-src="media/images/<?= $ds_baiviet[$i]->get('BV_HINH_ANH') ?>"
                    data-retina="media/images/<?= $ds_baiviet[$i]->get('BV_HINH_ANH') ?>"/>

                <p class="sp-layer sp-black sp-padding" 
                    data-position="bottomLeft"
                    data-show-transition="up" data-hide-transition="down">
                    <a href="baiviet/<?= $ds_baiviet[$i]->get('BV_ID') ?>">
                        <strong style="display: inline-block; padding-bottom: 15px; "><?= $ds_baiviet[$i]->get('BV_TIEU_DE'); ?></strong><br/>
                        <?= $tomtat;?>...
                    </a>
                </p>
            </div>
            <?php endfor ?>
        </div>
        <div class="sp-thumbnails">
            <?php for($i=0; $i<count($ds_baiviet); $i++): ?>
            <div class="sp-thumbnail">
                <div class="sp-thumbnail-title"><?= $ds_baiviet[$i]->get('BV_TIEU_DE') ?></div>
                <!-- <div class="sp-thumbnail-description">Tomtat</div> -->

            </div>
  
            <?php endfor ?>
        </div>
  
</div>