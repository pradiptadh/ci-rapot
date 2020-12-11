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
                    <form action="<?= base_url('admin/mapel') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Cari Mata Pelajaran..." autocomplete="off" autofocus>
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

                    <button class="btn btn-success mb-4 tambahMapel" data-toggle="modal" data-target="#mapelModel">Tambah Mapel</button>

                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Nama Mapel</th>
                                <th scope="col">KKM</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($mapel)) { ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger" role="alert">
                                            Data Yang Dicari Tidak Ditemukan !!
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>


                            <?php
                            foreach ($mapel as $m) { ?>
                                <tr>

                                    <th class="scope"><?= ++$start; ?></th>
                                    <td><?= $m['nama_jurusan']; ?></td>
                                    <td><?= $m['nama_mapel']; ?></td>
                                    <td><?= $m['kkm']; ?></td>
                                    <td>
                                        <button class="badge badge-success  ubahMapel" data-toggle="modal" data-target="#mapelModel" data-id="<?= $m['id_mapel']; ?>">Ubah</button>
                                    
                                        <a href="<?= base_url('admin/hapusmapel/') . $m['id_mapel']; ?>"><button class="badge badge-danger ml-2 hapusMapel" href="<?= base_url('admin/hapusmapel/') . $m['id_mapel']; ?>">Hapus</button></a>
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
<div class="modal fade" id="mapelModel" tabindex="-1" role="dialog" aria-labelledby="mapelModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapelModelLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mapel-body">
                <form action="<?= base_url('admin/mapel'); ?>" method="post">
                    <input type="hidden" name="id_mapel" id="id_mapel">

                    <div class="form-group">
                        <label for="nama_mapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" required>
                    </div>
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                            <option value="">---Pilih Jurusan----</option>
                            <option value="1">IPA</option>
                            <option value="2">IPS</option>
                            <option value="3">Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kkm">KKM</label>
                        <input type="number" min="0" max="100" class="form-control" name="kkm" id="kkm" required>
                    </div>
            </div>
            <div class="modal-footer mapel-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>