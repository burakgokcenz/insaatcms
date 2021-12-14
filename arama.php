
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


	
	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-blog md-padding">
		<h1 class="text-white text-center">M&B İnşaat</h1>
	</section>

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container"> 
			<div class="row">
				<main id="main" class="col-md-8">
					<div class="row">



					  
						<?php
						          if (isset($_POST['aramabtn'])) {
						           $arama	= $_POST['arama'];
						           $sorgu = "SELECT * FROM posts  WHERE post_tags  LIKE '%$arama%' ORDER by post_id ASC ";
						           $arama_sorgu = mysqli_query($connect,$sorgu);
						           if (!$arama_sorgu) {
						           	     die("Sorgu Hatası". mysqli_error($connect));

						           }

						           $arama_count = mysqli_num_rows($arama_sorgu);
						           if ($arama_count ==  0) {
						           	 echo "<h2>  Kelime bulunamadı </h2>";
						           }
						           else
						           {

                         
                             
                            while ($row =mysqli_fetch_assoc($arama_sorgu)) {
					                       	   $post_id = $row["post_id"];
					                           $post_isim = $row["post_isim"];
					                           $post_date =  $row["post_date"];
					                           $post_goruntulenme = $row["post_goruntulenme"];
					                           $post_title = ucfirst($row["post_title"]);
					                           $post_text = substr($row["post_text"],0,100);
					                           $post_image = $row["post_image"];
					                           $post_tags = $row["post_tags"];

                             

?>


						<div class="col-md-6">
							<div class="blog">	
								<div class="blog-img">
									<img src="img/<?php echo $post_image ?>" class="img-fluid">
								</div>
								<div class="blog-content">
									<ul class="blog-meta">
										<li><i class="fas fa-users"></i><span class="writer"><?php echo $post_isim ?></span></li>
										<li><i class="fas fa-clock"></i><span class="writer"><?php  echo $post_date ?></span></li>
										<li><i class="far fa-eye"></i><span class="writer"><?php echo $post_goruntulenme ?></span></li>
									</ul>
									<h3><?php echo $post_title ?></h3>
									<p><?php  echo $post_text ?></p>
									<a href="haber-single.php?devam=<?php echo $post_id; ?>">Devamını oku...</a>
								</div>
							</div>
						</div>

                              	
                     <?php         }		
						           }
						          }
                   
?>




                       
					</div>
					<div class="row">
						 
				</main>
				
				<?php include "includes/sidebar.php"; ?>
				
				
				
			</div>

		</div>
	</section>
<?php include "includes/footer.php"; ?>



	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="js/lightbox-plus-jquery.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>