<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ubah Rapor<h1>
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
                            <form action="<?= base_url('walikelas/ubahrapor/') . $nis; ?>" method="post">
                                <div class="form-group">
                                    <label for="nis">Nama</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nis" id="nis" value="<?= $rapor['nis']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sakit">Sakit</label>
                                    <input type="number" name="sakit" class="form-control" value="<?= $rapor['sakit']; ?>" id="sakit" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="izin">Izin</label>
                                    <input type="number" name="izin" class="form-control" value="<?= $rapor['izin']; ?>" id="izin" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="alfa">Alfa</label>
                                    <input type="number" name="alfa" class="form-control" value="<?= $rapor['alfa']; ?>" id="alfa" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="ekskul">Ekstrakulikuler</label>
                                    <select name="ekskul" id="ekskul" class="form-control">
                                        <option <?php if ($rapor['ekskul'] == 'Osis') {
                                                    echo "selected";
                                                } ?> value='Osis'>Osis</option>
                                        <option <?php if ($rapor['ekskul'] == 'Paskibra') {
                                                    echo "selected";
                                                } ?> value='Paskibra'>Paskibra</option>
                                        <option <?php if ($rapor['ekskul'] == 'Pramuka') {
                                                    echo "selected";
                                                } ?> value='Pramuka'>Pramuka</option>
                                        <option <?php if ($rapor['ekskul'] == 'PMR') {
                                                    echo "selected";
                                                } ?> value='PMR'>PMR</option>
                                        <option <?php if ($rapor['ekskul'] == 'Adiwiyata') {
                                                    echo "selected";
                                                } ?> value='Adiwiyata'>Adiwiyata</option>
                                        <option <?php if ($rapor['ekskul'] == 'Rohis') {
                                                    echo "selected";
                                                } ?> value='Rohis'>Rohis</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_ekskul">Nilai Ekstrakulikuler</label>
                                    <select name="nilai_ekskul" id="nilai_ekskul" class="form-control">
                                        <option <?php if ($rapor['nilai_ekskul'] == 'A') {
                                                    echo "selected";
                                                } ?> value='A'>A</option>

                                        <option <?php if ($rapor['nilai_ekskul'] == 'B') {
                                                    echo "selected";
                                                } ?> value='B'>B</option>

                                        <option <?php if ($rapor['nilai_ekskul'] == 'C') {
                                                    echo "selected";
                                                } ?> value='C'>C</option>

                                        <option <?php if ($rapor['nilai_ekskul'] == 'D') {
                                                    echo "selected";
                                                } ?> value='D'>D</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="akhlak">Ahlak</label>
                                    <select name="ahlak" id="ahlak" class="form-control">
                                        <option <?php if ($rapor['ahlak'] == 'A') {
                                                    echo "selected";
                                                } ?> value='A'>A</option>

                                        <option <?php if ($rapor['ahlak'] == 'B') {
                                                    echo "selected";
                                                } ?> value='B'>B</option>

                                        <option <?php if ($rapor['ahlak'] == 'C') {
                                                    echo "selected";
                                                } ?> value='C'>C</option>

                                        <option <?php if ($rapor['ahlak'] == 'D') {
                                                    echo "selected";
                                                } ?> value='D'>D</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="disiplin">Kedisiplinan</label>
                                    <select name="disiplin" id="disiplin" class="form-control">
                                        <option <?php if ($rapor['kedisiplinan'] == 'A') {
                                                    echo "selected";
                                                } ?> value='A'>A</option>

                                        <option <?php if ($rapor['kedisiplinan'] == 'B') {
                                                    echo "selected";
                                                } ?> value='B'>B</option>

                                        <option <?php if ($rapor['kedisiplinan'] == 'C') {
                                                    echo "selected";
                                                } ?> value='C'>C</option>

                                        <option <?php if ($rapor['kedisiplinan'] == 'D') {
                                                    echo "selected";
                                                } ?> value='D'>D</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rajin">Kerajinan</label>
                                    <select name="rajin" id="rajin" class="form-control">
                                        <option <?php if ($rapor['kerajinan'] == 'A') {
                                                    echo "selected";
                                                } ?> value='A'>A</option>

                                        <option <?php if ($rapor['kerajinan'] == 'B') {
                                                    echo "selected";
                                                } ?> value='B'>B</option>

                                        <option <?php if ($rapor['kerajinan'] == 'C') {
                                                    echo "selected";
                                                } ?> value='C'>C</option>

                                        <option <?php if ($rapor['kerajinan'] == 'D') {
                                                    echo "selected";
                                                } ?> value='D'>D</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bersih">Kebersihan</label>
                                    <select name="bersih" id="bersih" class="form-control">
                                        <option <?php if ($rapor['kebersihan'] == 'A') {
                                                    echo "selected";
                                                } ?> value='A'>A</option>

                                        <option <?php if ($rapor['kebersihan'] == 'B') {
                                                    echo "selected";
                                                } ?> value='B'>B</option>

                                        <option <?php if ($rapor['kebersihan'] == 'C') {
                                                    echo "selected";
                                                } ?> value='C'>C</option>

                                        <option <?php if ($rapor['kebersihan'] == 'D') {
                                                    echo "selected";
                                                } ?> value='D'>D</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary float-right">Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>




                <div class="col-lg-6">

                    <div class="card mb-4">
                        <h5 class="card-header">Form Nilai</h5>
                        <div class="card-body">
                            <form action="<?= base_url('walikelas/tambahubahnilai/') . $nis ?>" method="post">
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


                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Mapel</th>
                            <th>Angka</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($nilai as $n) { ?>

                            <tr>
                                <td><?= $n['mapel']; ?></td>
                                <td><?= $n['angka']; ?></td>
                                <td><a href="<?= base_url('walikelas/hapusnilai/') . $nis . '/' . $n['id_nilai']; ?>"> <button class=" btn btn-sm btn-danger">Hapus</button></a></>
                                </td>
                            </tr>

                        <?php
                            $i++;
                        } ?>


                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->