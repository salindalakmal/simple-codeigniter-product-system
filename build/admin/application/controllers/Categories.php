<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct() {

        parent::__construct();

    }

	public function index(){

		$categoryObj = new categories_model();

		$this->data['categories'] = $categoryObj->get(null, null, array('id', 'desc'));

		$this->load->view('categories/index', $this->data);

	}


	public function add(){

		if($this->input->post()){


			$this->form_validation->set_rules('category', 'Category Name', 'required');

			if ($this->form_validation->run() == FALSE){

				$this->data['form'] = array('category' => $this->input->post('category'));;
				$this->data['errors'] = '';
				$this->load->view('admin/add-category', $this->data);

			} else {

				$categoryObj = new categories_model();
				$categoryObj->name = $this->input->post('category');
				$categoryObj->status = 0;
				$categoryObj->image = 'defaults.jpg';

				$categoryObj->insert();

				if(! $categoryObj->id){

					echo "Fail";

				} else {

					if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$this->data['form'] = $categoryObj->get();

						// File Uploading
						$config['upload_path'] = './assests/categories/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '100';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$config['file_name'] = 'category_' . $categoryObj->id;

						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('image')){

							$this->session->set_flashdata('error',  $this->upload->display_errors());
							redirect('admin/category/edit/' . $categoryObj->id , 'refresh');

						} else {

							$data = array('upload_data' => $this->upload->data());
							$categoryObj->image = $data['upload_data']['file_name'];
							$categoryObj->update();

						}
					}

					redirect('admin/category', 'refresh');


				}

			}

		} else {

			$this->data['form'] = '';
			$this->data['errors'] = '';
			$this->load->view('admin/add-category', $this->data);

		}

	}



	public function edit($inserted_id){

		$categoryObj = new categories_model();
		$categoryObj->id = $inserted_id;


		if($this->input->post()){

			$this->form_validation->set_rules('category', 'Category Name', "trim|required|xss_clean|callback_update_unique['.$categoryObj->id.']");
			$this->form_validation->set_message('update_unique', 'The %s that you requested is unavailable.');

			if ($this->form_validation->run() == FALSE){

				$this->data['form'] = $categoryObj->get();
				$this->data['errors'] = '';
				$this->load->view('admin/edit-category', $this->data);

			} else {

				$categoryObj->name = $this->input->post('category', TRUE);
				$categoryObj->status = 0;

				if(! $categoryObj->update()){

					$this->data['form'] = $categoryObj->get();
					$this->data['errors'] = 'Fail';
					$this->load->view('admin/edit-category', $this->data);

				} else {

					if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

						// File Uploading
						$config['upload_path'] = './assests/categories/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '100';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$config['required'] = '-1';
						$config['file_name'] = 'category_' . $categoryObj->id;

						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('image')){

							$this->session->set_flashdata('error',  $this->upload->display_errors());
							redirect('admin/category/edit/' . $categoryObj->id , 'refresh');

						} else {

							$data = array('upload_data' => $this->upload->data());
							$categoryObj->image = $data['upload_data']['file_name'];
							$categoryObj->update();

						}

					}

					redirect('admin/category', 'refresh');


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
