<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
        $this->load->model(array('doctors_model', 'student_model', 'appointment_model'));
        if($this->session->loggedIn != true || $this->session->role != 'admin')
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
       
        $search_doc = isset($_POST['search_doc'])? $_POST['search_doc'] :  null;
        $search_stu = isset($_POST['search_stu'])? $_POST['search_stu'] :  null;

        if($search_stu != null)
        {
            $student = $this->student_model->get_student_by_id($search_stu);
            if($student != false)
            {
                $search_stu_id = $student['id'];
            }
            else
            {
                $search_stu_id = null;
            }
        }
        else
        {
            $search_stu_id = null;
        }   

        $data['title'] = 'Dashboard';
        $data['page'] = 'dashboard';
        $data['appointments'] = $this->appointment_model->get_appointments($search_doc, $search_stu_id);
        $this->load->view('template/header', $data);
        $this->load->view('navbar');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
}