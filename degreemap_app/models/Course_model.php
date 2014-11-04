<?php

class Course_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    }

    /**
     * 
     * @param type $title
     * @return type
     */
    public function get_courses($semester = FALSE, $position = FALSE) {
        if ($semester === FALSE) {
            $query = $this->db->get('courses');
            return $query->result_array();
        }

        if ($position !== FALSE) {
            $query = "SELECT title, semester, credits, description, link, labelcolor, labelmessage, position "
                    . "FROM courses"
                    . "WHERE semester = ? AND position = ?;";
            $result = $this->db->query($query, array($semester, $position));
            if (is_object($result))
                return $result;
            else
                return FALSE;
        }

        $this->db->order_by("position");
        $query = $this->db->get_where('courses', array('semester' => $semester));
        return $query;
    }

    /**
     * 
     * @return type
     */
    public function get_semesters() {
        $query = "select semester from courses group by semester";
        return $this->db->query($query);
    }

    /**
     * 
     * @return type
     */
    public function get_max_courses() {
        $query = <<< QUERY
        select max(position) as max_count from courses;
QUERY;
        $result = $this->db->query($query);

        if ($result->first_row()) {
            return $result->first_row()->max_count;
        } else
            return 0;
    }

    /**
     * 
     * @return type
     */
    public function get_total_credits() {
        $result = $this->db->query("SELECT SUM(credits) as num_credits from courses;");
        if ($result->first_row())
            return $result->first_row()->num_credits;
        else
            return 0;
    }

    /**
     * 
     */
    public function putTest() {
        $t = $this->get_array();
        foreach ($t as $k => $v) {
            $query = "INSERT INTO `courses` (`title`," .
                    '`' . implode("`,`", array_keys($v)) . '`' .
                    ") VALUES ('$k'," .
                    "'" . implode("','", $v) . "'" .
                    ")";
            $query_exec = $this->db->query($query);
        }
    }

    public function get_array() {
        $degreedata = array(
            "H/SS 1" => array(
                "semester" => 1,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Ital 1",
                "position" => 1,
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
            ),
            "CSci 1010" => array(
                "semester" => 1,
                "credits" => 2,
                "description" => "Computer Science Orientation (Entering SEAS freshmen also take SEAS 1001 (1))",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "Waive or Research",
                "position" => 3,
            ),
            "Math Reqt 1" => array(
                "semester" => 1,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "MATH 1220/1221",
                "position" => 4,
            ),
            "UW 1020" => array(
                "semester" => 1,
                "credits" => 4,
                "description" => "University Writing",
                "link" => "http://bulletin.gwu.edu/arts-sciences/university-writing/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "UW 1020",
                "position" => 5,
            ),
            "H/SS 2" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "success",
                "labelmessage" => "Xfer Econ",
                "position" => 1,
            ),
            "CSci 1112" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "Algorithms and Data Structures (in Java) P(CSci 1111 with a grade of C or better, Math 1220/1231)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "Waive or Research",
                "position" => 2,
            ),
            "CSci 1311" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "Discrete Structures I P(Math 1220/1231)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 3,
            ),
            "Math Reqt 2" => array(
                "semester" => 2,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "MATH 1232",
                "position" => 4,
            ),
            "Science Reqt 1" => array(
                "semester" => 2,
                "credits" => 4,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Xfer Bio",
                "position" => 5,
            ),
            "H/SS 3" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "success",
                "labelmessage" => "Xfer SOC 1001",
                "position" => 1,
            ),
            "CSci 2113" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "Software Engineering I (Java+C) P(CSci 1112 with a grade of C or better)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 2,
            ),
            "CSci 2312" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "Discrete Structures II",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "In Progress",
                "position" => 3,
            ),
            "CSci 2461" => array(
                "semester" => 3,
                "credits" => 3,
                "description" => "Computer Architecture I P(CSci 1112 with a grade of C or better, CSci 1311)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 4,
            ),
            "Science Reqt 2" => array(
                "semester" => 3,
                "credits" => 4,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "PHYS I",
                "position" => 5,
            ),
            "CS Elective *" => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "alert",
                "labelmessage" => "Need 3000+ CS crse",
                "position" => 1,
            ),
            "CSci 2441W" => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "Database Systems and Team Projects Co(CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 2,
            ),
            "CSci 3410" => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "Systems Programming P(CSci 2461, 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 3,
            ),
            "Stat Reqt " => array(
                "semester" => 4,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "STAT 1053",
                "position" => 4,
            ),
            "Science Reqt 3" => array(
                "semester" => 4,
                "credits" => 4,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "alert",
                "labelmessage" => "SUM2015: PHYS 2",
                "position" => 5,
            ),
            "H/SS 4" => array(
                "semester" => 5,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Xfer PHIL 1051",
                "position" => 1,
            ),
            "CSci 3212" => array(
                "semester" => 5,
                "credits" => 4,
                "description" => "Algorithms P(CSci 1311, CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 2,
            ),
            "CSci 3313" => array(
                "semester" => 5,
                "credits" => 4,
                "description" => "Foundations of Computing P(CSci 2461, CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 3,
            ),
            "CSci 3411" => array(
                "semester" => 5,
                "credits" => 4,
                "description" => "Operating Systems P(CSci 2461, CSci 2113)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "success",
                "labelmessage" => "Complete",
                "position" => 4,
            ),
            "H/SS 5" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "warning",
                "labelmessage" => "SUM2015: PHIL 1062",
                "position" => 1,
            ),
            "Unrestricted Elective 1" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success",
                "labelmessage" => "Xfer Comm 1040",
                "position" => 2,
            ),
            "CS Track Reqt 1" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
                "labelcolor" => "warning",
                "labelmessage" => "SUM2015: ADV OS",
                "position" => 3,
            ),
            "Non-tech Track Elective 1" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
                "labelcolor" => "alert",
                "labelmessage" => "? ",
                "position" => 4,
            ),
            "Unrestricted Elective 2" => array(
                "semester" => 6,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "success ",
                "labelmessage" => "Continuous Algo",
                "position" => 5,
            ),
            "H/SS 6" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
                "labelcolor" => "alert",
                "labelmessage" => "SUM2015: SOC 1003",
                "position" => 1,
            ),
            "CSci 4243" => array(
                "semester" => 7,
                "credits" => 4,
                "description" => "Capstone Senior Design Project I P(CSci 3240)",
                "link" => "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
                "labelcolor" => "warning",
                "labelmessage" => "SP2015",
                "position" => 2,
            ),
            "CS Track Reqt 2" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
                "labelcolor" => "alert",
                "labelmessage" => "FA2015",
                "position" => 3,
            ),
            "Non-tech Track Elective 2" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
                "labelcolor" => "alert",
                "labelmessage" => "? ",
                "position" => 4,
            ),
            "Unrestricted Elective 3" => array(
                "semester" => 7,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer: 1099->1103 MUS",
                "position" => 5,
            ),
            "Unrestricted Elective 4" => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer: 1099->1002 REL",
                "position" => 1,
            ),
            "CSci 4244" => array(
                "semester" => 8,
                "credits" => 4,
                "description" => "Capstone Senior Design Project II P(CSci 4243)",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "SP2015",
                "position" => 2,
            ),
            "CS Track Reqt 3" => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
                "labelcolor" => "alert",
                "labelmessage" => "FA2015",
                "position" => 3,
            ),
            "Non-tech Track Elective 3 " => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
                "labelcolor" => "alert",
                "labelmessage" => "? ",
                "position" => 4,
            ),
            "Unrestricted Elective 5" => array(
                "semester" => 8,
                "credits" => 3,
                "description" => "",
                "link" => "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
                "labelcolor" => "warning",
                "labelmessage" => "Xfer: 1099->3142 MKTG",
                "position" => 5,
            ),
        );

        return $degreedata;
    }

}
