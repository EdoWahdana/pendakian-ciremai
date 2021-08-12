<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
	<!-- Styles from CDN also available in assets/vendor -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	
	<!-- Styles from local machine -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/styles.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/effect.css">

	<!-- Styles from Vendor Local Machine -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/font-awesome/css/all.min.css">
</head>
<body>

<!-- Navbar  -->
	<nav class="navbar header navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand mx-auto" href="#">
				<p class="navbar-brand-text">@tukunang_</p>
			</a>
		</div>
	</nav>
<!-- End of Navbar -->


<!-- Slider Carousel -->
	<div id="mainBanner" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?= base_url('assets/'); ?>images/banner1.jpeg" class="img-fluid d-block w-100 img-banner">
			</div>
			<div class="carousel-item">
				<img src="<?= base_url('assets/'); ?>images/banner2.jpg" class="img-fluid d-block w-100 img-banner">
				<div class="carousel-caption d-none d-md-block mb-3">
					<h5 class="display-3"><span class="badge badge-tuku">Terbaik di kelasnya</span></h5>
				</div>	
			</div>
		</div>
		<a class="carousel-control-prev" href="#mainBanner" role="button" data-slide="prev">
			<span class="fas fa-arrow-alt-circle-left fa-3x" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#mainBanner" role="button" data-slide="next">
			<span class="fas fa-arrow-alt-circle-right fa-3x" aria-hidden="true"></span>
		</a>
	</div>
<!-- End of Slider Carousel -->
	

	<h1 class="display-4 mt-4 mb-3 text-center" id="katalog">Our Services</h1>


<!-- Items List -->
	<div class="container">
		<div class="row">
			<!-- Item Col -->
			<div class="col-12 col-md-6 col-lg-4 col-xl-3">
				<div class="card card-item text-white mb-3">
				<img src="<?= base_url('assets/') ?>images/banner1.jpeg" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">Dark card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<div class="card-button">
							<div class="row">
								<div class="col-sm-6 mb-3 mb-sm-0 text-center">
									<a href="#" class="btn btn-outline-light btn-block card-link">Liink</a>
								</div>
								<div class="col-sm-6">
									<a href="#" class="btn btn-outline-light btn-block card-link">Liink</a>
								</div>
							</div>
						</div>	
				</div>
				</div>
			</div>
			<!-- End of Item Col -->
		</div>
	</div>
<!--End of Items List  -->

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		$(document).ready( function() {
			$(window).scroll( function() {
				$('#katalog').addClass('animated bounce');
			});
		});
	</script>
</body>
</html>