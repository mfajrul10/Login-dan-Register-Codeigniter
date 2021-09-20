<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
    }

    //Load Halaman dashboard
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('account/v_dashboard', $data);
        $this->load->view('templates/footer');
    }
}
