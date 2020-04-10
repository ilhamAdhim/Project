<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class statusLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/statusLec_API';
        $this->load->model('admin_model');
        $this->load->library('Excel');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);
            
            // vu_lecturer_status
            $lcStatus = [
                'response'  => json_decode($result,true),
                'title'     => 'Status Lecturer'
            ];
    
            $this->load->view('template/header_admin', $lcStatus);
            $this->load->view('home/admins/content', $lcStatus);
            $this->load->view('template/footer_admin', $lcStatus);
        }else{
            redirect(base_url());
        }
    }
    
    public function updateStatusLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    
    function export(){
        
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // On excel columns
        $table_columns = array("code", "name" , "status" , "phone_num");
        $column = 0;
        
        // Fill excel column values
        foreach($table_columns as $field){
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
        }
  
        $status = $this->admin_model->getLecturerStatus();
        $excel_row = 2;
        
        // Fill the values of row based on excel's column 
        foreach($status as $row){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->status);
          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->phone_num);
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
        header('Content-Disposition: attachment;filename="Lecturer-status.xlsx"');

        $object_writer->save('php://output');
  
    }

}

/* End of file researchGroup.php */


?>