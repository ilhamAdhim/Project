<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class subjectList extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/subjectList_API';
        $this->load->model('admin_model');
        
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
            $this->admin_model->createSubject();
            redirect('adminController/subjectList');
        }else{
            redirect(base_url());
        }
    }

    public function updateSubjects(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->updateSubject();
            redirect('adminController/subjectList');
        }else{
            redirect(base_url());
        }
       
    }

    public function deleteSubjects(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->deleteSubject($this->input->post('subject_code'));
            redirect('adminController/subjectList');    
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>