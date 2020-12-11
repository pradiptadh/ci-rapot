<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
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

    public function getDataAccountWali($email)
    {
        $query = "SELECT walikelas.nip, walikelas.email, walikelas.nama, walikelas.alamat, kelas.nama_kelas, walikelas.image FROM `walikelas` JOIN `kelas` ON kelas.id_kelas = walikelas.id_kelas WHERE walikelas.email = '$email'";

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
    public function getRaporBy($nis)
    {
        $query = "SELECT rapor.id_rapor, rapor.nis, murid.nama,kelas.nama_kelas,rapor.sakit,rapor.izin,rapor.alfa,rapor.ekskul,rapor.nilai_ekskul,rapor.ahlak,rapor.kedisiplinan,rapor.kerajinan,rapor.kebersihan FROM rapor JOIN kelas ON kelas.id_kelas = rapor.id_kelas JOIN murid ON murid.nis = rapor.nis AND rapor.nis = $nis";

        return $this->db->query($query)->row_array();
    }

    public function getNilaiBy($nis)
    {
        return $this->db->get_where('nilai', ['nis' => $nis])->result_array();
    }

    public function getWalikelas($nis)
    {
        $query = "SELECT walikelas.nip, walikelas.nama FROM walikelas JOIN rapor ON rapor.id_kelas = walikelas.id_kelas AND rapor.nis = $nis";

        return $this->db->query($query)->row_array();
    }
}
