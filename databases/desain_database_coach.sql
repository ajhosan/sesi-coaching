-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2021 pada 01.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desain_database_coach`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action_plan`
--

CREATE TABLE `action_plan` (
  `id_actionplan` int(11) NOT NULL,
  `action_plan` text NOT NULL,
  `berhasil` varchar(20) DEFAULT NULL,
  `tidak_berhasil` varchar(20) DEFAULT NULL,
  `butuh_waktu_lama` varchar(20) DEFAULT NULL,
  `deskripsi_coach` text NOT NULL,
  `result_coach` text NOT NULL,
  `date_created` date NOT NULL,
  `action_plan_mingguke` varchar(20) NOT NULL,
  `id_goals` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `action_plan`
--

INSERT INTO `action_plan` (`id_actionplan`, `action_plan`, `berhasil`, `tidak_berhasil`, `butuh_waktu_lama`, `deskripsi_coach`, `result_coach`, `date_created`, `action_plan_mingguke`, `id_goals`, `id_user`) VALUES
(1, 'qweqw', NULL, '✔', NULL, '', '', '2021-03-01', '2', 7, 1),
(5, 'Nomo5', '✔', '✔', NULL, '', '', '2021-03-01', '2', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coach_name`
--

CREATE TABLE `coach_name` (
  `id_coach` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `coach_name`
--

INSERT INTO `coach_name` (`id_coach`, `nama`) VALUES
(1, 'Antonius Arif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goals`
--

CREATE TABLE `goals` (
  `id_goals` int(11) NOT NULL,
  `goals` text NOT NULL,
  `duedate` date NOT NULL,
  `date_created` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `goals`
--

INSERT INTO `goals` (`id_goals`, `goals`, `duedate`, `date_created`, `id_user`) VALUES
(1, 'Test', '2021-03-03', '0000-00-00', 1),
(3, 'YER', '2021-03-18', '0000-00-00', 1),
(4, '2321312', '2021-03-12', '0000-00-00', 1),
(5, '123123', '2021-03-11', '0000-00-00', 1),
(6, 'qweeqwe', '2021-03-19', '2021-03-01', 1),
(7, 'Testtttt', '2021-03-12', '2021-03-01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `result`
--

CREATE TABLE `result` (
  `id_result` int(11) NOT NULL,
  `result` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(120) NOT NULL,
  `validasi_inpirasi` varchar(20) DEFAULT NULL,
  `id_coach` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `username`, `password`, `validasi_inpirasi`, `id_coach`, `id_role`, `is_active`, `date_created`) VALUES
(1, 'Alex Jhosan Abdillah', 'alexjhosan19@gmail.com', 'ajhosan', '$2y$10$6/t4cqo27UdTrarThxAh4ecXyZ4TdGljJPpMBQTvAYHmvmrPl0Qpy', 'T', 1, 1, 1, 1614575175),
(2, 'Coach 1', 'alexruew@gmail.com', '', '$2y$10$2htXTKZJ6yOn.DedexqAJOORr2M5stFasKosl5aSxfoxckMkvXPWO', NULL, NULL, 2, 1, 1614624539);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Coaches'),
(2, 'Coach'),
(3, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `action_plan`
--
ALTER TABLE `action_plan`
  ADD PRIMARY KEY (`id_actionplan`),
  ADD KEY `id_goals` (`id_goals`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `coach_name`
--
ALTER TABLE `coach_name`
  ADD PRIMARY KEY (`id_coach`);

--
-- Indeks untuk tabel `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id_goals`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_result`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `COACH` (`id_coach`) USING BTREE;

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `action_plan`
--
ALTER TABLE `action_plan`
  MODIFY `id_actionplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `coach_name`
--
ALTER TABLE `coach_name`
  MODIFY `id_coach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `goals`
--
ALTER TABLE `goals`
  MODIFY `id_goals` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `result`
--
ALTER TABLE `result`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `action_plan`
--
ALTER TABLE `action_plan`
  ADD CONSTRAINT `action_plan_ibfk_1` FOREIGN KEY (`id_goals`) REFERENCES `goals` (`id_goals`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `action_plan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_coach`) REFERENCES `coach_name` (`id_coach`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
