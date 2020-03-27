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
        $researchGroup = [
            'data' => $this->admin_model->getResearchGroups(),
            'title' => "Research Group",
        ];
        $this->load->view('template/header_admin', $researchGroup);
        $this->load->view('home/admins/content', $researchGroup);
        $this->load->view('template/footer_admin', $researchGroup);
    }

    // public function createResearchGroup(){
    //     $this->form_validation->set_rules('nama','Nama','required');
    //     $this->form_validation->set_rules('nim','Nim','required|numeric');
    //     $this->form_validation->set_rules('email','Email','required|valid_email');

    //     if($this->form_validation->run()){
    //         $this->mahasiswa_model->tambahdatamhs();
    //         $this->session->set_flashdata('flash-data', 'ditambahkan');
    //         redirect('mahasiswa','refresh');
            
    //     }else{
    //         $this->load->view('template/header',$data);
    //         $this->load->view('mahasiswa/tambah',$data);
    //         $this->load->view('template/footer');
    //     }
    // }

    
    public function classList(){
        //tb_class

        $classes['data'] = $this->admin_model->getClasses();
        $classes['title'] = 'Classes';        
        $this->load->view('template/header_admin', $classes);
        $this->load->view('home/admins/content', $classes);
        $this->load->view('template/footer_admin', $classes);
    }
    
    public function subjectList(){
        // tb_subject

        $subjects['data'] = $this->admin_model->getSubjects();
        $subjects['title'] = 'Subjects';

        $this->load->view('template/header_admin', $subjects);
        $this->load->view('home/admins/content', $subjects);
        $this->load->view('template/footer_admin', $subjects);
    }

    // Lecturers
        public function statusLecturer(){
        // vu_lecturer_status
            $lcStatus['data'] = $this->admin_model->getLecturerStatus();
            $lcStatus['title'] = 'Status Lecturer';
    
            $this->load->view('template/header_admin', $lcStatus);
            $this->load->view('home/admins/content', $lcStatus);
            $this->load->view('template/footer_admin', $lcStatus);
        }
        

        public function fieldLecturer(){
            // vu_lecturer_field 

            $lcField['data'] = $this->admin_model->getLecturerField();
            $lcField['title'] = 'Field Lecturer';

            $this->load->view('template/header_admin', $lcField);
            $this->load->view('home/admins/content', $lcField);
            $this->load->view('template/footer_admin', $lcField);
        }

        public function positionLecturer(){
            //vu_position

            $lcPosition['data'] = $this->admin_model->getLecturerPosition();
            $lcPosition['title'] = 'Position Lecturer';

            $this->load->view('template/header_admin', $lcPosition);
            $this->load->view('home/admins/content', $lcPosition);
            $this->load->view('template/footer_admin', $lcPosition);
        }

        public function dpaLecturer(){
            //vu_dpa
            $lcDPA['data'] = $this->admin_model->getLecturerDPA();
            $lcDPA['title'] = 'DPA Lecturer';

            $this->load->view('template/header_admin', $lcDPA);
            $this->load->view('home/admins/content', $lcDPA);
            $this->load->view('template/footer_admin', $lcDPA);
        }

        public function researchLecturer(){
            //vu_research        
            $lcResearch['data'] = $this->admin_model->getLecturerResearch();
            $lcResearch['title'] = 'Research Group Lecturer';

            $this->load->view('template/header_admin', $lcResearch);
            $this->load->view('home/admins/content', $lcResearch);
            $this->load->view('template/footer_admin', $lcResearch);
        }

        public function hourDistributionLecturer(){
                //vu_hour_distribution
            $lcHour['data'] = $this->admin_model->getHourDistribution();
            $lcHour['title'] = 'Hour Dist.';

            $this->load->view('template/header_admin', $lcHour);
            $this->load->view('home/admins/content', $lcHour);
            $this->load->view('template/footer_admin', $lcHour);
        }
}

/* End of file home.php */

?>