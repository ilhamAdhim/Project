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
        $data = [
            'researchGroup' => $this->admin_model->getResearchGroups(),
            'title' => "Research Group"
        ];

        /* var_dump($data); */
        $this->load->view('template/header_admin', $data);
        $this->load->view('home/admins/researchGroup', $data);
        $this->load->view('template/footer_admin', $data);

    }

    
    public function classList(){
        //tb_class

        $data['classes'] = $this->admin_model->getClasses();
        $data['title'] = 'Classes';
        /* var_dump($data); */
        
        $this->load->view('template/header_admin', $data);
        $this->load->view('home/admins/classes', $data);
        $this->load->view('template/footer_admin', $data);
    }
    
    public function subjectList(){
        // tb_subject

        $data['subjects'] = $this->admin_model->getSubjects();
        $data['title'] = 'Subjects';

        // var_dump($data);

        $this->load->view('template/header_admin', $data);
        $this->load->view('home/admins/subjects', $data);
        $this->load->view('template/footer_admin', $data);
    }

    // Lecturers
        public function statusLecturer(){
        // vu_lecturer_status
            
            $data['lcStatus'] = $this->admin_model->getLecturerStatus();
            $data['title'] = 'Status Lecturer';
    
            /* var_dump($data); */

            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_status', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function fieldLecturer(){
            // vu_lecturer_field 

            $data['lcField'] = $this->admin_model->getLecturerField();
            $data['title'] = 'Field Lecturer';

            // var_dump($data);

            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_fields', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function positionLecturer(){
            //vu_position

            $data['lcPosition'] = $this->admin_model->getLecturerPosition();
            $data['title'] = 'Position Lecturer';

            /* var_dump($data); */

            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_position', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function dpaLecturer(){
            //vu_dpa
            $data['lcDPA'] = $this->admin_model->getLecturerDPA();
            $data['title'] = 'DPA Lecturer';

            /* var_dump($data); */

            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_dpa', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function researchLecturer(){
            //vu_research        
            $data['lcResearch'] = $this->admin_model->getLecturerResearch();
            $data['title'] = 'Research Group Lecturer';

            /* var_dump($data); */

            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_research', $data);
            $this->load->view('template/footer_admin', $data);
        }

        public function hourDistributionLecturer(){
                //vu_hour_distribution
            $data['lcHour'] = $this->admin_model->getHourDistribution();
            $data['title'] = 'Hour Dist.';

            // var_dump($data);

            $this->load->view('template/header_admin', $data);
            $this->load->view('home/admins/lc_dist', $data);
            $this->load->view('template/footer_admin', $data);
        }
}

/* End of file home.php */

?>