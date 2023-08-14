
<div class="row form-group">
    <div class="col-md-12">
        <button class="btn btn-success" data-toggle="modal" data-target="#modal_add_cauhoi">Thêm câu hỏi</button>
    </div>
</div>

<?php foreach($ds_cau_hoi as $cauhoi): ?>
    <div class="row boder boder-primary bg-white form-group pt-3 pb-3">
        <div class="col-md-1 text-center">
            <i class="fa fa-edit text-info " onclick="ajax_chitiet_cauhoi(<?=$cauhoi->get('CH_ID') ?>)"></i>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="fa fa-trash text-danger"  data-id="<?=$cauhoi->get('CH_ID'); ?>" onclick="xoa_cauhoi(this);"></i>
        </div>
  		<div class="col-md-11">
  			<?= $cauhoi->get('CH_TEXT'); ?>
            <div class="row"> 
                <?php foreach($cauhoi->ds_cau_tra_loi() as $tra_loi): ?>
                <div class="col-md-6">
                    <?php if($tra_loi->get('CTL_DUNG') == 1):?>
                        <i class="fa fa fa-check-square-o"></i>
                    <?php else: ?>
                        <i class="fa fa-square-o"></i>
                    <?php endif; ?>
                    <?= $tra_loi->get('CTL_TEXT'); ?>
                </div>
                <?php endforeach; ?>
            </div>
  		</div>
	</div>	
	<?php endforeach; ?>
</div>
<div class="modal" id="modal_add_cauhoi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="admin/add_cauhoi" method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Thêm câu hỏi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                Câu hỏi: <br/>
                <input type="text" class="form-control" name="cauhoi" />
            </div>
            <div class="col-md-1 text-center">
                <input type="radio" name="status" value="0"> 
            </div>
            <div class="col-md-11">
                <input type="text" class="form-control" name="traloi[0]">
            </div>
            <div class="col-md-1 text-center">
                <input type="radio" name="status" value="1">  
            </div>
            <div class="col-md-11">
                <input type="text" class="form-control" name="traloi[1]">
            </div>
            <div class="col-md-1 text-center">
                <input type="radio" name="status" value="2">  
            </div>
            <div class="col-md-11">
                <input type="text" class="form-control" name="traloi[2]">
            </div>
            <div class="col-md-1 text-center">
                <input type="radio" name="status" value="3">  
            </div>
            <div class="col-md-11">
                <input type="text" class="form-control" name="traloi[3]">
            </div>
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="modal_edit_cauhoi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="frm_sua" action="admin/sua_cauhoi" method="POST">
          <input type="hidden" id="hid_sua_cauhoi" name="id_cauhoi" value="">
          <div class="modal-header">
            <h5 class="modal-title">Sửa câu hỏi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
            	<div class="col-md-12">
                    Câu hỏi: <br/>
                    <input id="txt_sua_cauhoi" type="text" class="form-control" name="cauhoi" />
                </div>
                <div class="col-md-1 text-center">
                    <input id="txt_sua_status0" type="radio" name="status" value="0"> 
                </div>
                <div class="col-md-11">
                    <input type="hidden" id="txt_sua_tlid0" name="traloi[0][id]">
                    <input id="txt_sua_tl0" type="text" class="form-control" name="traloi[0][noidung]">
                </div>
                <div class="col-md-1 text-center">
                    <input id="txt_sua_status1" type="radio" name="status" value="1">  
                </div>
                <div class="col-md-11">
                    <input type="hidden" id="txt_sua_tlid1" name="traloi[1][id]">
                    <input id="txt_sua_tl1" type="text" class="form-control" name="traloi[1][noidung]">
                </div>
                <div class="col-md-1 text-center">
                    <input id="txt_sua_status2" type="radio" name="status" value="2">  
                </div>
                <div class="col-md-11">
                  <input type="hidden" id="txt_sua_tlid2" name="traloi[2][id]">
                    <input id="txt_sua_tl2" type="text" class="form-control" name="traloi[2][noidung]">
                </div>
                <div class="col-md-1 text-center">
                    <input id="txt_sua_status3" type="radio" name="status" value="3">  
                </div>
                <div class="col-md-11">
                    <input type="hidden" id="txt_sua_tlid3" name="traloi[3][id]">
                    <input id="txt_sua_tl3" type="text" class="form-control" name="traloi[3][noidung]">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Lưu</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          </div>

        </form>
    </div>
  </div>
</div>
<script>
    function ajax_chitiet_cauhoi(id){
        $.ajax({
            url:'admin/ajax_chitiet_cauhoi/'+id,
            type: 'GET',
            dataType:'JSON',
            success: function(result){
                console.log(result);
                $('#hid_sua_cauhoi').val(result.cauhoi.CH_ID);
                $('#txt_sua_cauhoi').val(result.cauhoi.CH_TEXT);
                for(var i=0; i<4;i++){
                    if(result.traloi[i] == 'undefined'){
                        $('#txt_sua_tlid'+i).val(0); 
                        $('#txt_sua_tl'+i).val(''); 
                    }else{
                        $('#txt_sua_tlid'+i).val(result.traloi[i].CTL_ID); 
                        $('#txt_sua_tl'+i).val(result.traloi[i].CTL_TEXT); 
                        //Nếu câu trả lời là dúng --> check vào combobox tương ứng
                        if(result.traloi[i].CTL_DUNG == 1){
                          $('#txt_sua_status'+i).attr('checked','checked');
                        }
                    }
                   
                }
                $('#modal_edit_cauhoi').modal('show');

            },
            error: function(xhr){
                console.log(xhr);
                Swal.fire(
                  'Lỗi!',
                  'Có lỗi trong quá trình cập nhật, vui lòng thử lại',
                  'error'
                );
            }
        });
    }

    $('#frm_sua').submit(function(){

    });
    function xoa_cauhoi(node){
        Swal.fire({
          title: 'Xác nhận',
          text: "Có chắc muốn xóa câu hỏi?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Xóa',
          cancelButtonText: 'Không xóa'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                url:'admin/xoa_cauhoi/'+$(node).attr('data-id'),
                type: 'GET',
                dataType:'JSON',
                success: function(result){
                    if(result.status == 'success'){
                        Swal.fire(
                          'Đã xóa!',
                          result.content,
                          'success'
                        );
                        location.reload();
                    }else{
                        Swal.fire(
                          'Thất bại!',
                          result.content,
                          'success'
                        );
                        console.log(result.error);
                    }
                },
                error: function(xhr){
                    console.log(xhr);
                    Swal.fire(
                      'Lỗi!',
                      'Có lỗi trong quá trình xóa, vui lòng thử lại',
                      'error'
                    );
                }
            })
                        
          }
        })
        //alert("xoa cau hoi");
    }
</script>