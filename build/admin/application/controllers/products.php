<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

	public function __construct() {

        parent::__construct();

    }

	public function index(){

		$productsObj = new products_model();
		$this->data['products'] = $productsObj->get();

		$this->load->view('products/index', $this->data);

	}

	public function upload() {

        $redirect_url = $_SERVER["HTTP_REFERER"];

        if (isset($_FILES['tmp_image']['error']) && $_FILES['tmp_image']['error'] != 4) {

            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $rand_num = md5($rand_val);

            // -------------------------------------
            $upload_path = $this->assets_path . 'products/temp';
            if(!file_exists($upload_path)){
                mkdir($upload_path, 0777, true);
            }
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '3072';
            $config['file_name'] = $rand_num;
            // ---------------------------------------

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('tmp_image')) {

                $upload_data = $this->upload->data();

                if (isset($upload_data['file_name'])) {
                    $this->session->set_flashdata('upload_data', $upload_data);
                    redirect($redirect_url, 'refresh');
                }
                // Delete temp image
                //unlink($this->data['tmp_images_path'].$upload_data['file_name']);
            } else {

                $this->session->set_flashdata('form_errors', $this->upload->display_errors());
                redirect($redirect_url, 'refresh');

            }

        } else {

            redirect(base_url(), 'refresh');

        }


    }



    public function add() {

        $this->data['redirect_url'] = $_SERVER["HTTP_REFERER"];

		$this->data['form_data']['upload_data'] = $this->session->flashdata('upload_data');
        $this->data['form_errors'] = $this->session->flashdata('form_errors');

		$categoriesObj = new categories_model();
		$this->data['categories'] = $categoriesObj->get();


        if ($this->input->post()) {

			$this->form_validation->set_rules('name', 'Product Name', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			//$this->form_validation->set_rules('price', 'Price', 'required|decimal');
			//$this->form_validation->set_rules('promotion[]', 'Promotion', 'required|decimal');
			//$this->form_validation->set_rules('promotion_price', 'Promotion Price', 'decimal');

            if ($this->form_validation->run() == FALSE) {

                $this->data['form_data'] = $this->input->post();
                // $this->data['form_data']['upload_data']['file_name'] = $this->input->post('pro_picture_file_name');
                // $this->data['form_data']['upload_data']['raw_name'] = $this->input->post('pro_picture_raw_name');
                // $this->data['form_data']['upload_data']['file_ext'] = $this->input->post('pro_picture_ext');
                $this->data['form_errors'] = validation_errors();

            } else {

                $productObj = new products_model();
                $productObj->data = new stdClass();
				$productObj->data->name = $this->input->post('name');
				$productObj->data->url = strtolower(url_title($this->input->post('name')));
				$productObj->data->description = $this->input->post('description');
				$productObj->data->category = $this->input->post('category');
				$productObj->data->price = $this->input->post('price');
				$productObj->data->promotion = $this->input->post('promotion');
				$productObj->data->promotion_price = $this->input->post('promotion_price');

   	// $profileObj->pro_cat_id = $this->input->post('pro_cat_id');
    // $profileObj->pro_name = $this->input->post('pro_name');
    // $profileObj->first_name = $this->input->post('first_name');
    // $profileObj->last_name = $this->input->post('last_name');
    // $profileObj->pro_address1 = $this->input->post('pro_address1');
    // $profileObj->pro_address2 = $this->input->post('pro_address2');
    // $profileObj->pro_district = $this->input->post('pro_district');
    // $profileObj->pro_telephone = $this->input->post('pro_telephone');
    // $profileObj->pro_email = $this->input->post('pro_email');
    // $profileObj->pro_web = $this->input->post('pro_web');
    // $profileObj->pro_description = $this->input->post('pro_description');
    // $profileObj->pro_latitude  = $this->input->post('pro_latitude');
    // $profileObj->pro_longitude = $this->input->post('pro_longitude');
    // $profileObj->pro_status = ($this->input->post('pro_status') == 'active') ? 1 : 0;
    // $profileObj->pro_createdate = date('Y-m-d H:i:s');




                if ($product_id = $productObj->save()) {

                	$productObj->id = $product_id;

					$image_path = $this->assets_path . 'products/';
					if(!file_exists($image_path)){
                        mkdir($image_path, 0755, true);
                    }

					$uploade_image = $this->input->post('image-data');


					$uploade_image = base64_decode($uploade_image);

					$uploade_image_file = $image_path . $productObj->data->url . '.png';
					$success = file_put_contents($uploade_image_file, $uploade_image);

                    // $image_path = $this->assets_path . 'products/profile-' . $product_id;
                    // if(!file_exists($image_path)){
                    //     mkdir($image_path, 0755, true);
                    // }

                    // if ($this->input->post('pro_picture_file_name') && $this->input->post('pro_picture_ext')) {

                    //     $new_image_name = 'profile-' . $product_id . $this->input->post('pro_picture_ext');

                    //     $this->load->library('image_lib');

                    //     // -------------------------------------
                    //     $config1['image_library'] = 'gd2';
                    //     $config1['source_image'] = $this->assets_path ;
                    //     $config1['new_image'] = $image_path . '/' . $new_image_name;
                    //     $config1['width'] = 300;
                    //     $config1['height'] = 300;
                    //     $config1['maintain_ratio'] = TRUE;
                    //     // ---------------------------------------
                    //     $this->image_lib->initialize($config1);
                    //     $this->image_lib->resize();
                    //     $this->image_lib->clear();
                    //     // -------------------------------------

                    //     // -------------------------------------
                    //     $config2['image_library'] = 'gd2';
                    //     $config2['source_image'] = $config1['new_image'];
                    //     $config2['new_image'] = $image_path . '/profile-' ;
                    //     $config2['width'] = 10;
                    //     $config2['height'] = 10;
                    //     $config2['maintain_ratio'] = TRUE;
                    //     // ---------------------------------------
                    //     $this->image_lib->initialize($config2);
                    //     $this->image_lib->resize();
                    //     $this->image_lib->clear();
                    //     // -------------------------------------

                    //     if ($new_image_name) {
                    //         $profileObj->id = $pro_id;
                    //         $profileObj->pro_picture = $new_image_name;
                    //         $profileObj->update();
                    //     }

                    //}

                   // redirect(base_url('profiles/category/' . $category_id), 'refresh');

                }

            }
        }

        $this->data['form_header'] = 'Add New';
        $this->load->view('products/add-edit', $this->data);
    }



	public function adggd(){

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


	private function base64_to_jpeg($base64_string, $output_file) {
	    $ifp = fopen($output_file, "wb"); 

	    $data = explode(',', $base64_string);

	    fwrite($ifp, base64_decode($data[1])); 
	    fclose($ifp); 

	    return $output_file; 
	}


}
