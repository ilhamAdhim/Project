<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dpaLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/dpaLec_API';

        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            //vu_dpa
            $result = $this->curl->simple_get($this->API);

            $lcDPA['response'] = json_decode($result,true);
            $lcDPA['title'] = 'DPA Lecturer';

            $this->load->view('template/header_admin', $lcDPA);
            $this->load->view('home/admins/content', $lcDPA);
            $this->load->view('template/footer_admin', $lcDPA);
        }else{
            redirect(base_url());
        }
    }

    public function createDPALecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
    public function updateDPALecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteDPALecturer(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>