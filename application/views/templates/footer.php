<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Rapor <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


<script src="<?= base_url('assets/'); ?>js/dist/sweetalert2.all.min.js"></script>

<script>
    $('.boxaccess').on('click', function() {
        const role_id = $(this).data('role');
        const menu_id = $(this).data('id');

        $.ajax({
            url: '<?= base_url('admin/changeaccess'); ?>',
            method: 'post',
            data: {
                role_id: role_id,
                menu_id: menu_id
            },
            success: function() {
                document.location.href = '<?= base_url('admin/accessrole/') ?>' + role_id;
            }

        });

    });

    $('.ubahSekolah').on('click', function() {

        const id = $(this).data('id');

        $.ajax({
            url: '<?= base_url('admin/getUbahSekolah'); ?>',
            data: {
                id: id
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {

                $('.identitas_model #id_sekolah').val(id);
                $('.identitas_model #nama_sekolah').val(data.nama_sekolah);
                $('.identitas_model #alamat_sekolah').val(data.alamat_sekolah);
                $('.identitas_model #email_sekolah').val(data.email_sekolah);
                $('.identitas_model #telepon_sekolah').val(data.telepon_sekolah);
                $('.identitas_model #tahun_ajaran').val(data.tahun_ajaran);
                $('.identitas_model #semester').val(data.semester);
            }
        });
    });

    $('.tambahMapel').on('click', function() {

        const id = $(this).data('id');

        $('#mapelModelLabel').html('Tambah Mata pelajaran');
        $('.mapel-footer button[type=submit]').html('Tambahkan');
        $('.mapel-body form').attr('action', '<?= base_url('admin/mapel'); ?>');

        $('.mapel-body #id_mapel').val('');
        $('.mapel-body #nama_mapel').val('');
        $('.mapel-body #id_jurusan').val('');

    });

    $('.ubahMapel').on('click', function() {

        const id = $(this).data('id');

        $('#mapelModelLabel').html('Ubah Mata pelajaran');
        $('.mapel-footer button[type=submit]').html('Simpan');
        $('.mapel-body form').attr('action', '<?= base_url('admin/ubahMapel'); ?>');

        $.ajax({
            url: '<?= base_url('admin/getMapel'); ?>',
            method: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('.mapel-body #id_mapel').val(id);
                $('.mapel-body #nama_mapel').val(data.nama_mapel);
                $('.mapel-body #id_jurusan').val(data.id_jurusan);
                $('.mapel-body #kkm').val(data.kkm);
            }
        });
    });

    $('.hapusMapel').on('click', function(e) {

        e.preventDefault();

        const href = $(this).attr('href');


        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Mapel Ini Akan Dihapus  !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {

                document.location.href = href;

            }
        });
    });

    $('.tambahKelas').on('click', function() {

        const id = $(this).data('id');

        $('#kelasModalLabel').html('Tambah Kelas');
        $('.kelas-footer button[type=submit]').html('Tambahkan');
        $('.kelas-body form').attr('action', '<?= base_url('admin/kelas'); ?>');

        $('.kelas-body #id_mapel').val('');
        $('.kelas-body #nama_kelas').val('');
        $('.kelas-body #id_jurusan').val('');

    });


    $('.ubahKelas').on('click', function() {

        const id = $(this).data('id');

        $('#kelasModalLabel').html('Ubah Kelas');
        $('.kelas-footer button[type=submit]').html('Simpan');
        $('.kelas-body form').attr('action', '<?= base_url('admin/ubahKelas'); ?>');

        $.ajax({
            url: '<?= base_url('admin/getKelas'); ?>',
            method: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {

                $('.kelas-body #id_kelas').val(id);
                $('.kelas-body #nama_kelas').val(data.nama_kelas);
                $('.kelas-body #id_jurusan').val(data.id_jurusan);
            }
        });
    });

    $('.hapusKelas').on('click', function(e) {

        e.preventDefault();

        const href = $(this).attr('href');


        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Kelas Ini Akan Dihapus  !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {

                document.location.href = href;

            }
        });
    });

    $('.hapusmurid').on('click', function(e) {

        e.preventDefault();

        const href = $(this).attr('href');


        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Murid Ini Akan Dihapus  !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {

                document.location.href = href;

            }
        });
    });

    $('.tambahMurid').on('click', function() {
        const nis = $(this).data('nis');

        $('#muridModalLabel').html('Tambah Murid');
        $('.murid-footer button[type=submit]').html('Tambahkan');
        $('.murid-body form').attr('action', '<?= base_url('admin/murid'); ?>');
        $('.murid-body #nis').removeAttr('readonly', '');

        $('.murid-body #nis').val('');
        $('.murid-body #email').val('');
        $('.murid-body #nama').val('');
        $('.murid-body #alamat').val('');
        $('.murid-body #id_jurusan').val('');
        $('.murid-body #id_kelas').val('');
        $('.murid-body #image').val('');

    });

    $('.ubahMurid').on('click', function() {
        const nis = $(this).data('nis');

        $('#muridModalLabel').html('Ubah Murid');
        $('.murid-footer button[type=submit]').html('Simpan');
        $('.murid-body form').attr('action', '<?= base_url('admin/ubahMurid'); ?>');
        $('.murid-body #nis').attr('readonly', '');

        $.ajax({
            url: '<?= base_url('admin/getMurid'); ?>',
            method: 'post',
            data: {
                nis: nis
            },
            dataType: 'json',
            success: function(data) {
                $('.murid-body #nis').val(nis);
                $('.murid-body #email').val(data.email);
                $('.murid-body #nama').val(data.nama);
                $('.murid-body #alamat').val(data.alamat);
                $('.murid-body #id_jurusan').val(data.id_jurusan);
                $('.murid-body #id_kelas').val(data.id_kelas);
                $('.murid-body #image').val(data.image);
            }
        });
    });

    $('.custom-file input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    $('.btnHapusRapor').on('click', function(e) {

        e.preventDefault();

        const href = $(this).attr('href');


        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Rapor Ini Akan Dihapus  !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {

                document.location.href = href;

            }
        });
    });

    $('.tambahWalikelas').on('click', function() {
        const nip = $(this).data('nip');

        $('#walikelasModalLabel').html('Tambah Wali Kelas');
        $('.walikelas-footer button[type=submit]').html('Tambahkan');
        $('.walikelas-body form').attr('action', '<?= base_url('admin/walikelas'); ?>');
        $('.walikelas-body #nip').removeAttr('readonly', '');

        $('.walikelas-body #nip').val('');
        $('.walikelas-body #email').val('');
        $('.walikelas-body #nama').val('');
        $('.walikelas-body #alamat').val('');
        $('.walikelas-body #no_hp').val('');
        $('.walikelas-body #id_kelas').val('');
        $('.walikelas-body #image').val('');
    });

    $('.ubahWalikelas').on('click', function() {
        const nip = $(this).data('nip');

        $('#walikelasModalLabel').html('Ubah Walikelas');
        $('.walikelas-footer button[type=submit]').html('Simpan');
        $('.walikelas-body form').attr('action', '<?= base_url('admin/ubahWalikelas'); ?>');
        $('.walikelas-body #nip').attr('readonly', '');

        $.ajax({
            url: '<?= base_url('admin/getWalikelas'); ?>',
            method: 'post',
            data: {
                nip: nip
            },
            dataType: 'json',
            success: function(data) {
                $('.walikelas-body #nip').val(nip);
                $('.walikelas-body #email').val(data.email);
                $('.walikelas-body #nama').val(data.nama);
                $('.walikelas-body #alamat').val(data.alamat);
                $('.walikelas-body #no_hp').val(data.no_hp);
                $('.walikelas-body #id_kelas').val(data.id_kelas);
                $('.walikelas-body #image').val(data.image);
            }
        });
    });

    $('.hapusWalikelas').on('click', function(e) {

        e.preventDefault();

        const href = $(this).attr('href');


        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Walikelas Ini Akan Dihapus  !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {

                document.location.href = href;

            }
        });
    });
</script>



</body>

</html>