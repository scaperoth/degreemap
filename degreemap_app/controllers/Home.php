<?php

/**
 * 
 */
class Home extends MY_Controller
{

    /**
     * 
     */
    public function index()
    {
        $session_data = $this->session->userdata('logged_in');
        
        $data['username'] = $session_data['username'];
        $data['min_semesters'] = CourseModel::MIN_SEMESTERS;
        $data['min_position'] = CourseModel::MIN_POSITION;
        $data['max_courses'] = $this->CourseModel->get_max_courses();
        $data['total_credits'] = $this->CourseModel->get_total_credits();
        $data['max_semesters'] = $this->CourseModel->get_max_semesters();

        $data['content'] = $this->load->view('home/index', $data, true);
        $this->load->view('templates/full_layout', $data);
    }

    /**
     * 
     */
    public function notable()
    {

        $model = new CourseModel();


        $data['min_semesters'] = $model::MIN_SEMESTERS;
        $data['min_position'] = $model::MIN_POSITION;
        $data['max_courses'] = $model::get_max_courses();
        $data['total_credits'] = $model::get_total_credits();
        $data['max_semesters'] = $model::get_max_semesters();

        $data['content'] = $this->load->view('home/notable', $data, true);
        $this->load->view('templates/full_layout', $data);
    }

    /**
     * 
     */
    public function animation()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST))
        {
            //on form submit...
            //print_r($_POST);
        }
        $model = new CourseModel();

        $data['min_semesters'] = $model::MIN_SEMESTERS;
        $data['min_position'] = $model::MIN_POSITION;
        $data['max_courses'] = $model::get_max_courses();
        $data['total_credits'] = $model::get_total_credits();
        $data['max_semesters'] = $model::get_max_semesters();

        $data['content'] = $this->load->view('home/original', $data, true);
        $this->load->view('templates/layout', $data);

        return FALSE;
    }

    /**
     * 
     */
    public function grid()
    {

        $model = new CourseModel();

        $data['student_fname'] = 'Matt';
        $data['student_lname'] = 'Scaperoth';

        $data['min_semesters'] = $model::MIN_SEMESTERS;
        $data['min_position'] = $model::MIN_POSITION;
        $data['max_courses'] = $model::get_max_courses();
        $data['total_credits'] = $model::get_total_credits();
        $data['max_semesters'] = $model::get_max_semesters();

        $data['content'] = $this->load->view('home/grid', $data, true);
        $this->load->view('templates/full_layout', $data);
    }

}
