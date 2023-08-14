<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

class api_test extends API_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('chuc_nang_model');
    }

    private $dokhan = array(
                            1 => "Bình thường",
                            2 => "Khẩn"
                        );

    private $domat = array(
                            1 => "Bình thường",
                            2 => "Mật"
                        );

    private $loaivanban = array(
                            1 => 'Công văn',
                            2 => 'Công văn',
                        );

    public function ds_donvi()
    {
        header("Access-Control-Allow-Origin: *");

        $this->load->model('don_vi_model');
        
        $timkiem = $this->input->get('timkiem',true);
        //echo $timkiem;
        if($timkiem != NULL) $ds_don_vi = $this->don_vi_model->filter($timkiem);
        else $ds_don_vi = $this->don_vi_model->all();
        //echo $this->db->last_query();
        //var_dump($ds_don_vi);

        $kq = array();
        if(count($ds_don_vi) > 0){
            foreach ($ds_don_vi as $don_vi) {
                $kq[] = array(
                            'DV_ID' => $don_vi->get('DV_ID'),
                            'DV_TEN' => $don_vi->get('DV_TEN'),
                        );
            }
        }
        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => "Success",
                "data" => $kq,
            ],
        200);
    }



    /**
     * Check API Key
     *
     * @return key|string
     */
    private function key()
    {
        // use database query for get valid key
        return 1452;
    }


    /**
     * login method 
     *
     * @link [api/user/login]
     * @method POST
     * @return Response|void
     */
    public function login()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
        ]);

        // you user authentication code will go here, you can compare the user with the database or whatever
        $username = $_POST['username'];
        $password = $_POST['password'];
        $donvi =$_POST['donvi'];
        $kq = $this->check_dangnhap($donvi,$username,$password);
        if($kq == false){
            // return data
            $this->api_return(
                [
                    'status' => false,
                    "result" => "Dang nhap that bai",
                ],
            200);
        }else{
            $payload = [
                'id' => $username,
                'donvi' => $donvi,
                'password' => $password,
                'time' => date('Y-m-d H:i:s'),
            ];
            // Load Authorization Library or Load in autoload config file
            $this->load->library('authorization_token');

            // generate a token
            $token = $this->authorization_token->generateToken($payload);

            // return data
            $this->api_return(
                [
                    'status' => true,
                    'result' => 'Đăng nhập thành công',
                    'token' => $token
                ],
            200);
        }
        
    }

    function call_liferay_API($url, $username, $password){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, "UTF-8" );
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

        $data_result = curl_exec($ch);
        $error = curl_error($ch);
        
        if ($error != ""){
            // Gặp lỗi trong quá trình gọi API qua PHP
            echo "<script>alert('Gặp lỗi trong quá trình load API')</script>";
            return false;
        }
        //Trường hợp lấy API thành công
        
        $result = array( 'header' => '',
                         'body' => '',
                         'curl_error' => '',
                         'http_code' => '',
                         'last_url' => '');
        $header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);

        $result['header'] = substr($data_result, 0, $header_size);
        $result['body'] = substr( $data_result, $header_size);
        $result['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result['last_url'] = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        //Lấy thông tin trong phần body
        $data = json_decode(mb_convert_encoding($result['body'], "ISO-8859-1", "UTF-8"), true);
        if($data == NULL){
            return false;
        }else{
            return $data;
        }
       
        curl_close($ch);
    }

    private function check_dangnhap($donvi,$username,$password){
        $url = "http://qlvb1.cantho.gov.vn/api/secure/jsonws/user/get-user-by-screen-name?companyId=".$donvi."&screenName=".$username; 
        return $this->call_liferay_API($url, $username, $password);
    }

    public function api_get_info($token){
        header("Access-Control-Allow-Origin: *");
		$_GET['authorization']= $token;
        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['GET'],
            /**
             * Number limit, type limit, time limit (last minute)
             * Trong khoảng thời gian $time_limit, tính theo $type_limit có không quá $numbet_limit người dùng vào phần mềm
             */
            'limit' => [100, 'ip', 1],
            'requireAuthorization' => true,
        ]);

        $user_data = $this->check_token('GET');

        $info = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);

        // return data
        $this->api_return(
            [
                'status' => true,
                'info' => $info
            ],
        200);
    }


    public function api_change_password(){
        $user_data = $this->check_token('POST'); 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_new = $_POST['password_new'];
        //B1: check pass cũ
        $check_password = $this->check_dangnhap($donvi,$username,$password);
        if($check_password == false){
            // return data
            $this->api_return(
                [
                    'status' => false,
                    "result" => "Dang nhap that bai",
                ],
            200);
        }else{
            //Đúng mật khẩu ==> thay mật khẩu mới
            
        }
    }

    // Hàm kiểm tra đăng nhập:  trả về thông tin đã nhập từ token
    public function view()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['GET'],
            /**
             * Number limit, type limit, time limit (last minute)
             * Trong khoảng thời gian $time_limit, tính theo $type_limit có không quá $numbet_limit người dùng vào phần mềm
             */
            'limit' => [100, 'ip', 1],
            'requireAuthorization' => true,
        ]);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'user_data' => $user_data['token_data']
                ],
            ],
        200);
    }

    //method = GET, POST, PUT
    //Hàm kiểm tra token và chuyển token về username, password và id đơn vị
    public function check_token($method)
    {
        
        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => [$method],
            /**
             * Number limit, type limit, time limit (last minute)
             * Trong khoảng thời gian $time_limit, tính theo $type_limit có không quá $numbet_limit người dùng vào phần mềm
             */
            'limit' => [100, 'ip', 1],
            'requireAuthorization' => true,
        ]);

        return $user_data['token_data'];
    }

    //Lấy thông tin người dùng hiện tại
    public function get_info($donvi,$username,$password){
        $url = "http://qlvb1.cantho.gov.vn/api/secure/jsonws/user/get-user-by-screen-name?companyId=".$donvi."&screenName=".$username;
        $data = $this->call_liferay_API($url, $username,$password);
        return $data;
    }

    //lấy thông tin phòng ban của người dùng hiện tại
    public function get_user_organizations($userId,$username,$password){
        $url = "http://qlvb1.cantho.gov.vn/api/secure/jsonws/organization/get-user-organizations?userId=".$userId;
        $company_info = $this->call_liferay_API($url, $username,$password);
        return $company_info[0];
    }


    //test tìm cách lấy JSON về có dấu tiếng Việt
    public function get_phongban($user_data){
        header('Content-type: text/JSON; charset=utf-8');
        //$user_data = ['id' => 'vanthu', 'password' => '123', 'donvi' => 10156];
        $user = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        $userId = $user['userId'];
        $username = $user_data['id'];
        $password = $user_data['password'];
        

        $url = "http://qlvb1.cantho.gov.vn/api/secure/jsonws/organization/get-user-organizations?userId=".$userId;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_ENCODING, "UTF-8" );
        $data_result = curl_exec($ch);
        $error = curl_error($ch);
        
        if ($error != ""){
            // Gặp lỗi trong quá trình gọi API qua PHP
            return false;
        }
        //Trường hợp lấy API thành công
        //Lấy thông tin trong phần body

        //var_dump($data_result);
        //echo "<br/>==>";
        //$data_result = mb_convert_encoding($data_result, 'UTF-8', 'ISO-8859-1');
        $data_result = str_replace("\xEF\xBB\xBF",'',$data_result); 
        //var_dump(json_decode($data_result,true));
        //echo json_last_error();
        //echo json_last_error_msg();
        $data = $data_result;
        
        if($data == NULL){
            return false;
        }else{
            return $data;
        }
       
        curl_close($ch);
    }


    //Lấy ds văn bản đến cần xử lý
    public function get_sl_vbden_canxl($user_data){
        $user = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        //var_dump($user_data['donvi']);
        //var_dump($user); exit();
        $company = $this->get_user_organizations($user['userId'], $user_data['id'], $user_data['password']);
        //var_dump($company);exit();
        if($company != NULL){
            $url = $this->chuc_nang_model->get_url($user_data['donvi'],1)."?companyId=".$user['companyId']."&groupId=0&resourceCodeId=3&nguoiXuLyId=".$user['userId']."&toChucXuLyId=".$company['organizationId'];
            $ds_vbden = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        }else{
            $ds_vbden = NULL;
        }
        
        if($ds_vbden == NULL or $ds_vbden == false){
            return 0;
        }else{
            return count($ds_vbden);
        }
        
    }

    public function get_vbden_canxl(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET');   
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        //$user_data = ['id' => 'vanthu', 'password' => '123', 'donvi' => 10156];
        $user = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        $company = $this->get_user_organizations($user['userId'], $user_data['id'], $user_data['password']);
        
        $url = $this->chuc_nang_model->get_url($user_data['donvi'],1)."?companyId=".$user['companyId']."&groupId=0&resourceCodeId=3&nguoiXuLyId=".$user['userId']."&toChucXuLyId=".$company['organizationId'];
        //echo $url;
        // var_dump($company);
        // var_dump($user);
        $ds_vbden = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        //var_dump($ds_vbden);
        if(!$ds_vbden){
            //Trường hợp không có văn bản đến nào
            $vbden = NULL;
        }else{
            foreach ($ds_vbden as &$vbden) {
                $vbden = json_decode(base64_decode($vbden));
                //var_dump($vbden);
                //echo "<br/><br/>";
            }
        }
        
        //var_dump($ds_vbden);
        //$ds_vbden = base64_decode($ds_vbden);
        $this->load->view('ds_vbden_canxl',['ds_vbden' => $ds_vbden, 'data' => $data, 'token' => $token]);
        
    }

    //Lấy ds văn bản đi cần xử lý
    private function get_sl_vbdi_canxl($user_data){
        $user = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        $company = $this->get_user_organizations($user['userId'], $user_data['id'], $user_data['password']);
        $url = $this->chuc_nang_model->get_url($user_data['donvi'],2).
                "?companyId=".$user['companyId']."&groupId=0&resourceCodeId=4&nguoiXuLyId=".$user['userId']."&toChucXuLyId=".$company['organizationId'];
        $ds_vbdi = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        if($ds_vbdi == NULL or $ds_vbdi == false){
            return 0;
        }else{
            return count($ds_vbdi);
        }
        
    }

    public function get_vbdi_canxl(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET');   
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        //$user_data = ['id' => 'vanthu', 'password' => '123', 'donvi' => 10156];
        $user = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        $company = $this->get_user_organizations($user['userId'], $user_data['id'], $user_data['password']);
        $url = $this->chuc_nang_model->get_url($user_data['donvi'],2).
                "?companyId=".$user['companyId']."&groupId=0&resourceCodeId=4&nguoiXuLyId=".$user['userId']."&toChucXuLyId=".$company['organizationId'];
        //echo $url;
        // var_dump($company);
        // var_dump($user);
        $ds_vbdi = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        foreach ($ds_vbdi as &$vbdi) {
            $vbdi = json_decode(base64_decode($vbdi));
            //var_dump($vbden);
            //echo "<br/><br/>";
        }
        $this->load->view('ds_vbdi_canxl',['ds_vbdi' => $ds_vbdi, 'data' => $data, 'token' => $token]);
        
    }

    public function chitiet_vbden(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET'); 
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        $data['token'] = $token;
        $data['info'] = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        $idvb = $_GET['idvb'];
        $idcv = $_GET['idcv'];

        //Lây thông tin văn bản
        //$url = $this->chuc_nang_model->get_url($user_data['donvi'],3)."?vanbandenid=$idvb&congViecId=$idcv";
        $url = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/get-van-ban-den-chi-tiet"."?vanbandenid=$idvb&congViecId=$idcv";
        $vanban = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        if(is_array($vanban) && isset($vanban['exception'])){
            //Trường hợp không lấy được văn bản hoặc văn bản không còn tồn tại
            $this->session->set_flashdata('message','Văn bản không còn tồn tại');
            redirect('api/get_vbden_canxl?authorization='.$token);
            //echo json_encode($vanban);
            exit();
        }
        $vanban = json_decode(base64_decode($vanban));
        $vanban->congViecId =$idcv;
        //$vanban->vanbanid = $idvb;
        //var_dump($vanban);
        //$vanban['doKhanId'] = $this->dokhan[$vanban['doKhanId']];
        //$vanban['doMatId'] = $this->domat[$vanban['doMatId']];
        //$vanban['loaiVanBanId'] = loaiVanBan;//isset($this->loaivanban[$vanban['loaiVanBanId']])?$this->loaivanban[$vanban['loaiVanBanId']]:$vanban['loaiVanBanId'];

        //Lấy thông tin các nút xử lý
        $info = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        //var_dump($info['userId']);
        $url_nutxl = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/get-duong-chuyen-van-ban?congViecId=$idcv&resourceCodeId=3&userId=$info[userId]";
        $ds_nutxl = $this->call_liferay_API($url_nutxl, $user_data['id'],$user_data['password']);
        foreach ($ds_nutxl as &$nutxl) {
            $nutxl = json_decode(base64_decode($nutxl));
        }
        //var_dump($ds_nutxl); exit();
        $this->load->view('chitiet_vbden',['vanban' => $vanban, 'data' => $data, 'ds_nutxl' => $ds_nutxl, 'token' => $token]);

    }
    public function get_ds_nguoixuly(){
        $tenbuoc = $_REQUEST['tenbuoc'];
        $congViecId = $_REQUEST['congViecId'];
        $vanBanDenId = $_REQUEST['vanBanId'];
        //$token = $_REQUEST['token'];
        $user_data = $this->check_token('GET');
        $phongban = $this->get_phongban($user_data);
        //var_dump($phongban);
        $groupId = 10617;
        $tenbuoc2 = explode('_',$tenbuoc)[0];
        //echo $tenbuoc2;exit();
        if($tenbuoc2 == 'chuyengiamdoc' || $tenbuoc == 'chuyencungcap_gd'){
            //Trường hợp chọn chuyển ban giám đốc
            $url = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-chuyen-ban-giam-doc?congViecId=$congViecId&vanBanDenId=$vanBanDenId&groupId=$groupId";
        }else if($tenbuoc2 == 'chuyencvp' || $tenbuoc == 'chuyencungcap_cvp'){
            $url = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-chuyen-chanh-van-phong?congViecId=$congViecId&vanBanDenId=$vanBanDenId&groupId=$groupId";
        }else if($tenbuoc2 == 'chuyenxuly'){
            $url = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-chuyen-xu-ly?congViecId=$congViecId&vanBanDenId=$vanBanDenId&groupId=$groupId&resourceCodeId=0";
        }else if($tenbuoc2 == 'phancong'){
            $url = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-chuyen-phan-cong?congViecId=$congViecId&vanBanDenId=$vanBanDenId&groupId=$groupId";     
        }else if($tenbuoc == 'tralai:vuatiepnhan'){
            $url = "";
        }else if($tenbuoc == 'xoa'){
            $url = "";
        }else if($tenbuoc2 == 'ketthuc'){
            $url = "";
        }
        $ds_nguoixl = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        if(!$ds_nguoixl){
            $ds_nguoixl = array();
        }else{
             foreach ($ds_nguoixl as &$nguoixl) {
                $nguoixl = json_decode(base64_decode($nguoixl));
            }
        }  
        echo json_encode($ds_nguoixl);
    }


    public function chitiet_vbdi(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET');
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        $data['info'] = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        $idvb = $_GET['idvb'];
        $idcv = $_GET['idcv'];
        
        $data['token'] = $token;
        //Lây thông tin văn bản
        $url = $this->chuc_nang_model->get_url($user_data['donvi'],4)."?vanbandiid=$idvb&congViecId=$idcv";
        $vanban = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
        $vanban = json_decode(base64_decode($vanban));
        $vanban->congViecId = $idcv;
        $vanban->vanBanId = $idvb;
        //var_dump($vanban); //exit();
        //$vanban['doKhanId'] = $this->dokhan[$vanban['doKhanId']];
        //$vanban['doMatId'] = $this->domat[$vanban['doMatId']];
        //$vanban['loaiVanBanDiId'] = isset($this->loaivanban[$vanban['loaiVanBanDiId']])?$this->loaivanban[$vanban['loaiVanBanDiId']]:$vanban['loaiVanBanDiId'];

        //Lấy thông tin các nút xử lý
        /*$url_nutxl = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/get-duong-chuyen-van-ban?congViecId=$idcv& resourceCodeId=3&userId=$user_data[id]";
        $nutxl = $this->call_liferay_API($url_nutxl, $user_data['id'],$user_data['password']);
        */
        $info = $data['info'];
        $url_nutxl = "http://qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/get-duong-chuyen-van-ban?congViecId=$idcv&resourceCodeId=4&userId=$info[userId]";
        $ds_nutxl = $this->call_liferay_API($url_nutxl, $user_data['id'],$user_data['password']);

        //var_dump($ds_nutxl); exit();
        foreach ($ds_nutxl as &$nutxl) {
            $nutxl = json_decode(base64_decode($nutxl));
        }
        $this->load->view('chitiet_vbdi',['vanban' => $vanban, 'data' => $data, 'ds_nutxl' => $ds_nutxl, 'token' => $token]);

    }

    public function sent_vbden(){
        
        //var_dump($_REQUEST);
        $user_data = $this->check_token('GET');
        $info = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
        //var_dump($info);
        $mode = $_REQUEST['mode'];
    

        $userId = $_REQUEST['userId'];
        $congViecId = $_REQUEST['congViecId'];
        $tenbuoc = $_REQUEST['tenbuoc'];
        $duongChuyenId = $_REQUEST['duongChuyenId'];
        $nguoiXuLyTiepTheoId = $_REQUEST['nguoiXuLyTiepTheoId'];
        $toChucXuLyTiepTheoId = $this->get_user_organizations($nguoiXuLyTiepTheoId,$user_data['id'],$user_data['password'])['organizationId'];
        //var_dump($phongXuLyTiepTheoId); exit();

        $nguoiXuLyPhu = "";
        if(isset($_REQUEST['nguoiXuLyPhu'])) $nguoiXuLyPhu = implode(':',$_REQUEST['nguoiXuLyPhu']);
        else $nguoiXuLyPhu = "";
        //var_dump($nguoiXuLyPhu); exit();
        $thongTinXuLy = $_REQUEST['thongTinXuLy'];
        $groupId = 10617;

        //Sau khi chuyển thành công -> gửi thông báo đến điện thoại thông qua google firebase
        $soKyHieuGoc = $_REQUEST['soKyHieuGoc'];
        $mess = "Văn bản đến $soKyHieuGoc được gửi đến";
        $this->send_message($nguoiXuLyTiepTheoId, $mess);

        if($mode == "den"){
            $url="";
            //var_dump($tenbuoc);
            $tenbuoc2 = explode('_',$tenbuoc)[0];
            //var_dump($tenbuoc2);
            $data = 0;
            if($tenbuoc2 == 'chuyengiamdoc' || $tenbuoc == 'chuyencungcap_gd'){
                $url = "http:/qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-signal-ban-giam-doc?userId=$userId&groupId=$groupId&congViecId=$congViecId&nguoiXuLyTiepTheoId=$nguoiXuLyTiepTheoId&toChucXuLyTiepTheoId=$toChucXuLyTiepTheoId&duongChuyenId=$duongChuyenId&nguoiXuLyThayId=0&nguoiXuLyPhus=$nguoiXuLyPhu&thongTinXuLy=".urlencode($thongTinXuLy)."&phongXuLyThayId=0";
                $data = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
                //echo json_encode($data);
            }else if($tenbuoc2 == 'chuyencvp' || $tenbuoc == 'chuyencungcap_cvp'){
                $url = "http:/qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-signal-chanh-van-phong?userId=$userId&groupId=$groupId&congViecId=$congViecId&nguoiXuLyTiepTheoId=$nguoiXuLyTiepTheoId&toChucXuLyTiepTheoId=$toChucXuLyTiepTheoId&duongChuyenId=$duongChuyenId&nguoiXuLyThayId=0&nguoiXuLyPhus=$nguoiXuLyPhu&thongTinXuLy=".urlencode($thongTinXuLy)."&phongXuLyThayId=0";
                $data = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
                //echo json_encode($data);
            }else if($tenbuoc2 == 'chuyenxuly'){
                $cachThucXuLyId = $_REQUEST['cachThucXuLy'];
                $soNgayXuLy = $_REQUEST['soNgayXuLy'];
                //var_dump($nguoiXuLyTiepTheoId);
                //var_dump($info['companyId']);
                $url = "http:/qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-signal-chuyen-xu-ly?companyId=$info[companyId]&userId=$userId&groupId=$groupId&congViecId=$congViecId&duongChuyenId=$duongChuyenId&nguoiXuLyThayId=0&noiDungXuLy=".urlencode($thongTinXuLy)."&tochucXuLyThayId=0&cachThucXuLyId=$cachThucXuLyId&soNgayXuLy=$soNgayXuLy&arrNguoiNhanChinhs=$nguoiXuLyTiepTheoId &nguoiNhanPhu=$nguoiXuLyPhu";
                $data = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
                //echo "<br/><br/>";
                //var_dump($data);
                //echo json_encode($data);
            }else if($tenbuoc2 == 'phancong'){
                //var_dump($info);
                $companyId = $info['companyId'];
                $nguoiXuLyThayId = $nguoiXuLyTiepTheoId;//0;
                $toChucXuLyThayId = $toChucXuLyTiepTheoId; //0;
                $soNgayXuLy = $_REQUEST['soNgayXuLy'];
                $url = "http:/qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-signal-chuyen-phan-cong?companyId=$companyId&userId=$userId&groupId=$groupId&duongChuyenId=$duongChuyenId&congViecId=$congViecId&nguoiXuLyTiepTheoId=$nguoiXuLyTiepTheoId&nguoiNhanPhu=$nguoiXuLyPhu&nguoiXuLyThayId=$nguoiXuLyThayId&toChucXuLyThayId=$toChucXuLyThayId&thongTinXuLy=".urlencode($thongTinXuLy)."&soNgayXuLy=$soNgayXuLy";
                $data = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);

            }

            //xử lý cho vb đen
            if($data === 0){
                $message = ['result' => 'error', 'error' => "Chưa có hàm chuyển cho: $tenbuoc"];
                echo json_encode($message);
            }else if($data === false){
                $message = ['result' => 'error', 'error' => "Có lỗi lúc load API"];
                echo json_encode($message);
            }else if(is_array($data)){
                //Trường hợp trả về lỗi hệ thống
               
                echo json_encode($data);
            }else{
                //Trường hợp chạy được hàm (có thể chạy xong hàm sẽ trả về lỗi)
                
                echo json_encode(json_decode($data));
            }
        }else{
            if($tenbuoc == 'chuyenduyet'){
                $cachThucXuLyId = $_REQUEST['cachThucXuLy'];
                $soNgayXuLy = $_REQUEST['soNgayXuLy'];
                //var_dump($nguoiXuLyPhu);
                //echo "<br/><br/><br/>";
                $url = "http:/qlvb1.cantho.gov.vn/ui-api-portlet/api/secure/jsonws/apimobile/vbden-signal-chuyen-xu-ly?companyId=$info[companyId]&userId=$userId&groupId=$groupId&congViecId=$congViecId&duongChuyenId=$duongChuyenId&nguoiXuLyThayId=0&noiDungXuLy=".urlencode($thongTinXuLy)."&tochucXuLyThayId=0&cachThucXuLyId=$cachThucXuLyId&soNgayXuLy=$soNgayXuLy&arrNguoiNhanChinhs=$nguoiXuLyTiepTheoId&nguoiNhanPhu=$nguoiXuLyPhu";
                $data = $this->call_liferay_API($url, $user_data['id'],$user_data['password']);
                //echo json_encode($data);
            }
            //var_dump($data);
            if(is_array($data)){
                //Trường hợp trả về lỗi hệ thống
                echo json_encode($data);
            }else{
                //Trường hợp chạy được hàm (có thể chạy xong hàm sẽ trả về lỗi)
                echo json_encode(json_decode($data));
            }
        }
        

        

        
        
        
    }
    public function ketthuc_vbden(){
        var_dump($_REQUEST);
    }
    public function xoa_vbden(){
        var_dump($_REQUEST);
    }

        public function dashboard(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET');
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        $this->load->view('dashboard',['data' => $data,'token' => $token]);
    }

    public function lich_lamviec(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET');
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        $this->load->view('lich_lamviec',['data' => $data,'token' => $token]);
    }

    public function show_by_google(){
        $token = $this->input->get('authorization');
        $user_data = $this->check_token('GET');
        $data['sl_vbden'] = $this->get_sl_vbden_canxl($user_data);
        $data['sl_vbdi'] = $this->get_sl_vbdi_canxl($user_data);
        $url = $this->input->get('url');
        $this->load->view('show_by_google',['data' => $data, 'url' => $url, 'token' => $token]);
    }

    //token device - dùng chuyển thông báo đến màn hình điện thoại qua firebase

    public function logout_token_device(){
        $this->load->model('Socket_user_model');
        $token_device = empty($_REQUEST['token_device']) ? NULL : $_REQUEST['token_device'];
        if($token_device == NULL){
            return false;
        }
        $result = $this->Socket_user_model->delete($token_device);
        if($result){
            $this->api_return(
                            [
                                'status' => 'ok',
                            ],
                        200);
        }else{
            $this->api_return(
                            [
                                'status' => 'error',
                                'error' => $this->db->error(),
                            ],
                        200);
        }
    }
    public function register_token_device() {
        $this->load->model('Socket_user_model');
        try {
            $token_device = empty($_REQUEST['token_device']) ? NULL : $_REQUEST['token_device'];
            if($token_device == NULL){
                return false;
            }


            $socket_id = empty($_REQUEST['socket_id']) ? NULL : $_REQUEST['socket_id'];
            $user_data = $this->check_token('GET');
            $info = $this->get_info($user_data['donvi'],$user_data['id'],$user_data['password']);
            //var_dump($info);
            $user_id = $info['userId'];
            $username = $user_data['id']; //empty($this->post('user_id')) ? NULL : $this->post('user_id');
            $user_type = 'mobile';//empty($this->post('user_type')) ? "Khách hàng" : $this->post('user_type');

            $options = array(
                'SU_TOKEN_DEVICE' => $token_device
            );

            $socket = $this->Socket_user_model->find($token_device);

            if ($socket) {
                $socket->set('SU_SOCKET_ID',$socket_id);
                $socket->set('SU_USER_ID',$user_id);
                $socket->set('SU_USER_NAME',$username);
                $socket->set('SU_USER_TYPE',$user_type);
                $result = $socket->save();
            } else {
                $params = array(
                    'SU_TOKEN_DEVICE' => $token_device,
                    'SU_SOCKET_ID' => $socket_id,
                    'SU_USER_ID' => $user_id,
                    'SU_USER_NAME' => $username,
                    'SU_USER_TYPE' => $user_type,
                    'SU_SYSTEM' => "QLVB_mobile"
                );
                $result = $this->Socket_user_model->add($params);
            }
            //echo $this->db->last_query();
            $error = $this->db->error();
            if ($error['code'] == 0) {

                //$this->response("ok", REST_Controller::HTTP_OK);
                $this->api_return(
                            [
                                'status' => 'ok',
                            ],
                        200);
            } else {
                //$this->response(array('error' => $result), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                $this->api_return(
                            [
                                'status' => 'error',
                                'error' => $error//$result,
                            ],
                        200);
            }
        } catch (Exception $exc) {
            //$this->response(array('error' => $exc), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            $this->api_return(
                        [
                            'status' => 'error',
                            'error' => $exc,
                        ],
                    200);
        }
    }

    public function insert_socket_post() {
        $this->load->model('Socket_user_model');
        try {
            $socket = $_REQUEST['socket_id'];
            $user = $_REQUEST['user_id'];

            $data = array(
                'SU_SOCKET_ID' => $socket,
                'SU_USER_ID' => $user
            );

            $result = $this->Socket_user_model->add($data);
            $error = $this->db->error();
            if ($error['code'] == 0) {
                //$this->response('ok', REST_Controller::HTTP_OK);
                $this->api_return(
                        [
                            'status' => 'ok',
                        ],
                    200);
            } else {
                //$this->response(array('error' => $result), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                $this->api_return(
                        [
                            'status' => 'error',
                            'error' => $error,
                        ],
                    200);
            }
        } catch (Exception $exc) {

            //$this->response(array('error' => $exc), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            $this->api_return(
                        [
                            'status' => 'error',
                            'error' => $exc,
                        ],
                    200);
        }
    }


    public function send_message($user_id, $content){
        //echo "$user_id : $content";
        $user_data = $this->check_token('GET');
        //var_dump($user_data);
        $this->load->model('Socket_user_model');

        $message = $content;
        $ds_device = $this->Socket_user_model->where(['SU_USER_ID' => $user_id]);//->get();
        
        //var_dump($ds_device); exit();
        $result = array();
        if(count($ds_device) > 0){
            foreach ($ds_device as $device) {
                //var_dump($device->data['SU_TOKEN_DEVICE']);
                $result[] = array(
                                'device' => $device->data['SU_TOKEN_DEVICE'],
                                'result' => $this->sendCloudMessaseToAndroid($device->data['SU_TOKEN_DEVICE'], $message)->success,
                            );
            }
        }
        
        // $this->api_return(
        //                 [
        //                     'status' => 'done',
        //                     'result ' => $result,
        //                 ],
        //             200);
    }

    private function sendCloudMessaseToAndroid($deviceToken = "", $message = "", $push_data = array()) {        
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAsrJr70k:APA91bE3mfQ40dloQKz-FuYEmu17LbMM_wM5jfcBq9W11ioubMquPvFpIU5mqfssfMLiZrJeIeEGIa1LLrBLdfXLslulJRsag32LGMDTvJCt8ArLZAUt6TEp7zt-Os535z1NrryWGDJz';
        // $msg = array(
        //     'notification' => array(
        //         "body" => $message,
        //         "title" => "Toyota Cần Thơ"
        //     ),
        //     'data' => $push_data
        // );            
        $fields = array();
        $fields['data'] = array(
            "link" => "1"
        );
        $fields['notification'] = array(
            "body" => $message,
            "title" => "QLVB mobile"
        );

        //$fields['data'] = $msg;
        if (is_array($deviceToken)) {
            $fields['registration_ids'] = $deviceToken;
        } else {
            $fields['to'] = $deviceToken;
        }
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $serverKey
        );   
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: '  .  curl_error($ch));
        }
        curl_close($ch);
        return json_decode($result);
    }  

    // private function sendCloudMessaseToClient($deviceToken = "", $message = "", $push_data = array()) {
    //     $url = $this->config->item('fcm_url');
    //     $serverKey = $this->config->item('legacy_server_key');
    //     $msg = array(
    //         'notification' => array(
    //             "body" => $message,
    //             "title" => "Toyota Cần Thơ"
    //         ),
    //         'data' => $push_data
    //     );
    //     $fields = array();
    //     $fields['data'] = array(
    //         "link" => "1"
    //     );
    //     $fields['notification'] = array(
    //         "body" => $message,
    //         "title" => "Toyota Cần Thơ"
    //     );
    //     if (is_array($deviceToken)) {
    //         $fields['registration_ids'] = $deviceToken;
    //     } else {
    //         $fields['to'] = $deviceToken;
    //     }
    //     $headers = array(
    //         'Content-Type:application/json',
    //         'Authorization:key=' . $serverKey
    //     );
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    //     $result = curl_exec($ch);
    //     if ($result === FALSE) {
    //         die('FCM Send Error: ' . curl_error($ch));
    //     }
    //     curl_close($ch);
    //     return $fields;
    // } 
}