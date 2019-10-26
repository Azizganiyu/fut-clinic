<?php 

class Appointment_model extends CI_Model
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


    public function store ($id, $data)
    {
       $save = array(
            'student_id' => $id,
            'slot_id' => $data['slot_id'],
            'doctor' => $data['doctor'],  
            'time' => $data['time'], 
            'date' => $data['date'], 
            'detail' => $data['detail']
       );

       $store = $this->db->insert('appointment', $save);

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
            $this->db->where('status', 'active');
            $query = $this->db->get('appointment');
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
        public function get_appointments($search_doc, $search_stu_id)
        {
            if($search_doc != null)
            {
                $this->db->like('doctor', $search_doc, 'both');
            }

            if($search_stu_id != null)
            {
                $this->db->where('student_id', $search_stu_id);
            }
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('appointment');
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

    public function get_bookings($id){
        $this->db->where('student_id', $id);
        $query = $this->db->get('appointment');
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


    public function destroy($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('appointment');

    }

    public function cancel($id)
    {
        $this->db->set('status', 'canceled');
        $this->db->where('id', $id);
        $this->db->update('appointment');

    }

}