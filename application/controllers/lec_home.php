<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class lec_home extends CI_Controller {

    var $API ="";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('lecturer_model');
        $this->load->helper('file');
        $this->load->library('upload');
    }
    
    public function index()
    {
        
        if($this->session->userdata('loggedIn')){
            $code = $this->session->userdata('code');
            
            $data = array(
                'title'  => 'Lecturer Home',
                'code' => $code,
                'position' => $this->lecturer_model->lecPositionYear($code),
                'research' => $this->lecturer_model->lecResearchPriority($code),
                'subject' => $this->lecturer_model->lecSubject($code),
                'info'  => $this->lecturer_model->getPersonalInfo($code),
                'account' => $this->lecturer_model->getAccount($code),
            );

            $this->session->set_userdata($data);

            $this->load->view('template/header', $data);
            $this->load->view('home/lecturerHome', $data);
            $this->load->view('template/footer', $data);
        }else{
            redirect(base_url());
        }
    }

    public function editData(){
        $data = [
            'nip' => $this->input->post('nip'),
            'username'  =>$this->input->post('username'),
            'nidn'=>$this->input->post('nidn'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'street'=>$this->input->post('street')
        ];

        $this->lecturer_model->updatePersonalInfo();
        redirect('lec_home');
    }

    public function changePassword(){
        $data = [
            'code'      => $this->session->userdata('code'),
            'password'  => $this->input->post('password')
        ];
        
        $this->lecturer_model->changePassword($data);
        redirect('lec_home');
        
    }

    public function downloadFile(){
        $this->load->helper('download');
        $type = $this->input->post('type') === '1' ? 'RPS' : 'SAP';
        $filename = $this->input->post('filename').'.docx';
        // echo $type;
        $data = file_get_contents(base_url('assets/uploads/'.$type.'/'.$filename));
        force_download($filename , $data);
    }

    public function uploadFile(){
        $filename = $_FILES['userfile']['name'];
        $type = substr($filename , 0 ,3) === 'RPS' ? 'RPS' : 'SAP';
        $uploadPath =  './assets/uploads/'.$type.'/';
        
        $config = [
            'upload_path'   => $uploadPath,
            'overwrite'     => TRUE,
            'allowed_types' => 'pdf|doc|docx'
        ];

        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('template/header_admin');
            $this->load->view('home/admins/error', $error);
            $this->load->view('template/footer_admin');
        }else{            
            
            redirect('adminController/subjectsRPSSAP');
        }
    }

    public function downloadContract(){
        $this->load->helper('download');
        $filename = $this->input->post('filename').'.docx';
        $data = file_get_contents(base_url('assets/uploads/kontrakPerkuliahan/'.$filename));
        force_download($filename , $data);
    }

    public function uploadContract(){
        $filename = $_FILES['userfile']['name'];
        $uploadPath =  './assets/uploads/kontrakPerkuliahan/';
        
        $config = [
            'upload_path'   => $uploadPath,
            'overwrite'     => TRUE,
            'allowed_types' => 'pdf|doc|docx'
        ];

        // slice the filename into 3 parts
        $details = explode('_',$filename);

        $data = [
            'subject_code'  => $details[1],
            'contractName'  => $fileName,
            'uploaded_by'   => $this->session->userdata('code')
        ];

    }
}

/* End of file home.php */


?>