
<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use RestServer\Libraries\REST_Controller;


defined('BASEPATH') OR exit('No direct script access allowed');

class admin_API extends REST_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index()
    {
        
    }

    /* 
    public function index_get()
    {
        $code = $this->get('code');    
        $res = [
            // 'id' => $id,
            'position' => $this->lecturer_model->lecPositionYear($code),
            'research' => $this->lecturer_model->lecResearchPriority($code),
            'subject' => $this->lecturer_model->lecSubject($code)
        ];
       
        $this->response($res, 200);
       
    } */

    // public function index_delete(){
    //     $id = $this->delete('id');

    //     if($id === null){
    //         $this->response([
    //             'status'    => false,
    //             'message'     => 'Provide an id!'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }else{
    //         if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
    //             //ok
    //             $this->response([
    //                 'status'    => true,
    //                 'id'        => $id,
    //                 'message'   => 'deleted'
    //             ],REST_Controller::HTTP_OK);
    //             # code...
    //         }else{
    //             //id not found
    //             $this->response([
    //                 'status'    => false,
    //                 'message'   => 'id not found !'
    //             ],REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }
    // }

    // public function index_post(){
    //     $data = [
    //         'nrp'   => $this->post('nrp'),
    //         'nama'   => $this->post('nama'),
    //         'email'   => $this->post('email'),
    //         'jurusan'   => $this->post('jurusan')
    //     ];

    //     if($this->mahasiswa->createMahasiswa($data) > 0){
    //         $this->response([
    //             'status' => true,
    //             'message' => 'New mahasiswa has been created'
    //         ],REST_Controller::HTTP_CREATED);
    //     }else{
    //         $this->response([
    //             'status' => false,
    //             'message' => 'failed to create a new data@'
    //         ],REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

    // public function index_put(){
    //     $id = $this->put('id');

    //     $data = [
    //         'nrp'   => $this->post('nrp'),
    //         'nama'   => $this->post('nama'),
    //         'email'   => $this->post('email'),
    //         'jurusan'   => $this->post('jurusan'),
    //     ];
    //     if($this->mahasiswa->updateMahasiswa($data,$id) > 0){
    //         $this->response([
    //             'status' => true,
    //             'message' => 'Data mahasiswa has been updated'
    //         ],REST_Controller::HTTP_OK);
    //     }else{
    //         $this->response([
    //             'status' => false,
    //             'message' => 'failed to update data'
    //         ],REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

}

/* End of file admin_API.php */


?>