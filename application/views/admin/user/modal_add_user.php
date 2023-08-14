<!-- Modal -->
<div id="modalAddUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="admin/add_user" method="POST" id="frmAddUser">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Thêm tài khoản</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
          <label for="">Họ tên</label>
          <input type="text" name="new_hoten" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Tên tài khoản</label>
          <input type="text" name="new_username" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Mật khẩu</label>
          <input type="password" name="new_password" class="form-control" autocomplete="new-password" >
        </div>
        <div class="form-group">
          <label for="">Nhập lại mật khẩu</label>
          <input type="password" name="new_password2" class="form-control">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" form="frmAddUser" class="btn btn-success">Thêm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
    </form>

  </div>
</div>