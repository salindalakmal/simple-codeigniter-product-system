<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct() {
	
        parent::__construct();

    }

	public function index(){

		$categoryObj = new categories_model();
        $categoryObj->where = array('published' => 1);
		$row_count = $categoryObj->count();

		// Customize pagination 
	    $config = $this->config->item('pagination');

		$config['base_url'] = base_url('categories');
		$config['total_rows'] = $row_count;
		$config['per_page'] = 4;
		$config['prefix'] = 'page/';
        $config["num_links"] = floor($config["total_rows"] / $config["per_page"]);
		$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$categoryObj->limit = $config['per_page'];
		$categoryObj->offset = $page;
		$this->data['categories'] = $categoryObj->get();

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
