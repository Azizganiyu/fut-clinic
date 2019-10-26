<?php

class Appointments extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('users_model','appointment_model', 'student_model', 'doctors_model'));
        if($this->session->loggedIn != true || $this->session->role == 'admin')
        {
            $current_url = current_url();
            header('location:'.base_url.'/index.php/user/login?redirect='.$current_url);
        }
    }

    public function index()
    {
        $this->view();
    }

    public function view()
    {
        $id = $this->session->id;
        $data['bookings'] = $this->appointment_model->get_bookings($id);
        $data['doctors'] = $this->doctors_model->get_all();
        $data['student'] = $this->users_model->get_user_data($id);
        $data['title'] = 'Appointments';
        $data['page'] = 'appointments';
        $this->load->view('template/header', $data);
        $this->load->view('navbar');
        $this->load->view('appointment');
        $this->load->view('template/footer');
    }

    public function create($id)
    {
        
        $this->form_validation->set_rules('detail', 'Detail', 'trim|htmlspecialchars');

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
            $db = $this->appointment_model->store($id, $_POST);
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
    public function getAppointments()
    {
        $db = $this->appointment_model->get_all();
        //$array = array();
        if($db)
        { 
            echo json_encode($db);
        }
        else
        {
            echo 'no data';
        }
    }
    public function destroy()
    {
        $this->appointment_model->destroy($this->input->post('id'));
    }
    
    public function cancel()
    {
        $this->appointment_model->cancel($this->input->post('id'));
    }
}