<?php 
session_start();
require "config/function.php";
require "config/conn.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap Links -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Links -->


    <!-- Google Fonts Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- Google Fonts Links -->

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
     <!-- Font Awesome Cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
     <!-- Font Awesome Cdn -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <title>Pemesanan Tiket Wisata | Ujian JWD VSGA Eka Saputra</title>
</head>

<body>
        <?php
        if (isset($_GET['daftar-harga'])) {
            $daftar_harga = true;
            $view = 'views/daftar_harga.php';
         } elseif (isset($_GET['daftar-servis'])) {
              $daftar_servis = true;
              $view = 'views/daftar_servis.php';
            } elseif (isset($_GET['detail-wisata'])) {
              $detail_wisata = true;
              $view = 'views/detail_wisata.php';
            } elseif (isset($_GET['detail-about'])) {
              $detail_about = true;
              $view = 'views/detail_about.php';
            } elseif (isset($_GET['detail-galeri'])) {
              $detail_galeri = true;
              $view = 'views/detail_galeri.php';
            } elseif (isset($_GET['detail-team'])) {
              $detail_team = true;
              $view = 'views/detail_team.php';
            } else {
                $home = true;
                $view = 'views/home.php';
            } ?>
    <!-- <navbar> -->
    <nav class="navbar navbar-expand-lg" id="navbar">
  <div class="container">
    
      <a class="navbar-brand" href="index.html" id="logo"><span id="travel">W</span>isata</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
    <span><i class="fa-solid fa-bars"></i></span>
      </button>
    <div class="collapse navbar-collapse" id="mynavbar">
        
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
        <li class="nav-item">
          <a class="nav-link <?=isset($home)?'active':'';?>" href="?home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isset($daftar_harga)?'active':'';?>" href="?daftar-harga">Daftar Harga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isset($daftar_servis)?'active':'';?>" href="?daftar-servis">Daftar Layanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isset($detal_wisata)?'active':'';?>" href="?detail-wisata">Paket Wisata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isset($detail_galeri)?'active':'';?>" href="?detail-galeri">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isset($detail_team)?'active':'';?>" href="?detail-team">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isset($detail_about)?'active':'';?>" href="?detail-about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
       </ul>
    </div>
  </div>
</nav>
<!-- <navbar> -->
<a target="_blank" href="https://api.whatsapp.com/send?phone=62xxxxxx&text=pesan-intro-anda" class="whatsapp-button"><i class="fab fa-whatsapp"></i></a>

        <?php include($view) ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap 5.0 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/vendor/jquery-mask/jquery-mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
	</script> 

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $('.uang').mask('000.000.000.000.000', {
        reverse: true
    });
    $('.angka').mask('00000000000000000000', {
        reverse: true
    });
    $('.nip').mask('0000000000000000', {
        reverse: true
    });
    $('.no_hp').mask('000000000000', {
        reverse: true
    });

    $(document).ready(function() {
        $('#hargaTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });

    $('.team-slider').owlCarousel({
	           loop: true,            
	           nav: false,
	           autoplay: true,
	           autoplayTimeout: 5000,
	           smartSpeed: 450,
	           margin: 20,
	           responsive: {
	               0: {
	                   items: 1
	               },
	               768: {
	                   items: 2
	               },
	               991: {
	                   items: 3
	               },
	               1200: {
	                   items: 3
	               },
	               1920: {
	                   items: 3
	               }
	           }
	       });
    </script>
</body>

</html>