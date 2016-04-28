<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public $data;

	public function __construct() {
	
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->model('products_model');

    }


	public function index($product = ''){

		$categoryObj = new categories_model();
		$this->data['categories'] = $categoryObj->get(null, array('status' => 1));

		if($product){

			$productsObj = new products_model();
			$productsObj->id = $productsObj->get_id('name', $product);
			//$productsObj->id = 1;
			$this->data['product'] = $productsObj->get();

			$this->load->view('product_view', $this->data);

		} else{

			$productsObj = new products_model();
			$this->data['products'] = $productsObj->get(null, array('status', 1));

			$this->load->view('products', $this->data);

		}	


	}

	
	public function category($category = ''){

		if($category){

			$categoryObj = new categories_model();
			$category_id = $categoryObj->get_id('name', $category);
			$this->data['categories'] = $categoryObj->get(null, array('status'=> 1));
			
			$productsObj = new products_model();
			$this->data['products'] = $productsObj->get(null, array('status' => 1, 'category' => $category_id));

			$this->load->view('products', $this->data);

		} else {

			$productsObj = new products_model();
			$this->data['products'] = $productsObj->get(null, array('status', 1));

			$categoryObj = new categories_model();
			$this->data['categories'] = $categoryObj->get(null, array('status', 1));

			$this->load->view('category', $this->data);

		}

	}

}
