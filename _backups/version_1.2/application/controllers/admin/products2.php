<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public $data;

	public function __construct() {

        parent::__construct();
        
        $this->load->model('categories_model');
        $this->load->model('products_model');

        if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('auth/login');
		}

    }

	public function index(){

		$productsObj = new products_model();
		$this->data['products'] = $productsObj->get();

		$this->load->view('admin/products', $this->data);

	}


	public function add(){

		
		if($this->input->post()){


			$this->form_validation->set_rules('name', 'Product Name', 'required');

			if ($this->form_validation->run() == FALSE){

				$this->form_validation->set_message('rule', 'Error Message');

			} else {

				$insert_data['name'] = $this->input->post('name');
				$insert_data['description'] = $this->input->post('description');
				$insert_data['category'] = $this->input->post('category');
				$insert_data['price'] = $this->input->post('price');
				$insert_data['status'] = 1;
				$insert_data['promotion'] = $this->input->post('promotion');
				$insert_data['promotion_price'] = $this->input->post('promotion_price');
				$insert_data['image'] = $this->input->post('image');

				if(! $this->products_model->insert($insert_data)){

					echo "Fail";
				
				} else {

					$inserted_id = 101;

					// File Uploading
					$config['upload_path'] = './assests/products/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$config['file_name'] = 'product_' . $inserted_id;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('image')){

						$error = $error = array('error' => $this->upload->display_errors());
						$this->load->view('admin/add-product', $error);
						
					} else {

						$data = array('upload_data' => $this->upload->data());
						$this->products_model->insert($insert_data);
						var_dump($data);

					}

					//redirect('admin/products', 'refresh');
				}

			}


		} else {

			$this->data['error'] = '';
			$this->load->view('admin/add-product', $this->data);

		}

	}


}
