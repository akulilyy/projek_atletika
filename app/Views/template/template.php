<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .sb-sidenav .nav-link:hover {
            color: pink !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #f6daec;">
        <a class="navbar-brand ps-3" href="dashboard.php">
            <img src="<?= base_url(); ?>images/logoAtletika.png" alt="Atletika Skincare" style="height: 50px;">
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" style="color: #912D3A;" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw" style="color: #333;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" style="color: #333;" href="<?= base_url(); ?>login">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container" id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #df91af;" id="sidenavAccordion">
                <div class="sb-sidenav-menu" style="scrollbar-width: none">
                    <div class="nav mb-4">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="<?= base_url(); ?>dashboard/dashboard" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: white;"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>user" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            User
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>dokter" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Data Dokter
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>jadwaldokter" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Jadwal Dokter
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>pelanggan" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Data Pelanggan
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>supplier" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Data Supplier
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>produk" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Data Produk
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>treatment" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Data Treatment
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns" style="color: white;"></i></div>
                            Penjualan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: white;"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url(); ?>penjualanproduk" style="color: white;">Penjualan Produk</a>
                                <a class="nav-link" href="<?= base_url(); ?>penjualantreatment" style="color: white;">Penjualan Treatment</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?= base_url(); ?>laporanpenjualan" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Laporan Penjualan
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <?= $this->renderSection('isi') ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>

</html>