<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class admin_home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->API = 'http://localhost/api/admin_API';
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

    // CREATE
        public function createResearchGroup(){
            if($this->session->userdata('loggedIn')){
                $this->admin_model->createResearchGroups();
                redirect('admin_home/researchGroup');
            }else{
                redirect(base_url());
            }
        }

        public function createClasses(){
            if($this->session->userdata('loggedIn')){
                $this->admin_model->createClass();
                redirect('admin_home/classList');
            }else{
                redirect(base_url());
            }
        }

        public function createSubjects(){
            if($this->session->userdata('loggedIn')){
                $this->admin_model->createSubject();
                redirect('admin_home/subjectList');
            }else{
                redirect(base_url());
            }
        }
        /* public function createStatusLecturer(){
            
        } */
        /* public function createFieldLecturer(){
            
        } */
        public function createPositionLecturer(){
            if($this->session->userdata('loggedIn')){
                
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
        public function createResearchGroupLecturer(){
            
            if($this->session->userdata('loggedIn')){
                
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
        

    // READ

        public function researchGroup(){
            
            if($this->session->userdata('loggedIn')){
                //tb_research_category , tb_research_sub_category
                $researchGroup = [
                    'data' => $this->admin_model->getResearchGroups(),
                    'title' => "Research Group",
                ];


                $this->load->view('template/header_admin', $researchGroup);
                $this->load->view('home/admins/content', $researchGroup);
                $this->load->view('template/footer_admin', $researchGroup);
            }else{
                redirect(base_url());
            }
            
        }


        
        public function classList(){
            //tb_class

            if($this->session->userdata('loggedIn')){
                $classes['data'] = $this->admin_model->getClasses();
                $classes['title'] = 'Classes';        
                $this->load->view('template/header_admin', $classes);
                $this->load->view('home/admins/content', $classes);
                $this->load->view('template/footer_admin', $classes);
            }else{
                redirect(base_url());
            }
            
        }
        
        public function subjectList(){
            // tb_subject

            if($this->session->userdata('loggedIn')){
                $subjects['data'] = $this->admin_model->getSubjects();
                $subjects['title'] = 'Subjects';

                $this->load->view('template/header_admin', $subjects);
                $this->load->view('home/admins/content', $subjects);
                $this->load->view('template/footer_admin', $subjects);
                }else{
                    redirect(base_url());
                }
            
        }

        // Lecturers
            public function statusLecturer(){
                if($this->session->userdata('loggedIn')){
                    // vu_lecturer_status
                    $lcStatus['data'] = $this->admin_model->getLecturerStatus();
                    $lcStatus['title'] = 'Status Lecturer';
            
                    $this->load->view('template/header_admin', $lcStatus);
                    $this->load->view('home/admins/content', $lcStatus);
                    $this->load->view('template/footer_admin', $lcStatus);
                }else{
                    redirect(base_url());
                }
            
            }
            

            public function fieldLecturer(){
                if($this->session->userdata('loggedIn')){
                    // vu_lecturer_field 

                    $lcField['data'] = $this->admin_model->getLecturerField();
                    $lcField['title'] = 'Field Lecturer';

                    $this->load->view('template/header_admin', $lcField);
                    $this->load->view('home/admins/content', $lcField);
                    $this->load->view('template/footer_admin', $lcField);
                }else{
                    redirect(base_url());
                }
                
            }

            public function positionLecturer(){
                if($this->session->userdata('loggedIn')){
                //vu_position
                    $lcPosition['data'] = $this->admin_model->getLecturerPosition();
                    $lcPosition['title'] = 'Position Lecturer';
    
                    $this->load->view('template/header_admin', $lcPosition);
                    $this->load->view('home/admins/content', $lcPosition);
                    $this->load->view('template/footer_admin', $lcPosition);
            }else{
                redirect(base_url());
            }

             
            }

            public function dpaLecturer(){
                if($this->session->userdata('loggedIn')){
                    //vu_dpa
                    $lcDPA['data'] = $this->admin_model->getLecturerDPA();
                    $lcDPA['title'] = 'DPA Lecturer';

                    $this->load->view('template/header_admin', $lcDPA);
                    $this->load->view('home/admins/content', $lcDPA);
                    $this->load->view('template/footer_admin', $lcDPA);
                }else{
                    redirect(base_url());
                }
                
            }

            public function researchLecturer(){
                if($this->session->userdata('loggedIn')){
                    //vu_research        
                    $lcResearch['data'] = $this->admin_model->getLecturerResearch();
                    $lcResearch['title'] = 'Research Group Lecturer';

                    $this->load->view('template/header_admin', $lcResearch);
                    $this->load->view('home/admins/content', $lcResearch);
                    $this->load->view('template/footer_admin', $lcResearch);
                }else{
                    redirect(base_url());
                }
                
            }

            public function hourDistributionLecturer(){
                if($this->session->userdata('loggedIn')){
                    //vu_hour_distribution
                    $lcHour['data'] = $this->admin_model->getHourDistribution();
                    $lcHour['title'] = 'Hour Dist';

                    $this->load->view('template/header_admin', $lcHour);
                    $this->load->view('home/admins/content', $lcHour);
                    $this->load->view('template/footer_admin', $lcHour);
                }else{
                    redirect(base_url());
                }
                
            }

    //UPDATE
        public function updateResearchGroup(){
            if($this->session->userdata('loggedIn')){
                $this->admin_model->updateResearchGroup();
                redirect('admin_home/researchGroup');
            }else{
                redirect(base_url());
            }
            
        }
        public function updateClasses(){
            if($this->session->userdata('loggedIn')){
                $this->admin_model->updateClass();
                redirect('admin_home/classList');
            }else{
                redirect(base_url());
            }
            
        }

        public function updateSubjects(){
            if($this->session->userdata('loggedIn')){
                $this->admin_model->updateSubject();
                redirect('admin_home/subjectList');
            }else{
                redirect(base_url());
            }
           
        }
        public function updateStatusLecturer(){
            if($this->session->userdata('loggedIn')){
                
            }else{
                redirect(base_url());
            }
            
        }
        public function updateFieldLecturer(){
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
        public function updateDPALecturer(){
            if($this->session->userdata('loggedIn')){
                
            }else{
                redirect(base_url());
            }
            
        }
        public function updateResearchGroupLecturer(){
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

    //DELETE

    public function deleteResearchGroup(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->deleteResearchGroup($this->input->post('rs_id'));
            redirect('admin_home/researchGroup');
        }else{
            redirect(base_url());
        }
        
    }
    public function deleteClasses(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->deleteClass($this->input->post('cl_id'));
            redirect('admin_home/classList');
        }else{
            redirect(base_url());
        }
        
    }

    public function deleteSubjects(){
        if($this->session->userdata('loggedIn')){
            $this->admin_model->deleteSubject($this->input->post('subject_code'));
            redirect('admin_home/subjectList');    
        }else{
            redirect(base_url());
        }
        
    }
    /* public function deleteStatusLecturer(){
        
    }
    public function deleteFieldLecturer(){
        
    } */
    public function deletePositionLecturer(){
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
    public function deleteResearchGroupLecturer(){
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
}

/* End of file home.php */

?>