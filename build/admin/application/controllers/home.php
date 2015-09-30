<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public $data;

	public function __construct() {

        parent::__construct();
        
        $this->load->model('categories_model');
        $this->load->model('products_model');

        if (!$this->ion_auth->is_admin()) {
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('auth/login');
		}

    }

	public function index(){

		$productsObj = new products_model();
		$this->data['products'] = $productsObj->get(null, array('status' => 1));

		$categoriesObj = new categories_model();
		$this->data['category'] = $categoriesObj->get(null, array('status' => 1));

		$this->load->view('admin/dashboard', $this->data);

	}


}
