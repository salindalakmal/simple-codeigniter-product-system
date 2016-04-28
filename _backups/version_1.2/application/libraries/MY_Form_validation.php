<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class My_Form_validation extends CI_Form_validation {

	protected $CI;

	public function __construct($rules = array())
	{
		$this->CI =& get_instance();

		// Validation rules can be stored in a config file.
		$this->_config_rules = $rules;

		// Automatically load the form helper
		$this->CI->load->helper('form');

		// Set the character encoding in MB.
		if (function_exists('mb_internal_encoding'))
		{
			mb_internal_encoding($this->CI->config->item('charset'));
		}

		log_message('debug', "Form Validation Class Initialized");
	}

	// --------------------------------------------------------------------


	public function is_update_unique($str, $field, $id)
	{
		list($table, $field)=explode('.', $field);
		$this->CI->form_validation->set_message('is_update_unique', 'The %s that you requested is unavailable.');
		//$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
		if (isset($this->CI->db))
	    {
	    	
	        $query2 = $this->CI->db->limit(1)->get_where($table, array($field => $str, 'id !=' => $id));
	        $this->CI->db->last_query();
	        return $query2->num_rows() === 0;

	    }
			
		return $query2->num_rows() === 0;
		
	}

	/*public function is_update_unique($str,$field)
    {
        list($table, $field)=explode('.', $field);
        $this->CI->form_validation->set_message('is_update_unique', 'The %s that you requested is unavailable.');
        $query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $column = ‘$str’ AND id != $id;");
        $row = $query->row();
        return ($row->dupe > 0) ? FALSE : TRUE;
    }*/

}
