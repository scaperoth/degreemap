<?php

/*
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
        $data['student_fname'] = 'Matt';
        $data['student_lname'] = 'Scaperoth';
        $data['max_courses'] = $this->course_model->get_max_courses();
        $data['total_credits'] = $this->course_model->get_total_credits();

        $data['semesters'] = $this->course_model->get_semesters();
        $data['title'] = 'DegreeMap';

        $this->load->view('templates/header', $data);
        $this->load->view("pages/index", $data);
        $this->load->view('templates/footer');
    }

}
