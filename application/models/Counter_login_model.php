<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Counter_login_model extends Model
{
	public $table= "counter_login";
	public $primary = 'CL_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }


    public function count()
    {
    
    	$counter['all'] = $this->db->get($this->table)->num_rows();
        $counter['homnay'] = $this->db->where('DATE(CL_ACCESS_TIME)', date('Y-m-d'))->get($this->table)->num_rows();
        $counter['homqua'] = $this->db->where('DATE(CL_ACCESS_TIME)', date('Y-m-d',strtotime('-1 day')))->get($this->table)->num_rows();

        $day = date('w')-1;
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
        $counter['tuannay'] = $this->db->where('DATE(CL_ACCESS_TIME) >=', $week_start)->where('DATE(CL_ACCESS_TIME)<=',$week_end)->get($this->table)->num_rows();
        // echo $this->db->last_query();

        $lastweek_start = date('Y-m-d', strtotime('-'.($day+7).' days'));
        $lastweek_end = date('Y-m-d', strtotime('+'.(6-$day-7).' days'));
        $counter['tuantruoc'] = $this->db->where('DATE(CL_ACCESS_TIME) >=', $lastweek_start)->where('DATE(CL_ACCESS_TIME)<=',$lastweek_end)->get($this->table)->num_rows();
        // echo $this->db->last_query();
        return $counter;
    }


    
}