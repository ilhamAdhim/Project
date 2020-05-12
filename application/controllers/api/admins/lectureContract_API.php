
<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use RestServer\Libraries\REST_Controller;


defined('BASEPATH') OR exit('No direct script access allowed');

class lectureContract_API extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index_get()
    {  
        $res = [
            'status' => true,
            'data' => $this->admin_model->getLectureContract()
        ];
        $this->response($res, 200);
    }

    
    public function index_delete(){
        $subject_code = $this->delete('subject_code');
        $week = $this->delete('week');

        if($subject_code === null || $week === null){
            $this->response([
                'status'    => false,
                'message'     => 'Provide a subject_code and week !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $condition = [
                'subject_code' => $subject_code,
                'week' => $week
            ];
            if ($this->admin_model->deleteLectureContract($condition) > 0) {
                $this->response([
                    'status'    => true,
                    'message'   => 'Contract on ' . $subject_code . ' on week ' .$week .  'deleted'
                ],REST_Controller::HTTP_OK);
                # code...
            }else{
                echo 'id not found';
                $this->response([
                    'status'    => false,
                    'message'   => 'code not found !'
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post(){

        $data = [
            'subject_code' => $this->post('subject_code'),
            'week' => $this->post('week'),
            'date' =>  $this->post('date'),
            'topics' => $this->post('topics'),
            'method' => $this->post('method'),
        ];

        if($this->admin_model->createLectureContract($data)){
            $this->response([
                'status' => true,
                'message' => 'New Contract has been created'
            ],REST_Controller::HTTP_CREATED);
            
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create a new data'
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }

     public function index_put(){
        $data = [
            'subject_code' => $this->put('subject_code'),
            'week' => $this->put('week'),
            'date' =>  $this->put('date'),
            'topics' => $this->put('topics'),
            'method' => $this->put('method'),
        ];
        if($this->admin_model->updateLectureContract($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'Contract has been updated'
            ],REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}

/* End of file admin_API.php */


?>