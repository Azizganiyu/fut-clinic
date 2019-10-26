<?php 

/**
 * User Model Class
 * 
 * This class manages all user data
 * 
 */
class Users_model extends CI_Model
{
    /**
     * Class constructor
     *
     * Loads the database
     * 
     */
    public function __construct()
    {
        $this->load->database();
    }

    //---------------------------------------------------------------------------

    /**
     * Method to verify or validate user before login
     * 
     * returns user data if user verified  or a boolean value of false
     * 
     */
    public function validate_user($data)
    {
        $sql = "select * from students WHERE student_id = ?";
        $query = $this->db->query($sql, array($data['id']));
        $result = $query->row_array();

        //if user exist verify password
        if(isset($result))
        {
            //verify password against user password input
            //if(password_verify($data['password'], $result['password']))
            if($data['password'] == $result['password'])
            {
                return $result;
            }
            else
            {
                return False;
            }

        }
        else
        {
            return False;
        }
    }

    //----------------------------------------------------------------------------------------

    
    /**
     * Method to get a user information
     * 
     * @param int $id user ID
     * 
     * returns user data on success or a boolean value of false
     * 
     */
    public function get_user_data($id)
    {
        $sql = "select * from students WHERE id = ?";
        $query = $this->db->query($sql, array($id));
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

    //---------------------------------------------------------------------------------------------


}