<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct() {
	
        parent::__construct();

    }

	public function index(){

		$categoryObj = new categories_model();
        $categoryObj->where = array('published' => 1);
		$this->data['categories'] = $categoryObj->get();

		$rows = 

		$config['base_url'] = current_url();
		$config['total_rows'] = 200;
		$config['per_page'] = 4;

		$this->pagination->initialize($config);

		$this->data['pagination'] = $this->pagination->create_links();


		/*----------  Meta Details  ----------*/
		$this->page = $this->config->item('pages')['categories'];
		$this->data['title'] = $this->page['title'];
		$this->data['keywords'] = $this->page['keywords'];
		$this->data['description'] = $this->page['description'];
		$this->data['social_meta_title'] = $this->page['social_meta_title'];
		$this->data['social_meta_image'] = $this->page['social_meta_image'];
		/*---------- End Meta Details  ----------*/
		
		$this->data['content'] = 'pages/category';
		$this->load->view('layout', $this->data);

	}


}
