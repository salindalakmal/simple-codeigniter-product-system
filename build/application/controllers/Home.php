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
		$productObj->limit = 4;
		$productObj->where = array('published' => 1, 'featured' => 1);
		$this->data['featured_products'] = $productObj->get();
		if($this->data['featured_products']){
			foreach ($this->data['featured_products'] as $product) {
				if($product->category){
					$categoryObj = new categories_model();
					$categoryObj->id = $product->category;
					$category = $categoryObj->get();
					$product->category = $category->name; 
					$product->category_url = $category->url; 
				}
			}
		}

		$productObj = new products_model();
		$productObj->limit = 4;
		$productObj->order = array('date_published', 'desc');
		$productObj->where = array('published' => 1, );
		$this->data['new_products'] = $productObj->get();
		if($this->data['new_products']){
			foreach ($this->data['new_products'] as $product) {
				if($product->category){
					$categoryObj = new categories_model();
					$categoryObj->id = $product->category;
					$category = $categoryObj->get();
					$product->category = $category->name; 
					$product->category_url = $category->url; 
				}
			}
		}

		/*----------  Meta Details  ----------*/
		$this->page = $this->config->item('pages')['home'];
		$this->data['title'] = $this->page['title'];
		$this->data['keywords'] = $this->page['keywords'];
		$this->data['description'] = $this->page['description'];
		$this->data['social_meta_title'] = $this->page['social_meta_title'];
		$this->data['social_meta_image'] = $this->page['social_meta_image'];
		/*----------  End Meta Details  ----------*/

		$this->data['content'] = 'pages/home';
		$this->load->view('layout', $this->data);

	}


}
