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
        return $this->db->get_where('vu_position_2019',['code' =>$code])->result();   

    }
    // take lecturer's group research and it's priority on the database

    public function lecResearchPriority($code){
        return $this->db->get_where('vu_research',['code' => $code])->result();   
    }

    // take what subjects that lecturer's teach to student

    public function lecSubject($code){
        return $this->db->get_where('vu_class_schedule',['code' => $code])->result();
    }
}

/* End of file lecturer_model.php */


?>