<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class positionLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/posLec_API';

        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            //vu_position
                $result = $this->curl->simple_get($this->API);

                $lcPosition['response'] = json_decode($result,true);
                $lcPosition['title'] = 'Position Lecturer';

                $this->load->view('template/header_admin', $lcPosition);
                $this->load->view('home/admins/content', $lcPosition);
                $this->load->view('template/footer_admin', $lcPosition);
            }else{
                redirect(base_url());
            }
    }
    public function createPositionLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
    public function updatePositionLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deletePositionLecturer(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }
  

}

/* End of file researchGroup.php */


?>