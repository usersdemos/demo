<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends AuthData{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('Common_mode','common');
        $this->load->model('Category_model','category');
        $this->load->model('Product_model','product');
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('product/list');
        $this->load->view('footer');        
    }

    public function get_product_list(){
        $this->product->get_product_list();
    }

    public function create(){
        $data['categories'] = $this->category->get_all_categories();
        $this->load->view('header');
        $this->load->view('product/create',$data);
        $this->load->view('template/template_dropdown');
        $this->load->view('footer');
    }

    public function save_product(){
        $post_data = $this->input->post();
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('categories[]', 'Categories', 'required');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        if (empty($_FILES['image_name']['name']))
        {
            $this->form_validation->set_rules('images', 'Image', 'required');
        }

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        } else {

                $image = array();
                $ImageCount = count($_FILES['image_name']['name']);

                for($i = 0; $i < $ImageCount; $i++){
                    $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
                    $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
                    $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
                    $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
                    $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

                    // File upload configuration
                    $uploadPath = FCPATH . "/uploads/product/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $file_name = time();
                    $config['file_name'] = $file_name;                            

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if($this->upload->do_upload('file')){

                        $imageData = $this->upload->data();
                        $post_data['product_images'][$i] = 'uploads/product/'.$imageData['file_name'];

                    }
                }            


                $this->product->save_product($post_data);
                $this->session->set_flashdata('message', 'Product created successfully!!');
                echo json_encode(array('success'=>true));
                exit();            

        }
    }

    public function get_attribute(){
        $data['attribute']  = $this->product->get_product_attribute();
        $data['index']  = $this->input->post('index');
        echo json_encode($data);
    }

    public function get_sub_attribute(){
        $id= $this->input->post('id');
        $data['sub_attribute']  = $this->product->get_product_sub_attribute($id);
        echo json_encode($data);
    }

    public function get_attribute_value(){
        $id= $this->input->post('id');
        $data  = $this->product->get_product_sub_attribute_value($id);
        echo json_encode($data);
    }

    public function edit($id){
        $data  = $this->common->get_row_data('product','id',$id);
        $data['categories'] = $this->category->get_all_categories();
        $data['attributes'] = $this->product->get_product_attributes($id);
        $data['type'] = 'edit';
        $this->load->view('header');
        $this->load->view('product/edit',$data);
        $this->load->view('footer');
    } 

    public function product_info(){
        $id = $this->input->post('product_id');
        $attributes = $this->product->get_product_attributes($id);
        echo json_encode($attributes); 
    }

    public function update_product(){
        $post_data = $this->input->post();
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('categories[]', 'Categories', 'required');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        if (empty($_FILES['image_name']['name']))
        {
            $this->form_validation->set_rules('images', 'Image', 'required');
        }

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        } else {

                $image = array();
                $ImageCount = count($_FILES['image_name']['name']);
                if($ImageCount >0){
                    for($i = 0; $i < $ImageCount; $i++){
                        $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
                        $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
                        $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
                        $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
                        $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

                        // File upload configuration
                        $uploadPath = FCPATH . "/uploads/product/";
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $file_name = time();
                        $config['file_name'] = $file_name;                            

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file')){

                            $imageData = $this->upload->data();
                            $post_data['product_images'][$i] = 'uploads/product/'.$imageData['file_name'];

                        }
                    }            
                }else{
                    $post_data['product_images'] = $this->input->post('old_image');
                }

                $this->product->update_product($post_data);
                $this->session->set_flashdata('message', 'Product created successfully!!');
                echo json_encode(array('success'=>true));
                exit();            

        }
    }                    

    public function delete_attribute(){
        $id = $this->input->post('id');
        $this->product->delete_attribute($id);
        echo json_encode(array('success'=>true));
        
    }   
    
}