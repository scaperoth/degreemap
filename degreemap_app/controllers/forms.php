<?php

//Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

/**
 * 
 */
class Forms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
    }

    /**
     * 
     * @return boolean
     */
    public function delete()
    {
        $model = new Course_model();
        if (isset($_POST['field']) && isset($_POST['value']))
        {
            $field = $_POST['field'];
            $value = $_POST['value'];
            if (TRUE)
            {//$model::delete('courses', array($field => $value))) {
                $return = json_encode(array('result' => TRUE, 'semester' => $_POST['semester'], 'position' => $_POST['position']));
            } else
                $return = json_encode(array('result' => FALSE));
            echo $return;
        } else
        {
            echo "Ooops! Not the proper request.";
            //redirect("pages/animation");
        }
    }

    /**
     * 
     * @return boolean
     */
    public function edit()
    {
        $model = new Course_model();
        if (isset($_POST['field']) && isset($_POST['value']))
        {
            $return_array = $_POST;
            if (TRUE)
            {
                $model::update('courses', $return_array);
                $return_array['result'] = TRUE;
                $return = json_encode($return_array);
            } else
                $return = json_encode(array('result' => FALSE));
            echo $return;
        } else
        {
            echo "Ooops! Not the proper request.";
            //redirect("pages/animation");
        }
    }

}