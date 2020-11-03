<?php
include 'config.php';

// $menuMakanan = query("SELECT * FROM shop WHERE jenis='makanan'");

if (isset($_POST['cari'])) {
	$result = cari($_POST['kata']);
}

$namaRumahMakan = $_GET['getDataMenuRumahMakan'];
$namarm = query("SELECT * FROM shop WHERE jenis='$namaRumahMakan'")[0];
if (isset($namarm)) {
	
}else{
	echo "<script LANGUAGE='JavaScript'>
    window.alert('Belum ada menu');
    window.location.href='rumahMakan.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Menu Rumah Makan <?= $namarm['jenis'] ?></title>
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
	</style>

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
					<h1>Rumah Makan <?= $namarm['jenis'] ?></h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2 id="menu">Selamat Datang di Rumah Makan <?= $namarm['jenis'] ?></h2>
						<p>Pilih menu makanan dari rumah makan <?= $namarm['jenis'] ?></p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<form action="cari.php#hasil" method="POST">
							<div class="blog-search-form">
								<input autocomplete="off" name="kata" placeholder="Cari Makanan" type="text">
								<button class="search-btn" name="cari">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
							<div class="hasil">
								<h3>Support By</h3>
								<img width="50" title="KEMENRISTEKDIKTI" src="images/dikti.png">
								<img width="50" title="Universitas Bung Hatta" src="images/ubh.png">
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

								$data = mysqli_query($conn, "SELECT * FROM shop WHERE jenis='$namaRumahMakan'");
								$jumlah_data = mysqli_num_rows($data);
								$total_halaman = ceil($jumlah_data / $batas);

								$data_pegawai = mysqli_query($conn, "SELECT * FROM shop WHERE jenis='$namaRumahMakan' limit $halaman_awal, $batas");
								$nomor = $halaman_awal + 1;
								?>
								<?php foreach ($data_pegawai as $row) : ?>
									<div class="col-lg-4 col-md-6 special-grid">
										<div class="gallery-single fix">
											<img style="height: 175px; width: 100%" src="admin/img/<?= $row['gambar'] ?>" class="img-fluid" alt="<?= $row['nama'] ?>">
											<div style="padding: 15px"><a href=""></a>
												<a target="_blank" href="<?= $row['gojek'] ?>">
													<h4 style="text-align: center;color: #d65106; font-size: 18px;"><?= $row['nama'] ?></h4>

												</a>
												<center><a target="_blank" href="<?= $row['gojek'] ?>"><img title="Order Gofood" width="50" src="images/gofood.png"></a></center>
												<br>
												<h4 style="text-align: center;color: #d65106; font-size: 18px;"><?= $row['harga'] ?></h4>
												<h4 style="text-align: center; color: #d65106">
												</h4>
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
										} ?>>Previous
				</a>
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
	<!-- Start Footer -->
	<footer>
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
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var start = 0;
		var limit = 9;
		var reachedMax = false;

		$(window).scroll(function() {
			if ($(window).scrollTop() == $(document).height() - $(window).height())
				getData();
		});

		$(document).ready(function() {
			getData();
		});

		function getData() {
			if (reachedMax)
				return;

			$.ajax({
				url: 'getDataKuliner.php',
				method: 'GET',
				dataType: 'text',
				data: {
					getData: 1,
					start: start,
					limit: limit
				},
				success: function(response) {
					if (response == "reachedMax")
						reachedMax = true;
					else {
						start += limit;
						$(".getDataAll").append(response);
					}
				}
			});
		}
	</script>

</body>

</html>