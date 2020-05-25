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
            $teach_subjects = $this->lecturer_model->lecSubject($code);
            
            $isDownloadable = $this->lecturer_model->isSubjectDownloadable($teach_subjects);

            $data = array(
                'title'  => 'Lecturer Home',
                'code' => $code,
                'position' => $this->lecturer_model->lecPositionYear($code),
                'research' => $this->lecturer_model->lecResearchPriority($code),
                'subject' => $teach_subjects,
                'info'  => $this->lecturer_model->getPersonalInfo($code),
                'account' => $this->lecturer_model->getAccount($code),
                'isDownloadable' => $isDownloadable
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
   
    public function downloadContract(){
        $this->load->helper('download');
        $condition = [
            'subject_code'  => $this->input->post('subject_code'),
            'code'          => $this->input->post('code')
        ];

        $query = $this->lecturer_model->getFileContract($condition);
        $filename = $query[0]->contract_file.'.docx';
        $data = file_get_contents(base_url('assets/uploads/kontrakPerkuliahan/'.$filename));
        force_download($filename , $data);
        // var_dump($filename);
    }

    public function uploadContract(){
        $filename = $_FILES['filename']['name'];
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
            'contract_file'  => $filename,
            'uploaded_by'   => $this->session->userdata('code')
        ];

        // Upload the data by calling the model
        $this->lecturer_model->uploadContract($data);

    }
}

/* End of file home.php */


?>