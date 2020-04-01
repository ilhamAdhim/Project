<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/Subjects_API';
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        // tb_subject
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);
            $subjects = [
                'response'  => json_decode($result,true),
                'title'     => 'Subjects'
            ];

            $this->load->view('template/header_admin', $subjects);
            $this->load->view('home/admins/content', $subjects);
            $this->load->view('template/footer_admin', $subjects);
        }else{
            redirect(base_url());
        }
    }


    public function createSubjects(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code'  => $this->input->post('subject_code'),
                    'subject'       => $this->input->post('subject'),
                    'credit_hour'   => $this->input->post('credit_hour'),
                    'T/P'           => $this->input->post('T/P'),
                    'semester'      => $this->input->post('semester'),
                    'level'         => $this->input->post('level'),
                    'major'         => $this->input->post('major'),
                    'year'          => $this->input->post('year')
                ];
                    
                $result = $this->curl->simple_post($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/Subjects');
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateSubjects(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code'  => $this->input->post('subject_code'),
                    'subject'       => $this->input->post('subject'),
                    'credit_hour'   => $this->input->post('credit_hour'),
                    'T/P'           => $this->input->post('T/P'),
                    'semester'      => $this->input->post('semester'),
                    'level'         => $this->input->post('level'),
                    'major'         => $this->input->post('major'),
                    'year'          => $this->input->post('year')
                ];
                    
                $this->curl->simple_put($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/Subjects');
            }
        }else{
            redirect(base_url());
        }
    }

    public function deleteSubjects(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code' => $this->input->post('subject_code')
                ];
            }
            $this->curl->simple_delete($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            redirect('adminController/Subjects');
        }else{
            redirect(base_url());
        }
    }

}

/* End of file researchGroup.php */


?>