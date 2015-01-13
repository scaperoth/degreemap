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
        $data['username'] = $this->session->userdata('username');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('fname');
        $data['full_name'] = $this->session->userdata('full_name');
        
        $data['content'] = $this->load->view('user/index', $data, true);
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
