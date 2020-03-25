<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class admin_home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Admin Home',
            'identity'          => $this->session->userdata('identity'),
            'admin'             => $this->session->userdata('user'),
            'amountClasses'     => $this->admin_model->getAmountClasses(),
            'amountSubjectsOfD4'=> $this->admin_model->getAmountSubjectsByMajor('D4'),
            'amountSubjectsOfD3'=> $this->admin_model->getAmountSubjectsByMajor('D3'),
            'amountLecturers'   => $this->admin_model->getAmountLecturers(),
        );
        
        // $data['title'] = "Admin Home";
        $this->load->view('template/header_admin', $data);
        $this->load->view('home/adminHome', $data);
        $this->load->view('template/footer_admin', $data);
    }

    

    public function researchGroup(){
        //tb_research_category , tb_research_sub_category
        $data = $this->admin_model->getResearchGroups();
        $data['title'] = "Research Group";

        /* var_dump($data); */
        $this->load->view('template/header_admin', $data);
        $this->load->view('home/admins/researchGroup', $data);
        $this->load->view('template/footer_admin', $data);

    }

    
    public function classList(){
        //tb_class

        $data = $this->admin_model->getClasses();
        
        $this->load->view('template/header_admin', $data);
        $this->load->view('home/admins/classes', $data);
        $this->load->view('template/footer_admin', $data);
    }
    
    public function subjectList(){
        // tb_subject
        $data['title'] = '';
        $this->load->view('template/header_admin', $data);
        $this->load->view('home/admins/subjects', $data);
        $this->load->view('template/footer_admin', $data);
    }

    // Lecturers
        public function statusLecturer(){
            // vu_lecturer_status
            $data['title'] = 'Status Lecturer';
            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_status', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function fieldLecturer(){
            // vu_lecturer_field 
            $data['title'] = 'Field Lecturer';
            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_fields', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function positionLecturer(){
        //vu_position
            $data['title'] = 'Position Lecturer';
            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_position', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function dpaLecturer(){
        //vu_dpa
            $data['title'] = 'DPA Lecturer';
            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_dpa', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function researchLecturer(){
        //vu_research        
            $data['title'] = 'Research Group Lecturer';
            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_research', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function hourDistributionLecturer(){
            //vu_hour_distribution
            $data['title'] = 'Hour Dist.';
            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_dist', $data);
            $this->load->view('template/footer_admin', $data);
        }
}

/* End of file home.php */

?>