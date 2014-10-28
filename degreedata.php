<?php

$max_courses = 0;
$total_credits = 0;

//array indexed by semester number
$degreedata = array(
	1 => array( 
		"Humanities or Social Science (H/SS) Elective 1" => array(
			"credits"=>3,
			"description"=>"",
			"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
			"label-color"=>"success",
			"label-message"=>"Ital 1",
			),
		"CSci 1111"=> array(
			"credits"=>3,
			"description"=>"(3) Intro to Software Development (in Java)
			Co(CSci 1010)",
			"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
			"label-color"=>"warning",
			"label-message"=>"Xfer Java 1",
			),
		"CSci 1010"=> array(
			"credits"=>1,
			"description"=>"Computer Science Orientation (Entering SEAS freshmen also take SEAS 1001 (1))",
			"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
			"label-color"=>"warning",
			"label-message"=>"Waive or Research",
			),
		"Math Reqt 1"=> array(
			"credits"=>3,
			"description"=>"",
			"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
			"label-color"=>"success",
			"label-message"=>"MATH 1220/1221",
			),
		"UW 1020"=> array(
			"credits"=>4,
			"description"=>"University Writing",
			"link"=> "http://bulletin.gwu.edu/arts-sciences/university-writing/#coursestext",
			"label-color"=>"success",
			"label-message"=>"UW 1020",
			),
		),
2 => array( 
	"H/SS 2"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
		"label-color"=>"success",
		"label-message"=>"Xfer Econ",
		),
	"CSci 1112"=> array(
		"credits"=>3,
		"description"=>"Algorithms and Data Structures (in Java) P(CSci 1111 with a grade of C or better, Math 1220/1231)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"warning",
		"label-message"=>"Waive or Research",
		),
	"CSci 1311"=> array(
		"credits"=>3,
		"description"=>"Discrete Structures I P(Math 1220/1231)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"Math Reqt 2"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success",
		"label-message"=>"MATH 1232",
		),
	"Science Reqt 1"=> array(
		"credits"=>4,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success",
		"label-message"=>"Xfer Bio",
		),
	),
3 => array( 
	"H/SS 3"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
		"label-color"=>"success",
		"label-message"=>"Xfer SOC 1001",
		),
	"CSci 2113"=> array(
		"credits"=>3,
		"description"=>"Software Engineering I (Java+C) P(CSci 1112 with a grade of C or better)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"CSci 2312"=> array(
		"credits"=>3,
		"description"=>"Discrete Structures II",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"warning",
		"label-message"=>"In Progress",
		),
	"CSci 2461"=> array(
		"credits"=>3,
		"description"=>"Computer Architecture I P(CSci 1112 with a grade of C or better, CSci 1311)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"Science Reqt 2"=> array(
		"credits"=>4,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success",
		"label-message"=>"PHYS I",
		),
	),
4 => array( 
	"CS Elective *"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"alert",
		"label-message"=>"Need 3000+ CS crse",
		),
	"CSci 2441W"=>array(
		"credits"=>3,
		"description"=>"Database Systems and Team Projects Co(CSci 2113)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"CSci 3410"=> array(
		"credits"=>3,
		"description"=>"Systems Programming P(CSci 2461, 2113)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"Stat Reqt "=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success",
		"label-message"=>"STAT 1053",
		),
	"Science Reqt 3"=> array(
		"credits"=>4,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"alert",
		"label-message"=>"SUM2015: PHYS 2",
		),
	),
5 => array( 
	"H/SS 4"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success",
		"label-message"=>"Xfer PHIL 1051",
		),
	"CSci 3212"=> array(
		"credits"=>4,
		"description"=>"Algorithms P(CSci 1311, CSci 2113)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"CSci 3313"=> array(
		"credits"=>4,
		"description"=>"Foundations of Computing P(CSci 2461, CSci 2113)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	"CSci 3411"=> array(
		"credits"=>4,
		"description"=>"Operating Systems P(CSci 2461, CSci 2113)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"success",
		"label-message"=>"Complete",
		),
	),
6 => array( 
	"H/SS 5"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
		"label-color"=>"warning",
		"label-message"=>"SUM2015: PHIL 1062",
		),
	"Unrestricted Elective 1"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success",
		"label-message"=>"Xfer Comm 1040",
		),
	"CS Track Reqt 1"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
		"label-color"=>"warning",
		"label-message"=>"SUM2015: ADV OS",
		),
	"Non-tech Track Elective 1"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
		"label-color"=>"alert",
		"label-message"=>"?",
		),
	"Unrestricted Elective 2"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"success ",
		"label-message"=>"Continuous Algo",
		),
	),
7 => array( 
	"H/SS 6"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective#HSS",
		"label-color"=>"alert",
		"label-message"=>"SUM2015: SOC 1003",
		),
	"CSci 4243"=> array(
		"credits"=>4,
		"description"=>"Capstone Senior Design Project I P(CSci 3240)",
		"link"=> "http://bulletin.gwu.edu/engineering-applied-science/computer-science/#coursestext",
		"label-color"=>"warning",
		"label-message"=>"SP2015",
		),
	"CS Track Reqt 2"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
		"label-color"=>"alert",
		"label-message"=>"FA2015",
		),
	"Non-tech Track Elective 2"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
		"label-color"=>"alert",
		"label-message"=>"?",
		),
	"Unrestricted Elective 3"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"warning",
		"label-message"=>"Xfer: 1099->1103 MUS",
		),
	),
8 => array( 
	"Unrestricted Elective 4"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"warning",
		"label-message"=>"Xfer: 1099->1002 REL",
		),
	"CSci 4244"=> array(
		"credits"=>4,
		"description"=>"Capstone Senior Design Project II P(CSci 4243)",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"warning",
		"label-message"=>"SP2015",
		),
	"CS Track Reqt 3"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/technical",
		"label-color"=>"alert",
		"label-message"=>"FA2015",
		),
	"Non-tech Track Elective 3 "=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/non-tech",
		"label-color"=>"alert",
		"label-message"=>"?",
		),
	"Unrestricted Elective 5"=> array(
		"credits"=>3,
		"description"=>"",
		"link"=> "http://www.cs.gwu.edu/academics/undergraduate_programs/bs/elective",
		"label-color"=>"warning",
		"label-message"=>"Xfer: 1099->3142 MKTG",
		),

	),


);

foreach ($degreedata as $key=>$value){
	$coursecount = 0;
	foreach($value as $innervalue){
		$coursecount+=1;
		if($coursecount>$max_courses)
			$max_courses = $coursecount;
		$total_credits += $innervalue['credits'];
	}
}


?>