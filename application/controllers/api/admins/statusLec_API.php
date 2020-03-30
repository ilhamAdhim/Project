
<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use RestServer\Libraries\REST_Controller;


defined('BASEPATH') OR exit('No direct script access allowed');

class statusLec_API extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index_get()
    {  
        $res = [
            'status' => true,
            'data' => $this->admin_model->getLecturerStatus()
        ];
        $this->response($res, 200);
    }

    //  public function index_delete(){
    //      $rs_id = $this->delete('rs_id');

    //      if($rs_id === null){
    //          $this->response([
    //              'status'    => false,
    //              'message'     => 'Provide an rs_id!'
    //          ], REST_Controller::HTTP_BAD_REQUEST);
    //      }else{
    //          if ($this->admin_model->deleteResearchGroup($id) > 0) {
    //              echo 'ok';
    //              $this->response([
    //                  'status'    => true,
    //                  'id'        => $id,
    //                  'message'   => 'deleted'
    //              ],REST_Controller::HTTP_OK);
    //              # code...
    //          }else{
    //              echo 'id not found';
    //              $this->response([
    //                  'status'    => false,
    //                  'message'   => 'id not found !'
    //              ],REST_Controller::HTTP_BAD_REQUEST);
    //          }
    //      }
    //  }

     /* public function index_post(){

        $data = [
            'rs_id'     => $this->get('rs_id'),
            'research'  => $this->get('research')
        ];

         if($this->admin_model->createResearchGroups($data)){
             echo "SUIPP";
             $this->response([
                 'status' => true,
                 'message' => 'New Research Group has been created'
             ],REST_Controller::HTTP_CREATED);
             
         }else{
             echo "SALAH";
             $this->response([
                 'status' => false,
                 'message' => 'failed to create a new data@'
             ],REST_Controller::HTTP_BAD_REQUEST);
         }
     }

     public function index_put(){
         $id = $this->put('id');

         $data = [
            'research'  => $this->input->post('research',true)
        ];

         if($this->admin_model->updateResearchGroup($data,$id) > 0){
             $this->response([
                 'status' => true,
                 'message' => 'Research Group has been updated'
             ],REST_Controller::HTTP_OK);
         }else{
             $this->response([
                 'status' => false,
                 'message' => 'failed to update data'
             ],REST_Controller::HTTP_BAD_REQUEST);
         }
     } */

}

/* End of file admin_API.php */


?>