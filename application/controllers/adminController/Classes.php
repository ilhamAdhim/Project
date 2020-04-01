<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/class_API';
        $this->load->helper('form');
        $this->load->helper('url');
        
        
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
            if(isset($_POST['submit'])){
                $data = [
                    'cl_id'       =>  $this->input->post('cl_id'),
                    'cl_major'    =>  $this->input->post('cl_major'),
                    'cl_level'    =>  $this->input->post('cl_level'),
                    'cl_name'     =>  $this->input->post('cl_name')
                ];
                    
                $result = $this->curl->simple_post($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/Classes');
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateClasses(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'cl_id'       =>  $this->input->post('cl_id'),
                    'cl_major'    =>  $this->input->post('cl_major'),
                    'cl_level'    =>  $this->input->post('cl_level'),
                    'cl_name'     =>  $this->input->post('cl_name')
                ];
                    
                $this->curl->simple_put($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/Classes');
            }
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteClasses(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'cl_id' => $this->input->post('cl_id')
                ];
            }
            $this->curl->simple_delete($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            redirect('adminController/Classes');
        }else{
            redirect(base_url());
        }
        
    }

}

/* End of file researchGroup.php */


?>