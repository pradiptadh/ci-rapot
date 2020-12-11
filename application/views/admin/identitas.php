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

                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <?= $this->session->userdata('message'); ?>

                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Sekolah</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sekolah as $i) { ?>
                                <tr>
                                    <th class="scope"><?= $i['id']; ?></th>
                                    <td><?= $i['nama_sekolah']; ?></td>
                                    <td><?= $i['alamat_sekolah']; ?></td>
                                    <td><?= $i['email_sekolah']; ?></td>
                                    <td><?= $i['telepon_sekolah']; ?></td>
                                    <td><?= $i['tahun_ajaran']; ?></td>
                                    <td><?= $i['semester']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm ubahSekolah" data-toggle="modal" data-target="#identitasModel" data-id="<?= $i['id']; ?>">Ubah</button>
                                    </td>
                                </tr>
                            <?php } ?>
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
<div class="modal fade" id="identitasModel" tabindex="-1" role="dialog" aria-labelledby="identitasModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="identitasModelLabel">Ubah Identitas Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body identitas_model">
                <form action="<?= base_url('admin/identitas'); ?>" method="post">
                    <input type="hidden" name="id_sekolah" id="id_sekolah">

                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                        <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" required>
                    </div>
                    <div class="form-group">
                        <label for="email_sekolah">Email Sekolah</label>
                        <input type="text" class="form-control" name="email_sekolah" id="email_sekolah" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon_sekolah">Telepon Sekolah</label>
                        <input type="text" class="form-control" name="telepon_sekolah" id="telepon_sekolah" placeholder="Example : (0253)11111" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" required>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="number" class="form-control" name="semester" id="semester" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>