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
                    <form action="<?= base_url('admin/walikelas') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Cari Wali Kelas..." autocomplete="off" autofocus>
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

                    <button class="btn btn-success mb-4 tambahWalikelas" data-toggle="modal" data-target="#walikelasModal">Tambah Wali Kelas</button>
                    <div class="col-lg mb-4">
                        <?php if (empty($this->session->userdata('keyword'))) { ?>
                            <?= form_error('nip', '<small class="alert alert-danger">', '</small>'); ?>
                            <?= form_error('email', '<small class="alert alert-danger">', '</small>'); ?>
                            <?= form_error('no_hp', '<small class="alert alert-danger">', '</small>'); ?>
                        <?php } ?>
                    </div>
                    <table class="table table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Image</th>
                                <th scope="col" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($walikelas)) { ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="alert alert-danger alert" role="alert">
                                            Data Yang Dicari Tidak Ditemukan !!
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                            <?php
                            foreach ($walikelas as $m) { ?>
                                <tr>
                                    <th class="scope"><?= ++$start; ?></th>
                                    <td><?= $m['nip']; ?></td>
                                    <td><?= $m['email']; ?></td>
                                    <td><?= $m['nama']; ?></td>
                                    <td><?= $m['alamat']; ?></td>
                                    <td><?= $m['no_hp']; ?></td>
                                    <td><?= $m['nama_kelas']; ?></td>
                                    <td><img src="<?= base_url('assets/img/profile/walikelas/') . $m['image']; ?>" class="img-thumbnail" width="80" height="80"></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm ubahWalikelas" data-toggle="modal" data-target="#walikelasModal" data-nip="<?= $m['nip']; ?>">Ubah</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger hapusWalikelas" href="<?= base_url('admin/hapuswalikelas/') . $m['nip']; ?>/<?= urlencode($m['email']); ?>">Hapus</button></a>
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
<div class="modal fade" id="walikelasModal" tabindex="-1" role="dialog" aria-labelledby="walikelasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="walikelasModalLabel">Tambah Wali Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body walikelas-body">
                <?= form_open_multipart('admin/walikelas'); ?>
                <!-- <form action="<?= base_url('admin/murid'); ?>" method="post"> -->
                <input type="hidden" class="form-control" name="email_lama" id="email">

                <div class="form-group formnip">
                    <label for="nip">NIP</label>
                    <input type="number" class="form-control" name="nip" id="nip" required>
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
                    <label for="no_hp">No Hp</label>
                    <input type="number" class="form-control" name="no_hp" id="no_hp" required>
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
                    <label for="id_kelas">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <small>*Minimal Image 2 MB Dan Berformat : JPG atau PNG</small>
                </div>
            </div>
            <div class="modal-footer walikelas-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>