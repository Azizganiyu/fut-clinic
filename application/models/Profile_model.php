<?php 

class Profile_model extends CI_Model
{
    /**
     * Class constructor
     * 
     * on class call, automatically load the database
    */   
    public function __construct()
    {
        $this->load->database();
    }

    public function get_records($id){
        
        $this->db->where('student_id', $id);
        $query = $this->db->get('medical_form');
        $data = $query->row_array();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function get_entries($id){
        $this->db->where('student_id', $id);
        $query = $this->db->get('treatment');
        $data = $query->result_array();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function store_entry($id, $data)
    {
        $save = array(
            'student_id' => $id,
            'diagnosis' => $data['diagnosis'],
            'treatment' => $data['treatment'],
            'doctor' => $data['doctor'],
        );

        $store = $this->db->insert('treatment', $save);

       if($store)
       {
           return true;
       }
       else
       {
           return false;
       }
    }

    public function destroy_treat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('treatment');
    }

    public function update_records($id, $data)
    {
        $save = array(
            'marital_status' => $data['marital_status'],
            'blood_group' => $data['blood_group'],
            'nationality' => $data['nationality'],
            'lga' => $data['lga'],
            'dob' => $data['dob'],
            'soo' => $data['soo'],
            'sex' => $data['sex'],
            'measles' => isset($data['measles'])? '1' : '0',
            'tuberculosis' => isset($data['tuberculosis'])? '1' : '0',
            'sickle_cell' => isset($data['sickle_cell'])? '1' : '0',
            'chicken_pox' => isset($data['chicken_pox'])? '1' : '0',
            'epilepsy' => isset($data['epilepsy'])? '1' : '0',
            'hypertension' => isset($data['hypertension'])? '1' : '0',
            'meningitis' => isset($data['meningitis'])? '1' : '0',
            'asthma' => isset($data['asthma'])? '1' : '0',
            'polio' => isset($data['polio'])? '1' : '0',
            'whooping_cough' => isset($data['whooping_cough'])? '1' : '0',
            'tonsilitis' => isset($data['tonsilitis'])? '1' : '0',
            'typhoid' => isset($data['typhoid'])? '1' : '0',
            'smoking' => isset($data['smoking'])? '1' : '0',
            'drinking' => isset($data['drinking'])? '1' : '0',
            'drugs' => isset($data['drugs'])? '1' : '0',
            'diabetes' => isset($data['diabetes'])? '1' : '0',
            'mental_illness' => isset($data['mental_illness'])? '1' : '0',
            'sickle_cell_fam' => isset($data['sickle_cell_fam'])? '1' : '0',
            'epilepsy_fam' => isset($data['epilepsy_fam'])? '1' : '0',
            'hypertension_fam' => isset($data['hypertension_fam'])? '1' : '0',
            'asthma_fam' => isset($data['asthma_fam'])? '1' : '0',
            'sharing_needles' => isset($data['sharing_needles'])? '1' : '0',
            'sharing_manicure_pedicure' => isset($data['sharing_manicure_pedicure'])? '1' : '0',
            'oral_sex' => isset($data['oral_sex'])? '1' : '0',
            'anal_sex' => isset($data['anal_sex'])? '1' : '0',
        );

        $this->db->where('student_id', $id);
        $update = $this->db->update('medical_form', $save);

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;   
        }
    }
    
}