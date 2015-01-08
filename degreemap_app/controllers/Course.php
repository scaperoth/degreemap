<?php

//Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

/**
 * 
 */
class Course extends MY_Controller
{

    const NULL_VAL = -1;
    const INSERT = 0;
    const UPDATE = 1;
    const DELETE = 2;

    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->username = $this->session->userdata('username');
    }

    /**
     * 
     * @return boolean
     */
    public function insert()
    {
        if (isset($_POST['semester']) && isset($_POST['position']))
        {
            $return_array = $_POST;
            $return = $this->_submit($return_array, self::INSERT);
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
    public function update()
    {
        if (isset($_POST['semester']) && isset($_POST['position']) && isset($_POST['field']) && isset($_POST['value']))
        {
            $return_array = $_POST;
            $return = $this->_submit($return_array, self::UPDATE);
            //use flash helper to set flash message values
            set_flash("Course Updated", "success");

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
    public function delete()
    {
        if (isset($_POST['semester']) && isset($_POST['position']))
        {
            $return_array = $_POST;
            $return = $this->_submit($return_array, self::DELETE);
            echo $return;
        } else
        {
            echo "Ooops! Not the proper request.";
            //redirect("pages/animation");
        }
    }

    /**
     * 
     * @param array $array
     * @param type $request_type defaults to update (1)
     * @return type
     */
    private function _submit($array = array(), $request_type = self::NULL_VAL)
    {
        if ($request_type === self::NULL_VAL)
            return json_encode(array('result' => FALSE));

        $array['username'] = $this->username;

        switch ($request_type)
        {
            case self::INSERT:
                $result = $this->CourseModel->insert($array);
                break;
            case self::UPDATE:
                $result = $this->CourseModel->update($array);
                break;
            case self::DELETE:
                $result = $this->CourseModel->delete($array);
                break;
        }
        if ($result)
        {
            $return_array['result'] = TRUE;
            $return = json_encode($return_array);
        } else
            $return = json_encode(array('result' => FALSE));
        return $return;
    }

}
