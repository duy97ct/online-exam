<!-- Modal -->
<div id="modalEditCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="admin/sua_category" method="POST" id="frmEditCategory">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Cập nhật chuyên mục</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Tên chuyên mục</label>
          <input type="text" name="ten" class="form-control" id="txt_TenEdit">
          <input type="hidden" name="id" value="" id="txt_IdEdit">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" form="frmEditCategory" class="btn btn-warning">Cập nhật</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>

  </div>
</div>