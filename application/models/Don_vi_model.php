<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Don_vi_model extends Model
{
	public $table= "don_vi";
	public $primary = 'DV_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }
    
}