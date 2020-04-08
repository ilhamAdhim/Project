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

        public function createResearchGroups($data = null){
            $this->db->insert('tb_research_category', $data);
        }

        public function getResearchGroups(){
            return $this->db->order_by('rs_id','DESC')->get('tb_research_category')->result();
        }

        public function getSubResearchGroup($research = null){
            if($research){
                return $this->db->get_where('vu_research_group_details',['research' => $research] )->result();
            }else{
                return $this->db->get('vu_research_group_details')->result();
            }
        }

        public function updateResearchGroup($data){

            $this->db->where('rs_id',$data['rs_id'] );
            $this->db->update('tb_research_category', $data);
        }


        public function deleteResearchGroup($id){
            $this->db->where('rs_id', $id);
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

        public function createClass($data = null){
            $this->db->insert('tb_class', $data);
        }

        public function updateClass($data){
            $this->db->where('cl_id',$data['cl_id']);
            $this->db->update('tb_class', $data);
        }

        public function deleteClass($id){
            $this->db->where('cl_id', $id);
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

            public function updateLecturerStatus($code,$data){
                $data = [
                    'code' => $this->input->post('code'),
                    'name'  =>$this->input->post('name'),
                    'status'=>$this->input->post('status'),
                    'phone_num' =>$this->input->post('phone_num'),
                ];

                $this->db->where('code', $code);
                $this->db->update('tb_lecturer', $data);
            }

            public function deleteLecturerStatus($code){
                $this->db->where('code', $code);
                $this->db->delete('vu_lecturer_status');
                
            }



        // Status and Fields edit are available on editLecturer()

        // Field
            public function getLecturerField($code = null){
                if($code){
                    return $this->db->get('vu_lecturer_field', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_lecturer_field')->result();
                }
            }

            public function updateLecturerField(){
                $data = [
                    'code' => $this->input->post('code'),
                ];

                $this->db->update('tb_lecturer', $data);
            }

            public function deleteLecturerField(){
                $data = [
                    'code' => $this->input->post('code'),
                ];

                $this->db->delete('tb_lecturer', $data);
            }


        // Position
            public function getLecturerPosition($code = null){
                if($code){
                    return $this->db->get('vu_position_2019', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_position_2019')->result();
                }
            }

            public function updateLecturerPosition($code){
                $data = [
                    'position' => $this->input->post('position')
                ];

                $this->db->where('code', $code);
                $this->db->update('tb_position', $data);
            }

            public function deleteLecturerPosition($code){
                $data = [
                    'position' => $this->input->post('position')
                ];

                $this->db->where('code', $code);
                $this->db->update('tb_position', $data);
            }

        // Research
            public function getLecturerResearch($code = null){
                if($code){
                    return $this->db->get('vu_research', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_research')->result();
                }
            }
        
            public function updateLecturerReserch($code){

                $rs_id = $this->db->get_where('tb_research_category',
                [
                    'research' => $this->input->post('research'),
                ])->result()->rs_id;
                
                $data = [
                  'rs_id'  => $rs_id,
                  'priority'  => $this->input->post('priority'),
                ];

                $this->db->where('code', $code);
                $this->db->where('rs_id', $rs_id);
                $this->db->update('tb_researcher', $data);
            }
        // DPA
            public function getLecturerDPA($code = null){
                if($code){
                    return $this->db->get('vu_dpa', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_dpa')->result();
                }
            }

            public function updateLecturerDPA($code){
                // Get a string of class name
                // Find the cl_id on the database based on the class name
                $getClassName = $this->input->post('class_name');
                $destructuredCL_ID = [];

                for ($i=0; $i < getClassName.length(); $i++) { 
                    array_push($destructuredCL_ID,$getClassName[i]);
                }

                $classID = $this->db->get_where('tb_class',
                ['cl_major' => $destructuredCL_ID[0],
                 'cl_level' => $destructuredCL_ID[1],
                 'cl_name'  => $destructuredCL_ID[2]
                ])->result();
                
                $data = [
                    'code' => $this->input->post('code'),
                    'year' => $this->input->post('year'),
                    'cl_id_dpa' => $classID,
                    'semester' => $this->input->post('semester'),
                ];

                $this->db->where('code', $code);
                $this->db->update('tb_dpa', $data);
            }

        //Hour Distribution - Not done
            public function getHourDistribution($code = null){
                if($code){
                    return $this->db->get('vu_class_schedule', ['code' => $code])->result();
                }else{
                    return $this->db->get('vu_class_schedule')->result();
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

        public function createSubject($data = null){
            $this->db->insert('tb_subjects', $data);
        }

        public function updateSubject($data){
            $this->db->where('subject_code', $data['subject_code']);
            $this->db->update('tb_subjects', $data);
        }

        public function deleteSubject($subj_code){
           $this->db->where('subject_code', $subj_code);
           $this->db->delete('tb_subjects');
        }

}

/* End of file admin.php */

?>