-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 07:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas_sekolah`
--

CREATE TABLE `identitas_sekolah` (
  `id` int(10) NOT NULL,
  `nama_sekolah` varchar(128) NOT NULL,
  `alamat_sekolah` varchar(128) NOT NULL,
  `email_sekolah` varchar(128) NOT NULL,
  `telepon_sekolah` varchar(128) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_sekolah`
--

INSERT INTO `identitas_sekolah` (`id`, `nama_sekolah`, `alamat_sekolah`, `email_sekolah`, `telepon_sekolah`, `tahun_ajaran`, `semester`) VALUES
(1, 'TK Cabe', 'Jl.Raya Kelapa Sawit Km.02, Pandeglang, Banten', 'admin@admin.gmail.com', '0251(123346)', '2019/2020', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `nama_kelas`) VALUES
(1, 1, 'X-IPA-1'),
(2, 1, 'X-IPA-2'),
(3, 2, 'X-IPS-1'),
(4, 2, 'X-IPS-2'),
(5, 1, 'XI-IPA-1'),
(6, 1, 'XI-IPA-2'),
(9, 2, 'XI-IPS-1'),
(10, 2, 'XI-IPS-2'),
(11, 1, 'XII-IPA-1'),
(12, 1, 'XII-IPA-2'),
(13, 2, 'XII-IPS-1'),
(14, 2, 'XII-IPS-2'),
(15, 1, 'Tk Kelas A');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_jurusan`, `nama_mapel`, `kkm`) VALUES
(1, 1, 'Biologi', 76),
(2, 2, 'Ekonomi', 76),
(5, 3, 'PPKN', 75),
(6, 3, 'Matematika', 76),
(7, 3, 'Bahasa Inggris', 75),
(8, 3, 'Bahasa Indonesia', 75),
(10, 1, 'Fisika', 76),
(11, 1, 'Kimia', 76),
(13, 2, 'Geografi', 76),
(14, 2, 'Sosiologi', 76);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `nis` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`nis`, `email`, `nama`, `alamat`, `id_jurusan`, `id_kelas`, `image`) VALUES
('1', 'admin@admin.com', 'Admin', '-', 0, 0, 'default.jpg'),
('18926123154', 'fadlyoktapriadi51@gmail.com', 'fadly', 'pandeglang', 1, 13, 'default.jpg'),
('1906001', 'momo@gmail.com', 'Momo', 'Serang', 1, 1, 'default.jpg'),
('1906002', 'ucok@gmail.com', 'Ucok', 'Cikarang', 2, 2, 'default.jpg'),
('1906003', 'asepnurohman@gmail.com', 'Asep Nurohman', 'Bandung', 1, 1, 'default.jpg'),
('3', 'koplakanda1@gmail.com', 'dipta', 'jakarta', 2, 10, 'default2.jpg'),
('6', 'haryadipradipta@gmail.com', 'dipta', 'jakarta', 1, 1, 'default1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `mapel` varchar(128) NOT NULL,
  `angka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `mapel`, `angka`) VALUES
(36, 1906001, 'PPKN', 79),
(37, 1906001, 'Matematika', 85),
(40, 1906001, 'Biologi', 76),
(41, 1906001, 'Kimia', 77),
(42, 1906001, 'Fisika', 80),
(50, 1906001, 'Bahasa Inggris', 82),
(51, 1906001, 'Bahasa Indonesia', 88),
(60, 1906003, 'PPKN', 68),
(61, 1906003, 'Bahasa Inggris', 48),
(62, 1906003, 'Bahasa Indonesia', 63),
(63, 1906003, 'Fisika', 84),
(64, 1906003, 'Kimia', 79),
(65, 6, 'Matematika', 80);

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE `rapor` (
  `id_rapor` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alfa` int(11) NOT NULL,
  `ekskul` varchar(20) NOT NULL,
  `nilai_ekskul` varchar(1) NOT NULL,
  `ahlak` varchar(1) NOT NULL,
  `kedisiplinan` varchar(1) NOT NULL,
  `kerajinan` varchar(1) NOT NULL,
  `kebersihan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapor`
--

INSERT INTO `rapor` (`id_rapor`, `nis`, `id_kelas`, `sakit`, `izin`, `alfa`, `ekskul`, `nilai_ekskul`, `ahlak`, `kedisiplinan`, `kerajinan`, `kebersihan`) VALUES
(3, '1906001', 1, 2, 1, 1, 'Pramuka', 'B', 'A', 'B', 'B', '2'),
(6, '1906003', 1, 4, 2, 3, 'PMR', 'B', 'B', 'C', 'D', 'B'),
(7, '6', 1, 1, 1, 1, 'Pramuka', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `role_id`) VALUES
('admin@admin.com', '$2y$10$04DzOTIWBXommjxoyK5CfuKmLB0Jym7BST7gMpScktOUB2cbx/qyy', 1),
('alfinuryani@gmail.com', '$2y$10$04DzOTIWBXommjxoyK5CfuKmLB0Jym7BST7gMpScktOUB2cbx/qyy', 2),
('asepnurohman@gmail.com', '$2y$10$04DzOTIWBXommjxoyK5CfuKmLB0Jym7BST7gMpScktOUB2cbx/qyy', 3),
('fadlyoktapriadi51@gmail.com', '$2y$10$XQ3Ts6lcYW7K1FKUQMnNTeeqcNYgXMtLBm5RupGERuRiBYiRx.I4O', 3),
('haryadipradipta@gmail.com', '$2y$10$YJj8fQ6C3IZin2BaOA599.g70stp0RDVq2KEOE7bt7nj9V2/TJdEy', 3),
('koplakanda1@gmail.com', '$2y$10$FmA5cCVu4fJY.hp.Wj6s6.SikDiYK6/OkIbpc8GtFMMn5lLoqxVYO', 3),
('momo@gmail.com', '$2y$10$P5DW6AzpJnWU.AggxRR8auYMztbKwZ03YVjioS0C6n3gobHKYMUTq', 3),
('tatang@gmail.com', '$2y$10$vnpQ1aLUkdxEsilUMQobZew6JJdooKmOA0MRVFwAaJwwvuV.Acd/G', 2),
('ucok@gmail.com', '$2y$10$gBUhx/W/xIq9/J5pLkgnjuUxYs2dKe4ZVrUfjuPhDrPS3/xFK7KCO', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 3, 2),
(5, 2, 4),
(6, 2, 2),
(7, 3, 5),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'MENU'),
(4, 'WALIKELAS'),
(5, 'MURID');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Walikelas'),
(3, 'Murid');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `sub_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`sub_id`, `menu_id`, `title`, `icon`, `url`) VALUES
(1, 1, 'Dashboard', 'fa fa-fw fa-tachometer-alt', 'admin'),
(2, 2, 'My Profile', 'fa fa-fw fa-user', 'user'),
(3, 3, 'Menu Management', 'fa fa-fw fa-folder', 'menu'),
(4, 3, 'Sub Menu Management', 'fa fa-fw fa-folder-open', 'menu/submenu'),
(5, 1, 'Role', 'fas fa-fw fa-user-tag', 'admin/role'),
(6, 2, 'Change Password', 'fas fa-fw fa-key', 'user/changepassword'),
(7, 1, 'Identitas Sekolah', 'fas fa-fw fa-school', 'admin/identitas'),
(8, 1, 'Data Mata Pelajaran', 'fas fa-fw fa-list', 'admin/mapel'),
(9, 1, 'Data Kelas', 'fas fa-fw fa-list-alt', 'admin/kelas'),
(10, 1, 'Data Wali Kelas', 'fas fa-fw fa-chalkboard-teacher', 'admin/walikelas'),
(11, 1, 'Data Murid', 'fas fa-fw fa-user-graduate', 'admin/murid'),
(12, 1, 'Data Rapor', 'fas fa-fw fa-book', 'admin/rapor'),
(13, 5, 'Rapor', 'fas fa-fw fa-book', 'user/rapor'),
(14, 4, 'Data Rapor', 'fas fa-fw fa-book', 'walikelas/rapor');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date`) VALUES
(17, 'fadlyoktapriadi51@gmail.com', '9H2SbZ93Qew22+OW6URDzjmOawoMO6LdGTOYaAuqsw4=', 1568551437);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `nip` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`nip`, `email`, `nama`, `id_kelas`, `alamat`, `no_hp`, `image`) VALUES
('152441152284462', 'tatang@gmail.com', 'Tatang Mustofa', 2, 'Bandung', '087774451166', 'default.jpg'),
('1968050715542001', 'alfinuryani@gmail.com', 'Alfi Nuryani', 1, 'Serang', '083812648522', 'prrryt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_jurusan_2` (`id_jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id_rapor`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`menu_id`),
  ADD KEY `menu_id` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id_rapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rapor`
--
ALTER TABLE `rapor`
  ADD CONSTRAINT `rapor_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rapor_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `murid` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
