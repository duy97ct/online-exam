<?php 
	class nguoi_dung_model extends Model
	{
		public $table= "nguoi_dung";
		public $primary = 'ND_ID';
		
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('cau_hoi_model');
	        $this->load->model('cau_tra_loi_model');
	    }
	    public function get_donvi()
	    {
	    	$quanhuyen = $this->db->where('DV_ID',$this->get('ND_DON_VI_CONG_TAC'))->select('DV_TEN')->get('don_vi')->result();
	    	if(is_array($quanhuyen) && count($quanhuyen) > 0){
	    		return $quanhuyen[0]->DV_TEN;
	    	}else{
	    		return NULL;
	    	}
	    }
	    public function ds_ketqua()
	    {
	    	$query = $this->db->where('TLCH_ND_ID',$this->get('ND_ID'))->get('tra_loi_cau_hoi')->result();
	    	$ds_cauhoi = array();
	    	foreach ($query as $row) {
	    		$ds_cauhoi[] = array(
					    			'cauhoi' => clone $this->cau_hoi_model->find($row->TLCH_CH_ID),
					    			'dapan' => $row->TLCH_DAP_AN,
					    		);
	    	}
	    	return $ds_cauhoi;
	    }

	    public function get_2first_exam($sdt,$hoten)
	    {
	    	$query = $this->db->from($this->table)->where('ND_SDT',$sdt)->where('ND_TEN',$hoten)->order_by('ND_ID','ASC')->get()->result();
	    	if($query == NULL){
	    		return NULL;
	    	}else{
	    		$kq = array();
	    		//Lay 2 nguoi co id thap nhay
	    		$kq[0] = clone $this->find($query[0]->ND_ID);
	    		if(isset($query[1])){
	    			$kq[1] = clone $this->find($query[1]->ND_ID);
	    		}
	    		return $kq;
	    	}
	    }

	    public function get_ketqua()
	    {
	    	if($this->get('ND_SO_CAU_DUNG') == NULL){
	    		$query = $this->db->where('TLCH_ND_ID',$this->get('ND_ID'))->get('tra_loi_cau_hoi')->result();
		    	//var_dump($query);
		    	$total = $mark = 0;
		    	foreach ($query as $row) {
	    			$traloi = $this->cau_tra_loi_model->find($row->TLCH_DAP_AN);
		    		if($traloi != NULL){
		    			$mark += $traloi->get('CTL_DUNG');
		    		}
		    		
		    		$total++;
			    		
		    	}
		    	//ghi kết quả lại vào bảng người dùng để khỏi tính trong lần sau
		    	$this->set('ND_SO_CAU_DUNG',$mark);
		    	$this->set('ND_SO_CAU',$total);
		    	$this->save();
	    	}else{
	    		$total = $this->get('ND_SO_CAU');
	    		$mark = $this->get('ND_SO_CAU_DUNG');
	    	}
		    	
	    	return ['mark' => $mark, 'total' => $total];
	    	
	    }

	    public function count()
	    {
	    	$luot = $this->db->from($this->table)->select('COUNT(*) AS LUOT_THAM_GIA')->get()->result();
	    	return $luot[0]->LUOT_THAM_GIA;
	    }

	    public function count_user()
	    {
	    	$luot = $this->db->from($this->table)->select('COUNT(DISTINCT ND_SDT) AS SL')->get()->result();
	    	return $luot[0]->SL;
	    }

	    public function count_answerright()
	    {
	    	$ds_nguoidung = $this->all();
	    	$count = 0;
	    	foreach ($ds_nguoidung as $nguoi_dung) {
	    		$kq = $nguoi_dung->get_ketqua();
	    		if($kq['mark'] == QUESTION_NUMBER){
	    			$count++;
	    		}
	    	}
	    	return $count;
	    }

	    public function get_ds_luotthi_cuoicung($tungay, $denngay, $donvi)
	    {
	    	$ds_result = $this->db->query("SELECT MAX(`ND_ID`) AS ID
						FROM `nguoi_dung`
						WHERE `ND_NGAY_TAO`>'$tungay' AND `ND_NGAY_TAO`  <= '$denngay' AND `ND_DON_VI_CONG_TAC`='$donvi'
						GROUP BY `ND_TEN`,`ND_SDT`")->result();
			//echo $this->db->last_query();exit();
			if(!$ds_result){
		  		return NULL;
		  	}else{
		  		$kq = array();
		  		foreach ($ds_result as $result) {
		  			$ng = $this->find($result->ID);
		  			$kq[] = clone $this;
		  		}
		  		//var_dump($kq); exit();
		  		return $kq;		
		  	}	
	    }

	    public function ds_dudoan_gannhat()
	    {
	    	$num_traloidung = $this->count_answerright();
	    	$sql = "SELECT a.`ND_ID`, ABS(a.`ND_SO_NGUOI` - $num_traloidung) AS SAI_SO
					FROM `nguoi_dung` a
					WHERE a.`ND_ID` IN
					(
						SELECT MAX(`ND_ID`) AS ID
						FROM `nguoi_dung` b
						WHERE 1
						GROUP BY b.`ND_TEN`, b.`ND_SDT`
					)
						AND a.`ND_SO_CAU_DUNG` = 29
					ORDER BY SAI_SO ASC
					LIMIT 0,100";
			$ds_result = $this->db->query($sql)->result();
			if(!$ds_result){
		  		return NULL;
		  	}else{
		  		$kq = array();
		  		foreach ($ds_result as $result) {
		  			$ng = $this->find($result->ND_ID);
		  			$ng->set('SAI_SO', $result->SAI_SO);
		  			$kq[] = clone $ng;
		  		}
		  		//var_dump($kq); exit();
		  		return $kq;		
		  	}	
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