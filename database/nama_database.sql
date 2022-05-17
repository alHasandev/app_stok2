-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2020 pada 00.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nama_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` char(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_absensi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_absensi` (
`id` int(11)
,`id_siswa` int(11)
,`id_kelas` int(11)
,`tanggal` date
,`status` char(1)
,`keterangan` text
,`nis` char(8)
,`nama_siswa` varchar(100)
,`nama_kelas` varchar(100)
,`wali_kelas` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_jadpel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_jadpel` (
`id` int(11)
,`id_kelas` int(11)
,`id_mapel` int(11)
,`id_pengajar` int(11)
,`id_jadwal` int(11)
,`nama_kelas` varchar(100)
,`nama_mapel` char(4)
,`nama_pengajar` varchar(100)
,`tahun` year(4)
,`semester` int(11)
,`hari` int(11)
,`nama_sesi` varchar(100)
,`jam_mulai` varchar(10)
,`jam_selesai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_jadwal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_jadwal` (
`id` int(11)
,`tahun` year(4)
,`semester` int(11)
,`hari` int(11)
,`id_sesi` int(11)
,`nama_sesi` varchar(100)
,`jam_mulai` varchar(10)
,`jam_selesai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_kelas`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_kelas` (
`id` int(11)
,`nama` varchar(100)
,`id_wali` int(11)
,`wali_kelas` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_siswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_siswa` (
`id` int(11)
,`id_kelas` int(11)
,`nis` char(8)
,`nama` varchar(100)
,`nama_kelas` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadpel`
--

CREATE TABLE `jadpel` (
  `id` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_wali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_singkat` char(4) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_table`
--

CREATE TABLE `nama_table` (
  `id` int(11) NOT NULL,
  `field_satu` varchar(50) NOT NULL,
  `field_dua` varchar(50) NOT NULL,
  `field_tiga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` char(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` char(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_jam`
--

CREATE TABLE `sesi_jam` (
  `id` int(11) NOT NULL,
  `nama_sesi` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `posisi` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_absensi`
--
DROP TABLE IF EXISTS `detail_absensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_absensi`  AS  select `absensi`.`id` AS `id`,`absensi`.`id_siswa` AS `id_siswa`,`absensi`.`id_kelas` AS `id_kelas`,`absensi`.`tanggal` AS `tanggal`,`absensi`.`status` AS `status`,`absensi`.`keterangan` AS `keterangan`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama_siswa`,`detail_kelas`.`nama` AS `nama_kelas`,`detail_kelas`.`wali_kelas` AS `wali_kelas` from ((`absensi` join `siswa` on(`absensi`.`id_siswa` = `siswa`.`id`)) left join `detail_kelas` on(`absensi`.`id_kelas` = `detail_kelas`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_jadpel`
--
DROP TABLE IF EXISTS `detail_jadpel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_jadpel`  AS  select `jadpel`.`id` AS `id`,`jadpel`.`id_kelas` AS `id_kelas`,`jadpel`.`id_mapel` AS `id_mapel`,`jadpel`.`id_pengajar` AS `id_pengajar`,`jadpel`.`id_jadwal` AS `id_jadwal`,`kelas`.`nama` AS `nama_kelas`,`mapel`.`nama_singkat` AS `nama_mapel`,`pengajar`.`nama` AS `nama_pengajar`,`detail_jadwal`.`tahun` AS `tahun`,`detail_jadwal`.`semester` AS `semester`,`detail_jadwal`.`hari` AS `hari`,`detail_jadwal`.`nama_sesi` AS `nama_sesi`,`detail_jadwal`.`jam_mulai` AS `jam_mulai`,`detail_jadwal`.`jam_selesai` AS `jam_selesai` from ((((`jadpel` join `detail_jadwal` on(`jadpel`.`id_jadwal` = `detail_jadwal`.`id`)) join `kelas` on(`jadpel`.`id_kelas` = `kelas`.`id`)) join `mapel` on(`jadpel`.`id_mapel` = `mapel`.`id`)) join `pengajar` on(`jadpel`.`id_pengajar` = `pengajar`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_jadwal`
--
DROP TABLE IF EXISTS `detail_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_jadwal`  AS  select `jadwal`.`id` AS `id`,`jadwal`.`tahun` AS `tahun`,`jadwal`.`semester` AS `semester`,`jadwal`.`hari` AS `hari`,`jadwal`.`id_sesi` AS `id_sesi`,`sesi_jam`.`nama_sesi` AS `nama_sesi`,date_format(`sesi_jam`.`jam_mulai`,'%H:%i') AS `jam_mulai`,date_format(`sesi_jam`.`jam_selesai`,'%H:%i') AS `jam_selesai` from (`jadwal` join `sesi_jam` on(`jadwal`.`id_sesi` = `sesi_jam`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_kelas`
--
DROP TABLE IF EXISTS `detail_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_kelas`  AS  select `kelas`.`id` AS `id`,`kelas`.`nama` AS `nama`,`pengajar`.`id` AS `id_wali`,`pengajar`.`nama` AS `wali_kelas` from (`kelas` left join `pengajar` on(`kelas`.`id_wali` = `pengajar`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_siswa`
--
DROP TABLE IF EXISTS `detail_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_siswa`  AS  select `siswa`.`id` AS `id`,`kelas`.`id` AS `id_kelas`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`kelas`.`nama` AS `nama_kelas` from (`siswa` left join `kelas` on(`siswa`.`id_kelas` = `kelas`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `jadpel`
--
ALTER TABLE `jadpel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pengajar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sesi` (`id_sesi`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wali` (`id_wali`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nama_table`
--
ALTER TABLE `nama_table`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sesi_jam`
--
ALTER TABLE `sesi_jam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadpel`
--
ALTER TABLE `jadpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nama_table`
--
ALTER TABLE `nama_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sesi_jam`
--
ALTER TABLE `sesi_jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
