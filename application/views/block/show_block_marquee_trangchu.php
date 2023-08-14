<div class="block_ditich_01">
  <div class="block_ditich_01_header">
    <?= $cat->get('CAT_NAME') ?>
  </div>
  <div class="block_ditich_01_content" >
    <marquee behavior="loop" direction="up" scrollamount="3" id="marquee_trangchu">
    <?php if ($ds_baiviet != NULL && count($ds_baiviet) > 0): ?>
      <ul>
        <?php foreach ($ds_baiviet as $bv): ?>
          <li style="padding-bottom: 13px;">
            <a href="baiviet/<?=$bv->get('BV_ID') ?>"><?= $bv->get('BV_TIEU_DE') ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    <?php else: ?>

      Mục tin không có bài viết
    <?php endif ?>
    </marquee>
  </div>
</div>
<style>
#marquee_trangchu ul{
  padding-left: 1.2rem;
}
#marquee_trangchu ul li::before {
  content: "\25AA";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
  color: red; /* Change the color */
  /*font-size: 16pt;
  line-height: 16pt;*/

  font-weight: bold; /* If you want it to be bold */
  display: inline-block; /* Needed to add space between the bullet and the text */
  width: 0.8rem; /* Also needed for space (tweak if needed) */
  margin-left: -1.1rem; /* Also needed for space (tweak if needed) */
}
</style>
<script>
  $(document).ready(function(){
    var height = $('#MainSlideshow').css('height');
    $('#marquee_trangchu').css('height',(parseInt(height)-58));
  })
</script>

