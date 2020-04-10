<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class positionLecturer extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/posLec_API';
        $this->load->library('Excel');
        
        $this->load->model('admin_model');
        
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            //vu_position
                $result = $this->curl->simple_get($this->API);

                $lcPosition['response'] = json_decode($result,true);
                $lcPosition['title'] = 'Position Lecturer';

                $this->load->view('template/header_admin', $lcPosition);
                $this->load->view('home/admins/content', $lcPosition);
                $this->load->view('template/footer_admin', $lcPosition);
            }else{
                redirect(base_url());
            }
    }
    public function createPositionLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
    public function updatePositionLecturer(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deletePositionLecturer(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }
  
    function export(){
        
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // On excel columns
        $table_columns = array("code", "name" , "position","year", "semester");
        $column = 0;
        // Fill excel column values
        foreach($table_columns as $field){
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
        }
  
        $Position = $this->admin_model->getLecturerPosition();
        $excel_row = 2;
        
        // Fill the values of row based on excel's column 
        foreach($Position as $row){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->position);
          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->year);
          $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->semester);
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
        header('Content-Disposition: attachment;filename="Lecturer-Position.xlsx"');

        $object_writer->save('php://output');
  
    }


}

/* End of file researchGroup.php */


?>