<?php 
include '../config.php';
session_start();

if (!isset($_SESSION["login"])) {

	header("Location:login.php");

	exit;
}
$id = $_GET['url'];
$getRumahMakan = query("SELECT * FROM rm WHERE id=$id ")[0];
  
  if (isset($_POST['editRumahMakan'])) {


    if (editRumahMakan($_POST) > 0) {


      echo "<script>
				alert('berhasil di edit')
		      </script>";

		      header("location:viewsRumahMakan.php");
    }else{


      echo "<script>
				alert('Gagal Perubahan')
		      </script>";

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
						<h2>Silahkan Tambahkan Rumah Makan</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form method="POST" enctype="multipart/form-data">
						<input type="text" name="id" value="<?= $getRumahMakan['id'] ?>" hidden="">
						<fieldset>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="namaRM" name="namaRM" placeholder="Nama Rumah Makan" required data-error="Silahkan masukkan Nama Rumah Makan" value=" <?= $getRumahMakan['namaRM'] ?> " autocomplete>
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah Makan" required data-error="Silahkan masukkan alamat rumah makan" autocomplete value="<?= $getRumahMakan['alamat'] ?>">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="number" class="form-control" id="nohp" name="nohp" placeholder="No.Hp Rumah Makan" required data-error="Silahkan masukkan no.hp rumah makan" autocomplete value="<?= $getRumahMakan['nohp'] ?>">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Pemilik Rumah Makan" required data-error="Silahkan masukkan pemilik rumah makan" autocomplete value="<?= $getRumahMakan['pemilik'] ?>">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>

							<div class="col-md-12">
								<div class="row">
							        <div class="col-md-3 ">
							            <div class="card">
							                <div class="imgWrap">
							                    <img width="10" src="img/<?= $getRumahMakan['gambar'] ?>" id="imgView" class="card-img-top img-fluid">
							                </div>
							                <div class="card-body">
							                    <div class="custom-file">
							                    	<input hidden="" value="<?= $getRumahMakan['gambar'] ?>"  name="inputFileLama">

							                        <input name="inputFile" type="file" id="inputFile" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
							                        <label class="custom-file-label" for="inputFile">Choose file</label>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
								<div class="submit-button text-center">
									<button class="btn btn-common" name="editRumahMakan" id="submit" type="submit">Edit Rumah Makan</button>
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
</body>
	<script>
	CKEDITOR.editorConfig = function( config ) {
	config.language = 'es';
	config.uiColor = '#F7B42C';
	config.height = 300;
	config.toolbarCanCollapse = true;
};
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
</html>
