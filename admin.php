<?php
session_start();
if ($_SESSION['username'] == "") :
    header("Location:login.php");
else :
    require "config/function.php";
    require "config/conn.php";
    session_timeout();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Pemesanan Tiket Wisata | Ujian JWD VSGA Eka Saputra</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">JWD_VSGA</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <?php
    if (isset($_GET['data-wisata'])) {
        $wisata = true;
        $view = 'admin/wisata.php';
    } elseif (isset($_GET['data-wisata-galeri'])) {
        $galeri = true;
        $view = 'admin/galeri.php';
    } elseif (isset($_GET['data-service'])) {
        $service = true;
        $view = 'admin/service.php';
    } elseif (isset($_GET['data-about'])) {
        $about = true;
        $view = 'admin/about.php';
    } elseif (isset($_GET['data-team'])) {
        $team = true;
        $view = 'admin/team.php';
    } else {
        $home = true;
        $view = 'admin/home.php';
    } ?>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= isset($home)?'active':'';?>" aria-current="page" href="?home">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isset($wisata)?'active':'';?>" href="?data-wisata">
                                <span data-feather="file"></span>
                                Tempat Wisata
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isset($galeri)?'active':'';?>" href="?data-wisata-galeri">
                                <span data-feather="folder"></span>
                                Wisata Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isset($service)?'active':'';?>" href="?data-service">
                                <span data-feather="grid"></span>
                                Layanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isset($about)?'active':'';?>" href="?data-about">
                                <span data-feather="layout"></span>
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isset($team)?'active':'';?>" href="?data-team">
                                <span data-feather="file"></span>
                                Team
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <span data-feather="log-out"></span>
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <?php include($view) ?>

            </main>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="assets/vendor/jquery-mask/jquery-mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    $(document).ready(function() {
        feather.replace({
            'aria-hidden': 'true'
        })
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
        });
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });
        $('.angka').mask('000000000000000', {
            reverse: true
        });
    });

    $(document).ready(function() {
        $('.table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
            // Fetch data from PHP
            const wisata = <?= count_table('wisata'); ?>;
            const services = <?= count_table('services'); ?>;
            const about = <?= count_table('about'); ?>;
            const team = <?= count_table('team'); ?>;

            const ctx = document.getElementById('myChart').getContext('2d');
            Chart.defaults.font.size = 15;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Tempat Wisata', 'Layanan', 'About', 'Team'],
                    datasets: [{
                        label: 'Jumlah Statistik',
                        data: [wisata, services, about, team],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)'
                        ],
                        hoverOffset: 4
                    }]
                },
            });
        });
    </script>
</body>

</html>
<?php 
endif;
?>