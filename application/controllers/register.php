<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('register_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('pwd1','Password','required');
        $this->form_validation->set_rules('uname1','Username','required');
        $this->form_validation->set_rules('identity','Identity','required');
        
        
        if($this->form_validation->run()){
            $this->register_model->register();
            redirect('login');
        }else{
            $this->load->view('login/register');
        }
    }

}

/* End of file cl_register.php */


?>