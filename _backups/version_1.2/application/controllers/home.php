<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {

        parent::__construct();
        
        $this->load->model('categories_model');
        $this->load->model('products_model');

    }

	public function index(){

		$categoryObj = new categories_model();
		$data['categories'] = $categoryObj->get(null, array('status', 1));

		$productsObj = new products_model();
		$data['products'] = $productsObj->get(8);

		$this->load->view('home', $data);

	}


}
