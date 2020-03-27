<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class auth extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('login_model');
            $this->load->library('session');   
        }

        public function index()
        {
            $this->load->view('auth/login'); 
            
        }

        public function proses_login(){
            $username = htmlspecialchars($this->input->post('uname1'));
            $password= htmlspecialchars($this->input->post('pwd1'));
            

            $ceklogin = $this->login_model->login($username,$password);
            $user = $ceklogin;
            if($ceklogin){
                array_push($user,$identity = 'Lecturer');
                foreach ($ceklogin as $row){
                # Set user's information for this session
                
                $identity = $user[1];
                
                if($identity == "Lecturer"){
                    // var_dump($row);
                    $loggedInUser = array(
                        'user'      => $row->name,
                        'code'      => $row->code,
                        'status'    => $row->status,
                        'phone_num' => $row->phone_num,
                        'NIDN'      => $row->NIDN,
                        'NIP'       => $row->NIP,
                        'username'  => $username,
                        'identity'  => $identity 
                    );
                    
                    $this->session->set_userdata( $loggedInUser );
                    
                    redirect('lec_home');
                    
                }elseif ($identity == "Admin") {
                    
                    // var_dump($row->name);
                    $loggedInUser = array(
                            'user'      => $row->name,
                            'username'  => $username,
                            'identity'  => $identity 
                        );

                        $this->session->set_userdata( $loggedInUser );
                        
                        redirect('admin_home');
                    }}
            }
            else{
                $data['pesan'] = 'Incorrect username and password';
                $data['title'] = 'Login Failed';
                $this->load->view('auth/login',$data);  
            } 
        }

        public function register()
        {
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('pwd1','Password','required');
            $this->form_validation->set_rules('uname1','Username','required');
            $this->form_validation->set_rules('identity','Identity','required');
            
            
            if($this->form_validation->run()){
                $this->register_model->register();
                redirect('auth');
            }else{
                $this->load->view('auth/register');
            }
        }
    
        public function logout(){
            $this->session->sess_destroy();
            redirect('auth','refresh');
        }

        

    }
    
    /* End of file login.php */
    
?>