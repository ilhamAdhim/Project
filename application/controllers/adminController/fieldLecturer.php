<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class fieldLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/fieldLec_API';
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index(){
        if($this->session->userdata('loggedIn')){
            // vu_lecturer_field 
            $result = $this->curl->simple_get($this->API);

            $lcField =[
                'response'  => json_decode($result,true),
                'title' => 'Field Lecturer'
            ];

            $this->load->view('template/header_admin', $lcField);
            $this->load->view('home/admins/content', $lcField);
            $this->load->view('template/footer_admin', $lcField);
        }else{
            redirect(base_url());
        }
    }

    
    public function updateFieldLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>