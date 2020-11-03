<?php
session_start();
include '../config.php';

if (!isset($_SESSION["login"])) {

	header("Location:login.php");

	exit;
}

if (isset($_POST['cari'])) {
	$result = cari($_POST['kata']);
} else {
	$result = query("SELECT * FROM shop LIMIT 0,24");
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
			float: left;
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
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2 id="hasil">Pilih Menu</h2>
						<p>Order sekarang kuliner pasir jambak melalui GoFood</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<form action="" method="POST">
							<div class="blog-search-form">
								<input autocomplete="off" name="kata" placeholder="Cari Makanan" type="text">
								<button class="search-btn" name="cari">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
							<div class="hasil">
								<h3>Support By</h3>
								<img width="50" title="KEMENRISTEKDIKTI" src="../images/dikti.png">
								<img width="50" title="Universitas Bung Hatta" src="../images/ubh.png">
							</div>
						</form>
					</div>
				</div>

				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">

						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<?php
								$batas = 30;
								$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
								$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

								$previous = $halaman - 1;
								$next = $halaman + 1;

								$data = mysqli_query($conn, "select * from shop");
								$jumlah_data = mysqli_num_rows($data);
								$total_halaman = ceil($jumlah_data / $batas);

								$data_pegawai = mysqli_query($conn, "select * from shop limit $halaman_awal, $batas");
								$nomor = $halaman_awal + 1;
								?>
								<?php foreach ($data_pegawai as $row) : ?>
									<div class="col-lg-4 col-md-6 special-grid">
										<div class="gallery-single fix">
											<img style="height: 175px; width: 100%" src="img/<?= $row['gambar'] ?>" class="img-fluid" alt="<?= $row['nama'] ?>">
											<div style="padding: 15px"><a href=""></a>
												<a target="_blank" href="<?= $row['gojek'] ?>">
													<h4 style="text-align: center;color: #d65106; font-size: 18px;"><?= $row['nama'] ?></h4>
												</a>
												<center><a target="_blank" href="<?= $row['gojek'] ?>"><img title="Order Gofood" width="50" src="../images/gofood.png"></a></center>
												<br>
												<h4 style="text-align: center;color: #d65106; font-size: 18px;"><?= $row['harga'] ?></h4>
												<h4 style="text-align: center; color: #d65106">
													<div class="url">
														<a href="hapus.php?url=<?= $row['id'] ?>">Delete</a>
														<a href="edit.php?url=<?= $row['id'] ?>">Edit</a>
													</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
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
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By :
							<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>

	</footer>
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