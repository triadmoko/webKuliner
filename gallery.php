<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Galeri - Wisata Kampung Nelayan</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<?php include 'views/header.php'; ?>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Galeri</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Galeri</h2>
						<p>kumpulan kegiatan nelayan di pasia nan tigo</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<?php $foto = query("SELECT * FROM gambar");
							foreach ($foto as $row): 
					?>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="admin/img/<?= $row['gambar'] ?>">
							<img style="width: 800px; height: 260px;" class="img-fluid" src="admin/img/<?= $row['gambar'] ?>" width="800" alt="Gallery Images">
						</a>
					</div>
				<?php endforeach; ?>
					<?php 
					$video = query("SELECT * FROM video");
					foreach ($video as $row): 
					?>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="">
							<video class="img-fluid" width="520" style="height: 250px;" controls>
								  <source src="admin/video/<?= $row['video'] ?>" >
								  <source src="movie.ogg" type="video/ogg">
								Your browser does not support the video tag.
							</video> 
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->

	<!-- Start Customer Reviews -->

	<!-- End Customer Reviews -->

	<!-- Start Footer -->
	<?php include 'views/footer.php'; ?>
	<!-- End Footer -->

	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>