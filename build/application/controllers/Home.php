<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {

        parent::__construct();
        
        $this->load->model('categories_model');
        $this->load->model('products_model');

    }

	public function index(){

		$productObj = new products_model();
		$productObj->where = array('status' => 1);
		$this->data['products'] = $productObj->get();

		$this->load->view('home', $this->data);

	}


}
