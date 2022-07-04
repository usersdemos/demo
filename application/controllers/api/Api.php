<?php require APPPATH . 'libraries/REST_Controller.php';     

class Api extends REST_Controller {    

   public function __construct() {

      parent::__construct();

      $this->load->database();

   }

    public function saveproduct_post(){

      $data["result"] = "success";

      $this->response($data, REST_Controller::HTTP_OK);      

   }


}