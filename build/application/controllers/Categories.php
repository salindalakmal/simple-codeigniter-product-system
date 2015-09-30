<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct() {
	
        parent::__construct();

    }

	public function index(){
		
		$this->data['content'] = 'pages/category';
		$this->load->view('layout', $this->data);

	}


}
