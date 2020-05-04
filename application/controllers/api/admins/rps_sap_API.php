
<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use RestServer\Libraries\REST_Controller;


defined('BASEPATH') OR exit('No direct script access allowed');

class rps_sap_API extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index_get()
    {  
        $res = [
            'status' => true,
            'data' => $this->admin_model->getSubjectsRPSSAP()
        ];
        $this->response($res, 200);
    }
    function index_post() {
        $data = [
            'subject_code'       => $this->post('subject_code'),
            'rps'       => $this->post('rps'),
            'sap'  => $this->post('sap'),
        ];
        
        if($this->admin_model->createSubjectsRPSSAP($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'RPS and SAP has been updated'
            ],REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }

     public function index_put(){

        $data = [
            'subject_code'  => $this->put('subject_code'),
            'rps'           => $this->put('rps'),
            'sap'           => $this->put('sap'),
        ];

         if($this->admin_model->updateSubjectsRPSSAP($data) > 0){
             $this->response([
                 'status' => true,
                 'message' => 'RPS and SAP has been updated'
             ],REST_Controller::HTTP_OK);
         }else{
             $this->response([
                 'status' => false,
                 'message' => 'failed to update data'
             ],REST_Controller::HTTP_BAD_REQUEST);
         }
     }

     
    public function index_delete(){
        $code = $this->delete('code');

        if($code === null){
            $this->response([
                'status'    => false,
                'message'     => 'Provide a code!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->admin_model->deleteSubjectsRPSSAP($code) > 0) {
                echo 'ok';
                $this->response([
                    'status'    => true,
                    'id'        => $code,
                    'message'   => 'deleted'
                ],REST_Controller::HTTP_OK);
                # code...
            }else{
                echo 'code not found';
                $this->response([
                    'status'    => false,
                    'message'   => 'code not found !'
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

}

/* End of file admin_API.php */


?>