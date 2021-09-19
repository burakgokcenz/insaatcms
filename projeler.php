<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/db.php"; ?>

<!--==========================
    INSIDE HERO SECTION Section
============================-->	
<section class="page-image page-image-portfolio md-padding">
    <h1 class="text-white text-center">Projeler</h1>
</section>
    
<!--==========================
    PORTFOLIO Section
============================-->
<section id="portfolio" class="md-padding">
    <div class="container">

			<div class="row text-center">
				<div class="col-md-4 offset-md-4">
					<div class="section-header">
						<h2 class="title">Projelerimiz</h2>
					</div>
				</div>
			</div>
        <div class="row">
      <?php 

    $sql_sorgu = "SELECT * FROM projeler";
    $select_all_projeler = mysqli_query($connect,$sql_sorgu);
    while($row = mysqli_fetch_assoc($select_all_projeler))
    {
       $proje_id =$row["proje_id"];
       $proje_name =$row["proje_name"];
       $proje_category =$row["proje_category"];
       $proje_img_sm =$row["proje_img_sm"];
       $proje_img_bg =$row["proje_img_bg"];

      
?>
   



      <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="img/<?php echo $proje_img_bg; ?>" class="portfolio-link" data-lightbox="web-design" data-title="<?php echo $proje_name; ?>" >
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-search fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/<?php echo $proje_img_sm; ?>" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4><?php echo $proje_name;?></h4>
                    <p class="text-muted"><?php echo $proje_category;?></p>
                </div>
            </div>

   <?php 
    } 
      ?>








      
           
           
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