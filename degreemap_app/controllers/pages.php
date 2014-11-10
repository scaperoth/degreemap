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
        $model = new Course_model();
        
        $data['title'] = 'DegreeMap';
        $data['student_fname'] = 'Matt';
        $data['student_lname'] = 'Scaperoth';

        $data['min_semesters'] = $model::MIN_SEMESTERS;
        $data['min_position'] = $model::MIN_POSITION;
        $data['max_courses'] = $model::get_max_courses();
        $data['total_credits'] = $model::get_total_credits();
        $data['max_semesters'] = $model::get_max_semesters();

        $data['content'] = $this->load->view('pages/index', $data, true);
        $this->load->view('templates/layout', $data);
        
        return FALSE;
    }
    
    
    /**
     * 
     */
    public function notable() {

        $model = new Course_model();
        
        $data['title'] = 'DegreeMap';
        $data['student_fname'] = 'Matt';
        $data['student_lname'] = 'Scaperoth';

        $data['min_semesters'] = $model::MIN_SEMESTERS;
        $data['min_position'] = $model::MIN_POSITION;
        $data['max_courses'] = $model::get_max_courses();
        $data['total_credits'] = $model::get_total_credits();
        $data['max_semesters'] = $model::get_max_semesters();

        $data['content'] = $this->load->view('pages/notable', $data, true);
        $this->load->view('templates/full_layout', $data);
    }
    
    /**
     * 
     */
    public function animation() {

        $model = new Course_model();
        
        $data['title'] = 'DegreeMap';
        $data['student_fname'] = 'Matt';
        $data['student_lname'] = 'Scaperoth';

        $data['min_semesters'] = $model::MIN_SEMESTERS;
        $data['min_position'] = $model::MIN_POSITION;
        $data['max_courses'] = $model::get_max_courses();
        $data['total_credits'] = $model::get_total_credits();
        $data['max_semesters'] = $model::get_max_semesters();

        $data['content'] = $this->load->view('pages/animation', $data, true);
        $this->load->view('templates/full_layout', $data);
    }
    
    

}
