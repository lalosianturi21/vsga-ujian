
<section id="team" class="mb-5">
		<div class="container">
      <div class="main-txt" style="padding-top: 10px;">
         <h1><span>T</span>eam </h1>
      </div>
			
		</div>
		<div class="testimonial-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="team-slider owl-carousel">
                  <?php 
        $n=1;
        $query = mysqli_query($con, "SELECT * FROM team ORDER BY idteam DESC") or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($query)):
        ?>
							<div class="single-box text-center">
								<div class="img-area"><img alt="" class="img-fluid move-animation" src="<?=base_url();?>uploads/wisata/team/<?=$row['cover'];?>"></div>
								<div class="info-area">
									<h4><?= $row['team_name']; ?></h4>
									<p><?= $row['team_description']; ?></p>
								</div>
							</div>
                     <?php endwhile ?>
						</div>
					</div>
				</div>
			</div>
		</div>
            </section>
