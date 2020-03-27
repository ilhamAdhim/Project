<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

    public function index(){
       
    }

    // Research Groups
        public function getResearchGroupsAmount(){
            $this->db->get('tb_research_category');
            return $this->db->affected_rows();
        }

        public function getSubResearchGroupsAmount(){
            $this->db->get('tb_research_sub_category');
            return $this->db->affected_rows();
        }

        public function createResearchGroups(){
            $data = [
                'id'        => $this->input->post('id',true),
                'research'  => $this->input->post('research',true)
            ];

            $this->db->insert('tb_research_category', $data);
        }

        public function getResearchGroups(){
            return $this->db->order_by('rs_id','DESC')->get('tb_research_category')->result();
        }

        public function getSubResearchGroup($research = null){
            if($research){
                
                return $this->db->get_where('vu_research_group_details'
                ,['research' => $research] )->result();

            }else{
                return $this->db->get('vu_research_group_details')->result();
            }
        }

        public function updateResearchGroup(){
            $data = [
                'research'  => $this->input->post('research',true)
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tb_research_category', $data);
        }


        public function deleteResearchGroup($id){
            $this->db->where('id', $id);
            $this->db->delete('tb_research_category');
        }

   
    //Classes
        public function getAmountClasses(){
            $this->db->get('tb_class');
            return $this->db->affected_rows();
        }

        public function getClasses(){
            return $this->db->get('tb_class')->result();
        }

        public function createClass(){
            $data = [
                'cl_id'     => $this->input->post('cl_id'),
                'cl_major'  => $this->input->post('major'),
                'cl_level'  => $this->input->post('level'),
                'cl_name'   => $this->input->post('name')
            ];
            $this->db->insert('tb_class',$data);
        }

        public function updateClass(){
            $data = [
                'cl_major'  => $this->input->post('major'),
                'cl_level'  => $this->input->post('level'),
                'cl_name'   => $this->input->post('name')
            ];
            $this->db->where('cl_id', $this->input->post('id'));
            $this->db->update('tb_class', $data);
        }

        public function deleteClass($id){
            $this->db->where('id', $id);
            $this->db->delete('tb_class');
        }

    //Lecturers
        // Status
            public function getLecturerStatus($code = null){
                if($code){
                    return $this->db->get('vu_lecturer_status', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_lecturer_status')->result();
                }
            }

        // Field
            public function getLecturerField($code = null){
                if($code){
                    return $this->db->get('vu_lecturer_field', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_lecturer_field')->result();
                }
            }

        // Position
            public function getLecturerPosition($code = null){
                if($code){
                    return $this->db->get('vu_position_2019', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_position_2019')->result();
                }
            }

        // Research
            public function getLecturerResearch($code = null){
                if($code){
                    return $this->db->get('vu_research', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_research')->result();
                }
            }
        
        // DPA
            public function getLecturerDPA($code = null){
                if($code){
                    return $this->db->get('vu_dpa', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_dpa')->result();
                }
            }

        //Hour Distribution
            public function getHourDistribution($code = null){
                if($code){
                    return $this->db->get('vu_hour_distribution', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_hour_distribution')->result();
                }
            }

        public function getAmountLecturers(){
            $this->db->get('tb_lecturer');
            return $this->db->affected_rows();
        }
        
        public function createLecturer(){
            $data = [
                'NIP'       => $this->input->post('NIP'),
                'NIDN'      => $this->input->post('NIDN'),
                'code'      => $this->input->post('code'),
                'name'      => $this->input->post('name'),
                'status'    => $this->input->post('status'),
                'field_of_study'    => $this->input->post('field_of_study'),
                'phone_num' => $this->input->post('phone_num')  
            ];

            $this->db->insert('tb_lecturer', $data);
        }

        public function updateLecturer($code){
            $data = [
                'NIP'       => $this->input->post('NIP'),
                'NIDN'      => $this->input->post('NIDN'),
                'name'      => $this->input->post('name'),
                'status'    => $this->input->post('status'),
                'field_of_study'    => $this->input->post('field_of_study'),
                'phone_num' => $this->input->post('phone_num')  
            ];
            $this->db->where('code', $this->input->post('code'));
            $this->db->update('tb_lecturer', $data);
        }

        public function deleteLecturer(){
            $this->db->where('code',$this->input->post('code'));
            $this->db->delete('tb_lecturer');
        }


   //Subjects
        public function getAmountSubjectsByMajor($major){
            $this->db->get_where('tb_subjects',['major' => $major]);
            return $this->db->affected_rows();
        }

        public function getSubjects(){
            return $this->db->get('tb_subjects')->result();
        }

        public function createSubject(){
            $data = [
                'subject_code'  => $this->input->post('subject_code'),
                'subject'       => $this->input->post('subject'),
                'credit_hour'   => $this->input->post('credit_hour'),
                'T/P'           => $this->input->post('T/P'),
                'semester'      => $this->input->post('semester'),
                'level'         => $this->input->post('level'),
                'major'         => $this->input->post('major'),
                'year'          => $this->input->post('year')
            ];

            $this->db->insert('tb_subjects', $data);
            
        }

        public function updateSubject(){
            $data = [
                'subject'       => $this->input->post('subject'),
                'credit_hour'   => $this->input->post('credit_hour'),
                'T/P'           => $this->input->post('T/P'),
                'semester'      => $this->input->post('semester'),
                'level'         => $this->input->post('level'),
                'major'         => $this->input->post('major'),
                'year'          => $this->input->post('year')
            ];

            $this->db->where('subject_code', $this->input->post('subject_code'));
            $this->db->update('tb_subjects', $data);
        }

        public function deleteSubject($subj_code){
           $this->db->where('subject_code', $subj_code);
           $this->db->delete('tb_subjects');
        }

}

/* End of file admin.php */


?>