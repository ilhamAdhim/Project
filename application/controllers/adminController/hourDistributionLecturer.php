<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class hourDistributionLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/hourDisLec_API';
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);

            //vu_hour_distribution
            $lcHour['response'] =json_decode($result,true);
            $lcHour['title'] = 'Hour Dist';

            $this->load->view('template/header_admin', $lcHour);
            $this->load->view('home/admins/content', $lcHour);
            $this->load->view('template/footer_admin', $lcHour);
        }else{
            redirect(base_url());
        }
        
    }

    public function createHourDist(){
            
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
           

    public function updateHourDist(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteHourDist(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>