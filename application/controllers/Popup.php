<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends AuthData{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('Common_mode','common');
        $this->load->model('Category_model','category');
        $this->load->model('Product_model','product');
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('popup/list');
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
                echo json_encode(array('success'=>true,'message' => 'Category created successfully!!'));
                exit();            

        }
    }

    public function edit(){
    	$id = $this->input->post('id');
        $data  = $this->common->get_row_data('category','id',$id);
        echo json_encode(array('success'=>true,'data' => $data));
    }        

   
              
    
}