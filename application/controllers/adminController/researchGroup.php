<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class researchGroup extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen2/api/admins/rsGroup_API';
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
        /* $this->API = 'http://localhost/Project-dataDosen2/api/admins/rsGroup_API'; */
        if($this->session->userdata('loggedIn')){
            $this->admin_model->createResearchGroups();
            redirect('adminController/researchGroup');
        }else{
            redirect(base_url());
        }
    }

    public function updateResearchGroup(){
        /* $this->API = 'http://localhost/Project-dataDosen2/api/admins/rsGroup_API'; */
        if($this->session->userdata('loggedIn')){
            $this->admin_model->updateResearchGroup();
            redirect('adminController/researchGroup');
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteResearchGroup(){
        /* $this->API = 'http://localhost/Project-dataDosen2/api/admins/rsGroup_API'; */
        if($this->session->userdata('loggedIn')){
            // $this->curl->delete($this->API.'?rs_id='.);
            $this->admin_model->deleteResearchGroup($this->input->post('rs_id'));
            redirect('adminController/researchGroup');
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>