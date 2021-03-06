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
            <div class="row ml-3">

                <div class="card mb-5" style="min-width: 640px; margin:auto;">

                    <h5 class="card-header"><?= $account['nama']; ?> </h5>
                    <div class="card-body text-center">
                        <?php if ($this->session->userdata('role') == 2) { ?>
                            <img src="<?= base_url('assets/img/profile/walikelas/') . $account['image']; ?>" class="img-thumbnail mb-3" alt="..." width="100" height="100">
                        <?php } else { ?>
                            <img src="<?= base_url('assets/img/profile/') . $account['image']; ?>" class="img-thumbnail mb-3" alt="..." width="100" height="100">
                        <?php } ?>

                        <h5 class="card-title"><?= $account['email']; ?></h5>
                        <?php if (isset($account['nip'])) { ?>
                            <p class="card-text"> NIP : <?= $account['nip']; ?></p>
                        <?php } ?>
                        <p class="card-texts"> Alamat : <?= $account['alamat']; ?></p>
                        <?php if (isset($account['nama_jurusan'])) { ?>
                            <p class="card-text"> Jurusan : <?= $account['nama_jurusan']; ?></p>
                        <?php } ?>
                        <p class="card-text"> Kelas : <?= $account['nama_kelas']; ?></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->