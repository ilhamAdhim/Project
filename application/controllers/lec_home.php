<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class lec_home extends CI_Controller {

    var $API ="";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('lecturer_model');
        
    }
    
    public function index()
    {
        
        if($this->session->userdata('loggedIn')){
            $code = $this->session->userdata('code');
            $data = array(
                'title'  => 'Lecturer Home',
                'code' => $code,
                'position' => $this->lecturer_model->lecPositionYear($code),
                'research' => $this->lecturer_model->lecResearchPriority($code),
                'subject' => $this->lecturer_model->lecSubject($code),
                'info'  => $this->lecturer_model->getPersonalInfo($code),
                'username' => $this->lecturer_model->getUsername($code),
            );


            // var_dump($data['response']);
            $this->load->view('template/header', $data);
            $this->load->view('home/lecturerHome', $data);
            $this->load->view('template/footer', $data);
        }else{
            redirect(base_url());
        }
    }

    public function editData(){
        $data = [
            'nip' => $this->input->post('nip'),
            'username'  =>$this->input->post('username'),
            'nidn'=>$this->input->post('nidn'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'street'=>$this->input->post('street')
        ];

        $this->lecturer_model->updatePersonalInfo();
    }

    public function changePassword(){
        $data = [
            'code'      => $this->session->userdata('code'),
            'username'  => $this->session->userdata('username'),
            'password'  => $this->input->post('password')
        ];
        if($this->lecturer_model->changePassword($data)){

        }else{

        }
    }
}

/* End of file home.php */


?>