<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {

        $data['title'] = 'E-Rapor';
        $data['sekolah'] = $this->db->get('identitas_sekolah')->result_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);


            $user = $this->Auth_model->getUserBy('email', $email);
            // $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {

                $role = $user['role_id'];

                if (password_verify($password, $user['password'])) {

                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('role', $role);
                    if ($role == '1') {
                        redirect('admin');
                    } else if ($role == '2') {
                        redirect('user');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->Auth_model->message('danger', 'Password Salah !');
                }
            } else {
                $this->Auth_model->message('danger', 'Email Tidak Valid !');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        $this->Auth_model->message('success', 'Logout Berhasil !');
    }

    public function blocked()
    {
        $data['title'] = 'Blocked';

        $this->load->view('templates/header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }

    public function forgotpassword()
    {
        $data['title'] = 'E-Rapor';
        $data['sekolah'] = $this->db->get('identitas_sekolah')->result_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);

            $cekEmail = $this->db->get_where('user', ['email' => $email])->num_rows();

            if ($cekEmail > 0) {
                $token = base64_encode(random_bytes(32));

                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date' => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->Auth_model->sendEmail($token);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                 Silahkan Periksa Email Anda
                                                                </div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                 Email Tidak Terdaftar
                                                                </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changepassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                             Reset Password Gagal!! Token tidak valid
                                             </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                             Reset Password Gagal!! Email tidak valid
                                             </div>');
            redirect('auth');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {

            $data['email'] = $this->session->userdata('reset_email');

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/changepassword', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                             Reset password Successful! Please login.
                                             </div>');
            redirect('auth');
        }
    }
}
