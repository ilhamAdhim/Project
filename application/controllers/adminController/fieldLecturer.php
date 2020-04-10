<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class fieldLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        //Do your magic here
        $this->API = 'http://localhost/Project-dataDosen/api/admins/fieldLec_API';
        $this->load->model('admin_model');
        $this->load->library('Excel');
    }
    
    public function index(){
        if($this->session->userdata('loggedIn')){
            // vu_lecturer_field 
            $result = $this->curl->simple_get($this->API);

            $lcField =[
                'response'  => json_decode($result,true),
                'title' => 'Field Lecturer'
            ];

            $this->load->view('template/header_admin', $lcField);
            $this->load->view('home/admins/content', $lcField);
            $this->load->view('template/footer_admin', $lcField);
        }else{
            redirect(base_url());
        }
    }

    
    /* public function updatelec_fieldturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    } */

    function export(){
        
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // On excel columns
        $table_columns = array("code", "name" , "field");
        $column = 0;

        // Fill excel column values
        foreach($table_columns as $field){
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
  
        }
  
        $lec_field = $this->admin_model->getLecturerField();
        $excel_row = 2;

        // Fill the values of row based on excel's column 
        foreach($lec_field as $row){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->field_of_study);
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
        header('Content-Disposition: attachment;filename="Lecturer-Field.xlsx"');

        $object_writer->save('php://output');
  
    }

}

/* End of file researchGroup.php */


?>