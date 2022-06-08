<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AuthData extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		error_reporting(0);
		$method = strtolower($this->router->fetch_method());
		if(empty($this->session->userdata('user_data'))) {
			redirect('login', 'refresh');
		}
	}
}