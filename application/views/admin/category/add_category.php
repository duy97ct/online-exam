<!-- Modal -->
<div id="modalAddCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="admin/add_category" method="POST" id="frmAddCategory">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Thêm chuyên mục</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Tên chuyên mục</label>
          <input type="text" name="ten" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Chuyên mục cha</label>
          <select name="category_cha" class="form-control">
            <option value="" selected>Không có</option>
            <?php foreach ($ds_category as $cat): ?>
              <option value="<?=$cat->get('CAT_ID') ?>"><?=$cat->get('CAT_NAME') ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" form="frmAddCategory" class="btn btn-success">Thêm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
    </form>

  </div>
</div>