<?php

//Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

/**
 * 
 */
class Forms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('course_model');
    }

    /**
     * 
     * @return boolean
     */
    public function delete() {
        //Load library form_validation
        $this->load->library('form_validation');

        //Set some validation rules
        $this->form_validation->set_rules('field', 'required|xss_clean');
        $this->form->validation->set_rules('value', 'required|xss_clean');

        if ($this->form_validation->run()) {
            //Do whatever is needed to process the form and store the data
            // ...

            $noerror = $this->processing_tasks();
            if (IS_AJAX) {
                if ($no_error) {
                    $field = $_POST['field'];
                    $value = $_POST['value'];
                    /*
                      if ($model::delete('courses', array($field => $value))) {
                      return TRUE;
                      } else
                      return FALSE;
                     * 
                     */
                    return $value;
                } else {
                    echo "Ooops! There was some problem trying to process the form";
                }
            } else {
                //Load standard view
            }
        } else {
            //The form is not valid
            if (IS_AJAX) {
                $message = validation_errors();
                echo $message;
            } else {
                //Load standard view
            }
        }
    }

}
