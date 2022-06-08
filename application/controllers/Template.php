<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends AuthData {

	public function __construct() {
		parent::__construct();
	}
	public function load() 
	{
		echo $this->load->view($this->input->post("template-path"),'',TRUE);
	}
}
?>