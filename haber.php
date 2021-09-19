<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


	
	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-blog md-padding">
		<h1 class="text-white text-center">Haberler</h1>
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
						if (isset($_GET['sayfa'])) {

							$sayfa = $_GET['sayfa'];
						}
						else 
						{
							$sayfa = "";
						}
						if ($sayfa == "" && $sayfa = 1) {
							$start = 0; // 4 tane gösterecek
						}
						else 
						{
							$start = ($sayfa *4) - 4;//  sayfa 2 geldiğinde  5 6 7 8 gösterecek  sayfa = 2 2*4 = 8 ve 8-4 = 4ten başlar.




						}

              $sql_sorgu_sayfa ="SELECT * FROM posts ";// kaç tane post var ona baktım
              $all_post = mysqli_query($connect,$sql_sorgu_sayfa);
              $all_post_say = mysqli_num_rows($all_post);
              $sayfa_sayisi = ceil($all_post_say / 4 );// ceil ile 1.25 olan değeri 2 yaptım






						?>
					
						<?php

                             $sql_sorgu ="SELECT * FROM posts ORDER BY post_id  DESC  LIMIT $start, 4";
                             $select_all_posts =mysqli_query($connect,$sql_sorgu);
                       while ($row =mysqli_fetch_assoc($select_all_posts)) {
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

                              	
                     <?php         }		?>


                  
					







                       
					</div>
					<div class="row">
						  <nav aria-label="Page navigation example">

  <ul class="pagination justify-content-center">

 <li <?php 


 if ($sayfa == 1 or $sayfa == "") 


 {echo "class='page-item disabled'";} 



?>>
   <a class="page-link" href="haber.php?sayfa=



   <?php if ($sayfa > 1) 


   {
   	echo $sayfa - 1;
   } ?>


   ">Önceki</a>
 </li>
  <?php 
   for($i=1; $i<=$sayfa_sayisi; $i++) {
    echo "<li class='page-item'><a class='page-link' href='haber.php?sayfa=$i'>{$i}</a></li>";
   }    
  ?>
 <li <?php if ($sayfa == $sayfa_sayisi) 
 {

 	echo "class='page-item disabled'";

 } ?>>
   <a class="page-link" href="haber.php?sayfa=<?php 

   if ($sayfa == "") {

   	echo $sayfa = 2;

   } 


   else if($sayfa_sayisi!=$sayfa)
   {
   	echo $sayfa+1;
   } 


   else if($sayfa_sayisi==$sayfa)
   {

   	echo $sayfa;


   }?>">Sonraki</a>
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