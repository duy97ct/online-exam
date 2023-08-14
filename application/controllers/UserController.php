<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class UserController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('nguoi_dung_model');
        $this->load->model('User_model');
    }

    public function index(){
    	//Hien ds cau hoi
    	$ds_user = $this->User_model->all();
    	//var_dump($ds_cau_hoi);
    	
    	$data['ds_user'] = $ds_user;
    	
    	$this->admin_template('admin/user/ds_user',$data);
    }
    public function ajax_ds_taikhoan()
    {
        $ds_user = $this->User_model->all();
        echo json_encode($ds_user);
    }

    public function add_user()
    {
        //var_dump($_REQUEST);
        $hoten = $_REQUEST['new_hoten'];
        $username  = $_REQUEST['new_username'];
        $password = $_REQUEST['new_password'];
        //Kiểm tra có trùng username không
        $user = $this->User_model->find($username);
        if($user != NULL){
            $message = ['status' => 'error', 'content' => 'Tên tài khoản đã tồn tại'];
        }else{
            //thêm user mới
            $data = [
                        'U_USERNAME' => $username,
                        'U_PASSWORD' => md5($password),
                        'U_TEN' => $hoten,
                        'U_LEVEL' => 1,
                        'U_STATUS' => 1
                    ];
            $kq = $this->User_model->add($data);
            if(is_array($kq)){
                $message = ['status' => 'error', 'content' => "Thêm tài khoản thất bại, vui lòng kiểm tra lại", 'error' => $this->db->error()];
            }else{
                $message = ['status' => 'success', 'content' => 'Thêm tài khoản thành công'];
            }
        }
            
        echo json_encode($message);
    }

    public function change_pass_user()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['new_password'];
        $user = $this->User_model->find($username);
        $user->set('U_PASSWORD', md5($password));
        $kq = $user->save();
        if($kq === 0){
            $message = ['status' => 'error', 'content' => "Cập nhật mật khẩu thất bại, vui lòng kiểm tra lại", 'error' => $this->db->error()];
        }else{
            $message = ['status' => 'success', 'content' => 'Cập nhật mật khẩu thành công'];
        } 
        echo json_encode($message);
    }

    public function lock_user($id)
    {
        $user = $this->User_model->find($id);
        if($user != NULL){
            $user->set('U_STATUS',0);
            $kq = $user->save();
            if($kq === 0){
                $message = ['status' => 'error', 'content' => "Khóa tài khoản thất bại, vui lòng kiểm tra lại", 'error' => $this->db->error()];
            }else{
                $message = ['status' => 'success', 'content' => 'Khóa tài khoản thành công'];
            } 
            
        }else{
            $message = ['status' => 'error', 'content' => "Khóa tài khoản thất bại, không tồn tại người dùng trong hệ thống", 'error' => $this->db->error()];
        }
        echo json_encode($message);
    }

    public function unlock_user($id)
    {
        $user = $this->User_model->find($id);
        if($user != NULL){
            $user->set('U_STATUS',1);
            $kq = $user->save();
            if($kq === 0){
                $message = ['status' => 'error', 'content' => "Mở khóa tài khoản thất bại, vui lòng kiểm tra lại", 'error' => $this->db->error()];
            }else{
                $message = ['status' => 'success', 'content' => 'Mở khóa tài khoản thành công'];
            } 
            
        }else{
            $message = ['status' => 'error', 'content' => "Mở khóa tài khoản thất bại, không tồn tại người dùng trong hệ thống", 'error' => $this->db->error()];
        }
        echo json_encode($message);
    }


    public function del_user($id)
    {
        $user = $this->User_model->find($id);
        if($user != null){
            $kq = $user->del();
            if(is_array($kq)){
                $message = ['status' => 'error', 'content' => "Thêm tài khoản thất bại, vui lòng kiểm tra lại", 'error' => $this->db->error()];
            }else{
                $message = ['status' => 'success', 'content' => 'Thêm tài khoản thành công'];
            }
        }else{
            $message = ['status' => 'error', 'content' => 'Người dùng không tồn tại'];
            
        }
        echo json_encode($message);
    }

    
}
