<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller
{

    /**
     * 
     */
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

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE)
        {
            //use flash helper to set flash message values
            set_flash(validation_errors(), "alert");
            
            //Field validation failed.  User redirected to login page
            redirect('user/login');
        } else
        {
            //Go to private area
            redirect('home', 'refresh');
        }
    }

    /**
     * 
     * @param type $password
     * @return boolean
     */
    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //use the auth_helper function
        if (sign_in($username, $password))
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }

}

?>