<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('get_advisor_students'))
{

    function get_advisor_students()
    {
        $CI = & get_instance();
        $CI->db->select('username, fname, lname');
        $CI->db->from(UserModel::TABLE_NAME);
        $CI->db->where('advisor_id', $CI->session->userdata('username'));
        $CI->db->order_by('lname');

        $query = $CI->db->get();
        if ($query === FALSE || !$query->first_row())
            return FALSE;
        else
        {
            foreach ($query->result() as $row)
            {
                $return[] = array(
                    'username' => $row->username,
                    'fname' => $row->fname,
                    'lname' => $row->lname,
                );
            }
            return json_encode($return);
        }
    }

}
