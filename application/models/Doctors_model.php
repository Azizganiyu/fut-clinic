<?php 

class Doctors_model extends CI_Model
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
            'name' => $data['name'],
            'speciality' => $data['speciality'],
            'image' => $data['image']
       );

       $store = $this->db->insert('doctors', $save);

       if($store)
       {
           return true;
       }
       else
       {
           return false;
       }
    }

    public function get_all()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('doctors');
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
        $update = array(
            'name'=>$data['name'],
            'image' => $data['image'],
            'speciality' => $data['speciality']
        );
        $this->db->where('id', $id);
        $update = $this->db->update('doctors', $update);

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;   
        }
    }


    public function destroy($id, $name)
    {
        $this->db->where('id', $id);
        $this->db->delete('doctors');

    }

}