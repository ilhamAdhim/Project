<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/class_API';
        $this->load->library('Excel');
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

    public function upload(){
        $fileName = time().$_FILES['file']['name'];
         
        $config['upload_path'] = 'assets/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        $inputFileName = 'assets/'.$fileName;
         
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    'cl_id'       =>  $rowData[0][0],
                    'cl_major'    =>  $rowData[0][1],
                    'cl_level'    =>  $rowData[0][2],
                    'cl_name'     =>  $rowData[0][3]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->admin_model->createClass($data);
                // delete_files('C:\xampp\htdocs\Project-dataDosen'.pathinfo($inputFileName,PATHINFO_BASENAME));                     
            }
            redirect('adminController/Classes');
    }
}

/* End of file researchGroup.php */


?>