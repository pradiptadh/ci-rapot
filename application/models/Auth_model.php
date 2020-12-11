<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUserBy($kolom, $isi)
    {
        $this->db->where($kolom, $isi);
        return $this->db->get('user')->row_array();
    }

    public function message($warna, $text)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-' . $warna . '" role="alert">
                                                                ' . $text . '
                                                                </div>');
        redirect('auth');
    }

    public function sendEmail($token)
    {
        $this->load->library('email');
        $config = [
            'protocol' => 'smpt',
            'smtp_host' => 'ssl://smtp.google.mail.com',
            'smtp_user' => 'fadlyoktapriadii@gmail.com',
            'smtp_pass' => 'heathcliff41',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('fadlyoktapriadii@gmail.com', 'E-Rapor');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Forget Password');
        $this->email->message('Click this link for reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
