<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->library('pagination');
    }

    public function index()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Dashboard';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['murid'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');

        $data['mapel'] = $this->admin->getCountData('mapel');
        $data['kelas'] = $this->admin->getCountData('kelas');
        $data['jmlmurid'] = $this->admin->getCountData('murid');
        $data['rapor'] = $this->admin->getCountData('rapor');
        $data['walikelas'] = $this->admin->getCountData('walikelas');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Role';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['murid'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['role'] = $this->admin->getData('user_role');
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role');
        $this->load->view('templates/footer');
    }

    public function accessrole($role_id)
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Role';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['murid'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['menu'] = $this->admin->getData('user_menu');
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');


        $data['role'] = $role_id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/accessrole');
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $role_id = $this->input->post('role_id', true);
        $menu_id = $this->input->post('menu_id', true);

        $this->admin->changeAccess($role_id, $menu_id);
    }

    // MENU IDENTITAS SEKOLAH
    public function identitas()
    {

        $email = $this->session->userdata('email');

        $data['title'] = 'Identitas Sekolah';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['murid'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');

        $this->form_validation->set_rules('email_sekolah', 'Kolom Email', 'valid_email|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/identitas', $data);
            $this->load->view('templates/footer');
        } else {

            $id = $this->input->post('id_sekolah');

            $data = [
                'nama_sekolah' => $this->input->post('nama_sekolah', true),
                'alamat_sekolah' => $this->input->post('alamat_sekolah', true),
                'email_sekolah' => $this->input->post('email_sekolah', true),
                'telepon_sekolah' => $this->input->post('telepon_sekolah', true),
                'tahun_ajaran' => $this->input->post('tahun_ajaran', true),
                'semester' => $this->input->post('semester', true)
            ];

            $this->admin->ubahIdentitas($id, $data);
        }
    }

    public function getUbahSekolah()
    {
        $id = $this->input->post('id');
        echo json_encode($this->admin->getDataBy('identitas_sekolah', 'id', $id));
    }

    // MENU MATA PELAJARAN

    public function mapel()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Mata Pelajaran';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['murid'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');


        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword', true);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $totalbarismapel = $this->admin->jumlahMapel($data['keyword']);

        $config['base_url'] = 'http://localhost/ci-raport/admin/mapel';
        $config['total_rows'] = $totalbarismapel;
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['mapel'] = $this->admin->getDataMapel($config['per_page'], $data['start'], $data['keyword']);


        $this->form_validation->set_rules('nama_mapel', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/mapel');
            $this->load->view('templates/footer');
        } else {

            $nama = $this->input->post('nama_mapel', true);
            $jurusan = $this->input->post('id_jurusan', true);
            $kkm = $this->input->post('kkm', true);

            $this->admin->cekTambahMapel($nama, $jurusan);

            $data = [
                'id_jurusan' => $jurusan,
                'nama_mapel' => $nama,
                'kkm' => $kkm
            ];

            $this->admin->tambahMapel($data);
        }
    }

    public function getMapel()
    {
        $id = $this->input->post('id');
        echo json_encode($this->admin->getDataBy('mapel', 'id_mapel', $id));
    }

    public function ubahMapel()
    {

        $id = $this->input->post('id_mapel');

        $data = [
            'id_jurusan' => $this->input->post('id_jurusan', true),
            'nama_mapel' => $this->input->post('nama_mapel', true),
            'kkm' => $this->input->post('kkm', true)
        ];

        $this->admin->ubahMapel($id, $data);
    }

    public function hapusMapel($id)
    {
        $this->admin->hapusMapel($id);
    }


    // MENU KELAS

    public function kelas()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Kelas';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['murid'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $totalbariskelas = $this->admin->jumlahKelas($data['keyword']);

        $config['base_url'] = 'http://localhost/ci-raport/admin/kelas';
        $config['total_rows'] = $totalbariskelas;
        $config['per_page'] = 6;


        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['kelas'] = $this->admin->getDatakelas($config['per_page'], $data['start'], $data['keyword']);

        $this->form_validation->set_rules('nama_kelas', 'Nama', 'required');
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kelas');
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama_kelas', true);
            $jurusan = $this->input->post('id_jurusan', true);

            $data = [
                'id_jurusan' => $jurusan,
                'nama_kelas' => $nama
            ];

            $this->admin->cekKelas($data);

            $this->admin->tambahKelas($data);
        }
    }

    public function getKelas()
    {
        $id = $this->input->post('id');
        echo json_encode($this->admin->getDataBy('kelas', 'id_kelas', $id));
    }
    public function ubahKelas()
    {
        $id = $this->input->post('id_kelas');
        $data = [
            'id_jurusan' => $this->input->post('id_jurusan', true),
            'nama_kelas' => $this->input->post('nama_kelas', true)
        ];

        $this->admin->ubahKelas($id, $data);
    }

    public function hapuskelas($id)
    {

        $this->admin->hapusKelas($id);
    }


    // MENU WALI KELAS

    public function walikelas()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Wali Kelas';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');
        $data['kelas'] = $this->admin->getData('kelas');

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword', true);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $totalbariswalikelas = $this->admin->jumlahWali($data['keyword']);

        $config['base_url'] = 'http://localhost/ci-raport/admin/walikelas';
        $config['total_rows'] = $totalbariswalikelas;
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['walikelas'] = $this->admin->getDataWalikelas($config['per_page'], $data['start'], $data['keyword']);


        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[walikelas.nip]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[murid.email]');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/walikelas');
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip', true);
            $email_input = $this->input->post('email', true);
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $no_hp = $this->input->post('no_hp', true);
            $kelas = $this->input->post('id_kelas', true);

            $upload_image = $_FILES['image']['name'];

            $email_bersih = filter_var($email_input, FILTER_SANITIZE_EMAIL);

            $this->admin->cekWalikelas($nip, $email_bersih, $kelas);


            if ($upload_image == '') {
                $data = [
                    'nip' => $nip,
                    'email' => $email_input,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'id_kelas' => $kelas,
                    'image' => 'default.jpg'
                ];

                // var_dump($data);

                $password = password_hash('walikelas', PASSWORD_DEFAULT);

                $data_user = [
                    'email' => $email_input,
                    'password' => $password,
                    'role_id' => 2
                ];

                $this->admin->tambahWalikelas($data, $data_user);
            } else {

                $config['upload_path'] = './assets/img/profile/walikelas';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }


                $data = [
                    'nip' => $nip,
                    'email' => $email_input,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'id_kelas' => $kelas,
                    'image' => $new_image
                ];

                var_dump($data);

                $password = password_hash('walikelas', PASSWORD_DEFAULT);

                $data_user = [
                    'email' => $email_input,
                    'password' => $password,
                    'role_id' => 2
                ];

                $this->admin->tambahWalikelas($data, $data_user);
            }
        }
    }

    public function getWalikelas()
    {
        $nip = $this->input->post('nip');
        echo json_encode($this->admin->getDataBy('walikelas', 'nip', $nip));
    }

    public function ubahWalikelas()
    {
        $nip = $this->input->post('nip');

        $walikelas = $this->admin->getDataBy('walikelas', 'nip', $nip);
        $email_lama = $this->input->post('email_lama');
        $email_baru = $this->input->post('email');


        $upload_image = $_FILES['image']['name'];

        if ($upload_image == '') {
            $data1 = [
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'no_hp' => $this->input->post('no_hp', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'image' => $walikelas['image']
            ];

            // var_dump($data1);
            $this->admin->ubahWalikelas($nip, $data1, $email_lama, $email_baru);
        } else {

            $config['upload_path'] = './assets/img/profile/walikelas';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $walikelas['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/walikelas/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
            } else {
                $this->upload->display_errors();
            }

            $data = [
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'no_hp' => $this->input->post('no_hp', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'image' => $new_image
            ];

            // var_dump($data);

            $this->admin->ubahWalikelas($nip, $data, $email_lama, $email_baru);
        }
    }

    public function hapuswalikelas($nip, $email)
    {

        $walikelas = $this->admin->getDataBy('walikelas', 'nip', $nip);
        $image = $walikelas['image'];
        $this->admin->hapusWalikelas($nip, $email, $image);
    }


    // MENU MURID

    public function murid()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Murid';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');
        $data['jurusan'] = $this->admin->getListJurusan();
        $data['kelas'] = $this->admin->getData('kelas');

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword', true);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $totalbariskelas = $this->admin->jumlahMurid($data['keyword']);

        $config['base_url'] = 'http://localhost/ci-raport/admin/murid';
        $config['total_rows'] = $totalbariskelas;
        $config['per_page'] = 6;


        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['murid'] = $this->admin->getDatamurid($config['per_page'], $data['start'], $data['keyword']);


        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|is_unique[murid.nis]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[murid.email]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/murid');
            $this->load->view('templates/footer');
        } else {
            $nis = $this->input->post('nis', true);
            $email_input = $this->input->post('email', true);
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $jurusan = $this->input->post('id_jurusan', true);
            $kelas = $this->input->post('id_kelas', true);

            $upload_image = $_FILES['image']['name'];


            if ($upload_image == '') {
                $data = [
                    'nis' => $nis,
                    'email' => $email_input,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'id_jurusan' => $jurusan,
                    'id_kelas' => $kelas,
                    'image' => 'default.jpg'
                ];

                // var_dump($data);

                $password = password_hash('user123', PASSWORD_DEFAULT);

                $data_user = [
                    'email' => $email_input,
                    'password' => $password,
                    'role_id' => 3
                ];

                $this->admin->tambahMurid($data, $data_user);
            } else {

                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }


                $data = [
                    'nis' => $nis,
                    'email' => $email_input,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'id_jurusan' => $jurusan,
                    'id_kelas' => $kelas,
                    'image' => $new_image
                ];

                var_dump($data);

                $password = password_hash('user123', PASSWORD_DEFAULT);

                $data_user = [
                    'email' => $email_input,
                    'password' => $password,
                    'role_id' => 3
                ];

                $this->admin->tambahMurid($data, $data_user);
            }
        }
    }

    public function hapusmurid($nis, $email)
    {
        $murid = $this->admin->getDataBy('murid', 'nis', $nis);
        $image = $murid['image'];
        $this->admin->hapusMurid($nis, $email, $image);
    }

    public function getMurid()
    {
        $nis = $this->input->post('nis', true);
        echo json_encode($this->admin->getDataBy('murid', 'nis', $nis));
    }

    public function ubahMurid()
    {
        $nis = $this->input->post('nis', true);

        $murid = $this->admin->getDataBy('murid', 'nis', $nis);

        $email_lama = $this->input->post('email_lama', true);
        $email_baru = $this->input->post('email', true);


        $upload_image = $_FILES['image']['name'];

        if ($upload_image == '') {
            $data1 = [
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'id_jurusan' => $this->input->post('id_jurusan', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'image' => $murid['image']
            ];

            // var_dump($data1);
            $this->admin->ubahMurid($nis, $data1, $email_lama, $email_baru);
        } else {

            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $murid['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
            } else {
                $this->upload->display_errors();
            }

            $data = [
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'id_jurusan' => $this->input->post('id_jurusan', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'image' => $new_image
            ];

            // var_dump($data);

            $this->admin->ubahMurid($nis, $data, $email_lama, $email_baru);
        }
    }

    public function hapuspencarian()
    {
        $this->session->unset_userdata('keyword');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // MENU RAPOR

    public function rapor($id = null)
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        $data['id'] = $id;

        if ($id > 0) {
            $data['datarapor'] = $this->admin->getRaporByKelas($id);

            $this->load->view('admin/rapormurid', $data);
        } else {
            $this->load->view('admin/rapor');
        }

        $this->load->view('templates/footer');
    }

    public function tambahrapor($id)
    {

        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');
        $data['mapel'] = $this->admin->getMapelBy($id);
        $data['murid'] = $this->admin->getMuridBy($id);
        $data['id'] = $id;

        $this->form_validation->set_rules('nis', 'nis', 'required');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahrapor');
            $this->load->view('templates/footer');
        } else {
            $nis = $this->input->post('nis', true);
            $nilai = $this->session->userdata('nilai');

            $this->admin->cekRapor($nis, $id);

            $id_kelas = $id;
            $sakit = $this->input->post('sakit', true);
            $izin = $this->input->post('izin', true);
            $alfa = $this->input->post('alfa', true);
            $ekskul = $this->input->post('ekskul', true);
            $nilai_ekskul = $this->input->post('nilai_ekskul', true);
            $ahlak = $this->input->post('ahlak', true);
            $disiplin = $this->input->post('disiplin', true);
            $rajin = $this->input->post('rajin', true);
            $bersih = $this->input->post('bersih', true);

            $data = [
                'nis' => $nis,
                'id_kelas' => $id_kelas,
                'sakit' => $sakit,
                'izin' => $izin,
                'alfa' => $alfa,
                'ekskul' => $ekskul,
                'nilai_ekskul' => $nilai_ekskul,
                'ahlak' => $ahlak,
                'kedisiplinan' => $disiplin,
                'kerajinan' => $rajin,
                'kebersihan' => $bersih
            ];


            $this->admin->tambahNilai($nis, $nilai, $id);
            $this->admin->tambahRapor($data, $id);
        }
    }

    public function add($id)
    {
        $data = $this->session->userdata('nilai');

        $data[] = $_POST;

        $this->session->set_userdata('nilai', $data);

        // var_dump($data);

        redirect('admin/tambahrapor/' . $id);
    }
    public function delete($id, $kelas)
    {
        $data = $this->session->userdata('nilai');

        unset($data[$id]);

        $new = $data;

        $this->session->set_userdata('nilai', $new);
        // $this->session->unset_userdata('nilai');


        redirect('admin/tambahrapor/' . $kelas);
    }

    public function hapussemuanilai($id)
    {
        $this->session->unset_userdata('nilai');
        redirect('admin/tambahrapor/' . $id);
    }

    public function ubahrapor($id, $nis)
    {

        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');
        $data['mapel'] = $this->admin->getMapelBy($id);
        $data['murid'] = $this->admin->getMuridBy($id);
        $data['id'] = $id;
        $data['nis'] = $nis;

        $data['rapor'] = $this->admin->getDataBy('rapor', 'nis', $nis);
        $data['nilai'] = $this->admin->getNilaiBy($nis);

        $this->form_validation->set_rules('nis', 'nis', 'required');
        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubahrapor');
            $this->load->view('templates/footer');
        } else {

            $id_kelas = $id;
            $sakit = $this->input->post('sakit', true);
            $izin = $this->input->post('izin', true);
            $alfa = $this->input->post('alfa', true);
            $ekskul = $this->input->post('ekskul');
            $nilai_ekskul = $this->input->post('nilai_ekskul', true);
            $ahlak = $this->input->post('ahlak', true);
            $disiplin = $this->input->post('disiplin', true);
            $rajin = $this->input->post('rajin', true);
            $bersih = $this->input->post('sakit', true);

            $data = [
                'sakit' => $sakit,
                'izin' => $izin,
                'alfa' => $alfa,
                'ekskul' => $ekskul,
                'nilai_ekskul' => $nilai_ekskul,
                'ahlak' => $ahlak,
                'kedisiplinan' => $disiplin,
                'kerajinan' => $rajin,
                'kebersihan' => $bersih
            ];

            $this->db->update('rapor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Rapor <strong>Berhasil</strong> Diubah
                                                                </div>');
            redirect('admin/rapor/' . $id);
        }
    }

    public function hapusnilai($kelas, $nis, $id)
    {

        $this->db->delete('nilai', ['id_nilai' => $id]);
        redirect('admin/ubahrapor/' . $kelas . '/' . $nis);
    }

    public function tambahubahnilai($kelas, $nis)
    {
        $data = [
            'nis' => $nis,
            'mapel' => $this->input->post('mapel', true),
            'angka' => $this->input->post('angka', true)
        ];
        $this->db->insert('nilai', $data);
        redirect('admin/ubahrapor/' . $kelas . '/' . $nis);
    }

    public function hapusrapor($kelas, $nis, $id)
    {
        $this->db->delete('nilai', ['nis' => $nis]);
        $this->db->delete('rapor', ['id_rapor' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Rapor <strong>Berhasil</strong> Dihapus
                                                                </div>');
        redirect('admin/rapor/' . $kelas);
    }

    public function lihatrapor($id, $nis)
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->admin->getDataBy('user', 'email', $email);
        $data['account'] = $this->admin->getDataBy('murid', 'email', $email);
        $data['sekolah'] = $this->admin->getData('identitas_sekolah');

        $data['walikelas'] = $this->admin->getWalikelas($nis);


        $data['rapor'] = $this->admin->getRaporBy($id);
        $data['nilai'] = $this->admin->getNilaiBy($nis);
        $data['id'] = $id;
        $data['nis'] = $nis;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihatrapor', $data);
        $this->load->view('templates/footer');
    }

    public function pdf($id, $nis)
    {

        $data['title'] = 'Rapor';

        $data['sekolah'] = $this->admin->getData('identitas_sekolah');
        $data['rapor'] = $this->admin->getRaporBy($id);
        $data['nilai'] = $this->admin->getNilaiBy($nis);
        $data['walikelas'] = $this->admin->getWalikelas($nis);


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
