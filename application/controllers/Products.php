<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

	public function __construct() {
	
        parent::__construct();

    }


	public function index($product = ''){

		$categoryObj = new categories_model();
		$categoryObj->where = array('status' => 1);
		$this->data['categories'] = $categoryObj->get();

		if($product){

			$productObj = new products_model();
			$productObj->id = $productObj->get_id('name', $product);
			$this->data['product'] = $productObj->get();

			$this->load->view('product_view', $this->data);

		} else{

			$productObj = new products_model();
			$productObj->where = array('status' => 1);
			$this->data['products'] = $productObj->get();

			$this->load->view('products', $this->data);

		}	


	}


}
