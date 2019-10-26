<?php

class Doctors extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
        $this->load->model(array('doctors_model', 'student_model'));
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


    public function view()
    {
        $id = $this->session->id;
        $data['title'] = 'Doctors';
        $data['page'] = 'doctors';
        $data['doctors'] = $this->doctors_model->get_all();
        $data['student'] = $this->student_model->get_student($id);
        $this->load->view('template/header', $data);
        $this->load->view('navbar');
        $this->load->view('doctors');
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'Doctors Name', 'required|trim|htmlspecialchars|is_unique[doctors.name]', array(
            'required' => '%s is not provided!',
            'is_unique' => '%s Already Exist!'
        ));
        $this->form_validation->set_rules('speciality', 'Speciality', 'trim|htmlspecialchars');

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
            $db = $this->doctors_model->store($_POST);
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

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Doctors Name', 'required|trim|htmlspecialchars', array(
            'required' => '%s is not provided!',
        ));
        $this->form_validation->set_rules('speciality', 'Speciality', 'trim|htmlspecialchars');

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
            $db = $this->doctors_model->update($id, $_POST);
            if($db)
            {
                echo "<p class='text-success'>success</p>";
            }
            else
            {
                echo "No changes!";
            }
        }

    }

    public function destroy()
    {
        $this->doctors_model->destroy($this->input->post('id'), $this->input->post('name'));
    }

}