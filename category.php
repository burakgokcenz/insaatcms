<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


	
	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-blog md-padding">
		<h1 class="text-white text-center">Kategori</h1>
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


                if (isset($_GET["kategoriler"])) {
               	  
                     $post_kategori_sec = $_GET["kategoriler"];

                                       }


                             $sql_sorgu ="SELECT * FROM posts WHERE post_category ='$post_kategori_sec'";
                             $select_all_posts =mysqli_query($connect,$sql_sorgu);
                       while ($row =mysqli_fetch_assoc($select_all_posts)) {
                       	   $post_id = $row["post_id"];
                           $post_isim = $row["post_isim"];
                           $post_date =  $row["post_date"];
                           $post_comment_number = $row["post_comment_number"];
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
										<li><i class="fas fa-comments"></i><span class="writer"><?php echo $post_comment_number ?></span></li>
									</ul>
									<h3><?php echo $post_title ?></h3>
									<p><?php  echo $post_text ?></p>
									<a href="haber-single.php?devam=<?php echo $post_id; ?>">Devamını oku...</a>
								</div>
							</div>
						</div>

                              	
                     <?php         }		?>
					








                       
					</div>
					<div class="row">
						 <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

						
					</div>
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