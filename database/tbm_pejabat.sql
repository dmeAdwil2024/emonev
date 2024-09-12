-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 10:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emonev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbm_pejabat`
--

CREATE TABLE `tbm_pejabat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dir` varchar(50) NOT NULL DEFAULT '0',
  `id_subdir` varchar(50) NOT NULL DEFAULT '0',
  `nip` varchar(50) NOT NULL,
  `nama_pejabat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbm_pejabat`
--

INSERT INTO `tbm_pejabat` (`id`, `id_dir`, `id_subdir`, `nip`, `nama_pejabat`, `jabatan`, `no_hp`, `email`, `type`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1242', '0', '198505062004121001', 'Mirwan Syarif, S.STP,  MA', 'Kepala Bagian Perencanaan Pada Sekretariat Direktorat Jenderal Bina Administrasi Kewilayahan', '081281112466', 'mirwan.syarif@gmail.com', 'ppk', 'PPK pada Sekretariat Ditjen Bina Administrasi Kewilayahan', '2023-01-16 12:08:07', '2023-01-16 12:08:08'),
(2, '1237', '0', '198004112000121002', 'Raziras Rahmadillah, S.STP,  MA', 'Kepala Subdirektorat Dekonsentrasi dan Tugas Pembantuan', '082210020918', 'arieftrisula@gmail.com', 'ppk', 'PPK pada Direktorat Dekonsentrasi, Tugas Pembantuan dan Kerja Sama', '2023-01-16 12:09:37', '2023-01-16 12:09:38'),
(3, '1238', '0', '197407081993111001', 'Dr.  Drs.  Amran, MT', 'Direktur Kawasan, Perkotaan dan Batas Negara', '08111552055', 'amranjamaldin@gmail.com', 'ppk', 'PPK pada Direktorat Kawasan, Perkotaan dan Batas Negara', '2023-01-16 12:10:53', '2023-01-16 12:10:54'),
(4, '1239', '0', '196804091996031001', 'Edi Samsudin Nasution, SE, M.A.P', 'Kepala Subdirektorat Penyidik Pegawai Negeri Sipil', '081212151809', NULL, 'ppk', 'PPK pada Direktorat Polisi Pamong Praja dan Perlindungan Masyarakat', '2023-01-16 12:11:57', '2023-01-16 12:11:58'),
(5, '1241', '0', '196711041996031005', 'Mardiyana, S.Si, M.Si', 'Kepala Subdirektorat Batas Antar Daerah Wilayah III', '081287915313', NULL, 'ppk', 'Kepala Subdirektorat Batas Antar Daerah Wilayah III', '2023-01-16 12:12:49', '2023-01-16 12:12:52'),
(6, '1240', '0', '198801252010121002', 'Fadhli Azazi, SE', 'Penata Keuangan Pada Subbag Tata Usaha Direktorat Manajemen Penanggulan Bencana dan Kebakaran', '081297267145', NULL, 'ppk', 'PPK pada Direktorat Manajemen Penanggulan Bencana dan Kebakaran', '2023-01-16 12:13:58', '2023-01-16 12:13:59'),
(7, '1241', '12414', '196908271990092001', 'Dra. Astuti Saleh', 'Kasubdit Toponimi Data dan Kodefikasi Wilayah I', '085331789789', NULL, 'pptk', 'PPTK pada Subdit Toponimi Data dan Kodefikasi Wilayah I', '2023-01-16 12:15:18', '2023-01-16 12:15:22'),
(8, '1241', '12414', '197505032001121002', 'Tengku Syahdana, S.Kom', 'Analis Kebijakan Ahli Madya', '08159362023', NULL, 'pptk', 'PPTK pada Subdit Toponimi Data dan Kodefikasi Wilayah II', '2023-01-16 12:16:33', '2023-01-16 12:16:34'),
(9, '1241', '12411', '197806122008011001', 'Aris Ropendi, S.IP', 'Analis Kebijakan Ahli Muda', '081287359585', NULL, 'pptk', 'PPTK pada Subdit Batas Antar Daerah Wilayah I', '2023-01-16 12:17:32', '2023-01-16 12:17:33'),
(10, '1241', '12412', '197009051993011001', 'Teguh Subarto, S.Sos, MM', 'Analis Kebijakan Ahli Madya', '081314045638', NULL, 'pptk', 'PPTK pada Subdit Batas Antar Daerah Wilayah II dan Tata Usaha', '2023-01-16 12:18:10', '2023-01-16 12:18:11'),
(11, '1241', '12413', '198209012008011007', 'Hanafi, S.Si., M.Eng', 'Analis Kebijakan Ahli Muda', '081392414446', NULL, 'pptk', 'PPTK pada Subdit Batas Antar Daerah Wilayah III', '2023-01-16 12:19:05', '2023-01-16 12:19:08'),
(12, '1242', '0', '199201212012061001', 'M. Ahsan Al Amin Rahim, S.STP', 'Perencana Ahli Muda', '089604187227', 'muhammadahsanalamin@gmail.com', 'pptk', 'Pejabat Pelaksana Teknis Kegiatan pada Bagian Perencanaan', '2023-01-16 12:21:02', '2023-01-16 12:21:03'),
(13, '1242', '0', '196811062000122001', 'Endang Murwaningsih, SE', 'Kepala Subbagian Perbendaharaan', '081316292004', NULL, 'pptk', 'Pejabat Pelaksana Teknis Kegiatan pada Bagian Keuangan', '2023-01-16 12:22:16', '2023-01-16 12:22:16'),
(14, '1242', '0', '197608162003121004', 'Aang Hakam Zuwaidi, S.H, M.H', 'Perancang Peraturan Perundang-Undangan Ahli Muda', '085856747678', NULL, 'pptk', 'Pejabat Pelaksana Teknis Kegiatan pada Koordinator Perundang-Undangan', '2023-01-16 12:23:45', '2023-01-16 12:23:47'),
(15, '1242', '0', '198508032009121002', 'Rizza Kamajaya, S.IP, M.SI (HAN)', 'Kepala Bagian Umum', '081281888177', NULL, 'pptk', 'Pejabat Pelaksana Teknis Kegiatan pada Bagian Umum', '2023-01-16 12:24:34', '2023-01-16 12:24:36'),
(16, '1238', '0', '196504071993032001', 'Dra. Nita Efrilliana, M.Dev.Plg', 'Kasubdit Kawasan Khusus Lingkup I', '081386112111', NULL, 'pptk', 'PPTK pada Subdit Kawasan Khusus Lingkup I Dan Subbagian Tata Usaha Direktorat Kawasan, Perkotaan dan Batas Negara', '2023-01-19 09:31:16', '2023-01-19 09:31:17'),
(17, '1238', '0', '196611241997031001', 'Purno Laksito, S.Si., MT', 'Kasubdit Kawasan Khusus Lingkup II', '08118903869', NULL, 'pptk', 'PPTK pada Subdit Kawasan Khusus Lingkup II', '2023-01-19 09:32:46', '2023-01-19 09:32:45'),
(18, '1238', '0', '196902211996031001', 'Nurbowo Edy Subagio, S.SIP, M.Dev', 'Analis Kebijakan Ahli Madya pada Subdit Fasilitasi Masalah Pertanahan', '081294394933', NULL, 'pptk', 'PPTK pada Subdit Fasilitasi Masalah Pertanahan', '2023-01-19 09:32:43', '2023-01-19 09:32:44'),
(19, '1238', '0', '196605201994031001', 'Gensly, SE, MPA', 'Analis Kebijakan Ahli Madya pada Subdit Administrasi Kawasan Perkotaan', '081311055933', NULL, 'pptk', 'PPTK pada Subdit Administrasi Kawasan Perkotaan', '2023-01-19 09:32:48', '2023-01-19 09:32:49'),
(20, '1238', '0', '197709102003121005', 'Nursyah Rizal, SP. M.AP', 'Kasubdit Batas Negara dan Pulau-pulau Terluar', '08111994394', NULL, 'pptk', 'PPTK pada Subdit Batas Antar Negara dan Pulau-pulau Terluar', '2023-01-19 09:32:48', '2023-01-19 09:32:50'),
(21, '1237', '0', '197812021997122001', 'Sitti Hadijah Kodoeboen, S.STP., M.Si', 'Analis Kebijakan Ahli Madya pada Subdit Fasilitasi Gubernur Sebagai Wakil Pemerintah Pusat', '081321277802', NULL, 'pptk', 'PPTK pada Subdit Fasilitasi Gubernur Sebagai Wakil Pemerintah Pusat', '2023-01-19 09:41:26', '2023-01-19 09:41:27'),
(22, '1237', '0', '197603292008121001', 'Cahya Catur Saputra, S.Sos', 'Kasubbag Tata Usaha pada Dit. Dekonsentrasi, Tugas Pembantuan dan Kerja Sama', '08122746394', NULL, 'pptk', 'PPTK pada Subdit Dekonsentrasi dan Tugas Pembantuan', '2023-01-19 09:41:31', '2023-01-19 09:41:29'),
(23, '1237', '0', '196808261993031001', 'Drs. Bimo Aryo Tedjo, M.Si', 'Kasubdit Kerja Sama dan Penyelesaian Perselisihan Antar Daerah', '081288583759', NULL, 'pptk', 'PPTK pada Subdit Kerja Sama dan Penyelesaian Perselisihan Antar Daerah', '2023-01-19 09:41:32', '2023-01-19 09:41:30'),
(24, '1237', '0', '196806241997031009', 'S. Halomoan Pakpahan, ST., M.Si.', 'Analis Kebijakan Ahli Madya pada Subdit Fasilitasi Pelayanan Umum', '081316928948', NULL, 'pptk', 'PPTK pada Subdit Fasilitasi Pelayanan Umum', '2023-01-19 09:41:33', '2023-01-19 09:41:35'),
(25, '1237', '0', '197905061998031003', 'Edi Cahyono, S.STP, M.AP', 'Analis Kebijakan Ahli Madya pada Subdit Kecamatan', '081314649786', NULL, 'pptk', 'PPTK pada Subdit Kecamatan', '2023-01-19 09:41:33', '2023-01-19 09:41:34'),
(26, '1239', '0', '196805291995031001', 'Beny Marolop Pakpahan, SP, MT', 'Kasubdit Tata Operasional dan Standarisasi Polisi Pamong Praja', '081317811220', NULL, 'pptk', 'PPTK pada Subdit Tata Operasional dan Standarisasi Polisi Pamong Praja', '2023-01-19 09:49:58', '2023-01-19 09:50:00'),
(27, '1239', '0', '196708311993032001', 'Dra. Agustin Firstyowati, M.AP', 'Kasubdit Peningkatan Kapasitas SDM Pol. Pamong Praja', '08161157804', NULL, 'pptk', 'PPTK pada Subdit Peningkatan Kapasitas SDM Polisi Pamong Praja', '2023-01-19 09:50:01', '2023-01-19 09:49:59'),
(28, '1239', '0', '198704232006021001', 'Fadly Elwa Purwansyah, S. STP, ME', 'Kasubdit Perlindungan Masyarakat', '081366635000', NULL, 'pptk', 'PPTK pada Subdit Perlindungan Masyarakat', '2023-01-19 09:50:02', '2023-01-19 09:50:05'),
(29, '1239', '0', '196804091996031001', 'Edi Samsudin Nasution SE, M.AP', 'Kasubdit Penyidik Pegawai Negeri Sipil', '081212151809', NULL, 'pptk', 'PPTK pada Subdit Penyidik Pegawai Negeri Sipil', '2023-01-19 09:50:02', '2023-01-19 09:50:05'),
(30, '1239', '0', '196601291986032001', 'Dwi Sriyani, SE', 'Analis Kebijakan Ahli Muda Pada Seksi Fasilitasi Konvensi Internasional Subdit Perlindungan Hak-Hak Sipil dan Hak Asasi Manusia', '081385612650', NULL, 'pptk', 'PPTK pada Subdit Perlingdungan Hak-Hak Sipil dan Hak Asasi Manusia', '2023-01-19 09:50:03', '2023-01-19 09:50:04'),
(31, '1240', '0', '197205122001121001', 'Fredrick Simatupang, ST., MM', 'Analis Kebijakan Ahli Madya pada Subdit Pengurangan Risiko Bencana', '082211555500', NULL, 'pptk', 'PPTK pada Subdit Pengurangan Risiko Bencana\r\n\r\n\r\n', '2023-01-19 09:56:19', '2023-01-19 09:56:25'),
(32, '1240', '0', '19721011200121001', 'Evan Fardianto, ST., MAB', 'Analis Kebijakan Ahli Madya pada Subdit Sarana Prasarana dan Informasi Bencana', '08121314691', NULL, 'pptk', 'PPTK pada Subdit Sarana Prasarana dan Informasi Bencana\r\n\r\n\r\n', '2023-01-19 09:56:20', '2023-01-19 09:56:25'),
(33, '1240', '0', '197912112008011001', 'Pramudya A. Boga, S.Sos., M.Si', 'Kasubdit Tanggap Darurat dan Pasca Bencana', '081281866766', NULL, 'pptk', 'PPTK pada Subdit Tanggap Darurat dan Pasca Bencana\r\n\r\n\r\n', '2023-01-19 09:56:21', '2023-01-19 09:56:24'),
(34, '1240', '0', '199105182012061002', 'Theofridus Bere, S.STP., M.Kesos', 'Analis Kebijakan Ahli Muda pada Subdit Sarana Prasarana dan Informasi Kebakaran', '081221755591', NULL, 'pptk', 'PPTK pada Subdit Sarana Prasarana dan Informasi Kebakaran\r\n\r\n\r\n', '2023-01-19 09:56:21', '2023-01-19 09:56:24'),
(35, '1240', '0', '198302112008121002', 'Danang Insta Putra, ST., M.Si', 'Plt. Kasubdit Peningkatan Kapasitas Sumber Daya Pemedam Kebakaran', '08122566520', NULL, 'pptk', 'PPTK pada Subdit Peningkatan Kapasitas Sumber Daya Pemadam Kebaran\r\n\r\n\r\n', '2023-01-19 09:56:22', '2023-01-19 09:56:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbm_pejabat`
--
ALTER TABLE `tbm_pejabat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbm_pejabat`
--
ALTER TABLE `tbm_pejabat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
