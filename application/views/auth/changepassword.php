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
                                <h1 class="h4 text-gray-900 mb-1">Reset Password</h1>
                                <h5 class="mb-4"><?= $email; ?></h5>
                            </div>
                            <?= $this->session->flashdata('message'); ?>

                            <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                                <div class="form-group">
                                    <input type="password" name="password1" class="form-control" id="password1" placeholder="Enter New Password..." autofocus>
                                    <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="password2" class="form-control" id="password2" placeholder="Repeat Password">
                                    <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Back to login?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>