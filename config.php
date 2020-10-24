<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "kuliner");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// fungsi tambah kuliner
function tambah($data) {
	global $conn;
	$namaKuliner = htmlspecialchars($data["namaKuliner"]);
	$harga = htmlspecialchars($data["harga"]);
	$jenisKuliner = htmlspecialchars($data["jenisKuliner"]);
	$url = htmlspecialchars($data["url"]);
	// $gambar = htmlspecialchars($data["inputFile"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO `shop` 
				(`id`, `nama`, `jenis`, `harga`, `gambar`, `gojek`) 
				VALUES (NULL, '$namaKuliner', '$jenisKuliner', '$harga', '$gambar', '$url');
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


// fungsi tambah rumah makan
function addRumahMakan($data) {
	global $conn;
	$namaRumahMakan = htmlspecialchars($data['namaRM']);
	$alamat = htmlspecialchars($data['alamat']);
	$nohp = htmlspecialchars($data['nohp']);
	$pemilik = htmlspecialchars($data['pemilik']);

	// add gambar dari rumah makan
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO `rm`
				(`id`, `namaRM`, `pemilik`, `alamat`, `nohp`, `gambar`) 
			VALUES (NULL,'$namaRumahMakan','$pemilik','$alamat','$nohp','$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['inputFile']['name'];
	$ukuranFile = $_FILES['inputFile']['size'];
	$error = $_FILES['inputFile']['error'];
	$tmpName = $_FILES['inputFile']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 3000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM shop WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapusRumahMakan($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM rm WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$namaKuliner = htmlspecialchars($data["namaKuliner"]);
	$harga = htmlspecialchars($data["harga"]);
	$jenisKuliner = htmlspecialchars($data["jenisKuliner"]);
	$url = htmlspecialchars($data["url"]);
	$gambarLama = htmlspecialchars($data["inputFilelama"]);

	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['inputFile']['error'] === 4 ) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}
	

	$query = "UPDATE shop SET
				nama = '$namaKuliner',
				jenis = '$jenisKuliner',
				harga = '$harga',
				gambar = '$Gambar',
				gojek = '$url'

			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}
function editRumahMakan($data) {
	global $conn;

	$id = $data["id"];
	$namaRumahMakan = htmlspecialchars($data['namaRM']);
	$alamat = htmlspecialchars($data['alamat']);
	$nohp = htmlspecialchars($data['nohp']);
	$pemilik = htmlspecialchars($data['pemilik']);
	$gambarLama = htmlspecialchars($data["inputFileLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['inputFile']['error'] === 4 ) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}
	

	$query = "UPDATE rm SET
				namaRM = '$namaRumahMakan',
				pemilik = '$pemilik',
				alamat = '$alamat',
				nohp = '$nohp',
				gambar = '$Gambar'

			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function cari($keyword) {
	$query = "SELECT * FROM shop
				WHERE
			  nama LIKE '%$keyword%' LIMIT 0,12
			";
	return query($query);
}


function registrasi($data) {
	global $conn;
	$username = htmlspecialchars($data["username"]);
	$Password = mysqli_real_escape_string($conn, $data["password1"]);
	$Confirm_Password = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM admin WHERE email = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Email sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $Password !== $Confirm_Password ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$Password = password_hash($Password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn,"INSERT INTO `admin` (`id`, `email`, `password`) VALUES (NULL, '$username', '$Password');");

	return mysqli_affected_rows($conn);

}
