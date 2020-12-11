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
                <div class="col-lg-7">
                    <?= $this->session->userdata('message'); ?>
                </div>
            </div>
            <div class="row ml-3">


                <div class="col-lg-7">
                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                        <div class="form-group row">
                            <label for="current" class="col-sm-4 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="current" name="current">
                                <?= form_error('current', '<small class="text text-danger">', '</small>'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password1" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password1" name="password1">
                                <?= form_error('password1', '<small class="text text-danger">', '</small>'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password2" class="col-sm-4 col-form-label">Repeat Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password2" name="password2">
                                <?= form_error('password2', '<small class="text text-danger">', '</small>'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button class="btn btn-primary">Change</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->