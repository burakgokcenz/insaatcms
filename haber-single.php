<?php ob_start(); ?>

<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-contact md-padding">
		<h1 class="text-white text-center">M&B İnşaat</h1>
	</section>

	<!--==========================
    Contact Section
============================-->
	<section id="
	" class="md-padding">
		<div class="container">
			<div class="row">
	<?php

	                 if (isset($_GET['devam'])) {
	                 	 $devam_post_id = $_GET['devam'];
	                 	 $sql_sorgusu = "UPDATE posts SET post_goruntulenme = post_goruntulenme +1 WHERE post_id = $devam_post_id ";
	                 	 $sql_calıstır = mysqli_query($connect,$sql_sorgusu);


	                 }

                             $sql_sorgu ="SELECT * FROM posts WHERE post_id = $devam_post_id";
                             $select_all_posts =mysqli_query($connect,$sql_sorgu);

                       while ($row =mysqli_fetch_assoc($select_all_posts)) {

                           $post_isim = $row["post_isim"];
                           $post_date =  $row["post_date"];
                           $post_goruntulenme = $row["post_goruntulenme"];
                           $post_title = ucfirst($row["post_title"]);
                           $post_text = $row["post_text"];
                           $post_image = $row["post_image"];
                           $post_tags = explode(",",$row["post_tags"]);


                             

?>


                    <main id="main" class="col-md-8">
					<div class="blog">
						<div class="blog-img">
                            <img src="img/<?php echo $post_image ?>" class="img-fluid" alt = "">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li><i class="fas fa-user"></i><?php echo $post_isim ;?></li>
								<li><i class="fas fa-clock"></i><?php echo $post_date;?></li>
								<li><i class="far fa-eye"></i></i><?php echo $post_goruntulenme; ?></li>
								<li>
									 <?php 
									 foreach ($post_tags as &$post_tag) {
									 	$post_tag = "<i class ='fas fa-hashtag'>$post_tag</i> ";

									 	
									 }
									 echo implode(",", $post_tags);

									 ?>

								</li>

							</ul>
							<h3><?php echo $post_title; ?></h3>
							<p><?php echo $post_text; ?></p>

						</div>
                                       <?php         }		?>

					<?php	
 $sorgu ="SELECT * FROM yorumlar WHERE yorum_post_id = {$devam_post_id} AND yorum_statu = 
                          'onayla' ORDER BY yorum_id DESC ";
                          $yorum_sorgu = mysqli_query($connect,$sorgu);

                          $say_gönderi_yorum = mysqli_num_rows($yorum_sorgu);


                          ?>


                         
						<div class="blog-comments">
							<h3>(<?php echo $say_gönderi_yorum; ?>) Yorum</h3>
                          	     

							   <?php 
                         

                          while ($row = mysqli_fetch_assoc($yorum_sorgu)) {

                          	      $yorum_isim  = $row['yorum_isim'];
                          	      $yorum_date  = $row['yorum_date'];
                          	      $yorum_text  = $row['yorum_text'];



                          	      ?>
                          	      
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading"><?php echo $yorum_isim; ?><span class="time"><?php echo $yorum_date; ?></span></h4>
									<p><?php echo $yorum_text; ?></p>
								</div>
							</div>
						
                          	
                  <?php        }   ?>




							<?php 
                             if (isset($_POST['gonder_yorum'])) {
                             	    
                             	  $devam_post_id = $_GET['devam'];  
                             	  $yorum_isim  = $_POST['yorum_isim'];
                                  $yorum_email = $_POST['yorum_email'];
                             	  $yorum_text  = $_POST['yorum_text'];
                             	  $sorgu_ekle = "INSERT INTO yorumlar (yorum_post_id, yorum_isim, yorum_email, yorum_text, yorum_statu, yorum_date)
                             	                VALUES($devam_post_id,'{$yorum_isim}', '{$yorum_email}', '{$yorum_text}','onaylanmadı', now()) ";
                                   $calıstır_sorgu_yorum = mysqli_query($connect,$sorgu_ekle);
                                   header("Location: haber.php");
                             }
                       

							?>

						</div>
						
						<div class="reply-form">
							<h3>Yorum Yap</h3>
							<form action="" method="post">
								<input class="form-control mb-4" name="yorum_isim" type="text" placeholder="İsim">
								<input class="form-control mb-4" name="yorum_email" type="email" placeholder="Eposta">
								<textarea class="form-control mb-4" row="5"name="yorum_text" placeholder="Bir yorum ekle"></textarea>
                                
								<button type="submit" name="gonder_yorum" class="main-btn">Gönder</button>
							</form>
						</div>
						
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