<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dpaLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/dpaLec_API';
        $this->load->library('Excel');
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            //vu_dpa
            $result = $this->curl->simple_get($this->API);

            $lcDPA['response'] = json_decode($result,true);
            $lcDPA['title'] = 'DPA Lecturer';

            $this->load->view('template/header_admin', $lcDPA);
            $this->load->view('home/admins/content', $lcDPA);
            $this->load->view('template/footer_admin', $lcDPA);
        }else{
            redirect(base_url());
        }
    }

    public function createDPALecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
    public function updateDPALecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteDPALecturer(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }

    
    function export(){
        
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array("code", "name" , "class_name", "year");
        $column = 0;
        foreach($table_columns as $field){
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
  
        }
  
        $lec_dpa = $this->admin_model->getLecturerDPA();
        $excel_row = 2;

        foreach($lec_dpa as $row){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->class_name);
          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->year);
          $excel_row++;
        }

        // Auto size the column width
        foreach (range('A', $object->getActiveSheet()->getHighestDataColumn()) as $col) {
            $object->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        } 
  
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Lecturer-DPA.xlsx"');

        $object_writer->save('php://output');
  
    }

}

/* End of file researchGroup.php */


?>