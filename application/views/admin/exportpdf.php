<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table,
        td,
        th {
            border: 1px solid black;
            height: 20px;

        }

        table {
            border-collapse: collapse;
            width: 90%;
        }

        th {
            text-align: center;
        }

        .tb {
            text-align: left;
        }

        .rap {
            text-align: center
        }
    </style>
</head>

<body>

    <h3 class="rap">E-Rapor</h3>
    <br>
    <br>

    <table align="center" border="1">
        <tr>
            <th class="tb">Nama Sekolah</th>
            <td><?= $sekolah[0]['nama_sekolah']; ?></td>
        </tr>
        <tr>
            <th class="tb">Alamat Sekolah</th>
            <td><?= $sekolah[0]['alamat_sekolah']; ?></td>
        </tr>
        <tr>
            <th class="tb">Tahun Ajaran</th>
            <td><?= $sekolah[0]['tahun_ajaran']; ?></td>
        </tr>
        <tr>
            <th class="tb">Semester</th>
            <td><?= $sekolah[0]['semester']; ?></td>
        </tr>
        <tr>
            <th class="tb">Kelas</th>
            <td><?= $rapor['nama_kelas']; ?></td>
        </tr>
        <tr>
            <th class="tb">Nama</th>
            <td><?= $rapor['nama']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table align="center" border="1">
        <thead>
            <tr>
                <th rowspan="2" class="text-center pb-3">NO</th>
                <th rowspan="2" class="text-center pb-3">Nama Mapel</th>
                <th colspan="2" class="text-center">Nilai</th>
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
                <td class="rap"><?= $n['angka']; ?></td>

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
                <td class="rap"><?= $predikat; ?></td>
            </tr>
        <?php
            $i++;
        } ?>
    </table>
    <br>
    <br>
    <table align="center" border="1">
        <tr>
            <th class="rap" colspan="2">Kegiatan Ekstrakulikuler Dan Kepribadian</th>
            <th class="rap">Nilai</th>
        </tr>
        <tr>
            <th>Kegiatan Ekstrakulikuler</th>
            <td><?= $rapor['ekskul']; ?></td>
            <td class="rap"><?= $rapor['nilai_ekskul']; ?></td>
        </tr>
        <tr>
            <th rowspan="5" class="pt-5">Kepribadian</th>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>1. Ahlak</td>
            <td class="rap"><?= $rapor['ahlak']; ?></td>
        </tr>
        <tr>
            <td>2. Kedisiplinan</td>
            <td class="rap"><?= $rapor['kedisiplinan']; ?></td>
        </tr>
        <tr>
            <td>3. Kerajinan</td>
            <td class="rap"><?= $rapor['kerajinan']; ?></td>
        </tr>
        <tr>
            <td>4. Kebersihan</td>
            <td class="rap"><?= $rapor['kebersihan']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table align="center" border="1">
        <tr>
            <th class="text-center">Kehadiran</th>
            <th class="text-center">Jumlah</th>
        </tr>
        <tr>
            <td>1. Sakit</td>
            <td class="rap"><?= $rapor['sakit']; ?></td>
        </tr>
        <tr>
            <td>2. Izin</td>
            <td class="rap"><?= $rapor['izin']; ?></td>
        </tr>
        <tr>
            <td>3. Alfa</td>
            <td class="rap"><?= $rapor['alfa']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table align="center" border="1">
        <tr>
            <th class="rap">Wali Kelas</th>
            <th class="rap">Orang Tua/Wali Murid</th>
        </tr>

        <tr>
            <td class="rap">
                <br>
                <br>
                ..............................................<br>
                ( <?= $walikelas['nama'] ?> )
                <br>
                NIP.<?= $walikelas['nip'] ?>
            </td>
            <td class="rap">
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