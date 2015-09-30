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

		$categoriesObj = new categories_model();
		$this->data['categories'] = $categoriesObj->get();

		if($this->input->post()){

			$insert_data['name'] = $this->input->post('name');
			$insert_data['description'] = $this->input->post('description');
			$insert_data['category'] = $this->input->post('category');
			$insert_data['price'] = $this->input->post('price');
			$insert_data['promotion'] = $this->input->post('promotion');
			$insert_data['promotion_price'] = $this->input->post('promotion_price');
			$insert_data['image'] = $this->input->post('image');

			$this->form_validation->set_rules('name', 'Product Name', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required|decimal');
			$this->form_validation->set_rules('promotion[]', 'Promotion', 'required|decimal');
			$this->form_validation->set_rules('promotion_price', 'Promotion Price', 'decimal');
			//$this->form_validation->set_rules('image', 'Image', 'required');

			if ($this->form_validation->run() == FALSE){

				$this->data['form'] = $insert_data;
				$this->data['errors'] = '';
				$this->load->view('admin/add-product', $this->data);

			} else {
				$categoriesObj = new categories_model();
				$category_id = $categoriesObj->get_id('name', $insert_data['category']);

				$productsObj = new products_model();
				$productsObj->name = $insert_data['name'];
				$productsObj->description = $insert_data['description'];
				$productsObj->price = $insert_data['price'];
				$productsObj->category = $category_id;
				$productsObj->image = 'defaults.jpg';
				$productsObj->status = 0;
				$productsObj->promotion = ($insert_data['promotion'][0] == 'yes')? 1 : 0 ;
				$productsObj->promotion_price = $insert_data['promotion_price'];

				$productsObj->insert();

				if(! $productsObj->id){

					echo "Fail";
				
				} else {

					$this->data['form'] = $productsObj->get();

					// File Uploading
					$config['upload_path'] = './assests/products/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$config['file_name'] = 'products_' . $productsObj->id;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('image')){

						$this->session->set_flashdata('error',  $this->upload->display_errors());
						redirect('admin/products/edit/' . $productsObj->id , 'refresh');
						
					} else {

						$data = array('upload_data' => $this->upload->data());
						$productsObj->image = $data['upload_data']['file_name'];
						$productsObj->update();

						redirect('admin/products', 'refresh');

					}


				}

			}

		} else{

			$this->data['errors'] = '';
			$this->load->view('admin/add-product', $this->data);

		}

		

	}



	public function edit($inserted_id){

		$productsObj = new products_model();
		$productsObj->id = $inserted_id;


		if($this->input->post()){

			//$this->form_validation->set_rules('category', 'Category Name', "trim|required|xss_clean|callback_update_unique['.$categoryObj->id.']");
			//$this->form_validation->set_message('update_unique', 'The %s that you requested is unavailable.');

			if ($this->form_validation->run() == FALSE){

				$this->data['form'] = $productsObj->get();
				$this->data['errors'] = '';
				$this->load->view('admin/edit-product', $this->data);

			} else {

				$productsObj->name = $this->input->post('category', TRUE);
				$productsObj->status = 0;

				if(! $productsObj->update()){

					$this->data['form'] = array('category' => $this->input->post('category'));;
					$this->data['errors'] = 'Fail';
					$this->load->view('admin/edit-product', $this->data);
				
				} else {

					if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

						// File Uploading
						$config['upload_path'] = './assests/products/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '100';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$config['required'] = '-1'; 
						$config['file_name'] = 'product_' . $productsObj->id;

						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('image')){

							$this->session->set_flashdata('error',  $this->upload->display_errors());
							redirect('admin/products/edit/' . $productsObj->id , 'refresh');
							
						} else {

							$data = array('upload_data' => $this->upload->data());
							$productsObj->image = $data['upload_data']['file_name'];
							$productsObj->update();
							
						}

					}

					redirect('admin/products', 'refresh');


				}

			}


		} else {

			
			$this->data['form'] = $categoryObj->get();
			$this->data['errors'] = '';
			$this->load->view('admin/edit-category', $this->data);

		}

	}


	public function delete($id){

		$categoryObj = new categories_model();
		$categoryObj->id = $id;

		$categoryObj->delete();
		redirect('admin/category', 'refresh');
		

	}


	public function update_unique($str, $id) {

        $query = $this->db->limit(1)->get_where('categories', array('name' => $str, 'id !=' => $id));
        if($query->num_rows() === 0){
        	return true;
        } else{
        	return false;
        }

	}


}
