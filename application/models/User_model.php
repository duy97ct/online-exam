<?php 
	class User_model extends Model
	{
		public $table= "user";
		public $primary = 'U_USERNAME';
		
	    public function __construct()
	    {
	        parent::__construct();

	    }

	    // public function filter($timkiem)
	    // {
	  		// $this->db->like('DV_TEN',$timkiem);
		  	// $ds_result = $this->db->get($this->table)->result();
		  	// if(!$ds_result){
		  	// 	return NULL;
		  	// }else{
		  	// 	$kq = array();
		  	// 	foreach ($ds_result as $result) {
		  	// 		$ds_field = get_object_vars($result);
		  	// 		foreach ($ds_field as $key => $value) {
		  	// 			//Tung field trong row
		  	// 			$this->set($key,$value);
		  	// 		}
		  	// 		$kq[] = clone $this;
		  	// 	}
		  	// 	return $kq;
		  	// }
	    // }
	    
	}
?>