<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class admin_home extends CI_Controller {

    public function index()

    
    {
        $data = array(
            'title' => 'Admin Home',
            'identity' => $this->session->userdata('identity'),
            'admin' => $this->session->userdata('user'),
        );
        
        var_dump($data);

        $data['title'] = "Admin Home";
        $this->load->view('template/header', $data);
        $this->load->view('home/adminHome', $data);
        $this->load->view('template/footer', $data);
    }

}

/* End of file home.php */


?>