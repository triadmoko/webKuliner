<?php
session_start();
include '../config.php';

if (!isset($_SESSION["login"])) {

	header("Location:login.php");

	exit;
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Site Metas -->
	<title>Admin</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<style>
		.hasil {
			background: #d65106;
			border-radius: 9px;
			text-align: center;
		}

		.hasil img {
			padding: 5px;
		}

		.hasil h3 {
			color: white;
			padding: 5px;
		}

		.url a {
			text-align: center;
			width: 40%;
			background-color: white;
			text-decoration: none;
			color: black;
			border-radius: 5px;
			height: 25px;
			font-size: 14px;
			line-height: 25px;
			margin: 10px;
		}

		.url a:hover {
			background-color: #d65106;
			color: white;
		}
	</style>

</head>

<body>
	<!-- start header -->
	<?php include 'views/header.php'; ?>
	<!-- end header -->
	<!-- body -->
	<br><br><br>
	<div class="menu-box">
		<div class="container">
			<div class="row inner-menu-box">
				<div class="col-12">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<?php
								$batas = 30;
								$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
								$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

								$previous = $halaman - 1;
								$next = $halaman + 1;

								$data = mysqli_query($conn, "SELECT * FROM gambar");
								$jumlah_data = mysqli_num_rows($data);
								$total_halaman = ceil($jumlah_data / $batas);

								$data_pegawai = mysqli_query($conn, "select * from gambar limit $halaman_awal, $batas");
								$nomor = $halaman_awal + 1;
								?>
								<?php foreach ($data_pegawai as $row) : ?>
									<div class="col-lg-2 col-md-6 special-grid">
										<div class="gallery-single fix">
											<img style="height: 175px; width: 100%" src="img/<?= $row['gambar'] ?>" class="img-fluid" alt="<?= $row['nama'] ?>">
											<div style="padding: 15px">
												<center>
												<div class="url">
													<a href="deleteFoto.php?url=<?= $row['id'] ?>">Delete</a>
												</div>
												</center>			
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<?php $galeriVideo = query("SELECT * FROM video");
									  foreach ($galeriVideo as $row):
								 ?>
									<div class="col-lg-2 col-md-6 special-grid">
										<div class="gallery-single fix">
											<video class="img-fluid" width="520" style="height: 180px;" controls>
												  <source src="video/<?= $row['video'] ?>" >
												  <source src="movie.ogg" type="video/ogg">
												Your browser does not support the video tag.
											</video>
											<div style="padding: 15px">
												<center>
												<div class="url">
													<a href="deletVideo.php?url=<?= $row['id'] ?>">Delete</a>
												</div>	
												</center>		
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<nav>
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link" <?php if ($halaman > 1) {
											echo "href='?halaman=$previous'";
										} ?>>Previous</a>
			</li>
			<?php
			for ($x = 1; $x <= $total_halaman; $x++) {
			?>
				<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
			<?php
			}
			?>
			<li class="page-item">
				<a class="page-link" <?php if ($halaman < $total_halaman) {
											echo "href='?halaman=$next'";
										} ?>>Next</a>
			</li>
		</ul>
	</nav>

	<!-- end body -->

	<!-- start footer -->
	<?php include '../views/footer.php'; ?>
	<!-- end footer -->
	<!-- ALL JS FILES -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="../js/jquery.superslides.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/baguetteBox.min.js"></script>
	<script src="../js/form-validator.min.js"></script>
	<script src="../js/contact-form-script.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>