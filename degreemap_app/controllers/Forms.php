<?php

//Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

/**
 * 
 */
class Forms extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     * @return boolean
     */
    public function delete()
    {
        $model = new CourseModel();
        if (isset($_POST['semester']) && isset($_POST['position']) && isset($_POST['field']) && isset($_POST['value']))
        {
            $return_array = $_POST;
            if ($model::delete($_POST))
            {
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

    /**
     * 
     * @return boolean
     */
    public function edit()
    {
        $model = new CourseModel();
        if (isset($_POST['semester']) && isset($_POST['position']) && isset($_POST['field']) && isset($_POST['value']))
        {
            $return_array = $_POST;
            if ($model::update($return_array))
            {
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
    
    /**
     * 
     * @return boolean
     */
    public function add()
    {
        $model = new CourseModel();
        if (isset($_POST['semester']) && isset($_POST['position']))
        {
            $return_array = $_POST;
            if ($model::add($return_array))
            {
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
