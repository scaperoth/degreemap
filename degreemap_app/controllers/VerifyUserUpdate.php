<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyUserUpdate extends CI_Controller
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

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_username');
        $this->form_validation->set_rules('fname', 'First', 'trim|required|xss_clean|callback_check_name');
        $this->form_validation->set_rules('lname', 'Last', 'trim|required|xss_clean|callback_check_name');

        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = $this->load->view('user/index', NULL, true);
            $this->load->view('templates/full_layout', $data);
        } else
        {
            $this->update_user();
//Go to private area

            set_flash('User updated.', 'success');
            redirect('user');
        }
    }

    function check_username()
    {
        
        $username = trim($this->input->post('username'));
        //if the new username and the original username are the same...
        if (strcmp(strtolower($this->session->userdata('username')), strtolower($username)) === 0)
        {
            return TRUE;
        }
//query the database
        $result = $this->UserModel->is_unique($username);

        if (!$result)
        {
            $this->form_validation->set_message('check_username', "Username '$username' is taken");
            return FALSE;
        } else
        {
            return TRUE;
        }
    }

    function check_name($name)
    {
        $this->form_validation->set_message('check_name', "Invalid characters in $name");
        return is_alpha($name);
    }

    /**
     * 
     * @return boolean
     */
    function update_user()
    {
        $insert_data['username'] = trim($this->input->post('username'));
        $insert_data['fname'] = trim($this->input->post('fname'));
        $insert_data['lname'] = trim($this->input->post('lname'));
        $original_username = $this->session->userdata('username');


//insert the new values and then authenticate
        if ($this->UserModel->update($insert_data, $original_username))
        {
//use the auth_helper function
            $this->session->set_userdata('username', $insert_data['username']);
            $this->session->set_userdata('fname', $insert_data['fname']);
            $this->session->set_userdata('lname', $insert_data['lname']);
        } else
        {
            $this->form_validation->set_message('update_user', "Update Failed");
            return FALSE;
        }
    }

}

?>