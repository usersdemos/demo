<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}

	function get_product_list() {

		$myJoin = 'INNER JOIN category ON category.id=product.category_id';
		$custom_where ='1=1';
		$table = 'product'; 
		$primaryKey = 'id'; 
		$dt = 0;
		$columns = array( 
		array( 'customfilter' => 'product.id','db' => 'product.id', 'dt' => $dt++, 'formatter' => function( $id, $row ) { 
					return '<input class="chk" type="checkbox" name="delete_all[]" value="' . $id . '" data-uid="' . $id . '">';
				}),
		array( 'customfilter' => 'product_name','db' => 'product_name', 'dt' => $dt++ ), 
		array( 'customfilter' => 'category_name','db' => 'category_name', 'dt' => $dt++ ),
		array( 'customfilter' => 'price','db' => 'price',  'dt' => $dt++ ), 
		array( 'customfilter' => 'product_image','db' => 'product_image',  'dt' => $dt++ , 'formatter' => function( $product_image, $row ) { 
					return '<img src="'.base_url($product_image).'" width="75px" height="75px">'; 
					}), 		 
		array( 'customfilter' => 'product.created_at','db' => 'product.created_at',  'dt' => $dt++ , 'formatter' => function( $d, $row ) { 
					return date( 'jS M Y', strtotime($d)); 
					}), 
		array('customfilter' => 'product.id','db' => 'product.id','dt' => $dt++ , 'formatter' => function( $id, $row ) { 
			return '<a href="'.base_url('product/edit/'.$id).'" class="btn btn-success btn-sm rounded-0 pr-2"  title="Edit"><i class="fa fa-edit"></i></a>
				<a href="javascript:void(0)" class="btn btn-danger btn-sm rounded-0 jsDelete" title="Delete" data-id="'.$id.'"><i class="fa fa-trash"></i></a>'; 
			} 
		) 
		); 
		echo json_encode( 
			SSP::simple( $_GET, $this->common->sql_detail(), $table, $primaryKey, $columns,$myJoin,$custom_where )
		 );
    }

    public function save_product($post_data){
    	$data = array(
    		'category_id' => $post_data['category'],
    		'category_ids' => implode(',', $post_data['categories']),
    		'product_name' => $post_data['product_name'],
    		'price' => $post_data['price'],
    		'product_image' => implode(',', $post_data['product_images']),
    	);
    	$this->db->insert('product',$data);
    	$product_id =$this->db->insert_id();

    	foreach($post_data['attribute'] as $key => $attribute){
    		$product_attribute = array(
    			'product_id'=>$product_id,
    			'attribute_id' => $attribute,
    			'sub_attribute_id' => $post_data['sub_attribute'][$key],
    			'value' => $post_data['value'][$key],
    		);
    		$this->db->insert('product_attribute',$product_attribute);	
    	}
    	return ;
    }

    public function get_product_attribute(){
    	 $query = $this->db->get('attribute');
    	return $query->result_array();
    }
    public function get_product_sub_attribute($id){

    	$this->db->where('attribute_id',$id);
    	$query = $this->db->get('sub_attribute');
    	return $query->result_array();
    	
    }

    public function get_product_sub_attribute_value($id){

    	$this->db->where('id',$id);
    	$query = $this->db->get('sub_attribute');
    	return $query->row_array();
    	
    } 

    public function get_product_attributes($id){
    	$this->db->where('product_id',$id);
    	$query = $this->db->get('product_attribute');
    	return $query->result_array();
    }


    public function update_product($post_data){
    	$data = array(
    		'category_id' => $post_data['category'],
    		'category_ids' => implode(',', $post_data['categories']),
    		'product_name' => $post_data['product_name'],
    		'price' => $post_data['price'],
    		'product_image' => implode(',', $post_data['product_images']),
    	);

    	$this->db->where('id', $post_data['product_id']);
    	$this->db->update('product',$data);


    	foreach($post_data['attribute'] as $key => $attribute){

    		$product_attribute = array(
    			'product_id'=>$post_data['product_id'],
    			'attribute_id' => $attribute,
    			'sub_attribute_id' => $post_data['sub_attribute'][$key],
    			'value' => $post_data['value'][$key],
    		);
    		if($post_data['product_attribute_id'][$key] != ""){
    			$this->db->where('id', $post_data['product_attribute_id'][$key]);
    			$this->db->update('product_attribute',$product_attribute);	
    		}else{
				$this->db->insert('product_attribute',$product_attribute);	    			
    		}
    	}
    	return ;
    }

    public function delete_attribute($id){
    	$this->db->where('id',$id);
    	$this->db->delete('product_attribute');
    	return true;
    }

    public function product_list(){
    	$this->db->select('*');
    	$query = $this->db->get('product');
    	return $query->result_array();
    }

    public function delete_product($id){
    	$this->db->where('id',$id);
    	$this->db->delete('product'); 

    	$this->db->where('product_id',$id);
    	$this->db->delete('product_attribute');     		

    }        


             

}	