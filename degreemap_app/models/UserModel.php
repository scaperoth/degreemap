<?php

class UserModel extends CI_Model {

    const TABLE_NAME = "users";

    /**
     * 
     * @param array $fields
     * @param type $table_name
     * @return boolean
     */
    function insert($fields = array(), $table_name = self::TABLE_NAME) {
        $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);

        $query = $this->db->insert($table_name, $fields);
        if ($query)
            $result = TRUE;
        else
            $result = FALSE;

        return $result;
    }

    /**
     * 
     * @param type $fields field(s) to update
     * @param type $table_name
     * @return boolean success or failure
     */
    public function update($fields = array(), $table_name = self::TABLE_NAME) {
        $data = array(
            $fields['field'] => $fields['value']
        );
        $where = array(
            'semester' => $fields['semester']
            , 'position' => $fields['position']
            , 'username' => $fields['username']
        );
        $this->db->where($where);
        $query = $this->db->update($table_name, $data);

        if ($query)
            $result = TRUE;
        else
            $result = FALSE;

        return $result;
    }

    /**
     * 
     * @param type $username
     * @param type $password
     * @return boolean
     */
    function authenticate($username, $password) {
        $this->db->select('username, password, fname, lname');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if (password_verify($password, $row->password)) {
                return $query->result();
            } else {
                return FALSE;
            }
        }
    }

    /**
     * 
     * @param type $username
     * @return boolean
     */
    function is_unique($username) {
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
