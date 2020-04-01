<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class researchGroup extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/rsGroup_API';
        $this->load->model('admin_model');
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            //tb_research_category , tb_research_sub_category
            $result =  $this->curl->simple_get($this->API);

            $researchGroup = [
                'response' =>  json_decode($result, true),
                'title' => "Research Group",
            ];
            $this->load->view('template/header_admin', $researchGroup);
            $this->load->view('home/admins/content', $researchGroup);
            $this->load->view('template/footer_admin', $researchGroup);
        }else{
            redirect(base_url());
        }
    }

    
    public function createResearchGroup(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'rs_id'       =>  $this->input->post('rs_id'),
                    'research'    =>  $this->input->post('research'),
                ];
                    
                $result = $this->curl->simple_post($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                redirect('adminController/researchGroup');
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateResearchGroup(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'rs_id'       =>  $this->input->post('rs_id'),
                    'research'    =>  $this->input->post('research'),
                ];
                    
                $this->curl->simple_put($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                redirect('adminController/researchGroup');
            }
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteResearchGroup(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'rs_id' => $this->input->post('rs_id')
                ];
            }
            $this->curl->simple_delete($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            redirect('adminController/researchGroup');
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>