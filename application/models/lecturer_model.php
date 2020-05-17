<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class lecturer_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        // $this->API = 'http://localhost/Project-dataDosen/api/lecturer';
    }

    // take lecturer's position and it's year and semester on the database
    
    public function lecPositionYear($code){
        $this->db->select('position,year');
        
        return $this->db->get_where('vu_position_2019',['code' =>$code])->result();   
    }
    // take lecturer's group research and it's priority on the database

    public function lecResearchPriority($code){
        $this->db->select('research,priority');
        
        return $this->db->get_where('vu_research',['code' => $code])->result();   
    }

    // take what subjects that lecturer's teach to student

    public function lecSubject($code){
        $this->db->select('subject,subject_code,class');
        return $this->db->get_where('vu_class_schedule',['code' => $code])->result();
    }

    public function getPersonalInfo($code){
        return $this->db->get_where('vu_lecturer_personal',['code' => $code])->result();
    }
    
    public function getAccount($code){
        $this->db->select('username,email');
        return $this->db->get_where('tb_lecturerlist',['code' => $code])->result();
    }

    public function getFiles($subject_code){
        $this->db->select('RPS,SAP');
        return $this->db->get_where('tb_rps_sap',['subject_code' => $subject_code])->result();
    }

    public function updatePersonalInfo(){
            $data = [
                'username'  =>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'phone'=>$this->input->post('phone')
            ];
            
            // Update the data based on the condition and new value given
            $this->db->where('code',$this->input->post('code'));
            $this->db->update('tb_lecturerlist', $data);   
        
    }

    public function changePassword($data){
        $this->db->where('code', $data['code']);
        $this->db->update('tb_lecturerlist', $data);
    }


}
    
/* End of file lecturer_model.php */


?>