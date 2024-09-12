/*
 Navicat Premium Data Transfer

 Source Server         : ditjenadwil
 Source Server Type    : MySQL
 Source Server Version : 50738 (5.7.38-log)
 Source Host           : db-ditjenbinaadwil.cwpcgkizhgjz.ap-southeast-3.rds.amazonaws.com:3306
 Source Schema         : emonevadwil

 Target Server Type    : MySQL
 Target Server Version : 50738 (5.7.38-log)
 File Encoding         : 65001

 Date: 08/01/2023 21:50:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_akses
-- ----------------------------
DROP TABLE IF EXISTS `tb_akses`;
CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_dir` int(11) NOT NULL,
  `id_subdir` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_akses
-- ----------------------------
BEGIN;
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (1, 'Administrator', 'admin', 'fa794f20f0fab8f5b05cdcb179821a2c', 1, 0, 0, '2019-06-27 17:49:45');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (2, 'Ade Surya', 'ades', '202cb962ac59075b964b07152d234b70', 2, 1237, 1, '2019-07-29 16:12:19');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (3, 'Barda Hudaya', 'barda', '202cb962ac59075b964b07152d234b70', 2, 1238, 6, '2019-08-20 13:24:36');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (4, 'test', 'tes', '202cb962ac59075b964b07152d234b70', 1, 1239, 11, '2019-08-22 18:39:08');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (5, 'yudi', 'yudi', 'c232864d5de2064450915c0b9e4cc0b5', 3, 1237, 1, '2019-09-22 09:28:04');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (9, 'Direktorat Dekosentrasi Tugas Pembantuan dan Kerjasama', 'dekon', 'c8cdaea76c196253ff850cbb020c5e5a', 2, 1237, 0, '2019-12-02 04:31:07');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (10, 'Direktorat Kawasan Perkotaan dan Batas Negara', 'waskoban', '629fa6ae3b9f3185f7738e8afddda4d7', 2, 1238, 0, '2020-02-11 07:07:02');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (11, 'Direktorat Polisi Pamong Praja dan Perlindungan Masyarakat', 'satpolpp', '431374007fe4e4226e789abcc83e4204', 2, 1239, 0, '2020-02-26 03:29:11');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (12, 'Direktorat Manajemen Penanggulangan Bencana dan Kebakaran', 'mpbk', '858c7fd443ca38bb7eb10965af9ffc3d', 2, 1240, 0, '2020-02-26 03:30:57');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (13, 'Direktorat Toponimi dan Batas Daerah', 'toponimi', '6339555e6f9bd5bbfed83274de577969', 2, 1241, 0, '2020-02-26 03:31:49');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (14, 'Sekretariat Ditjen Bina Administrasi Kewilayahan', 'sekretariat', '593277eb017ecbe3d5bc8e552d68ff53', 2, 1242, 0, '2020-02-26 03:32:43');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (15, 'Bagian Perencanaan', 'bagren', '39e3d7b27e579caa0c2b978b2fe50de8', 2, 1242, 12421, '2020-02-27 10:58:07');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (16, 'Bagian Perundang-Undangan', 'bagianpuu', '0776698a6db3e982666031e3aca121c1', 2, 1242, 12423, '2020-02-27 10:59:35');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (17, 'Bagian Keuangan', 'keuangan', 'a4151d4b2856ec63368a7c784b1f0a6e', 2, 1242, 12422, '2020-02-27 11:00:17');
INSERT INTO `tb_akses` (`id_akses`, `nama`, `username`, `pass`, `id_group`, `id_dir`, `id_subdir`, `tgl_update`) VALUES (18, 'Bagian Umum', 'bagianumum', '67d7e164f603f589f603c3302206af25', 2, 1242, 12424, '2020-02-27 11:00:55');
COMMIT;

-- ----------------------------
-- Table structure for tb_anggaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggaran`;
CREATE TABLE `tb_anggaran` (
  `id_ang` int(11) NOT NULL,
  `id_pagu` int(11) NOT NULL,
  `tang_1` float NOT NULL,
  `tang_2` float NOT NULL,
  `tang_3` float NOT NULL,
  `tang_4` float NOT NULL,
  `tang_5` float NOT NULL,
  `tang_6` float NOT NULL,
  `tang_7` float NOT NULL,
  `tang_8` float NOT NULL,
  `tang_9` float NOT NULL,
  `tang_10` float NOT NULL,
  `tang_11` float NOT NULL,
  `tang_12` float NOT NULL,
  `rang_1` float NOT NULL,
  `rang_2` float NOT NULL,
  `rang_3` float NOT NULL,
  `rang_4` float NOT NULL,
  `rang_5` float NOT NULL,
  `rang_6` float NOT NULL,
  `rang_7` float NOT NULL,
  `rang_8` float NOT NULL,
  `rang_9` float NOT NULL,
  `rang_10` float NOT NULL,
  `rang_11` float NOT NULL,
  `rang_12` float NOT NULL,
  `kendala` varchar(50) NOT NULL,
  `kendalalain` varchar(100) NOT NULL,
  `tindaklanjut` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_anggaran
-- ----------------------------
BEGIN;
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (1, 1, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 15000000, 0, 0, 0, 0, 0, 0, 0, 217605000, 0, 0, 0, 0, 'Pengadaan Barang dan Jasa', '', 'Segera di periksa dokumen dari penyedia barang dan sekaligus dipercepat pengirimannya');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (6, 4, 3280000, 3280000, 3280000, 3280000, 3280000, 3280000, 3280000, 3280000, 3280000, 3280000, 3280000, 3336000, 0, 0, 0, 0, 0, 0, 0, 39415300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (7, 5, 4400000, 6200000, 8600000, 12400000, 12600000, 15800000, 21200000, 20600000, 23400000, 20800000, 24000000, 30000000, 0, 0, 0, 0, 0, 0, 0, 30547300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (9, 6, 3300000, 4650000, 6450000, 9300000, 9450000, 11850000, 15900000, 15450000, 17550000, 15600000, 18000000, 22500000, 0, 0, 73672000, 0, 0, 44475000, 0, 0, 10125000, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (11, 10, 28720500, 40469900, 56135600, 80939800, 82245200, 103133000, 138381000, 134464000, 152741000, 135770000, 156658000, 195822000, 0, 0, 1020800000, 0, 0, 71747100, 0, 0, 128272000, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (13, 12, 6600000, 9300000, 12900000, 18600000, 18900000, 23700000, 31800000, 30900000, 35100000, 31200000, 36000000, 45000000, 0, 0, 0, 0, 0, 0, 0, 49715500, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (15, 15, 4561280, 6427260, 8915260, 12854500, 13061100, 16379200, 21977900, 21355100, 24257700, 21562400, 24879700, 31099600, 8120000, 0, 0, 0, 0, 32783500, 0, 0, 54864600, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (16, 16, 10560000, 14880000, 20640000, 29760000, 30240000, 37920000, 50880000, 49440000, 56160000, 49920000, 57600000, 72000000, 0, 0, 45888000, 0, 0, 174249000, 0, 0, 35750800, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (17, 21, 10000000, 10000000, 10000000, 0, 0, 0, 10000000, 10000000, 13900000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59640000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (19, 23, 0, 0, 0, 0, 0, 0, 0, 13309000, 2000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13309000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (21, 25, 0, 0, 0, 0, 0, 0, 0, 330859000, 8521000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 330859000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (22, 26, 0, 0, 0, 0, 0, 0, 0, 33133000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33133400, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (23, 27, 29213000, 62000000, 86000000, 0, 126000000, 158000000, 0, 206000000, 234000000, 0, 140000000, 0, 0, 0, 0, 0, 0, 0, 0, 230773000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (24, 28, 14300000, 20150000, 27950000, 40300000, 40950000, 51350000, 68900000, 66950000, 76050000, 67600000, 78000000, 97500000, 0, 0, 115300000, 0, 0, 18663400, 0, 0, 357858000, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (25, 29, 4400000, 6200000, 8600000, 12400000, 12600000, 15800000, 21200000, 20600000, 23400000, 20800000, 24000000, 30000000, 0, 0, 92618400, 0, 0, 39437400, 0, 0, 6483700, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (26, 31, 1248720, 1759560, 2440680, 3519120, 3575880, 4484040, 6016560, 5846280, 6640920, 5903040, 6811200, 8514000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (27, 33, 0, 0, 0, 0, 0, 0, 0, 126652000, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 126652000, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (28, 34, 3579930, 5044440, 6997130, 10088900, 10251600, 12855200, 17248700, 16760600, 19038700, 16923300, 19526900, 24408600, 0, 0, 17924000, 0, 0, 17918000, 0, 0, 17918000, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (29, 35, 7700000, 10850000, 15050000, 21700000, 22050000, 27650000, 37100000, 36050000, 40950000, 36400000, 42000000, 52500000, 0, 0, 83129500, 0, 0, 80504200, 0, 0, 53811100, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (30, 36, 0, 0, 0, 0, 0, 0, 0, 25424000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25423800, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (31, 37, 0, 0, 0, 0, 0, 0, 0, 59982000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59981400, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (32, 38, 0, 0, 0, 0, 0, 0, 0, 9740000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9739600, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (33, 39, 0, 0, 0, 0, 0, 0, 0, 21300000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20300000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (35, 41, 0, 0, 0, 0, 0, 0, 0, 880000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 880000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (37, 43, 0, 0, 0, 0, 0, 0, 0, 50034000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50034000, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (40, 46, 0, 0, 0, 0, 0, 0, 0, 33138000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33137200, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (41, 49, 41350000, 41350000, 41350000, 41350000, 41350000, 41350000, 41350000, 41350000, 41350000, 41350000, 41350000, 41388000, 0, 0, 0, 0, 0, 0, 0, 154639000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (42, 47, 0, 0, 0, 0, 0, 0, 0, 43302000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 43301200, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (44, 51, 17360000, 17360000, 17360000, 17360000, 17360000, 17360000, 17360000, 17360000, 17360000, 17360000, 17360000, 17454000, 0, 0, 0, 0, 0, 0, 0, 207814000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (46, 53, 2675000, 2675000, 2675000, 2675000, 2675000, 2675000, 2675000, 2675000, 2675000, 2675000, 2675000, 2676000, 0, 0, 0, 0, 0, 0, 0, 32100000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (47, 54, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 1775000, 0, 0, 0, 0, 0, 0, 0, 21300000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (48, 56, 9550000, 9550000, 9550000, 9550000, 9550000, 9550000, 9550000, 9550000, 9550000, 9550000, 9550000, 9644000, 0, 0, 0, 0, 0, 0, 0, 114964000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (49, 57, 0, 0, 0, 0, 0, 0, 0, 308238000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 308236000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (51, 59, 0, 0, 0, 0, 0, 0, 0, 358483000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 358283000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (52, 60, 0, 0, 0, 0, 0, 0, 0, 94866000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 94865800, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (54, 62, 0, 0, 0, 0, 0, 0, 0, 23488000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23487300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (55, 63, 0, 0, 0, 0, 0, 0, 0, 17108000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 17108000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (56, 64, 20800000, 20800000, 20800000, 20800000, 20800000, 20800000, 20800000, 20800000, 20800000, 20800000, 20800000, 21139000, 0, 0, 0, 0, 0, 0, 0, 249938000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (57, 65, 0, 0, 0, 0, 0, 0, 0, 18552000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 18551600, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (59, 67, 0, 0, 0, 0, 0, 0, 0, 15076000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15076000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (60, 69, 0, 0, 0, 0, 0, 0, 0, 42600000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 42600000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (62, 71, 0, 0, 0, 0, 0, 0, 0, 19300000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 17040000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (66, 73, 0, 0, 0, 0, 0, 0, 0, 17013000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 17013000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (68, 2, 19700000, 19700000, 19700000, 19700000, 19700000, 19700000, 19700000, 19700000, 19700000, 19700000, 19700000, 20216000, 0, 0, 0, 0, 0, 0, 0, 236916000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (69, 7, 0, 0, 0, 0, 0, 0, 0, 144635000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 144635000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (70, 8, 50000000, 0, 0, 50000000, 0, 0, 0, 49100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 149100000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (71, 9, 100000000, 0, 100000000, 0, 100000000, 0, 100000000, 0, 104965000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 450814000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (72, 13, 40000000, 0, 0, 0, 0, 0, 0, 45105000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 85104900, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (73, 14, 50000000, 0, 0, 50000000, 0, 0, 50000000, 0, 0, 50000000, 0, 68391000, 0, 0, 0, 0, 0, 0, 0, 268390000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (74, 17, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 11315000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 77055000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (75, 18, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 63493000, 0, 0, 0, 0, 0, 0, 0, 173493000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (76, 19, 0, 0, 0, 0, 0, 0, 0, 7961000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7961000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (77, 20, 0, 0, 0, 0, 0, 0, 0, 3742970000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3415740000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (79, 30, 0, 0, 0, 0, 0, 0, 0, 61530200, 0, 0, 35000000, 0, 0, 0, 0, 0, 0, 0, 0, 61530200, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (80, 32, 0, 0, 0, 0, 0, 0, 0, 63191400, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 63191400, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (81, 125, 0, 0, 0, 0, 0, 0, 0, 28590000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 28590000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (82, 126, 0, 0, 0, 0, 0, 0, 0, 230725000, 0, 44396000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 230725000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (83, 127, 0, 0, 0, 0, 0, 0, 0, 237395000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 237395000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (84, 128, 0, 0, 0, 0, 0, 0, 0, 776409000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 776409000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (85, 129, 0, 0, 0, 0, 0, 0, 0, 1215000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1215000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (86, 130, 175083, 175087, 175083, 175083, 175083, 175083, 175083, 175083, 175083, 175083, 175083, 175083, 0, 0, 0, 0, 0, 0, 0, 2101000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (87, 133, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1550000, 0, 0, 0, 0, 0, 0, 0, 12550000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (88, 135, 0, 0, 0, 0, 0, 0, 0, 39266000, 0, 140062000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 39266600, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (89, 136, 0, 0, 0, 0, 0, 0, 0, 287396000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 287396000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (90, 137, 0, 0, 0, 0, 0, 0, 0, 322963000, 0, 0, 127429000, 0, 0, 0, 0, 0, 0, 0, 0, 322963000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (91, 138, 0, 0, 0, 0, 0, 0, 0, 394223000, 0, 31651000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 394223000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (92, 139, 0, 0, 0, 0, 0, 0, 0, 167343000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 146192000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (93, 140, 0, 0, 0, 0, 0, 0, 0, 594311000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 455909000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (94, 141, 0, 0, 0, 0, 0, 0, 0, 60415000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 52354500, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (95, 142, 0, 0, 0, 0, 0, 0, 0, 900164000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 784008000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (96, 143, 0, 0, 0, 0, 0, 0, 0, 108702000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 108701000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (97, 144, 0, 0, 0, 0, 0, 0, 0, 217192000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 146880000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (98, 145, 0, 0, 0, 0, 0, 0, 0, 769000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 769000000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (99, 146, 0, 0, 0, 0, 0, 0, 0, 3244750000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3244750000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (100, 147, 0, 0, 0, 0, 0, 0, 0, 330000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 327250000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (101, 148, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 3000000000, 4040800000, 0, 0, 0, 0, 0, 0, 0, 21391900000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (102, 149, 614000000, 614000000, 614000000, 614000000, 614000000, 614000000, 614000000, 614000000, 614000000, 614000000, 614000000, 620730000, 0, 0, 0, 0, 0, 0, 0, 4920780000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (103, 115, 5300000, 5300000, 5300000, 5300000, 5300000, 5300000, 5300000, 5300000, 5300000, 5300000, 5300000, 5361000, 0, 0, 0, 0, 0, 0, 0, 63660000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (104, 116, 12820000, 12820000, 12820000, 12820000, 12820000, 12820000, 12820000, 12820000, 12820000, 12820000, 12820000, 12907000, 0, 0, 0, 0, 0, 0, 0, 153925000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (105, 117, 7190000, 7190000, 7190000, 7190000, 7190000, 7190000, 7190000, 7190000, 7190000, 7190000, 7190000, 7232000, 0, 0, 0, 0, 0, 0, 0, 85322000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (106, 120, 7670000, 7670000, 7670000, 7670000, 7670000, 7670000, 7670000, 7670000, 7670000, 7670000, 7670000, 7768000, 0, 0, 0, 0, 0, 0, 0, 92137300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (107, 121, 32700000, 32700000, 32700000, 32700000, 32700000, 32700000, 32700000, 32700000, 32700000, 32700000, 32700000, 32713000, 0, 0, 0, 0, 0, 0, 0, 392512000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (108, 122, 10400000, 10400000, 10400000, 10400000, 10400000, 10400000, 10400000, 10400000, 10400000, 10400000, 10400000, 10595000, 0, 0, 0, 0, 0, 0, 0, 124995000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (109, 123, 18100000, 17000000, 17000000, 17000000, 17000000, 17000000, 17000000, 17000000, 17000000, 17000000, 17000000, 17000000, 0, 0, 0, 0, 0, 0, 0, 204999000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (110, 124, 63800000, 63800000, 63800000, 63800000, 63800000, 63800000, 63800000, 63800000, 63800000, 63800000, 63800000, 64536000, 0, 0, 0, 0, 0, 0, 0, 192418000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (111, 86, 9950000, 9950000, 9950000, 9950000, 9950000, 9950000, 9950000, 9950000, 9950000, 9950000, 9950000, 10129000, 0, 0, 0, 0, 0, 0, 0, 119578000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (112, 87, 4295000, 4295000, 4295000, 4295000, 4295000, 4295000, 4295000, 4295000, 4295000, 4295000, 4295000, 4303000, 0, 0, 0, 0, 0, 0, 0, 51548000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (113, 90, 0, 0, 0, 0, 0, 0, 0, 11161800, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11161800, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (114, 92, 0, 0, 0, 0, 0, 0, 0, 32986000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 32967300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (115, 94, 0, 0, 0, 0, 0, 0, 0, 807884000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 807882000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (116, 95, 0, 0, 0, 0, 0, 0, 0, 35010000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35009700, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (117, 96, 0, 0, 0, 0, 0, 0, 0, 549607000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (118, 108, 0, 0, 0, 0, 0, 0, 0, 33803000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33802400, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (119, 110, 0, 0, 0, 0, 0, 0, 0, 112910000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 112910000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (120, 112, 0, 0, 0, 0, 0, 0, 0, 94376000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 94375600, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (121, 114, 180580000, 180580000, 180580000, 180580000, 180580000, 180580000, 180580000, 180580000, 180580000, 180580000, 180580000, 180586000, 0, 0, 0, 0, 0, 0, 0, 134305000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (122, 50, 0, 0, 0, 0, 0, 0, 0, 766589000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 76588800, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (123, 55, 0, 0, 0, 0, 0, 0, 0, 19090000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 19090000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (124, 72, 0, 0, 0, 0, 0, 0, 0, 59389000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59388400, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (125, 75, 0, 0, 0, 0, 0, 0, 0, 46221000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 46220300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (126, 77, 0, 0, 0, 0, 0, 0, 0, 10332000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10331500, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (127, 78, 89800500, 89800500, 89800500, 89800500, 89800500, 89800500, 89800500, 89800500, 89800500, 89800500, 89800500, 90196500, 0, 0, 0, 0, 0, 0, 0, 1072600000, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (128, 79, 0, 0, 0, 0, 0, 0, 0, 29543000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 29542300, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (129, 80, 0, 0, 0, 0, 0, 0, 0, 37996000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 37595200, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (130, 82, 0, 0, 0, 0, 0, 0, 0, 64612000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 64611700, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (131, 83, 0, 0, 0, 0, 0, 0, 0, 55855000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55854400, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_anggaran` (`id_ang`, `id_pagu`, `tang_1`, `tang_2`, `tang_3`, `tang_4`, `tang_5`, `tang_6`, `tang_7`, `tang_8`, `tang_9`, `tang_10`, `tang_11`, `tang_12`, `rang_1`, `rang_2`, `rang_3`, `rang_4`, `rang_5`, `rang_6`, `rang_7`, `rang_8`, `rang_9`, `rang_10`, `rang_11`, `rang_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (132, 85, 65360000, 65360000, 65360000, 65360000, 65360000, 65360000, 65360000, 65360000, 65360000, 65360000, 65360000, 65412000, 0, 0, 0, 0, 0, 0, 0, 144451000, 0, 0, 0, 0, '', '', '');
COMMIT;

-- ----------------------------
-- Table structure for tb_indikator
-- ----------------------------
DROP TABLE IF EXISTS `tb_indikator`;
CREATE TABLE `tb_indikator` (
  `id_indikator` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_dir` int(11) NOT NULL,
  `id_subdir` int(11) NOT NULL,
  `indikator` varchar(200) NOT NULL,
  `target` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `rkel_1` int(11) NOT NULL,
  `rkel_2` int(11) NOT NULL,
  `rkel_3` int(11) NOT NULL,
  `rkel_4` int(11) NOT NULL,
  `rkel_5` int(11) NOT NULL,
  `rkel_6` int(11) NOT NULL,
  `rkel_7` int(11) NOT NULL,
  `rkel_8` int(11) NOT NULL,
  `rkel_9` int(11) NOT NULL,
  `rkel_10` int(11) NOT NULL,
  `rkel_11` int(11) NOT NULL,
  `rkel_12` int(11) NOT NULL,
  `rprosen_1` int(11) NOT NULL,
  `rprosen_2` int(11) NOT NULL,
  `rprosen_3` int(11) NOT NULL,
  `rprosen_4` int(11) NOT NULL,
  `rprosen_5` int(11) NOT NULL,
  `rprosen_6` int(11) NOT NULL,
  `rprosen_7` int(11) NOT NULL,
  `rprosen_8` int(11) NOT NULL,
  `rprosen_9` int(11) NOT NULL,
  `rprosen_10` int(11) NOT NULL,
  `rprosen_11` int(11) NOT NULL,
  `rprosen_12` int(11) NOT NULL,
  `rnilai_1` float NOT NULL,
  `rnilai_2` float NOT NULL,
  `rnilai_3` float NOT NULL,
  `rnilai_4` float NOT NULL,
  `rnilai_5` float NOT NULL,
  `rnilai_6` float NOT NULL,
  `rnilai_7` float NOT NULL,
  `rnilai_8` float NOT NULL,
  `rnilai_9` float NOT NULL,
  `rnilai_10` float NOT NULL,
  `rnilai_11` float NOT NULL,
  `rnilai_12` float NOT NULL,
  `kendala` varchar(50) NOT NULL,
  `kendalalain` varchar(100) NOT NULL,
  `tindaklanjut` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_indikator
-- ----------------------------
BEGIN;
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (1, '2019', 1237, 1, 'Jumlah tugas dan wewenang yang dilaksanakan GWPP sesuai peraturan', 1, '5', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (4, '2019', 1237, 1, 'Jumlah kebijakan/regulasi bidang Gubernur sebagai Wakil Pemerintah Pusat', 3, '7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (5, '2019', 1237, 12371, 'Jumlah rumusan kebijakan  bidang peningkatan peran Gubernur sebagai Wakil Pemerintah', 4, '7', 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (6, '2019', 1237, 12371, 'Jumlah tugas dan wewenang yang dilaksanakan oleh GWPP sesuai peraturan', 1, '5', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (7, '2019', 1237, 12372, 'Jumlah Kebijakan/regulasi bidang dekonsentrasi, tugas pembantuan', 1, '11', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (8, '2019', 1237, 12372, 'Jumlah jenis Dekonsentrasi dan Tugas Pembantuan yang dievaluasi berdasarkan prinsip dekonsentrasi dan tugas pembantuan', 50, '12', 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (10, '2019', 1237, 12372, 'Pelayanan administrasi dan tugas teknis lainnya unit eselon II', 1, '8', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (11, '2019', 1237, 12373, 'Jumlah kebijakan/regulasi bidang kerjasama daerah', 1, '6', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (12, '2019', 1237, 12373, 'Jumlah Daerah Yang Melaksanakan Kerja Sama yang bersifat Wajib sesuai standar', 3, '9', 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (13, '2019', 1237, 12373, 'Penyusunan kesepakatan kerjasama Pemerintah Daerah dengan dunia usaha dalam pemanfaatan lulusan sekolah vokasi (PN)', 3, '4', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (14, '2019', 1237, 12374, 'PTSP Prima di daerah (PN)', 75, '10', 0, 0, 0, 0, 0, 0, 0, 0, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (15, '2019', 1237, 12374, 'Sistem e-monev PTSP yang terintegrasi (PN)', 34, '4', 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (16, '2019', 1237, 12375, 'Jumlah Kabupaten / Kota yang menerapkan PATEN', 60, '10', 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (17, '2019', 1237, 12375, 'Jumlah kebijakan/regulasi bidang pembinaan kecamatan', 5, '6', 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (18, '2019', 1239, 12391, 'Jumlah kebijakan/regulasi bidang Polisi Pamong Praja ', 2, '6', 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (19, '2019', 1239, 12391, 'Jumlah daerah Kabupaten/kota yang mempunyai aparatur Satpol PP yang sesuai standar', 34, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (20, '2019', 1239, 12391, 'Persentase daerah yang memberikan pelayanan dasar sesuai SPM Subbidang Trantibum', 135, '13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (21, '2020', 1239, 12391, 'Jumlah daerah yang melaksanakan sistem dan prosedur operasional penyelenggaraan bidang ketentraman, ketertiban dan perlindungan masyarakat', 34, '13', 0, 0, 0, 0, 0, 0, 0, 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (22, '2019', 1239, 12392, 'Jumlah Kebijakan/regulasi/pedoman bidang Polisi Pamong Praja', 5, '6', 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (23, '2019', 1239, 12392, 'Jumlah daerah Kabupaten/kota yang mempunyai aparatur Satpol PP yang sesuai standar', 450, '1', 0, 0, 0, 0, 0, 0, 0, 0, 450, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (24, '2019', 1239, 12392, 'Jumlah daerah yang diberikan pembekalan Satpol PP dan Satlinmas untuk pemeliharaan trantibumlinmas dalam rangka pemilu (PN)', 34, '4', 0, 0, 0, 0, 0, 0, 0, 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (25, '2019', 1239, 12392, 'Jumlah daerah yang melaksanakan sistem dan prosedur operasional penyelenggaraan bidang ketentraman, ketertiban dan perlindungan masyarakat', 7, '4', 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (26, '2019', 1239, 12392, 'Persentase daerah yang memberikan pelayanan dasar sesuai SPM Subbidang Trantibum', 39, '13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (27, '2019', 1239, 12393, 'Jumlah kebijakan/regulasi bidang Perlindungan Masyarakat', 1, '7', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (28, '2019', 1239, 12393, 'Jumlah daerah Kabupaten/kota yang mempunyai aparatur  Satlinmas yang sesuai standar', 100, '1', 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (29, '2019', 1239, 12393, 'Jumlah daerah yang diberikan pembekalan Satpol PP dan Satlinmas untuk pemeliharaan trantibumlinmas dalam ragka pemilu (PN)', 34, '4', 0, 0, 0, 0, 0, 0, 0, 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (30, '2019', 1239, 12393, 'Jumlah daerah yang melaksanakan sistem dan prosedur operasional penyelenggaraan bidang ketentraman, ketertiban dan perlindungan masyarakat', 15, '13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (31, '2019', 1239, 12393, 'Persentase daerah yang memberikan pelayanan dasar sesuai SPM Subbidang Trantibum', 78, '13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (32, '2019', 1239, 12393, 'Daerah yang telah memfasilitasi 5P (penghormatan, pemajuan, pemenuhan, penegakan dan perlindungan) HAM, fasilitasi konvensi internasional', 1, '14', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (33, '2019', 1239, 12394, 'Jumlah daerah kabupaten/kota yang mempunyai aparatur PPNS yang sesuai standar', 400, '1', 0, 0, 0, 0, 0, 0, 0, 0, 342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (34, '2019', 1239, 12394, 'Jumlah daerah yang melaksanakan sistem dan prosedur operasional penyelenggaraan bidang trantibumlinmas', 34, '13', 0, 0, 0, 0, 0, 0, 0, 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (35, '2019', 1239, 12394, 'Persentase daerah yang memberikan pelayanan dasar sesuai SPM Subbidang Trantibum', 58, '13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (36, '2019', 1239, 12394, 'Persentase pelayanan administrasi dan tugas teknis lainnya', 1, '8', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (37, '2019', 1239, 12395, 'Jumlah kebijakan/regulasi bidang Polisi Pamong Praja  ', 1, '6', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (38, '2019', 1239, 12395, 'Jumlah daerah kabupaten/kota yang mempunyai aparatur Pol PP yang sesuai standar', 100, '1', 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (39, '2019', 1239, 12395, 'Persentase daerah yang telah memfasilitasi 5P (penghormatan, pemajuan, pemenuhan, penegakan dan perlindungan) HAM, fasilitasi konvensi internasional', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (40, '2019', 1241, 12411, 'Jumlah segmen batas antar daerah yang ditetapkan dengan Permendagri', 17, '16', 0, 0, 0, 0, 0, 0, 0, 0, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (41, '2019', 1241, 12411, 'Jumlah Daerah yang diasistensi dan supervisi bidang batas daerah', 10, '13', 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (43, '2019', 1241, 12412, 'Jumlah segmen batas antar daerah yang ditetapkan dengan Permendagri', 17, '16', 0, 0, 0, 0, 0, 0, 0, 0, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (44, '2019', 1241, 12412, 'Jumlah Daerah yang diasistensi dan supervisi bidang batas daerah', 12, '13', 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (45, '2019', 1241, 12411, 'Jumlah Daerah yang diintegrasikan segmen batasnya', 7, '4', 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (46, '2019', 1241, 12412, 'Penyelesaian pelayanan administrasi dan tugas teknis lainnya unit kerja eselon II', 1, '8', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (47, '2019', 1241, 12413, 'Jumlah segmen batas antar daerah yang ditetapkan dengan Permendagri', 16, '16', 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (48, '2019', 1241, 12413, 'Jumlah Daerah yang diasistensi dan supervisi bidang batas daerah', 11, '13', 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (49, '2019', 1241, 12413, 'Jumlah Daerah yang diintegrasikan segmen batasnya', 7, '4', 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (51, '2019', 1241, 12414, 'Jumlah rumusan kebijakan bidang toponimi ', 2, '6', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (52, '2019', 1241, 12414, 'Jumlah unsur rupabumi alami (pulau dan unsur lainnya) yang diverifiikasi dan dibakukan', 1, '17', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (53, '2019', 1241, 12414, 'Jumlah unsur rupabumi warisan budaya', 5, '4', 0, 0, 0, 0, 0, 0, 0, 2, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (54, '2019', 1241, 12414, 'Jumlah Daerah yang diasistensi dan supervisi bidang toponimi ', 8, '13', 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (55, '2019', 1241, 12415, 'Jumlah unsur rupabumi alami (pulau dan unsur lainnya) yang diverifiikasi dan dibakukan', 1, '17', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (56, '2019', 1241, 12415, 'Jumlah unsur rupabumi warisan budaya', 3, '4', 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (57, '2019', 1241, 12415, 'Jumlah Daerah yang diasistensi dan supervisi bidang toponimi', 7, '13', 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (58, '2019', 1238, 12381, 'Jumlah kesepakatan dalam pengelolaan kawasan khusus', 5, '18', 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (59, '2019', 1238, 12381, 'Jumlah kebijakan/regulasi bidang kawasan', 1, '19', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (60, '2019', 1238, 12382, 'Jumlah kesepakatan dalam pengelolaan kawasan khusus', 5, '18', 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (61, '2019', 1238, 12383, 'Jumlah kebijakan/regulasi bidang pertanahan ', 1, '19', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (62, '2019', 1238, 12383, 'Jumlah Konflik Pertanahan yang ditangani', 10, '20', 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (63, '2019', 1238, 12383, 'Pelayanan administrasi dan tugas teknis lainnya unit eselon II', 1, '8', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (64, '2019', 1238, 12384, 'Jumlah kesepakatan dalam mendukung pengelolaan perkotaan', 3, '18', 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (65, '2019', 1238, 12384, 'Jumlah Kebijakan terkait perkotaan berkelanjutan', 3, '7', 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (66, '2019', 1238, 12384, 'Jumlah sarpras pemerintahan di kawasan perbatasan negara lainnya dalam rangka pelayanan pemerintahan', 6, '22', 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (67, '2019', 1238, 12385, 'Jumlah Kesepakatan Perundingan Batas dan Kerjasama Wilayah Negara (PN)', 5, '18', 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (68, '2019', 1238, 12385, 'Pelaksanaan kerjasama perbatasan negara di daerah (PN)', 6, '4', 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (69, '2019', 1242, 12421, 'Persentase penyelesaian dokumen perencanaan dan anggaran (Renstra, Renja, RKP, RKA, RKAKL)', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 71, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (70, '2019', 1242, 12421, 'Persentase penyelesaian dokumen hasil monitoring dan evaluasi, laporan keuangan serta hasil-hasil pemeriksaan dan tindak lanjut LHP ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (71, '2019', 1242, 12421, 'Persentase penyusunan pedoman/juknis dan rancangan peraturan serta dokumen ketatalaksanaan yang diselesaikan  ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (72, '2019', 1242, 12421, 'Persentase Pembinaan bidang administrasi kewilayahan di pusat dan daerah', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (73, '2019', 1242, 12422, 'Persentase penyelesaian dokumen hasil monitoring dan evaluasi, laporan keuangan serta hasil-hasil pemeriksaan dan tindak lanjut LHP ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (74, '2019', 1242, 12422, 'Persentase penyusunan pedoman/juknis (DIPA Pusat) yang diselesaikan ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (75, '2019', 1242, 12422, 'Persentase percepatan penyelesaian pembayaran/tagihan terkait kegiatan di Lingkup Ditjen Bina Administrasi Kewilayahan', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 86, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (76, '2019', 1242, 12422, 'Persentase penyelesaian pelayanan dukungan operasional kerja (pembayaran gaji, operasional dan pemeliharaan perkantoran, serta langganan daya dan jasa) yang tepat waktu', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 77, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (77, '2019', 1242, 12423, 'Persentase penyusunan pedoman/juknis dan rancangan peraturan serta dokumen ketatalaksanaan yang diselesaikan  ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (78, '2019', 1242, 12424, 'Persentase penyelesaian urusan ketatausahaan dan kepegawaian   ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 71, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (79, '2019', 1242, 12424, 'Persentase penyelesaian dokumen hasil monitoring dan evaluasi, laporan keuangan serta hasil-hasil pemeriksaan dan tindak lanjut LHP ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (80, '2019', 1242, 12424, 'Persentase pengadaan sarana dan prasarana  ', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (81, '2019', 1242, 12424, 'Persentase pemeliharaan sarana dan prasarana', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (82, '2019', 1242, 12424, 'Persentase pembinaan bidang administrasi kewilayahan di pusat dan daerah', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
INSERT INTO `tb_indikator` (`id_indikator`, `tahun`, `id_dir`, `id_subdir`, `indikator`, `target`, `satuan`, `rkel_1`, `rkel_2`, `rkel_3`, `rkel_4`, `rkel_5`, `rkel_6`, `rkel_7`, `rkel_8`, `rkel_9`, `rkel_10`, `rkel_11`, `rkel_12`, `rprosen_1`, `rprosen_2`, `rprosen_3`, `rprosen_4`, `rprosen_5`, `rprosen_6`, `rprosen_7`, `rprosen_8`, `rprosen_9`, `rprosen_10`, `rprosen_11`, `rprosen_12`, `rnilai_1`, `rnilai_2`, `rnilai_3`, `rnilai_4`, `rnilai_5`, `rnilai_6`, `rnilai_7`, `rnilai_8`, `rnilai_9`, `rnilai_10`, `rnilai_11`, `rnilai_12`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (83, '2019', 1242, 12424, 'Persentase penyelesaian pelayanan dukungan operasional kerja (pembayaran gaji, operasional dan pemeliharaan perkantoran, serta langganan daya dan jasa) yang tepat waktuPersentase penyelesaian pelayana', 100, '15', 0, 0, 0, 0, 0, 0, 0, 0, 79, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');
COMMIT;

-- ----------------------------
-- Table structure for tb_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kegiatan`;
CREATE TABLE `tb_kegiatan` (
  `id_keg` int(11) NOT NULL,
  `id_pagu` int(11) NOT NULL,
  `tkeg_rapat_rdk` int(11) NOT NULL,
  `tkeg_rapat_full` int(11) NOT NULL,
  `tkeg_rapat_fgd` int(11) NOT NULL,
  `tkeg_dinas_mon` int(11) NOT NULL,
  `tkeg_dinas_full` int(11) NOT NULL,
  `rkeg_rapat_rdk` int(11) NOT NULL,
  `rkeg_rapat_full` int(11) NOT NULL,
  `rkeg_rapat_fgd` int(11) NOT NULL,
  `rkeg_dinas_mon` int(11) NOT NULL,
  `rkeg_dinas_full` int(11) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `kendala` varchar(50) NOT NULL,
  `kendalalain` varchar(100) NOT NULL,
  `tindaklanjut` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kegiatan
-- ----------------------------
BEGIN;
INSERT INTO `tb_kegiatan` (`id_keg`, `id_pagu`, `tkeg_rapat_rdk`, `tkeg_rapat_full`, `tkeg_rapat_fgd`, `tkeg_dinas_mon`, `tkeg_dinas_full`, `rkeg_rapat_rdk`, `rkeg_rapat_full`, `rkeg_rapat_fgd`, `rkeg_dinas_mon`, `rkeg_dinas_full`, `berkas`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (2, 1, 1, 3, 3, 1, 2, 1, 1, 1, 0, 1, '', '', '', '');
INSERT INTO `tb_kegiatan` (`id_keg`, `id_pagu`, `tkeg_rapat_rdk`, `tkeg_rapat_full`, `tkeg_rapat_fgd`, `tkeg_dinas_mon`, `tkeg_dinas_full`, `rkeg_rapat_rdk`, `rkeg_rapat_full`, `rkeg_rapat_fgd`, `rkeg_dinas_mon`, `rkeg_dinas_full`, `berkas`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (3, 3, 3, 3, 3, 2, 3, 0, 0, 0, 0, 0, '', '', '', '');
INSERT INTO `tb_kegiatan` (`id_keg`, `id_pagu`, `tkeg_rapat_rdk`, `tkeg_rapat_full`, `tkeg_rapat_fgd`, `tkeg_dinas_mon`, `tkeg_dinas_full`, `rkeg_rapat_rdk`, `rkeg_rapat_full`, `rkeg_rapat_fgd`, `rkeg_dinas_mon`, `rkeg_dinas_full`, `berkas`, `kendala`, `kendalalain`, `tindaklanjut`) VALUES (4, 42, 1, 2, 3, 4, 1, 0, 0, 0, 0, 0, '', '', '', '');
COMMIT;

-- ----------------------------
-- Table structure for tb_log_login
-- ----------------------------
DROP TABLE IF EXISTS `tb_log_login`;
CREATE TABLE `tb_log_login` (
  `id_log` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `tgl_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_log_login
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tb_pagu
-- ----------------------------
DROP TABLE IF EXISTS `tb_pagu`;
CREATE TABLE `tb_pagu` (
  `id_pagu` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `no_akun` varchar(50) NOT NULL,
  `jenis_akun` varchar(15) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `kab` varchar(50) NOT NULL,
  `pagu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pagu
-- ----------------------------
BEGIN;
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1, '2020', '1237.01.051', 'Pusat', '', '', 217605000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (2, '2020', '1237.01.052', 'Pusat', '', '', 236916000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (3, '2020', '1237.01.053', 'Pusat', '', '', 84404000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (4, '2020', '1237.02.051', 'Pusat', '', '', 39416000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (5, '2020', '1237.02.052', 'Pusat', '', '', 30548000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (7, '2020', '1237.03.051', 'Pusat', '', '', 144636000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (8, '2020', '1237.03.052', 'Pusat', '', '', 149100000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (9, '2020', '1237.03.053', 'Pusat', '', '', 504965000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (12, '2020', '1237.04.051', 'Pusat', '', '', 49716000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (13, '2020', '1237.04.052', 'Pusat', '', '', 85105000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (14, '2020', '1237.05.051', 'Pusat', '', '', 268391000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (17, '2020', '1237.06.051', 'Pusat', '', '', 81315000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (18, '2020', '1237.06.052', 'Pusat', '', '', 173493000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (19, '2020', '1237.06.053', 'Pusat', '', '', 7961000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (20, '2020', '1237.07.051', 'Pusat', '', '', 3742978000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (21, '2020', '1237.07.054', 'Pusat', '', '', 63900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (23, '2020', '1237.07.056', 'Pusat', '', '', 13311000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (25, '2020', '1237.12.051', 'Pusat', '', '', 339380000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (26, '2020', '1237.12.052', 'Pusat', '', '', 33133000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (27, '2020', '1237.70.055', 'Pusat', '', '', 1041213000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (30, '2020', '1238.02.051', 'Pusat', '', '', 95631000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (32, '2020', '1238.02.053', 'Pusat', '', '', 63192000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (33, '2020', '1238.05.051', 'Pusat', '', '', 126653000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (35, '2020', '1238.05.053', 'Pusat', '', '', 2046465000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (36, '2020', '1238.05.054', 'Pusat', '', '', 25424000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (37, '2020', '1238.05.055', 'Pusat', '', '', 59982000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (38, '2020', '1238.05.056', 'Pusat', '', '', 9740000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (39, '2020', '1238.05.057', 'Pusat', '', '', 21300000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (40, '2020', '1238.06.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (41, '2020', '1238.06.052', 'Pusat', '', '', 880000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (42, '2020', '1238.06.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (43, '2020', '1238.06.054', 'Pusat', '', '', 50034000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (44, '2020', '1238.06.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (45, '2020', '1238.06.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (46, '2020', '1238.07.051', 'Pusat', '', '', 33138000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (47, '2020', '1238.07.053', 'Pusat', '', '', 43302000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (48, '2020', '1238.07.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (49, '2020', '1238.70.055', 'Pusat', '', '', 496238000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (50, '2020', '1239.01.051', 'Pusat', '', '', 76589000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (51, '2020', '1239.01.052', 'Pusat', '', '', 208414000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (52, '2020', '1239.02.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (53, '2020', '1239.02.052', 'Pusat', '', '', 32101000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (54, '2020', '1239.02.055', 'Pusat', '', '', 21300000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (55, '2020', '1239.02.056', 'Pusat', '', '', 19090000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (56, '2020', '1239.03.052', 'Pusat', '', '', 114694000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (57, '2020', '1239.03.053', 'Pusat', '', '', 308238000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (58, '2020', '1239.03.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (59, '2020', '1239.03.056', 'Pusat', '', '', 358483000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (60, '2020', '1239.03.057', 'Pusat', '', '', 94866000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (61, '2020', '1239.03.058', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (62, '2020', '1239.03.059', 'Pusat', '', '', 23488000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (63, '2020', '1239.03.060', 'Pusat', '', '', 17108000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (64, '2020', '1239.03.061', 'Pusat', '', '', 249939000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (65, '2020', '1239.03.062', 'Pusat', '', '', 18552000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (66, '2020', '1239.03.063', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (67, '2020', '1239.03.064', 'Pusat', '', '', 15076000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (68, '2020', '1239.03.065', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (69, '2020', '1239.04.051', 'Pusat', '', '', 42600000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (70, '2020', '1239.04.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (71, '2020', '1239.04.053', 'Pusat', '', '', 19300000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (72, '2020', '1239.05.052', 'Pusat', '', '', 59389000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (73, '2020', '1239.05.053', 'Pusat', '', '', 17013000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (74, '2020', '1239.05.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (75, '2020', '1239.05.055', 'Pusat', '', '', 46221000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (76, '2020', '1239.05.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (77, '2020', '1239.06.051', 'Pusat', '', '', 10332000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (78, '2020', '1239.06.052', 'Pusat', '', '', 1078002000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (79, '2020', '1239.06.053', 'Pusat', '', '', 29543000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (80, '2020', '1239.07.051', 'Pusat', '', '', 37996000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (81, '2020', '1239.07.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (82, '2020', '1239.07.053', 'Pusat', '', '', 64612000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (83, '2020', '1239.08.051', 'Pusat', '', '', 55855000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (84, '2020', '1239.08.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (85, '2020', '1239.70.055', 'Pusat', '', '', 784372000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (86, '2020', '1240.01.051', 'Pusat', '', '', 119579000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (87, '2020', '1240.01.052', 'Pusat', '', '', 51548000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (88, '2020', '1240.01.053', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (89, '2020', '1240.01.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (90, '2020', '1240.01.055', 'Pusat', '', '', 11162000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (91, '2020', '1240.02.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (92, '2020', '1240.02.052', 'Pusat', '', '', 32968000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (93, '2020', '1240.02.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (94, '2020', '1240.02.055', 'Pusat', '', '', 807884000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (95, '2020', '1240.03.051', 'Pusat', '', '', 35010000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (96, '2020', '1240.03.052', 'Pusat', '', '', 549607000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (97, '2020', '1240.03.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (98, '2020', '1240.05.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (99, '2020', '1240.05.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (100, '2020', '1240.05.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (101, '2020', '1240.05.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (102, '2020', '1240.05.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (103, '2020', '1240.05.058', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (104, '2020', '1240.05.059', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (105, '2020', '1240.05.060', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (106, '2020', '1240.05.061', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (107, '2020', '1240.06.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (108, '2020', '1240.06.052', 'Pusat', '', '', 33803000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (109, '2020', '1240.06.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (110, '2020', '1240.06.054', 'Pusat', '', '', 112910000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (111, '2020', '1240.06.055', 'Pusat', '', '', 530000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (112, '2020', '1240.06.056', 'Pusat', '', '', 94376000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (113, '2020', '1240.07.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (114, '2020', '1240.70.055', 'Pusat', '', '', 2166966000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (115, '2020', '1241.01.051', 'Pusat', '', '', 63661000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (116, '2020', '1241.02.051', 'Pusat', '', '', 153927000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (117, '2020', '1241.02.052', 'Pusat', '', '', 86322000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (119, '2020', '1241.03.051', 'Pusat', '', '', 1700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (120, '2020', '1241.05.051', 'Pusat', '', '', 92138000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (121, '2020', '1241.06.051', 'Pusat', '', '', 392413000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (122, '2020', '1241.06.052', 'Pusat', '', '', 124995000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (123, '2020', '1241.06.053', 'Pusat', '', '', 205100000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (124, '2020', '1241.70.055', 'Pusat', '', '', 766336000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (125, '2020', '1242.01.051', 'Pusat', '', '', 28590000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (126, '2020', '1242.01.052', 'Pusat', '', '', 275121000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (127, '2020', '1242.01.053', 'Pusat', '', '', 237395000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (128, '2020', '1242.01.054', 'Pusat', '', '', 776411000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (129, '2020', '1242.90.051', 'Pusat', '', '', 1215000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (130, '2020', '1242.90.052', 'Pusat', '', '', 2101000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (133, '2020', '1242.91.052', 'Pusat', '', '', 12550000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (135, '2020', '1242.50.051', 'Pusat', '', '', 179328000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (136, '2020', '1242.50.052', 'Pusat', '', '', 810642000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (137, '2020', '1242.50.053', 'Pusat', '', '', 450392000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (138, '2020', '1242.50.054', 'Pusat', '', '', 425874000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (139, '2020', '1242.50.055', 'Pusat', '', '', 167343000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (140, '2020', '1242.50.056', 'Pusat', '', '', 594311000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (141, '2020', '1242.50.057', 'Pusat', '', '', 60415000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (142, '2020', '1242.50.058', 'Pusat', '', '', 900164000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (143, '2020', '1242.50.060', 'Pusat', '', '', 108702000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (144, '2020', '1242.50.061', 'Pusat', '', '', 217192000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (145, '2020', '1242.51.051', 'Pusat', '', '', 769000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (146, '2020', '1242.51.052', 'Pusat', '', '', 3244750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (147, '2020', '1242.51.053', 'Pusat', '', '', 330000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (148, '2020', '1242.94.051', 'Pusat', '', '', 37040789000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (149, '2020', '1242.94.052', 'Pusat', '', '', 7374734000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (151, '2020', '1237.01.053', 'Pusat', '', '', 84404000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (154, '2021', '01.PBL.001.051', 'Pusat', 'DKI Jakarta', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (164, '2021', '1237.01.UAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (165, '2021', '1237.01.UAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (166, '2021', '1237.01.UAE.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (167, '2021', '1237.01.UAE.001.052	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (168, '2021', '1237.01.UAE.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (169, '2021', '1237.01.UAE.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (170, '2021', '1237.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (171, '2021', '1237.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (172, '2021', '1237.01.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (173, '2021', '1237.01.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (174, '2021', '1237.01.UBA.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (175, '2021', '1237.01.UBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (176, '2021', '1237.01.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (177, '2021', '1237.01.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (178, '2021', '1237.01.UBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (179, '2021', '1237.01.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (180, '2021', '1237.01.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (181, '2021', '1237.01.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (182, '2021', '1237.01.UBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (183, '2021', '1237.01.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (184, '2021', '1237.01.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (185, '2021', '1237.01.UBA.006.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (186, '2021', '1237.01.UBA.006.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (187, '2021', '1237.01.UBA.006.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (188, '2021', '1237.01.UBA.006.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (189, '2021', '1241.01.AAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (190, '2021', '1241.01.AAG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (191, '2021', '1241.01.AAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (192, '2021', '1241.01.AAH.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (193, '2021', '1241.01.AAH.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (194, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (195, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (196, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (197, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (198, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (199, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (200, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (201, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (202, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (203, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (204, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (205, '2021', '1241.01.ABL.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (206, '2021', '1241.01.CAI.001.051', 'Tugas Pembantua', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (207, '2021', '1241.01.CAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (208, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (209, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (210, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (211, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (212, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (213, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (214, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (215, '2021', '1241.01.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (216, '2021', '1241.01.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (217, '2021', '1241.01.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (218, '2021', '1241.01.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (219, '2021', '1241.01.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (220, '2021', '1241.01.FBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (221, '2021', '1241.01.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (222, '2021', '1241.01.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (223, '2021', '1241.01.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (224, '2021', '1241.01.PEC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (225, '2021', '1241.01.PEC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (226, '2021', '1241.01.PEC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (227, '2021', '1241.01.PEC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (228, '2021', '1241.01.PEC.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (229, '2021', '1241.01.PEC.001.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (230, '2021', '1241.01.PEC.001.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (231, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (232, '2021', '1241.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (233, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (234, '2021', '6136.03.AAG.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (235, '2021', '6136.03.AAG.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (236, '2021', '6136.03.AAG.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (237, '2021', '6136.03.AAG.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (238, '2021', '6136.03.AAG.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (239, '2021', '6136.03.AAG.006.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (240, '2021', '6136.03.ABQ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (241, '2021', '6136.03.AFA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (242, '2021', '6136.03.AFA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (243, '2021', '6136.03.AFA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (244, '2021', '6136.03.AFA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (245, '2021', '6136.03.AFA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (246, '2021', '6136.03.BEG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (247, '2021', '6136.03.BEG.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (248, '2021', '6136.03.BEG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (249, '2021', '6136.03.BEG.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (250, '2021', '6136.03.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (251, '2021', '6136.03.FBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (252, '2021', '6136.03.FBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (253, '2021', '6136.03.FBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (254, '2021', '6136.03.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (255, '2021', '6136.03.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (256, '2021', '6136.03.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (257, '2021', '6136.03.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (258, '2021', '6136.03.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (259, '2021', '6136.03.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (260, '2021', '6136.03.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (261, '2021', '6136.03.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (262, '2021', '6136.03.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (263, '2021', '6136.03.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (264, '2021', '6136.03.FBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (265, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (266, '2021', '6136.03.FBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (267, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (268, '2021', '6136.03.UBA.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (269, '2021', '6136.03.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (270, '2021', '6136.03.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (271, '2021', '6136.03.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (272, '2021', '6136.03.UBA.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (273, '2021', '6136.03.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (274, '2021', '6136.03.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (275, '2021', '6136.03.UBA.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (276, '2021', '6136.03.UBA.002.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (277, '2021', '6136.03.UBA.002.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (278, '2021', '6136.03.UBA.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (279, '2021', '6136.03.UBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (280, '2021', '6136.03.UBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (281, '2021', '6136.03.UBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (282, '2021', '6136.03.UBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (283, '2021', '6136.03.UBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (284, '2021', '6136.03.UBA.003.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (285, '2021', '6136.03.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (286, '2021', '6136.03.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (287, '2021', '6136.03.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (288, '2021', '6136.03.UBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (289, '2021', '6136.03.UBA.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (290, '2021', '6136.03.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (291, '2021', '6136.03.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (292, '2021', '6137.01.ABL.051.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (293, '2021', '6137.01.ABL.052.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (294, '2021', '6137.01.FAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (295, '2021', '6137.01.FAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (296, '2021', '6137.01.FAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (297, '2021', '6137.01.FAC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (298, '2021', '6137.01.FAC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (299, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (300, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (301, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (302, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (303, '2021', '6103.01.EAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (304, '2021', '6104.01.EAA.994.001', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (305, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (306, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (307, '2021', '6104.01.EAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (308, '2021', '6104.01.EAB.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (309, '2021', '6104.01.EAB.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (310, '2021', '6104.01.EAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (311, '2021', '6104.01.EAB.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (312, '2021', '6104.01.EAB.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (313, '2021', '6104.01.EAB.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (314, '2021', '6104.01.EAB.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (315, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (316, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (317, '2021', '6104.01.EAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (318, '2021', '6104.01.EAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (319, '2021', '6104.01.EAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (320, '2021', '6104.01.EAC.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (321, '2021', '6104.01.EAC.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (322, '2021', '6104.01.EAC.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (323, '2021', '6104.01.EAD.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (324, '2021', '6104.01.EAD.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (325, '2021', '6104.01.EAD.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (326, '2021', '6104.01.EAL.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (327, '2021', '6104.01.EAL.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (328, '2021', '6104.01.EAL.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (329, '2021', '6104.01.EAL.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (330, '2021', '6105.01.EAI.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (331, '2021', '6105.01.EAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (332, '2021', '6105.01.EAJ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (333, '2021', '6106.01.EAF.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (334, '2021', '6106.01.EAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (345, '2021', '1237.01.UAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (346, '2021', '1237.01.UAE.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (347, '2021', '1237.01.UAE.001.052	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (348, '2021', '1237.01.UAE.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (349, '2021', '1237.01.UAE.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (350, '2021', '1237.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (351, '2021', '1237.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (352, '2021', '1237.01.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (353, '2021', '1237.01.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (354, '2021', '1237.01.UBA.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (355, '2021', '1237.01.UBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (356, '2021', '1237.01.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (357, '2021', '1237.01.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (358, '2021', '1237.01.UBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (359, '2021', '1237.01.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (360, '2021', '1237.01.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (361, '2021', '1237.01.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (362, '2021', '1237.01.UBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (363, '2021', '1237.01.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (364, '2021', '1237.01.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (365, '2021', '1237.01.UBA.006.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (366, '2021', '1237.01.UBA.006.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (367, '2021', '1237.01.UBA.006.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (368, '2021', '1237.01.UBA.006.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (369, '2021', '1241.01.AAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (370, '2021', '1241.01.AAG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (371, '2021', '1241.01.AAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (372, '2021', '1241.01.AAH.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (373, '2021', '1241.01.AAH.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (374, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (375, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (376, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (377, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (378, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (379, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (380, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (381, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (382, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (383, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (384, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (385, '2021', '1241.01.ABL.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (386, '2021', '1241.01.CAI.001.051', 'Tugas Pembantua', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (387, '2021', '1241.01.CAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (388, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (389, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (390, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (391, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (392, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (393, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (394, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (395, '2021', '1241.01.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (396, '2021', '1241.01.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (397, '2021', '1241.01.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (398, '2021', '1241.01.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (399, '2021', '1241.01.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (400, '2021', '1241.01.FBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (401, '2021', '1241.01.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (402, '2021', '1241.01.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (403, '2021', '1241.01.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (404, '2021', '1241.01.PEC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (405, '2021', '1241.01.PEC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (406, '2021', '1241.01.PEC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (407, '2021', '1241.01.PEC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (408, '2021', '1241.01.PEC.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (409, '2021', '1241.01.PEC.001.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (410, '2021', '1241.01.PEC.001.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (411, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (412, '2021', '1241.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (413, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (414, '2021', '6136.03.AAG.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (415, '2021', '6136.03.AAG.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (416, '2021', '6136.03.AAG.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (417, '2021', '6136.03.AAG.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (418, '2021', '6136.03.AAG.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (419, '2021', '6136.03.AAG.006.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (420, '2021', '6136.03.ABQ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (421, '2021', '6136.03.AFA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (422, '2021', '6136.03.AFA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (423, '2021', '6136.03.AFA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (424, '2021', '6136.03.AFA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (425, '2021', '6136.03.AFA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (426, '2021', '6136.03.BEG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (427, '2021', '6136.03.BEG.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (428, '2021', '6136.03.BEG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (429, '2021', '6136.03.BEG.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (430, '2021', '6136.03.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (431, '2021', '6136.03.FBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (432, '2021', '6136.03.FBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (433, '2021', '6136.03.FBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (434, '2021', '6136.03.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (435, '2021', '6136.03.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (436, '2021', '6136.03.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (437, '2021', '6136.03.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (438, '2021', '6136.03.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (439, '2021', '6136.03.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (440, '2021', '6136.03.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (441, '2021', '6136.03.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (442, '2021', '6136.03.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (443, '2021', '6136.03.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (444, '2021', '6136.03.FBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (445, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (446, '2021', '6136.03.FBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (447, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (448, '2021', '6136.03.UBA.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (449, '2021', '6136.03.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (450, '2021', '6136.03.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (451, '2021', '6136.03.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (452, '2021', '6136.03.UBA.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (453, '2021', '6136.03.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (454, '2021', '6136.03.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (455, '2021', '6136.03.UBA.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (456, '2021', '6136.03.UBA.002.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (457, '2021', '6136.03.UBA.002.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (458, '2021', '6136.03.UBA.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (459, '2021', '6136.03.UBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (460, '2021', '6136.03.UBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (461, '2021', '6136.03.UBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (462, '2021', '6136.03.UBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (463, '2021', '6136.03.UBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (464, '2021', '6136.03.UBA.003.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (465, '2021', '6136.03.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (466, '2021', '6136.03.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (467, '2021', '6136.03.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (468, '2021', '6136.03.UBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (469, '2021', '6136.03.UBA.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (470, '2021', '6136.03.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (471, '2021', '6136.03.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (472, '2021', '6137.01.ABL.051.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (473, '2021', '6137.01.ABL.052.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (474, '2021', '6137.01.FAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (475, '2021', '6137.01.FAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (476, '2021', '6137.01.FAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (477, '2021', '6137.01.FAC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (478, '2021', '6137.01.FAC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (479, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (480, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (481, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (482, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (483, '2021', '6103.01.EAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (484, '2021', '6104.01.EAA.994.001', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (485, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (486, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (487, '2021', '6104.01.EAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (488, '2021', '6104.01.EAB.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (489, '2021', '6104.01.EAB.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (490, '2021', '6104.01.EAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (491, '2021', '6104.01.EAB.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (492, '2021', '6104.01.EAB.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (493, '2021', '6104.01.EAB.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (494, '2021', '6104.01.EAB.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (495, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (496, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (497, '2021', '6104.01.EAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (498, '2021', '6104.01.EAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (499, '2021', '6104.01.EAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (500, '2021', '6104.01.EAC.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (501, '2021', '6104.01.EAC.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (502, '2021', '6104.01.EAC.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (503, '2021', '6104.01.EAD.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (504, '2021', '6104.01.EAD.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (505, '2021', '6104.01.EAD.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (506, '2021', '6104.01.EAL.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (507, '2021', '6104.01.EAL.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (508, '2021', '6104.01.EAL.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (509, '2021', '6104.01.EAL.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (510, '2021', '6105.01.EAI.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (511, '2021', '6105.01.EAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (512, '2021', '6105.01.EAJ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (513, '2021', '6106.01.EAF.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (514, '2021', '6106.01.EAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (524, '2021', '1237.01.UAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (525, '2021', '1237.01.UAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (526, '2021', '1237.01.UAE.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (527, '2021', '1237.01.UAE.001.052	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (528, '2021', '1237.01.UAE.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (529, '2021', '1237.01.UAE.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (530, '2021', '1237.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (531, '2021', '1237.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (532, '2021', '1237.01.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (533, '2021', '1237.01.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (534, '2021', '1237.01.UBA.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (535, '2021', '1237.01.UBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (536, '2021', '1237.01.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (537, '2021', '1237.01.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (538, '2021', '1237.01.UBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (539, '2021', '1237.01.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (540, '2021', '1237.01.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (541, '2021', '1237.01.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (542, '2021', '1237.01.UBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (543, '2021', '1237.01.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (544, '2021', '1237.01.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (545, '2021', '1237.01.UBA.006.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (546, '2021', '1237.01.UBA.006.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (547, '2021', '1237.01.UBA.006.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (548, '2021', '1237.01.UBA.006.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (549, '2021', '1241.01.AAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (550, '2021', '1241.01.AAG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (551, '2021', '1241.01.AAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (552, '2021', '1241.01.AAH.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (553, '2021', '1241.01.AAH.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (554, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (555, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (556, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (557, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (558, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (559, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (560, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (561, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (562, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (563, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (564, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (565, '2021', '1241.01.ABL.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (566, '2021', '1241.01.CAI.001.051', 'Tugas Pembantua', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (567, '2021', '1241.01.CAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (568, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (569, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (570, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (571, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (572, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (573, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (574, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (575, '2021', '1241.01.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (576, '2021', '1241.01.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (577, '2021', '1241.01.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (578, '2021', '1241.01.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (579, '2021', '1241.01.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (580, '2021', '1241.01.FBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (581, '2021', '1241.01.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (582, '2021', '1241.01.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (583, '2021', '1241.01.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (584, '2021', '1241.01.PEC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (585, '2021', '1241.01.PEC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (586, '2021', '1241.01.PEC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (587, '2021', '1241.01.PEC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (588, '2021', '1241.01.PEC.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (589, '2021', '1241.01.PEC.001.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (590, '2021', '1241.01.PEC.001.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (591, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (592, '2021', '1241.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (593, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (594, '2021', '6136.03.AAG.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (595, '2021', '6136.03.AAG.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (596, '2021', '6136.03.AAG.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (597, '2021', '6136.03.AAG.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (598, '2021', '6136.03.AAG.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (599, '2021', '6136.03.AAG.006.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (600, '2021', '6136.03.ABQ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (601, '2021', '6136.03.AFA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (602, '2021', '6136.03.AFA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (603, '2021', '6136.03.AFA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (604, '2021', '6136.03.AFA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (605, '2021', '6136.03.AFA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (606, '2021', '6136.03.BEG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (607, '2021', '6136.03.BEG.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (608, '2021', '6136.03.BEG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (609, '2021', '6136.03.BEG.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (610, '2021', '6136.03.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (611, '2021', '6136.03.FBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (612, '2021', '6136.03.FBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (613, '2021', '6136.03.FBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (614, '2021', '6136.03.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (615, '2021', '6136.03.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (616, '2021', '6136.03.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (617, '2021', '6136.03.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (618, '2021', '6136.03.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (619, '2021', '6136.03.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (620, '2021', '6136.03.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (621, '2021', '6136.03.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (622, '2021', '6136.03.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (623, '2021', '6136.03.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (624, '2021', '6136.03.FBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (625, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (626, '2021', '6136.03.FBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (627, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (628, '2021', '6136.03.UBA.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (629, '2021', '6136.03.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (630, '2021', '6136.03.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (631, '2021', '6136.03.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (632, '2021', '6136.03.UBA.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (633, '2021', '6136.03.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (634, '2021', '6136.03.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (635, '2021', '6136.03.UBA.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (636, '2021', '6136.03.UBA.002.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (637, '2021', '6136.03.UBA.002.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (638, '2021', '6136.03.UBA.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (639, '2021', '6136.03.UBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (640, '2021', '6136.03.UBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (641, '2021', '6136.03.UBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (642, '2021', '6136.03.UBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (643, '2021', '6136.03.UBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (644, '2021', '6136.03.UBA.003.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (645, '2021', '6136.03.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (646, '2021', '6136.03.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (647, '2021', '6136.03.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (648, '2021', '6136.03.UBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (649, '2021', '6136.03.UBA.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (650, '2021', '6136.03.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (651, '2021', '6136.03.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (652, '2021', '6137.01.ABL.051.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (653, '2021', '6137.01.ABL.052.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (654, '2021', '6137.01.FAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (655, '2021', '6137.01.FAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (656, '2021', '6137.01.FAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (657, '2021', '6137.01.FAC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (658, '2021', '6137.01.FAC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (659, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (660, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (661, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (662, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (663, '2021', '6103.01.EAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (664, '2021', '6104.01.EAA.994.001', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (665, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (666, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (667, '2021', '6104.01.EAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (668, '2021', '6104.01.EAB.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (669, '2021', '6104.01.EAB.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (670, '2021', '6104.01.EAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (671, '2021', '6104.01.EAB.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (672, '2021', '6104.01.EAB.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (673, '2021', '6104.01.EAB.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (674, '2021', '6104.01.EAB.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (675, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (676, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (677, '2021', '6104.01.EAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (678, '2021', '6104.01.EAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (679, '2021', '6104.01.EAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (680, '2021', '6104.01.EAC.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (681, '2021', '6104.01.EAC.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (682, '2021', '6104.01.EAC.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (683, '2021', '6104.01.EAD.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (684, '2021', '6104.01.EAD.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (685, '2021', '6104.01.EAD.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (686, '2021', '6104.01.EAL.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (687, '2021', '6104.01.EAL.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (688, '2021', '6104.01.EAL.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (689, '2021', '6104.01.EAL.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (690, '2021', '6105.01.EAI.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (691, '2021', '6105.01.EAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (692, '2021', '6105.01.EAJ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (693, '2021', '6106.01.EAF.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (694, '2021', '6106.01.EAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (706, '2021', '1237.01.UAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (707, '2021', '1237.01.UAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (708, '2021', '1237.01.UAE.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (709, '2021', '1237.01.UAE.001.052	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (710, '2021', '1237.01.UAE.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (711, '2021', '1237.01.UAE.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (712, '2021', '1237.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (713, '2021', '1237.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (714, '2021', '1237.01.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (715, '2021', '1237.01.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (716, '2021', '1237.01.UBA.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (717, '2021', '1237.01.UBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (718, '2021', '1237.01.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (719, '2021', '1237.01.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (720, '2021', '1237.01.UBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (721, '2021', '1237.01.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (722, '2021', '1237.01.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (723, '2021', '1237.01.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (724, '2021', '1237.01.UBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (725, '2021', '1237.01.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (726, '2021', '1237.01.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (727, '2021', '1237.01.UBA.006.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (728, '2021', '1237.01.UBA.006.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (729, '2021', '1237.01.UBA.006.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (730, '2021', '1237.01.UBA.006.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (731, '2021', '1241.01.AAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (732, '2021', '1241.01.AAG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (733, '2021', '1241.01.AAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (734, '2021', '1241.01.AAH.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (735, '2021', '1241.01.AAH.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (736, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (737, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (738, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (739, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (740, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (741, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (742, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (743, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (744, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (745, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (746, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (747, '2021', '1241.01.ABL.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (748, '2021', '1241.01.CAI.001.051', 'Tugas Pembantua', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (749, '2021', '1241.01.CAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (750, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (751, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (752, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (753, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (754, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (755, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (756, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (757, '2021', '1241.01.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (758, '2021', '1241.01.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (759, '2021', '1241.01.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (760, '2021', '1241.01.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (761, '2021', '1241.01.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (762, '2021', '1241.01.FBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (763, '2021', '1241.01.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (764, '2021', '1241.01.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (765, '2021', '1241.01.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (766, '2021', '1241.01.PEC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (767, '2021', '1241.01.PEC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (768, '2021', '1241.01.PEC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (769, '2021', '1241.01.PEC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (770, '2021', '1241.01.PEC.001.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (771, '2021', '1241.01.PEC.001.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (772, '2021', '1241.01.PEC.001.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (773, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (774, '2021', '1241.01.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (775, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (776, '2021', '6136.03.AAG.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (777, '2021', '6136.03.AAG.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (778, '2021', '6136.03.AAG.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (779, '2021', '6136.03.AAG.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (780, '2021', '6136.03.AAG.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (781, '2021', '6136.03.AAG.006.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (782, '2021', '6136.03.ABQ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (783, '2021', '6136.03.AFA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (784, '2021', '6136.03.AFA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (785, '2021', '6136.03.AFA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (786, '2021', '6136.03.AFA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (787, '2021', '6136.03.AFA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (788, '2021', '6136.03.BEG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (789, '2021', '6136.03.BEG.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (790, '2021', '6136.03.BEG.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (791, '2021', '6136.03.BEG.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (792, '2021', '6136.03.FBA.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (793, '2021', '6136.03.FBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (794, '2021', '6136.03.FBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (795, '2021', '6136.03.FBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (796, '2021', '6136.03.FBA.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (797, '2021', '6136.03.FBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (798, '2021', '6136.03.FBA.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (799, '2021', '6136.03.FBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (800, '2021', '6136.03.FBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (801, '2021', '6136.03.FBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (802, '2021', '6136.03.FBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (803, '2021', '6136.03.FBA.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (804, '2021', '6136.03.FBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (805, '2021', '6136.03.FBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (806, '2021', '6136.03.FBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (807, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (808, '2021', '6136.03.FBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (809, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (810, '2021', '6136.03.UBA.001.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (811, '2021', '6136.03.UBA.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (812, '2021', '6136.03.UBA.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (813, '2021', '6136.03.UBA.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (814, '2021', '6136.03.UBA.002.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (815, '2021', '6136.03.UBA.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (816, '2021', '6136.03.UBA.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (817, '2021', '6136.03.UBA.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (818, '2021', '6136.03.UBA.002.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (819, '2021', '6136.03.UBA.002.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (820, '2021', '6136.03.UBA.003.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (821, '2021', '6136.03.UBA.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (822, '2021', '6136.03.UBA.003.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (823, '2021', '6136.03.UBA.003.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (824, '2021', '6136.03.UBA.003.055', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (825, '2021', '6136.03.UBA.003.056', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (826, '2021', '6136.03.UBA.003.057', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (827, '2021', '6136.03.UBA.004.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (828, '2021', '6136.03.UBA.004.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (829, '2021', '6136.03.UBA.004.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (830, '2021', '6136.03.UBA.004.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (831, '2021', '6136.03.UBA.005.051	', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (832, '2021', '6136.03.UBA.005.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (833, '2021', '6136.03.UBA.005.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (834, '2021', '6137.01.ABL.051.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (835, '2021', '6137.01.ABL.052.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (836, '2021', '6137.01.FAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (837, '2021', '6137.01.FAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (838, '2021', '6137.01.FAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (839, '2021', '6137.01.FAC.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (840, '2021', '6137.01.FAC.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (841, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (842, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (843, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (844, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (845, '2021', '6103.01.EAG.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (846, '2021', '6104.01.EAA.994.001', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (847, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (848, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (849, '2021', '6104.01.EAB.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (850, '2021', '6104.01.EAB.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (851, '2021', '6104.01.EAB.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (852, '2021', '6104.01.EAB.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (853, '2021', '6104.01.EAB.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (854, '2021', '6104.01.EAB.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (855, '2021', '6104.01.EAB.003.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (856, '2021', '6104.01.EAB.003.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (857, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (858, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (859, '2021', '6104.01.EAC.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (860, '2021', '6104.01.EAC.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (861, '2021', '6104.01.EAC.002.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (862, '2021', '6104.01.EAC.002.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (863, '2021', '6104.01.EAC.002.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (864, '2021', '6104.01.EAC.002.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (865, '2021', '6104.01.EAD.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (866, '2021', '6104.01.EAD.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (867, '2021', '6104.01.EAD.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (868, '2021', '6104.01.EAL.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (869, '2021', '6104.01.EAL.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (870, '2021', '6104.01.EAL.001.053', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (871, '2021', '6104.01.EAL.001.054', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (872, '2021', '6105.01.EAI.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (873, '2021', '6105.01.EAI.001.052', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (874, '2021', '6105.01.EAJ.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (875, '2021', '6106.01.EAF.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (876, '2021', '6106.01.EAH.001.051', 'Pusat', '', '', 0);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (879, '2021', '1237.01.PBL.001.061', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (881, '2021', '1237.01.PBL.001.063', 'Pusat', '', '', 700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (882, '2021', '1237.01.PBL.001.064', 'Pusat', '', '', 1300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (883, '2021', '1237.01.PEC.015.051', 'Pusat', '', '', 1180000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (886, '2021', '1237.01.UAB.001.051', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (887, '2021', '1237.01.UAB.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (888, '2021', '1237.01.UAE.001.051	', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (889, '2021', '1237.01.UAE.001.052	', 'Pusat', '', '', 751000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (890, '2021', '1237.01.UAE.001.053', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (891, '2021', '1237.01.UAE.001.054', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (892, '2021', '1237.01.UBA.001.051', 'Pusat', '', '', 249994000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (893, '2021', '1237.01.UBA.001.052', 'Pusat', '', '', 229256000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (894, '2021', '1237.01.UBA.001.053', 'Pusat', '', '', 360000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (895, '2021', '1237.01.UBA.001.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (896, '2021', '1237.01.UBA.001.055', 'Pusat', '', '', 460750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (897, '2021', '1237.01.UBA.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (898, '2021', '1237.01.UBA.002.052', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (899, '2021', '1237.01.UBA.002.053', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (900, '2021', '1237.01.UBA.003.051', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (901, '2021', '1237.01.UBA.004.051	', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (902, '2021', '1237.01.UBA.004.052', 'Pusat', '', '', 900000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (903, '2021', '1237.01.UBA.004.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (904, '2021', '1237.01.UBA.005.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (905, '2021', '1237.01.UBA.005.052', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (906, '2021', '1237.01.UBA.005.053', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (907, '2021', '1237.01.UBA.006.051', 'Pusat', '', '', 800000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (908, '2021', '1237.01.UBA.006.053', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (909, '2021', '1237.01.UBA.006.054', 'Pusat', '', '', 744650000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (910, '2021', '1237.01.UBA.006.055', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (911, '2021', '1241.01.AAG.001.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (912, '2021', '1241.01.AAG.002.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (913, '2021', '1241.01.AAH.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (914, '2021', '1241.01.AAH.001.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (915, '2021', '1241.01.AAH.002.051', 'Pusat', '', '', 50000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (916, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (917, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (918, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 376215000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (919, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 516750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (920, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (921, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (922, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (923, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 416788000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (924, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 500001000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (925, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 510236000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (926, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (927, '2021', '1241.01.ABL.002.054', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (928, '2021', '1241.01.CAI.001.051', 'Tugas Pembantua', '', '', 2850000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (929, '2021', '1241.01.CAI.001.052', 'Pusat', '', '', 50000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (930, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 508900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (931, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 508900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (932, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 458900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (933, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (934, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 664436000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (935, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (936, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 117564000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (937, '2021', '1241.01.FBA.003.051', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (938, '2021', '1241.01.FBA.003.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (939, '2021', '1241.01.FBA.003.053', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (940, '2021', '1241.01.FBA.003.054', 'Pusat', '', '', 249000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (941, '2021', '1241.01.FBA.003.055', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (942, '2021', '1241.01.FBA.003.056', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (943, '2021', '1241.01.FBA.004.051', 'Pusat', '', '', 420000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (944, '2021', '1241.01.FBA.004.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (945, '2021', '1241.01.FBA.004.053', 'Pusat', '', '', 130000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (946, '2021', '1241.01.PEC.001.051', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (947, '2021', '1241.01.PEC.001.052', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (948, '2021', '1241.01.PEC.001.053', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (949, '2021', '1241.01.PEC.001.054', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (950, '2021', '1241.01.PEC.001.055', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (951, '2021', '1241.01.PEC.001.056', 'Pusat', '', '', 700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (952, '2021', '1241.01.PEC.001.057', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (953, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 1300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (954, '2021', '1241.01.UBA.001.052', 'Pusat', '', '', 900000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (955, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 800000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (956, '2021', '6136.03.AAG.001.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (957, '2021', '6136.03.AAG.002.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (958, '2021', '6136.03.AAG.003.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (959, '2021', '6136.03.AAG.004.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (960, '2021', '6136.03.AAG.005.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (961, '2021', '6136.03.AAG.006.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (962, '2021', '6136.03.ABQ.001.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (963, '2021', '6136.03.AFA.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (964, '2021', '6136.03.AFA.002.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (965, '2021', '6136.03.AFA.003.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (966, '2021', '6136.03.AFA.004.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (967, '2021', '6136.03.AFA.005.051', 'Pusat', '', '', 655000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (968, '2021', '6136.03.BEG.001.051', 'Pusat', '', '', 1200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (969, '2021', '6136.03.BEG.001.052', 'Pusat', '', '', 1600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (970, '2021', '6136.03.BEG.002.051', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (971, '2021', '6136.03.BEG.002.052', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (972, '2021', '6136.03.FBA.001.051', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (973, '2021', '6136.03.FBA.001.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (974, '2021', '6136.03.FBA.001.053', 'Pusat', '', '', 145000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (975, '2021', '6136.03.FBA.001.054', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (976, '2021', '6136.03.FBA.002.051', 'Pusat', '', '', 570000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (977, '2021', '6136.03.FBA.002.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (978, '2021', '6136.03.FBA.003.051', 'Pusat', '', '', 350000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (979, '2021', '6136.03.FBA.003.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (980, '2021', '6136.03.FBA.003.053', 'Pusat', '', '', 450000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (981, '2021', '6136.03.FBA.003.054', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (982, '2021', '6136.03.FBA.003.055', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (983, '2021', '6136.03.FBA.004.051', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (984, '2021', '6136.03.FBA.004.052', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (985, '2021', '6136.03.FBA.004.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (986, '2021', '6136.03.FBA.004.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (987, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (988, '2021', '6136.03.FBA.005.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (989, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (990, '2021', '6136.03.UBA.001.051	', 'Pusat', '', '', 1732500000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (991, '2021', '6136.03.UBA.001.052', 'Pusat', '', '', 567500000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (992, '2021', '6136.03.UBA.001.053', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (993, '2021', '6136.03.UBA.001.054', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (994, '2021', '6136.03.UBA.002.051	', 'Pusat', '', '', 806400000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (995, '2021', '6136.03.UBA.002.052', 'Pusat', '', '', 450000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (996, '2021', '6136.03.UBA.002.053', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (997, '2021', '6136.03.UBA.002.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (998, '2021', '6136.03.UBA.002.055', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (999, '2021', '6136.03.UBA.002.056', 'Pusat', '', '', 700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1000, '2021', '6136.03.UBA.003.051	', 'Pusat', '', '', 474000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1001, '2021', '6136.03.UBA.003.052', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1002, '2021', '6136.03.UBA.003.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1003, '2021', '6136.03.UBA.003.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1004, '2021', '6136.03.UBA.003.055', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1005, '2021', '6136.03.UBA.003.056', 'Pusat', '', '', 1050000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1006, '2021', '6136.03.UBA.003.057', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1007, '2021', '6136.03.UBA.004.051	', 'Pusat', '', '', 750000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1008, '2021', '6136.03.UBA.004.052', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1009, '2021', '6136.03.UBA.004.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1010, '2021', '6136.03.UBA.004.054', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1011, '2021', '6136.03.UBA.005.051	', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1012, '2021', '6136.03.UBA.005.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1013, '2021', '6136.03.UBA.005.053', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1014, '2021', '6137.01.ABL.051.051', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1015, '2021', '6137.01.ABL.052.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1016, '2021', '6137.01.FAB.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1017, '2021', '6137.01.FAC.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1018, '2021', '6137.01.FAC.001.052', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1019, '2021', '6137.01.FAC.001.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1020, '2021', '6137.01.FAC.001.054', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1021, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1022, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1023, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1024, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1025, '2021', '6103.01.EAG.001.051', 'Pusat', '', '', 1635700000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1026, '2021', '6104.01.EAA.994.001', 'Pusat', '', '', 39462303000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1027, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 580920000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1028, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 580920000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1029, '2021', '6104.01.EAB.001.051', 'Pusat', '', '', 13280000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1030, '2021', '6104.01.EAB.001.052', 'Pusat', '', '', 39660000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1031, '2021', '6104.01.EAB.001.053', 'Pusat', '', '', 4900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1032, '2021', '6104.01.EAB.002.051', 'Pusat', '', '', 1820000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1033, '2021', '6104.01.EAB.002.052', 'Pusat', '', '', 14750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1034, '2021', '6104.01.EAB.002.053', 'Pusat', '', '', 2750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1035, '2021', '6104.01.EAB.003.051', 'Pusat', '', '', 824540000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1036, '2021', '6104.01.EAB.003.052', 'Pusat', '', '', 375460000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1037, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 1315000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1038, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 730000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1039, '2021', '6104.01.EAC.001.051', 'Pusat', '', '', 1100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1040, '2021', '6104.01.EAC.001.052', 'Pusat', '', '', 937000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1041, '2021', '6104.01.EAC.002.051', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1042, '2021', '6104.01.EAC.002.052', 'Pusat', '', '', 453535000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1043, '2021', '6104.01.EAC.002.053', 'Pusat', '', '', 468975000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1044, '2021', '6104.01.EAC.002.054', 'Pusat', '', '', 694740000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1045, '2021', '6104.01.EAD.001.051', 'Pusat', '', '', 2410000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1046, '2021', '6104.01.EAD.001.052', 'Pusat', '', '', 2240000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1047, '2021', '6104.01.EAD.001.053', 'Pusat', '', '', 310000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1048, '2021', '6104.01.EAL.001.051', 'Pusat', '', '', 386390000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1049, '2021', '6104.01.EAL.001.052', 'Pusat', '', '', 213610000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1050, '2021', '6104.01.EAL.001.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1051, '2021', '6104.01.EAL.001.054', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1052, '2021', '6105.01.EAI.001.051', 'Pusat', '', '', 402600000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1053, '2021', '6105.01.EAI.001.052', 'Pusat', '', '', 397400000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1054, '2021', '6105.01.EAJ.001.051', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1055, '2021', '6106.01.EAF.001.051', 'Pusat', '', '', 1300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1056, '2021', '6106.01.EAH.001.051', 'Pusat', '', '', 1100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1057, '2021', '1237.01.PBL.001.051', 'Dekonsentrasi', '', '', 83431802000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1058, '2021', '1237.01.PBL.001.060', 'Pusat', '', '', 880000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1060, '2021', '1237.01.PBL.001.062', 'Pusat', '', '', 700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1064, '2021', '1237.01.PFA.001.051	', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1065, '2021', '1237.01.PFA.002.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1067, '2021', '1237.01.UAB.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1068, '2021', '1237.01.UAE.001.051	', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1069, '2021', '1237.01.UAE.001.052	', 'Pusat', '', '', 751000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1070, '2021', '1237.01.UAE.001.053', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1071, '2021', '1237.01.UAE.001.054', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1072, '2021', '1237.01.UBA.001.051', 'Pusat', '', '', 249994000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1073, '2021', '1237.01.UBA.001.052', 'Pusat', '', '', 229256000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1074, '2021', '1237.01.UBA.001.053', 'Pusat', '', '', 360000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1075, '2021', '1237.01.UBA.001.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1076, '2021', '1237.01.UBA.001.055', 'Pusat', '', '', 460750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1077, '2021', '1237.01.UBA.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1078, '2021', '1237.01.UBA.002.052', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1079, '2021', '1237.01.UBA.002.053', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1080, '2021', '1237.01.UBA.003.051', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1081, '2021', '1237.01.UBA.004.051	', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1082, '2021', '1237.01.UBA.004.052', 'Pusat', '', '', 900000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1083, '2021', '1237.01.UBA.004.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1084, '2021', '1237.01.UBA.005.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1085, '2021', '1237.01.UBA.005.052', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1086, '2021', '1237.01.UBA.005.053', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1087, '2021', '1237.01.UBA.006.051', 'Pusat', '', '', 800000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1088, '2021', '1237.01.UBA.006.053', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1089, '2021', '1237.01.UBA.006.054', 'Pusat', '', '', 744650000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1090, '2021', '1237.01.UBA.006.055', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1091, '2021', '1241.01.AAG.001.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1092, '2021', '1241.01.AAG.002.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1093, '2021', '1241.01.AAH.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1094, '2021', '1241.01.AAH.001.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1095, '2021', '1241.01.AAH.002.051', 'Pusat', '', '', 50000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1096, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1097, '2021', '1241.01.ABL.001.051	', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1098, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 376215000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1099, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 516750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1100, '2021', '1241.01.ABL.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1101, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1102, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1103, '2021', '1241.01.ABL.002.052', 'Pusat', '', '', 416788000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1104, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 500001000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1105, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 510236000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1106, '2021', '1241.01.ABL.002.053', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1107, '2021', '1241.01.ABL.002.054', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1108, '2021', '1241.01.CAI.001.051', 'Tugas Pembantua', '', '', 2850000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1109, '2021', '1241.01.CAI.001.052', 'Pusat', '', '', 50000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1110, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 508900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1111, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 508900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1112, '2021', '1241.01.FBA.001.051', 'Pusat', '', '', 458900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1113, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1114, '2021', '1241.01.FBA.002.051', 'Pusat', '', '', 664436000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1115, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1116, '2021', '1241.01.FBA.002.052', 'Pusat', '', '', 117564000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1117, '2021', '1241.01.FBA.003.051', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1118, '2021', '1241.01.FBA.003.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1119, '2021', '1241.01.FBA.003.053', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1120, '2021', '1241.01.FBA.003.054', 'Pusat', '', '', 249000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1121, '2021', '1241.01.FBA.003.055', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1122, '2021', '1241.01.FBA.003.056', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1123, '2021', '1241.01.FBA.004.051', 'Pusat', '', '', 420000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1124, '2021', '1241.01.FBA.004.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1125, '2021', '1241.01.FBA.004.053', 'Pusat', '', '', 130000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1126, '2021', '1241.01.PEC.001.051', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1127, '2021', '1241.01.PEC.001.052', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1128, '2021', '1241.01.PEC.001.053', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1129, '2021', '1241.01.PEC.001.054', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1130, '2021', '1241.01.PEC.001.055', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1131, '2021', '1241.01.PEC.001.056', 'Pusat', '', '', 700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1132, '2021', '1241.01.PEC.001.057', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1133, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 1300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1134, '2021', '1241.01.UBA.001.052', 'Pusat', '', '', 900000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1135, '2021', '1241.01.UBA.001.051', 'Pusat', '', '', 800000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1136, '2021', '6136.03.AAG.001.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1137, '2021', '6136.03.AAG.002.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1138, '2021', '6136.03.AAG.003.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1139, '2021', '6136.03.AAG.004.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1140, '2021', '6136.03.AAG.005.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1141, '2021', '6136.03.AAG.006.051	', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1142, '2021', '6136.03.ABQ.001.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1143, '2021', '6136.03.AFA.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1144, '2021', '6136.03.AFA.002.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1145, '2021', '6136.03.AFA.003.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1146, '2021', '6136.03.AFA.004.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1147, '2021', '6136.03.AFA.005.051', 'Pusat', '', '', 655000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1148, '2021', '6136.03.BEG.001.051', 'Pusat', '', '', 1200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1149, '2021', '6136.03.BEG.001.052', 'Pusat', '', '', 1600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1150, '2021', '6136.03.BEG.002.051', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1151, '2021', '6136.03.BEG.002.052', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1152, '2021', '6136.03.FBA.001.051', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1153, '2021', '6136.03.FBA.001.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1154, '2021', '6136.03.FBA.001.053', 'Pusat', '', '', 145000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1155, '2021', '6136.03.FBA.001.054', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1156, '2021', '6136.03.FBA.002.051', 'Pusat', '', '', 570000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1157, '2021', '6136.03.FBA.002.052', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1158, '2021', '6136.03.FBA.003.051', 'Pusat', '', '', 350000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1159, '2021', '6136.03.FBA.003.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1160, '2021', '6136.03.FBA.003.053', 'Pusat', '', '', 450000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1161, '2021', '6136.03.FBA.003.054', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1162, '2021', '6136.03.FBA.003.055', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1163, '2021', '6136.03.FBA.004.051', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1164, '2021', '6136.03.FBA.004.052', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1165, '2021', '6136.03.FBA.004.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1166, '2021', '6136.03.FBA.004.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1167, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1168, '2021', '6136.03.FBA.005.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1169, '2021', '6136.03.FBA.005.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1170, '2021', '6136.03.UBA.001.051	', 'Pusat', '', '', 1732500000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1171, '2021', '6136.03.UBA.001.052', 'Pusat', '', '', 567500000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1172, '2021', '6136.03.UBA.001.053', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1173, '2021', '6136.03.UBA.001.054', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1174, '2021', '6136.03.UBA.002.051	', 'Pusat', '', '', 806400000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1175, '2021', '6136.03.UBA.002.052', 'Pusat', '', '', 450000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1176, '2021', '6136.03.UBA.002.053', 'Pusat', '', '', 1000000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1177, '2021', '6136.03.UBA.002.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1178, '2021', '6136.03.UBA.002.055', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1179, '2021', '6136.03.UBA.002.056', 'Pusat', '', '', 700000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1180, '2021', '6136.03.UBA.003.051	', 'Pusat', '', '', 474000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1181, '2021', '6136.03.UBA.003.052', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1182, '2021', '6136.03.UBA.003.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1183, '2021', '6136.03.UBA.003.054', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1184, '2021', '6136.03.UBA.003.055', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1185, '2021', '6136.03.UBA.003.056', 'Pusat', '', '', 1050000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1186, '2021', '6136.03.UBA.003.057', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1187, '2021', '6136.03.UBA.004.051	', 'Pusat', '', '', 750000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1188, '2021', '6136.03.UBA.004.052', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1189, '2021', '6136.03.UBA.004.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1190, '2021', '6136.03.UBA.004.054', 'Pusat', '', '', 650000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1191, '2021', '6136.03.UBA.005.051	', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1192, '2021', '6136.03.UBA.005.052', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1193, '2021', '6136.03.UBA.005.053', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1194, '2021', '6137.01.ABL.051.051', 'Pusat', '', '', 400000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1195, '2021', '6137.01.ABL.052.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1196, '2021', '6137.01.FAB.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1197, '2021', '6137.01.FAC.001.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1198, '2021', '6137.01.FAC.001.052', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1199, '2021', '6137.01.FAC.001.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1200, '2021', '6137.01.FAC.001.054', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1201, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1202, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 200000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1203, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 150000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1204, '2021', '6137.01.FAC.002.051', 'Pusat', '', '', 250000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1205, '2021', '6103.01.EAG.001.051', 'Pusat', '', '', 1635700000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1206, '2021', '6104.01.EAA.994.001', 'Pusat', '', '', 39462303000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1207, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 580920000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1208, '2021', '6104.01.EAA.994.002', 'Pusat', '', '', 580920000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1209, '2021', '6104.01.EAB.001.051', 'Pusat', '', '', 13280000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1210, '2021', '6104.01.EAB.001.052', 'Pusat', '', '', 39660000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1211, '2021', '6104.01.EAB.001.053', 'Pusat', '', '', 4900000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1212, '2021', '6104.01.EAB.002.051', 'Pusat', '', '', 1820000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1213, '2021', '6104.01.EAB.002.052', 'Pusat', '', '', 14750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1214, '2021', '6104.01.EAB.002.053', 'Pusat', '', '', 2750000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1215, '2021', '6104.01.EAB.003.051', 'Pusat', '', '', 824540000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1216, '2021', '6104.01.EAB.003.052', 'Pusat', '', '', 375460000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1217, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 1315000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1218, '2021', '6104.01.EAB.004.051', 'Pusat', '', '', 730000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1219, '2021', '6104.01.EAC.001.051', 'Pusat', '', '', 1100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1220, '2021', '6104.01.EAC.001.052', 'Pusat', '', '', 937000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1221, '2021', '6104.01.EAC.002.051', 'Pusat', '', '', 600000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1222, '2021', '6104.01.EAC.002.052', 'Pusat', '', '', 453535000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1223, '2021', '6104.01.EAC.002.053', 'Pusat', '', '', 468975000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1224, '2021', '6104.01.EAC.002.054', 'Pusat', '', '', 694740000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1225, '2021', '6104.01.EAD.001.051', 'Pusat', '', '', 2410000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1226, '2021', '6104.01.EAD.001.052', 'Pusat', '', '', 2240000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1227, '2021', '6104.01.EAD.001.053', 'Pusat', '', '', 310000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1228, '2021', '6104.01.EAL.001.051', 'Pusat', '', '', 386390000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1229, '2021', '6104.01.EAL.001.052', 'Pusat', '', '', 213610000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1230, '2021', '6104.01.EAL.001.053', 'Pusat', '', '', 300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1231, '2021', '6104.01.EAL.001.054', 'Pusat', '', '', 100000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1232, '2021', '6105.01.EAI.001.051', 'Pusat', '', '', 402600000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1233, '2021', '6105.01.EAI.001.052', 'Pusat', '', '', 397400000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1234, '2021', '6105.01.EAJ.001.051', 'Pusat', '', '', 1500000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1235, '2021', '6106.01.EAF.001.051', 'Pusat', '', '', 1300000000);
INSERT INTO `tb_pagu` (`id_pagu`, `tahun`, `no_akun`, `jenis_akun`, `prov`, `kab`, `pagu`) VALUES (1236, '2021', '6106.01.EAH.001.051', 'Pusat', '', '', 1100000000);
COMMIT;

-- ----------------------------
-- Table structure for tb_pagu_rev
-- ----------------------------
DROP TABLE IF EXISTS `tb_pagu_rev`;
CREATE TABLE `tb_pagu_rev` (
  `id_pagurev` int(11) NOT NULL,
  `id_pagu` int(11) NOT NULL,
  `revisike` varchar(2) NOT NULL,
  `pagurev` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pagu_rev
-- ----------------------------
BEGIN;
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (4, 1, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (16, 26, '', 2000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (17, 31, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (19, 33, '', 850000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (20, 34, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (21, 36, '', 600000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (22, 37, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (23, 38, '', 580000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (24, 39, '', 480000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (25, 52, '', 480000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (26, 59, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (27, 61, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (28, 63, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (30, 73, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (31, 74, '', 900000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (32, 77, '', 751761000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (33, 79, '', 1171760000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (34, 1, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (35, 4, '', 300090000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (36, 5, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (37, 6, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (38, 7, '', 2000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (39, 8, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (40, 9, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (43, 12, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (44, 13, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (45, 14, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (48, 17, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (49, 18, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (50, 19, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (51, 20, '', 109837000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (52, 21, '', 1500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (53, 3, '', 700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (54, 22, '', 650000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (55, 23, '', 850000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (56, 25, '', 1500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (57, 26, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (58, 27, '', 700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (59, 30, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (60, 32, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (61, 33, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (62, 125, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (63, 126, '', 490000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (64, 127, '', 740000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (65, 128, '', 1171760000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (66, 129, '', 14000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (67, 136, '', 600000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (68, 130, '', 39660000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (69, 133, '', 14575000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (70, 135, '', 737969000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (71, 136, '', 2101000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (72, 137, '', 2071630000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (73, 138, '', 1933680000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (74, 139, '', 650000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (75, 140, '', 1782340000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (76, 141, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (77, 142, '', 1700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (78, 143, '', 1030000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (79, 144, '', 1200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (80, 145, '', 775338000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (81, 146, '', 3423780000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (82, 147, '', 792000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (83, 149, '', 7124730000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (84, 115, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (85, 116, '', 1182230000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (86, 117, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (87, 120, '', 550000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (88, 121, '', 1933880000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (89, 122, '', 969810000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (90, 123, '', 2116300000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (91, 124, '', 700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (92, 86, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (93, 87, '', 795200000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (94, 89, '', 704800000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (95, 90, '', 550000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (96, 91, '', 750000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (97, 92, '', 885000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (98, 93, '', 365000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (99, 94, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (100, 95, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (101, 96, '', 650000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (102, 97, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (103, 98, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (104, 99, '', 100000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (105, 100, '', 369430000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (106, 101, '', 670000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (107, 102, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (108, 103, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (109, 104, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (110, 105, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (111, 106, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (112, 107, '', 305711000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (113, 108, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (114, 109, '', 342630000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (115, 110, '', 476289000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (116, 112, '', 470000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (117, 113, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (118, 114, '', 700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (119, 50, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (120, 51, '', 850000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (121, 52, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (122, 53, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (123, 54, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (124, 55, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (125, 36, '', 420000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (126, 37, '', 163535000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (127, 38, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (128, 39, '', 406000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (129, 40, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (130, 41, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (131, 42, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (132, 43, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (133, 44, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (134, 45, '', 100000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (135, 46, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (136, 47, '', 270000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (137, 48, '', 298558000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (138, 49, '', 700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (139, 56, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (140, 57, '', 470000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (141, 58, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (142, 59, '', 671750000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (143, 60, '', 700000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (144, 61, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (145, 62, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (146, 63, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (147, 64, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (148, 65, '', 900000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (149, 66, '', 200000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (150, 67, '', 600000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (151, 68, '', 180000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (152, 69, '', 500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (153, 70, '', 1500000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (154, 71, '', 1000000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (155, 72, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (156, 73, '', 905825000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (157, 74, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (158, 75, '', 250000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (159, 76, '', 400000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (160, 77, '', 100000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (161, 78, '', 1100000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (162, 79, '', 150000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (163, 80, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (164, 81, '', 350000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (165, 82, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (166, 83, '', 243650000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (167, 84, '', 300000000);
INSERT INTO `tb_pagu_rev` (`id_pagurev`, `id_pagu`, `revisike`, `pagurev`) VALUES (168, 85, '', 700000000);
COMMIT;

-- ----------------------------
-- Table structure for tb_subindikator
-- ----------------------------
DROP TABLE IF EXISTS `tb_subindikator`;
CREATE TABLE `tb_subindikator` (
  `id_subindikator` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `nama_target` varchar(200) NOT NULL,
  `ket_target` varchar(200) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `rprosen_1` int(11) NOT NULL,
  `rprosen_2` int(11) NOT NULL,
  `rprosen_3` int(11) NOT NULL,
  `rprosen_4` int(11) NOT NULL,
  `rprosen_5` int(11) NOT NULL,
  `rprosen_6` int(11) NOT NULL,
  `rprosen_7` int(11) NOT NULL,
  `rprosen_8` int(11) NOT NULL,
  `rprosen_9` int(11) NOT NULL,
  `rprosen_10` int(11) NOT NULL,
  `rprosen_11` int(11) NOT NULL,
  `rprosen_12` int(11) NOT NULL,
  `rnilai_1` float NOT NULL,
  `rnilai_2` float NOT NULL,
  `rnilai_3` float NOT NULL,
  `rnilai_4` float NOT NULL,
  `rnilai_5` float NOT NULL,
  `rnilai_6` float NOT NULL,
  `rnilai_7` float NOT NULL,
  `rnilai_8` float NOT NULL,
  `rnilai_9` float NOT NULL,
  `rnilai_10` float NOT NULL,
  `rnilai_11` float NOT NULL,
  `rnilai_12` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_subindikator
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tbm_akun
-- ----------------------------
DROP TABLE IF EXISTS `tbm_akun`;
CREATE TABLE `tbm_akun` (
  `id_akun` int(11) NOT NULL,
  `no_akun` varchar(50) NOT NULL,
  `akun` varchar(200) NOT NULL,
  `id_dir` int(11) NOT NULL,
  `id_subdir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_akun
-- ----------------------------
BEGIN;
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1, '1237.01.051', 'Sosialisasi kebijakan program dan kegiatan di kelurahan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (2, '1237.01.052', 'Pemantapan penyelenggaraan program dan kegiatan kelurahan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (3, '1237.01.053', 'Asistensi dan Supervisi Penyelenggaraan Evaluasi Kinerja Kelurahan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (4, '1237.02.051', 'Asistensi Pelimpahan Kewenangan kepada Camat dalam mendukung inovasi pelayanan di kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (5, '1237.02.052', 'Peningkatan Kapasitas Aparatur Pemerintah Daerah dalam mendukung inovasi pelayanan publik di kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (6, '1237.02.053', 'Asistensi dan Supervisi Penyelenggaraan Evaluasi Kinerja Kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (7, '1237.03.051', 'Koordinasi dan supervisi penyelenggaraan PTSP', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (8, '1237.03.052', 'Pengembangan aplikasi e-monev PTSP', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (9, '1237.03.053', 'Bimtek penyelenggaraan PTSP berbasis elektronik', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (10, '1237.03.054', 'Asistensi penerapan PTSP berbasis elektonik di daerah', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (11, '1237.03.055', 'Pembinaan penyelenggaraan PTSP berbasis elekronik', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (12, '1237.04.051', 'Pemetaan urusan yang dapat dikerjasamakan', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (13, '1237.04.052', 'Asistensi dan supervisi pelaksanaan kerjasama', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (14, '1237.05.051', 'Pemetaan urusan yang dapat dikerjasamakan', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (15, '1237.05.052', 'Sinkronisasi potensi kerjasama di bidang ekonomi daerah', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (16, '1237.05.053', 'Asistensi dan supervisi kerjasama daerah di bidang ekonomi daerah', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (17, '1237.06.051', 'Sinkronisasi perencanaan program/ kegiatan Dekonsentrasi dan Tugas Pembantuan Kementerian/Lembaga', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (18, '1237.06.052', 'Monev kebijakan penyelenggaraan Dekonsentrasi dan Tugas Pembantuan di Daerah', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (19, '1237.06.053', 'Koordinasi pembinaan dan pengawasan Tugas Pembantuan di Daerah', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (20, '1237.07.051', 'Tugas dan wewenang yang dilaksanakan oleh Gubernur sebagai wakil pemerintah pusat (Dekonsentrasi)', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (21, '1237.07.054', 'Monitoring dan evaluasi pelaksanaan tugas dan wewenang Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (22, '1237.07.055', 'Koordinasi nasional perangkat Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (23, '1237.07.056', 'Penyusunan instrumen pelaksanaan korbinwas Gubernur sebagai Wakil Pemerintah Pusat di daerah', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (24, '1237.07.057', 'Peningkatan kapasitas aparatur perangkat Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (25, '1237.12.051', 'Koordinasi Sekretariat Bersama pembinaan Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (26, '1237.12.052', 'Asistensi kegiatan Dekonsentrasi Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (27, '1237.70.055', 'Pelayanan umum, Pelayanan rumah tangga dan perlengkapan', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (28, '1238.01.051', 'Kebijakan tentang Standar Pelayanan dan Tata Cara Penyerahan Fasilitas Pelayanan Perkotaan', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (29, '1238.01.055', 'Kebijakan tentang Rencana Penyelenggaraan Pengelolaan Perkotaan', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (30, '1238.02.051', 'Penyusunan indeks pelayanan perkotaan', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (31, '1238.02.052', 'Asistensi penyelenggaraan pengelolaan perkotaan di kawasan perkotaan (Kota Baru Publik)', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (32, '1238.02.053', 'Asistensi penyelenggaraan pengelolaan perkotaan di kawasan perkotaan (Metropolitan)', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (33, '1238.05.051', 'Penyelesaian pembahasan isu kebijakan batas antar negara RI- Malaysia', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (34, '1238.05.052', 'Persidangan ke-43 Joint Indonesia-Malaysia (JIM)', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (35, '1238.05.053', 'Survey Investigation, Refixation, and Maintenance (Survey IRM) tanda batas internasional RI-Malaysia', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (36, '1238.05.054', 'Penyelesaian pembahasan permasalahan batas antar negara RI-PNG', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (37, '1238.05.055', 'Penyelesaian pembahasan permasalahan batas antar negara RI-RDTL', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (38, '1238.05.056', 'Asistensi pengelolaan Pulau-Pulau Kecil Terluar', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (39, '1238.05.057', 'Pemetaan indeks pemenuhan kebutuhan sarpras pemerintahan', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (40, '1238.06.051', 'Asistensi pengelolaan dan pengembangan Kawasan Ekonomi Khusus di Daerah', 1238, 12381);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (41, '1238.06.052', 'Supervisi pengelolaan dan pengembangan Kawasan Khusus Lingkup I', 1238, 12381);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (42, '1238.06.053', 'Bimbingan Teknis penyelenggaraan Kawasan Khusus', 1238, 12381);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (43, '1238.06.054', 'Sinkronisasi kebijakan Pusat dan Daerah dalam rangka sinergitas pengelolaan dan pengembangan Kawasan Khusus Lingkup II', 1238, 12382);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (44, '1238.06.055', 'Asistensi dan supervisi dalam penanganan permasalahan Kawasan Khusus Lingkup II', 1238, 12382);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (45, '1238.06.056', 'Evaluasi penyelenggaran pemerintahan bidang Kawasan Khusus Lingkup II', 1238, 12382);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (46, '1238.07.051', 'Asistensi penanganan masalah dan konflik pertanahan di daerah', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (47, '1238.07.053', 'Sosialisasi kebijakan Pemerintah di Bidang Pertanahan', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (48, '1238.07.054', 'Peningkatan kapasitas aparatur Pemda di Bidang Pertanahan', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (49, '1238.70.055', 'Pelayanan umum, pelayanan rumah tangga dan perlengkapan', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (50, '1239.01.051', 'Pemetaan dan analisis pemenuhan kebutuhan PPNS di daerah', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (51, '1239.01.052', 'Pemenuhan kebutuhan PPNS melalui fasilitasi pembentukan PPNS', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (52, '1239.02.051', 'Penyusunan Permendagri tentang Sistem Informasi Manajemen Polisi Pamong Praja', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (53, '1239.02.052', 'Penyusunan Permendagri tentang Logo, Bendera PATAKA dan Tata Upacara Satpol PP', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (54, '1239.02.055', 'Penyusunan Pedoman Penyelenggaraan Perlindungan Masyarakat', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (55, '1239.02.056', 'Penyusunan Kebijakan tentang Standardisasi Polisi Pamong Praja ', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (56, '1239.03.052', 'Pemetaan formasi Jabatan Fungsional di daerah', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (57, '1239.03.053', 'Koordinasi pengelolaan tim Penilai Angka Kredit dan Sekretariat Jabatan Fungsional Tingkat Provinsi', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (58, '1239.03.054', 'Pelaksanaan uji kompetensi kenaikan jabatan di daerah', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (59, '1239.03.056', 'Bimtek penilaian angka kredit', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (60, '1239.03.057', 'Asistensi dan supervisi pengelolaan Jabatan Fungsional', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (61, '1239.03.058', 'Sosialisasi kebijakan tentang Jabatan Fungsional Jafung Pol PP', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (62, '1239.03.059', 'Penyelenggaraan pertemuan dalam rangka koordinasi Sekretariat Bersama RANHAM 2020-2024 dan Pemerintah Provinsi serta fasilitasi konvensi Internasional', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (63, '1239.03.060', 'Asistensi dan supervisi pelaksanaan Aksi Hak Asasi Manusia di Daerah', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (64, '1239.03.061', 'Bimbingan Teknis pelayanan publik berbasis HAM bagi camat ', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (65, '1239.03.062', 'Supervisi penegakan Peraturan Daerah yang berprespektif HAM', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (66, '1239.03.063', 'Sosialisasi Kebijakan tentang Penghargaan Bagi Satuan Polisi Pamong Praja ', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (67, '1239.03.064', 'Bimtek bagi PPNS dalam penyusunan rencana operasi Penegakan Perda dan proses pemberkasan acara singkat', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (68, '1239.03.065', 'Penyusunan instrumen perangkat uji Satpol PP', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (69, '1239.04.051', 'Pendataan aspek penerapan SPM Sub Bidang Trantibum', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (70, '1239.04.052', 'Bimtek penerapan standar teknis mutu pelayanan dasar sub urusan ketenteraman dan ketertiban umum di Provinsi dan Kabupaten/Kota', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (71, '1239.04.053', 'Asistensi dan supevisi penerapan SPM Sub Bidang Trantibum', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (72, '1239.05.052', 'Asistensi dan supervisi penyelenggaraan perlindungan masyarakat', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (73, '1239.05.053', 'Supervisi penyelenggaraan Trantibumlinmas dalam rangka Pilkada Serentak 2020', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (74, '1239.05.054', 'Sosialisasi Permendagri Bidang Perlindungan Masyarakat', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (75, '1239.05.055', 'Pemuktahiran data Satlinmas', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (76, '1239.05.056', 'Koordinasi kerjasama Internasional Bidang Perlindungan Masyarakat pada International Civil Defence Organisation', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (77, '1239.06.051', 'Penyusunan variabel ketertiban umum dan perlindungan masyarakat', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (78, '1239.06.052', 'Koordinasi nasional Satuan Polisi Pamong Praja', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (79, '1239.06.053', 'Asistensi dan supervisi pelaksanaan Trantibum dalam rangka penyelenggaran Trantibum', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (80, '1239.07.051', 'Pendataan dan asistensi pelaksanaan penegakan Peraturan Daerah', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (81, '1239.07.052', 'Supervisi penyelenggaraan penegakan Perda yang memiliki sanksi pidana oleh PPNS', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (82, '1239.07.053', 'Sosialisasi Permendagri Nomor 3 Tahun 2019 tentang PPNS di Lingkungan Pemda', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (83, '1239.08.051', 'Pemetaan standarisasi sarana dan prasarana Satpol PP di daerah', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (84, '1239.08.052', 'Asistensi pemenuhan standarisasi sarana prasarana dalam penegakan Perda dan penyelenggaraan Trantibum', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (85, '1239.70.055', 'Pelayanan umum, pelayanan rumah tangga dan perlengkapan', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (86, '1240.01.051', 'Penyusunan instrumen kebijakan penerapan SPM Sub-Urusan Bencana daerah Kabupaten/Kota', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (87, '1240.01.052', 'Asistensi dan supervisi penerapan SPM Sub Urusan Bencana', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (88, '1240.01.053', 'Bimbingan teknis mekanisme penyusunan program/ kegiatan berbasis SPM Sub Urusan Bencana', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (89, '1240.01.054', 'Pengembangan portal sistem informasi penanggulangan bencana', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (90, '1240.01.055', 'Peningkatan kapasitas aparatur dalam pengintegrasian dokumen penanggulangan bencana', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (91, '1240.02.051', 'Bimbingan Teknis penerapan SPM Sub Urusan Kebakaran di Daerah', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (92, '1240.02.052', 'Asistensi dan supervisi penerapan SPM Sub Urusan Kebakaran di Daerah', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (93, '1240.02.053', 'Fasilitasi peningkatan kapasitas Pemerintah Provinsi dalam penerapan SPM Sub Urusan Kebakaran', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (94, '1240.02.055', 'Pemantapan Kesiapsiagaan Nasional Aparatur Pemadam Kebakaran', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (95, '1240.03.051', 'Pemetaan dan identifikasi kapasitas Sumber Daya Pemadam Kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (96, '1240.03.052', 'Kesiapsiagaan aparatur Pemadam kebakaran tingkat nasional melalui Skill Competition', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (97, '1240.03.054', 'Sosialisasi implementasi Jabatan fungsional pelaksanaan sub urusan kebakaran dan penyelamatan', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (98, '1240.05.051', 'Penyusunan Panduan Peningkatan Kapasitas Sumber Daya Pemadam Kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (99, '1240.05.052', 'Penyusunan Permendagri terkait Instrumen Kelengkapan Pelaksanaan Jabatan Fungsional Kebakaran dan Penyelamatan', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (100, '1240.05.054', 'Rancangan Permendagri tentang Pedoman Kompetensi Perangkat Daerah Penyelenggara Sub Urusan Kebakaran dan Penyelamatan', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (101, '1240.05.055', 'Rancangan Permendagri tentang Standar Operasional Prosedur (SOP) Investigasi Kejadian Kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (102, '1240.05.057', 'Penyusunan Naskah Akademis Pembentukan Jabatan Fungsional Analis Penyelamatan Kebakaran pada Instansi Pusat', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (103, '1240.05.058', 'Penyusunan Permendagri Tentang Formasi Jabatan Fungsional urusan kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (104, '1240.05.059', 'Pedoman Penetapan Jumlah Aparatur dan Sarana Prasarana Pemadam Kebakaran', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (105, '1240.05.060', 'Penyusunan Naskah Akademis RUU Kebakaran dan Penyelamatan', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (106, '1240.05.061', 'Penyusunan Pedoman terkait Kriteria Teknis Rawan Kebakaran Permukiman dan Rencana Induk Sistem Proteksi Kebakaran', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (107, '1240.06.051', 'Identifikasi dan kualfikasi daerah yang melaksanakan penanggulangan bencana', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (108, '1240.06.052', 'Evaluasi penyelenggaraan tanggap darurat dan pasca bencana', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (109, '1240.06.053', 'Asistensi dan supervisi kelembagaan penanggulangan bencana', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (110, '1240.06.054', 'Monitoring dan pendampingan penyelenggaraan Pemerintahan saat Tanggap Darurat dan Pasca Bencana', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (111, '1240.06.055', 'Pengintegrasian data informasi terkait kebencanaan terpadu lintas sektor di daerah', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (112, '1240.06.056', 'Pemanfaatan sarana prasarana sistem informasi kebencanaan ', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (113, '1240.07.051', 'Penyusunan Standar Pelayanan Damkar di Daerah', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (114, '1240.70.055', 'Pelayanan umum, pelayanan rumah tangga dan perlengkapan', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (115, '1241.01.051', 'Penyusunan Permendagri Kode dan Data Wilayah Administrasi Pemerintahan', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (116, '1241.02.051', 'Penyelenggaraan verifikasi terhadap unsur rupabumi', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (117, '1241.02.052', 'Supervisi kegiatan pembakuan nama rupabumi', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (118, '1241.02.053', 'Penyusunan pokok pikiran (naskah) hubungan Pusat dan Daerah dalam pemberian nama dan Rupabumi', 1241, 12415);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (119, '1241.03.051', 'Penyelesaian Segmen Batas Daerah', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (120, '1241.05.051', 'Pemutakhiran kode dan data wilayah administrasi pemerintahan', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (121, '1241.06.051', 'Pembuatan peta batas daerah secara kartometrik', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (122, '1241.06.052', 'Penyelesaian perselisihan segmen batas antar daerah', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (123, '1241.06.053', 'Penyusunan rumusan kebijakan tentang Batas Daerah', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (124, '1241.70.055', 'Pelayanan umum, pelayanan rumah tangga dan perlengkapan', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (125, '1242.01.051', 'Sosialisasi kebijakan bidang administrasi kewilayahan', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (126, '1242.01.052', 'Penyusunan kegiatan strategis penyelenggaraan pembinaan wilayah', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (127, '1242.01.053', 'Penyelenggaraan sinergitas bidang pembinaan administrasi kewilayahan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (128, '1242.01.054', 'Koordinasi dan dukungan dlm rgk Penguatan Kebijakan penyelenggaraan pembinaan wilayah', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (129, '1242.90.051', 'Persiapan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (130, '1242.90.052', 'Pelaksanaan ', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (131, '1242.90.053', 'Pelaporan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (132, '1242.91.051', 'Persiapan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (133, '1242.91.052', 'Pelaksanaan ', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (134, '1242.91.053', 'Pelaporan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (135, '1242.50.051', 'Penyusunan rencana program dan rencana anggaran', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (136, '1242.50.052', 'Pelaksanaan pemantauan dan evaluasi', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (137, '1242.50.053', 'Pengelolaan data dan informasi', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (138, '1242.50.054', 'Pengelolaan keuangan', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (139, '1242.50.055', 'Pengelolaan perbendaharaan', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (140, '1242.50.056', 'Pelayanan hukum', 1242, 12423);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (141, '1242.50.057', 'Pengelolaan kepegawaian', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (142, '1242.50.058', 'Pelayanan umum dan perlengkapan', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (143, '1242.50.060', 'Pelayanan humas dan protokoler', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (144, '1242.50.061', 'Pelayanan organisasi, tatalaksana, dan reformasi birokrasi', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (145, '1242.51.051', 'Pengadaan kendaraan bermotor', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (146, '1242.51.052', 'Pengadaan perangkat pengolah data dan komunikasi', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (147, '1242.51.053', 'Pengadaan peralatan fasilitas perkantoran', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (148, '1242.94.051', 'Gaji dan Tunjangan', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (149, '1242.94.052', 'Operasional dan Pemeliharaan Kantor', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1053, '1237.01.PBL.001.051', 'Dekonsentrasi Peningkatan Peran Gubernur Sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1054, '1237.01.PBL.001.060', 'Asistensi penyelenggaraan Dekonsentrasi Peran Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1055, '1237.01.PBL.001.061', 'Evaluasi pelaksanaan kebijakan penyelenggaraan DKTP di daerah', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1056, '1237.01.PBL.001.062', 'Asistensi pelaksanaan Binwas TP kab/kota oleh GWPP', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1057, '1237.01.PBL.001.063', 'Evaluasi program dan kegiatan kelurahan yang bersumber dari DAU tambahan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1058, '1237.01.PBL.001.064', 'Penyusunan Indeks tata kelola penyelenggaraan kewilayahan', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1059, '1237.01.PEC.015.051', 'Asistensi implementasi Kerja Sama pada Daerah Prioritas Pariwisata (DPP)', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1060, '1237.01.PFA.001.051	', 'Penyusunan Kebijakan terkait Gubernur sebagai wakil pemerintah pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1061, '1237.01.PFA.002.051', 'Penyusunan kebijakan penyelenggaraan PTSP', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1062, '1237.01.UAB.001.051', 'Pembangunan sistem informasi pelaporan Gubernur sebagai Wakil Pemerintah', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1063, '1237.01.UAB.002.051', 'Updating data dan pemeliharaan sistem aplikasi E Monev PTSP', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1064, '1237.01.UAE.001.051	', 'Sekretariat Bersama Pembinaan Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1065, '1237.01.UAE.001.052	', 'Monitoring dan Evaluasi Pelaksanaan Tugas dan Wewenang Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1066, '1237.01.UAE.001.053', 'Penyusunan Instrumen Pelaksanaan Tugas dan Wewenang, instrumen penilaian indeks Gubernur sebagai Wakil Pemerintah Pusat di Daerah serta pelaksanaan penilaian Indeks Kinerja Gubernur sebagai Wakil Peme', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1067, '1237.01.UAE.001.054', 'Koordinasi Nasional Perangkat Gubernur sebagai Wakil Pemerintah Pusat', 1237, 12371);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1068, '1237.01.UBA.001.051', 'Pilot Project Inovasi Pelayanan Terpadu di Kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1069, '1237.01.UBA.001.052', 'Supervisi Pelimpahan Kewenangan kepada Camat dalam Mendukung Inovasi Pelayanan Terpadu di Kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1070, '1237.01.UBA.001.053', 'Evaluasi Kinerja Kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1071, '1237.01.UBA.001.054', 'Perumusan Jabatan Fungsional di Kecamatan', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1072, '1237.01.UBA.001.055', 'Gerakan kelurahan produktif dan aman COVID-19', 1237, 12375);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1073, '1237.01.UBA.002.051', 'Pemetaan urusan yang dapat dikerjasamakan', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1074, '1237.01.UBA.002.052', 'Sinkronisasi potensi daerah yang dapat dikerjasamakan', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1075, '1237.01.UBA.002.053', 'Asistensi inisiasi kesepakatan kerja sama daerah dalam rangka mendorong pertumbuhan ekonomi sesuai potensi daerah', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1076, '1237.01.UBA.003.051', 'Asistensi penguatan peran dan fungsi TKKSD dalam proses perencanaan dan implementasi kerja sama daerah', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1077, '1237.01.UBA.004.051	', 'Pemetaan potensi kerjasama daerah dalam peningkatan daya saing daerah malalui pengembangan ekonomi', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1078, '1237.01.UBA.004.052', 'Asistensi peningkatan daya saing daerah melalui kerjasama di bidang ekonomi', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1079, '1237.01.UBA.004.053', 'Sinkronisasi kebijakan dan program/kegiatan DKTP K/L dalam mendukung pengembangan ekonomi daerah', 1237, 12372);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1080, '1237.01.UBA.005.051', 'Inisiasi perjanjian kerja sama yang diintegrasikan ke dalam dokumen perencanaan penganggaran', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1081, '1237.01.UBA.005.052', 'Assistensi pengintegrasian kerjasama ke dalam dokumen perencanaan dan anggaran', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1082, '1237.01.UBA.005.053', 'Koordinasi dan Evaluasi dalam rangka hubungan pusat dan daerah serta kerja sama daerah', 1237, 12373);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1083, '1237.01.UBA.006.051', 'Koordinasi Dan Supervisi PTSP Berbasis Elektronik', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1084, '1237.01.UBA.006.053', 'Bimbingan Teknis Penyelengaraan PTSP Berbasis Elektronik', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1085, '1237.01.UBA.006.054', 'Koordinasi dan Supervisi Pendelegasian kewenangan Perizinan kepada PTSP', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1086, '1237.01.UBA.006.055', 'Koordinasi pembentukan JFT Pranata Perizinan', 1237, 12374);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1087, '1241.01.AAG.001.051', 'Penyusunan Permendagri Kode dan Data Wilayah Administrasi Pemerintahan', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1088, '1241.01.AAG.002.051', 'Revisi Permendagri tentang Pedoman Pemberian Nama Daerah, Pemberian Nama Ibu Kota, Perubahan Nama Daerah, Perubahan Nama Ibu Kota dan Pemindahan Ibu Kota', 1241, 12415);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1089, '1241.01.AAH.001.051', 'Pengukuran Indeks Pelayanan Perkotaan', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1090, '1241.01.AAH.001.052', 'Penyusunan Basis Data Pelayanan Perkotaan', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1091, '1241.01.AAH.002.051', 'Penyusunan Kepmendagri tentang Petunjuk Teknis Pemberian Kode dan Data Wilayah Administrasi Pemerintahan', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1092, '1241.01.ABL.001.051	', 'Verifikasi kode dan data wilayah administrasi pemerintahan', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1093, '1241.01.ABL.001.051	', 'Verifikasi kode dan data wilayah administrasi pemerintahan', 1241, 12415);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1094, '1241.01.ABL.002.051', 'Pembuatan peta batas daerah secara kartometrik', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1095, '1241.01.ABL.002.051', 'Pembuatan peta batas daerah secara kartometrik', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1096, '1241.01.ABL.002.051', 'Pembuatan peta batas daerah secara kartometrik', 1241, 12413);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1097, '1241.01.ABL.002.052', 'Penyelesaian perselisihan segmen batas antar daerah', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1098, '1241.01.ABL.002.052', 'Penyelesaian perselisihan segmen batas antar daerah', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1099, '1241.01.ABL.002.052', 'Penyelesaian perselisihan segmen batas antar daerah', 1241, 12413);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1100, '1241.01.ABL.002.053', 'Penyusunan Rumusan Kebijakan tentang Batas Daerah', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1101, '1241.01.ABL.002.053', 'Penyusunan Rumusan Kebijakan tentang Batas Daerah', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1102, '1241.01.ABL.002.053', 'Penyusunan Rumusan Kebijakan tentang Batas Daerah', 1241, 12413);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1103, '1241.01.ABL.002.054', 'Monitoring dan evaluasi penyelesaian segmen batas daerah', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1104, '1241.01.CAI.001.051', 'Pembangunan Sarana Prasarana Pemerintahan di Kawasan Perbatasan Antar Negara dan PPKT', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1105, '1241.01.CAI.001.052', 'Asistensi Pembangunan Sarana Prasarana Pemerintahan di Kawasan Perbatasan Antar Negara dan PPKT', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1106, '1241.01.FBA.001.051', 'Penyelesaian Segmen Batas Daerah', 1241, 12411);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1107, '1241.01.FBA.001.051', 'Penyelesaian Segmen Batas Daerah', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1108, '1241.01.FBA.001.051', 'Penyelesaian Segmen Batas Daerah', 1241, 12413);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1109, '1241.01.FBA.002.051', 'Penyelenggaraan Verifikasi terhadap unsur Rupabumi', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1110, '1241.01.FBA.002.051', 'Penyelenggaraan Verifikasi terhadap unsur Rupabumi', 1241, 12415);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1111, '1241.01.FBA.002.052', 'Supervisi Kegiatan Pembakuan Nama Rupabumi', 1241, 12414);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1112, '1241.01.FBA.002.052', 'Supervisi Kegiatan Pembakuan Nama Rupabumi', 1241, 12415);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1113, '1241.01.FBA.003.051', 'Penguatan Kelembagaan Dewan Kawasan dalam Pengelolaan dan Pengembangan Kawasan Ekonomi Khusus', 1238, 12381);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1114, '1241.01.FBA.003.052', 'Supervisi Pengelolaan dan Pengembangan Kawasan Khusus Lingkup I', 1238, 12381);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1115, '1241.01.FBA.003.053', 'Dukungan Hari Nusantara', 1238, 12381);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1116, '1241.01.FBA.003.054', 'Sinkronisasi Kebijakan Pusat dan Daerah Dalam Rangka Sinergitas Penyelenggaraan Kawasan Khusus Lingkup II', 1238, 12382);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1117, '1241.01.FBA.003.055', 'Asistensi dan Supervisi Penanganan Permasalahan Kawasan Khusus Lingkup II', 1238, 12382);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1118, '1241.01.FBA.003.056', 'Peningkatan kapasitas kelembagaan pemerintah daerah dalam pengelolaan kawasan lingkup II', 1238, 12382);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1119, '1241.01.FBA.004.051', 'Fasilitasi Penanganan Masalah dan Konflik Pertanahan di Daerah', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1120, '1241.01.FBA.004.052', 'Asistensi Pengadaan Tanah Bagi Pembangunan untuk Kepentingan Umum', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1121, '1241.01.FBA.004.053', 'Monitoring dan Evaluasi Pelaksanaan Kebijakan Pemerintah di Bidang Pertanahan', 1238, 12383);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1122, '1241.01.PEC.001.051', 'Penyelesaian Pembahasan Isu Kebijakan Batas Antar Negara RI-Malaysia', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1123, '1241.01.PEC.001.052', 'Persidangan ke-45 Joint Indonesia-Malaysia (JIM)', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1124, '1241.01.PEC.001.053', 'Penyelesaian Pembahasan Permasalahan Batas Negara RI-PNG', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1125, '1241.01.PEC.001.054', 'Penyelesaian Pembahasan Permasalahan Batas Negara RI-RDTL', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1126, '1241.01.PEC.001.055', 'Survey Penyelesaian Outstanding Boundary Problems (OBP) RI-Malaysia di Sektor Timur', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1127, '1241.01.PEC.001.056', 'Survey Investigation, Refixation and Maintenance (IRM) RI-Malaysia', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1128, '1241.01.PEC.001.057', 'Monitoring dan evaluasi penyelenggaraan pemerintahan di Kawasan perbatasan', 1238, 12385);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1129, '1241.01.UBA.001.051', 'Asistensi Kesepakatan/Perjanjian Kerja Sama dalam Penyelesaian Permasalahan Pelayanan Publik di Wilayah Metropolitan Mebidangro (Kota Medan, Kota Binjai, Kabupaten Deli Serdang, dan Kabupaten Karo)', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1130, '1241.01.UBA.001.052', 'Asistensi Kesepakatan/Perjanjian Kerja Sama dalam Penyelesaian Permasalahan Pelayanan Publik di Wilayah Metropolitan Cekungan Bandung (Kota Bandung, Kota Cimahi, Kabupaten Bandung, Kabupaten Bandung B', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1131, '1241.01.UBA.001.051', 'Asistensi Kesepakatan/Perjanjian Kerja Sama dalam Penyelesaian Permasalahan Pelayanan Publik di Wilayah Metropolitan Mamminasata (Makassar, Maros, Gowa dan Takalar)', 1238, 12384);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1132, '6136.03.AAG.001.051	', 'Penyusunan Permendagri tentang pakaian Dinas BPBD', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1133, '6136.03.AAG.002.051	', 'Penyusunan Kebijakan tentang Standar Operasional Prosedur Kebakaran dan Penyelamatan di Daerah', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1134, '6136.03.AAG.003.051	', 'Penyusunan Kebijakan tentang Formasi Aparatur Pemadam Kebakaran dan Penyelamatan di Daerah', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1135, '6136.03.AAG.004.051	', 'Penyusunan permendagri tentang Logo Bendera Pataka dan Tata Upacara Satpol PP', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1136, '6136.03.AAG.005.051	', 'Penyusunan permendagri tentang sistem informasi manajemen polisi pamong praja', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1137, '6136.03.AAG.006.051	', 'Penyusunan Permendagri tentang Pakaian Dinas,Sarana dan Prasarana aparatur dan anggota Satlinmas', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1138, '6136.03.ABQ.001.051', 'Fasilitasi penyusunan Perpres Tunjangan Jabatan Fungsional Pemadam kebakaran dan jabatan fungsional analis kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1139, '6136.03.AFA.001.051', 'Penyusunan Pedoman Rencana Umum Pencegahan, Penanggulangan Kebakaran, dan Penyelamatan', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1140, '6136.03.AFA.002.051', 'Penyusunan Juknis SOP Penegakan Perda/Perkada dan Penyelenggaraan Tibumtranmas', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1141, '6136.03.AFA.003.051', 'Penyusunan Pedoman Tentang Penyelenggaraan Perlindungan Masyarakat', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1142, '6136.03.AFA.004.051', 'Penyusunan kebijakan tentang standardisasi polisi pamong praja', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1143, '6136.03.AFA.005.051', 'Penyusunan Indeks penyelenggaraan trantibumlinmas dan indeks kepuasan masyarakat', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1144, '6136.03.BEG.001.051', 'Bantuan Sarpras Bencana', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1145, '6136.03.BEG.001.052', 'Bantuan Sarpras Pemadam Kebakaran', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1146, '6136.03.BEG.002.051', 'Bantuan Sarana dan Prasarana Satpol PP Dalam Rangka Implementasi Mutu Pelayanan Dasar Sub Urusan Trantibum Sesuai Standar', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1147, '6136.03.BEG.002.052', 'Pendataan dan asistensi pemenuhan Sarana dan Prasarana Satpol PP di Daerah Sesuai Permendagri Nomor 17 Tahun 2019', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1148, '6136.03.FBA.001.051', 'Asistensi manajemen pengelolaan PPNS di daerah', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1149, '6136.03.FBA.001.052', 'Pemetaan SDM Anggota Satlinmas Sesuai Standar', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1150, '6136.03.FBA.001.053', 'Asistensi dan Supervisi Implementasi SOP dan Kode Etik Satpol PP di Daerah', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1151, '6136.03.FBA.001.054', 'Asistensi penyusunan kebutuhan, rencana peningkatan kompetensi dan pembinaan karier Satpol PP', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1152, '6136.03.FBA.002.051', 'Pemenuhan Kebutuhan PPNS melalui pelaksanaan Diklat PPNS', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1153, '6136.03.FBA.002.052', 'Pemetaan dan asistensi pemenuhan Kebutuhan PPNS di Satpol PP', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1154, '6136.03.FBA.003.051', 'Asistensi penyelenggaraan penegakan Perda dan Perkada yang memuat sanksi pidana', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1155, '6136.03.FBA.003.052', 'Pendataan dan evaluasi pelaksanaan penegakan Perda dan Perkada', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1156, '6136.03.FBA.003.053', 'Supervisi penyelenggaraan Penegakan Perda dan Perkada yang Berspektif HAM', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1157, '6136.03.FBA.003.054', 'Asistensi Pelaksanaan Aksi Hak Asasi Manusia di Daerah', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1158, '6136.03.FBA.003.055', 'Penyelenggaraan Pertemuan Dalam Rangka Koordinasi Sekretariat Bersama RANHAM 2020-2024 dan Pemerintah Provinsi serta Fasilitasi Konvensi Internasional', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1159, '6136.03.FBA.004.051', 'Penyusunan variabel ketertiban umum dan perlindungan masyarakat', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1160, '6136.03.FBA.004.052', 'Asistensi Penerapan Penggunaan Pakaian Dinas, Atribut dan Kelengkapan Satpol PP', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1161, '6136.03.FBA.004.053', 'Pemberian Penghargaan Bagi Kepala Daerah dan Satuan Polisi Pamong Praja', 1239, 12395);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1162, '6136.03.FBA.004.054', 'Pemeliharaan dan Pengembangan Sistem Informasi Pol PP', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1163, '6136.03.FBA.005.051', 'Asistensi Penyelenggaraan Perlindungan Masyarakat', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1164, '6136.03.FBA.005.052', 'Peningkatan Kapasitas Aparatur yang membidangi LINMAS dalam Penyelenggaraan Perlindungan Masyarakat di Daerah', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1165, '6136.03.FBA.005.051', 'Koordinasi Kerja Sama Internasional Bidang Perlindungan Masyarakat pada International Civil Defence Organisation', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1166, '6136.03.UBA.001.051	', 'Asistensi dan Supervisi Penerapan SPM Sub-Urusan Bencana', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1167, '6136.03.UBA.001.052', 'Sinkronisasi perencanaan program dan kegiatan SPM Sub-Urusan Bencana', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1168, '6136.03.UBA.001.053', 'Bimtek pengintegrasian dokumen penanggulangan bencana ke dalam dokumen perencanaan dan pembangunan daerah', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1169, '6136.03.UBA.001.054', 'Gladi Tangguh relawan bencana', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1170, '6136.03.UBA.002.051	', 'Asistensi dan Supervisi Penerapan SPM Sub Urusan Kebakaran di Daerah', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1171, '6136.03.UBA.002.052', 'Sosialisasi dan Fasilitasi Pembentukan Relawan Pemadam Kebakaran (REDKAR)', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1172, '6136.03.UBA.002.053', 'Peringatan HUT Pemadam Kebakaran dan Penyelamatan Ke-102', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1173, '6136.03.UBA.002.054', 'Sosialisasi layanan bidang kebakaran dan penyelamatan di Daerah', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1174, '6136.03.UBA.002.055', 'Asistensi penyusunan SOP layanan bidang kebakaran dan penyelamatan di Daerah', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1175, '6136.03.UBA.002.056', 'Bimbingan Teknis Penyusunan Dokumen Perencanaan dan Anggaran SPM Sub Urusan Kebakaran', 1240, 12404);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1176, '6136.03.UBA.003.051	', 'Asistensi dan Supervisi Penerapan SPM Sub Urusan Trantibum', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1177, '6136.03.UBA.003.052', 'Bimtek Penerapan Standar Teknis Mutu Layanan Dasar Sub Urusan Trantibum di Provinsi dan Kabupaten/Kota', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1178, '6136.03.UBA.003.053', 'Peningkatan Kapasitas SDM Pol PP Dalam Rangka Mendukung Pencapaian Mutu SPM Sub Urusan Trantibum', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1179, '6136.03.UBA.003.054', 'Peningkatan Kapasitas SDM PPNS Dalam Rangka Mendukung Pencapaian Mutu SPM Sub Urusan Trantibum', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1180, '6136.03.UBA.003.055', 'Peningkatan Kapasitas SDM Aparatur LINMAS Dalam Rangka Mendukung Pencapaian Mutu SPM Sub Urusan Trantibum', 1239, 12393);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1181, '6136.03.UBA.003.056', 'Koordinasi Nasional Pol PP Dalam Rangka Mewujudkan pencapaian SPM dan Penyelenggaraan Trantibum (HUT Satpol)', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1182, '6136.03.UBA.003.057', 'Monitoring dan evaluasi penyelenggaraan SPM', 1239, 12394);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1183, '6136.03.UBA.004.051	', 'Bimtek pengintegrasian dan pengarusutamaan pengurangan risiko bencana ke dalam dokumen perencanaan daerah', 1240, 12401);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1184, '6136.03.UBA.004.052', 'Koordinasi nasional penanggulangan bencana dalam rangka pengurangan risiko bencana', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1185, '6136.03.UBA.004.053', 'Pembangunan sistem informasi penilaian Indeks penyelenggaraan trantibumlinmas sub urusan bencana dan sub urusan kebakaran', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1186, '6136.03.UBA.004.054', 'Monitoring dan evaluasi penyelenggaraan pengurangan risiko bencana', 1240, 12402);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1187, '6136.03.UBA.005.051	', 'Monitoring dan pendampingan penyelenggaraan Pemerintahan saat Tanggap Darurat dan Pasca Bencana', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1188, '6136.03.UBA.005.052', 'Asistensi dan supervisi pelaksanaan pelayanan Pemerintahan pada saat tanggap darurat dan pasca bencana sesuai standar di daerah', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1189, '6136.03.UBA.005.053', 'Gerakan perubahan perilaku sadar penerapan tatanan baru COVID-19', 1240, 12403);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1190, '6137.01.ABL.051.051', 'Koordinasi pembentukan JFT Pamong Kewilayahan', 1241, 12412);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1191, '6137.01.ABL.052.051', 'Koordinasi pembentukan JFT Pranata Trantibumlinmas', 1239, 12391);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1192, '6137.01.FAB.001.051', 'Pengembangan dan Pengintegrasian data Jafung Pol PP melalui Sistem Informasi Manajemen (SIM) Jafung Pol PP', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1193, '6137.01.FAC.001.051', 'Asistensi Kenaikan Jenjang', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1194, '6137.01.FAC.001.052', 'Penyusunan instrumen soal-soal Uji', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1195, '6137.01.FAC.001.053', 'Pembinaan dan Pengelolaan Jabatan Fungsional Pol PP	', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1196, '6137.01.FAC.001.054', 'Bimbingan Teknis penilai Angka Kredit', 1239, 12392);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1197, '6137.01.FAC.002.051', 'Kesiapsiagaan aparatur Pemadam kebakaran tingkat nasional melalui Skill Competition', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1198, '6137.01.FAC.002.051', 'Asistensi kebutuhan pengembangan kapasitas aparatur pemadam kebakaran di Daerah', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1199, '6137.01.FAC.002.051', 'Sosialisasi peraturan pelaksanaan jabatan fungsional pemadam kebakaran dan analis kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1200, '6137.01.FAC.002.051', 'Asistensi penerapan jabatan fungsional pemadam kebakaran dan jabatan fungsional analis kebakaran', 1240, 12405);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1201, '6103.01.EAG.001.051', 'Pengelolaan Pelayanan Hukum', 1242, 12423);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1202, '6104.01.EAA.994.001', 'Gaji dan Tunjangan', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1203, '6104.01.EAA.994.002', 'Operasional dan Pemeliharaan Kantor', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1204, '6104.01.EAA.994.002', 'Operasional dan Pemeliharaan Kantor', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1205, '6104.01.EAB.001.051', 'Persiapan Dokumen Rencana Kerja dan Anggaran (RKA) Satker Eselon I Tanpa Satker Vertikal', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1206, '6104.01.EAB.001.052', 'Pelaksanaan Dokumen Rencana Kerja dan Anggaran (RKA) Satker Eselon I Tanpa Satker Vertikal', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1207, '6104.01.EAB.001.053', 'Pelaporan Dokumen Rencana Kerja dan Anggaran (RKA) Satker Eselon I Tanpa Satker Vertikal', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1208, '6104.01.EAB.002.051', 'Persiapan Dokumen LAKIN Satker Eselon I tanpa Satker Vertikal', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1209, '6104.01.EAB.002.052', 'Pelaksanaan Dokumen LAKIN Satker Eselon I tanpa Satker Vertikal', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1210, '6104.01.EAB.002.053', 'Pelaporan Dokumen LAKIN Satker Eselon I tanpa Satker Vertikal', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1211, '6104.01.EAB.003.051', 'Perencanaan Program', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1212, '6104.01.EAB.003.052', 'Perencanaan Anggaran', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1213, '6104.01.EAB.004.051', 'Pengelolaan Keuangan', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1214, '6104.01.EAB.004.051', 'Pengelolaan Perbendaharaan', 1242, 12422);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1215, '6104.01.EAC.001.051', 'Pelayanan Umum dan Perlengkapan', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1216, '6104.01.EAC.001.052', 'Perlindungan Pegawai Ditjen Bina Administrasi Kewilayahan', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1217, '6104.01.EAC.002.051', 'Sosialisasi kebijakan bidang administrasi kewilayahan', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1218, '6104.01.EAC.002.052', 'Penyusunan kegiatan strategis penyelenggaraan pembinaan wilayah', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1219, '6104.01.EAC.002.053', 'Penyelenggaraan sinergitas bidang pembinaan administrasi kewilayahan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1220, '6104.01.EAC.002.054', 'Koordinasi dan dukungan dalam rangka Penguatan Kebijakan penyelenggaraan pembinaan wilayah', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1221, '6104.01.EAD.001.051', 'Pengadaan Perangkat Pengolah Data dan Komunikasi', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1222, '6104.01.EAD.001.052', 'Pengadaan Peralatan Fasilitas Perkantoran', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1223, '6104.01.EAD.001.053', 'Pengadaan kendaraan bermotor', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1224, '6104.01.EAL.001.051', 'Pengendalian dan Evaluasi Kinerja', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1225, '6104.01.EAL.001.052', 'Monev pelaksanaan dekonsentrasi dan bantuan pemerintah bidang bina administrasi Kewilayahan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1226, '6104.01.EAL.001.053', 'Monitoring dalam rangka pemantauan dan evaluasi kebijakan lingkup Ditjen Bina Adwil', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1227, '6104.01.EAL.001.054', 'Koordinasi dan Monev RUP ', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1228, '6105.01.EAI.001.051', 'Layanan Media Informasi Publikasi Pemberitaan lingkup Ditjen Bina Administrasi Kewilayahan', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1229, '6105.01.EAI.001.052', 'Rakor dan Sinkronisasi Evaluasi Publikasi Pemberitaan Isu-Isu Strategis Bidang Administrasi Kewilayahan', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1230, '6105.01.EAJ.001.051', 'Pelaksanaan Pengelolaan Data dan Informasi', 1242, 12421);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1231, '6106.01.EAF.001.051', 'Pelaksanaan Pengelolaan Kepegawaian', 1242, 12424);
INSERT INTO `tbm_akun` (`id_akun`, `no_akun`, `akun`, `id_dir`, `id_subdir`) VALUES (1232, '6106.01.EAH.001.051', 'Pelayanan Organisasi, Tatalaksana, dan Reformasi Birokrasi', 1242, 12421);
COMMIT;

-- ----------------------------
-- Table structure for tbm_dir
-- ----------------------------
DROP TABLE IF EXISTS `tbm_dir`;
CREATE TABLE `tbm_dir` (
  `id_dir` int(11) NOT NULL,
  `nama_dir` varchar(100) NOT NULL,
  `id_eselon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_dir
-- ----------------------------
BEGIN;
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (0, 'Admin', 0);
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (1237, 'Direktorat Dekosentrasi, Tugas Pembantuan dan Kerja Sama', 8);
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (1238, 'Direktorat Kawasan, Perkotaan dan Batas Negara', 8);
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (1239, 'Direktorat Polisi Pamong Praja dan Perlindungan Masyarakat', 8);
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (1240, 'Direktorat Manajemen Penanggulangan Bencana dan Kebakaran', 8);
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (1241, 'Direktorat Toponimi dan Batas Daerah', 8);
INSERT INTO `tbm_dir` (`id_dir`, `nama_dir`, `id_eselon`) VALUES (1242, 'Sekretariat Ditjen Bina Administrasi Kewilayahan', 8);
COMMIT;

-- ----------------------------
-- Table structure for tbm_group
-- ----------------------------
DROP TABLE IF EXISTS `tbm_group`;
CREATE TABLE `tbm_group` (
  `id_group` int(11) NOT NULL,
  `nama_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_group
-- ----------------------------
BEGIN;
INSERT INTO `tbm_group` (`id_group`, `nama_group`) VALUES (1, 'Admin');
INSERT INTO `tbm_group` (`id_group`, `nama_group`) VALUES (2, 'Manajemen');
INSERT INTO `tbm_group` (`id_group`, `nama_group`) VALUES (3, 'Operator');
COMMIT;

-- ----------------------------
-- Table structure for tbm_kab
-- ----------------------------
DROP TABLE IF EXISTS `tbm_kab`;
CREATE TABLE `tbm_kab` (
  `id_kab` char(4) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_prov` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `namakab` tinytext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_kab
-- ----------------------------
BEGIN;
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1101', '11', 'KAB. ACEH SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1102', '11', 'KAB. ACEH TENGGARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1103', '11', 'KAB. ACEH TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1104', '11', 'KAB. ACEH TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1105', '11', 'KAB. ACEH BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1106', '11', 'KAB. ACEH BESAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1107', '11', 'KAB. PIDIE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1108', '11', 'KAB. ACEH UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1109', '11', 'KAB. SIMEULUE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1110', '11', 'KAB. ACEH SINGKIL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1111', '11', 'KAB. BIREUEN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1112', '11', 'KAB. ACEH BARAT DAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1113', '11', 'KAB. GAYO LUES');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1114', '11', 'KAB. ACEH JAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1115', '11', 'KAB. NAGAN RAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1116', '11', 'KAB. ACEH TAMIANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1117', '11', 'KAB. BENER MERIAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1118', '11', 'KAB. PIDIE JAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1171', '11', 'KOTA BANDA ACEH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1172', '11', 'KOTA SABANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1173', '11', 'KOTA LHOKSEUMAWE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1174', '11', 'KOTA LANGSA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1175', '11', 'KOTA SUBULUSSALAM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1201', '12', 'KAB. TAPANULI TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1202', '12', 'KAB. TAPANULI UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1203', '12', 'KAB. TAPANULI SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1204', '12', 'KAB. NIAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1205', '12', 'KAB. LANGKAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1206', '12', 'KAB. KARO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1207', '12', 'KAB. DELI SERDANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1208', '12', 'KAB. SIMALUNGUN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1209', '12', 'KAB. ASAHAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1210', '12', 'KAB. LABUHANBATU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1211', '12', 'KAB. DAIRI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1212', '12', 'KAB. TOBA SAMOSIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1213', '12', 'KAB. MANDAILING NATAL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1214', '12', 'KAB. NIAS SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1215', '12', 'KAB. PAKPAK BHARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1216', '12', 'KAB. HUMBANG HASUNDUTAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1217', '12', 'KAB. SAMOSIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1218', '12', 'KAB. SERDANG BEDAGAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1219', '12', 'KAB. BATU BARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1220', '12', 'KAB. PADANG LAWAS UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1221', '12', 'KAB. PADANG LAWAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1222', '12', 'KAB. LABUHANBATU SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1223', '12', 'KAB. LABUHANBATU UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1224', '12', 'KAB. NIAS UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1225', '12', 'KAB. NIAS BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1271', '12', 'KOTA MEDAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1272', '12', 'KOTA PEMATANG SIANTAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1273', '12', 'KOTA SIBOLGA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1274', '12', 'KOTA TANJUNG BALAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1275', '12', 'KOTA BINJAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1276', '12', 'KOTA TEBING TINGGI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1277', '12', 'KOTA PADANGSIDIMPUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1278', '12', 'KOTA GUNUNGSITOLI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1301', '13', 'KAB. PESISIR SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1302', '13', 'KAB. SOLOK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1303', '13', 'KAB. SIJUNJUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1304', '13', 'KAB. TANAH DATAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1305', '13', 'KAB. PADANG PARIAMAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1306', '13', 'KAB. AGAM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1307', '13', 'KAB. LIMA PULUH KOTA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1308', '13', 'KAB. PASAMAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1309', '13', 'KAB. KEPULAUAN MENTAWAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1310', '13', 'KAB. DHARMASRAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1311', '13', 'KAB. SOLOK SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1312', '13', 'KAB. PASAMAN BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1371', '13', 'KOTA PADANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1372', '13', 'KOTA SOLOK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1373', '13', 'KOTA SAWAHLUNTO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1374', '13', 'KOTA PADANG PANJANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1375', '13', 'KOTA BUKITTINGGI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1376', '13', 'KOTA PAYAKUMBUH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1377', '13', 'KOTA PARIAMAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1401', '14', 'KAB. KAMPAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1402', '14', 'KAB. INDRAGIRI HULU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1403', '14', 'KAB. BENGKALIS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1404', '14', 'KAB. INDRAGIRI HILIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1405', '14', 'KAB. PELALAWAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1406', '14', 'KAB. ROKAN HULU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1407', '14', 'KAB. ROKAN HILIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1408', '14', 'KAB. SIAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1409', '14', 'KAB. KUANTAN SINGINGI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1410', '14', 'KAB. KEPULAUAN MERANTI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1471', '14', 'KOTA PEKANBARU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1472', '14', 'KOTA DUMAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1501', '15', 'KAB. KERINCI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1502', '15', 'KAB. MERANGIN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1503', '15', 'KAB. SAROLANGUN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1504', '15', 'KAB. BATANGHARI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1505', '15', 'KAB. MUARO JAMBI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1506', '15', 'KAB. TANJUNG JABUNG BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1507', '15', 'KAB. TANJUNG JABUNG TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1508', '15', 'KAB. BUNGO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1509', '15', 'KAB. TEBO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1571', '15', 'KOTA JAMBI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1572', '15', 'KOTA SUNGAI PENUH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1601', '16', 'KAB. OGAN KOMERING ULU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1602', '16', 'KAB. OGAN KOMERING ILIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1603', '16', 'KAB. MUARA ENIM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1604', '16', 'KAB. LAHAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1605', '16', 'KAB. MUSI RAWAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1606', '16', 'KAB. MUSI BANYUASIN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1607', '16', 'KAB. BANYUASIN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1608', '16', 'KAB. OGAN KOMERING ULU TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1609', '16', 'KAB. OGAN KOMERING ULU SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1610', '16', 'KAB. OGAN ILIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1611', '16', 'KAB. EMPAT LAWANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1612', '16', 'KAB. PENUKAL ABAB LEMATANG ILIR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1613', '16', 'KAB. MUSI RAWAS UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1671', '16', 'KOTA PALEMBANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1672', '16', 'KOTA PAGAR ALAM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1673', '16', 'KOTA LUBUK LINGGAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1674', '16', 'KOTA PRABUMULIH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1701', '17', 'KAB. BENGKULU SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1702', '17', 'KAB. REJANG LEBONG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1703', '17', 'KAB. BENGKULU UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1704', '17', 'KAB. KAUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1705', '17', 'KAB. SELUMA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1706', '17', 'KAB. MUKO MUKO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1707', '17', 'KAB. LEBONG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1708', '17', 'KAB. KEPAHIANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1709', '17', 'KAB. BENGKULU TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1771', '17', 'KOTA BENGKULU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1801', '18', 'KAB. LAMPUNG SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1802', '18', 'KAB. LAMPUNG TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1803', '18', 'KAB. LAMPUNG UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1804', '18', 'KAB. LAMPUNG BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1805', '18', 'KAB. TULANG BAWANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1806', '18', 'KAB. TANGGAMUS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1807', '18', 'KAB. LAMPUNG TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1808', '18', 'KAB. WAY KANAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1809', '18', 'KAB. PESAWARAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1810', '18', 'KAB. PRINGSEWU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1811', '18', 'KAB. MESUJI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1812', '18', 'KAB. TULANG BAWANG BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1813', '18', 'KAB. PESISIR BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1871', '18', 'KOTA BANDAR LAMPUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1872', '18', 'KOTA METRO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1901', '19', 'KAB. BANGKA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1902', '19', 'KAB. BELITUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1903', '19', 'KAB. BANGKA SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1904', '19', 'KAB. BANGKA TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1905', '19', 'KAB. BANGKA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1906', '19', 'KAB. BELITUNG TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('1971', '19', 'KOTA PANGKAL PINANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2101', '21', 'KAB. BINTAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2102', '21', 'KAB. KARIMUN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2103', '21', 'KAB. NATUNA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2104', '21', 'KAB. LINGGA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2105', '21', 'KAB. KEPULAUAN ANAMBAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2171', '21', 'KOTA BATAM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('2172', '21', 'KOTA TANJUNG PINANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3101', '31', 'KAB. ADM. KEP. SERIBU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3171', '31', 'KOTA ADM. JAKARTA PUSAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3172', '31', 'KOTA ADM. JAKARTA UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3173', '31', 'KOTA ADM. JAKARTA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3174', '31', 'KOTA ADM. JAKARTA SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3175', '31', 'KOTA ADM. JAKARTA TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3201', '32', 'KAB. BOGOR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3202', '32', 'KAB. SUKABUMI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3203', '32', 'KAB. CIANJUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3204', '32', 'KAB. BANDUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3205', '32', 'KAB. GARUT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3206', '32', 'KAB. TASIKMALAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3207', '32', 'KAB. CIAMIS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3208', '32', 'KAB. KUNINGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3209', '32', 'KAB. CIREBON');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3210', '32', 'KAB. MAJALENGKA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3211', '32', 'KAB. SUMEDANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3212', '32', 'KAB. INDRAMAYU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3213', '32', 'KAB. SUBANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3214', '32', 'KAB. PURWAKARTA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3215', '32', 'KAB. KARAWANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3216', '32', 'KAB. BEKASI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3217', '32', 'KAB. BANDUNG BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3218', '32', 'KAB. PANGANDARAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3271', '32', 'KOTA BOGOR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3272', '32', 'KOTA SUKABUMI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3273', '32', 'KOTA BANDUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3274', '32', 'KOTA CIREBON');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3275', '32', 'KOTA BEKASI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3276', '32', 'KOTA DEPOK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3277', '32', 'KOTA CIMAHI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3278', '32', 'KOTA TASIKMALAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3279', '32', 'KOTA BANJAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3301', '33', 'KAB. CILACAP');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3302', '33', 'KAB. BANYUMAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3303', '33', 'KAB. PURBALINGGA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3304', '33', 'KAB. BANJARNEGARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3305', '33', 'KAB. KEBUMEN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3306', '33', 'KAB. PURWOREJO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3307', '33', 'KAB. WONOSOBO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3308', '33', 'KAB. MAGELANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3309', '33', 'KAB. BOYOLALI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3310', '33', 'KAB. KLATEN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3311', '33', 'KAB. SUKOHARJO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3312', '33', 'KAB. WONOGIRI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3313', '33', 'KAB. KARANGANYAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3314', '33', 'KAB. SRAGEN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3315', '33', 'KAB. GROBOGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3316', '33', 'KAB. BLORA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3317', '33', 'KAB. REMBANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3318', '33', 'KAB. PATI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3319', '33', 'KAB. KUDUS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3320', '33', 'KAB. JEPARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3321', '33', 'KAB. DEMAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3322', '33', 'KAB. SEMARANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3323', '33', 'KAB. TEMANGGUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3324', '33', 'KAB. KENDAL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3325', '33', 'KAB. BATANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3326', '33', 'KAB. PEKALONGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3327', '33', 'KAB. PEMALANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3328', '33', 'KAB. TEGAL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3329', '33', 'KAB. BREBES');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3371', '33', 'KOTA MAGELANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3372', '33', 'KOTA SURAKARTA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3373', '33', 'KOTA SALATIGA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3374', '33', 'KOTA SEMARANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3375', '33', 'KOTA PEKALONGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3376', '33', 'KOTA TEGAL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3401', '34', 'KAB. KULON PROGO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3402', '34', 'KAB. BANTUL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3403', '34', 'KAB. GUNUNG KIDUL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3404', '34', 'KAB. SLEMAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3471', '34', 'KOTA YOGYAKARTA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3501', '35', 'KAB. PACITAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3502', '35', 'KAB. PONOROGO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3503', '35', 'KAB. TRENGGALEK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3504', '35', 'KAB. TULUNGAGUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3505', '35', 'KAB. BLITAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3506', '35', 'KAB. KEDIRI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3507', '35', 'KAB. MALANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3508', '35', 'KAB. LUMAJANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3509', '35', 'KAB. JEMBER');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3510', '35', 'KAB. BANYUWANGI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3511', '35', 'KAB. BONDOWOSO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3512', '35', 'KAB. SITUBONDO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3513', '35', 'KAB. PROBOLINGGO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3514', '35', 'KAB. PASURUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3515', '35', 'KAB. SIDOARJO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3516', '35', 'KAB. MOJOKERTO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3517', '35', 'KAB. JOMBANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3518', '35', 'KAB. NGANJUK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3519', '35', 'KAB. MADIUN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3520', '35', 'KAB. MAGETAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3521', '35', 'KAB. NGAWI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3522', '35', 'KAB. BOJONEGORO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3523', '35', 'KAB. TUBAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3524', '35', 'KAB. LAMONGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3525', '35', 'KAB. GRESIK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3526', '35', 'KAB. BANGKALAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3527', '35', 'KAB. SAMPANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3528', '35', 'KAB. PAMEKASAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3529', '35', 'KAB. SUMENEP');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3571', '35', 'KOTA KEDIRI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3572', '35', 'KOTA BLITAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3573', '35', 'KOTA MALANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3574', '35', 'KOTA PROBOLINGGO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3575', '35', 'KOTA PASURUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3576', '35', 'KOTA MOJOKERTO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3577', '35', 'KOTA MADIUN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3578', '35', 'KOTA SURABAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3579', '35', 'KOTA BATU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3601', '36', 'KAB. PANDEGLANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3602', '36', 'KAB. LEBAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3603', '36', 'KAB. TANGERANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3604', '36', 'KAB. SERANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3671', '36', 'KOTA TANGERANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3672', '36', 'KOTA CILEGON');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3673', '36', 'KOTA SERANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('3674', '36', 'KOTA TANGERANG SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5101', '51', 'KAB. JEMBRANA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5102', '51', 'KAB. TABANAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5103', '51', 'KAB. BADUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5104', '51', 'KAB. GIANYAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5105', '51', 'KAB. KLUNGKUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5106', '51', 'KAB. BANGLI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5107', '51', 'KAB. KARANGASEM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5108', '51', 'KAB. BULELENG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5171', '51', 'KOTA DENPASAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5201', '52', 'KAB. LOMBOK BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5202', '52', 'KAB. LOMBOK TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5203', '52', 'KAB. LOMBOK TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5204', '52', 'KAB. SUMBAWA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5205', '52', 'KAB. DOMPU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5206', '52', 'KAB. BIMA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5207', '52', 'KAB. SUMBAWA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5208', '52', 'KAB. LOMBOK UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5271', '52', 'KOTA MATARAM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5272', '52', 'KOTA BIMA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5301', '53', 'KAB. KUPANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5302', '53', 'KAB TIMOR TENGAH SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5303', '53', 'KAB. TIMOR TENGAH UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5304', '53', 'KAB. BELU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5305', '53', 'KAB. ALOR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5306', '53', 'KAB. FLORES TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5307', '53', 'KAB. SIKKA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5308', '53', 'KAB. ENDE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5309', '53', 'KAB. NGADA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5310', '53', 'KAB. MANGGARAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5311', '53', 'KAB. SUMBA TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5312', '53', 'KAB. SUMBA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5313', '53', 'KAB. LEMBATA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5314', '53', 'KAB. ROTE NDAO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5315', '53', 'KAB. MANGGARAI BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5316', '53', 'KAB. NAGEKEO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5317', '53', 'KAB. SUMBA TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5318', '53', 'KAB. SUMBA BARAT DAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5319', '53', 'KAB. MANGGARAI TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5320', '53', 'KAB. SABU RAIJUA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5321', '53', 'KAB. MALAKA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('5371', '53', 'KOTA KUPANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6101', '61', 'KAB. SAMBAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6102', '61', 'KAB. MEMPAWAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6103', '61', 'KAB. SANGGAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6104', '61', 'KAB. KETAPANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6105', '61', 'KAB. SINTANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6106', '61', 'KAB. KAPUAS HULU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6107', '61', 'KAB. BENGKAYANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6108', '61', 'KAB. LANDAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6109', '61', 'KAB. SEKADAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6110', '61', 'KAB. MELAWI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6111', '61', 'KAB. KAYONG UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6112', '61', 'KAB. KUBU RAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6171', '61', 'KOTA PONTIANAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6172', '61', 'KOTA SINGKAWANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6201', '62', 'KAB. KOTAWARINGIN BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6202', '62', 'KAB. KOTAWARINGIN TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6203', '62', 'KAB. KAPUAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6204', '62', 'KAB. BARITO SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6205', '62', 'KAB. BARITO UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6206', '62', 'KAB. KATINGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6207', '62', 'KAB. SERUYAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6208', '62', 'KAB. SUKAMARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6209', '62', 'KAB. LAMANDAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6210', '62', 'KAB. GUNUNG MAS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6211', '62', 'KAB. PULANG PISAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6212', '62', 'KAB. MURUNG RAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6213', '62', 'KAB. BARITO TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6271', '62', 'KOTA PALANGKARAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6301', '63', 'KAB. TANAH LAUT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6302', '63', 'KAB. KOTABARU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6303', '63', 'KAB. BANJAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6304', '63', 'KAB. BARITO KUALA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6305', '63', 'KAB. TAPIN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6306', '63', 'KAB. HULU SUNGAI SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6307', '63', 'KAB. HULU SUNGAI TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6308', '63', 'KAB. HULU SUNGAI UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6309', '63', 'KAB. TABALONG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6310', '63', 'KAB. TANAH BUMBU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6311', '63', 'KAB. BALANGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6371', '63', 'KOTA BANJARMASIN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6372', '63', 'KOTA BANJARBARU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6401', '64', 'KAB. PASER');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6402', '64', 'KAB. KUTAI KARTANEGARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6403', '64', 'KAB. BERAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6407', '64', 'KAB. KUTAI BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6408', '64', 'KAB. KUTAI TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6409', '64', 'KAB. PENAJAM PASER UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6411', '64', 'KAB. MAHAKAM ULU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6471', '64', 'KOTA BALIKPAPAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6472', '64', 'KOTA SAMARINDA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6474', '64', 'KOTA BONTANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6501', '65', 'KAB. BULUNGAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6502', '65', 'KAB. MALINAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6503', '65', 'KAB. NUNUKAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6504', '65', 'KAB. TANA TIDUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('6571', '65', 'KOTA TARAKAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7101', '71', 'KAB. BOLAANG MONGONDOW');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7102', '71', 'KAB. MINAHASA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7103', '71', 'KAB. KEPULAUAN SANGIHE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7104', '71', 'KAB. KEPULAUAN TALAUD');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7105', '71', 'KAB. MINAHASA SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7106', '71', 'KAB. MINAHASA UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7107', '71', 'KAB. MINAHASA TENGGARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7108', '71', 'KAB. BOLAANG MONGONDOW UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7109', '71', 'KAB. KEP. SIAU TAGULANDANG BIARO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7110', '71', 'KAB. BOLAANG MONGONDOW TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7111', '71', 'KAB. BOLAANG MONGONDOW SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7171', '71', 'KOTA MANADO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7172', '71', 'KOTA BITUNG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7173', '71', 'KOTA TOMOHON');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7174', '71', 'KOTA KOTAMOBAGU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7201', '72', 'KAB. BANGGAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7202', '72', 'KAB. POSO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7203', '72', 'KAB. DONGGALA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7204', '72', 'KAB. TOLI TOLI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7205', '72', 'KAB. BUOL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7206', '72', 'KAB. MOROWALI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7207', '72', 'KAB. BANGGAI KEPULAUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7208', '72', 'KAB. PARIGI MOUTONG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7209', '72', 'KAB. TOJO UNA UNA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7210', '72', 'KAB. SIGI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7211', '72', 'KAB. BANGGAI LAUT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7212', '72', 'KAB. MOROWALI UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7271', '72', 'KOTA PALU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7301', '73', 'KAB. KEPULAUAN SELAYAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7302', '73', 'KAB. BULUKUMBA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7303', '73', 'KAB. BANTAENG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7304', '73', 'KAB. JENEPONTO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7305', '73', 'KAB. TAKALAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7306', '73', 'KAB. GOWA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7307', '73', 'KAB. SINJAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7308', '73', 'KAB. BONE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7309', '73', 'KAB. MAROS');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7310', '73', 'KAB. PANGKAJENE KEPULAUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7311', '73', 'KAB. BARRU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7312', '73', 'KAB. SOPPENG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7313', '73', 'KAB. WAJO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7314', '73', 'KAB. SIDENRENG RAPPANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7315', '73', 'KAB. PINRANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7316', '73', 'KAB. ENREKANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7317', '73', 'KAB. LUWU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7318', '73', 'KAB. TANA TORAJA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7322', '73', 'KAB. LUWU UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7324', '73', 'KAB. LUWU TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7326', '73', 'KAB. TORAJA UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7371', '73', 'KOTA MAKASSAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7372', '73', 'KOTA PARE PARE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7373', '73', 'KOTA PALOPO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7401', '74', 'KAB. KOLAKA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7402', '74', 'KAB. KONAWE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7403', '74', 'KAB. MUNA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7404', '74', 'KAB. BUTON');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7405', '74', 'KAB. KONAWE SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7406', '74', 'KAB. BOMBANA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7407', '74', 'KAB. WAKATOBI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7408', '74', 'KAB. KOLAKA UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7409', '74', 'KAB. KONAWE UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7410', '74', 'KAB. BUTON UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7411', '74', 'KAB. KOLAKA TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7412', '74', 'KAB. KONAWE KEPULAUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7413', '74', 'KAB. MUNA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7414', '74', 'KAB. BUTON TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7415', '74', 'KAB. BUTON SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7471', '74', 'KOTA KENDARI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7472', '74', 'KOTA BAU BAU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7501', '75', 'KAB. GORONTALO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7502', '75', 'KAB. BOALEMO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7503', '75', 'KAB. BONE BOLANGO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7504', '75', 'KAB. PAHUWATO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7505', '75', 'KAB. GORONTALO UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7571', '75', 'KOTA GORONTALO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7601', '76', 'KAB. MAMUJU UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7602', '76', 'KAB. MAMUJU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7603', '76', 'KAB. MAMASA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7604', '76', 'KAB. POLEWALI MANDAR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7605', '76', 'KAB. MAJENE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('7606', '76', 'KAB. MAMUJU TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8101', '81', 'KAB. MALUKU TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8102', '81', 'KAB. MALUKU TENGGARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8103', '81', 'KAB MALUKU TENGGARA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8104', '81', 'KAB. BURU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8105', '81', 'KAB. SERAM BAGIAN TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8106', '81', 'KAB. SERAM BAGIAN BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8107', '81', 'KAB. KEPULAUAN ARU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8108', '81', 'KAB. MALUKU BARAT DAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8109', '81', 'KAB. BURU SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8171', '81', 'KOTA AMBON');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8172', '81', 'KOTA TUAL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8201', '82', 'KAB. HALMAHERA BARAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8202', '82', 'KAB. HALMAHERA TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8203', '82', 'KAB. HALMAHERA UTARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8204', '82', 'KAB. HALMAHERA SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8205', '82', 'KAB. KEPULAUAN SULA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8206', '82', 'KAB. HALMAHERA TIMUR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8207', '82', 'KAB. PULAU MOROTAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8208', '82', 'KAB. PULAU TALIABU');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8271', '82', 'KOTA TERNATE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('8272', '82', 'KOTA TIDORE KEPULAUAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9101', '91', 'KAB. MERAUKE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9102', '91', 'KAB. JAYAWIJAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9103', '91', 'KAB. JAYAPURA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9104', '91', 'KAB. NABIRE');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9105', '91', 'KAB. KEPULAUAN YAPEN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9106', '91', 'KAB. BIAK NUMFOR');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9107', '91', 'KAB. PUNCAK JAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9108', '91', 'KAB. PANIAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9109', '91', 'KAB. MIMIKA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9110', '91', 'KAB. SARMI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9111', '91', 'KAB. KEEROM');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9112', '91', 'KAB PEGUNUNGAN BINTANG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9113', '91', 'KAB. YAHUKIMO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9114', '91', 'KAB. TOLIKARA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9115', '91', 'KAB. WAROPEN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9116', '91', 'KAB. BOVEN DIGOEL');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9117', '91', 'KAB. MAPPI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9118', '91', 'KAB. ASMAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9119', '91', 'KAB. SUPIORI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9120', '91', 'KAB. MAMBERAMO RAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9121', '91', 'KAB. MAMBERAMO TENGAH');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9122', '91', 'KAB. YALIMO');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9123', '91', 'KAB. LANNY JAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9124', '91', 'KAB. NDUGA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9125', '91', 'KAB. PUNCAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9126', '91', 'KAB. DOGIYAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9127', '91', 'KAB. INTAN JAYA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9128', '91', 'KAB. DEIYAI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9171', '91', 'KOTA JAYAPURA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9201', '92', 'KAB. SORONG');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9202', '92', 'KAB. MANOKWARI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9203', '92', 'KAB. FAK FAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9204', '92', 'KAB. SORONG SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9205', '92', 'KAB. RAJA AMPAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9206', '92', 'KAB. TELUK BINTUNI');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9207', '92', 'KAB. TELUK WONDAMA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9208', '92', 'KAB. KAIMANA');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9209', '92', 'KAB. TAMBRAUW');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9210', '92', 'KAB. MAYBRAT');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9211', '92', 'KAB. MANOKWARI SELATAN');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9212', '92', 'KAB. PEGUNUNGAN ARFAK');
INSERT INTO `tbm_kab` (`id_kab`, `id_prov`, `namakab`) VALUES ('9271', '92', 'KOTA SORONG');
COMMIT;

-- ----------------------------
-- Table structure for tbm_prov
-- ----------------------------
DROP TABLE IF EXISTS `tbm_prov`;
CREATE TABLE `tbm_prov` (
  `id_prov` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `namaprov` tinytext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_prov
-- ----------------------------
BEGIN;
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('11', 'Aceh');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('12', 'Sumatera Utara');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('13', 'Sumatera Barat');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('14', 'Riau');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('15', 'Jambi');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('16', 'Sumatera Selatan');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('17', 'Bengkulu');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('18', 'Lampung');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('19', 'Kepulauan Bangka Belitung');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('21', 'Kepulauan Riau');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('31', 'DKI Jakarta');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('32', 'Jawa Barat');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('33', 'Jawa Tengah');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('34', 'DI Yogyakarta');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('35', 'Jawa Timur');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('36', 'Banten');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('51', 'Bali');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('52', 'Nusa Tenggara Barat');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('53', 'Nusa Tenggara Timur');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('61', 'Kalimantan Barat');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('62', 'Kalimantan Tengah');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('63', 'Kalimantan Selatan');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('64', 'Kalimantan Timur');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('65', 'Kalimantan Utara');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('71', 'Sulawesi Utara');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('72', 'Sulawesi Tengah');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('73', 'Sulawesi Selatan');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('74', 'Sulawesi Tenggara');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('75', 'Gorontalo');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('76', 'Sulawesi Barat');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('81', 'Maluku');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('82', 'Maluku Utara');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('91', 'Papua Barat');
INSERT INTO `tbm_prov` (`id_prov`, `namaprov`) VALUES ('92', 'Papua');
COMMIT;

-- ----------------------------
-- Table structure for tbm_satuan
-- ----------------------------
DROP TABLE IF EXISTS `tbm_satuan`;
CREATE TABLE `tbm_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_satuan
-- ----------------------------
BEGIN;
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (1, 'Orang');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (3, 'Kabupaten');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (4, 'Provinsi');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (5, 'Tugas');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (6, 'Permendagri');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (7, 'Kebijakan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (8, 'Layanan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (9, 'Urusan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (10, 'Kab/Kota');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (11, 'Pedoman');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (12, 'Dekonsentrasi/ Tugas Pembantuan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (13, 'Daerah');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (14, 'Laporan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (15, 'Persentase');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (16, 'Segmen');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (17, 'Unsur');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (18, 'Kesepakatan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (19, 'Peraturan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (20, 'Konfilik');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (21, 'Kebijakan');
INSERT INTO `tbm_satuan` (`id_satuan`, `satuan`) VALUES (22, 'Unit');
COMMIT;

-- ----------------------------
-- Table structure for tbm_subdir
-- ----------------------------
DROP TABLE IF EXISTS `tbm_subdir`;
CREATE TABLE `tbm_subdir` (
  `id_subdir` int(11) NOT NULL,
  `nama_subdir` varchar(100) NOT NULL,
  `id_dir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbm_subdir
-- ----------------------------
BEGIN;
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (0, 'Admin Direktorat', 0);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12371, 'Fasilitasi Gubernur sebagai Wakil Pemerintah Pusat', 1237);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12372, 'Dekonsentrasi dan Tugas Pembantuan', 1237);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12373, 'Kerjasama dan Penyelesaian Perselisihan Antar Daerah', 1237);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12374, 'Faslitasi Pelayanan Umum', 1237);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12375, 'Kecamatan', 1237);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12381, 'Kawasan Khusus Lingkup I', 1238);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12382, 'Kawasan Khusus Lingkup II', 1238);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12383, 'Fasilitasi Masalah Pertanahan', 1238);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12384, 'Administrasi Kawasan Perkotaan', 1238);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12385, 'Batas Negara dan Pulau-Pulau Terluar', 1238);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12391, 'Tata Operasional dan Standarisaasi Pol PP', 1239);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12392, 'Peningkatan Kapasitas SDM Pol PP', 1239);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12393, 'Perlindungan Masyarakat', 1239);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12394, 'Penyidik Pegawai Negeri Sipil', 1239);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12395, 'Perlindungan Hak-Hak Sipil dan HAM', 1239);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12401, 'Pengurangan Resiko Bencana', 1240);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12402, 'Sarpras dan Informasi Bencana', 1240);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12403, 'Tanggap Darurat dan Pasca Bencana', 1240);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12404, 'Sarpras dan Informasi Kebakaran', 1240);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12405, 'Peningkatan Kapasitas Sumber Daya Pemadam Kebakaran', 1240);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12411, 'Batas Antar Daerah Wilayah I', 1241);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12412, 'Batas Antar Daerah Wilayah II', 1241);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12413, 'Batas Antar Daerah Wilayah III', 1241);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12414, 'Toponimi, Data dan Kodefikasi Wilayah I', 1241);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12415, 'Toponimi, Data dan Kodefikasi Wilayah II', 1241);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12421, 'Perencanaan', 1242);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12422, 'Keuangan', 1242);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12423, 'Perundang-Undangan', 1242);
INSERT INTO `tbm_subdir` (`id_subdir`, `nama_subdir`, `id_dir`) VALUES (12424, 'Umum', 1242);
COMMIT;

-- ----------------------------
-- View structure for vakun
-- ----------------------------
DROP VIEW IF EXISTS `vakun`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vakun` AS select `akun`.`id_akun` AS `id_akun`,`akun`.`no_akun` AS `no_akun`,`akun`.`akun` AS `akun`,`akun`.`id_dir` AS `id_dir`,`dir`.`nama_dir` AS `nama_dir`,`akun`.`id_subdir` AS `id_subdir`,`subdir`.`nama_subdir` AS `nama_subdir` from ((`tbm_akun` `akun` join `tbm_dir` `dir`) join `tbm_subdir` `subdir`) where ((`akun`.`id_dir` = `dir`.`id_dir`) and (`akun`.`id_subdir` = `subdir`.`id_subdir`)) order by `akun`.`no_akun`;

-- ----------------------------
-- View structure for vanggaran
-- ----------------------------
DROP VIEW IF EXISTS `vanggaran`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vanggaran` AS select `ang`.`id_ang` AS `id_ang`,`ang`.`id_pagu` AS `id_pagu`,`pagu`.`no_akun` AS `no_akun`,`pagu`.`akun` AS `akun`,`pagu`.`tahun` AS `tahun`,`pagu`.`jenis_akun` AS `jenis_akun`,`pagu`.`id_dir` AS `id_dir`,`pagu`.`nama_dir` AS `nama_dir`,`pagu`.`id_subdir` AS `id_subdir`,`pagu`.`nama_subdir` AS `nama_subdir`,`pagu`.`prov` AS `prov`,`pagu`.`kab` AS `kab`,`pagu`.`pagu` AS `pagu`,`ang`.`tang_1` AS `tang_1`,`ang`.`tang_2` AS `tang_2`,`ang`.`tang_3` AS `tang_3`,`ang`.`tang_4` AS `tang_4`,`ang`.`tang_5` AS `tang_5`,`ang`.`tang_6` AS `tang_6`,`ang`.`tang_7` AS `tang_7`,`ang`.`tang_8` AS `tang_8`,`ang`.`tang_9` AS `tang_9`,`ang`.`tang_10` AS `tang_10`,`ang`.`tang_11` AS `tang_11`,`ang`.`tang_12` AS `tang_12`,`ang`.`rang_1` AS `rang_1`,`ang`.`rang_2` AS `rang_2`,`ang`.`rang_3` AS `rang_3`,`ang`.`rang_4` AS `rang_4`,`ang`.`rang_5` AS `rang_5`,`ang`.`rang_6` AS `rang_6`,`ang`.`rang_7` AS `rang_7`,`ang`.`rang_8` AS `rang_8`,`ang`.`rang_9` AS `rang_9`,`ang`.`rang_10` AS `rang_10`,`ang`.`rang_11` AS `rang_11`,`ang`.`rang_12` AS `rang_12`,`ang`.`kendala` AS `kendala`,`ang`.`kendalalain` AS `kendalalain`,`ang`.`tindaklanjut` AS `tindaklanjut` from (`tb_anggaran` `ang` join `vpagu` `pagu`) where (`ang`.`id_pagu` = `pagu`.`id_pagu`) order by `pagu`.`no_akun`;

-- ----------------------------
-- View structure for vindikator
-- ----------------------------
DROP VIEW IF EXISTS `vindikator`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vindikator` AS select `indi`.`id_indikator` AS `id_indikator`,`indi`.`tahun` AS `tahun`,`indi`.`id_dir` AS `id_dir`,`dir`.`nama_dir` AS `nama_dir`,`indi`.`id_subdir` AS `id_subdir`,`subdir`.`nama_subdir` AS `nama_subdir`,`indi`.`indikator` AS `indikator`,`indi`.`target` AS `target`,`indi`.`satuan` AS `id_satuan`,`satuan`.`satuan` AS `satuan`,`indi`.`rkel_1` AS `rkel_1`,`indi`.`rkel_2` AS `rkel_2`,`indi`.`rkel_3` AS `rkel_3`,`indi`.`rkel_4` AS `rkel_4`,`indi`.`rkel_5` AS `rkel_5`,`indi`.`rkel_6` AS `rkel_6`,`indi`.`rkel_7` AS `rkel_7`,`indi`.`rkel_8` AS `rkel_8`,`indi`.`rkel_9` AS `rkel_9`,`indi`.`rkel_10` AS `rkel_10`,`indi`.`rkel_11` AS `rkel_11`,`indi`.`rkel_12` AS `rkel_12`,`indi`.`rprosen_1` AS `rprosen_1`,`indi`.`rprosen_2` AS `rprosen_2`,`indi`.`rprosen_3` AS `rprosen_3`,`indi`.`rprosen_4` AS `rprosen_4`,`indi`.`rprosen_5` AS `rprosen_5`,`indi`.`rprosen_6` AS `rprosen_6`,`indi`.`rprosen_7` AS `rprosen_7`,`indi`.`rprosen_8` AS `rprosen_8`,`indi`.`rprosen_9` AS `rprosen_9`,`indi`.`rprosen_10` AS `rprosen_10`,`indi`.`rprosen_11` AS `rprosen_11`,`indi`.`rprosen_12` AS `rprosen_12`,`indi`.`rnilai_1` AS `rnilai_1`,`indi`.`rnilai_2` AS `rnilai_2`,`indi`.`rnilai_3` AS `rnilai_3`,`indi`.`rnilai_4` AS `rnilai_4`,`indi`.`rnilai_5` AS `rnilai_5`,`indi`.`rnilai_6` AS `rnilai_6`,`indi`.`rnilai_7` AS `rnilai_7`,`indi`.`rnilai_8` AS `rnilai_8`,`indi`.`rnilai_9` AS `rnilai_9`,`indi`.`rnilai_10` AS `rnilai_10`,`indi`.`rnilai_11` AS `rnilai_11`,`indi`.`rnilai_12` AS `rnilai_12`,`indi`.`kendala` AS `kendala`,`indi`.`kendalalain` AS `kendalalain`,`indi`.`tindaklanjut` AS `tindaklanjut` from (((`tb_indikator` `indi` join `tbm_dir` `dir`) join `tbm_subdir` `subdir`) join `tbm_satuan` `satuan`) where ((`indi`.`id_dir` = `dir`.`id_dir`) and (`indi`.`id_subdir` = `subdir`.`id_subdir`) and (`indi`.`satuan` = `satuan`.`id_satuan`)) order by `indi`.`id_subdir`;

-- ----------------------------
-- View structure for vkab
-- ----------------------------
DROP VIEW IF EXISTS `vkab`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vkab` AS select `kab`.`id_kab` AS `id_kab`,`kab`.`namakab` AS `namakab`,`kab`.`id_prov` AS `id_prov`,`prov`.`namaprov` AS `namaprov` from (`tbm_kab` `kab` join `tbm_prov` `prov`) where (`kab`.`id_prov` = `prov`.`id_prov`) order by `kab`.`id_kab`;

-- ----------------------------
-- View structure for vkegiatan
-- ----------------------------
DROP VIEW IF EXISTS `vkegiatan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vkegiatan` AS select `keg`.`id_keg` AS `id_keg`,`keg`.`id_pagu` AS `id_pagu`,`pagu`.`no_akun` AS `no_akun`,`pagu`.`akun` AS `akun`,`pagu`.`tahun` AS `tahun`,`pagu`.`jenis_akun` AS `jenis_akun`,`pagu`.`id_dir` AS `id_dir`,`pagu`.`nama_dir` AS `nama_dir`,`pagu`.`id_subdir` AS `id_subdir`,`pagu`.`nama_subdir` AS `nama_subdir`,`pagu`.`prov` AS `prov`,`pagu`.`kab` AS `kab`,`pagu`.`pagu` AS `pagu`,`keg`.`tkeg_rapat_rdk` AS `tkeg_rapat_rdk`,`keg`.`tkeg_rapat_full` AS `tkeg_rapat_full`,`keg`.`tkeg_rapat_fgd` AS `tkeg_rapat_fgd`,`keg`.`tkeg_dinas_mon` AS `tkeg_dinas_mon`,`keg`.`tkeg_dinas_full` AS `tkeg_dinas_full`,`keg`.`rkeg_rapat_rdk` AS `rkeg_rapat_rdk`,`keg`.`rkeg_rapat_full` AS `rkeg_rapat_full`,`keg`.`rkeg_rapat_fgd` AS `rkeg_rapat_fgd`,`keg`.`rkeg_dinas_mon` AS `rkeg_dinas_mon`,`keg`.`rkeg_dinas_full` AS `rkeg_dinas_full`,`keg`.`berkas` AS `berkas` from (`tb_kegiatan` `keg` join `vpagu` `pagu`) where (`keg`.`id_pagu` = `pagu`.`id_pagu`) order by `pagu`.`no_akun`;

-- ----------------------------
-- View structure for vpagu
-- ----------------------------
DROP VIEW IF EXISTS `vpagu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vpagu` AS select `pagu`.`id_pagu` AS `id_pagu`,`pagu`.`no_akun` AS `no_akun`,`akun`.`akun` AS `akun`,`pagu`.`tahun` AS `tahun`,`pagu`.`jenis_akun` AS `jenis_akun`,`akun`.`id_dir` AS `id_dir`,`akun`.`nama_dir` AS `nama_dir`,`akun`.`id_subdir` AS `id_subdir`,`akun`.`nama_subdir` AS `nama_subdir`,`pagu`.`prov` AS `prov`,`pagu`.`kab` AS `kab`,`pagu`.`pagu` AS `pagu` from (`tb_pagu` `pagu` join `vakun` `akun`) where (`pagu`.`no_akun` = `akun`.`no_akun`) order by `pagu`.`no_akun`;

-- ----------------------------
-- View structure for vpagurev
-- ----------------------------
DROP VIEW IF EXISTS `vpagurev`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vpagurev` AS select `pagu`.`id_pagu` AS `id_pagu`,`pagu`.`no_akun` AS `no_akun`,`pagu`.`akun` AS `akun`,`pagu`.`tahun` AS `tahun`,`pagu`.`jenis_akun` AS `jenis_akun`,`pagu`.`prov` AS `prov`,`pagu`.`kab` AS `kab`,`pagu`.`pagu` AS `pagu`,`rev`.`id_pagurev` AS `id_pagurev`,`rev`.`revisike` AS `revisike`,`rev`.`pagurev` AS `pagurev` from (`vpagu` `pagu` join `tb_pagu_rev` `rev`) where (`pagu`.`id_pagu` = `rev`.`id_pagu`) order by `pagu`.`no_akun`;

-- ----------------------------
-- View structure for vpemakai
-- ----------------------------
DROP VIEW IF EXISTS `vpemakai`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vpemakai` AS select `akses`.`id_akses` AS `id_akses`,`akses`.`nama` AS `nama`,`akses`.`username` AS `username`,`akses`.`pass` AS `pass`,`akses`.`id_group` AS `id_group`,`hak`.`nama_group` AS `nama_group`,`akses`.`id_dir` AS `id_dir`,`dir`.`nama_dir` AS `nama_dir`,`akses`.`id_subdir` AS `id_subdir`,`subdir`.`nama_subdir` AS `nama_subdir` from (((`tb_akses` `akses` join `tbm_group` `hak`) join `tbm_dir` `dir`) join `tbm_subdir` `subdir`) where ((`akses`.`id_group` = `hak`.`id_group`) and (`akses`.`id_dir` = `dir`.`id_dir`) and (`akses`.`id_subdir` = `subdir`.`id_subdir`)) order by `akses`.`id_akses`;

-- ----------------------------
-- View structure for vsubdir
-- ----------------------------
DROP VIEW IF EXISTS `vsubdir`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vsubdir` AS select `subdir`.`id_subdir` AS `id_subdir`,`subdir`.`nama_subdir` AS `nama_subdir`,`subdir`.`id_dir` AS `id_dir`,`dir`.`nama_dir` AS `nama_dir` from (`tbm_subdir` `subdir` join `tbm_dir` `dir`) where (`subdir`.`id_dir` = `dir`.`id_dir`) order by `subdir`.`id_subdir`;

SET FOREIGN_KEY_CHECKS = 1;
