-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 10:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sid-bhonekainsetala`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` int(11) UNSIGNED NOT NULL,
  `agama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `agama`) VALUES
(1, 'islam'),
(2, 'kristen'),
(3, 'katolik'),
(4, 'hindu'),
(5, 'budha'),
(6, 'kong hu chu');

-- --------------------------------------------------------

--
-- Table structure for table `bantuans`
--

CREATE TABLE `bantuans` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `bantuan` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `waktu_terima` datetime NOT NULL,
  `ket` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_individus`
--

CREATE TABLE `bantuan_individus` (
  `id` int(11) UNSIGNED NOT NULL,
  `bantuan_individu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bantuan_individus`
--

INSERT INTO `bantuan_individus` (`id`, `bantuan_individu`) VALUES
(1, 'BLT'),
(2, 'bantuan nelayan'),
(3, 'bantuan pertanian'),
(4, 'bantuan peternakan'),
(5, 'bantuan home industri'),
(6, 'bantuan perbengkelan'),
(7, 'bantuan usaha mebel'),
(8, 'PKH'),
(9, 'BPNT');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `paragraf` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_kategori_beritas` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_bantuan_individus`
--

CREATE TABLE `data_bantuan_individus` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `id_bantuan_individus` int(11) NOT NULL,
  `id_data_penduduks` int(11) NOT NULL,
  `waktu_terima` datetime NOT NULL,
  `ket` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_bantuan_kelompoks`
--

CREATE TABLE `data_bantuan_kelompoks` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `bantuan_kelompoks` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `waktu_terima` datetime NOT NULL,
  `ket` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_disabilitass`
--

CREATE TABLE `data_disabilitass` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `disabilitas` varchar(255) NOT NULL,
  `id_data_penduduks` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_nkks`
--

CREATE TABLE `data_nkks` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `id_rt_rws` int(11) NOT NULL,
  `nkk` varchar(255) NOT NULL,
  `id_tingkat_kesejahteraans` int(11) NOT NULL,
  `id_sumber_penghasilan_utamas` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduks`
--

CREATE TABLE `data_penduduks` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_data_nkks` int(11) NOT NULL,
  `id_agamas` int(11) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `id_golongan_darahs` int(11) NOT NULL,
  `id_pendidikans` int(11) NOT NULL,
  `id_status_hub_dlm_kels` int(11) NOT NULL,
  `id_kewarganegaraans` int(11) NOT NULL,
  `id_jenis_kelamins` int(11) NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `id_pekerjaans1` int(11) NOT NULL,
  `id_pekerjaans2` int(11) NOT NULL,
  `id_pekerjaans3` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_wilayahs`
--

CREATE TABLE `data_wilayahs` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `aset_prasarana_ekonomi` varchar(255) NOT NULL,
  `aset_prasarana_ibadah` varchar(255) NOT NULL,
  `aset_prasarana_kesehatan` varchar(255) NOT NULL,
  `aset_prasarana_pemerintahan_desa` varchar(255) NOT NULL,
  `aset_prasarana_pendidikan` varchar(255) NOT NULL,
  `aset_prasarana_umum` varchar(255) NOT NULL,
  `lembaga_pelayanan` varchar(255) NOT NULL,
  `kebiasaan` varchar(255) NOT NULL,
  `sumber_daya_milik_warga` varchar(255) NOT NULL,
  `sumber_daya_alam` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `desas`
--

CREATE TABLE `desas` (
  `id` int(11) UNSIGNED NOT NULL,
  `desa` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `desas`
--

INSERT INTO `desas` (`id`, `desa`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'desa bhone kainsetala', '1684616624_aee5f5b9a1b32269badb.png', '2023-05-20 21:03:44', '2023-05-20 21:03:44', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darahs`
--

CREATE TABLE `golongan_darahs` (
  `id` int(11) UNSIGNED NOT NULL,
  `golongan_darah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `golongan_darahs`
--

INSERT INTO `golongan_darahs` (`id`, `golongan_darah`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'ab'),
(4, 'o'),
(5, '-');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamins`
--

CREATE TABLE `jenis_kelamins` (
  `id` int(11) UNSIGNED NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jenis_kelamins`
--

INSERT INTO `jenis_kelamins` (`id`, `jenis_kelamin`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` int(11) UNSIGNED NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kabupatens`
--

INSERT INTO `kabupatens` (`id`, `kabupaten`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'kabupaten muna', '1684616572_b4e84546f340b08372fd.png', '2023-05-20 21:02:52', '2023-05-20 21:02:52', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_beritas`
--

CREATE TABLE `kategori_beritas` (
  `id` int(11) UNSIGNED NOT NULL,
  `kategori_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori_beritas`
--

INSERT INTO `kategori_beritas` (`id`, `kategori_berita`) VALUES
(1, 'berita'),
(2, 'olahraga'),
(3, 'acara'),
(4, 'undangan'),
(5, 'pengumuman'),
(6, 'progres_kegiatan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `kecamatan`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'kecamatan bone', '1684616601_42253ce03920239eb96c.png', '2023-05-20 21:03:21', '2023-05-20 21:03:21', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_masyarakats`
--

CREATE TABLE `kelompok_masyarakats` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsis` int(11) NOT NULL,
  `id_kabupatens` int(11) NOT NULL,
  `id_kecamatans` int(11) NOT NULL,
  `id_desas` int(11) NOT NULL,
  `kelompok_masyarakat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kewarganegaraans`
--

CREATE TABLE `kewarganegaraans` (
  `id` int(11) UNSIGNED NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kewarganegaraans`
--

INSERT INTO `kewarganegaraans` (`id`, `kewarganegaraan`) VALUES
(1, 'wni');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-04-08-044110', 'App\\Database\\Migrations\\DataPenduduks', 'default', 'App', 1684724054, 1),
(2, '2023-04-08-081750', 'App\\Database\\Migrations\\DataDisabilitass', 'default', 'App', 1684724054, 1),
(3, '2023-04-08-082117', 'App\\Database\\Migrations\\DataNkks', 'default', 'App', 1684724054, 1),
(4, '2023-04-08-235444', 'App\\Database\\Migrations\\TingkatKesejahteraans', 'default', 'App', 1684724054, 1),
(5, '2023-04-09-000313', 'App\\Database\\Migrations\\Agamas', 'default', 'App', 1684724054, 1),
(6, '2023-04-09-000405', 'App\\Database\\Migrations\\GolonganDarahs', 'default', 'App', 1684724054, 1),
(7, '2023-04-09-000505', 'App\\Database\\Migrations\\Pendidikans', 'default', 'App', 1684724054, 1),
(8, '2023-04-09-001914', 'App\\Database\\Migrations\\StatusHubDlmKels', 'default', 'App', 1684724054, 1),
(9, '2023-04-09-002039', 'App\\Database\\Migrations\\Kewarganegaraans', 'default', 'App', 1684724054, 1),
(10, '2023-04-09-002148', 'App\\Database\\Migrations\\SumberPenghasilanUtamas', 'default', 'App', 1684724054, 1),
(11, '2023-04-09-002400', 'App\\Database\\Migrations\\JenisKelamins', 'default', 'App', 1684724054, 1),
(12, '2023-04-09-002439', 'App\\Database\\Migrations\\Bantuans', 'default', 'App', 1684724054, 1),
(13, '2023-04-20-015331', 'App\\Database\\Migrations\\DataWilayahs', 'default', 'App', 1684724054, 1),
(14, '2023-05-22-010721', 'App\\Database\\Migrations\\NamaBantuanIndividu', 'default', 'App', 1684724054, 1),
(15, '2023-05-22-010746', 'App\\Database\\Migrations\\NamaBantuanKelompok', 'default', 'App', 1684724054, 1),
(16, '2023-05-22-050709', 'App\\Database\\Migrations\\DataBantuanIndividus', 'default', 'App', 1684732584, 2),
(17, '2023-05-22-050724', 'App\\Database\\Migrations\\DataBantuanKelompoks', 'default', 'App', 1684732584, 2),
(18, '2023-05-23-134308', 'App\\Database\\Migrations\\BantuanIndividu', 'default', 'App', 1684849751, 3),
(19, '2023-05-23-140115', 'App\\Database\\Migrations\\KelompokMasyarakat', 'default', 'App', 1684850563, 4),
(20, '2023-05-23-140115', 'App\\Database\\Migrations\\KelompokMasyarakats', 'default', 'App', 1684850844, 5),
(21, '2023-05-27-141402', 'App\\Database\\Migrations\\DataPenduduks', 'default', 'App', 1685197736, 6),
(22, '2023-05-27-142017', 'App\\Database\\Migrations\\DataBantuanIndividus', 'default', 'App', 1685197736, 6),
(23, '2023-05-27-144924', 'App\\Database\\Migrations\\Pekerjaans', 'default', 'App', 1685199715, 7),
(24, '2023-05-27-215951', 'App\\Database\\Migrations\\DataPenduduks', 'default', 'App', 1685224978, 8),
(25, '2023-05-27-220408', 'App\\Database\\Migrations\\DataPenduduks', 'default', 'App', 1685225172, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id` int(11) UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id`, `pekerjaan`) VALUES
(1, 'PNS'),
(2, 'karyawan honorer'),
(3, 'petani'),
(4, 'peternak'),
(5, 'pedagang'),
(6, 'nelayan'),
(7, 'teknisi'),
(8, 'tukang kayu & batu'),
(9, '-'),
(10, 'ibu rumah tangga'),
(11, 'pelajar/mahasiswa'),
(12, 'pekerja lepas'),
(13, 'karyawan swasta');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` int(11) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id`, `pendidikan`) VALUES
(1, 'sdtt'),
(2, 'tk'),
(3, 'sd'),
(4, 'smp'),
(5, 'sma'),
(6, 's1'),
(7, 's2'),
(8, 's3'),
(17, 'belum sekolah'),
(18, 'd1'),
(19, 'd2'),
(20, 'd3');

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` int(11) UNSIGNED NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `provinsi`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'sulawesi tenggara', '1684616544_f928dd3c8dbf18a6b1f9.png', '2023-05-20 21:02:24', '2023-05-20 21:02:24', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `resume_data_penduduks`
--

CREATE TABLE `resume_data_penduduks` (
  `id` int(11) UNSIGNED NOT NULL,
  `jumlah_penduduk` varchar(255) NOT NULL,
  `jumlah_laki_laki` varchar(255) NOT NULL,
  `jumlah_perempuan` varchar(255) NOT NULL,
  `umur_kurang_dari_1` varchar(255) NOT NULL,
  `umur_1_sd_4` varchar(255) NOT NULL,
  `umur_5_sd_14` varchar(255) NOT NULL,
  `umur_15_sd_17` varchar(255) NOT NULL,
  `umur_18_sd_39` varchar(255) NOT NULL,
  `umur_40_sd_65` varchar(255) NOT NULL,
  `umur_lebih_dari_65` varchar(255) NOT NULL,
  `jumlah_kk` varchar(255) NOT NULL,
  `jumlah_kk_laki_laki` varchar(255) NOT NULL,
  `jumlah_kk_perempuan` varchar(255) NOT NULL,
  `pns` varchar(255) NOT NULL,
  `karyawan_honorer` varchar(255) NOT NULL,
  `petani` varchar(255) NOT NULL,
  `peternak` varchar(255) NOT NULL,
  `pedagang` varchar(255) NOT NULL,
  `nelayan` varchar(255) NOT NULL,
  `teknisi` varchar(255) NOT NULL,
  `tukang` varchar(255) NOT NULL,
  `kosong` varchar(255) NOT NULL,
  `ibu_rumah_tangga` varchar(255) NOT NULL,
  `pelajar` varchar(255) NOT NULL,
  `pekerja_lepas` varchar(255) NOT NULL,
  `karyawan_swasta` varchar(255) NOT NULL,
  `sdtt` varchar(255) NOT NULL,
  `tk` varchar(255) NOT NULL,
  `sd` varchar(255) NOT NULL,
  `smp` varchar(255) NOT NULL,
  `sma` varchar(255) NOT NULL,
  `s1` varchar(255) NOT NULL,
  `s2` varchar(255) NOT NULL,
  `s3` varchar(255) NOT NULL,
  `belum_sekolah` varchar(255) NOT NULL,
  `d1` varchar(255) NOT NULL,
  `d2` varchar(255) NOT NULL,
  `d3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rt_rws`
--

CREATE TABLE `rt_rws` (
  `id` int(11) UNSIGNED NOT NULL,
  `rt_rw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rt_rws`
--

INSERT INTO `rt_rws` (`id`, `rt_rw`) VALUES
(1, 'RW 1 RT 1'),
(2, 'RW 1 RT 2'),
(3, 'RW 2 RT 1'),
(4, 'RW 2 RT 2');

-- --------------------------------------------------------

--
-- Table structure for table `status_hub_dlm_kels`
--

CREATE TABLE `status_hub_dlm_kels` (
  `id` int(11) UNSIGNED NOT NULL,
  `status_hub_dlm_kel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status_hub_dlm_kels`
--

INSERT INTO `status_hub_dlm_kels` (`id`, `status_hub_dlm_kel`) VALUES
(1, 'kepala keluarga'),
(2, 'istri'),
(3, 'anak kandung'),
(4, 'anak tiri'),
(5, 'anak angkat'),
(11, 'famili lain');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_penghasilan_utamas`
--

CREATE TABLE `sumber_penghasilan_utamas` (
  `id` int(11) UNSIGNED NOT NULL,
  `sumber_penghasilan_utama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sumber_penghasilan_utamas`
--

INSERT INTO `sumber_penghasilan_utamas` (`id`, `sumber_penghasilan_utama`) VALUES
(1, 'PNS'),
(2, 'karyawan honorer'),
(3, 'petani'),
(4, 'peternak'),
(5, 'pedagang'),
(6, 'nelayan'),
(7, 'teknisi'),
(8, 'tukang kayu & batu'),
(9, '-'),
(10, 'ibu rumah tangga'),
(11, 'pelajar/mahasiswa'),
(12, 'pekerja lepas'),
(13, 'karyawan swasta');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kesejahteraans`
--

CREATE TABLE `tingkat_kesejahteraans` (
  `id` int(11) UNSIGNED NOT NULL,
  `tingkat_kesejahteraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tingkat_kesejahteraans`
--

INSERT INTO `tingkat_kesejahteraans` (`id`, `tingkat_kesejahteraan`) VALUES
(1, 'miskin ekstrim'),
(2, 'miskin'),
(3, 'rentan miskin'),
(4, 'tidak miskin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `desa` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `desa`, `password`, `email`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(11, 'admin', '$2y$10$/mwcEM8.PSNLxTnje5/mx.oJjT0vWelrv745pYF3FIqC82ERB1pRa', 'adminadmin@gmail.com', '2024-06-11 15:51:43', '2024-06-11 15:51:43', 'admin', 'admin'),
(12, 'user', '$2y$10$Ug30QCM2WvIV4sQyeQkifueORtUFj.vOCG18zyoJfWd1vc.ynwG1.', 'useruser@gmail.com', '2024-06-11 15:53:27', '2024-06-11 15:53:27', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuans`
--
ALTER TABLE `bantuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan_individus`
--
ALTER TABLE `bantuan_individus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bantuan_individus`
--
ALTER TABLE `data_bantuan_individus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bantuan_kelompoks`
--
ALTER TABLE `data_bantuan_kelompoks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_disabilitass`
--
ALTER TABLE `data_disabilitass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_nkks`
--
ALTER TABLE `data_nkks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penduduks`
--
ALTER TABLE `data_penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_wilayahs`
--
ALTER TABLE `data_wilayahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_masyarakats`
--
ALTER TABLE `kelompok_masyarakats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kewarganegaraans`
--
ALTER TABLE `kewarganegaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_data_penduduks`
--
ALTER TABLE `resume_data_penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt_rws`
--
ALTER TABLE `rt_rws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_hub_dlm_kels`
--
ALTER TABLE `status_hub_dlm_kels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_penghasilan_utamas`
--
ALTER TABLE `sumber_penghasilan_utamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat_kesejahteraans`
--
ALTER TABLE `tingkat_kesejahteraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bantuans`
--
ALTER TABLE `bantuans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bantuan_individus`
--
ALTER TABLE `bantuan_individus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_bantuan_individus`
--
ALTER TABLE `data_bantuan_individus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_bantuan_kelompoks`
--
ALTER TABLE `data_bantuan_kelompoks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_disabilitass`
--
ALTER TABLE `data_disabilitass`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_nkks`
--
ALTER TABLE `data_nkks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_penduduks`
--
ALTER TABLE `data_penduduks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_wilayahs`
--
ALTER TABLE `data_wilayahs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desas`
--
ALTER TABLE `desas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelompok_masyarakats`
--
ALTER TABLE `kelompok_masyarakats`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kewarganegaraans`
--
ALTER TABLE `kewarganegaraans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resume_data_penduduks`
--
ALTER TABLE `resume_data_penduduks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rt_rws`
--
ALTER TABLE `rt_rws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_hub_dlm_kels`
--
ALTER TABLE `status_hub_dlm_kels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sumber_penghasilan_utamas`
--
ALTER TABLE `sumber_penghasilan_utamas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tingkat_kesejahteraans`
--
ALTER TABLE `tingkat_kesejahteraans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
