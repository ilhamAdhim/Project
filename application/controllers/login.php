<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class login extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('login_model');
            $this->load->library('session');   
        }

        public function proses_login(){
            $username = htmlspecialchars($this->input->post('uname1'));
            $password= htmlspecialchars($this->input->post('pwd1'));
            

            $ceklogin = $this->login_model->login($username,$password);
            $user = $ceklogin;
            // var_dump($user);
            if($ceklogin){
                array_push($user,$identity = 'Lecturer');
                foreach ($ceklogin as $row);
                    # Set user's information for this session
                    
                    $loggedInUser = array(
                        'user'      => $row->name,
                        'code'      => $row->code,
                        'status'    => $row->status,
                        'phone_num' => $row->phone_num,
                        'NIDN'      => $row->NIDN,
                        'NIP'       => $row->NIP,
                        'username'  => $username,
                        'identity'  => $user[1]
                    );
                    
                    $this->session->set_userdata( $loggedInUser );
                    
                    
                    if($this->session->userdata('identity') == "Lecturer"){
                        redirect('lec_home');
                    }elseif ($this->session->userdata('identity') == "Admin") {
                        # code...
                        redirect('admin_home');
                    }
            }
            else{
                $data['pesan'] = 'Incorrect username and password';
                $data['title'] = 'Login Failed';
                $this->load->view('login/login',$data);  
            } 
        }
    
        public function logout(){
            $this->session->sess_destroy();
            redirect('login','refresh');
        }

        public function index()
        {
            $this->load->view('login/login'); 
            
        }

    }
    
    /* End of file login.php */
    
?>