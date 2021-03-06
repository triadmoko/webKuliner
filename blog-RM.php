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
	<title>Profil Mitra I Kelompok RM Lauak Pukek Pasie Nan Tigo</title>
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
					<h1>Profil Mitra I Kelompok RM Lauak Pukek Pasie Nan Tigo</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start blog details -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Profil Mitra I Kelompok RM Lauak Pukek Pasie Nan Tigo</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
								<img class="img-fluid" src="images/pm1.jpg" alt="">
								<div class="date-blog-up">
									6 oktober 2020
								</div>
							</div>
							<div class="inner-blog-detail details-page">
								<h3>Rumah Makan Lauak Pukek Pasie Nan Tigo</h3>
								<ul>
									<li><i class="zmdi zmdi-account"></i>Posted By : <span>Admin</span></li>
									<li>|</li>
									<li><i class="zmdi zmdi-time"></i>Time : <span>11.30 am</span></li>
								</ul>
								<p>Sebanyak 16 RM lauak pukek tersebar di pesisir kampung wisata nelayan Pasia Nan Tigo. Rumah makan “lauk pukek” (ikan pukat /jala) merupakan rumah makan khas kampung nelayan dimana menu makanan yang dijual adalah hasil tangkapan nelayan Pasie Nan Tigo sehingga rasanya sangat enak karena ikan yang diolah masih baru. Adapun jenis makanan andalannya seperti ikan gulai masin, ikan panggang/goreng, cumi panggang/goreng, palai bada dan lain-lain.</p>

								<p>Penikmat kuliner “lauk pukek” Pasie Nan Tigo berasal dari dalam kota Padang maupun luar daerah bahkan luar Provinsi Sumatera Barat. Biasanya RM “lauak pukek” dibuka pada jam 10.00 – 16.00 setiap harinya. Sambil menikmati kuliner “lauak pukek” pengunjung dapat menikmati suasana pantai yang sangat menawan serta dapat melihat aktivitas nelayan.</p>
								<blockquote>
									<p>Hasil wawancara dengan mitra pendapatan rumah makan “lauak pukek” merupakan penghasilan utama mereka sehingga dapat menyekolahkan anak bahkan ada yang sampai ke Perguruan Tinggi. Namun semenjak pandemi C-19 semua rumah makan tutup karena tidak ada pengunjung. Hal tersebut berlangsung hampir 3 bulan lamanya.</p>
								</blockquote>
								<p>Masa new normal rumah makan “lauak pukek” mulai dibuka kembali, namun pengunjung mengalami penurunan yang cukup signifikan. Hampir 40-50 persen omset Mitra turun. Masyarakat lebih banyak beraktifitas dirumah (WFH), sedangkan yang berkunjung ke rumah makan hanya yang mereka sudah jenuh beraktifitas di rumah. Hasil wawancara dengan pengunjung mereka sangat cemas dengan kondisi wabah C-19 sehingga sangat hati-hati jika ingin beraktivitas di luar rumah dan semua pihak harus menerapkan protokol kesehatan.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
					<!-- <div class="right-side-blog">
						<h3>Search</h3>
						<div class="blog-search-form">
							<input name="search" placeholder="Search blog" type="text">
							<button class="search-btn">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div> -->
					<h3>Rumah Makan Pasia Nan Tigo</h3>
					<div class="blog-categories">
						<ul>
							<?php $dataRM = query("SELECT * FROM rm");
							foreach ($dataRM as $row) :
							?>
								<li><a href="#"><span><?= $row['namaRM'] ?></span></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- End details -->

	<!-- Start Contact info -->

	<!-- End Contact info -->

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