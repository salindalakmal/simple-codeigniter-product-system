<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public $data;

	public function __construct() {

        parent::__construct();
        
        $this->load->model('categories_model');
        $this->load->model('products_model');

        $categoryObj = new categories_model();
        $categoryObj->where = array('published' => 1);
		$this->data['categories'] = $categoryObj->get();

    }

}