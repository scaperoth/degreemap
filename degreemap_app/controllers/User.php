<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     */
    public function index()
    {
        $data['header'] = "My Account";
        $data['content'] = $this->load->view('user/index');
        $this->load->view('templates/full_layout', $data);
    }

    function login()
    {
        if (!$this->session->userdata('logged_in'))
        {
            if ($this->session->userdata('flash'))
            {
                $flash = $this->session->userdata('flash');
                $data['flash'] = $flash;
                $this->session->unset_userdata('flash');
            }
            $this->load->helper(array('form'));
            $data['header'] = "</br>Login";
            $data['content'] = $this->load->view('user/login', $data, true);
            $this->load->view('templates/full_layout', $data);
        } else
        {
            redirect('home');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('user/login', 'refresh');
    }

}
