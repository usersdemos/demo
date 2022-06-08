<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends AuthData{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('Common_mode','common');
        $this->load->model('Category_model','category');
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('category/list');
        $this->load->view('footer');        
    }

    public function get_category_list(){
        $this->category->get_category_list();
    }

    public function create(){
        $this->load->view('header');
        $this->load->view('category/create');
        $this->load->view('footer');
    }

    public function save_category(){
        $post_data = $this->input->post();
        $this->form_validation->set_rules('category_name', 'Category Mame', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'Image', 'required');
        }

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        } else {
                $files = $_FILES['image'];
                if (isset($files['name']) && !empty($files['name'])) {
                    if (!is_dir('uploads/category')) {
                        mkdir('./uploads/category');
                    }        
                    $config = array(
                        'upload_path'   => FCPATH . "/uploads/category/",
                        'allowed_types' => 'jpg|png|jpeg',
                        'overwrite'     => TRUE,                       
                    );
                    $this->load->library('upload', $config);  
                    $file_name = time();
                    $config['file_name'] = $file_name;
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $uploads = $this->upload->data();
                        $post_data['category_image'] = 'uploads/category/'.$uploads['file_name'];
                    }
                }

                $this->category->save_category($post_data);
                $this->session->set_flashdata('message', 'Category created successfully!!');
                echo json_encode(array('success'=>true));
                exit();            

        }
    }
    public function edit($id){
        $data  = $this->common->get_row_data('category','id',$id);
        $data['type'] = 'edit';
        $this->load->view('header');
        $this->load->view('category/edit',$data);
        $this->load->view('footer');
    }

    public function update_category(){
        $post_data = $this->input->post();
        $this->form_validation->set_rules('category_name', 'Category Mame', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        } else {
            $files = $_FILES['image'];
            if (isset($files['name']) && !empty($files['name'])) {
                if (!is_dir('uploads/category')) {
                    mkdir('./uploads/category');
                }        
                $config = array(
                    'upload_path'   => FCPATH . "/uploads/category/",
                    'allowed_types' => 'jpg|png|jpeg',
                    'overwrite'     => TRUE,                       
                );
                $this->load->library('upload', $config);  
                $file_name = time();
                $config['file_name'] = $file_name;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $uploads = $this->upload->data();

                    $post_data['category_image'] = 'uploads/category/'.$uploads['file_name'];
                    unlink($_SERVER['DOCUMENT_ROOT'].'/'.$this->input->post('old_image'));
                }
            }else{
                $post_data['category_image'] = $this->input->post('old_image');
            }
            $this->category->update_category($post_data);
            $this->session->set_flashdata('message', 'Category updated successfully!!');
            echo json_encode(array('success'=>true));            
        }

        exit();
    }

    public function delete_category(){
        $ids = explode(',', $this->input->post('ids'));
        foreach($ids as $id){
            $product = $this->category->check_category_in_product($id);
            if($product == 0){
                $this->category->delete_category($id);
            }
        }
        echo json_encode(array('success'=>true,'message'=>'Category deleted successfully!!'));        
    }    
    
}