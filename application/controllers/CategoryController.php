<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class CategoryController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Bai_viet_model');
		$this->load->model('Category_model');
		$this->load->model('nguoi_dung_model');
	}
	/* public static function show_block($cat_id){
		$ci =& get_instance();
		$ci->load->model('Category_model');
		$cat = $ci->Category_model->find($cat_id);
		return $cat;
	} */

	public static function get_cat_by_alias($alias){
		$ci =& get_instance();
        $ci->load->model('Category_model');
		$cat = $ci->Category_model->where(['CAT_ALIAS_NAME' => $alias]);
		if($cat != null){
			return $cat[0]->get('CAT_ID');
		}else{
			return NULL;
		}
	}

	public static function show_sitemap(){
		$ci =& get_instance();
        $ci->load->model('Category_model');
		$data['ds_cat'] = $ci->Category_model->where(['CAT_PARENT_ID' => NULL]);
		if($data['ds_cat'] != NULL){
			$html = $ci->load->view('admin/category/sitemap',$data,'TRUE');
			//var_dump($html);
			return $html;
		}else{
			return NULL;
		}
	}

	public function index()
	{
		$ds_cat = $this->Category_model->where(['CAT_PARENT_ID' => NULL]);
		$ds_category = array();
		foreach($ds_cat as &$cat){
			$ds_category[] = $cat;
			$cat->children = $this->Category_model->where(['CAT_PARENT_ID' => $cat->get('CAT_ID')]);
			if($cat->children != NULL)
			foreach ($cat->children as &$c) {
				$ds_category[] = $c;
				$c->children = $this->Category_model->where(['CAT_PARENT_ID' => $c->get('CAT_ID')]);
				if($c->children != NULL)
				foreach ($c->children as $cc) {
					$ds_category[] = $cc;
				}
			}

		}
		$data['ds_category'] = $ds_category;//$this->Category_model->all();
		$this->admin_template('admin/category/ds_category', $data);
	}
	public function add_category()
	{
		//var_dump($_REQUEST);
		$ten = $_REQUEST['ten'];
		$category_cha = $_REQUEST['category_cha'];
		if($category_cha == '') $category_cha = NULL;
		//echo $ten;
		$data = [
					'CAT_ID' => $this->Category_model->max_id()+1,
					'CAT_NAME' => $ten,
					'CAT_PARENT_ID' => $category_cha
				];
		$result = $this->Category_model->add($data);
		//echo $this->db->last_query(); exit();
		redirect('admin/ds_category');
	}

	public function ajax_sua_category()
	{
		$id = $_REQUEST['id'];
		$category = $this->Category_model->find($id);
		echo json_encode($category->to_array());
	}
	public function sua_category()
	{
		$id = $_REQUEST['id'];
		$ten = $_REQUEST['ten'];
		$cat = $this->Category_model->find($id);
		$cat->set('CAT_NAME',$ten);
		//var_dump($cat); exit();
		$kq = $cat->save();
		if(!is_array($kq)){
			$message = ['status' => 'success', 'content' => "Thêm thành công"];
		}else{
			$message = ['status' => 'success', 'content' => 'Thêm thất bại, vui lòng kiểm tra lại', 'error' => $this->db->error()];
		}
		echo json_encode($message);
	}

	public function xoa_category()
	{
		$id = $_REQUEST['id'];
		$cat = $this->Category_model->find($id)->del();
		if($cat == true){
			$message = ['status' => 'success', 'content' => "Câu hỏi đã được xóa"];
		}else{
			$message = ['status' => 'error', 'content' => 'Xoa that bai', 'error' => $this->db->error()];
		}
		echo json_encode($message);
	}
}