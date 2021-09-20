<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('account/home');
        $this->load->view('templates/auth_footer');
    }
}
