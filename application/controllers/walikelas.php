<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Walikelas_model', 'walikelas');
    }

    public function index()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'My Profile';

        $data['user'] = $this->walikelas->getDataBy('user', 'email', $email);
        $data['account'] = $this->walikelas->getDataBy('walikelas', 'email', $email);
        $data['sekolah'] = $this->walikelas->getData('identitas_sekolah');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('walikelas/index', $data);
        $this->load->view('templates/footer');
    }


    public function rapor()
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->walikelas->getDataBy('user', 'email', $email);
        $data['account'] = $this->walikelas->getDataBy('walikelas', 'email', $email);
        $data['sekolah'] = $this->walikelas->getData('identitas_sekolah');

        $id = $data['account']['id_kelas'];

        $data['datarapor'] = $this->walikelas->getRaporByKelas($id);

        $data['id'] = $id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);



        $this->load->view('walikelas/rapormurid', $data);
        $this->load->view('templates/footer');
    }

    public function tambahrapor()
    {

        $email = $this->session->userdata('email');


        $data['title'] = 'Data Rapor';

        $data['user'] = $this->walikelas->getDataBy('user', 'email', $email);
        $data['account'] = $this->walikelas->getDataBy('walikelas', 'email', $email);
        $id = $data['account']['id_kelas'];
        $data['sekolah'] = $this->walikelas->getData('identitas_sekolah');
        $data['mapel'] = $this->walikelas->getMapelBy($id);
        $data['murid'] = $this->walikelas->getMuridBy($id);
        $data['id'] = $id;

        $this->form_validation->set_rules('nis', 'nis', 'required');
        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('walikelas/tambahrapor');
            $this->load->view('templates/footer');
        } else {
            $nis = $this->input->post('nis');
            $nilai = $this->session->userdata('nilai');

            $this->walikelas->cekRapor($nis);

            $id_kelas = $id;
            $sakit = $this->input->post('sakit');
            $izin = $this->input->post('izin');
            $alfa = $this->input->post('alfa');
            $ekskul = $this->input->post('ekskul');
            $nilai_ekskul = $this->input->post('nilai_ekskul');
            $ahlak = $this->input->post('ahlak');
            $disiplin = $this->input->post('disiplin');
            $rajin = $this->input->post('rajin');
            $bersih = $this->input->post('bersih');

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

            $this->walikelas->tambahNilai($nis, $nilai, $id);
            $this->walikelas->tambahRapor($data, $id);
        }
    }

    public function add()
    {
        $data = $this->session->userdata('nilai');

        $data[] = $_POST;

        $this->session->set_userdata('nilai', $data);

        // var_dump($data);

        redirect('walikelas/tambahrapor/');
    }
    public function delete($id)
    {
        $data = $this->session->userdata('nilai');

        unset($data[$id]);

        $new = $data;

        $this->session->set_userdata('nilai', $new);
        // $this->session->unset_userdata('nilai');


        redirect('walikelas/tambahrapor/');
    }

    public function hapussemuanilai()
    {
        $this->session->unset_userdata('nilai');
        redirect('walikelas/tambahrapor/');
    }

    public function ubahrapor($nis)
    {

        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->walikelas->getDataBy('user', 'email', $email);
        $data['account'] = $this->walikelas->getDataBy('walikelas', 'email', $email);
        $id = $data['account']['id_kelas'];
        $data['sekolah'] = $this->walikelas->getData('identitas_sekolah');
        $data['mapel'] = $this->walikelas->getMapelBy($id);
        $data['murid'] = $this->walikelas->getMuridBy($id);
        $data['nis'] = $nis;
        $data['id'] = $id;

        $data['rapor'] = $this->walikelas->getDataBy('rapor', 'nis', $nis);
        $data['nilai'] = $this->walikelas->getNilaiBy($nis);

        $this->form_validation->set_rules('nis', 'nis', 'required');
        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('walikelas/ubahrapor');
            $this->load->view('templates/footer');
        } else {

            $sakit = $this->input->post('sakit');
            $izin = $this->input->post('izin');
            $alfa = $this->input->post('alfa');
            $ekskul = $this->input->post('ekskul');
            $nilai_ekskul = $this->input->post('nilai_ekskul');
            $ahlak = $this->input->post('ahlak');
            $disiplin = $this->input->post('disiplin');
            $rajin = $this->input->post('rajin');
            $bersih = $this->input->post('bersih');

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

            $this->db->where('nis', $nis);
            $this->db->update('rapor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Rapor <strong>Berhasil</strong> Diubah
                                                                </div>');
            redirect('walikelas/rapor/');
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
            'mapel' => $this->input->post('mapel'),
            'angka' => $this->input->post('angka')
        ];
        $this->db->insert('nilai', $data);
        redirect('admin/ubahrapor/' . $kelas . '/' . $nis);
    }

    public function hapusrapor($nis, $id)
    {
        $this->db->delete('nilai', ['nis' => $nis]);
        $this->db->delete('rapor', ['id_rapor' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Rapor <strong>Berhasil</strong> Dihapus
                                                                </div>');
        redirect('walikelas/rapor/');
    }

    public function lihatrapor($id, $nis)
    {
        $email = $this->session->userdata('email');

        $data['title'] = 'Data Rapor';

        $data['user'] = $this->walikelas->getDataBy('user', 'email', $email);
        $data['account'] = $this->walikelas->getDataBy('walikelas', 'email', $email);
        $data['sekolah'] = $this->walikelas->getData('identitas_sekolah');

        $data['walikelas'] = $this->walikelas->getWalikelas($nis);

        $data['rapor'] = $this->walikelas->getRaporBy($id);
        $data['nilai'] = $this->walikelas->getNilaiBy($nis);
        $data['id'] = $id;
        $data['nis'] = $nis;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('walikelas/lihatrapor', $data);
        $this->load->view('templates/footer');
    }

    public function pdf($id, $nis)
    {

        $data['title'] = 'Rapor';

        $data['sekolah'] = $this->walikelas->getData('identitas_sekolah');
        $data['rapor'] = $this->walikelas->getRaporBy($id);
        $data['nilai'] = $this->walikelas->getNilaiBy($nis);

        $data['walikelas'] = $this->walikelas->getWalikelas($nis);

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
