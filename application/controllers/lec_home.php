<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class lec_home extends CI_Controller {

    public function index()
    {

        $indicatorCode = $this->session->userdata('code');
        
        // take lecturer's position and it's year and semester on the database
            $this->db->select('position,year');
            $this->db->from('vu_position_2019');
            $this->db->where('code', $indicatorCode);
            $this->db->limit(1);
            
            $position = $this->db->get()->result();

        // take lecturer's group research and it's priority on the database
            $this->db->select('research,priority');
            $this->db->from('vu_research');
            $this->db->where('code', $indicatorCode);
            
            $researchGroup = $this->db->get()->result();
        
        // take what subjects that lecturer's teach to student
            $this->db->select('subject');
            $this->db->from('vu_class_schedule');
            $this->db->where('name',$this->session->userdata('user') );
            $this->db->group_by('subject');

            $subjects = $this->db->get()->result();            
        
        
        $data = array(
            'title'             => 'Lecturer Home',
            'identity'          => $this->session->userdata('identity'),
            'lecturer'          => $this->session->userdata('user'),
            'code'              => $this->session->userdata('code'),
            'status'            => $this->session->userdata('status'),
            'phone_num'         => $this->session->userdata('phone_num'),
            'username'          => $this->session->userdata('username'),
            'NIDN'              => $this->session->userdata('NIDN'),
            'NIP'               => $this->session->userdata('NIP'),
            'position'          => $position,
            'group_research'    => $researchGroup,
            'subjects'          => $subjects
        );
        
        // var_dump($data);
        // var_dump($activeUser[0]);

        $this->load->view('template/header', $data);
        $this->load->view('home/lecturerHome', $data);
        $this->load->view('template/footer', $data);
    }

}

/* End of file home.php */


?>