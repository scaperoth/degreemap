<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifySignUp extends CI_Controller
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

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            //use flash helper to set flash message values
            set_flash(validation_errors(), "alert");
            
            //Field validation failed.  User redirected to login page
            redirect('user/signup');
        } else
        {
            //Go to private area
            redirect('home', 'refresh');
        }
    }

    /**
     * 
     * @return boolean
     */
    function check_database()
    {
        //Field validation succeeded.  Validate against database




        $username = trim($this->input->post('username'));

        //query the database
        $result = $this->UserModel->is_unique($username);

        if (!$result)
        {
            $this->form_validation->set_message('check_database', "Username '$username' is taken");
            return FALSE;
        } else
        {
            $insert_data['username'] = trim($this->input->post('username'));
            $insert_data['password'] = trim($this->input->post('password'));
            $insert_data['fname'] = trim($this->input->post('fname'));
            $insert_data['lname'] = trim($this->input->post('lname'));

            //insert the new values and then authenticate
            if ($this->UserModel->insert($insert_data))
            {
                //use the auth_helper function
                if (sign_in($insert_data['username'], $insert_data['password']))
                {
                    return TRUE;
                } else
                {
                    return FALSE;
                }
            } else
            {
                $this->form_validation->set_message('check_database', "Insert Failed");
                return FALSE;
            }
        }
    }

}

?>