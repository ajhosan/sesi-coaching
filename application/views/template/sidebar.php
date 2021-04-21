<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="nav" style="background-color: #2043E5;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-building"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Sesi Coaching</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <?php if ($user['id_role'] == 1) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('coaches/home/index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Goals & Action Plan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fab fa-wpforms"></i>
                    <span>Form Coaching</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('coaches/user/changePassword') ?>">
                    <i class="fas fa-key"></i>
                    <span>Ganti Password</span></a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('coach/coachcontroller/index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Coach</span></a>
            </li>
        <?php endif; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading
        <div class="sidebar-heading">
            Profil
        </div>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-id-card"></i>
                <span>Edit Profil</span></a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>" style="color: red;">
                <i class="fas fa-sign-out-alt fa-sm fa-fw" style="color: red;"></i>
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