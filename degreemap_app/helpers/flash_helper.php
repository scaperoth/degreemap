<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('get_flash'))
{

    /**
     * 
     */
    function get_flash()
    {
        $CI = & get_instance();
        if ($CI->session->userdata('flash'))
        {
            $flash['message'] = strip_tags($CI->session->userdata('flash'));
            $flash['class'] = $CI->session->userdata('flash_type') . " flash";
            $CI->session->unset_userdata('flash');
            $CI->session->unset_userdata('flash_type');
            echo "<small class=\"{$flash['class']} label\"><p>{$flash['message']}</p></small>";
        } else
        {
            echo "";
        }
    }

}

if (!function_exists('set_flash'))
{

    /**
     * 
     * @param type $message message to print out
     * @param type $type alert, success, warning, etc.
     */
    function set_flash($message, $type)
    {
        $CI = & get_instance();
        $CI->session->set_userdata('flash', $message);
        $CI->session->set_userdata('flash_type', $type);
    }

}