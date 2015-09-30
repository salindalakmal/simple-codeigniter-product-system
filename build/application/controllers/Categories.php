<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct() {
	
        parent::__construct();

        

    }

	public function index($category = ''){
		
		if($category){

			$categoryObj = new categories_model();
			$categoryObj->where = array('name' => $category);
			$categoryObj->id = $categoryObj->get_id();

			$productsObj = new products_model();
			$productsObj->where = array('status' => 1, 'category' => $categoryObj->id);
			$this->data['products'] = $productsObj->get();
			

			$this->load->view('products', $this->data);

		} else {

			$this->load->view('category', $this->data);

		}


	}

	


}
