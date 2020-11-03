<?php
include '../config.php';
session_start();

if (!isset($_SESSION["login"])) {

	header("Location:login.php");

	exit;
}
if (isset($_POST['addVideo'])) {

	if (addVideo($_POST) > 0) {

		echo "<script>alert ('data berhasil ditambahkan')</script>";
	} else {

		echo "<script>alert ('data gagal')</script>";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Site Metas -->
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


<body>
	<!-- start header -->
	<?php include 'views/header.php'; ?>
	<!-- end header -->

	<!-- form -->
	<br><br><br>
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Tambah Video Galeri</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="file" class="form-control" id="namaRM" name="video" placeholder="Video" required data-error="Silahkan Masukkan Video" autocomplete>
										<div class="help-block with-errors"></div>
									</div>
									<center>
									<div addVideo="submit-button text-center">
										<button class="btn btn-common" name="addVideo" id="submit" type="submit">Tambah Video</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
									</center>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</fieldset>
	<!-- end form -->

	<!-- start footer -->
		<?php include '../views/footer.php'; ?>
	<!-- end footer -->
</body>

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
</html>