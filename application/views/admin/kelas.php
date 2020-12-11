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
                    <form action="<?= base_url('admin/kelas') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Cari Kelas..." autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <a href="<?= base_url('admin/hapuspencarian') ?>"><button class="btn btn-primary mb-4">Reset Pencarian</button></a>

                </div>
            </div>
            <div class="row">
                <div class="col-lg">

                    <?= $this->session->userdata('message'); ?>

                    <button class="btn btn-success mb-4 tambahKelas" data-toggle="modal" data-target="#kelasModal">Tambah Kelas</button>
                    <?php if (empty($this->session->userdata('keyword'))) { ?>
                        <?= form_error('nama_kelas', '<small class="alert alert-danger">', '</small>'); ?>
                        <?= form_error('id_jurusan', '<small class="alert alert-danger">', '</small>'); ?>
                    <?php } ?>

                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($kelas)) { ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger" role="alert">
                                            Data Yang Dicari Tidak Ditemukan !!
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                            <?php
                            foreach ($kelas as $k) { ?>
                                <tr>
                                    <th class="scope"><?= ++$start; ?></th>
                                    <td><?= $k['nama_jurusan']; ?></td>
                                    <td><?= $k['nama_kelas']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm ubahKelas" data-toggle="modal" data-target="#kelasModal" data-id="<?= $k['id_kelas']; ?>">Ubah</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger ml-2 hapusKelas" href="<?= base_url('admin/hapuskelas/') . $k['id_kelas']; ?>">Hapus</button></a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>

                    <?= $this->pagination->create_links(); ?>


                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="kelasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kelasModalLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body kelas-body">
                <form action="<?= base_url('admin/kelas'); ?>" method="post">
                    <input type="hidden" name="id_kelas" id="id_kelas" required>

                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Contoh : X-IPA-1" required>
                    </div>
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                            <option value="">---Pilih Jurusan----</option>
                            <option value="1">IPA</option>
                            <option value="2">IPS</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer kelas-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>