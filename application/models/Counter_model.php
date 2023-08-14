<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Counter_model extends Model
{
	public $table= "counter";
	public $primary = 'C_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }

    public function count_up()
    {
    	$counter = $this->all()[0];
    	$counter->set('C_COUNTER',$counter->get('C_COUNTER')+1);
    	$counter->save();
    }

    
    
}