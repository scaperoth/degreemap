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
                $CI->session->set_userdata('full_name', $row->fname . ' ' . $row->lname);
                $CI->session->set_userdata('is_advisor', $row->is_advisor);
                $CI->session->set_userdata('is_admin', $row->is_admin);
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
        $CI->session->sess_destroy();
        redirect('user/login');
    }

}


if (!function_exists('is_advisor'))
{

    /**
     * 
     * @return type
     */
    function is_advisor()
    {
        $CI = & get_instance();
        return $CI->session->userdata('is_advisor');
    }

}


if (!function_exists('is_admin'))
{

    /**
     * 
     * @return type
     */
    function is_admin()
    {
        $CI = & get_instance();
        return $CI->session->userdata('is_admin');
    }

}

if (!function_exists('is_alpha'))
{

    /**
     * 
     * @param type $name_value
     * @return type
     */
    function is_alpha($name_value)
    {
        return ctype_alpha($name_value);
    }

}
