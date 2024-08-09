<!-- Packages Start -->
<section class="packages" id="packages">
      <div class="container">
         <div class="main-txt">
            <h1><span>P</span>aket <span>W</span>isata</h1>
         </div>
         
         <div class="row" style="margin-top: 30px;">
         <?php 
        $n=1;
        $query = mysqli_query($con,"SELECT * FROM wisata ORDER BY idwisata DESC")or die(mysqli_error($con));
        while($row = mysqli_fetch_array($query)):
        ?>
            <div class="col-md-4 py-3 py-md-0 mb-4">
               <div class="card">
               <img src="<?=base_url();?>uploads/wisata/cover/<?=$row['cover'];?>" alt="" style="height: 257px;">
                  <div class="card-body">
                     <h3><?= $row['nama']; ?></h3>
                     <p><?= $row['alamat']; ?></p>
                     <!-- <div class="start mb-3">
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star "></i>
                     </div> -->
                     <div class="mb-4">
                     <h6>Harga : <?= money($row['harga']); ?><strong></strong></h6>
                     </div>
                     <button class="btn btn-warning text-white" data-bs-toggle="modal"
                     data-bs-target="#galeriModal<?= $row['idwisata']; ?>">Lebih Detail</button>
                     <button class="btn btn-green text-white" onclick="window.location.href='https://wa.me/<?= $row['no_wa']; ?>';">
                        <i class="fa-brands fa-whatsapp"></i> Whatsapp
                     </button>
                      <!-- Galeri Modal -->
                    <!-- Galeri Modal -->
<div class="modal fade" id="galeriModal<?= $row['idwisata']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Galeri Wisata <?= $row['nama']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="d-flex justify-content-center mb-4">
               <iframe src="<?= $row['linkyt']; ?>" width="960" height="515"  frameborder="0"></iframe>
               </div>
               <div class="main-txt">
                  <h1><?= $row['nama']; ?></h1>
               </div>
               <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-warning text-white fs-5 fw-bold">
                        Informasi
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Alamat</h5>
                        <p class="card-text">
                        <?= $row['alamat']; ?>
                        </p>
                        <h5 class="card-title">Harga</h5>
                        <p class="card-text">
                        <?= money($row['harga']); ?>
                        </p>
                        <h5 class="card-title">Nomor Whatsapp</h5>
                        <p class="card-text">
                        <?= $row['no_wa']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-txt mb-4">
                  <h1>Galeri</h1>
               </div>
                <?php 
                $id = $row['idwisata'];
                $query2 = mysqli_query($con, "SELECT * FROM wisata_galery WHERE wisata_id=$id ORDER BY idwisata_galery DESC") or die(mysqli_error($con));
                if (mysqli_num_rows($query2) > 0): ?>
                    <div class="row">
                        <?php while ($galeri = mysqli_fetch_array($query2)): ?>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <?php 
                                    $path = base_url()."uploads/wisata/gallery/".$galeri['file'];
                                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                                    if ($ext == "jpg" || $ext == "png" || $ext == "jpeg"): ?>
                                        <img src="<?= base_url(); ?>uploads/wisata/gallery/<?= $galeri['file']; ?>" alt="File" class=" rounded" style="height: 300px;">
                                    <?php endif; ?>
                                    <!-- <div class="card-body">
                                        <h5 class="card-title"><?= $galeri['keterangan']; ?></h5>
                                    </div> -->
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="not-available" style="top: 210%">
                    <h1 class="text-center">Tidak Ada Galeri website</h1>
                    <div class="d-flex justify-content-center">
                    <img src="assets/img/noimage.png">
                    </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal"><i data-feather="x"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

                  </div>
               </div>
            </div>
            <?php 
        endwhile;
        ?>
         </div>
      </div>
   </section>