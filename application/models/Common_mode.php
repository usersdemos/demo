<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_mode extends CI_Model {

	public function __construct() {
		parent::__construct();

	}

	function sql_detail() {
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        return $sql_details;
    }

    function get_row_data($tbl,$field,$id) {
        $this->db->select('*');
        $this->db->where($field,$id);
        $query =  $this->db->get($tbl);
        return $query->row_array();
    }    

}	