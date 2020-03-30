<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class statusLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/statusLec_API';
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);
            
            // vu_lecturer_status
            $lcStatus = [
                'response'  => json_decode($result,true),
                'title'     => 'Status Lecturer'
            ];
    
            $this->load->view('template/header_admin', $lcStatus);
            $this->load->view('home/admins/content', $lcStatus);
            $this->load->view('template/footer_admin', $lcStatus);
        }else{
            redirect(base_url());
        }
    }
    
    public function updateStatusLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>