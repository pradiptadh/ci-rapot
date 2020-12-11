<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg">

                    <a href="<?= base_url('admin/tambahrapor/') . $id; ?>"><button class="btn btn-success mb-3 ">Tambah Rapor</button></a>

                    <?= $this->session->userdata('message'); ?>


                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col" colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($datarapor as $r) { ?>
                                <tr>
                                    <th class="scope"><?= $i; ?></th>
                                    <td><?= $r['nis']; ?></td>
                                    <td><?= $r['nama']; ?></td>
                                    <td><?= $r['nama_kelas']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/lihatrapor/') . $r['id_rapor'] . '/' . $r['nis']; ?>"><button class="btn btn-warning btn-sm">Lihat</button></a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/ubahrapor/') . $id . '/' . $r['nis']; ?>"><button class="btn btn-sm btn-primary ">Ubah</button></a>
                                        <a href="<?= base_url('admin/hapusrapor/') . $id . '/' . $r['nis'] . '/' . $r['id_rapor']; ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-    btnHapusRapor " href="<?= base_url('admin/hapusrapor/') . $id . '/' . $r['nis'] . '/' . $r['id_rapor']; ?>">Hapus</button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="muridModal" tabindex="-1" role="dialog" aria-labelledby="muridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="muridModalLabel">Tambah Murid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body murid-body">
                <form action="<?= base_url('admin/murid'); ?>" method="post">
                    <input type="hidden" class="form-control" name="email_lama" id="email">

                    <div class="form-group formnis">
                        <label for="nis">NIS</label>
                        <input type="number" class="form-control" name="nis" id="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                            <option value="">---Pilih Jurusan----</option>
                            <?php foreach ($jurusan as $j) { ?>
                                <option value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control" required>
                            <option value="">---Pilih Kelas----</option>
                            <?php foreach ($kelas as $k) { ?>
                                <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" name="image" id="image" required>
                    </div>
            </div>
            <div class="modal-footer murid-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>