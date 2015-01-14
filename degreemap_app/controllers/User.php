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
        
        $data['content'] = $this->load->view('user/index', NULL, true);
        $this->load->view('templates/full_layout', $data);
    }

    function login()
    {
        if (!$this->session->userdata('logged_in'))
        {
            $this->load->helper(array('form'));
            $data['content'] = $this->load->view('user/login', null, true);
            $this->load->view('templates/full_layout', $data);
        } else
        {
            redirect('home');
        }
    }

    /**
     * 
     */
    function signup()
    {
        if (!$this->session->userdata('logged_in'))
        {
            $data['content'] = $this->load->view('user/signup', null, true);
            $this->load->view('templates/full_layout', $data);
        } else
        {
            redirect('home');
        }
    }

    function logout()
    {
        //use auth helper to sign out.
        sign_out();
        redirect('user/login', 'refresh');
    }

}
