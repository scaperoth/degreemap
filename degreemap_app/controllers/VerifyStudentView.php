<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyStudentView extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('usermodel', '', TRUE);
    }

    /**
     * 
     */
    function index()
    {
//This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('student_select', 'Student Select', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = $this->load->view('user/index', NULL, true);
            $this->load->view('templates/full_layout', $data);
        } else
        {
            $this->set_student();
//Go to private area

            set_flash('Student View Updated.', 'success');
            redirect('home');
        }
    }

    function set_student()
    {
        $user = $this->input->post('student_select');
        
        $this->session->set_userdata('student_view', $user);
        
        if ($user === 'none')
        {
            $me = $this->session->userdata('username');
            $this->session->set_userdata('student_view', $me);
        }
        return TRUE;
    }

}

?>