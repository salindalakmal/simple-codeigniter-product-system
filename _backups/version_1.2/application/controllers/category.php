<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public $data;

	public function __construct() {
	
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->model('products_model');

    }


	public function index($category = 0){
		
		
		if($category <> 0){
				echo $category;

				//$cate_id =  $this->categories_model->get_id_by_name($category);
				$categoryObj = new categories_model();
				$categoryObj->id = $categoryObj->get_id('name', $category);
				$this->data['products'] = $categoryObj->get();
				$this->data['category_name'] = $categoryObj->name;

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
