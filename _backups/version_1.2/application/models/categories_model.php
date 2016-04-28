<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model {
	
	private $CI;
	
	public $id;
	public $name;
	public $image;
	public $status;

	function __construct(){

		parent::__construct();

		//var_dump($this->table);

		$this->CI = & get_instance();
		$this->CI->table = $this->config->item('tables')['categories'];

	}


	function insert(){

		$this->db->insert($this->CI->table, $this); 
   		$this->id = $this->db->insert_id();
   		return true;
   		
	}


	function update(){

		$this->db->where('id', $this->id);
		$this->db->update($this->CI->table, $this); 
   		return true;

	}

	public function delete() {
        $this->db->delete($this->CI->table, array(
           'id' => $this->id, 
        ));
        unset($this->id);
    }
    
	function get($limit = '', $where = array(), $order = array()){

		if($this->id){

			$this->db->where('id', $this->id);
			$query = $this->db->get($this->CI->table);
			if($query->num_rows() > 0){
				return $query->row();
			} else{
				return false;
			}

		}else{

			if(! $where){

				if($order){
					$this->db->order_by($order[0], $order[1]); 
				}
				if($limit){
					$this->db->limit($limit); 
				}
				$query = $this->db->get($this->CI->table);
				if($query->num_rows() > 0){
					return $query->result();
				} else{
					return false;
				}

			} else {

				if($order){
					$this->db->order_by($order[0], $order[1]); 
				}
				if($limit){
					$this->db->limit($limit); 
				}
				//$this->db->where($where[0], $where[1]);
				//$query = $this->db->get($this->CI->table);
				$query = $this->db->get_where($this->CI->table, $where);
				if($query->num_rows() > 0){
					return $query->result();
				} else{
					return false;
				}

			}

		}
		
	}


	function get_id($columns, $str){

		$this->db->where($columns, $str);
		$query = $this->db->get($this->CI->table);
		if($query->num_rows() == 1){
			return $query->row()->id;
		} else{
			return false;
		}

	}

	

}

