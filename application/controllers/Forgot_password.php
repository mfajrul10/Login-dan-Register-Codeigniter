<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_account');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Reset Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('account/v_forgot_password', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->M_account->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('message', '<div class="Wrong email, please try again</div>');
                redirect('home');
            }

            //build token   
            $token = $this->M_account->insertToken($userInfo->id_user);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . '/forgot_password/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            // email
            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'jayaj4794@gmail.com',
                'smtp_pass' => 'elakramy2016',
                'smtp_port' => 465,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n"
            ];
            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('jayaj4794@gmail.com', 'Jaya');
            $this->email->to($this->input->post('email'));

            $this->email->subject('Reset Password');
            $this->email->message('Click this link for reset password' . $link);

            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset password</div>');
                redirect('home');
            }
        }
    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->M_account->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('sukses', 'Token is not valid or expired');
            redirect(site_url('home'), 'refresh');
        }

        $data = array(
            'title' => 'Reset Password',
            'name' => $user_info->name,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Reset Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('account/v_reset_password', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = md5($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['id_user'] = $user_info->id_user;
            unset($cleanPost['passconf']);
            if (!$this->M_account->updatePassword($cleanPost)) {
                $this->session->set_flashdata('sukses', 'Update password is fail.');
            } else {
                $this->session->set_flashdata('sukses', 'Your password has been update. Please Login.');
            }
            redirect('home');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
