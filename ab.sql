-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 06.43
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `password`) VALUES
('Admin', 'administrator', '21232f297a57a5a743894a0e4a801fc3'),
('Admin01', 'Allisha', '7b7bc2512ee1fedcd76bdc68926d4f7b'),
('admin02', 'Ratna Dewinta Hardian', '18c6d818ae35a3e8279b5330eda01498'),
('admin03', 'Adinda Putri Maharani', '6e60a28384bc05fa5b33cc579d040c56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_masuk`
--

CREATE TABLE `jam_masuk` (
  `jam` datetime NOT NULL,
  `bts_absen` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam_masuk`
--

INSERT INTO `jam_masuk` (`jam`, `bts_absen`) VALUES
('2021-10-26 11:00:00', '2021-10-26');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jmlkehadiran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jmlkehadiran` (
`NIS` varchar(25)
,`username` varchar(25)
,`Namalengkap` varchar(100)
,`Kelas` varchar(25)
,`Tanggal` timestamp
,`Hadir` int(11)
,`Telat` int(11)
,`Sakit` int(11)
,`Izin` int(11)
,`Verifikasi` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Hadir` int(11) NOT NULL,
  `Telat` int(11) NOT NULL,
  `Sakit` int(11) NOT NULL,
  `Izin` int(11) NOT NULL,
  `Verifikasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `username`, `Tanggal`, `Hadir`, `Telat`, `Sakit`, `Izin`, `Verifikasi`) VALUES
(1, 'dewi321', '2021-10-14 18:22:46', 1, 0, 0, 0, 1),
(2, 'lisa23', '2021-10-14 18:26:04', 1, 0, 0, 0, 1),
(3, 'dinda', '2021-10-15 14:06:03', 0, 0, 0, 1, 1),
(4, 'lisa23', '2021-10-22 06:41:53', 0, 1, 0, 0, 1),
(5, 'dinda', '2021-10-22 06:43:19', 0, 0, 1, 0, 1),
(6, 'dinda', '2021-10-25 02:23:50', 0, 1, 0, 0, 1),
(10, 'dinda', '2021-10-26 04:08:52', 1, 0, 0, 0, 1),
(11, 'dewi321', '2021-10-26 04:10:06', 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `username` varchar(25) NOT NULL,
  `NIS` varchar(25) NOT NULL,
  `Namalengkap` varchar(100) NOT NULL,
  `Kelas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`username`, `NIS`, `Namalengkap`, `Kelas`) VALUES
('dewi321', '1192829', 'Ratna Dewinta Hardian', 'XII - RPL 2'),
('dinda', '27272721', 'Adinda Putri Maharani', 'XII - RPL 2'),
('lisa23', '6162613814', 'Allisha', 'XII - RPL 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_bulanan`
--

CREATE TABLE `rekap_bulanan` (
  `id_rekbul` int(11) NOT NULL,
  `jum_hadir` int(11) NOT NULL,
  `jum_sakit` int(10) NOT NULL,
  `jum_izin` int(10) NOT NULL,
  `jum_alpha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur untuk view `jmlkehadiran`
--
DROP TABLE IF EXISTS `jmlkehadiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jmlkehadiran`  AS SELECT `murid`.`NIS` AS `NIS`, `murid`.`username` AS `username`, `murid`.`Namalengkap` AS `Namalengkap`, `murid`.`Kelas` AS `Kelas`, `kehadiran`.`Tanggal` AS `Tanggal`, `kehadiran`.`Hadir` AS `Hadir`, `kehadiran`.`Telat` AS `Telat`, `kehadiran`.`Sakit` AS `Sakit`, `kehadiran`.`Izin` AS `Izin`, `kehadiran`.`Verifikasi` AS `Verifikasi` FROM (`kehadiran` join `murid` on(`kehadiran`.`username` = `murid`.`username`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `jam_masuk`
--
ALTER TABLE `jam_masuk`
  ADD PRIMARY KEY (`jam`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `NIS` (`username`) USING BTREE;

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indeks untuk tabel `rekap_bulanan`
--
ALTER TABLE `rekap_bulanan`
  ADD PRIMARY KEY (`id_rekbul`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rekap_bulanan`
--
ALTER TABLE `rekap_bulanan`
  MODIFY `id_rekbul` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`username`) REFERENCES `murid` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
