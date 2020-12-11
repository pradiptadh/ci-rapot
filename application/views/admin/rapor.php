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

            <h5>Pilih Kelas</h5>

            <?php
            $query = "SELECT * FROM kelas JOIN jurusan ON jurusan.id_jurusan = kelas.id_jurusan";
            $kelas = $this->db->query($query)->result_array();
            ?>


            <!-- Content Row -->
            <div class="row">
                <div class="col-lg">

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
                            $i = 1;
                            foreach ($kelas as $k) { ?>
                                <tr>
                                    <th class="scope"><?= $i; ?></th>
                                    <td><?= $k['nama_jurusan']; ?></td>
                                    <td><?= $k['nama_kelas']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/rapor/') . $k['id_kelas']; ?>"><button class="btn btn-warning btn-sm ubahKelas">Lihat</button></a>

                                    </td>
                                </tr>
                            <?php
                                $i++;
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->