<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/Subjects_API';
        $this->load->model('admin_model');
        $this->load->library('Excel');
        //Do your magic here
    }
    
    public function index()
    {
        // tb_subject
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);
            $subjects = [
                'response'  => json_decode($result,true),
                'title'     => 'Subjects'
            ];

            $this->load->view('template/header_admin', $subjects);
            $this->load->view('home/admins/content', $subjects);
            $this->load->view('template/footer_admin', $subjects);
        }else{
            redirect(base_url());
        }
    }


    public function createSubjects(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code'  => $this->input->post('subject_code'),
                    'subject'       => $this->input->post('subject'),
                    'credit_hour'   => $this->input->post('credit_hour'),
                    'T/P'           => $this->input->post('T/P'),
                    'semester'      => $this->input->post('semester'),
                    'level'         => $this->input->post('level'),
                    'major'         => $this->input->post('major'),
                    'year'          => $this->input->post('year')
                ];
                    
                $result = $this->curl->simple_post($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/Subjects');
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateSubjects(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code'  => $this->input->post('subject_code'),
                    'subject'       => $this->input->post('subject'),
                    'credit_hour'   => $this->input->post('credit_hour'),
                    'T/P'           => $this->input->post('T/P'),
                    'semester'      => $this->input->post('semester'),
                    'level'         => $this->input->post('level'),
                    'major'         => $this->input->post('major'),
                    'year'          => $this->input->post('year')
                ];
                    
                $this->curl->simple_put($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
                    
                redirect('adminController/Subjects');
            }
        }else{
            redirect(base_url());
        }
    }

    public function deleteSubjects(){
        if($this->session->userdata('loggedIn')){
            if(isset($_POST['submit'])){
                $data = [
                    'subject_code' => $this->input->post('subject_code')
                ];
            }
            $this->curl->simple_delete($this->API , $data ,array(CURLOPT_BUFFERSIZE => 10));
            redirect('adminController/Subjects');
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
                    'subject_code'  => $rowData[0][0],
                    'subject'       => $rowData[0][1],
                    'credit_hour'   => $rowData[0][2],
                    'T/P'           => $rowData[0][3],
                    'semester'      => $rowData[0][4],
                    'level'         => $rowData[0][5],
                    'major'         => $rowData[0][6],
                    'year'          => $rowData[0][7]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->admin_model->createSubject($data);
                // delete_files('C:\xampp\htdocs\Project-dataDosen'.pathinfo($inputFileName,PATHINFO_BASENAME));                     
            }
            redirect('adminController/Subjects');
    }

    function export(){
        $object = new PHPExcel();
  
        $object->setActiveSheetIndex(0);
  
        $table_columns = array("subject_code", "subject", "credit_hour" ,"T/P" , "semester" , "level" ,"major","year");
  
        $column = 0;
  
        foreach($table_columns as $field){
  
            $object->getActiveSheet()->setCellValueByColumnAndRow($column,1, $field);
            
          $column++;
  
        }
  
        $data = $this->admin_model->getSubjects();
        
  
        $excel_row =2;
  
        foreach($data as $key){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $key->subject_code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $key->subject);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $key->credit_hour);
          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $key->TP);
          $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $key->semester);
          $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $key->level);
          $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $key->major);
          $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $key->year);
  
          $excel_row++;
  
        }
  
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        ob_end_clean();
  
        header('Content-Type: application/vnd.ms-excel');
  
        header('Content-Disposition: attachment;filename="Subject List.xlsx"');
  
        $object_writer->save('php://output');
  
      }
}

/* End of file researchGroup.php */


?>