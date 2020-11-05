<?php
include '../config.php';
session_start();

if (!isset($_SESSION["login"])) {

	header("Location:login.php");

	exit;
}
$url = $_GET['url'];

if (deleteVideo($url) > 0) {


	echo "<script> alert('hapus berhasil');


				   document.location.href = 'listGaleri.php'; </script>";
} else {


	echo "<script> alert('hapus gagal');


				   document.location.href = 'listGaleri.php' </script>";
}
