<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('Common_mode','common');
        $this->load->model('Member_model','member');
    }
    
    function index(){
    }

    function list(){
        $this->load->view('members/list');
    }    
    public function get_member_list(){
        $this->member->get_member_list();
    }

    public function create(){
        $this->load->view('members/create');
    }

    public function save_user(){
        $post_data = $this->input->post();
        dd($post_data);
        $this->member->save_user($post_data);
        echo json_encode(array('success'=>true,'message' => 'User created successfully!!'));
        exit();
    }
    public function edit($id){
        $data  = $this->common->get_row_data('users','id',$id);
        $data['type'] = 'edit';
        $this->load->view('members/edit',$data);
    }        
    
}