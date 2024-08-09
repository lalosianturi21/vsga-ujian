
<!-- About start -->
<section class="about mb-5" id="about">
    <div class="container">
        <div class="main-txt" >
            <h1><span>T</span>entang <span>K</span>ami</h1>
        </div>
        <?php 
        $query = mysqli_query($con, "SELECT * FROM about ORDER BY idabout DESC LIMIT 1") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);
        ?>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-6 py-3 py-md-0">
                <div class="card cards">
                    <img src="<?=base_url();?>uploads/wisata/about/<?=$row['cover'];?>" alt="about">
                </div>
            </div>
            <div class="col-md-6 py-4 py-md-0 mb">
                <h2><?= $row['about_name']; ?></h2>
                <p><?php 
        $description = $row['about_description'];
        echo strlen($description) > 50 ? substr($description, 0, 600) . '...' : $description;
    ?></p>
                <button id="about-btn" data-bs-toggle="modal" data-bs-target="#aboutModal<?= $row['idabout']; ?>">Selengkapnya...</button>
                
                <!-- Modal -->
                <div class="modal fade" id="aboutModal<?= $row['idabout']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="aboutModalLabel<?= $row['idabout']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="aboutModalLabel<?= $row['idabout']; ?>"><?= $row['about_name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?=base_url();?>uploads/wisata/about/<?=$row['cover'];?>" alt="about" class="img-fluid mb-3">
                                <p><?= $row['about_description']; ?></p>
                                <!-- Add any additional content here -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Modal -->
            </div>
        </div>
    </div>
</section>

<!-- About end -->