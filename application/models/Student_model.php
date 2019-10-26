<?php 

class Student_model extends CI_Model
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

    public function store ($data)
    {
    
        $save = array(
            'student_id' => $data['student_id'],
            'matricNumber' => $data['matric_num'],
            'image' => $data['image'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'school' => $data['school'],
            'department' => $data['department'],
            'level' => $data['level'],
        );

       $store = $this->db->insert('students', $save);

       if($store)
       {
            $id = $this->db->insert_id();
            $this->db->insert('medical_form', array('student_id' => $id));
           return true;
       }
       else
       {
           return false;
       }
    }

    public function get_all($order, $search)
    {
        if($order != null)
        {
            $this->db->order_by($order, 'asc');
        }
        else
        {
            $this->db->order_by('id', 'DESC');
        }

        if($search != null)
        {
            $this->db->like('name', $search, 'both');
        }

        $query = $this->db->get('students');
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
        else
        {
            return false;

        }
    }

    public function update($id, $data)
    {
    
        $save = array(
            'image' => $data['image'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'school' => $data['school'],
            'department' => $data['department'],
            'level' => $data['level'],
        );

        $this->db->where('id', $id);
        $update = $this->db->update('students', $save);

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;   
        }
    }



    public function get_student($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('students');
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
    public function get_student_by_id($student_id)
    {
        $this->db->where('student_id', $student_id);
        $query = $this->db->get('students');
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

    public function destroy($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('students');
    }

    
}