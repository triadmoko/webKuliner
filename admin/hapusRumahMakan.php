<?php
include '../config.php';
$url = $_GET['url'];

if (hapusRumahMakan($url) > 0) {


	echo "<script> alert('hapus berhasil');


				   document.location.href = 'menu.php'; </script>";
} else {


	echo "<script> alert('hapus gagal');


				   document.location.href = 'menu.php' </script>";
}
