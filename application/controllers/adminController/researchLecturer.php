<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class researchLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/resLec_API';
        
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);

            //vu_research        
            $lcResearch['response'] = json_decode($result,true);
            $lcResearch['title'] = 'Research Group Lecturer';

            $this->load->view('template/header_admin', $lcResearch);
            $this->load->view('home/admins/content', $lcResearch);
            $this->load->view('template/footer_admin', $lcResearch);
        }else{
            redirect(base_url());
        }
    }

    public function createResearchGroupLecturer(){
            
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
    public function updateResearchGroupLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteResearchGroupLecturer(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>