<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data,
		   $page;

	public function __construct() {

        parent::__construct();

		if (!$this->ion_auth->is_admin()) {
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('users/login');
		}

        $this->data['site_details'] = $this->config->item('site_details');

        $this->load->model('categories_model');
        $this->load->model('products_model');

        $categoryObj = new categories_model();
        $categoryObj->where = array('published' => 1);
		$this->data['categories'] = $categoryObj->get();

    }

}
