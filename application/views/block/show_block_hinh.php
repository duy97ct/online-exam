<style>
  
</style>
<div class="block_ditich_hinh">
  <div class="block_ditich_hinh_header">
    <?= $cat->get('CAT_NAME') ?>
  </div>
  <div class="block_ditich_hinh_content">
    <?php if ($ds_baiviet != NULL && count($ds_baiviet) > 0): ?>
      
    
      <div class="row mb-2">
        
        <div class="col-md-12">
          <div class="pull-left block_ditich_hinh_img">
            <img class="img_hinh" src="media/images/<?= $ds_baiviet[0]->get('BV_HINH_ANH') ?>" alt="Hình minh họa" style="">
          </div>
          <div class="col-md-12 block_ditich_hinh_title">
            <?= $ds_baiviet[0]->get('BV_TIEU_DE') ?>
              
          </div>
          <div class="block_ditich_hinh_noi_dung">
            <?= $ds_baiviet[0]->get('BV_NOI_DUNG') ?>
          </div>
        </div>
          
      </div>
      <div class="clearfix"></div>
      <?php if (count($ds_baiviet)>1): ?>
        <ul>
          <!-- chỉ hiện 3 bài viết -->
          <?php for($i=1; $i<min(4,count($ds_baiviet)); $i++): ?>
            <li>
              <a href="baiviet/<?=$ds_baiviet[$i]->get('BV_ID') ?>"><?=$ds_baiviet[$i]->get('BV_TIEU_DE') ?></a>
            </li>
          <?php endfor ?>
          
        </ul>
      <?php endif ?>
    <?php else: ?>
      <div class="row">
        <div class="col-md-12">
          Mục tin không có bài viết
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
            
          