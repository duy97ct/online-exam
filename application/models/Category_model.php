<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Category_model extends Model
{
	public $table= "category";
	public $primary = 'CAT_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }

    public function get_children(){
    	$children = $this->where(['CAT_PARENT_ID' => $this->get('CAT_ID')]);
    	// var_dump($children);
    	return $children;
    }
    
}