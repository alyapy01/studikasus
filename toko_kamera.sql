-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2023 pada 14.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_kamera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamera`
--

CREATE TABLE `kamera` (
  `id_kamera` int(11) NOT NULL,
  `nama_kamera` varchar(100) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kamera`
--

INSERT INTO `kamera` (`id_kamera`, `nama_kamera`, `harga`, `foto`, `id_kategori`, `id_supplier`) VALUES
(3, 'Sony Alpha A6000', '$999.90', 'foto1.jpg', 11, 31),
(4, 'Sony HDR-AS50R', '$4320.00', 'foto4.jpg', 22, NULL),
(5, 'Sony HDR-AS300R', '$3680.00', 'foto5.jpg', 22, NULL),
(6, 'Sony RX0', '$6320.90', 'foto6.jpg', 22, NULL),
(7, 'Sony Alpha A6600', '$1499.90', 'foto1.jpg', 11, NULL),
(8, 'Sony Alpha A6600', '$1499.90', 'foto3.jpg', 11, NULL),
(9, 'Sony Alpha A6600', '$1499.90', '', 22, NULL),
(10, 'Sony Alpha A6600', '$1499.90', '', 11, NULL),
(11, 'Sony Alpha A6600', '$1499.90', 'foto1.jpg', 11, NULL),
(12, 'Sony Alpha A6600', '$1499.90', 'foto2.jpg', 11, 312),
(13, 'Sony Alpha A7 III', '$2499.90', 'foto3.jpg', 11, 313),
(14, 'Sony HDR-AS50R', '$4320.00', 'foto5.jpg', 11, 314),
(16, 'Sony Alpha A6000', '$4320.00', 'foto1.jpg', 11, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, 'DSLR'),
(22, 'Action Cam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(31, 'PT Sony Indonesia', 'Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', '+62-21-29498788'),
(312, 'PT Sony Indonesia ', 'Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', '+62-21-29498788'),
(313, 'PT Sony Indonesia ', 'Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', '+62-21-29498788'),
(314, 'PT Sony Indonesia ', 'Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', '+62-21-29498788'),
(315, 'PT Sony Indonesia ', 'Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', ''),
(316, 'PT Sony Indonesia ', 'Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', ''),
(317, 'PT Sony Indonesia ', 'Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia', '+62-21-29498788');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`id_kamera`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamera`
--
ALTER TABLE `kamera`
  MODIFY `id_kamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kamera`
--
ALTER TABLE `kamera`
  ADD CONSTRAINT `kamera_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kamera_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
