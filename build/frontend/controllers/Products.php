<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {


	public function __construct() {
	
        parent::__construct();

        $this->page = $this->config->item('pages')['products'];

        $this->load->helper(array('dropdown','form'));
       

    }


	public function index($product_url = ''){

		$categoryObj = new categories_model();
		$categoryObj->where = array('published' => 1);
		$this->data['categories'] = $categoryObj->get();

		if($product_url && $product_url != 'page'){

			$productObj = new products_model();
			$productObj->where = array('url' => $product_url);
			$productObj->id = $productObj->get_id();
			$this->data['product'] = $productObj->get();
			if($this->data['product']->category){
				$categoryObj = new categories_model();
				$categoryObj->id = $this->data['product']->category;
				$category = $categoryObj->get();
				$this->data['product']->category = $category->name; 
				$this->data['product']->category_url = $category->url; 
			}

			/*----------  Meta Details  ----------*/
			$this->data['title'] = $this->data['product']->name . ' | ' .  $this->page['title'];
			$this->data['keywords'] = $this->data['product']->meta_keywords;
			$this->data['description'] = $this->data['product']->meta_description;
			$this->data['social_meta_title'] = ($this->data['product']->social_meta_title) ? $this->data['product']->social_meta_title : $this->data['product']->name . ' | ' .  $this->page['title'];
			$this->data['social_meta_image'] = ($this->data['product']->social_meta_image) ? $this->data['product']->social_meta_image : '';
			/*----------  End Meta Details  ----------*/

			$this->data['content'] = 'pages/product_view';
			$this->load->view('layout', $this->data);

		} else{

			$productObj = new products_model();
			$productObj->where = array('published' => 1);

			/*----------  Meta Details  ----------*/
			$this->data['title'] = $this->page['title'];
			$this->data['keywords'] = $this->page['keywords'];
			$this->data['description'] = $this->page['description'];
			$this->data['social_meta_title'] = $this->page['social_meta_title'];
			$this->data['social_meta_image'] = $this->page['social_meta_image'];
			/*----------  End Meta Details  ----------*/

			if($this->input->get()){

				if($this->data['category_url'] = $this->input->get('category', TRUE)){

					$categoryObj = new categories_model();
					$categoryObj->where = array('url' => $this->data['category_url']);
					$categoryObj->id = $categoryObj->get_id();
					$category = $categoryObj->get();
					if(! $category){
						redirect(base_url('products'), 'location', 'refresh');
					}

					$this->data['heading'] = $category->name;

					/*----------  Meta Details  ----------*/
					$this->data['title'] = $category->name . ' | ' .  $this->page['title'];
					$this->data['keywords'] = $category->meta_keywords;
					$this->data['description'] = $category->meta_description;
					$this->data['current_url'] = base_url('products') . '?category=' . $this->data['category_url'];
					$this->data['social_meta_title'] = ($category->social_meta_title) ? $category->social_meta_title : $category->name . ' | ' .  $this->page['title'];
					$this->data['social_meta_image'] = ($category->social_meta_image) ? $category->social_meta_image : '';
					/*----------  End Meta Details  ----------*/

					$productObj->where = array('published' => 1, 'category' => $categoryObj->id);

				} elseif($this->data['category_url'] = $this->input->get('category', TRUE) && $this->data['sort'] = $this->input->get('sort', TRUE)){

					$categoryObj = new categories_model();
					$categoryObj->where = array('url' => $this->data['category_url']);
					$categoryObj->id = $categoryObj->get_id();
					$category = $categoryObj->get();
					if(! $category){
						redirect(base_url('products'), 'location', 'refresh');
					}

					$this->data['heading'] = $category->name;

					/*----------  Meta Details  ----------*/
					$this->data['title'] = $category->name . ' | ' .  $this->page['title'];
					$this->data['keywords'] = $category->meta_keywords;
					$this->data['description'] = $category->meta_description;
					$this->data['current_url'] = base_url('products') . '?category=' . $this->data['category_url'];
					$this->data['social_meta_title'] = ($category->social_meta_title) ? $category->social_meta_title : $category->name . ' | ' .  $this->page['title'];
					$this->data['social_meta_image'] = ($category->social_meta_image) ? $category->social_meta_image : '';
					/*----------  End Meta Details  ----------*/

				
					switch ($this->data['sort']) {
						case 'featured':
							$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
							$productObj->where = array('published' => 1, 'featured' => 1);
							break;
						case 'latest':
							$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
							$productObj->order = array('date_published', 'desc');
							break;
						case 'oldest':

							$productObj->order = array('date_published', 'asc');
							$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
							break;
						case 'price-high-to-low':
							$productObj->order = array('price', 'desc');
							$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
							break;
						case 'price-low-to-high':
							$productObj->order = array('price', 'asc');
							$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
							break;
						default:
							$productObj->where = array('published' => 1, 'category' => $categoryObj->id);
							break;
					}

				} elseif($this->data['sort'] = $this->input->get('sort', TRUE)){

					switch ($this->data['sort']) {
						case 'featured':
							$productObj->where = array('published' => 1, 'featured' => 1);
							break;
						case 'latest':
							$productObj->order = array('date_published', 'desc');
							break;
						case 'oldest':
							$productObj->order = array('date_published', 'asc');
							break;
						case 'price-high-to-low':
							$productObj->order = array('price', 'desc');
							break;
						case 'price-low-to-high':
							$productObj->order = array('price', 'asc');
							break;
						default:
							# code...
							break;
					}

				} else{

					redirect(base_url('products'), 'location', 'refresh');

				}

			} 

			$row_count = $productObj->count();

			// Customize pagination 
	        $config = $this->config->item('pagination');

			$config['base_url'] = base_url('products');
			$config['total_rows'] = $row_count;
			$config['per_page'] = 8;
			$config['prefix'] = 'page/';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$productObj->limit = $config['per_page'];
			$productObj->offset = $page;

			$this->data['products'] = $productObj->get();
			if($this->data['products']){
				foreach ($this->data['products'] as $product) {
					if($product->category){
						$categoryObj = new categories_model();
						$categoryObj->id = $product->category;
						$category = $categoryObj->get();
						$product->category = $category->name; 
						$product->category_url = $category->url; 
					}
				}
			}

			$this->data['pagination'] = $this->pagination->create_links();

			$this->data['content'] = 'pages/products';
			$this->load->view('layout', $this->data);

		}	


	}



	private function sort(){

	}


}
