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
                <div class="col-lg-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($role as $s) { ?>
                                <tr>
                                    <th class="scope"><?= $i; ?></th>
                                    <td><?= $s['role']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/accessrole/') . $s['role_id']; ?>"><button class="btn btn-warning btn-sm">Access</button></a>
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