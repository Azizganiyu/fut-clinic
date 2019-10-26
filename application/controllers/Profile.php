<?php

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('users_model','profile_model', 'student_model', 'doctors_model'));
        if($this->session->loggedIn != true)
        {
            $current_url = current_url();
            header('location:'.base_url.'/index.php/user/login?redirect='.$current_url);
        }
    }

    public function index()
    {
        $this->view();
    }

    public function view($id = null)
    {

        if($id == null)
        {
            if($_SESSION['role'] == 'student')
            {
                $id = $_SESSION['id'];
            }
            else
            {
                die('Student not found');
            }
        }
        $data['student'] = $this->student_model->get_student($id);
        $data['records'] = $this->profile_model->get_records($id);
        $data['entries'] = $this->profile_model->get_entries($id);
        $data['doctors'] = $this->doctors_model->get_all();


        if($_SESSION['id'] == $id){
            $data['title'] = 'My profile';
        }
        else
        {
            $data['title'] = $data['student']['student_id'].' Profile';
        }
        $data['page'] = 'profile';
        $this->load->view('template/header', $data);
        $this->load->view('navbar');
        $this->load->view('profile');
        $this->load->view('template/footer');
    }

    public function create_entry($id)
    {

        $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required|trim|htmlspecialchars');
        $this->form_validation->set_rules('treatment', 'Treatment', 'required|trim|htmlspecialchars');
        $this->form_validation->set_rules('doctor', 'Doctor', 'required|trim|htmlspecialchars');

        if($this->form_validation->run() == FALSE)
        {
            //set form info to display error message only if the submit button was clicked
            echo "<p class='text-danger'>";
            echo "An error occured <br/>";
            echo validation_errors();
            echo "</p>";


        }

        else
        {
            $db = $this->profile_model->store_entry($id, $_POST);
            if($db)
            {
                echo "<p class='text-success'>success</p>";
            }
            else
            {
                echo "a problem occured!";
            }
        }
    }

    public function edit()
    {
        $id = $this->session->id;

            if(isset($_POST['submit']))
            {
                $update = $this->profile_model->update_records($id, $_POST);
                if($update)
                {
                    $data['updateInfo'] = "<p class='text-success'>Successfully Updated!</p>";
                }
                else
                {
                    $data['updateInfo'] =  "<p class='text-success'>You have made no change!</p>";
                }
            }

            $data['student'] = $this->users_model->get_user_data($id);
            $data['records'] = $this->profile_model->get_records($id);

            $data['title'] = 'Edit Medical Data: '. $data['student']['student_id'];
            $data['page'] = 'edit_medical_data';
            $this->load->view('template/header', $data);
            $this->load->view('navbar');
            $this->load->view('profile_edit');
            $this->load->view('template/footer');

    }

    public function validate_change_product_name($product_name, $id)
    {
        //verify no other product is using the name
        $verify_product_name_change = $this->product_model->validate_change_product_name($product_name, $id);

        //if the name exist somewhere else, set error message for form_validation and return false
        if($verify_product_name_change == false)
        {
            $this->form_validation->set_message('validate_change_product_name', 'Product name already exists');
            return false;
        }
        else
        {
            return true;
        }
    }

    public function destroy_treat()
    {
        $this->profile_model->destroy_treat($this->input->post('id'));
    }

}