<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('sign_in'))
{

    /**
     * 
     * @param type $username
     * @param type $password
     * @return boolean
     */
    function sign_in($username, $password)
    {
        $CI = & get_instance();

        //query the database
        $result = $CI->UserModel->authenticate($username, $password);

        if ($result)
        {
            foreach ($result as $row)
            {
                $CI->session->set_userdata('logged_in', TRUE);
                $CI->session->set_userdata('username', $row->username);
                $CI->session->set_userdata('fname', $row->fname);
                $CI->session->set_userdata('lname', $row->lname);
                $CI->session->set_userdata('full_name', $row->fname.' '.$row->lname);
            }
            return TRUE;
        } else
        {
            $CI->form_validation->set_message('check_database', 'Invalid username or password');
            return FALSE;
        }
    }

}

if (!function_exists('sign_out'))
{

    /**
     * 
     */
    function sign_out()
    {
        $CI = & get_instance();
        $CI->session->unset_userdata('logged_in');
        session_destroy();
    }

}
