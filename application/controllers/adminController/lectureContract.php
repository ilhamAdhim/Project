<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class lectureContract extends CI_Controller {

    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/lectureContract_API';
        $this->load->model('admin_model');
        $this->load->library('Excel');
    }

    public function index(){
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);

            //vu_hour_distribution
            $lcContract['response'] =json_decode($result,true);
            $lcContract['title'] = 'Lecture Contract';

            $this->load->view('template/header_admin', $lcContract);
            $this->load->view('home/admins/content_contract', $lcContract);
            $this->load->view('template/footer_admin', $lcContract);
        }else{
            redirect(base_url());
        }
        
    }

    public function createLectureContract(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code' => $this->input->post('subject_code'),
                    'contract_file' => $this->input->post('contract_file'),
                    'uploaded_by' =>  $this->input->post('uploaded_by')
                ];

                $result = $this->curl->simple_post($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                redirect('adminController/lectureContract');
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateLectureContract(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code' => $this->input->post('subject_code'),
                    'contract_file' => $this->input->post('contract_file'),
                    'uploaded_by' =>  $this->input->post('uploaded_by')
                ];
                    
                $this->curl->simple_put($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/lectureContract');
            }
        }else{
            redirect(base_url());
        }
    }

    public function deleteLectureContract(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code' => $this->input->post('subject_code'),
                ];
            }
            $this->curl->simple_delete($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            redirect('adminController/lectureContract');
        }else{
            redirect(base_url());
        }
        
    }

    public function upload(){
        $fileName = time().$_FILES['file']['name'];
        
        $config['upload_path'] = 'assets/uploads/csv/'; //create folder assets in root 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv'; //set file format
        $config['max_size'] = 10000;
         

        $this->load->library('upload'); //load library upload 
        $this->upload->initialize($config); //loaded library comes with configuration
         
        if(!$this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        $inputFileName = 'assets/uploads/csv/'.$fileName;
         
        try {
            // get the file and read the file name and type
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
                                                 
                //Match with column names in database
                $data = [
                    'subject_code' =>  $rowData[0][0],
                    'contract_file' => $rowData[0][1],
                    'uploaded_by' =>  $rowData[0][2],
                ];
                 
                //Match with the model and which function to execute
                $this->admin_model->createlectureContractribution($data);
                // use to delete the file as soon as it updates the database
                delete_files('C:/xampp/htdocs/Project-dataDosen/assets/uploads/csv');      
                    
            }
            redirect('adminController/lectureContract');
    }
  
    public function template(){
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
  
        // On excel columns
        $table_columns = array("subject_code", "week" , "date" , "topics","method");

        $column = 0;

        // Fill excel column values
        foreach($table_columns as $field){
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        // Auto size the column width
        foreach (range('A', $object->getActiveSheet()->getHighestDataColumn()) as $col) {
            $object->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        } 

        // Set the version
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        ob_end_clean();
  
        // Set to excel content type
        header('Content-Type: application/vnd.ms-excel');
  
        // Set the extension
        header('Content-Disposition: attachment;filename="lectureContract Template.xlsx"');
        $object_writer->save('php://output');
    }
    

    public function export(){
        
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // On excel columns
        $table_columns = array("subject_code", "contract_file" , "uploaded_by");
        $column = 0;
        // Fill excel column values
        foreach($table_columns as $field){
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
        }
  
        $lectureContract = $this->admin_model->getLectureContract();
        $excel_row = 2;
        
        // Fill the values of row based on excel's column 
        foreach($lectureContract as $row){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->subject_code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->contract_file);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->uploaded_by);
          $excel_row++;
        }

        
        // Auto size the column width
        foreach (range('A', $object->getActiveSheet()->getHighestDataColumn()) as $col) {
            $object->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        } 
  
        // Set the version
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        ob_end_clean();
        // Set to excel content type
        header('Content-Type: application/vnd.ms-excel');
        // Set the extension
        header('Content-Disposition: attachment;filename="Lecturer-lectureContract.xlsx"');

        $object_writer->save('php://output');
  
    }

    public function downloadFile(){
        $this->load->helper('download');
        $filename = $this->input->post('filename').'.docx';
        $data = file_get_contents(base_url('assets/uploads/kontrakPerkuliahan/'.$filename));
        force_download($filename , $data);
    }

    public function uploadFile(){
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
            'contract_file'  => $fileName,
            'uploaded_by'   => $this->session->userdata('code')            
        ];

        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('template/header_admin');
            $this->load->view('home/admins/error', $error);
            $this->load->view('template/footer_admin');
        }else{            
            if(empty($this->admin_model->getOneSubjectsRPSSAP($filename))){
                $this->curl->simple_post($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            }else{
                $this->curl->simple_put($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            }
            redirect('adminController/subjectsRPSSAP');
        }

    }

}

/* End of file lectureContract.php */


?>