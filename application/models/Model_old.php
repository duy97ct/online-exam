<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model extends CI_Model {
 	//public $table;
  //public $primary;
  public $data;
  public function __construct()
  {
    parent::__construct();
   
  }

  public function get($field){
  	if(isset($this->data[$field])){
  		return $this->data[$field];
  	}else{
  		return NULL;
  	}
  
  	
  }

  public function set($field, $value){
  	$this->data[$field] = $value;
  	return $this;
  }
  public function set_array($array_value){
    if($count($array_value) > 0){
      foreach ($array_value as $key => $value) {
        $this->set($key,$value);
      }
    }
    return $this;
  }

  public function remove_field($list, $fields){
  	foreach ($list as &$item) {
  		foreach ($fields as $field) {
  			//var_dump($item->data,$field);
	  		unset($item->data[$field]);
	  		//var_dump($item->data);
  		}
  		
  	}
  	
  	return $list;
  }
  public function delete_field($field){
    unset($this->data[$field]);
  }

  public function all(){
  	
  	$ds_result = $this->db->get($this->table)->result();
  	if(!$ds_result){
  		//Truong hop khong lay duoc data
  		return NULL;
  	}else{
  		//truong hop lay dc data
  		$kq = array();
  		
  		foreach ($ds_result as $result) {
  			
  			foreach ($result as $key => $value) {
  				$this->set($key, $value); 	
  			} 
  		
  			$kq[] = clone $this;

  		}
			return $kq;
  	}
  }

  public function find($id){
  	$query = $this->db->where($this->primary,$id);
  	$ds_result = $this->db->get($this->table)->result();
  	if(!$ds_result){
  		return NULL;
  	}else{
      $ds_field = get_object_vars($ds_result[0]);
      foreach ($ds_field as $key => $value) {
        //Tung field trong row
        $this->set($key,$value);
      }
  		return $this;
  	}
  }

  public function where($where){
  	foreach ($where as $key => $value) {
  		$this->db->where($key,$value);
  	}
  	$ds_result = $this->db->get($this->table)->result();
  	if(!$ds_result){
  		return NULL;
  	}else{
  		$kq = array();
  		foreach ($ds_result as $result) {
  			//Tung row trong kq tra ve
  			// $tmp = new Model();
  			// $tmp->table = static::$table;
  			// $tmp->primary = static::$primary;
  			$ds_field = get_object_vars($result);
  			foreach ($ds_field as $key => $value) {
  				//Tung field trong row
  				$this->set($key,$value);
  			}
  			$kq[] = clone $this;
  		}
  		return $kq;
  	}
  }

  public function add($content = NULL){
  	// if($content != NULL){
  	// 	//Neu co thay doi thuoc tinh -> thay doi
  	// 	foreach ($content as $key => $value) {
	  // 		$this->data[$key] = $value;
	  // 	}
  	// }
    if($content == NULL){
      $error = ['code' => 0, 'message' => "Không có thông tin để lưu"];
      return $error;
    }
  	
  	//Luu CSDL
  	$this->db->insert($this->table, $content);

    $error = $this->db->error();
    if($error['code'] != 0){
      return $error;
    }else{
      return $this->db->insert_id();
    }

  	//return $this;
  }

  public function save(){
    $data = $this->data;
    //var_dump($data);
    $obj = $this->find($this->data[$this->primary]);
    if($obj == NULL){
      $query = $this->add($this->data);
    }else{
      //trường hợp đã có dữ liệu trong CSDL
      $this->db->where($this->primary, $this->data[$this->primary]);
      $query = $this->db->update($this->table, $data);
    }
    if($query == false){
      return 0;
    }else{
      return $this;
    }
  	
  }

  public function del(){
  	$result = $this->db->where($this->primary, $this->data[$this->primary])->delete($this->table);
  	return $result;
  }

  public function call_by_ref($parent_model,$child_field,$parent_field){
  	$this->load->model($parent_model);
  	$id_parent = $this->get($child_field);

  	$parent_data = $this->$parent_model->where([$parent_field => $id_parent]);
    //echo $this->db->last_query();
  	return $parent_data[0];

  }

  public function call_list_by_ref($child_model,$parent_field,$child_field){
  	$this->load->model($child_model);
  	$id_parent = $this->get($parent_field);


  	$child_data = $this->$child_model->where([$child_field => $id_parent]);
  	return $child_data;

  }

  public function unique_id(){
    do{
      $id = random_string('alnum',50);
      if(is_array($this->primary)){
        foreach ($this->primary as $p) {
          $this->db->where($p,$id);
        }
      }
      $query = $this->db->get($this->table)->result();
    }while(count($query) == 0);
    return $id;
  }

  public function max_id(){
    $query = $this->db->from($this->table)->select('MAX('.$this->primary.') AS MAX')->get()->row();
    return $query->MAX;
  }

  public function to_array()
  {
    return $this->data;
  }


}
?>