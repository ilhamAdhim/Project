<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class classList extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/class_API';
        
        $this->load->model('admin_model');
        //Do your magic here
    }
    
    public function index()
    {
        //tb_class

        if($this->session->userdata('loggedIn')){

            $result = $this->curl->simple_get($this->API);

            $classes = [
                'response'  => json_decode($result,true),
                'title'     => 'Classes'
            ];

            $this->load->view('template/header_admin', $classes);
            $this->load->view('home/admins/content', $classes);
            $this->load->view('template/footer_admin', $classes);
        }else{
            redirect(base_url());
        }
    }

    public function createClasses(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->createClass();
            redirect('adminController/classList');
        }else{
            redirect(base_url());
        }
    }

    public function updateClasses(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->updateClass();
            redirect('adminController/classList');
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteClasses(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->deleteClass($this->input->post('cl_id'));
            redirect('adminController/classList');
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>