<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class HourDist extends CI_Controller {

    
    public function __construct()
    {        
        parent::__construct();
        $this->API = 'http://localhost/Project-dataDosen/api/admins/hourDisLec_API';
        $this->load->model('admin_model');
        $this->load->library('Excel');
        //Do your magic here
    }
    
    public function index()
    {
        if($this->session->userdata('loggedIn')){
            $result = $this->curl->simple_get($this->API);

            //vu_hour_distribution
            $lcHour['response'] =json_decode($result,true);
            $lcHour['title'] = 'Hour Dist';

            $this->load->view('template/header_admin', $lcHour);
            $this->load->view('home/admins/content', $lcHour);
            $this->load->view('template/footer_admin', $lcHour);
        }else{
            redirect(base_url());
        }
        
    }

    public function createHourDist(){
            
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
    }

    
           

    public function updateHourDist(){
        if($this->session->userdata('loggedIn')){
            
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteHourDist(){
        if($this->session->userdata('loggedIn')){
                
        }else{
            redirect(base_url());
        }
        
    }

    
    function export(){
        
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // On excel columns
        $table_columns = array("code", "name" , "subject" , "class","total_hour","semester","year");
        $column = 0;
        // Fill excel column values
        foreach($table_columns as $field){
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
        }
  
        $HourDist = $this->admin_model->getHourDistribution();
        $excel_row = 2;
        
        // Fill the values of row based on excel's column 
        foreach($HourDist as $row){
          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->code);
          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->subject);
          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->class);
          $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->total_hour);
          $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->semester);
          $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->year);
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
        header('Content-Disposition: attachment;filename="Lecturer-HourDist.xlsx"');

        $object_writer->save('php://output');
  
    }


}

/* End of file researchGroup.php */


?>