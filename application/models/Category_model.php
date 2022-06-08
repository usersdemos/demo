<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}

	function get_category_list() {
		$myJoin = '';
		$custom_where ='1=1';
		$table = 'category'; 
		$primaryKey = 'id'; 
		$dt = 0;
		$columns = array( 
		array( 'customfilter' => 'id','db' => 'id', 'dt' => $dt++, 'formatter' => function( $id, $row ) { 
					return '<input class="chk" type="checkbox" name="delete_all[]" value="' . $id . '" data-uid="' . $id . '">';
				}),		
		array( 'customfilter' => 'category_name','db' => 'category_name', 'dt' => $dt++ ), 
		array( 'customfilter' => 'description','db' => 'description',  'dt' => $dt++ ), 
		array( 'customfilter' => 'category_image','db' => 'category_image',  'dt' => $dt++ , 'formatter' => function( $category_image, $row ) { 
					return '<img src="'.base_url($category_image).'" width="75px" height="75px">'; 
					}), 		 
		array( 'customfilter' => 'created_at','db' => 'created_at',  'dt' => $dt++ , 'formatter' => function( $d, $row ) { 
					return date( 'jS M Y', strtotime($d)); 
					}), 
		array('customfilter' => 'id','db' => 'id','dt' => $dt++ , 'formatter' => function( $id, $row ) { 
			return '<a href="'.base_url('category/edit/'.$id).'" class="btn btn-success btn-sm rounded-0 pr-2"  title="Edit"><i class="fa fa-edit"></i></a>
				<a href="javascript:void(0)" class="btn btn-danger btn-sm rounded-0 jsDelete" title="Delete" data-id="'.$id.'"><i class="fa fa-trash"></i></a>'; 
			} 
		) 
		); 
		echo json_encode( 
			SSP::simple( $_GET, $this->common->sql_detail(), $table, $primaryKey, $columns,$myJoin,$custom_where )
		 );
        

    }

    public function save_category($post_data){
    	$data = array(
    		'category_name' => $post_data['category_name'],
    		'description' => $post_data['description'],
    		'category_image' => $post_data['category_image'],
    	);
    	$this->db->insert('category',$data);
    	return $this->db->insert_id();
    }

    public function update_category($post_data){
    	$data = array(
    		'category_name' => $post_data['category_name'],
    		'description' => $post_data['description'],
    		'category_image' => $post_data['category_image'],
    	);
    	$this->db->where('id',$post_data['id']);
    	$this->db->update('category',$data);
    	return true;
    }

    public function delete_category($id){

    	$this->db->select('category_image');
    	$this->db->where('id',$id);
    	$query = $this->db->get('category');
    	$data = $query->row_array();
    	unlink($_SERVER['DOCUMENT_ROOT'].'/'.$data['category_image']);

    	$this->db->where('id',$id);
    	$this->db->delete('category'); 	

    }

    public function check_category_in_product($id){
    	
    	$this->db->select('id');
    	$this->db->where('category_id',$id);
    	$query = $this->db->get('product');
    	return $query->num_rows();
    	
    }

    public function get_all_categories(){
    	
    	$query = $this->db->get('category');
    	return $query->result_array();
    	
    }                   

}	