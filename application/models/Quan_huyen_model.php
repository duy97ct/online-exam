<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Quan_huyen_model extends Model
{
	public $table= "quan_huyen";
	public $primary = 'QH_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }
    
}