<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class lec_home extends CI_Controller {

    var $API ="";
    public function __construct()
    {
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/dosen_API' ;
    }
    
    public function index()
    {

        $data = array(
            'title'             => 'Lecturer Home',
            'identity'          => $this->session->userdata('identity'),
            'lecturer'          => $this->session->userdata('user'),
            'code'              => $this->session->userdata('code'),
            'status'            => $this->session->userdata('status'),
            'phone_num'         => $this->session->userdata('phone_num'),
            'username'          => $this->session->userdata('username'),
            'NIDN'              => $this->session->userdata('NIDN'),
            'NIP'               => $this->session->userdata('NIP'),
        );

        $result =  $this->curl->simple_get($this->API.'?code='.$this->session->userdata('code'));
        var_dump($result);
        $data['response'] = json_decode($result, true);

        // var_dump($data['response']);
        $this->load->view('template/header', $data);
        $this->load->view('home/lecturerHome', $data);
        $this->load->view('template/footer', $data);
    }

}

/* End of file home.php */


?>