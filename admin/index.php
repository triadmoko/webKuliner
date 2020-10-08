<?php 
session_start();
include '../config.php';

  if(!isset($_SESSION["login"]) ) {

    header("Location:login.php");

    exit;

  }

  if (isset($_POST['addKuliner'])) {

      if (tambah($_POST) > 0) {

        echo "<script>alert ('data berhasil ditambahkan')</script>";

      }else{

      echo "<script>alert ('data gagal')</script>";
  	}
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta http-equiv="refresh" content="">
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
					<form method="POST" enctype="multipart/form-data">
						<fieldset>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="namaKuliner" placeholder="Nama Kuliner" required data-error="Silahkan masukkan Nama kuliner" autocomplete>
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Harga" id="rupiah" class="form-control" name="harga" required data-error="Silahkan masukkan harga">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select class="custom-select d-block form-control" id="guest" required data-error="Please Select Person" name="jenisKuliner">
									  <option disabled selected>Pilih Jenis Kuliner*</option>
									  <option value="makanan">Makanan</option>
									  <option value="minuman">Minuman</option>
									</select>
									<div class="help-block with-errors"></div>
								</div> 
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="url" name="url" id="url" placeholder="https://gofood.link/u/example" pattern="https://.*" size="30" class="form-control" id="name" required data-error="Silahkan Url GoFood">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							
							<div class="col-md-12">
								<div class="row">
							        <div class="col-md-3 ">
							            <div class="card">
							                <div class="imgWrap">
							                    <img width="10" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" id="imgView" class="card-img-top img-fluid">
							                </div>
							                <div class="card-body">
							                    <div class="custom-file">
							                        <input name="inputFile" type="file" id="inputFile" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
							                        <label class="custom-file-label" for="inputFile">Choose file</label>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
								<div class="submit-button text-center">
									<button class="btn btn-common" name="addKuliner" id="submit" type="submit">Tambah Kuliner</button>
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
<!-- end footer -->
<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
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

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
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

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
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