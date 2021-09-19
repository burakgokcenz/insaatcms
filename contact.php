<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



<!--==========================
    INSIDE HERO SECTION Section
============================-->	
<section class="page-image page-image-contact md-padding">
    <h1 class="text-white text-center">İletişim</h1>
</section>
    
    <!--==========================
    Contact Section
============================-->
<section id="contact" class="md-padding">
	<div class="container">

			<div class="row text-center">
				<div class="col-md-4 offset-md-4">
					<div class="section-header">
						<h2 class="title">İletişim</h2>
					</div>
				</div>
			</div>

		<div class="row">
			<div class="col-lg-12">
				<form id="contactForm" name="sentMessage" novalidate="novalidate">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" id="name" type="text" placeholder="Ad *" required="required" data-validation-required-message="Please enter your name.">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group">
								<input class="form-control" id="email" type="email" placeholder="Eposta *" required="required" data-validation-required-message="Please enter your email address.">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group">
								<input class="form-control" id="phone" type="tel" placeholder="Telefon *" required="required" data-validation-required-message="Please enter your phone number.">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" id="message" placeholder="Mesaj yaz.. *" required="required" data-validation-required-message="Please enter a message."></textarea>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-lg-12 text-center">
							<div id="success"></div>
							<button id="sendMessageButton" class="main-btn" type="submit">Bize Ulaşın</button>
						</div>
					</div>
				</form>
			</div>
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