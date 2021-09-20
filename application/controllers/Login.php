<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        // Fungsi Login
        $valid = $this->form_validation;
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $valid->set_rules('email', 'email', 'required');
        $valid->set_rules('password', 'Password', 'required');

        if ($valid->run()) {
            $this->simple_login->login($email, $password, base_url('dashboard'), base_url('login'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password or email is not registered</div>');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('home');
    }
}
