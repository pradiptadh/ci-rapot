<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas_model extends CI_Model
{
    public function getDataBy($table, $row, $isi)
    {
        $this->db->where($row, $isi);
        return $this->db->get($table)->row_array();
    }

    public function getData($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function getDataAccount($email)
    {
        $query = "SELECT murid.nis, murid.email, murid.nama, murid.alamat, jurusan.nama_jurusan, kelas.nama_kelas, murid.image FROM `murid` JOIN `jurusan` ON jurusan.id_jurusan = murid.id_jurusan JOIN `kelas` ON kelas.id_kelas = murid.id_kelas WHERE murid.email = '$email'";

        return $this->db->query($query)->row_array();
    }

    public function changePassword($email, $current, $password)
    {
        $murid = $this->db->get_where('user', ['email' => $email])->row_array();

        if (password_verify($current, $murid['password'])) {

            if ($current !== $password) {

                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Password Berhasil Diubah !
                                                                </div>');
                redirect('user/changepassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                Password Baru Tidak Boleh Sama !
                                                                </div>');
                redirect('user/changepassword');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                Password Salah !
                                                                </div>');
            redirect('user/changepassword');
        }
    }

    public function getRaporByKelas($id)
    {
        $query = "SELECT rapor.id_rapor,rapor.nis, murid.nama, kelas.nama_kelas FROM rapor JOIN murid ON murid.nis = rapor.nis JOIN kelas ON rapor.id_kelas = kelas.id_kelas AND rapor.id_kelas = $id";

        return $this->db->query($query)->result_array();
    }

    public function getMapelBy($id)
    {
        $query = "SELECT * FROM `kelas` WHERE id_kelas = $id";
        $kelas = $this->db->query($query)->row_array();
        // return $this->db->get_where('kelas', ['id_kelas', 3])->row_array();
        $id_jurusan = $kelas['id_jurusan'];

        $where = "id_jurusan = $id_jurusan OR id_jurusan = 3";
        $this->db->where($where);
        return $this->db->get('mapel')->result_array();
    }

    public function getMuridBy($id)
    {
        return  $this->db->get_where('murid', ['id_kelas' => $id])->result_array();
    }

    public function tambahNilai($nis, $nilai, $id)
    {
        $new = [
            'nis' => $nis
        ];

        foreach ($nilai as $n => $v) {
            $final[] = array_merge($nilai[$n], $new);
        }

        foreach ($final as $f => $val) {

            $data = [
                'nis' => $final[$f]['nis'],
                'mapel' => $final[$f]['mapel']
            ];
        }

        $cek = $this->db->get_where('nilai', $data)->num_rows();

        if ($cek > 0) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Nilai Sudah Pernah Ditambahkan     
              </div>');
            redirect('admin/tambahrapor/' . $id);
        } else {
            $this->db->insert_batch('nilai', $final);
            $this->session->unset_userdata('nilai');
        }
    }

    public function cekRapor($nis)
    {

        $rapor = $this->db->get_where('rapor', ['nis' => $nis]);
        if ($rapor->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                               Rapor <strong>Sudah</strong> Ada
                                                                </div>');
            redirect('walikelas/tambahrapor/');
        }
    }

    public function tambahRapor($data)
    {

        $this->db->insert('rapor', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Rapor <strong>Berhasil</strong> Ditambahkan
                                                      </div>');
        redirect('walikelas/rapor/');
    }

    public function getNilaiBy($nis)
    {
        return $this->db->get_where('nilai', ['nis' => $nis])->result_array();
    }

    public function getRaporBy($id)
    {
        $query = "SELECT rapor.id_rapor, rapor.nis, murid.nama,kelas.nama_kelas,rapor.sakit,rapor.izin,rapor.alfa,rapor.ekskul,rapor.nilai_ekskul,rapor.ahlak,rapor.kedisiplinan,rapor.kerajinan,rapor.kebersihan FROM rapor JOIN kelas ON kelas.id_kelas = rapor.id_kelas JOIN murid ON murid.nis = rapor.nis AND rapor.id_rapor = $id";

        return $this->db->query($query)->row_array();
    }

    public function getWalikelas($nis)
    {
        $query = "SELECT walikelas.nip, walikelas.nama FROM walikelas JOIN rapor ON rapor.id_kelas = walikelas.id_kelas AND rapor.nis = $nis";

        return $this->db->query($query)->row_array();
    }
}
