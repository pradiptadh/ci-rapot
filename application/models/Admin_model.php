<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getCountData($table)
    {
        return $this->db->get($table)->num_rows();
    }

    public function getDataBy($table, $row, $isi)
    {
        $this->db->where($row, $isi);
        return $this->db->get($table)->row_array();
    }

    public function getData($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function changeAccess($role_id, $menu_id)
    {

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Akses Menu  <strong>Berhasil</strong> Diubah !
                                                                </div>');
    }


    public function ubahIdentitas($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('identitas_sekolah', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Identitas  <strong>Berhasil</strong> Diubah
                                                                </div>');
        redirect('admin/identitas');
    }

    public function jumlahMapel($keyword)
    {
        $this->db->select('mapel.id_mapel, mapel.id_jurusan, mapel.kkm, jurusan.nama_jurusan, mapel.nama_mapel');
        $this->db->from('mapel');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mapel.id_jurusan');
        $this->db->like('jurusan.nama_jurusan', $keyword);
        $this->db->or_like('mapel.nama_mapel', $keyword);

        return $this->db->get()->num_rows();
    }

    public function getDataMapel($limit, $start, $keyword = null)
    {

        $this->db->select('mapel.id_mapel, mapel.id_jurusan, mapel.kkm, jurusan.nama_jurusan, mapel.nama_mapel');
        $this->db->from('mapel');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mapel.id_jurusan');
        $this->db->order_by('jurusan.nama_jurusan', 'ASC');
        $this->db->order_by('mapel.nama_mapel', 'ASC');
        $this->db->limit($limit, $start);
        $this->db->like('jurusan.nama_jurusan', $keyword);
        $this->db->or_like('mapel.nama_mapel', $keyword);

        return $this->db->get()->result_array();
    }

    public function cekTambahMapel($nama, $jurusan)
    {
        $cek = $this->db->get_where('mapel', ['nama_mapel' => $nama, 'id_jurusan' => $jurusan])->num_rows();

        if ($cek > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                Mata Pelajaran <strong>Tidak Boleh</strong> Sama
                                                                </div>');
            redirect('admin/mapel');
        }
    }

    public function tambahMapel($data)
    {

        $this->db->insert('mapel', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Mata Pelajaran  <strong>Berhasil</strong> Ditambahkan
                                                                </div>');
        redirect('admin/mapel');
    }

    public function ubahMapel($id, $data)
    {
        $this->db->where('id_mapel', $id);
        $this->db->update('mapel', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Mata Pelajaran  <strong>Berhasil</strong> Diubah
                                                                </div>');
        redirect('admin/mapel');
    }

    public function hapusMapel($id)
    {
        $this->db->delete('mapel', ['id_mapel' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Mata Pelajaran  <strong>Berhasil</strong> Dihapus
                                                                </div>');
        redirect('admin/mapel');
    }


    public function jumlahKelas($keyword)
    {
        $this->db->select('kelas.id_kelas, kelas.id_jurusan, jurusan.nama_jurusan, kelas.nama_kelas');
        $this->db->from('kelas');
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $this->db->like('jurusan.nama_jurusan', $keyword);
        $this->db->or_like('kelas.nama_kelas', $keyword);

        return $this->db->get()->num_rows();
    }

    public function getDatakelas($limit, $start, $keyword = null)
    {

        $this->db->select('kelas.id_kelas, kelas.id_jurusan, jurusan.nama_jurusan, kelas.nama_kelas');
        $this->db->from('kelas');
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $this->db->limit($limit, $start);
        $this->db->like('jurusan.nama_jurusan', $keyword);
        $this->db->or_like('kelas.nama_kelas', $keyword);
        $this->db->order_by('kelas.nama_kelas', 'ASC');

        return $this->db->get()->result_array();
    }

    public function cekKelas($data)
    {
        $cek = $this->db->get_where('kelas', $data)->num_rows();

        if ($cek > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                Kelas <strong>Tidak Boleh</strong> Sama
                                                                </div>');
            redirect('admin/kelas');
        }
    }

    public function tambahKelas($data)
    {

        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Kelas <strong> <strong>Berhasil</strong></strong> Ditambahkan
                                                                </div>');
        redirect('admin/kelas');
    }

    public function ubahKelas($id, $data)
    {

        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Kelas <strong>Berhasil</strong> Diubah
                                                                </div>');
        redirect('admin/kelas');
    }

    public function hapusKelas($id)
    {
        $this->db->delete('kelas', ['id_kelas' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Kelas <strong>Berhasil</strong> Dihapus
                                                                </div>');
        redirect('admin/kelas');
    }

    public function getListJurusan()
    {
        $this->db->where_not_in('id_jurusan', 3);
        return $this->db->get('jurusan')->result_array();
    }

    public function jumlahWali($keyword)
    {
        $this->db->select('walikelas.nip, walikelas.email, walikelas.nama, walikelas.alamat, walikelas.no_hp, walikelas.image, kelas.nama_kelas');
        $this->db->from('walikelas');
        $this->db->join('kelas', 'kelas.id_kelas = walikelas.id_kelas');
        $this->db->like('walikelas.nama', $keyword);

        return $this->db->get()->num_rows();
    }

    public function getDataWalikelas($limit, $start, $keyword = null)
    {

        $this->db->select('walikelas.nip, walikelas.email, walikelas.nama, walikelas.alamat, walikelas.no_hp, walikelas.image, kelas.nama_kelas');
        $this->db->from('walikelas');
        $this->db->join('kelas', 'kelas.id_kelas = walikelas.id_kelas');
        $this->db->limit($limit, $start);
        $this->db->like('walikelas.nama', $keyword);
        // $this->db->or_like('kelas.nama_kelas', $keyword);
        $this->db->order_by('walikelas.nama', 'ASC');

        return $this->db->get()->result_array();
    }

    public function cekWalikelas($nip, $email, $kelas)
    {

        $this->db->or_where('nip', $nip);
        $this->db->or_where('email', $email);
        $this->db->or_where('id_kelas', $kelas);
        $cek = $this->db->get('walikelas')->num_rows();

        if ($cek > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                Wali Kelas <strong>Tidak Boleh</strong> Sama
                                                                </div>');
            redirect('admin/walikelas');
        }
        var_dump($cek);
    }


    public function tambahWalikelas($data, $data_user)
    {

        $this->db->insert('walikelas', $data);

        $this->db->insert('user', $data_user);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Walikelas <strong>Berhasil</strong> Ditambahkan
                                                                </div>');
        redirect('admin/walikelas');
    }

    public function ubahWalikelas($nip, $data, $email_lama, $email_baru)
    {

        $this->db->where('nip', $nip);
        $this->db->update('walikelas', $data);

        $this->db->set('email', $email_baru);
        $this->db->where('email', $email_lama);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Walikelas <strong>Berhasil</strong> Diubah
                                                                </div>');
        redirect('admin/walikelas');
    }

    public function hapusWalikelas($nip, $email, $image)
    {
        $email_f = urldecode($email);

        $this->db->delete('walikelas', ['nip' => $nip]);

        if ($image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/walikelas' . $image);
        }

        $this->db->delete('user', ['email' => $email_f]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Walikelas <strong>Berhasil</strong> Dihapus
                                                                </div>');
        redirect('admin/walikelas');
    }

    public function getDataMurid($limit, $start, $keyword = null)
    {
        $this->db->select('murid.nis, murid.email, murid.nama, murid.alamat, murid.image, jurusan.nama_jurusan, kelas.nama_kelas');
        $this->db->from('murid');
        $this->db->join('jurusan', 'jurusan.id_jurusan = murid.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas = murid.id_kelas');
        $this->db->limit($limit, $start);
        $this->db->where_not_in('murid.nis', 1);
        $this->db->like('murid.nama', $keyword);

        return $this->db->get()->result_array();
    }

    public function jumlahMurid($keyword)
    {
        $this->db->select('murid.nis, murid.email, murid.nama, murid.alamat, murid.image, jurusan.nama_jurusan, kelas.nama_kelas');
        $this->db->from('murid');
        $this->db->join('jurusan', 'jurusan.id_jurusan = murid.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas = murid.id_kelas');
        $this->db->where_not_in('murid.nis', 1);
        $this->db->like('murid.nama', $keyword);

        return $this->db->get()->num_rows();
    }

    public function cekMurid($nis, $email)
    {

        $this->db->or_where('nis', $nis);
        $this->db->or_where('email', $email);
        $cek = $this->db->get('murid')->num_rows();

        if ($cek > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                                Murid <strong>Tidak Boleh</strong> Sama
                                                                </div>');
            // redirect('admin/murid');
            var_dump($cek);
        }
    }

    public function tambahMurid($data, $data_user)
    {

        $this->db->insert('murid', $data);

        $this->db->insert('user', $data_user);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                                Murid <strong>Berhasil</strong> Ditambahkan
                                                                </div>');
        redirect('admin/murid');
    }

    public function hapusMurid($nis, $email, $image)
    {
        $email_f = urldecode($email);

        $this->db->delete('murid', ['nis' => $nis]);

        if ($image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $image);
        }

        $this->db->delete('user', ['email' => $email_f]);

        $this->db->delete('nilai', ['nis' => $nis]);
        $this->db->delete('rapor', ['nis' => $nis]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Murid <strong>Berhasil</strong> Dihapus
                                                                </div>');
        redirect('admin/murid');
    }

    public function ubahMurid($nis, $data, $email_lama, $email_baru)
    {
        $this->db->where('nis', $nis);
        $this->db->update('murid', $data);

        $this->db->set('email', $email_baru);
        $this->db->where('email', $email_lama);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Murid <strong>Berhasil</strong> Diubah
                                                                </div>');
        redirect('admin/murid');
    }

    public function getMapelBy($id)
    {
        $query = "SELECT * FROM `kelas` WHERE id_kelas = $id";
        $kelas = $this->db->query($query)->row_array();
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

    public function cekRapor($nis, $id)
    {

        $rapor = $this->db->get_where('rapor', ['nis' => $nis]);
        if ($rapor->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                               Rapor <strong>Sudah</strong> Ada
                                                                </div>');
            redirect('admin/tambahrapor/' . $id);
        }
    }

    public function tambahRapor($data, $id)
    {
        $this->db->insert('rapor', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                               Data Rapor <strong>Berhasil</strong> Ditambahkan
                                                      </div>');
        redirect('admin/rapor/' . $id);
    }

    public function getRaporByKelas($id)
    {
        $query = "SELECT rapor.id_rapor,rapor.nis, murid.nama, kelas.nama_kelas FROM rapor JOIN murid ON murid.nis = rapor.nis JOIN kelas ON rapor.id_kelas = kelas.id_kelas AND rapor.id_kelas = $id";

        return $this->db->query($query)->result_array();
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
