<?php

class UserModel extends CI_Model
{

    const TABLE_NAME = "users";

    /**
     * 
     * @param type $username
     * @param type $password
     * @return boolean
     */
    function authenticate($username, $password)
    {
        $this->db->select('user_id, username, password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1)
        {
            return $query->result();
        } else
        {
            return false;
        }
    }

    /**
     * 
     * @param array $fields
     * @param type $table_name
     * @return boolean
     */
    function insert($fields = array(), $table_name = self::TABLE_NAME)
    {
        $fields['password'] = md5($fields['password']);

        $query = $this->db->insert($table_name, $fields);
        if ($query)
            $result = TRUE;
        else
            $result = FALSE;

        return $result;
    }

    /**
     * 
     * @param type $username
     * @return boolean
     */
    function is_unique($username)
    {
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1)
        {
            return FALSE;
        } else
        {
            return TRUE;
        }
    }

}
