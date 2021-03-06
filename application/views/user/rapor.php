<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">



            <div class="container bg-white pb-2">

                <h1 class="text-center mb-4 pt-4">E-Rapor</h1>

                <a href="<?= base_url('user/pdf/') . $id . '/' . $nis; ?>" target="_blank"><button class="btn btn-dark mb-4">Export Rapor</button></a>

                <table class="table table-bordered table-sm mb-4">
                    <tr>
                        <th>Nama Sekolah</th>
                        <td><?= $sekolah[0]['nama_sekolah']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Sekolah</th>
                        <td><?= $sekolah[0]['alamat_sekolah']; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <td><?= $sekolah[0]['tahun_ajaran']; ?></td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td><?= $sekolah[0]['semester']; ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td><?= $rapor['nama_kelas']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $rapor['nama']; ?></td>
                    </tr>
                </table>

                <table class="table table-bordered table-sm mb-4">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center pb-3">NO</th>
                            <th rowspan="2" class="text-center pb-3">Nama Mapel</th>
                            <th colspan="3" class="text-center">Nilai</th>
                        </tr>
                        <tr>
                            <th class="text-center">Angka</th>
                            <th class="text-center">Predikat</th>
                        </tr>
                    </thead>

                    <?php
                    // var_dump($nilai);
                    $i = 1;
                    foreach ($nilai as $n) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $n['mapel']; ?></td>
                            <td class="text-center"><?= $n['angka']; ?></td>

                            <?php if ($n['angka'] >= 90) {
                                    $predikat = 'A';
                                } else if ($n['angka'] >= 80) {
                                    $predikat = 'B';
                                } else if ($n['angka'] >= 70) {
                                    $predikat = 'C';
                                } else if ($n['angka'] >= 60) {
                                    $predikat = 'D';
                                } else {
                                    $predikat = 'E';
                                }  ?>
                            <td class="text-center"><?= $predikat; ?></td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                </table>

                <table class="table table-bordered table-sm">
                    <tr>
                        <th class="text-center" colspan="2">Kegiatan Ekstrakulikuler Dan Kepribadian</th>
                        <th class="text-center">Nilai</th>
                    </tr>
                    <tr>
                        <th>Kegiatan Ekstrakulikuler</th>
                        <td><?= $rapor['ekskul']; ?></td>
                        <td class="text-center"><?= $rapor['nilai_ekskul']; ?></td>
                    </tr>
                    <tr>
                        <th rowspan="5" class="pt-5">Kepribadian</th>
                    </tr>
                    <tr>
                        <td>1. Ahlak</td>
                        <td class="text-center"><?= $rapor['ahlak']; ?></td>
                    </tr>
                    <tr>
                        <td>2. Kedisiplinan</td>
                        <td class="text-center"><?= $rapor['kedisiplinan']; ?></td>
                    </tr>
                    <tr>
                        <td>3. Kerajinan</td>
                        <td class="text-center"><?= $rapor['kerajinan']; ?></td>
                    </tr>
                    <tr>
                        <td>4. Kebersihan</td>
                        <td class="text-center"><?= $rapor['kebersihan']; ?></td>
                    </tr>
                </table>

                <table class="table table-bordered table-sm ">
                    <tr>
                        <th class="text-center">Wali Kelas</th>
                        <th class="text-center">Orang Tua/Wali Murid</th>
                    </tr>

                    <tr>
                        <td class="text-center p-3">
                            <br>
                            <br>
                            ..............................................<br>
                            (Wali Kelas)
                        </td>
                        <td class="text-center p-3">
                            <br>
                            <br>
                            ..............................................<br>
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </td>
                    </tr>
                </table>


            </div>





        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->