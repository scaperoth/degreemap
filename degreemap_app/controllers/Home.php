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

        $data['min_semesters'] = CourseModel::MIN_SEMESTERS;
        $data['min_position'] = CourseModel::MIN_POSITION;
        $data['max_courses'] = $this->CourseModel->get_max_courses();
        $data['total_credits'] = $this->CourseModel->get_total_credits();
        $data['max_semesters'] = $this->CourseModel->get_max_semesters();


        $data['content'] = $this->load->view('home/index', $data, true);
        $this->load->view('templates/full_layout', $data);
    }

}
