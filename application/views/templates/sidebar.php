<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php
    if ($this->session->userdata('role') == 1) {
        $link = 'admin';
    } else {
        $link = 'user';
    }
    ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($link); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Rapor <sup>2</sup></div>

    </a>

    <div class="text-center text-white"><?= $sekolah[0]['nama_sekolah']; ?></div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    $query = "SELECT user_menu.menu, user_menu.menu_id FROM user_menu,user_access_menu WHERE user_access_menu.role_id = " . $user['role_id'] . " AND user_menu.menu_id = user_access_menu.menu_id AND NOT user_menu.menu_id = 3";

    $menu = $this->db->query($query)->result_array();

    ?>


    <!-- Divider -->

    <hr class="sidebar-divider">

    <!-- Heading -->
    <?php foreach ($menu as $m) { ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <?php
            $quer = "SELECT * FROM user_sub_menu WHERE menu_id =" . $m['menu_id'];
            $sub = $this->db->query($quer)->result_array();
            foreach ($sub as $s) { ?>

            <?php if ($title == $s['title']) { ?>

                <li class="nav-item active">
                <?php } else { ?>
                <li class="nav-item">
                <?php } ?>

                <a class="nav-link pb-2" href="<?= base_url() . $s['url']; ?>">
                    <i class="<?= $s['icon']; ?>"></i>
                    <span><?= $s['title']; ?></span></a>
                </li>
            <?php } ?>
            <hr class="sidebar-divider">

        <?php } ?>



        <!-- Nav Item - Pages Collapse Menu -->


        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->