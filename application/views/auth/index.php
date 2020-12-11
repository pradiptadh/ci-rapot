<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-12 col-md-9 pt-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-1">E-Rapor V.1.2</h1>
                                <h5 class="h4 text-gray-900 mb-3"><?= $sekolah[0]['nama_sekolah']; ?></h5>
                                <p class="login-box-msg">Selamat Datang, Silakan Login</p>

                                <?= $this->session->flashdata('message'); ?>


                            </div>
                            <form action="<?= base_url('auth'); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
                                    <?= form_error('email', '<small class="text text-danger">', '</small>'); ?> </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <?= form_error('password', '<small class="text text-danger">', '</small>'); ?> </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Masuk
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>