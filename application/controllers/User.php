<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        $data['title'] = 'My Profile';

        $data['user'] = $this->user->getDataBy('user', 'email', $email);
        if ($role == '2') {
            $data['account'] = $this->user->getDataAccountWali($email);
        } else {
            $data['account'] = $this->user->getDataAccount($email);
        }
        $data['sekolah'] = $this->user->getData('identitas_sekolah');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function changepassword()
    {
        $email = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        $data['title'] = 'Change Password';

        $data['user'] = $this->user->getDataBy('user', 'email', $email);
        if ($role == '2') {
            $data['account'] = $this->user->getDataAccountWali($email);
        } else {
            $data['account'] = $this->user->getDataAccount($email);
        }
        $data['sekolah'] = $this->user->getData('identitas_sekolah');


        $this->form_validation->set_rules('current', 'Current Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|matches[password2]|min_length[6]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {

            $current = $this->input->post('current');
            $password = $this->input->post('password1');

            $this->user->changePassword($email, $current, $password);
        }
    }

    public function rapor()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Rapor';

        $data['user'] = $this->user->getDataBy('user', 'email', $email);
        $data['account'] = $this->user->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->user->getData('identitas_sekolah');

        $id = $data['account']['id_kelas'];
        $nis = $data['account']['nis'];

        $data['rapor'] = $this->user->getRaporBy($nis);
        $data['nilai'] = $this->user->getNilaiBy($nis);

        $data['id'] = $id;
        $data['nis'] = $nis;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/rapor', $data);
        $this->load->view('templates/footer');
    }

    public function pdf($id, $nis)
    {

        $data['title'] = 'Rapor';

        $data['sekolah'] = $this->user->getData('identitas_sekolah');
        $data['rapor'] = $this->user->getRaporBy($nis);
        $data['nilai'] = $this->user->getNilaiBy($nis);
        $data['walikelas'] = $this->user->getWalikelas($nis);


        $data['id'] = $id;
        $data['nis'] = $nis;

        // Load all views as normal
        $this->load->view('admin/exportpdf', $data);
        // Get output html
        $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->set_paper('F4', 'potrait');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Rapor.pdf", array('Attachment' => FALSE));
    }
}
