<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    public $table  = '';
    public $id = '';
    public $data  = '';
    public $where  = '';
    public $limit  = '';
    public $offset  = '';
    public $order  = '';

    function __construct(){

        parent::__construct();

    }
    

    /**
     * Get an array of Models with an optional limit, offset.
     * 
     * @return array.
     */
    public function get() {

        if($this->id){

            $this->db->where('id', $this->id);
            $query = $this->db->get($this->table);
            if($query->num_rows() == 1){
                return $query->row();
            } else{
                return FALSE;
            }

        }else{

            if(! $this->where){

                if($this->order){
                    $this->db->order_by($this->order[0], $this->order[1]); 
                }
                if($this->limit){
                    if($this->offset){
                        $this->db->limit($this->limit, $this->offset); 
                    } else{
                        $this->db->limit($this->limit); 
                    }
                }
                $query = $this->db->get($this->table);
                if($query->num_rows() > 0){
                    return $query->result();
                } else{
                    return FALSE;
                }

            } else {

                if($this->order){
                    $this->db->order_by($this->order[0], $this->order[1]); 
                }
                if($this->limit){
                    if($this->offset){
                        $this->db->limit($this->limit, $this->offset); 
                    } else{
                        $this->db->limit($this->limit); 
                    }
                }
                $query = $this->db->get_where($this->table, $this->where);
                if($query->num_rows() > 0){
                    return $query->result();
                } else{
                    return FALSE;
                }

            }


        }
    }

    /**
     * Get id
     */
    function get_id(){

        $query = $this->db->get_where($this->table, $this->where);
        if($query->num_rows() == 1){
            return $query->row()->id;
        } else{
            return FALSE;
        }

    }

    /**
     * Insert the record.
     */
    function insert(){

        $this->db->insert($this->CI->table, $this); 
        $this->id = $this->db->insert_id();
        return FALSE;
        
    }

    /**
     * Update the record.
     */
    function update(){

        $this->db->where('id', $this->id);
        $this->db->update($this->CI->table, $this); 
        return FALSE;

    }

    /**
     * Save the record.
     */
    public function save() {

        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }

    }


    /**
     * Delete the current record.
     */
    public function delete() {
        $this->db->delete($this->table, array(
           $this->id => $this->{$this->id}, 
        ));
        unset($this->{$this->id});
    }


    /**
     * Count records.
     */
    public function count() {
        return count($this->get());
    }


    
}
