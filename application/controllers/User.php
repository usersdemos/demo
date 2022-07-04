<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');	
	}
		
	public function index() {

	}
	
	public function register() {
		$data = new stdClass();	
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {

			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');

		} else {
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($username, $email, $password)) {
				
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
		
	public function login() {
		
		if(!empty($this->session->userdata('user_data'))){
			redirect('members/list', 'refresh');
		}

		$data = new stdClass();
		
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('header');
			$this->load->view('user/login/login');
			$this->load->view('footer');
			
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
				

				$session_data=array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'logged_in' => true,
                    'is_confirmed' => $user->is_confirmed,
                    'is_admin' => $user->is_admin,
                );				

				$this->session->set_userdata('user_data', $session_data);
				
				redirect('category', 'refresh');

				
			} else {
				$data->error = 'Wrong username or password.';
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}

	public function logout() {
		if(!empty($this->session->userdata('user_data'))) {
			 $this->session->unset_userdata('user_data');
		}
		redirect('/login');
	}

	public function forgot_password() {

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() === false) {

			$this->load->view('header');
			$this->load->view('user/forgot/forgot', $data);
			$this->load->view('footer');

		} else {
			$email = $this->input->post('email');
			
		}		
		

	}

	public function check_email() {

		$email = $this->input->get('email');	
		$this->db->where('email',$email);
        $query = $this->db->get('users');
        $users = $query->result_array();
        if(count($users)>0){
            echo 'true';
        } else{
            echo 'false';
        }		

	}		
	
}