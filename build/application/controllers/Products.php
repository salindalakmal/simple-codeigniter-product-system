<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

	public function __construct() {
	
        parent::__construct();

    }


	public function index($product_url = ''){

		$categoryObj = new categories_model();
		$categoryObj->where = array('published' => 1);
		$this->data['categories'] = $categoryObj->get();

		if($product_url){

			$productObj = new products_model();
			$productObj->where = array('url' => $product_url);
			$productObj->id = $productObj->get_id();
			$this->data['product'] = $productObj->get();
			if($this->data['product']->category){
				$categoryObj = new categories_model();
				$categoryObj->id = $this->data['product']->category;
				$category = $categoryObj->get();
				$this->data['product']->category = $category->name; 
				$this->data['product']->category_url = $category->url; 
			}

			$this->data['content'] = 'pages/product_view';
			$this->load->view('layout', $this->data);

		} else{

			$productObj = new products_model();

			if($this->input->get()){

				if($category_url = $this->input->get('category', TRUE)){

					$categoryObj = new categories_model();
					$categoryObj->where = array('url' => $category_url);
					$categoryObj->id = $categoryObj->get_id();
					$category = $categoryObj->get();
					$this->data['heading'] = $category->name;

					$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
					

				} else{

					redirect(base_url('products'), 'location', 'refresh');

				}

			} else{

				$productObj->where = array('published' => 1);

			}

			$this->data['products'] = $productObj->get();
			if($this->data['products']){
				foreach ($this->data['products'] as $product) {
					if($product->category){
						$categoryObj = new categories_model();
						$categoryObj->id = $product->category;
						$category = $categoryObj->get();
						$product->category = $category->name; 
						$product->category_url = $category->url; 
					}
				}
			}

			$this->data['content'] = 'pages/products';
			$this->load->view('layout', $this->data);

		}	


	}


}
