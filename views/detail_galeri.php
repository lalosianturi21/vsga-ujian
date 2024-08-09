
   <!-- section Gallery start -->
   <section class="gallery" id="gallery">
   <div class="container">
      <div class="main-txt" style="padding-top: 10px;">
         <h1><span>G</span>aleri</h1>
      </div>
      <div class="row" style="margin-top: 30px;">
         <?php
         // Fetch gallery images from the database
         $query = mysqli_query($con, "SELECT * FROM wisata_galery ORDER BY idwisata_galery DESC") or die(mysqli_error($con));
         if (mysqli_num_rows($query) > 0):
            while ($galeri = mysqli_fetch_array($query)):
               $path = base_url()."uploads/wisata/gallery/".$galeri['file'];
               $ext = pathinfo($path, PATHINFO_EXTENSION);
               if ($ext == "jpg" || $ext == "png" || $ext == "jpeg"):
         ?>
            <div class="col-md-4 py-3 py-md-0 mb-4">
               <div class="card">
                  <img src="<?= $path; ?>" alt="<?= $galeri['keterangan']; ?>" height="230px">
               </div>
            </div>
         <?php
               endif;
            endwhile;
         else:
         ?>
            <div class="col-12">
               <div class="not-available text-center">
                  <h1>Tidak Ada Galeri</h1>
                  <img src="assets/img/noimage.png" alt="No Image">
               </div>
            </div>
         <?php endif; ?>
      </div>
   </div>
</section>
<!-- section Gallery end -->