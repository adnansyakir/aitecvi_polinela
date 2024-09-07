<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($menu) ? $menu : 'AITECVI-POLINELA') ?> <?= (isset($detail) ? $detail : '') ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/templates/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/templates/assets/vendors/simple-datatables/style.css">

    <link href="/assets/datatable/DataTables-1.13.5/css/dataTables.bootstrap5.css" rel="stylesheet" />
    <link href="/assets/datatable/Responsive-2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="/templates/assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="/templates/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/templates/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/templates/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/img/L2.png" type="image/x-icon">
    <link rel="stylesheet" href="/templates/assets/vendors/toastify/toastify.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .table-container {
            width: 100%;
            overflow-x: auto;
            /* Mengaktifkan scrollbar horizontal jika diperlukan */
        }

        .sidebar-item.has-sub .sidebar-link {
            font-size: 15px;

            /* Samakan dengan ukuran teks lain */
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="">
                                <img src="/landing/assets/images/L3.png" width="100px" height="100px" alt="AITeCVI logo" />
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <?php if (session()->get('role') == 'Admin') : ?>
                    <?php echo view('layout/sidebar_admin') ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'Juri') : ?>
                    <?php echo view('layout/sidebar_juri') ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'Pendamping') : ?>
                    <?php echo view('layout/sidebar_pendamping') ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'Kampus') : ?>
                    <?php echo view('layout/sidebar_kampus') ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'Koordinator') : ?>
                    <?php echo view('layout/sidebar_koordinator') ?>
                <?php endif; ?>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                                <!-- <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Hello</h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= session()->get('role') ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/templates/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">

                                    <li><a class="dropdown-item" href="user"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>

                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/auth/logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3><?= (isset($detail) ? $detail : '') ?></h3>
                                <p class="text-subtitle text-muted"><?= (isset($deskripsi) ? $deskripsi : '') ?></p>
                            </div>

                        </div>
                    </div>
                    <section class="section">
                        <?= $this->renderSection('content') ?>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p><?= date('Y'); ?> &copy; Aitec VI <a href="polinela">Politeknik Negeri Lampung</a></p>
                        </div>
                        <div class="float-end">

                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/datatable/DataTables-1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="/assets/datatable/DataTables-1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/datatable/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="/assets/datatable/Responsive-2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script src="/templates/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/templates/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/templates/assets/js/main.js"></script>
    <script src="/templates/assets/js/delete.js"></script>


    <script src="/templates/assets/js/extensions/sweetalert2.js"></script>
    <script src="/templates/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>


    <script src="/templates/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="/templates/assets/vendors/toastify/toastify.js"></script>
    <script src="/templates/assets/js/extensions/toastify.js"></script>
    <script>
        <?php if (session()->getFlashData('warning')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('warning') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#FFA07A",
            }).showToast();
        <?php endif; ?>
        <?php if (session()->getFlashData('success')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('success') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#228B22",
            }).showToast();
        <?php endif; ?>
        <?php if (session()->getFlashData('danger')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('danger') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "red",
            }).showToast();
        <?php endif; ?>
        <?php if (session()->getFlashData('info')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('info') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#6495ED",
            }).showToast();
        <?php endif; ?>
        <?php if (session()->getFlashData('primary')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('primary') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#7B68EE",
            }).showToast();
        <?php endif; ?>
        <?php if (session()->getFlashData('error')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('error') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#FF6347",
            }).showToast();
        <?php endif; ?>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Konfigurasi untuk Tabel dan Tabel 2
            $('#table, #table2').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    searchPlaceholder: "Masukkan kata kunci",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(disaring dari total _MAX_ entri)",
                    zeroRecords: "Tidak ada data yang cocok",
                }
            });
        });
    </script>