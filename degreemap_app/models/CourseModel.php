<?php

class CourseModel extends CI_Model
{

    //grid constants. they are initialized at 1
    const MIN_SEMESTERS = 1;
    const MIN_POSITION = 1;
    //default constants in case there is no table data
    const MAX_COURSES_DEFAULT = 5;
    const MAX_SEMESTERS_DEFAULT = 8;
    const TABLE_NAME = "courses";

    /**
     * 
     * @param type $table_name
     * @param type $fields
     */
    public function insert($fields = array('' => ''), $table_name = self::TABLE_NAME)
    {
        $query = $this->db->insert($table_name, $fields);
        echo $this->db->last_query();
        die();
        if ($query)
            $result = TRUE;
        else
            $result = FALSE;

        return $result;
    }

    /**
     * 
     * @param type $table_name
     * @param type $fields
     */
    public function update($fields = array(), $table_name = self::TABLE_NAME)
    {
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
     * forms string of DELETE FROM $table_name WHERE 'key'= 'value'  
     * @param string $table_name name of table to delete from 
     * @param array $fields array of field=>value
     * @return boolean of success
     */
    public function delete($fields = array('' => ''), $table_name = self::TABLE_NAME)
    {
        $query = $this->db->delete($table_name, $fields);

        if ($query)
            $result = TRUE;
        else
            $result = FALSE;

        return $result;
    }

    /**
     * returns the courses for all or any given semester or combination of semester and position.
     * 
     * @param int $semester (optional) integer representation of 1 (unelss set to be 0 based) to max semesters
     * @param int $position (optional) integer representation of 1 (unelss set to be 0 based) to max # courses per semester
     * @return query result array return all the courses by provided no arguments 
     * @return query object row return a specific semester's worth of courses by providing the semester 
     * @return db object of all courses a specific course by providing its semester and grid position.
     */
    public function get_courses($semester = FALSE, $position = FALSE)
    {
        if ($semester === FALSE)
        {
            $this->db->where('username', $this->session->userdata("username"));
            $query = $this->db->get(self::TABLE_NAME);
            return $query->result_array();
        }

        if ($position !== FALSE)
        {
            $this->db->select('title, semester, credits, description, link, labelcolor, labelmessage, position');
            $this->db->from(self::TABLE_NAME);
            $this->db->where('semester', $semester);
            $this->db->where('position', $position);
            $this->db->where('username', $this->session->userdata("username"));

            $result = $this->db->get();

            if ($result === FALSE || !$result->first_row())
                return FALSE;
            else
                return $result->first_row();
        }

        $this->db->where('semester', $semester);
        $this->db->where('username', $this->session->userdata("username"));
        $this->db->order_by("position");
        $query = $this->db->get();
        return $query;
    }

    /**
     * 
     * @return query object of semesters (integers)
     */
    public function get_semesters()
    {
        $this->db->select('semester');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('username', $this->session->userdata("username"));
        $this->db->group_by("semester");
        return $this->db->get();
    }

    /**
     * 
     * @return max number of courses for any semester. May default to constant if table is empty 
     */
    public function get_max_courses()
    {
        $this->db->select('max(position) as max_count');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('username', $this->session->userdata("username"));

        $result = $this->db->get();

        //if ($result === FALSE || $result->first_row()->max_count === NULL)
        return self::MAX_COURSES_DEFAULT;
        //else
        //    return $result->first_row()->max_count;
    }

    /**
     * 
     * @return maximum number of semesters. May default to constant if table is empty
     */
    public function get_max_semesters()
    {
        $this->db->select('max(semester) as max_semester');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('username', $this->session->userdata("username"));
        $result = $this->db->get();

        //if ($result === FALSE || $result->first_row()->max_semester === NULL)
        return self::MAX_SEMESTERS_DEFAULT;
        //else
        //    return $result->first_row()->max_semester;
    }

    /**
     * 
     * @return type
     */
    public function get_total_credits()
    {
        $this->db->select('SUM(credits) as num_credits');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('username', $this->session->userdata("username"));
        $this->db->limit(1);

        $result = $this->db->get();

        if ($result->num_rows() !== 1)
            return 0;
        else
            return $result->first_row()->num_credits;
    }

    /**
     * 
     */
    public function put_test()
    {
        $t = $this->get_array();
        foreach ($t as $k => $v)
        {
            $query = "INSERT INTO `courses` (`title`," .
                    '`' . implode("`,`", array_keys($v)) . '`' .
                    ") VALUES ('$k'," .
                    "'" . implode("','", $v) . "'" .
                    ")";
            $query_exec = $this->db->query($query);
        }
    }

    public function get_array()
    {
        $degreedata = array(
            "H/SS 1" => array(
                "semester" => 1,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Ital 1",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 1111" => array(
                "semester" => 1,
                "credits" => 3,
                "description" => "(3) Intro to Software Development (in Java)
			Co(CSci 1010)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer Java 1",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 1010" => array(
                "semester" => 1,
                "credits" => 2,
                "description" => "Computer Science Orientation (Entering SEAS freshmen also take SEAS 1001 (1))",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "Waive or Research",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "Math Reqt 1" => array(
                "semester" => 1,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "MATH 1220/1221",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "UW 1020" => array(
                "semester" => 1,
                "credits" => 4,
                "description" => "University Writing",
                "link" => "http://bulletin.gwu.edu/arts-sciences/university-writing/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "UW 1020",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
            "H/SS 2" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "success",
                "labelmessage" => "Xfer Econ",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 1112" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "Algorithms and Data Structures (in Java) P(CSci 1111 with a grade of C or better, Math 1220/1231)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "Waive or Research",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 1311" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "Discrete Structures I P(Math 1220/1231)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "Math Reqt 2" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "MATH 1232",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "Science Reqt 1" => array(
                "semester" => 2,
                "credits" => 4,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Xfer Bio",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
            "H/SS 3" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "success",
                "labelmessage" => "Xfer SOC 1001",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 2113" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "Software Engineering I (Java+C) P(CSci 1112 with a grade of C or better)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 2312" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "Discrete Structures II",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "In Progress",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 2461" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "Computer Architecture I P(CSci 1112 with a grade of C or better, CSci 1311)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "Science Reqt 2" => array(
                "semester" => 3,
                "credits" => 4,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "PHYS I",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
            "CS Elective *" => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "alert",
                "labelmessage" => "Need 3000+ CS crse",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 2441W" => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "Database Systems and Team Projects Co(CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 3410" => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "Systems Programming P(CSci 2461, 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "Stat Reqt " => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "STAT 1053",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "Science Reqt 3" => array(
                "semester" => 4,
                "credits" => 4,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "alert",
                "labelmessage" => "SUM2015: PHYS 2",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
            "H/SS 4" => array(
                "semester" => 5,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Xfer PHIL 1051",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 3212" => array(
                "semester" => 5,
                "credits" => 4,
                "description" => "Algorithms P(CSci 1311, CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 3313" => array(
                "semester" => 5,
                "credits" => 4,
                "description" => "Foundations of Computing P(CSci 2461, CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 3411" => array(
                "semester" => 5,
                "credits" => 4,
                "description" => "Operating Systems P(CSci 2461, CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "H/SS 5" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "warning",
                "labelmessage" => "SUM2015: PHIL 1062",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "Unrestricted Elective 1" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Xfer Comm 1040",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CS Track Reqt 1" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
                "labelcolor" => "warning",
                "labelmessage" => "SUM2015: ADV OS",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "Non-tech Track Elective 1" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
                "labelcolor" => "alert",
                "labelmessage" => "? ",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "Unrestricted Elective 2" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success ",
                "labelmessage" => "Continuous Algo",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
            "H/SS 6" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "alert",
                "labelmessage" => "SUM2015: SOC 1003",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 4243" => array(
                "semester" => 7,
                "credits" => 4,
                "description" => "Capstone Senior Design Project I P(CSci 3240)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "SP2015",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CS Track Reqt 2" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
                "labelcolor" => "alert",
                "labelmessage" => "FA2015",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "Non-tech Track Elective 2" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
                "labelcolor" => "alert",
                "labelmessage" => "? ",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "Unrestricted Elective 3" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer: 1099->1103 MUS",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
            "Unrestricted Elective 4" => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer: 1099->1002 REL",
                "position" => 1,
                "username" => $this->session->userdata('username'),
            ),
            "CSci 4244" => array(
                "semester" => 8,
                "credits" => 4,
                "description" => "Capstone Senior Design Project II P(CSci 4243)",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "SP2015",
                "position" => 2,
                "username" => $this->session->userdata('username'),
            ),
            "CS Track Reqt 3" => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
                "labelcolor" => "alert",
                "labelmessage" => "FA2015",
                "position" => 3,
                "username" => $this->session->userdata('username'),
            ),
            "Non-tech Track Elective 3 " => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
                "labelcolor" => "alert",
                "labelmessage" => "? ",
                "position" => 4,
                "username" => $this->session->userdata('username'),
            ),
            "Unrestricted Elective 5" => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer: 1099->3142 MKTG",
                "position" => 5,
                "username" => $this->session->userdata('username'),
            ),
        );

        return $degreedata;
    }

}
