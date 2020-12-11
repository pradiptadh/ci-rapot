<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">



            <div class="container bg-white pb-2">

                <h1 class="text-center mb-4 pt-4">E-Rapor</h1>

                <a href="<?= base_url('admin/pdf/') . $id . '/' . $nis; ?>" target="_blank"><button class="btn btn-dark mb-4">Export Rapor</button></a>

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
                            <th rowspan="3" class="text-center pb-3">NO</th>
                            <th rowspan="3" class="text-center pb-3">Nama Mapel</th>
                            <th colspan="4" class="text-center">Nilai</th>
                            <th rowspan="2" class="text-center">Nilai</th>
                        </tr>
                        <tr>
                            <!-- <th class="text-center">KKM</!--> -->
                            <th rowspan="3" class="text-center">Angka</th>
                            <th rowspan="3"class="text-center">Predikat</th>
                            <th rowspan="3"class="text-center">abcd</th>
                            <th rowspan="3"class="text-center">abcd</th>

                        </tr>


                    </thead>

                    
                </table>

                <table class="table table-bordered table-sm mb-4">
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

                <table class="table table-bordered table-sm mb-4">
                    <tr>
                        <th>Kehadiran</th>
                        <th>Angka</th>
                    </tr>
                    <tr>
                        <td>1. Sakit</td>
                        <td class="text-center"><?= $rapor['sakit']; ?></td>
                    </tr>
                    <tr>
                        <td>2. Izin</td>
                        <td class="text-center"><?= $rapor['izin']; ?></td>
                    </tr>
                    <tr>
                        <td>3. Alfa</td>
                        <td class="text-center"><?= $rapor['alfa']; ?></td>
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
                            ( <?= $walikelas['nama']; ?> )
                            <br>
                            NIP. <?= $walikelas['nip']; ?>


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