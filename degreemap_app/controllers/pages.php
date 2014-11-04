<?php

/**
 * 
 */
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('course_model');
    }

    /**
     * 
     */
    public function index() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            //on form submit...
            //print_r($_POST);
        }

        $data['title'] = 'DegreeMap';
        $data['student_fname'] = 'Matt';
        $data['student_lname'] = 'Scaperoth';
        $data['max_courses'] = $this->course_model->get_max_courses();

        $data['total_credits'] = $this->course_model->get_total_credits();

        $data['max_semesters'] = $this->course_model->get_max_semesters();

        $data['content'] = $this->load->view('pages/index', $data, true);
        $this->load->view('templates/layout', $data);
    }

}
