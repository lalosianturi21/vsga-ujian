<!-- Content awal  -->
 
<!-- <Home> -->

<div class="home">
    <div class="content">
        <h5>Welcome To Sumatera Utara</h5>
        <h1>Daerah <span class="changecontent"></span></h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto quisquam eum impedit alias? Debitis <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aliquid?</p>
        <a href="#book">Book Place</a>
    </div>
</div>

 <!-- Packages Start -->
 <section class="packages" id="packages">
      <div class="container">
         <div class="main-txt">
            <h1><span>P</span>ACKAGES</h1>
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
                     <div class="start mb-3">
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star "></i>
                     </div>
                     <div class="mb-4">
                     <h6>Harga : Rp<?= $row['harga']; ?><strong></strong></h6>
                     </div>
                     <button class="btn btn-warning text-white" data-bs-toggle="modal"
                     data-bs-target="#galeriModal<?= $row['idwisata']; ?>">Lebih Detail</button>
                      <!-- Galeri Modal -->
                    <div class="modal fade" id="galeriModal<?= $row['idwisata']; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Galeri Wisata <?= $row['nama']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <?php 
                                        $id = $row['idwisata'];
                                        $query2 = mysqli_query($con,"SELECT * FROM wisata_galery WHERE wisata_id=$id ORDER BY idwisata_galery DESC")or die(mysqli_error($con));
                                        while($galeri = mysqli_fetch_array($query2)):
                                        ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <?php 
                                                $path = base_url()."uploads/wisata/gallery/".$galeri['file'];
                                                $ext = pathinfo($path,PATHINFO_EXTENSION);
                                                if($ext=="jpg" || $ext=="png" || $ext=="jpeg"):
                                                ?>
                                                <img src="<?=base_url();?>uploads/wisata/gallery/<?= $galeri['file']; ?>"
                                                    alt="File" class="img-thumbnail rounded" style="height: 300px;">
                                                <?php endif; ?>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $galeri['keterangan']; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        endwhile;
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                            data-feather="x"></i>
                                        Tutup</button>
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
   <!-- Packages End -->

 <!-- Section Service Start -->

 <section class="services" id="services">
      <div class="container">
         <div class="main-txt" style="padding-top: 10px;">
            <h1><span>S</span>ervice</h1>

         </div>
         <div class="row" style="margin-top: 30px;">
            <div class="col-md-4 py-3 py-md-0">
               <div class="card">
                  <i class="fas fa-hotel"></i>
                  <div class="card-body text-center">
                     <h3>Affordable Hotel</h3>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus distinctio, pariatur sit temporibus asperiores beatae!</p>
                  </div>
               </div>

            </div>
            <div class="col-md-4 py-3 py-md-0">
               <div class="card">
                 <i class="fas fa-utensils"></i>
                 <div class="card-body text-center">
                   <h3>Food And Drinks</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus distinctio, pariatur sit temporibus asperiores beatae!</p>
                 </div>
               </div>
             </div>
             <div class="col-md-4 py-3 py-md-0">
               <div class="card">
                 <i class="fas fa-bullhorn"></i>
                 <div class="card-body text-center">
                   <h3>Safty Guide</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus distinctio, pariatur sit temporibus asperiores beatae!</p>
                 </div>
               </div>
             </div>

         </div>
         <div class="row" style="margin-top: 30px;">
            <div class="col-md-4 py-3 py-md-0">
              <div class="card">
                <i class="fas fa-globe-asia"></i>
                <div class="card-body text-center">
                  <h3>Around The World</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus distinctio, pariatur sit temporibus asperiores beatae!</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
              <div class="card">
                <i class="fas fa-plane"></i>
                <div class="card-body text-center">
                <h3>Fastest Travel</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus distinctio, pariatur sit temporibus asperiores beatae!</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
              <div class="card">
                <i class="fas fa-hiking"></i>
                <div class="card-body text-center">
                <h3>Adventures</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus distinctio, pariatur sit temporibus asperiores beatae!</p>
                </div>
              </div>
            </div>
          </div>

      </div>


   </section>
   <!-- Section Service End -->

   <!-- section Gallary start -->
   <section class="gallary" id="gallary">
      <div class="container">
         <div class="main-txt" style="padding-top: 10px;">
            <h1><span>G</span>allary</h1>
            </div>
            <div class="row" style="margin-top: 30px;">
               <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/g1.png" alt=""  height="230px">
                  </div>
               </div>
               <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/g2.png" alt="" height="230px">
                  </div>
               </div>
               <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/g3.png" alt=""  height="230px">
                  </div>
               </div>
            </div>
            <div class="row" style="margin-top: 30px;">
               <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/g4.png" alt=""  height="230px">
                  </div>
               </div>
               <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/g5.png" alt="" height="230px">
                  </div>
               </div>
               <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/g6.png" alt=""  height="230px">
                  </div>
               </div>
            </div>
         </div>
   </section>

   <!-- section Gallary end -->

   <!-- About start -->
   <section class="about" id="about">
      <div class="container">
         <div class="main-txt" style="padding-top: 10px;">
            <h1><span>About</span>Us</h1>
            </div>
            <div class="row" style="margin-top: 50px;">
               <div class="col-md-6 py-3 py-md-0">
                  <div class="card">
                     <img src="./images/about-img.png" alt="">
                  </div>
               </div>
   
               <div class="col-md-6 py-3 py-md-0">
                  <h2>How Travel Agency Work Read.</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam voluptatibus, fugit minus maiores amet facilis iure soluta culpa perferendis repudiandae odit, iste consequatur et accusantium placeat ipsum? Impedit libero nisi beatae atque adipisci sint eos odio necessitatibus molestias cupiditate reiciendis culpa eaque voluptates aliquam ipsum, doloremque non ducimus quos ipsa esse dignissimos similique molestiae odit iste? Illo illum ullam voluptatem incidunt quas fugiat temporibus eos placeat nam! Sint nobis omnis quidem repellendus obcaecati sit, corporis nesciunt veniam, quod delectus sapiente autem eius debitis! Perferendis asperiores fugit tenetur repellendus deserunt, sequi ullam sed molestiae itaque maxime nulla vitae animi numquam libero!</p>
                  <button id="about-btn">Read More...</button>
               </div>
            </div>
         </div>
   </section>

   <!-- About end -->