-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 02:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 2),
(6, 2, 3),
(7, 2, 4),
(8, 4, 1),
(9, 4, 2),
(10, 4, 3),
(11, 4, 4),
(12, 4, 5),
(13, 3, 3),
(14, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `aset_sewa`
--

CREATE TABLE `aset_sewa` (
  `id_aset` int(11) NOT NULL,
  `nm_aset` longtext DEFAULT NULL,
  `alamat_aset` longtext DEFAULT NULL,
  `kepemilikan` longtext DEFAULT NULL,
  `color` longtext DEFAULT NULL,
  `biaya_sewa` longtext DEFAULT NULL,
  `cost_petugas` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset_sewa`
--

INSERT INTO `aset_sewa` (`id_aset`, `nm_aset`, `alamat_aset`, `kepemilikan`, `color`, `biaya_sewa`, `cost_petugas`) VALUES
(1, 'BPU Sampang', 'Jl. Trunojoyo, RW V', 'BPPKAD', '#9694ff', '3000000', '800000'),
(2, 'Mess Surabaya', 'Surabaya', 'BPPKAD', '#57caeb', '300000', '0'),
(3, 'BPU Ketapang', 'Ketapang', 'BPPKAD', '#5ddab4', '650000', '0'),
(4, 'Pesanggerahan Ketapang', 'Ketapang', 'BPPKAD', '#ff7976', '150000', '0'),
(5, 'BUS Pemda', 'Kab. Sampang', 'Kab. Sampang', '#f79748', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `username` longtext NOT NULL,
  `image` longtext NOT NULL,
  `password` longtext NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `akronim` longtext DEFAULT NULL,
  `link_bi` longtext DEFAULT NULL,
  `link_stock` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `name`, `username`, `image`, `password`, `id_role`, `is_active`, `akronim`, `link_bi`, `link_stock`) VALUES
(3, 'Pengunjung', 'pengunjung', 'default.png', '$2y$10$bRt2fy881DRpkFFon9C54e01GfBoFUM86EQ.XKPMAv2jPSIuLHb5.', 3, 1, 'Pengunjung', NULL, NULL),
(4, 'ISMAIL DEVELOPER', 'ismail_dev', 'default.png', '$2y$10$RGFTiqy3lvFrEIZRvFpZfeJaL/MxuuN3lTTJP4K9Y4hxCrRIpflA6', 4, 1, 'ISMAIL DEVELOPER', NULL, NULL),
(5, 'BADAN PENDAPATAN, PENGELOLAAN KEUANGAN DAN ASET DAERAH', 'bppkad', 'default.png', '$2y$10$EdcZuIxqnlvelgNee4sINuCc0EZzoLyQznQeBDVEYoqfYjJ2inQYe', 2, 1, 'BPPKAD', 'https://drive.google.com/drive/folders/1KYZqvRInJiTl96wgW3QITrDBQIubQESG?usp=drive_link', 'https://drive.google.com/drive/folders/1ZfyuuM0DJafRR7Ws0T3FTJbeJi95QvcT?usp=drive_link'),
(6, 'ISMAIL', 'ismail_aset', 'default.png', '$2y$10$22OIRBXuVS.qzBQOJGefM.XTIfo3AXc00mFM5qbRPIniZ/xuCBjCG', 1, 1, 'ISMAIL', NULL, NULL),
(7, 'KECAMATAN SAMPANG', 'kec_sampang', 'default.png', '$2y$10$vHs5.4nhw.rITb.h24ASiOVNNmENK0LWXl2N4bIi0EC8ldWnJzSEa', 2, 1, 'KEC. SAMPANG', 'https://drive.google.com/drive/folders/13MCzLS6jH_nVpW-eXcVOVkvdPQIJqoQ8?usp=drive_link', 'https://drive.google.com/drive/folders/1Mh6EU7rAoX8zxj20EOnNIuB3UVXQJ250?usp=drive_link'),
(8, 'SEKRETARIAT DAERAH', 'setda', 'default.png', '$2y$10$V3lqvVGSPhM7LBAWsj624.cxnIZRcwXv8jYvAW/1RTk11c/pdreMu', 2, 1, 'SETDA', 'https://drive.google.com/drive/folders/1b2f1qAzTwkuJAw1u8nntqq-wgwfYONU7?usp=drive_link', 'https://drive.google.com/drive/folders/19x-mtEE3BzeeVAosbNAlQMuTOLmNh_zt?usp=drive_link'),
(9, 'SEKRETARIAT DPRD', 'setwan', 'default.png', '$2y$10$HmD/2KyP2WUQFPv3PeCQR.QWTYL1q2/5Ao/VT9MCdolO8DQcKNLem', 2, 1, 'SETWAN', 'https://drive.google.com/drive/folders/1iap_VsZMZwpNMykh48ncVPTxr2lnIt-D?usp=drive_link', 'https://drive.google.com/drive/folders/1V1VZATBAYWolm53MMWlOL5jDOayqTJof?usp=drive_link'),
(10, 'INSPEKTORAT DAERAH', 'itda', 'default.png', '$2y$10$dhnfJEs5y2y6/x/p1Efl9eI6njgqDMnqNaySa2VXTIqJPq8k5ALTW', 2, 1, 'ITDA', 'https://drive.google.com/drive/folders/13KnErmabDLJCVj3FzAentyoh4paK_GNQ?usp=drive_link', 'https://drive.google.com/drive/folders/1DCXGMVHcIgte2gwHWYGpqhv3rn_NFB4w?usp=drive_link'),
(11, 'DINAS PENDIDIKAN', 'disdik', 'default.png', '$2y$10$sVEX2NtL0wRhpMGLpiiszu9fYnC6BHJ8HGMyyZbHGK7.wqDjO6pji', 2, 1, 'DISDIK', 'https://drive.google.com/drive/folders/1Xe3-QSM3kv2tXOJgGteu668kKs1cVprV?usp=sharing', 'https://drive.google.com/drive/folders/1vwT9UYPhO354xqMqv-OB_PxZaSyMCCM3?usp=sharing'),
(12, 'DINAS PEMUDA, OLAH RAGA, KEBUDAYAAN DAN PARIWISATA', 'disporabudpar', 'default.png', '$2y$10$abHsO4q3A3frVZl0dV4THO/JZS.bsVydl.UTG53FBMRljf.5lox5u', 2, 1, 'DISPORABUDPAR', 'https://drive.google.com/drive/folders/1y9oKcIdIBLbzxKPvoJDTUhl3nFXY9hCq?usp=drive_link', 'https://drive.google.com/drive/folders/1Rdjdad0a1Ka7UR4aPec-IjvKtD4eIuop?usp=drive_link'),
(13, 'DINAS KESEHATAN DAN KB', 'dinkes', 'default.png', '$2y$10$jLxbDizhPdjRBIcdrpYSfu9ADgNk1sPt676wApCHPFD0ABpj16vS.', 2, 1, 'DINKES KB', 'https://drive.google.com/drive/folders/14S2YCBYLwkjZRf6RPKposmdn6DDRkA8Z?usp=drive_link', 'https://drive.google.com/drive/folders/1rkhh46tMi-2Xmz6Xym13i6KCvUvH2qzt'),
(14, 'DINAS SOSIAL PPPA', 'dinsos', 'default.png', '$2y$10$VKdOnKZV34OAjWlAw0ZRL.aDEWPQGit6GVpXm5nU.4N10aL/AsOzm', 2, 1, 'DINSOS PPPA', 'https://drive.google.com/drive/folders/1z5hA9J4P_t8jq1IKbrVuBZXENK3DNZe5?usp=drive_link', 'https://drive.google.com/drive/folders/1HGqpgy8y31_u5f5DNXsmpCtyq71CN-Oo?usp=drive_link'),
(15, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'dispendukcapil', 'default.png', '$2y$10$QftNserwQCi91Mh.vJpMH..lMzlhk5NyN966zUXnHtCyFGj29s1mK', 2, 1, 'DISPENDUK CAPIL', 'https://drive.google.com/drive/folders/1oENUuBZo3yi3y-1jAP1kMa4UYnpojrr5?usp=drive_link', 'https://drive.google.com/drive/folders/1aRCQee_FsdZ1w_eKfVzT2KbQNczJx8nq?usp=drive_link'),
(16, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', 'dpmd', 'default.png', '$2y$10$3K.4CMKibNF550k7jj54ouWjHlXrrcD9De4fT1ZoIQuGxJOSAXhni', 2, 1, 'DPMD', 'https://drive.google.com/drive/folders/1SSvz3kAN6DjROlM6pCCHo59AdNNCQaDD?usp=drive_link', 'https://drive.google.com/drive/folders/1BMkmaLCt7YCp1tFYDXNhPgVN-a2ZuSyu?usp=drive_link'),
(17, 'DINAS PU DAN PENATAAN RUANG', 'dpupr', 'default.png', '$2y$10$gTxhRsCN5N1MOIiby8SVieA9yDZj.JTqgcC.tsFrN1ZGc9Pugxeqy', 2, 1, 'DPUPR', 'https://drive.google.com/drive/folders/11p9KJmNXMK6dhM70XF6EEjKwvIxgskAl?usp=drive_link', 'https://drive.google.com/drive/folders/1iIAIIV2PtZrfp4hX0QWvvHqxoa4N1Bwa?usp=drive_link'),
(18, 'DINAS PERHUBUNGAN', 'dishub', 'default.png', '$2y$10$KA6Tq2auGvnkihRkEvXga.k4ptVAvvcUL6JMlwXOOlz989tp6voX.', 2, 1, 'DISHUB', 'https://drive.google.com/drive/folders/1NECfQrXucaZonhMkxkltw3r_qPk7NQo8?usp=drive_link', 'https://drive.google.com/drive/folders/1mFZ_Nh4SgKg_37phxV1fZaUsiWs4Txfz?usp=drive_link'),
(19, 'SATUAN POLISI PAMONG PRAJA DAN PERLINDUNGAN MASYARAKAT', 'satpolpp', 'default.png', '$2y$10$OFdNpoZDVbVVVSA43GsCXeTHjfl3GJa5Z563ia6KCkIdwH/TOdL8K', 2, 1, 'SATPOLPP DAN LINMAS', 'https://drive.google.com/drive/folders/1MMsgPbhyjIKvDKPWilo_wOjkIMONQgYq?usp=drive_link', 'https://drive.google.com/drive/folders/1EyC0KZoaLmzX3__-ckSxX-NPzCZ2oQCu?usp=drive_link'),
(20, 'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN DAERAH', 'disdamkar', 'default.png', '$2y$10$irIzniMelCLyf9uyOptlVe/SLgVHXHCepbTdn218ykac.jzdBiE8C', 2, 1, 'DISDAMKAR PD', 'https://drive.google.com/drive/folders/1q7CF_zWXMGAa8mc0qGxrTJOSwLBFp-eb?usp=drive_link', 'https://drive.google.com/drive/folders/1Gguy1jpQILkrGUBEXcaFufkA3QouvrDH?usp=drive_link'),
(21, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', 'dpmptsp', 'default.png', '$2y$10$rB1Kmbws92h6gZDkoFyF0eZ7IbG1.nieS73BWCT7B97mQHWDgdage', 2, 1, 'DPMPTSP', 'https://drive.google.com/drive/folders/1IvGueO5eROAqeOujmr7KA93YaQVT8os_?usp=drive_link', 'https://drive.google.com/drive/folders/1bGMYS7OTUk-pliSbBrE_oDUPexQEXS17?usp=drive_link'),
(22, 'DINAS TENAGA KERJA', 'disnaker', 'default.png', '$2y$10$mA6zp3PqEFR4XO.dCr53NOehs2Zn8vGv0WHcncP4tGf8xTDicMz5G', 2, 1, 'DISNAKER', 'https://drive.google.com/drive/folders/1JLD74P7-fxSmvtpJfrZUBvn9Z6AoHY01?usp=drive_link', 'https://drive.google.com/drive/folders/1RlPTUafLufyY02w_8wEZDy7sLy0mgpPv?usp=drive_link'),
(23, 'DINAS KOPERASI, PERINDUSTRIAN DAN PERDAGANGAN', 'diskopindag', 'default.png', '$2y$10$I422g9s6fnkPPBXXOy7OA.a6GsL45ASoMgmc2YUDO/YfPkQ9CP9IO', 2, 1, 'DISKOPINDAG', 'https://drive.google.com/drive/folders/13KcnnAyVtempW4tMFcxiLrqpc3-Bn6Uj?usp=drive_link', 'https://drive.google.com/drive/folders/1xggUHpN0UMzTO9-M4G3CKXLPgtX2IRbs?usp=drive_link'),
(24, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'diskominfo', 'default.png', '$2y$10$Ia.eG.emhCMygv7KEDPLvezVUlNjp1tHifX/sxncNO0grYGxcRCLe', 2, 1, 'DISKOMINFO', 'https://drive.google.com/drive/folders/1NCC1WM7i-Zj2uDE_7tvLNVYazVByxg1O?usp=drive_link', 'https://drive.google.com/drive/folders/1pNWaMIuawP-4dRFZjpC-fdRv1Ff883W8?usp=drive_link'),
(25, 'DINAS PERTANIAN DAN KETAHANAN PANGAN', 'dispertakp', 'default.png', '$2y$10$385q7Qo10lUxX27PUANTBe.xbsiENeVlWwnzX9j4HUe3Y4lu/gcAq', 2, 1, 'DISPERTAKP', 'https://drive.google.com/drive/folders/117oe0-20QyUG0Sim3KHs35_LnppNe4Fk?usp=drive_link', 'https://drive.google.com/drive/folders/1MyxC9VziDzKQswhJYRwwXLuCd18iB80K?usp=drive_link'),
(26, 'DINAS PERIKANAN', 'diskan', 'default.png', '$2y$10$OBDiIHFZLx9fZcU51.1rwuVE0AcPbsHe1P48pfHJ92PvvXT9B9Qp.', 2, 1, 'DISKAN', 'https://drive.google.com/drive/folders/1MY0PHjMpkmNI-npuz8J84hVeS7pLb74f?usp=drive_link', 'https://drive.google.com/drive/folders/1GVnV1mlovoL7cKBtAJcZCZhsWPrzaFIz?usp=drive_link'),
(27, 'DINAS LINGKUNGAN HIDUP, PERUMAHAN RAKYAT DAN PERMUKIMAN', 'dlhperkim', 'default.png', '$2y$10$BYPWhvuytsglcoz3xAdbyON1mjuBw1uWRwfKGgSVoRKrjw8oSPyqW', 2, 1, 'DLH PERKIM', 'https://drive.google.com/drive/folders/1w0NXF9rw0NPc5B54WbprrMT3kLe6qssy?usp=drive_link', 'https://drive.google.com/drive/folders/1Tm1Lu2_yHSzvs3VhvmxfbtAIMrnGaLyD?usp=drive_link'),
(28, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'dispusip', 'default.png', '$2y$10$GWOgJ/XPQ0.iNtrr9C9R1u94jgG5D4azDBY8H.Z7OEAnCWvG10XMK', 2, 1, 'DISPUSIP', 'https://drive.google.com/drive/folders/1QhnmmgcFc6VmB_Rwt1qnzV-8DqXUuIyO?usp=drive_link', 'https://drive.google.com/drive/folders/1CYfzLS5mYXxCAbJkXrjtCnYFqAwW7OEF?usp=drive_link'),
(29, 'BADAN PERENCANAAN PEMBANGUNAN, PENELITIAN DAN PEMBANGUNAN DAERAH', 'bappelitbangda', 'default.png', '$2y$10$Z3/THNkroSRKjETRj3Wtu.Uq5ICc1zZWaqP0K84RyUbn/2vwJLjk2', 2, 1, 'BAPPELITBANGDA', 'https://drive.google.com/drive/folders/1iDZ6ABJwrUdLrM8BB5cNq_KIEgw8JuMJ?usp=drive_link', 'https://drive.google.com/drive/folders/1LJEcmuYd6Aet7W1EGaPWMD-ZMaLjPyYW?usp=drive_link'),
(30, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA', 'bkpsdm', 'default.png', '$2y$10$jC4bs91H/Ig2R1f/My8dLe2xCey8YCUemxgHV2DnsBFTaC7MctQnK', 2, 1, 'BKPSDM', 'https://drive.google.com/drive/folders/1zlTTl6hdroC791WtvT7Z9D88R9AvqeeC?usp=drive_link', 'https://drive.google.com/drive/folders/1l1ACUPDTtWvTt41bZw1tfHTPlpMkvsOV?usp=drive_link'),
(31, 'BADAN KESATUAN BANGSA DAN POLITIK', 'bakesbangpol', 'default.png', '$2y$10$QvwSjlie6Vb1Hpyt5ko.suSNhYLJ5remQI9pufRRv17ilDS/amhZu', 2, 1, 'BAKESBANGPOL', 'https://drive.google.com/drive/folders/1bGMf2vIdOtdZaphv9_wxxOZFxmpufqdB?usp=drive_link', 'https://drive.google.com/drive/folders/1LhNRQeoBZ-Pv38xbC0JcjaftXo6e7hGW?usp=drive_link'),
(32, 'BADAN PENANGGULANGAN BENCANA DAN PENYELAMATAN DAERAH', 'bpbd', 'default.png', '$2y$10$2exq3CJfYxiVd/K3QzP6hOqBSDAxBXoOKBQBWlCdFFgtIL6.ubfWm', 2, 1, 'BPBD PD', 'https://drive.google.com/drive/folders/1fxKYEp7yLZ18-4s5RJy3tX0a0WTmN5hR?usp=drive_link', 'https://drive.google.com/drive/folders/159_uB0nSpURTr76ExFrwWnGbuPqWgVrt?usp=drive_link'),
(33, 'RSUD dr. MOHAMMAD ZYN', 'rsud_mohzyn', 'default.png', '$2y$10$XID7gVsuk0t/1kdOcofabOhe971wCixnyCp6N863MctUW4q.VGtzC', 2, 1, 'RSUD MOH. ZYN', 'https://drive.google.com/drive/folders/1m-JL6zA6gtWNNqgRsy3Ml-k7ZkIxPz8L?usp=drive_link', 'https://drive.google.com/drive/folders/1Okj-XdczBioy0n9cZJsFcqAQFVnQXuoA?usp=drive_link'),
(34, 'RSD KETAPANG', 'rs_ketapang', 'default.png', '$2y$10$3pKVUHLixdif.lNRCkUOD.vOzanhw66YRLklRMc5vf8aYouRtsV2.', 2, 1, 'RSD KETAPANG', 'https://drive.google.com/drive/folders/1QlyF6gkOnxgX-5bt6FPqchnvLFjI83aB?usp=drive_link', 'https://drive.google.com/drive/folders/1T27MDoNJ0lfzl-su38cpxFvHC6ZMB8o4?usp=drive_link'),
(35, 'KECAMATAN OMBEN', 'kec_omben', 'default.png', '$2y$10$YmxI6AsZh1cT2XXwdZNdd.WOBMx2Td8tBeVOl2m1iJ5dFdfJfv0.C', 2, 1, 'KEC. OMBEN', 'https://drive.google.com/drive/folders/1V01rRnCVIsx1cEc7ZTG2ZDS3QBCe0sco?usp=drive_link', 'https://drive.google.com/drive/folders/1U6kjB9V7Hb4CnpDTetv_OIzTPlDiLtcG?usp=drive_link'),
(36, 'KECAMATAN CAMPLONG', 'kec_camplong', 'default.png', '$2y$10$.eyYKnf32tO7Jfjh/3FNeO/zaWGMR34Ma7/YkdQBYKp8d8n6uuBXy', 2, 1, 'KEC. CAMPLONG', 'https://drive.google.com/drive/folders/1wVJqtFD7XVIbbY_RbuHqpgiWAAyqSUeH?usp=drive_link', 'https://drive.google.com/drive/folders/12BvjSdsKRtQpKEvPeUzI-6_O6vvaYH6R?usp=drive_link'),
(37, 'KECAMATAN TORJUN', 'kec_torjun', 'default.png', '$2y$10$dyEEsB5nEGA0TQ2UAXl9tuHNZjc3FIdthtQi8PkFFV3TiIFNXe/w6', 2, 1, 'KEC. TORJUN', 'https://drive.google.com/drive/folders/1eJx_lqt8PsmLV5YiYXR3e1KkZSMYxzti?usp=drive_link', 'https://drive.google.com/drive/folders/1geuhw83hVfYCuTiqGDxPmSVsl2j5TPDz?usp=drive_link'),
(38, 'KECAMATAN PANGARENGAN', 'kec_pangarengan', 'default.png', '$2y$10$ya8oyV/24UGPhWivWjvPNezfj8TY3gLwLJ/UspTaIllKXCyU6DXeC', 2, 1, 'KEC. PANGARENGAN', 'https://drive.google.com/drive/folders/1b-7ArXX3h1VR6bvtqx8gnVRSX4S-EyjS?usp=drive_link', 'https://drive.google.com/drive/folders/1z7MWEQ4llRPavgqlwvZAte0flwIzDGKm?usp=drive_link'),
(39, 'KECAMATAN JRENGIK', 'kec_jrengik', 'default.png', '$2y$10$2T1kFjSsEJu622D/mjaL6OMEf2KrFPbKsnom7SNIWFHB6f6at0SXy', 2, 1, 'KEC. JRENGIK', 'https://drive.google.com/drive/folders/14hs9dclSbA4czHzdU8ZnBPfK9ZJJ_K_N?usp=drive_link', 'https://drive.google.com/drive/folders/1hgUb4LMy1UfH-Ak0xUEw4JB6D-xL7S_7?usp=drive_link'),
(40, 'KECAMATAN SRESEH', 'kec_sreseh', 'default.png', '$2y$10$G8hGk1C7Zt/KZTUOGlxZYugrEhZjT2/XT5mkWZ98RJ.et4jjtef/a', 2, 1, 'KEC. SRESEH', 'https://drive.google.com/drive/folders/1lBkZW5cHzdzdC2FLGJKNhhOM20OQlEwS?usp=drive_link', 'https://drive.google.com/drive/folders/102R7InMc2PcKOWoAegJ-Pu-zUGZrMyFi?usp=drive_link'),
(41, 'KECAMATAN TAMBELANGAN', 'kec_tambelangan', 'default.png', '$2y$10$3asGSTffXrIeaOiXtY17d.qSuy3IZaS/SH/7eiYeGrppJjHuiGKRu', 2, 1, 'KEC. TAMBELANGAN', 'https://drive.google.com/drive/folders/1D34bwMycWlCPLFlGumKiHaFeLPckGm1V?usp=drive_link', 'https://drive.google.com/drive/folders/1dwFe3nne_y8XaEY38lRMWbQIJ5J3DqN4?usp=drive_link'),
(42, 'KECAMATAN KEDUNGDUNG', 'kec_kedungdung', 'default.png', '$2y$10$Ob8p4Q8PRP9IUpzT4ppnWe5h120e.rfrouIUdoFARBsMbAUCHC8zu', 2, 1, 'KEC. KEDUNGDUNG', 'https://drive.google.com/drive/folders/1WdniRFpmM4LZy-t6UuGB19C5ltLICLww?usp=drive_link', 'https://drive.google.com/drive/folders/15axdwBUtoc6jAja-SeOo4UFNsL897kRl?usp=drive_link'),
(43, 'KECAMATAN ROBATAL', 'kec_robatal', 'default.png', '$2y$10$Vj9GHL1BrX/xBpSIsnAd4uXx.XQmgAlOpcDMkxhm0fBeXe5sFHARy', 2, 1, 'KEC. ROBATAL', 'https://drive.google.com/drive/folders/1O6Xfi9NeeJRq8bq09H7bCCUfNzdTKpp2?usp=drive_link', 'https://drive.google.com/drive/folders/1iovLkdychZ6C-kOisq92cpzX-vVhiiMi?usp=drive_link'),
(44, 'KECAMATAN KARANG PENANG', 'kec_krpenang', 'default.png', '$2y$10$TNMtEFR2ZwjomBNp5Q70MOnl1N7fqXFM516d/s244SnYJ8lDTiI5y', 2, 1, 'KEC. KR PENANG', 'https://drive.google.com/drive/folders/1L84rsadsTcB9ytXOU62UzwU7SmEyKUab?usp=drive_link', 'https://drive.google.com/drive/folders/1J-EZq7EgINDfj_jvTuOHUMSwosYsuYxE?usp=drive_link'),
(45, 'KECAMATAN KETAPANG', 'kec_ketapang', 'default.png', '$2y$10$d6Y/dBEUbrU20J/0JODqB.vlrwkPqUzic808eAtnWzRhewVeT9gsW', 2, 1, 'KEC. KETAPANG', 'https://drive.google.com/drive/folders/1n8wvmK6kM69MkI4noagkf7K8RfIWaeyi?usp=drive_link', 'https://drive.google.com/drive/folders/1OlHPSVa5PSEHN0vwWMkJ8pGBgmQhvcUy?usp=drive_link'),
(46, 'KECAMATAN BANYUATES', 'kec_banyuates', 'default.png', '$2y$10$xOaswC32M/MXUzJvQO2zse8YPSbToVfz9CjJMQ3SqDpxtMY0PBvKO', 2, 1, 'KEC. BANYUATES', 'https://drive.google.com/drive/folders/1B3gBKFOaaIf0MPD6IcQSSVDQ_ybs5njp?usp=drive_link', 'https://drive.google.com/drive/folders/1do9ztST3TfUM9Hl6QFuXXu_1_yv3eMVy?usp=drive_link'),
(47, 'KECAMATAN SOKOBANAH', 'kec_sokobanah', 'default.png', '$2y$10$gqgOXLse0aPCIuX8fesMtu/tewGpTrlDfsUKE1VYx8yJozKDUVaPG', 2, 1, 'KEC. SOKOBANAH', 'https://drive.google.com/drive/folders/1SfU_kiEFIGg52GneVEdneB6UK3x-His-?usp=drive_link', 'https://drive.google.com/drive/folders/1e1a87d-AlVbhf1gg4l5S7FsNKR2tSQPS?usp=drive_link'),
(48, 'NUR IMAMATUL CHOIR, S.A.', 'imamatul_aset', 'default.png', '$2y$10$nPt4IIIOe/Gqx7b2frJfy.PfaOVlnsgNdoNoohnd7Ox2PoASnDmbe', 1, 1, 'NUR IMAMATUL CHOIR', NULL, NULL),
(49, 'RYAN PRESI H.L., A.Md.Pnl.', 'ryan_aset', 'default.png', '$2y$10$E8GTHpehoGXgqO7uukZwq.iVDlWw9oLXUybjGknsTi1Vm6G.Cu3Oe', 1, 1, 'RYAN PRESI', NULL, NULL),
(50, 'AMARA CAHYANINGTYAS, A.Md.M.', 'amara_aset', 'default.png', '$2y$10$41xMeBZ15w/8PYQvX2IPaepfZa69WCN/pJg52UpPBM7Dvsm/tHELS', 1, 1, 'AMARA CAHYANINGTYAS', NULL, NULL),
(51, 'JONI PURNA IRAWAN, S.E., M.M.', 'joni_aset', 'default.png', '$2y$10$cN8gfqoD9YWkUGGXveG4/.ehBYsMApatrdCKQ3KabUBR1hmXnL3zq', 1, 1, 'JONI PURNA IRAWAN', NULL, NULL),
(52, 'LINDA YUNITASARI, S.E.', 'linda_aset', 'default.png', '$2y$10$BLrOJQTiYnFhsEOahmPpkunPgbrcWd8QuNt2gZJteyJjCmszp5MoK', 1, 1, 'LINDA YUNITASARI', NULL, NULL),
(53, 'FAJAR ROMADHON, S.T., M.Si', 'fajar_aset', 'default.png', '$2y$10$7wzJ4oQdszhbIAFhV5Go1OZDoxLDNlDvd5wB7yoSJg/I.YGv.ycC.', 1, 1, 'FAJAR ROMADHON', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_acara`
--

CREATE TABLE `event_acara` (
  `id` int(11) NOT NULL,
  `nama` longtext DEFAULT NULL,
  `no_hp` longtext DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `id_aset` int(11) DEFAULT NULL,
  `keperluan` longtext DEFAULT NULL,
  `tgl_book` date DEFAULT NULL,
  `tgl_awal_acara` datetime(3) DEFAULT NULL,
  `tgl_akhir_acara` datetime(3) DEFAULT NULL,
  `no_pengenal` longtext DEFAULT NULL,
  `bukti_pengenal` longtext DEFAULT NULL,
  `kode_byr` longtext DEFAULT NULL,
  `bukti_byr` longtext DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `tgl_byr` date DEFAULT NULL,
  `total` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `has_sub_menu`
--

CREATE TABLE `has_sub_menu` (
  `id_has_sub` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `title_has_sub` longtext NOT NULL,
  `url_has_sub` longtext NOT NULL,
  `icon_has_sub` longtext NOT NULL,
  `is_active_has_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `has_sub_menu`
--

INSERT INTO `has_sub_menu` (`id_has_sub`, `id_sub_menu`, `title_has_sub`, `url_has_sub`, `icon_has_sub`, `is_active_has_sub`) VALUES
(1, 9, 'Menu', 'menu', 'fa fa-fw fa-lg fa-stack-overflow', 1),
(2, 9, 'User', 'user_manage', 'fa fa-fw fa-lg fa-users', 1),
(3, 1, 'Admin Sewa', 'admin_sewa', 'fa fa-fw fa-lg fa-bar-chart', 1),
(4, 1, 'SPM', 'verifikasi_spm', 'fa fa-fw fa-lg fa-money', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kode_barang_108`
--

CREATE TABLE `kode_barang_108` (
  `id_aset` int(11) NOT NULL,
  `kode_aset` longtext NOT NULL,
  `uraian` longtext NOT NULL,
  `type_aset` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'User Menu'),
(3, 'Layanan'),
(4, 'Kontak Kami'),
(5, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `spm_masuk`
--

CREATE TABLE `spm_masuk` (
  `id` int(11) NOT NULL,
  `reg` int(11) DEFAULT NULL,
  `tgl_aju` date NOT NULL,
  `tgl_verif` date DEFAULT NULL,
  `skpd` longtext NOT NULL,
  `no_spm` longtext NOT NULL,
  `jenis` longtext NOT NULL,
  `dokumen` longtext NOT NULL,
  `verifikator` longtext DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `catatan` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spm_masuk`
--

INSERT INTO `spm_masuk` (`id`, `reg`, `tgl_aju`, `tgl_verif`, `skpd`, `no_spm`, `jenis`, `dokumen`, `verifikator`, `id_status`, `catatan`) VALUES
(39, 3, '2023-12-22', '2023-12-23', '12', '0123/SPM-GU/434.024.0.00.01/07/2023', 'BELANJA PERSEDIAAN', '5.jpg', 'ISMAIL', 3, 'v <br> Diperiksa oleh: ISMAIL'),
(42, 4, '2023-12-27', '2023-12-27', '7', '0666/SPM-GU/434.024.0.00.01/07/2023', 'BELANJA MODAL', 'Free.png', '', 1, ''),
(43, 0, '2023-12-27', '1900-01-01', '19', '0666/SPM-GU/434.024.0.00.01/07/2023', 'BELANJA PERSEDIAAN', '_ba9e9e59-c067-4d03-9318-69412f7af5ae.jpeg', '', 2, 'cvc <br> Diperiksa oleh: ISMAIL'),
(44, 5, '2023-12-27', '2023-12-27', '5', '0123/SPM-GU/434.024.0.00.01/07/2023', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2023-11-06_at_14_13_41.jpeg', '', 1, ''),
(73, 1, '2024-04-01', '2024-04-01', '5', '35.27/03.0/000190/LS/5.02.0.00.0.00.01.0000/M/3/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-01_at_11_29_54.jpeg', 'ISMAIL', 3, ''),
(74, 2, '2024-04-01', '2024-04-01', '45', '35.27/03.0/000030/GU/7.01.0.00.0.00.12.0000/M/3/2024', 'BELANJA PERSEDIAAN', 'CamScanner_04-01-2024_12_04.pdf', 'ISMAIL', 3, ''),
(75, 3, '2024-04-01', '2024-04-01', '7', '35.27/02.0/000046/GU/7.01.0.00.0.00.03.0000/M/3/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-01_at_12_28_14.jpeg', 'ISMAIL', 3, ''),
(76, 4, '2024-04-01', '2024-04-01', '11', '35.27/03.0/000181/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-01_at_12_36_44.jpeg', 'ISMAIL', 3, ''),
(77, 5, '2024-04-02', '2024-04-02', '7', '35.27/03.0/000052/LS/7.01.0.00.0.00.03.0000/M/4/2024', 'BELANJA MODAL', 'IMG_8679.JPG', 'ISMAIL', 3, ''),
(78, 6, '2024-04-02', '2024-04-02', '7', '35.27/03.0/000053/LS/7.01.0.00.0.00.03.0000/M/4/2024', 'BELANJA MODAL', 'IMG_8680.JPG', 'ISMAIL', 3, ''),
(79, 7, '2024-04-02', '2024-04-02', '25', '35.27/03.0/000053/LS/3.27.2.09.0.00.01.0000/M/4/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-04-02_at_9_00_38_AM.jpeg', 'ISMAIL', 3, ''),
(80, 8, '2024-04-02', '2024-04-02', '11', '35.27/03.0/000179/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-02_at_9_47_04_AM.jpeg', 'ISMAIL', 3, 's <br> Diperiksa oleh: ISMAIL'),
(81, 9, '2024-04-02', '2024-04-02', '11', '35.27/03.0/000180/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-02_at_9_49_23_AM.jpeg', 'ISMAIL', 3, ''),
(82, 10, '2024-04-02', '2024-04-02', '24', '35.27/03.0/000066/LS/2.16.2.20.2.21.01.0000/M/4/2024', 'BELANJA MODAL', 'Kominfo.pdf', 'ISMAIL', 3, ''),
(83, 11, '2024-04-02', '2024-04-02', '17', '35.27/03.0/000113/LS/1.03.2.10.0.00.01.0000/M/4/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image.jpg', 'ISMAIL', 3, ''),
(84, 12, '2024-04-02', '2024-04-02', '27', '35.27.03.0/000090/LS/1.04.2.11.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-02_at_10_54_01.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(85, 13, '2024-04-22', '2024-04-22', '8', '35.27/03.0/000169/GU/4.01.0.00.0.00.01.0000/M/4/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_10_00_01.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(86, 14, '2024-04-22', '2024-04-22', '32', '35.27/03.0/000037/GU/1.05.0.00.0.00.02.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'spm-bpbd.pdf', 'ISMAIL', 3, ''),
(87, 16, '2024-04-22', '2024-04-22', '8', '35.27/03.0/000171/LS/4.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_14_57_02.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(88, 17, '2024-04-22', '2024-04-22', '8', '35.27/03.0/000175/LS/4.01.0.00.0.00.01.0000/M/4/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_14_57_28.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(89, 15, '2024-04-22', '2024-04-22', '8', '35.27/03.0/000179/LS/4.01.0.00.0.00.01.0000/M/4/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_14_57_10.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(90, 18, '2024-04-22', '2024-04-22', '8', '35.27/03.0/000178/LS/4.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_15_33_37.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(91, 19, '2024-04-22', '2024-04-22', '8', '35.27/03.0/000176/LS/4.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_15_34_57.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(92, 20, '2024-04-22', '2024-04-22', '25', '35.27/03.0/000061/LS/3.27.09.0.00.01.0000/M/4/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_15_35_52.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(93, 21, '2024-04-22', '2024-04-22', '35', '35.27/03.0/000062/GU/7.01.0.00.0.00.05.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-22_at_16_09_10.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(94, 22, '2024-04-23', '2024-04-23', '28', '35.27/03.0/000084/GU/2.23.2.24.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_08_32_55.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(95, 23, '2024-04-23', '2024-04-23', '5', '35.27/03.0/000314/LS/5.02.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_09_14_44.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(96, 24, '2024-04-23', '2024-04-23', '14', '35.27/03.0/000108/LS/1.06.2.08.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_09_35_27.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(97, 25, '2024-04-23', '2024-04-23', '14', '35.27/03.0/000107/LS/1.06.2.08.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_09_38_04.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(98, 26, '2024-04-23', '2024-04-23', '14', '35.27/03.0/000110/LS/1.06.2.08.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_09_39_33.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(99, 27, '2024-04-23', '2024-04-23', '8', '35.27/03.0/000183/GU/4.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_10_31_33.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(100, 28, '2024-04-23', '2024-04-23', '11', '35.27/03.0/000209/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_10_44_20.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(101, 29, '2024-04-23', '2024-04-23', '11', '35.27/03.0/000210/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_10_47_07.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(102, 30, '2024-04-23', '2024-04-23', '11', '35.27/03.0/000212/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_10_47_42.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(103, 31, '2024-04-23', '2024-04-23', '11', '35.27/03.0/000211/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-04-23_at_10_48_49.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(104, 32, '2024-04-23', '2024-04-23', '11', '35.27/03.0/000213/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', '213.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(105, 33, '2024-04-23', '2024-04-23', '11', '35.27/03.0/000214/LS/1.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', '214.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(106, 34, '2024-04-24', '2024-04-24', '8', '35.27/03.0/000174/GU/4.01.0.00.0.00.01.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'image1.jpg', 'ISMAIL', 3, ''),
(107, 35, '2024-04-24', '2024-04-24', '7', '35.27/03.0/000069/GU/7.01.0.00.0.00.03.0000/M/4/2024', 'BELANJA PERSEDIAAN', 'Gambar_WhatsApp_2024-04-24_pukul_08_42_51_3df107b9.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(108, 36, '2024-06-20', '2024-06-20', '5', '35.27/02.0/000660/GU/5.02.0.00.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'ilovepdf_merged.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(109, 37, '2024-06-20', '2024-06-20', '25', '35.27.03.0/000105/LS/3.27.2.09.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-20_at_08_53_45.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(110, 38, '2024-06-20', '2024-06-20', '25', '35.27.03.0/000104/LS/3.27.2.09.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-20_at_08_53_34.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(111, 39, '2024-06-20', '2024-06-20', '27', '35.27/03.0/000174/LS/1.04.2.11.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image2.jpg', 'ISMAIL', 3, ''),
(112, 40, '2024-06-20', '2024-06-20', '27', '35.27/03.0/000173/LS/1.04.2.11.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image3.jpg', 'ISMAIL', 3, ''),
(113, 41, '2024-06-20', '2024-06-20', '12', '35.27/03.0/000105/GU/2.19.2.22.3.26.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'CamScanner_06-20-2024_09_20.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(114, 42, '2024-06-20', '2024-06-20', '39', '35.27/02.0/000064/GU/7.01.0.00.0.00.07/0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-20_at_09_54_48.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(117, 44, '2024-06-20', '2024-06-20', '38', '35.27/03.0/000055/GU/7.01.0.00.0.00.13.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'SPP_GU_VII.pdf', 'ISMAIL', 3, ''),
(118, 45, '2024-06-20', '2024-06-20', '18', '35.27/03.0/000206/LS/2.15.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'SPM_DISHUB.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(119, 46, '2024-06-20', '2024-06-20', '8', '35.27/03.0/000340/LS/4.01.0.00.0.00.01.0000/M/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-20_at_15_48_50.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(120, 47, '2024-06-21', '2024-06-21', '28', '35.27/03.0/000129/LS/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '129_Dispusip.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(121, 48, '2024-06-21', '2024-06-21', '28', '35.27/03.0/000128/LS/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '128_Dispusip.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(123, 49, '2024-06-21', '2024-06-21', '5', '35.27/03.0/000674/GU/5.02.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_BPPKAD_merged.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(124, 50, '2024-06-21', '2024-06-21', '17', '35.27/03.0/000224/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-21_at_09_37_39.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(125, 51, '2024-06-21', '2024-06-21', '17', '35.27/03.0/000227/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-21_at_09_37_53.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(126, 52, '2024-06-21', '2024-06-21', '17', '35.27/03.0/000225/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-21_at_09_38_03.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(127, 53, '2024-06-21', '2024-06-21', '24', '35.27/03.0/000115/GU/2.16.2.20.2.21.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-21_at_10_46_17.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(129, 54, '2024-06-21', '2024-06-21', '24', '35.27/03.0/000116/GU/2.16.2.20.2.21.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-21_at_10_46_41.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(130, 56, '2024-06-21', '2024-06-21', '14', '35.27/03.0/000168/GU/1.06.2.08.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'SPJ_9_667_131_GU.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(131, 57, '2024-06-21', '2024-06-21', '14', '35.27/03.0/000165/GU/1.06.2.08.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'SPJ_133_955_800_GU.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(132, 55, '2024-06-21', '2024-06-21', '32', '35.27/03.0/000068/GU/1.05.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-21_at_10_58_51.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(133, 58, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000336/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_GU_336.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(134, 59, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000337/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_GU_337.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(135, 60, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000338/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_GU_338.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(136, 61, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000344/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_GU_344.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(137, 62, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000345/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_GU_345.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(138, 63, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000347/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_LS_347.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(139, 64, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000348/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_LS_348.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(140, 65, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000350/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_LS_350.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(141, 66, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000351/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA MODAL', 'DINKES_LS_351.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(143, 67, '2024-06-21', '2024-06-21', '13', '35.27/02.0/000333/GU/1.02.2.14.0.00.01.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'DINKES_LS_333.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(144, 68, '2024-06-21', '2024-06-21', '7', '35.27/02.0/000119/GU/7.01.0.00.0.00.03.0000/P3/6/2024', 'BELANJA PERSEDIAAN', 'spp_gu_3_gusek_SAMPANG.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(145, 69, '2024-06-21', '2024-06-21', '26', '35.27/03.0/000074/GU/3.25.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'CamScanner_06-21-2024_14_04.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(146, 70, '2024-06-21', '2024-06-21', '7', '35.27/03.0/000122/GU/7.01.0.00.0.00.03.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image4.jpg', 'ISMAIL', 3, ''),
(147, 72, '2024-06-24', '2024-06-24', '28', '35.27/03.0/000136/LS/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA MODAL', '136_Dispusip.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(148, 71, '2024-06-24', '2024-06-24', '28', '35.27/03.0/000135/LS/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA MODAL', '135_Dispusip.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(149, 73, '2024-06-24', '2024-06-24', '8', '35.27/03.0/000341/LS/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_10_20_48.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(150, 74, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000238/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_11_38_54.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(151, 75, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000237/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_11_38_44.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(152, 76, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000236/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_11_38_35.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(153, 79, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000231/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '01.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(154, 77, '2024-06-24', '2024-06-24', '11', '35.27/03.0/000423/LS/1.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA MODAL', 'image5.jpg', 'ISMAIL', 3, ''),
(155, 83, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000235/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '02.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(156, 78, '2024-06-24', '2024-06-24', '11', '35.27/03.0/000426/LS/1.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA MODAL', 'image6.jpg', 'ISMAIL', 3, ''),
(157, 80, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000229/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '03.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(158, 82, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000232/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '04.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(159, 81, '2024-06-24', '2024-06-24', '17', '35.27/03.0/000228/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '05.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(160, 84, '2024-06-24', '2024-06-24', '32', '35.27/03.0/000072/LS/1.05.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', '01.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(161, 85, '2024-06-24', '2024-06-24', '32', '35.27/03.0/000073/LS/1.05.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', '02.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(162, 86, '2024-06-24', '2024-06-24', '32', '35.27/03.0/000074/LS/1.05.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_13_23_27.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(163, 87, '2024-06-24', '2024-06-24', '32', '35.27/03.0/000071/LS/1.05.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'q.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(164, 89, '2024-06-24', '2024-06-24', '16', '35.27/03.0/000137/GU/2.13.0.00.0.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_16_02_02.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(165, 88, '2024-06-24', '2024-06-24', '16', '35.27/03.0/000142/LS/2.13.0.00.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-24_at_16_05_07.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(166, 90, '2024-06-25', '2024-06-25', '13', '35.27/03.0/000355/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image7.jpg', 'ISMAIL', 3, ''),
(167, 91, '2024-06-25', '2024-06-25', '13', '35.27/03.0/000356/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image8.jpg', 'ISMAIL', 3, ''),
(168, 92, '2024-06-25', '2024-06-25', '18', '35.27/03.0/000211/GU/2.15.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image9.jpg', 'ISMAIL', 3, ''),
(169, 93, '2024-06-25', '2024-06-25', '17', '35.27/03.0/000234/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image10.jpg', 'ISMAIL', 3, ''),
(170, 94, '2024-06-25', '2024-06-25', '41', '35.27/03.0/000048/GU/7.01.0.00.0.00.08.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image11.jpg', 'ISMAIL', 3, ''),
(171, 95, '2024-06-25', '2024-06-25', '17', '35.27/03.0/000240/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image12.jpg', 'ISMAIL', 3, ''),
(172, 96, '2024-06-25', '2024-06-25', '27', '35.27/03.0/000184/LS/1.04.2.11.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image13.jpg', 'ISMAIL', 3, ''),
(173, 97, '2024-06-25', '2024-06-25', '19', '35.27/03.0/000118/GU/1.05.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image14.jpg', 'ISMAIL', 3, ''),
(174, 98, '2024-06-25', '2024-06-25', '28', '35.27/03.0/000138/GU/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-25_at_14_59_47.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(175, 99, '2024-06-26', '2024-06-26', '25', '35.27/03./000107/LS/3.27.2.09.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '0_0_011_.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(176, 100, '2024-06-26', '2024-06-26', '36', '35.27/03.0/000047/GU/7.01.0.00.0.00.04.0000/M/6/2024', 'BELANJA PERSEDIAAN', '2.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(177, 101, '2024-06-26', '2024-06-26', '17', '35.27/03.0/000256/LS/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '33.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(178, 102, '2024-06-26', '2024-06-26', '17', '35.27/03.0/000249/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '32.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(179, 103, '2024-06-26', '2024-06-26', '17', '35.27/03.0/000251/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '3111111111.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(180, 104, '2024-06-26', '2024-06-26', '17', '35.27/03.0/000250/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '30.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(181, 105, '2024-06-26', '2024-06-26', '22', '35.27/03.0/000073/GU/2.07.3.32.2.10.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image15.jpg', 'ISMAIL', 3, ''),
(182, 106, '2024-06-26', '2024-06-26', '22', '35.27/03.0/000074/GU/2.07.3.32.2.10.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image16.jpg', 'ISMAIL', 3, ''),
(183, 107, '2024-06-26', '2024-06-26', '22', '35.27/03.0/000077/LS/2.07.3.32.2.10.01.0000/M/6/2024', 'BELANJA MODAL', 'image17.jpg', 'ISMAIL', 3, ''),
(184, 108, '2024-06-26', '2024-06-26', '22', '35.27/03.0/000078/LS/2.07.3.32.2.10.01.0000/M/6/2024', 'BELANJA MODAL', 'image18.jpg', 'ISMAIL', 3, ''),
(185, 111, '2024-06-26', '2024-06-26', '13', '35.27/02.0/000363/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_363.pdf', 'ISMAIL', 3, ''),
(186, 113, '2024-06-26', '2024-06-26', '13', '35.27/02.0/000362/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_362.pdf', 'ISMAIL', 3, ''),
(187, 114, '2024-06-26', '2024-06-26', '13', '35.27/02.0/000361/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_361.pdf', 'ISMAIL', 3, ''),
(188, 116, '2024-06-26', '2024-06-26', '13', '35.27/02.0/000359/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_359.pdf', 'ISMAIL', 3, ''),
(189, 112, '2024-06-26', '2024-06-26', '13', '35.27/02.0/000357/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_357.pdf', 'ISMAIL', 3, ''),
(190, 109, '2024-06-26', '2024-06-26', '31', '35.27/03.0/000079/GU/8.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '021212.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(191, 110, '2024-06-26', '2024-06-26', '40', '35.27/03.0/000073/GU/7.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image19.jpg', 'ISMAIL', 3, ''),
(192, 117, '2024-06-26', '2024-06-26', '32', '35.27/03.0/000075/LS/1.05.0.00.0.00.02.00000/M/6/2024', 'BELANJA PERSEDIAAN', '2311.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(193, 115, '2024-06-26', '2024-06-26', '32', '35.27/03.0/000076/GU/1.05.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'CamScanner_06-26-2024_11_29.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(194, 121, '2024-06-26', '2024-06-26', '17', '35.27/03.0/000252/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-06-26_at_11_35_36.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(195, 119, '2024-06-26', '2024-06-26', '8', '35.27/03.0/000354/LS/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'setda_gu_354.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(196, 118, '2024-06-26', '2024-06-26', '8', '35.27/03.0/000359/GU/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'setda_gu_359.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(198, 120, '2024-06-26', '2024-06-26', '46', '35.27/03.0/000056/GU/7.01.0.00.0.00.09.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image20.jpg', 'ISMAIL', 3, ''),
(199, 122, '2024-06-26', '2024-06-26', '23', '35.27/03.0/000121/GU/2.17.3.30.3.31.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '2_2.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(200, 134, '2024-06-26', '2024-06-27', '8', '35.27/03.0/000368/LS/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'Gambar_WhatsApp_2024-06-26_pukul_15_43_08_8961ff53.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(201, 123, '2024-06-27', '2024-06-27', '29', '35.27/03.0/000133/GU/5.01.5.05.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '021.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(202, 124, '2024-06-27', '2024-06-27', '29', '35.27/03.0/000134/LS/5.01.5.05.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '022.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(203, 125, '2024-06-27', '2024-06-27', '8', '35.27/03.0/000355/GU/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '08.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(204, 126, '2024-06-27', '2024-06-27', '13', '35.27/03.0/000374/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '374.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(205, 127, '2024-06-27', '2024-06-27', '13', '35.27/03.0/000375/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '375.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(206, 128, '2024-06-27', '2024-06-27', '13', '35.27/03.0/000376/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '376.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(208, 129, '2024-06-27', '2024-06-27', '5', '35.27/03.0/000728/LS/5.02.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '03.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(209, 130, '2024-06-27', '2024-06-27', '5', '35.27/03.0/000730/LS/5.02.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '730.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(210, 131, '2024-06-27', '2024-06-27', '9', '35.27/03.0/0001237/GU/4.02.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '09.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(211, 132, '2024-06-27', '2024-06-27', '24', '35.27./03.0/000131/LS/2.16.2.20.2.21.01.0000/M/6/2024', 'BELANJA MODAL', 'KOMINFO.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(212, 133, '2024-06-27', '2024-06-27', '11', '35.27/03.0/000422/LS/1.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA MODAL', 'image21.jpg', 'ISMAIL', 3, ''),
(213, 135, '2024-06-27', '2024-06-27', '8', '35.27/03.0/000356/LS/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '7898798.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(214, 136, '2024-06-27', '2024-06-27', '34', '35.27/03.0/000382/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA MODAL', '011.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(215, 137, '2024-06-27', '2024-06-27', '34', '35.27/03.0/000380/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA MODAL', '0111.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(216, 138, '2024-06-27', '2024-06-27', '34', '35.27/03.0/000381/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA MODAL', '0112.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(217, 139, '2024-06-27', '2024-06-27', '7', '35.27/03.0/000128/GU/7.01.0.00.0.00.03.0000/M/6/2024', 'BELANJA PERSEDIAAN', '091.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(218, 140, '2024-06-27', '2024-06-27', '17', '35.27/03.0/000245/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '245.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(220, 142, '2024-06-27', '2024-06-27', '17', '35.27/03.0/000242/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '242.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(221, 143, '2024-06-27', '2024-06-27', '17', '35.27/03.0/000244/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '2441.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(222, 144, '2024-06-27', '2024-06-27', '17', '35.27/03.0/000243/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '243.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(223, 145, '2024-06-27', '2024-06-27', '30', '35.27/03.0/000169/GU/5.03.5.04.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '1212.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(224, 146, '2024-06-27', '2024-06-27', '43', '35.27/02.0/000083/GU/7.01.0.00.0.00.10.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_GU_04.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(225, 147, '2024-06-28', '2024-06-28', '25', '35.27/03.0/000109/LS/3.27.2.09.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-28_at_08_48_45.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(226, 148, '2024-06-28', '2024-06-28', '25', '35.27/03.0/000110/LS/3.27.2.09.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-28_at_08_48_36.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(227, 149, '2024-06-28', '2024-06-28', '25', '35.27/03.0/000108/LS/3.27.2.09.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-06-28_at_08_48_28.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(228, 151, '2024-06-28', '2024-06-28', '16', '35.27/03.0/000148/LS/2.13.0.00.0.00.01.00000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '148.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(229, 152, '2024-06-28', '2024-06-28', '16', '35.27/03.0/000149/LS/2.13.0.00.0.00.01.00000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '149.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(230, 153, '2024-06-28', '2024-06-28', '16', '35.27/03.0/000150/LS/2.13.0.00.0.00.01.00000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '150.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(231, 154, '2024-06-28', '2024-06-28', '16', '35.27/03.0/000151/LS/2.13.0.00.0.00.01.00000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '151.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(233, 156, '2024-06-28', '2024-06-28', '16', '35.27/03.0/000152/LS/2.13.0.00.0.00.01.00000/M/6/2024', 'BELANJA PERSEDIAAN', '152.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(234, 157, '2024-06-28', '2024-06-28', '16', '35.27/03.0/000147/LS/2.13.0.00.0.00.01.00000/M/6/2024', 'BELANJA PERSEDIAAN', '147.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(235, 150, '2024-06-28', '2024-06-28', '31', '35.27/03.0/000081/GU/8.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '0122322.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(237, 158, '2024-06-28', '2024-06-28', '15', '35.27/03.0/000093/GU/2.12.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'DISCAPIL_GU_93_.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(238, 159, '2024-06-28', '2024-06-28', '23', '35.27/03.0/000122/LS/2.17.3.30.3.31.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '122.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(239, 160, '2024-06-28', '2024-06-28', '23', '35.27/03.0/000123/LS/2.17.3.30.3.31.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '123.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(240, 161, '2024-06-28', '2024-06-28', '13', '35.27/02.0/000389/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_389.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(241, 162, '2024-06-28', '2024-06-28', '13', '35.27/02.0/000390/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_390.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(242, 163, '2024-06-28', '2024-06-28', '13', '35.27/02.0/000392/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_392.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(243, 164, '2024-06-28', '2024-06-28', '13', '35.27/02.0/000393/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_393.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(244, 165, '2024-06-28', '2024-06-28', '13', '35.27/02.0/000394/GU/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'SPP_394.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(245, 167, '2024-06-28', '2024-06-28', '28', '35.27/03.0/000148/LS/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '148_LS.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(246, 166, '2024-06-28', '2024-06-28', '28', '35.27/03.0/000147/LS/2.23.2.24.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '147_LS.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(247, 168, '2024-06-28', '2024-06-28', '23', '35.27/03.0/000125/LS/2.17.3.30.3.31.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image22.jpg', 'ISMAIL', 3, ''),
(248, 169, '2024-06-28', '2024-06-28', '45', '35.27/03.0/000062/GU/7.01.0.00.0.00.12.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'CamScanner_28-06-2024_11_03.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(249, 170, '2024-07-01', '2024-07-01', '13', '35.27/02.0/000405/LS/1.02.2.14.0.00.01.0000/P4/6/2024', 'BELANJA PERSEDIAAN', 'BEST_GRAFIKA_44_928_New.pdf', 'ISMAIL', 3, ''),
(250, 171, '2024-07-01', '2024-07-01', '27', '35.27/03.0/000231/GU/1.04.2.11.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '231.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(251, 172, '2024-07-01', '2024-07-01', '27', '35.27/03.0/000230/GU/1.04.2.11.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '230.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(252, 173, '2024-07-01', '2024-07-01', '33', '35.27/03.0/000404/LS/1.02.2.14.0.00.01.0000/M/6/2024', 'BELANJA MODAL', '0232656_23.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(253, 174, '2024-07-01', '2024-07-01', '11', '35.27/03.0/000435/LS/1.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'scan_435.pdf', 'ISMAIL', 3, ''),
(254, 175, '2024-07-01', '2024-07-01', '8', '35.27/03.0/000333/GU/4.01.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-01_at_11_29_55.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(255, 176, '2024-07-01', '2024-07-01', '37', '35.27/03.0/000059/GU/7.01.0.00.0.00.02.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-01_at_12_50_38.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(256, 177, '2024-07-01', '2024-07-01', '17', '35.27/03.0/000266/GU/1.03.2.10.0.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '266_GU.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(257, 178, '2024-07-01', '2024-07-01', '17', '35.27/03.0/000265/GU/1.03.2.10.0.00.01.0000/M/6/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '265_GU.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(258, 179, '2024-07-02', '2024-07-02', '16', '35.27/03.0/000153/LS/2.13.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'image23.jpg', 'ISMAIL', 3, ''),
(259, 180, '2024-07-02', '2024-07-02', '10', '35.27/03.0/000142/LS/6.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image24.jpg', 'ISMAIL', 3, ''),
(260, 181, '2024-07-02', '2024-07-02', '25', '35.27/03.0/000112/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-02_at_09_49_44.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(261, 182, '2024-07-02', '2024-07-02', '14', '35.27/03.0/000182/GU/1.06.2.08.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', '141_950_000.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(262, 183, '2024-07-02', '2024-07-02', '29', '35.27/03.0/000137/LS/5.01.5.05.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-02_at_10_40_10.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(263, 184, '2024-07-02', '2024-07-02', '14', '35.27/03.0/000185/LS/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '3_984_000.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(264, 185, '2024-07-02', '2024-07-02', '15', '35.27/03.0/000094/LS/2.12.0.00.0.00.01.0000/M/6/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-02_at_11_46_51.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(265, 186, '2024-07-02', '2024-07-02', '5', '35.27/03.0/000780/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image25.jpg', 'ISMAIL', 3, ''),
(266, 187, '2024-07-02', '2024-07-02', '5', '35.27/03.0/000781/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image26.jpg', 'ISMAIL', 3, ''),
(267, 188, '2024-07-02', '2024-07-02', '17', '35.27/03.0/000267/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-02_at_14_26_57.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(268, 189, '2024-07-02', '2024-07-02', '17', '35.27/03.0/000267/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-02_at_14_27_45.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(269, 190, '2024-07-03', '2024-07-03', '5', '35.27/03.0/000782/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-03_at_08_34_29.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(270, 191, '2024-07-03', '2024-07-03', '25', '35.27/03.0/000113/GU/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image27.jpg', 'ISMAIL', 3, ''),
(271, 192, '2024-07-03', '2024-07-03', '33', '35.27/03.0/000426/LS/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA MODAL', 'WhatsApp_Image_2024-07-03_at_10_21_02.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(272, 193, '2024-07-03', '2024-07-03', '33', '35.27/03.0/000427/LS/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA MODAL', 'WhatsApp_Image_2024-07-03_at_10_21_07.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(273, 194, '2024-07-03', '2024-07-03', '8', '35.27/03.0/000383/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-03_at_10_25_58.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(274, 195, '2024-07-03', '2024-07-03', '17', '35.27/03.0/000279/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-03_at_11_06_47.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(275, 196, '2024-07-03', '2024-07-03', '17', '35.27/03.0/000269/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-03_at_12_01_47.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(276, 197, '2024-07-03', '2024-07-03', '17', '35.27/03.0/000270/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'knl.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(277, 199, '2024-07-03', '2024-07-03', '13', '35.27/02.0/000415/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'DIBA_BERKAH_59_052_000.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(278, 200, '2024-07-03', '2024-07-03', '13', '35.27/02.0/000416/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'MEDQUEST_1_299_806_400.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(279, 201, '2024-07-03', '2024-07-03', '13', '35.27/02.0/000421/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'MILLENIUM_PHARMACON_23_478_000.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(280, 198, '2024-07-03', '2024-07-03', '11', '35.27/03.0/000447/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_03-07-2024_11_54.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(281, 202, '2024-07-03', '2024-07-03', '13', '35.27/02.0/000422/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'PENTA_VALENT_14_727_240.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(283, 204, '2024-07-03', '2024-07-03', '13', '35.27/02.0/000423/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'PENTA_VALENT_69_058_000.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(284, 205, '2024-07-03', '2024-07-03', '13', '35.27/02.0/000424/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'TRI_SAPTA_200_842_000.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(285, 212, '2024-07-03', '2024-07-04', '11', '35.27/03.0/000449/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_03-07-2024_12_41_2.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(286, 213, '2024-07-03', '2024-07-04', '11', '35.27/03.0/000448/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_03-07-2024_12_41_1.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(287, 206, '2024-07-03', '2024-07-03', '8', '35.27/03.0/000393/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '1.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(288, 207, '2024-07-04', '2024-07-04', '5', '35.27/03.0/000798/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '154.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(289, 208, '2024-07-04', '2024-07-04', '10', '35.27/03.0/000149/LS/6.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image28.jpg', 'ISMAIL', 3, ''),
(290, 209, '2024-07-04', '2024-07-04', '29', '35.27/03.0/000138/LS/5.01.5.05.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '449435943_2155458724839443_5601426196810105371_n.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(291, 210, '2024-07-04', '2024-07-04', '29', '35.27/03.0/000139/LS/5.01.5.05.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '65465645.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(292, 211, '2024-07-04', '2024-07-04', '7', '35.27/03.0/000133/GU/7.01.0.00.0.00.03.0000/M/7/2024', 'BELANJA PERSEDIAAN', '023.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(293, 214, '2024-07-04', '2024-07-04', '30', '35.27/03.0/000186/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-04_at_10_05_10.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(294, 217, '2024-07-04', '2024-07-04', '21', '35.27/03.0/000153/GU/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-04-2024_10_24.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(295, 216, '2024-07-04', '2024-07-04', '21', '35.27/03.0/000154/GU/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-04_at_10_25_16.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(296, 215, '2024-07-04', '2024-07-04', '21', '35.27/03.0/000156/LS/2.18.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-04_at_10_23_37.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(297, 218, '2024-07-04', '2024-07-04', '31', '35.27/03.0/000084/LS/8.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '536513.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(298, 219, '2024-07-04', '2024-07-04', '17', '35.27/03.0/000280/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '449775844_1534846103770765_447641777697403122_n.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(299, 220, '2024-07-04', '2024-07-04', '17', '35.27/03.0/000281/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '51.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(300, 221, '2024-07-04', '2024-07-04', '17', '35.27/03.0/000291/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '449341445_864428372373414_2017238395281562277_n.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(301, 222, '2024-07-04', '2024-07-04', '8', '35.27/03.0/000399/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '3532131513_21.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(302, 224, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000278/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image29.jpg', 'ISMAIL', 3, ''),
(303, 225, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000277/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image30.jpg', 'ISMAIL', 3, ''),
(304, 226, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000286/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image31.jpg', 'ISMAIL', 3, ''),
(305, 227, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000287/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image32.jpg', 'ISMAIL', 3, ''),
(306, 228, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000290/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image33.jpg', 'ISMAIL', 3, ''),
(307, 229, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000282/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image34.jpg', 'ISMAIL', 3, ''),
(308, 230, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000285/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image35.jpg', 'ISMAIL', 3, ''),
(309, 231, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000293/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image36.jpg', 'ISMAIL', 3, ''),
(310, 232, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000284/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image37.jpg', 'ISMAIL', 3, ''),
(311, 233, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000276/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image38.jpg', 'ISMAIL', 3, ''),
(312, 234, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000289/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image39.jpg', 'ISMAIL', 3, ''),
(313, 235, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000283/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image40.jpg', 'ISMAIL', 3, ''),
(314, 236, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000292/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image41.jpg', 'ISMAIL', 3, ''),
(315, 237, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000288/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image42.jpg', 'ISMAIL', 3, ''),
(316, 238, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000274/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image43.jpg', 'ISMAIL', 3, ''),
(317, 239, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000272/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image44.jpg', 'ISMAIL', 3, ''),
(318, 240, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000294/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image45.jpg', 'ISMAIL', 3, ''),
(319, 223, '2024-07-05', '2024-07-05', '5', '35.27/03.0/000804/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image46.jpg', 'ISMAIL', 3, ''),
(320, 241, '2024-07-05', '2024-07-05', '16', '35.27/03.0/000155/LS/1.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image47.jpg', 'ISMAIL', 3, ''),
(321, 242, '2024-07-05', '2024-07-05', '16', '35.27/03.0/000156/GU/1.13.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image48.jpg', 'ISMAIL', 3, ''),
(322, 243, '2024-07-05', '2024-07-05', '17', '35.27/03.0/000295/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image49.jpg', 'ISMAIL', 3, ''),
(323, 244, '2024-07-05', '2024-07-05', '21', '35.27/03.0/000158/GU/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '02321.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(324, 245, '2024-07-05', '2024-07-05', '13', '35.27/02.0/000429/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA MODAL', 'BANGUN_JAYA_14_900.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(325, 246, '2024-07-05', '2024-07-05', '8', '35.27/03.0/000395/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '012.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(326, 247, '2024-07-05', '2024-07-05', '8', '35.27/03.0/000391/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '3454345345345343.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(327, 248, '2024-07-05', '2024-07-05', '18', '35.27/03.0/000221/GU/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '223.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(328, 249, '2024-07-05', '2024-07-05', '18', '35.27/03.0/000222/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '224.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(329, 250, '2024-07-05', '2024-07-05', '8', '-35.27/03.0/000405/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-05_at_16_13_09.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(330, 251, '2024-07-08', '2024-07-08', '38', '35.27/03.0/000060/GU/7.01.0.00.0.00.13.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image50.jpg', 'ISMAIL', 3, ''),
(331, 252, '2024-07-08', '2024-07-08', '21', '35.27/03.0/000159/LS/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '2022020222.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(332, 253, '2024-07-08', '2024-07-08', '7', '35.27/03.0/000134/GU/7.01.0.00.0.00.03.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'CamScanner_07-08-2024_12_23.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(333, 254, '2024-07-08', '2024-07-08', '35', '35.27/03.0/000088/GU/7.01.0.00.0.00.05.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image51.jpg', 'ISMAIL', 3, ''),
(334, 255, '2024-07-08', '2024-07-08', '13', '35.27/02.0/000440/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_440.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(335, 256, '2024-07-08', '2024-07-08', '13', '35.27/02.0/000438/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_438.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(336, 257, '2024-07-08', '2024-07-08', '13', '35.27/02.0/000437/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_437.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(337, 258, '2024-07-08', '2024-07-08', '13', '35.27/02.0/000441/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_441.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(338, 259, '2024-07-08', '2024-07-08', '18', '35.27/03.0/000229/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '651651651516.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(339, 261, '2024-07-08', '2024-07-08', '18', '35.27/03.0/000224/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '2241.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(340, 260, '2024-07-08', '2024-07-08', '18', '35.27/03.0/000228/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '228.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(341, 263, '2024-07-08', '2024-07-08', '18', '35.27/03.0/000226/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '226.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(342, 262, '2024-07-08', '2024-07-08', '18', '35.27/03.0/000227/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '227.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(343, 264, '2024-07-08', '2024-07-08', '18', '35.27/03.0/000225/LS/2.15.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '225.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(344, 265, '2024-07-08', '2024-07-08', '27', '35.27/03.0/000247/GU/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '231656.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(345, 266, '2024-07-09', '2024-07-09', '17', '35.27/03.0/000297/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '11.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(346, 267, '2024-07-09', '2024-07-09', '25', '35.27/03.0/000116/GU/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image52.jpg', 'ISMAIL', 3, ''),
(347, 268, '2024-07-09', '2024-07-09', '27', '35.27/03.0/000252/GU/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image53.jpg', 'ISMAIL', 3, ''),
(348, 269, '2024-07-09', '2024-07-09', '15', '35.27/03.0/000106/LS/2.12.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image54.jpg', 'ISMAIL', 3, ''),
(349, 270, '2024-07-09', '2024-07-09', '11', '35.27/03.0/000452/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image55.jpg', 'ISMAIL', 3, ''),
(350, 271, '2024-07-09', '2024-07-09', '17', '35.27/03.0/000299/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image56.jpg', 'ISMAIL', 3, ''),
(352, 272, '2024-07-09', '2024-07-09', '12', '35.27/03.0/000121/GU/2.19.2.22.3.26.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-09-2024_12_31.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(353, 273, '2024-07-09', '2024-07-09', '47', '35.27/03.0/00073/GU/7.01.0.00.0.00.11.0000/M/7/2024', 'BELANJA PERSEDIAAN', '02.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(354, 275, '2024-07-09', '2024-07-09', '17', '35.27/03.0/000305/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA MODAL', 'image57.jpg', 'ISMAIL', 3, ''),
(355, 274, '2024-07-09', '2024-07-09', '17', '35.27/03.0/000304/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA MODAL', 'image58.jpg', 'ISMAIL', 3, ''),
(356, 276, '2024-07-09', '2024-07-09', '29', '35.27/03.0/000140/LS/5.01.5.05.0.00.01.0000/M /7/2024', 'BELANJA PERSEDIAAN', '140.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(357, 278, '2024-07-09', '2024-07-09', '29', '35.27/03.0/000141/LS/5.01.5.05.0.00.01.0000/M /7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '0141.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, '');
INSERT INTO `spm_masuk` (`id`, `reg`, `tgl_aju`, `tgl_verif`, `skpd`, `no_spm`, `jenis`, `dokumen`, `verifikator`, `id_status`, `catatan`) VALUES
(358, 277, '2024-07-09', '2024-07-09', '29', '35.27/03.0/000142/LS/5.01.5.05.0.00.01.0000/M /7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '142.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(359, 279, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000459/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_459.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(360, 280, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000445/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_445.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(361, 285, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000446/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_446.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(362, 286, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000448/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_448.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(363, 287, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000452/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_452.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(364, 290, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000449/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_449.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(365, 291, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000450/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_450.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(366, 292, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000451/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_451.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(367, 289, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000453/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_453.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(368, 293, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000455/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_455.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(369, 288, '2024-07-09', '2024-07-09', '13', 'NO SPP: 35.27/02.0/000454/GU/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'SPP_454.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(370, 281, '2024-07-09', '2024-07-09', '17', '35.27/3.0/000298/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '298.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(371, 282, '2024-07-09', '2024-07-09', '17', '35.27/3.0/000300/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '300.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(372, 283, '2024-07-09', '2024-07-09', '17', '35.27/3.0/000306/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '306.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(373, 284, '2024-07-09', '2024-07-09', '17', '35.27/3.0/000307/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '307.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(374, 294, '2024-07-09', '2024-07-09', '28', '35.27/03.0/000153/LS/2.23.2.24.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'Gambar_WhatsApp_2024-07-09_pukul_14_58_51_d82d52bd.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(375, 295, '2024-07-09', '2024-07-09', '10', '35.27/03.0/000154/LS/6.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-09_at_15_22_43.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(376, 296, '2024-07-09', '2024-07-09', '25', '35.27/03.0/000119/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '119_DISPERTA.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(377, 297, '2024-07-09', '2024-07-09', '25', '35.27/03.0/000118/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '118_DISPERTA.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(378, 298, '2024-07-09', '2024-07-09', '25', '35.27/03.0/000117/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '117_DISPERTA.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(379, 299, '2024-07-09', '2024-07-09', '5', '35.27/03.0/000829/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '21.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(380, 300, '2024-07-10', '2024-07-10', '30', '35.27/03.0/000189/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image59.jpg', 'ISMAIL', 3, ''),
(381, 301, '2024-07-10', '2024-07-10', '30', '35.27/03.0/000192/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image60.jpg', 'ISMAIL', 3, ''),
(382, 302, '2024-07-10', '2024-07-10', '30', '35.27/03.0/000191/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image61.jpg', 'ISMAIL', 3, ''),
(383, 303, '2024-07-10', '2024-07-10', '30', '35.27/03.0/000190/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image62.jpg', 'ISMAIL', 3, ''),
(384, 304, '2024-07-10', '2024-07-10', '21', '35.27/03.0/000160/LS/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image63.jpg', 'ISMAIL', 3, ''),
(385, 305, '2024-07-10', '2024-07-10', '21', '35.27/03.0/000161/GU/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image64.jpg', 'ISMAIL', 3, ''),
(386, 306, '2024-07-10', '2024-07-10', '5', '35.27/03.0/000845/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image65.jpg', 'ISMAIL', 3, ''),
(387, 307, '2024-07-10', '2024-07-10', '5', '35.27/03.0/000846/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image66.jpg', 'ISMAIL', 3, ''),
(388, 309, '2024-07-10', '2024-07-10', '25', '35.27/03.0/000120/GU/3.27.2.9.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '120.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(389, 308, '2024-07-10', '2024-07-10', '25', '35.27/03.0/000121/GU/3.27.2.9.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '121.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(390, 310, '2024-07-10', '2024-07-10', '8', '35.27/03.0/000409/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '409.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(391, 311, '2024-07-10', '2024-07-10', '8', '35.27/03.0/000408/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '408.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(392, 312, '2024-07-10', '2024-07-10', '17', '35.27/03.0/000303/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-10-2024_10_14.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(394, 313, '2024-07-10', '2024-07-10', '27', ': 35.27/03.0/000255/GU/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '15.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(395, 314, '2024-07-10', '2024-07-10', '16', '35.27/03.0/000161/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '161.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(396, 315, '2024-07-10', '2024-07-10', '16', '35.27/03.0/000162/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '162.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(397, 316, '2024-07-10', '2024-07-10', '9', '35.27/03.0/000131/GU/4.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '131.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(398, 317, '2024-07-10', '2024-07-10', '5', '35.27/03.0/000838/LS/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image67.jpg', 'ISMAIL', 3, ''),
(399, 318, '2024-07-10', '2024-07-10', '17', '35.27/03.0/000311/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '311.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(400, 319, '2024-07-10', '2024-07-10', '17', '35.27/03.0/000312/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '312.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(401, 320, '2024-07-11', '2024-07-11', '24', '35.27/03.0/000132/GU/2.16.2.20.2.21.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image68.jpg', 'ISMAIL', 3, ''),
(402, 321, '2024-07-11', '2024-07-11', '21', '35.27/03.0/000162/LS/2.18.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image69.jpg', 'ISMAIL', 3, ''),
(403, 322, '2024-07-11', '2024-07-11', '20', '35.27/03.0/000074/LS/1.05.0.00.0.00.25.0000/M/7/2024', 'BELANJA MODAL', '45.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(404, 323, '2024-07-11', '2024-07-11', '29', '35.27/03.0/000143/GU/5.01.5.05.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image70.jpg', 'ISMAIL', 3, ''),
(405, 324, '2024-07-11', '2024-07-11', '5', '35.27/03.0/000851/LS/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '102131321.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(406, 325, '2024-07-11', '2024-07-11', '20', '35.27/03.0/000077/GU/1.06.0.00.0.00.25.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-11-2024_09_49.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(407, 326, '2024-07-11', '2024-07-11', '8', '35.27/03.0/000410/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '410_SETDA.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(408, 327, '2024-07-11', '2024-07-11', '5', '35.27/03.0/000852/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '449766216_962177578988723_338867219737912188_n.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(409, 328, '2024-07-11', '2024-07-11', '32', '35.27/03.0/000091/GU/1.05.0.00.0.00.02.0000/M/7/2024', 'BELANJA PERSEDIAAN', '5233020.jpg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(410, 329, '2024-07-11', '2024-07-11', '11', '35.27/03.0/000461/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'scan_461.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(411, 330, '2024-07-12', '2024-07-12', '14', '35.27/03.0/000190/GU/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '190_DINSOS.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(412, 331, '2024-07-12', '2024-07-12', '40', '35.27/03.0/000079/GU/7.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '564.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(413, 332, '2024-07-12', '2024-07-12', '30', '35.27/03.0/000193/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-12_at_09_08_25.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(414, 333, '2024-07-12', '2024-07-12', '26', '35.27/03.0/000080/GU/3.25.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-12-2024_09_25.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(416, 335, '2024-07-12', '2024-07-12', '15', '35.27/03.0/000107/LS/2.12.0.00.0.00.01.0000/M/7/2024', 'BELANJA MODAL', '2313.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(417, 336, '2024-07-12', '2024-07-12', '17', '35.27/03.0/000315/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image71.jpg', 'ISMAIL', 3, ''),
(418, 337, '2024-07-12', '2024-07-12', '17', '35.27/03.0/000310/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image72.jpg', 'ISMAIL', 3, ''),
(419, 338, '2024-07-12', '2024-07-12', '25', '35.27/03.0/000122/GU/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-12_at_09_51_45.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(420, 339, '2024-07-12', '2024-07-12', '11', '35.27/03.0/000467/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'scan_467.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(421, 340, '2024-07-12', '2024-07-12', '26', '35.27/03.0/000079/LS/3.25.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-12_at_09_27_06.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(422, 341, '2024-07-12', '2024-07-12', '46', '35.27/03.0/000058/GU/7.01.0.00.0.00.09.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'spp_gu_juli.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(423, 342, '2024-07-12', '2024-07-12', '11', '35.27/03.0/000471/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'vzs.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(424, 343, '2024-07-12', '2024-07-12', '11', '35.27/03.0/000469/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'adfa.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(425, 344, '2024-07-12', '2024-07-12', '11', '35.27/03.0/000470/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '51.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(427, 345, '2024-07-12', '2024-07-12', '16', '35.27/03.0/000167/LS/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '167.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(428, 346, '2024-07-12', '2024-07-12', '16', '35.27/03.0/000166/LS/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '166.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(429, 347, '2024-07-12', '2024-07-12', '16', '35.27/03.0/000165/LS/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '165.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(430, 348, '2024-07-12', '2024-07-12', '16', '35.27/03.0/000164/LS/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '164.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(431, 349, '2024-07-12', '2024-07-12', '16', '35.27/03.0/000163/LS/2.13.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '163.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(432, 350, '2024-07-15', '2024-07-15', '17', '35.27/03.0/000308/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image73.jpg', 'ISMAIL', 3, ''),
(433, 351, '2024-07-15', '2024-07-15', '17', '35.27/03.0/000309/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image74.jpg', 'ISMAIL', 3, ''),
(434, 352, '2024-07-15', '2024-07-15', '17', '35.27/03.0/000317/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image75.jpg', 'ISMAIL', 3, ''),
(435, 353, '2024-07-15', '2024-07-15', '7', '35.27/03.0/000140/GU/7.01.0.00.0.00.03.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-15-2024_09_56.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(436, 354, '2024-07-15', '2024-07-15', '44', '35.27/03.0/000072/gu/7.01.0.00.0.00.14.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-15_at_10_09_16.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(437, 355, '2024-07-15', '2024-07-15', '27', '35.27/03.0/000258/GU/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '258.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(438, 356, '2024-07-15', '2024-07-15', '27', '35.27/03.0/000257/LS/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '257.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(439, 357, '2024-07-15', '2024-07-15', '17', '35.27/03.0/000313/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image76.jpg', 'ISMAIL', 3, ''),
(440, 358, '2024-07-15', '2024-07-15', '17', '35.27/03.0/000314/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image77.jpg', 'ISMAIL', 3, ''),
(441, 359, '2024-07-15', '2024-07-15', '13', '35.27/02.0/000471/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA MODAL', 'CV__HUDA_ENGINEERING_CONSULTANT_31_446.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(442, 360, '2024-07-15', '2024-07-15', '11', '35.27/03.0/000464/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_000464.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(443, 361, '2024-07-15', '2024-07-15', '11', '35.27/03.0/000465/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_000465.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(444, 362, '2024-07-15', '2024-07-15', '11', '35.27/03.0/000466/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_000466.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(445, 363, '2024-07-15', '2024-07-15', '11', '35.27/03.0/000472/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_000472.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(446, 364, '2024-07-15', '2024-07-15', '11', '35.27/03.0/000473/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_000473_.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(447, 365, '2024-07-16', '2024-07-16', '5', '35.27/03.0/000859/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image78.jpg', 'ISMAIL', 3, ''),
(448, 366, '2024-07-16', '2024-07-16', '5', '35.27/03.0/000860/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image79.jpg', 'ISMAIL', 3, ''),
(449, 367, '2024-07-16', '2024-07-16', '22', '35.27/03.0/000090/GU/2.07.3.32.2.10.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image80.jpg', 'ISMAIL', 3, ''),
(450, 368, '2024-07-16', '2024-07-16', '27', '35.27/03.0/000259/LS/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image81.jpg', 'ISMAIL', 3, ''),
(451, 369, '2024-07-16', '2024-07-16', '5', '35.27/03.0/000863/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image82.jpg', 'ISMAIL', 3, ''),
(453, 370, '2024-07-16', '2024-07-16', '37', '35.27/03.0/000064/GU/7.01.0.00.0.00.02.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image83.jpg', 'ISMAIL', 3, ''),
(454, 371, '2024-07-16', '2024-07-16', '13', '35.27/03.0/000467/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000467.pdf', 'ISMAIL', 3, ''),
(455, 372, '2024-07-16', '2024-07-16', '13', '35.27/03.0/000468/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000468.pdf', 'ISMAIL', 3, ''),
(456, 373, '2024-07-16', '2024-07-16', '11', '35.27/03.0/000468/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'Scan_468.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(457, 374, '2024-07-16', '2024-07-16', '25', '35.27/03.0/000126/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '126_DISPERTA.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(458, 375, '2024-07-16', '2024-07-16', '25', '35.27/03.0/000125/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '125_DISPERTA.jpg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(459, 376, '2024-07-17', '2024-07-17', '34', '35.27/03.0/000476/LS/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA MODAL', 'Dokumen_115.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(460, 377, '2024-07-17', '2024-07-17', '21', '35.27/03.0/000167/GU/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-17_at_08_38_54.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(461, 378, '2024-07-17', '2024-07-17', '8', '35.27/03.0/000419/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '419.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(462, 379, '2024-07-17', '2024-07-17', '8', '35.27/03.0/000420/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '420.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(463, 380, '2024-07-17', '2024-07-17', '8', '35.27/03.0/000418/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '418.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(464, 381, '2024-07-17', '2024-07-17', '8', '35.27/03.0/000422/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image84.jpg', 'ISMAIL', 3, ''),
(465, 382, '2024-07-17', '2024-07-17', '24', '35.27/03.0/000138/GU/2.16.2.20.2.21.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '0211.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(466, 383, '2024-07-17', '2024-07-17', '14', '35.27/03.0/LS/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPJ_DINSOS.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(467, 384, '2024-07-17', '2024-07-17', '23', '35.27/03.0/000133/GU/2.17.3.30.3.31.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'CamScanner_07-17-2024_10_41.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(468, 385, '2024-07-17', '2024-07-17', '23', '35.27/03.0/000131/LS/2.17.3.30.3.31.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '8484848.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(469, 386, '2024-07-17', '2024-07-17', '17', '35.27/03.0/000319/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'SPM_000319.pdf', 'ISMAIL', 3, '<br> Diperiksa oleh: ISMAIL'),
(470, 387, '2024-07-17', '2024-07-17', '30', '35.27/03.0/000197/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-17_at_11_34_56.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(471, 388, '2024-07-17', '2024-07-17', '19', '35.27/03.0/000139/GU/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image85.jpg', 'ISMAIL', 3, ''),
(472, 389, '2024-07-18', '2024-07-18', '8', '35.27/03.0/000417/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image86.jpg', 'ISMAIL', 3, ''),
(473, 390, '2024-07-18', '2024-07-18', '43', '35.27/03.0/000092/LS/7.01.0.00.0.00.10.0000/M/2024', 'BELANJA MODAL', '46.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(474, 391, '2024-07-18', '2024-07-18', '28', '35.27/03.0/000154/LS/2.23.2.24.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '202186165.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(475, 392, '2024-07-18', '2024-07-18', '9', '35.27/03.0/000133/GU/4.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '54.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(476, 393, '2024-07-18', '2024-07-18', '8', '35.27/03.0/000424/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '5656.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(477, 394, '2024-07-18', '2024-07-18', '15', '35.27/03.0/000109/GU/2.12.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '02_20_.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(480, 395, '2024-07-19', '2024-07-19', '5', '35.27/03.0/000904/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image87.jpg', 'ISMAIL', 3, ''),
(481, 396, '2024-07-19', '2024-07-19', '25', '35.27/03.0/000129/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '129.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(482, 397, '2024-07-19', '2024-07-19', '25', '35.27/03.0/000130/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '130.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(483, 399, '2024-07-19', '2024-07-19', '25', '35.27/03.0/000128/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '128.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(484, 398, '2024-07-19', '2024-07-19', '25', '35.27/03.0/000127/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '127.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(485, 400, '2024-07-19', '2024-07-19', '17', '35.27/03.0/000320/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'image88.jpg', 'ISMAIL', 3, ''),
(486, 401, '2024-07-19', '2024-07-19', '10', '35.27/03.0/000162/LS/6.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image89.jpg', 'ISMAIL', 3, ''),
(487, 402, '2024-07-19', '2024-07-19', '14', '35.27/03.0/0000201/LS/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'DINSOS.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(488, 405, '2024-07-19', '2024-07-19', '13', '35.27/03.0/000495/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000495.pdf', 'ISMAIL', 3, ''),
(489, 406, '2024-07-19', '2024-07-19', '13', '35.27/03.0/000496/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000496.pdf', 'ISMAIL', 3, ''),
(490, 430, '2024-07-19', '2024-07-22', '13', '35.27/03.0/000491/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000491.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(491, 407, '2024-07-19', '2024-07-19', '13', '35.27/03.0/000492/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000492.pdf', 'ISMAIL', 3, ''),
(492, 408, '2024-07-19', '2024-07-19', '13', '35.27/03.0/000494/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000494.pdf', 'ISMAIL', 3, ''),
(493, 409, '2024-07-19', '2024-07-19', '13', '35.27/03.0/000488/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000488.pdf', 'ISMAIL', 3, ''),
(494, 403, '2024-07-19', '2024-07-19', '30', '35.27/03.0/000199/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '199.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(495, 440, '2024-07-19', '2024-07-23', '13', '35.27/03.0/000489/GU/1.02.2.14.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_000489.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(496, 404, '2024-07-19', '2024-07-19', '30', '35.27/03.0/000200/GU/5.03.5.04.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '200.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(497, 432, '2024-07-19', '2024-07-22', '13', '35.27/02.0/000423/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'PENTA_VALENT_69_058_0001.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(498, 431, '2024-07-19', '2024-07-22', '13', '35.27/02.0/000498/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'PT__KIMIA_FARMA_7_631.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(499, 433, '2024-07-19', '2024-07-22', '13', '35.27/02.0/000497/LS/1.02.2.14.0.00.01.0000/P4/7/2024', 'BELANJA PERSEDIAAN', 'PT__KIMIA_FARMA_39_519.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(500, 411, '2024-07-22', '2024-07-22', '27', '35.27/03.0/000268/LS/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image90.jpg', 'ISMAIL', 3, ''),
(501, 410, '2024-07-22', '2024-07-22', '27', '35.27/03.0/000267/LS/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image91.jpg', 'ISMAIL', 3, ''),
(502, 412, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000481/GU/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '4.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(503, 413, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000479/GU/1.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '1234124.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(504, 414, '2024-07-22', '2024-07-22', '21', '35.27/03.0/000174/GU/2.18.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'sgsdf.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(505, 416, '2024-07-22', '2024-07-22', '8', '35.27/03.0/000427/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image92.jpg', 'ISMAIL', 3, ''),
(506, 415, '2024-07-22', '2024-07-22', '8', '35.27/03.0/000426/LS/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image93.jpg', 'ISMAIL', 3, ''),
(507, 417, '2024-07-22', '2024-07-22', '12', '35.27/03.0/000133/GU/2.19.2.22.3.26.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'Untitled.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(508, 418, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000517/LS/1.01.0.00.0.00.01.0000/M/7/2024	', 'BELANJA PERSEDIAAN', 'Untitled1.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(509, 419, '2024-07-22', '2024-07-22', '8', '3527/03.0/000425/GU/4.01.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'WhatsApp_Image_2024-07-22_at_14_44_09.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(510, 424, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000505/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'perenc_pemb_paving_smps_al_hasani_dll.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(511, 425, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000509/LS/1.01.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'perenc_pemb_paving_smps_al_asyari_dll.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(512, 420, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000511/LS/1.01.0.00.0.00.01.0000/M/7/2024	', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'perenc_pemb_paving_smps_mutiara_dll.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(513, 421, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000510/LS/1.01.0.00.0.00.01.0000/M/7/2024	', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'peren_pemb_pagar_smps_miftahul_ulum_dll.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(514, 422, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000512/LS/1.01.0.00.0.00.01.0000/M/7/2024	', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'perenc_pemb_paving_smps_nah_datul_muhtadiin_dll.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(515, 423, '2024-07-22', '2024-07-22', '11', '35.27/03.0/000504/LS/1.01.0.00.0.00.01.0000/M/7/2024	', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'perenc_rehab_ruang_kelasa_smps_plus_darus_salam_dll.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(516, 429, '2024-07-22', '2024-07-22', '25', '35.27/03.0/000131/GU/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '131_GU.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(517, 426, '2024-07-22', '2024-07-22', '25', '35.27/03.0/000132/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '132_LS.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(518, 427, '2024-07-22', '2024-07-22', '25', '35.27/03.0/000133/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '133_LS.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(519, 428, '2024-07-22', '2024-07-22', '25', '35.27/03.0/000134/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '134_LS.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(520, 434, '2024-07-23', '2024-07-23', '27', '35.27/03.0/000271/LS/1.04.2.11.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image94.jpg', 'ISMAIL', 3, ''),
(521, 435, '2024-07-23', '2024-07-23', '41', '35.27/03.0/000054/GU/7.01.0.00.0.00.08.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPM_GU_KEC_TBL.pdf', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(522, 436, '2024-07-23', '2024-07-23', '25', '35.27/03.0/000136/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '136_ls.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(523, 437, '2024-07-23', '2024-07-23', '25', '35.27/03.0/000135/LS/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '135_ls.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(524, 438, '2024-07-23', '2024-07-23', '25', '35.27/03.0/000137/GU/3.27.2.09.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '137_gu.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(525, 439, '2024-07-23', '2024-07-23', '41', '35.27/03.0/000055/LS/7.01.0.00.0.00.08.0000/M/7/2024', 'BELANJA MODAL', 'WhatsApp_Image_2024-07-23_at_09_39_19.jpeg', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(526, 441, '2024-07-23', '2024-07-23', '14', '35.27/03.0/000211/LS/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPJ_LS_120_000.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(529, 442, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000145/GU/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image95.jpg', 'ISMAIL', 3, ''),
(530, 443, '2024-07-23', '2024-07-23', '14', '35.27/03.0/000209/LS/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPJ_LS_1_144_200.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(531, 444, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000149/LS/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image96.jpg', 'ISMAIL', 3, ''),
(532, 455, '2024-07-23', '2024-07-23', '14', '35.27/03.0/000210/LS/1.06.2.08.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'SPJ_LS_1_330_100.pdf', 'AMARA CAHYANINGTYAS, A.Md.M.', 3, ''),
(533, 445, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000151/LS/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image97.jpg', 'ISMAIL', 3, ''),
(534, 446, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000146/LS/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image98.jpg', 'ISMAIL', 3, ''),
(535, 447, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000147/LS/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'image99.jpg', 'ISMAIL', 3, ''),
(536, 448, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000148/LS/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'IMG_0529.jpeg', 'ISMAIL', 3, ''),
(537, 449, '2024-07-23', '2024-07-23', '19', '35.27/03.0/000150/LS/1.05.0.00.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', 'IMG_0530.jpeg', 'ISMAIL', 3, ''),
(538, 450, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000323/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '323_LS.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(539, 452, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000324/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '324_LS.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(540, 451, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000326/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '326.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(541, 454, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000328/GU/1.03.2.10.0.00.01.0000/M/7/2024', 'BELANJA PERSEDIAAN', '328_GU.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(542, 453, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000325/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '325_LS.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(543, 456, '2024-07-23', '2024-07-23', '5', '35.27/03.0/000971/GU/5.02.0.00.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', 'WhatsApp_Image_2024-07-23_at_14_54_38.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(544, 457, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000322/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '322_ls.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, ''),
(545, 458, '2024-07-23', '2024-07-23', '17', '35.27/03.0/000321/LS/1.03.2.10.0.00.01.0000/M/7/2024', 'BUKAN BELANJA MODAL/PERSEDIAAN', '321_ls.jpeg', 'RYAN PRESI H.L., A.Md.Pnl.', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `status_sewa`
--

CREATE TABLE `status_sewa` (
  `id_status` int(11) NOT NULL,
  `kelas_status` longtext DEFAULT NULL,
  `status_sewa` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_sewa`
--

INSERT INTO `status_sewa` (`id_status`, `kelas_status`, `status_sewa`) VALUES
(1, 'bg-light-warning-ismail', 'proses...'),
(2, 'bg-light-danger', 'ditolak'),
(3, 'bg-light-success-ismail', 'dipesan');

-- --------------------------------------------------------

--
-- Table structure for table `status_spm`
--

CREATE TABLE `status_spm` (
  `id` int(11) NOT NULL,
  `kelas` longtext NOT NULL,
  `status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_spm`
--

INSERT INTO `status_spm` (`id`, `kelas`, `status`) VALUES
(1, 'bg-light-warning-ismail', 'proses...'),
(2, 'bg-light-danger', 'ditolak!'),
(3, 'bg-light-success-ismail', 'diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `url` longtext NOT NULL,
  `icon` longtext NOT NULL,
  `is_active` int(11) NOT NULL,
  `has_sub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `id_menu`, `title`, `url`, `icon`, `is_active`, `has_sub`) VALUES
(1, 1, 'Admin', 'admin_lasada', 'fa fa-fw fa-lg fa-user-circle-o', 1, 1),
(2, 1, 'SPM', 'verifikasi_spm', 'fa fa-fw fa-lg fa-money', 0, 0),
(3, 2, 'Dashboard', 'index', 'fa fa-fw fa-lg fa-windows', 1, 0),
(4, 3, 'Aset', 'aset', 'fa fa-fw fa-lg fa-institution', 1, 0),
(5, 2, 'Inventaris', 'inventaris', 'fa fa-fw fa-lg fa-database', 1, 0),
(6, 2, 'Persediaan', 'stock', 'fa fa-fw fa-lg fa-inbox', 1, 0),
(7, 2, 'Versi Barada-E', 'pengajuan_spm', 'fa fa-fw fa-lg fa-cloud-upload', 1, 0),
(8, 4, 'Kontak', 'contact', 'fa fa-fw fa-lg fa-phone', 1, 0),
(9, 5, 'Manage', 'menu', 'fa fa-fw fa-lg fa-gear', 1, 1),
(10, 2, 'Info', 'info', 'fa fa-fw fa-lg fa-info-circle', 1, 0),
(11, 5, 'Manage User', 'user_manage', 'fa fa-fw fa-lg fa-users', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'SKPD'),
(3, 'Public'),
(4, 'Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_sewa`
--
ALTER TABLE `aset_sewa`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_acara`
--
ALTER TABLE `event_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `has_sub_menu`
--
ALTER TABLE `has_sub_menu`
  ADD PRIMARY KEY (`id_has_sub`);

--
-- Indexes for table `kode_barang_108`
--
ALTER TABLE `kode_barang_108`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spm_masuk`
--
ALTER TABLE `spm_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_sewa`
--
ALTER TABLE `status_sewa`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_spm`
--
ALTER TABLE `status_spm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `aset_sewa`
--
ALTER TABLE `aset_sewa`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `event_acara`
--
ALTER TABLE `event_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `has_sub_menu`
--
ALTER TABLE `has_sub_menu`
  MODIFY `id_has_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kode_barang_108`
--
ALTER TABLE `kode_barang_108`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spm_masuk`
--
ALTER TABLE `spm_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;

--
-- AUTO_INCREMENT for table `status_sewa`
--
ALTER TABLE `status_sewa`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_spm`
--
ALTER TABLE `status_spm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
