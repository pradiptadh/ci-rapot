<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Rapor<h1>
            </div>

            <?= $this->session->userdata('message'); ?>

            <?php

            // var_dump($murid);

            ?>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <h5 class="card-header">Form Rapor</h5>
                        <div class="card-body">
                            <form action="<?= base_url('admin/tambahrapor/') . $id; ?>" method="post">
                                <div class="form-group">
                                    <label for="nis">Nama</label>
                                    <div class="form-group">
                                        <select name="nis" id="nis" class="form-control" required>
                                            <option value="">----Pilih Murid----</option>
                                            <?php foreach ($murid as $mur) { ?>
                                                <option value="<?= $mur['nis']; ?>"><?= $mur['nama']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sakit">Sakit</label>
                                    <input type="number" name="sakit" class="form-control" id="sakit" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="izin">Izin</label>
                                    <input type="number" name="izin" class="form-control" id="izin" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="alfa">Alfa</label>
                                    <input type="number" name="alfa" class="form-control" id="alfa" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="ekskul">Ekstrakulikuler</label>
                                    <select name="ekskul" id="ekskul" class="form-control">
                                        <option value="">----Pilih Ekstrakulikuler----</option>
                                        <option value="Osis">Osis</option>
                                        <option value="Paskibra">Paskibra</option>
                                        <option value="Pramuka">Pramuka</option>
                                        <option value="PMR">PMR</option>
                                        <option value="Adiwiyata">Adiwiyata</option>
                                        <option value="Rohis">Rohis</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_ekskul">Nilai Ekstrakulikuler</label>
                                    <select name="nilai_ekskul" id="nilai_ekskul" class="form-control">
                                        <option value="">----Pilih Predikat----</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="akhlak">Ahlak</label>
                                    <select name="ahlak" id="ahlak" class="form-control">
                                        <option value="">----Pilih Predikat----</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="disiplin">Kedisiplinan</label>
                                    <select name="disiplin" id="disiplin" class="form-control">
                                        <option value="">----Pilih Predikat----</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rajin">Kerajinan</label>
                                    <select name="rajin" id="rajin" class="form-control">
                                        <option value="">----Pilih Predikat----</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select> </div>
                                <div class="form-group">
                                    <label for="bersih">Kebersihan</label>
                                    <select name="bersih" id="bersih" class="form-control">
                                        <option value="">----Pilih Predikat----</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>

                                <button class="btn btn-success float-right">Tambah</button>

                            </form>
                        </div>
                    </div>
                </div>




                <div class="col-lg-6">

                    <div class="card mb-4">
                        <h5 class="card-header">Form Nilai</h5>
                        <div class="card-body">
                            <form action="<?= base_url('admin/add/') . $id; ?>" method="post">
                                <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <select name="mapel" id="mapel" class="form-control" required>
                                        <option value="">----Pilih Mata Pelajaran----</option>
                                        <?php foreach ($mapel as $map) { ?>
                                            <option value="<?= $map['nama_mapel'] ?>"><?= $map['nama_mapel']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="angka">Angka</label>
                                    <input type="number" max="100" min="0" name="angka" class="form-control" id="angka" required>
                                </div>
                                <button class="btn btn-success btn-sm float-right">Tambah</button>
                            </form>
                        </div>
                    </div>

                    <a href="<?= base_url('admin/hapussemuanilai/') . $id; ?>"><button class="btn btn-danger btn-sm mb-4">Hapus Semua Nilai</button></a>


                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Mapel</th>
                            <th>Angka</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
                        // error_reporting(E_ALL & ~E_NOTICE);
                        $nilai = $this->session->userdata('nilai');
                        $i = 0;
                        if (!empty($nilai)) {

                            foreach ($nilai as $n => $s) { ?>

                                <tr>
                                    <td><?= $s['mapel']; ?></td>
                                    <td><?= $s['angka']; ?></td>
                                    <td><a href="<?= base_url('admin/delete/') . $n . '/' . $id; ?>"><button class="btn btn-sm btn-danger">Hapus</button></a></>
                                    </td>
                                </tr>

                        <?php
                                $i++;
                            }
                        } ?>


                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->