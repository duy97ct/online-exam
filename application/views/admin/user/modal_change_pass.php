<!-- Modal -->
<div id="modalChangePass" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="admin/change_pass_user" method="POST" id="frmChangePass">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Đổi mật khẩu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
          <label for="">Tên tài khoản</label>
          <input type="hidden" name="username" value="" id="hid_username">
          <input type="text" name="" class="form-control" id="txt_username" readonly>
        </div>
        <div class="form-group">
          <label for="">Mật khẩu mới</label>
          <input type="password" name="new_password" class="form-control" autocomplete="new-password" >
        </div>
        <div class="form-group">
          <label for="">Nhập lại mật khẩu mới</label>
          <input type="password" name="new_password2" class="form-control">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" form="frmChangePass" class="btn btn-primary">Thay đổi</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
    </form>

  </div>
</div>