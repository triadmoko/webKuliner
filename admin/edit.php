<?php
include '../config.php';
session_start();

if (!isset($_SESSION["login"])) {

	header("Location:login.php");

	exit;
}
$id = $_GET['url'];
$ambil = query("SELECT * FROM shop WHERE id = $id")[0];


if (isset($_POST['editKuliner'])) {


	if (ubah($_POST) > 0) {


		echo "berhasil";


		header('location: menu.php');
	} else {


		echo "<script>
				alert('Gagal Perubahan')
		      </script>";
	}
}
if (isset($_POST['batalKuliner'])) {
	header("location:menu.php");
} else {
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
</head>

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
						<h2>Silahkan Tambah Kuliner</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form method="post" enctype="multipart/form-data">
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="id" hidden="" value="<?= $ambil['id'] ?>">
										<input type="text" value="<?= $ambil['nama'] ?>" class="form-control" id="name" name="namaKuliner" placeholder="Nama Kuliner" required data-error="Silahkan masukkan Nama kuliner" autocomplete>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<input type="text" value="<?= $ambil['harga'] ?>" placeholder="Harga" id="rupiah" class="form-control" name="harga" required data-error="Silahkan masukkan harga">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<?php $kata = ucwords($ambil['jenis']);  ?>
								<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" id="guest" required="on" data-error="Please Select Person" name="jenisKuliner">
											<option style="color: grey;" selected="" value="<?= $ambil['jenis'] ?>"><?= $kata ?></option>
											<option disabled=""> </option>
											<option value="makanan">Makanan</option>
											<option value="minuman">Minuman</option>

										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input value="<?= $ambil['gojek'] ?>" type="url" name="url" id="url" placeholder="https://gofood.link/u/example" pattern="https://.*" class="form-control" required data-error="Silahkan Masukkan Url GoFood">
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-3 ">
											<div class="card">
												<div class="imgWrap">
													<img width="10" src="img/<?= $ambil['gambar'] ?>" id="imgView" class="card-img-top img-fluid">
												</div>
												<div class="card-body">
													<div class="custom-file">
														<input hidden="" value="<?= $ambil['gambar'] ?>" name="inputFilelama">
														<input name="inputFile" type="file" id="inputFile" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
														<label class="custom-file-label" for="inputFile">Choose file</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-button text-center">
										<button class="btn btn-common" name="batalKuliner" id="submit" type="submit">Batal Edit Kuliner</button>

										<button class="btn btn-common" name="editKuliner" id="submit" type="submit">Edit Kuliner</button>

										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
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
	<script type="text/javascript">
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e) {
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		$("#inputFile").change(function(event) {
			fadeInAdd();
			getURL(this);
		});

		$("#inputFile").on('click', function(event) {
			fadeInAdd();
		});

		function getURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#inputFile").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					debugger;
					$('#imgView').attr('src', e.target.result);
					$('#imgView').hide();
					$('#imgView').fadeIn(500);
					$('.custom-file-label').text(filename);
				}
				reader.readAsDataURL(input.files[0]);
			}
			$(".alert").removeClass("loadAnimate").hide();
		}

		function fadeInAdd() {
			fadeInAlert();
		}

		function fadeInAlert(text) {
			$(".alert").text(text).addClass("loadAnimate");
		}
	</script>
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