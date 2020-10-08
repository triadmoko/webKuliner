-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Okt 2020 pada 13.57
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(3, 'adek', '$2y$10$9B1vSCdIrwmYyZojfrckue2uMWSgPopypSSU7N4PXoGW5QBe2eJ06'),
(4, 'triadmoko12@gmail.com', '$2y$10$VlQgT8u9rYHHIHBzC5uQZ.KkwLGA9xf.DKqQwQYnLEkUaabMZE0WG'),
(5, 'tr@tr.com', '$2y$10$oJ5b2RGCToH80OK2bkjqY.vkItUZCics3YZt6hcxwkWQF6oJA2WAS'),
(6, 'adek@gmail.com', '$2y$10$nstp9S2IETAJwjcfYSZnx.veFtMMi1qOcokTlTd94UiP8GI0DCm1u');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rm`
--

CREATE TABLE `rm` (
  `id` int(11) NOT NULL,
  `namaRM` int(11) NOT NULL,
  `pemilik` int(11) NOT NULL,
  `alamat` int(11) NOT NULL,
  `nohp` int(11) NOT NULL,
  `deskripsi` int(11) NOT NULL,
  `gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gojek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shop`
--

INSERT INTO `shop` (`id`, `nama`, `jenis`, `harga`, `gambar`, `gojek`) VALUES
(45, 'Ikan Goreng', 'minuman', 'Rp. 22.000', '5f6757308689f.png', 'https://www.google.com/'),
(46, 'ayam goreng', 'minuman', 'Rp. 22.000', '5f6757399d4e5.png', ''),
(48, 'Ikan Goreng', 'makanan', 'Rp. 22.000', '5f675b9fca604.png', 'https://github.com/benzBrake/ShortLinks'),
(50, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(51, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(52, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(53, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(54, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(55, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(56, 'Nasi Goreng', 'minuman', 'Rp. 22.000', '5f67572556d48.png', 'https://github.com/benzBrake/ShortLink'),
(57, 'ayam goreng', 'makanan', 'Rp. 9.000', '5f7c7557ad5c9.png', 'https://www.instagram.com/tv/B-B9DscpKqC/?utm_source=ig_web_copy_link'),
(58, 'ikan bakar', 'makanan', 'Rp. 220.000', '5f7c9cdeb6c24.png', 'https://github.com/benzBrake/ShortLinks'),
(59, 'Udang ', 'makanan', 'Rp. 23.000', '5f7ee115215c4.jpg', 'https://github.com/triadmoko/DTS-Web-Developer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
