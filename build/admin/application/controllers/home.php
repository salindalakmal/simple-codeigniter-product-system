<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {

        parent::__construct();

    }

	public function index(){

		// $productsObj = new products_model();
		// $this->data['products'] = $productsObj->get(null, array('status' => 1));
		//
		// $categoriesObj = new categories_model();
		// $this->data['category'] = $categoriesObj->get(null, array('status' => 1));

		$this->load->view('home', $this->data);

	}


}
