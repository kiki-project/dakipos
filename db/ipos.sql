-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 12:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ipos`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `rek_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `description` text,
  `limit_jumlah_piutang` varchar(16) DEFAULT NULL,
  `limit_hari_piutang` int(11) DEFAULT NULL,
  `jatuh_tempo` int(11) DEFAULT NULL,
  `maksimum_jumlah` varchar(36) DEFAULT NULL,
  `pajak` varchar(36) DEFAULT NULL,
  `nilai_pajak` varchar(11) DEFAULT NULL,
  `sumber_nilai_pajak` varchar(36) DEFAULT NULL,
  `customer_group` varchar(36) DEFAULT NULL,
  `tipe_potongan` varchar(36) DEFAULT NULL,
  `wilayah` varchar(36) DEFAULT NULL,
  `sub_wilayah` varchar(36) DEFAULT NULL,
  `sales` varchar(36) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `kode`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `alamat`, `telepon`, `fax`, `kota`, `provinsi`, `negara`, `kode_pos`, `email`, `kontak`, `no_rek`, `rek_name`, `bank`, `description`, `limit_jumlah_piutang`, `limit_hari_piutang`, `jatuh_tempo`, `maksimum_jumlah`, `pajak`, `nilai_pajak`, `sumber_nilai_pajak`, `customer_group`, `tipe_potongan`, `wilayah`, `sub_wilayah`, `sales`, `tanggal_lahir`) VALUES
(1, 'PL001', 'Hmmm', '2021-08-22 13:36:04', '2021-08-22 13:36:04', 1, 1, 'asfa', '43346346456', '46346', 'asf', 'sdasd', 'safasf', 'safasf', 'faldo@gmail.com', '1234345', '214235345346', 'kiki', 'BCA', 'asdasf', '10000.00', 10, 12, '7800.00', 'Default', '0.02', 'Default', 'Bronze', 'Pot. Grup Per Item', 'JBTB', 'JKT', 'SL0001', '2021-08-19'),
(3, 'PL00002', 'Kiki Priana', '2021-08-22 14:38:21', '2021-08-22 14:38:21', 1, 1, 'asfsg sgd', '234532235', '42342', 'asdfasd', 'sdasd', 'safasf', 'safasf', 'kiki.project23@gmail.com', '33', '214235345346', 'kiki', 'BCA', '53sdf', '10000.00', 1, 10, '0.03', 'Default', '0.03', 'Default', 'Bronze', 'Pot. Grup Per Item', 'JBTB', 'JKT', 'SL0001', '2021-08-11'),
(5, 'PL00003', 'Test IT', '2021-08-22 14:13:00', '2021-08-22 14:13:00', 1, 1, 'ss', '', '', 's', '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '0.00', 'Default', '0.00', 'Default', '', '', '', '', '', '0000-00-00'),
(6, 'PL00004', 'faisal', '2021-08-22 14:23:43', '2021-08-22 14:23:43', 1, 1, 'safas', '', '', 'a', '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '0.00', 'Default', '0.00', 'Default', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
`id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `kota_dari` text,
  `kota_tujuan` text,
  `country` varchar(36) DEFAULT NULL,
  `paket1` int(11) DEFAULT NULL,
  `paket2` int(11) DEFAULT NULL,
  `paket3` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL,
  `kode` varchar(64) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `jenis` varchar(36) DEFAULT NULL,
  `merek` varchar(200) DEFAULT NULL,
  `rak` varchar(36) DEFAULT NULL,
  `hpp` varchar(36) DEFAULT NULL,
  `pajak` varchar(10) DEFAULT NULL,
  `description` text,
  `status_jual` varchar(100) DEFAULT NULL,
  `type` varchar(36) DEFAULT NULL,
  `pilihan` varchar(36) DEFAULT NULL,
  `pilihan_harga_jual` varchar(100) DEFAULT NULL,
  `flexible` varchar(36) DEFAULT NULL,
  `satuan_dasar` varchar(36) DEFAULT NULL,
  `barcode` varchar(200) DEFAULT NULL,
  `poin_dasar` varchar(36) DEFAULT NULL,
  `komisi_sales` varchar(11) DEFAULT NULL,
  `harga_pokok` int(11) DEFAULT NULL,
  `persentase` varchar(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok_minimum` varchar(11) DEFAULT NULL,
  `kode_suplier` varchar(36) DEFAULT NULL,
  `img` text,
  `finish` varchar(1) DEFAULT NULL,
  `assign_id` int(11) DEFAULT NULL,
  `supplier` varchar(36) DEFAULT NULL,
  `serial` varchar(36) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `kode`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `jenis`, `merek`, `rak`, `hpp`, `pajak`, `description`, `status_jual`, `type`, `pilihan`, `pilihan_harga_jual`, `flexible`, `satuan_dasar`, `barcode`, `poin_dasar`, `komisi_sales`, `harga_pokok`, `persentase`, `harga_jual`, `stok_minimum`, `kode_suplier`, `img`, `finish`, `assign_id`, `supplier`, `serial`) VALUES
(3, 'BR00001', 'Kiki Priana', '2021-08-23 20:13:58', '2021-08-23 20:13:58', 1, 1, 'MKN', 'Indofood', '12', 'FIFO', '0.00', '', NULL, NULL, NULL, NULL, NULL, '', '', '0.00', '1230.00', 0, '0.00', 0, '0.00', NULL, '', '1', 1, '', NULL),
(4, 'BR00002', 'asasa', '2021-08-23 20:24:01', '2021-08-23 20:24:01', 1, 1, 'MKN', 'Indofood', '12', NULL, '0.00', '', NULL, 'SRV', NULL, NULL, NULL, 'BOX', '2e123', '2340.00', '2140.00', 0, '0.00', 0, '0.00', NULL, NULL, '1', NULL, '', NULL),
(5, 'BR0003', 'INDOME AYAM BAWANG', '2021-10-01 13:29:53', '2021-10-01 13:29:53', 1, 1, 'MKN', 'Indofood', '12', 'FIFO', '0.00', 'add', 'Masih dijual', 'INV', NULL, NULL, NULL, 'DUS', '1231523523626', '10.00', '1000.00', 10000, '0.00', 10000, '10.00', NULL, NULL, '1', NULL, 'SP00001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_brands`
--

CREATE TABLE IF NOT EXISTS `item_brands` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_brands`
--

INSERT INTO `item_brands` (`id`, `kode`, `description`) VALUES
(14, 'Indofood', 'Indofood'),
(15, 'Nestle', 'Nestle');

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE IF NOT EXISTS `item_types` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `kode`, `description`) VALUES
(3, 'MKN', 'Makanan'),
(4, 'MNM', 'Minuman'),
(5, 'ALT', 'Alat Listrik'),
(6, 'OBAT', 'Obat obatan');

-- --------------------------------------------------------

--
-- Table structure for table `item_units`
--

CREATE TABLE IF NOT EXISTS `item_units` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_units`
--

INSERT INTO `item_units` (`id`, `kode`, `description`) VALUES
(1, 'GRAM', 'GRAM'),
(2, 'BOX', 'BOX'),
(3, 'DUS', 'DUS'),
(4, 'GLS', 'GLS'),
(5, 'PAK', 'PAK'),
(6, 'PCS', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
`id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `kode` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `parent` varchar(200) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `path` text,
  `icon` varchar(200) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `treeview` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `code_length` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `created_at`, `updated_at`, `updated_by`, `kode`, `name`, `parent`, `type`, `path`, `icon`, `sort`, `treeview`, `code`, `code_length`) VALUES
(1, '2021-08-04 03:02:26', '2021-08-04 03:02:33', 1, 'DASHBOARDS', 'Dashboards', NULL, 'main', 'dashboards', 'fa-dashboard', 1, NULL, NULL, NULL),
(2, '2021-08-04 03:02:26', '2021-08-04 03:02:33', 1, 'USERS', 'Users', NULL, 'main', 'users-list', 'fa-users', 10, NULL, NULL, NULL),
(3, '2021-08-11 02:26:26', '2021-08-11 02:26:30', 1, 'MASTERDATA', 'Master Data', NULL, 'main', NULL, 'fa-folder', 2, 'has-treeview', NULL, NULL),
(4, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'ITEMS', 'Daftar Item', 'MASTERDATA', 'sub', 'items-list', 'fa-dropbox', 1, NULL, 'BR', 4),
(5, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'CUSTOMERS', 'Daftar Pelanggan', 'MASTERDATA', 'sub', 'customers-list', 'fa-user', 2, NULL, 'PL', 4),
(6, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'SUPPLIERS', 'Daftar Supplier', 'MASTERDATA', 'sub', 'suppliers-list', 'fa-user', 3, NULL, 'SP', 4),
(7, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'SALES', 'Daftar Sales', 'MASTERDATA', 'sub', 'sales-list', 'fa-user', 4, NULL, 'SL', 4),
(8, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'MASTERDATA-SETTINGS', 'Pengaturan', 'MASTERDATA', 'sub', NULL, 'fa-cog', 5, NULL, NULL, NULL),
(9, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'MASTER-ORDERS', 'Pembelian', NULL, 'main', NULL, 'fa-dropbox', 3, 'has-treeview', NULL, NULL),
(10, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'ORDERS', 'Pesanan Pembelian', 'MASTER-ORDERS', 'sub', 'orders-list', 'fa-shopping-cart', 1, NULL, 'BL', 4),
(11, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'PURCHASES', 'Daftar Pembelian', 'MASTER-ORDERS', 'sub', 'purchases-list', 'fa-list-ol', 2, NULL, 'BL', 4),
(12, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'DEBTS', 'Pembayaran Hutang', 'MASTER-ORDERS', 'sub', 'debts-list', 'fa-money', 3, NULL, 'BL', 4),
(13, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'PURCHASE-STATUS', 'Status Lunas', 'MASTER-ORDERS', 'sub', 'purchase-paid', 'fa-check-square-o', 4, NULL, 'BL', 4),
(14, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'PURCHASE-PRICE-HISTORIES', 'History Harga Beli', 'MASTER-ORDERS', 'sub', NULL, 'fa-history', 5, NULL, NULL, NULL),
(15, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'PURCHASE-RETURN', 'Retur Pembelian', 'MASTER-ORDERS', 'sub', NULL, 'fa-reply', 6, NULL, NULL, NULL),
(16, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'MASTER-SALE', 'Penjualan', NULL, 'main', NULL, 'fa-check-square-o', 4, 'has-treeview', NULL, NULL),
(17, '2021-08-11 02:26:30', '2021-08-11 02:26:30', 1, 'SALE-ORDERS', 'Pesanan Penjualan', 'MASTER-SALE', 'sub', NULL, 'fa-shopping-cart', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_rows`
--

CREATE TABLE IF NOT EXISTS `page_rows` (
`id` int(11) NOT NULL,
  `row` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_rows`
--

INSERT INTO `page_rows` (`id`, `row`) VALUES
(1, 10),
(2, 25),
(3, 50),
(4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `item_description` text,
  `kode_item` varchar(36) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `supplier` varchar(36) DEFAULT NULL,
  `jenis_item` varchar(36) DEFAULT NULL,
  `sub_total_item` varchar(36) DEFAULT NULL,
  `sub_total_terima` varchar(36) DEFAULT NULL,
  `satuan` varchar(36) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `potongan` varchar(36) DEFAULT NULL,
  `sub_total_harga` int(11) DEFAULT NULL,
  `total_akhir_harga` int(11) DEFAULT NULL,
  `pot_nota_percent` varchar(36) DEFAULT NULL,
  `pot_nota_nilai` varchar(36) DEFAULT NULL,
  `dp` int(11) DEFAULT NULL,
  `kredit` int(36) DEFAULT NULL,
  `pajak_percent` varchar(36) DEFAULT NULL,
  `pajak_nilai` varchar(36) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `description` text,
  `jenis` varchar(36) DEFAULT NULL,
  `masuk_ke` varchar(36) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `biaya_lain` int(11) DEFAULT NULL,
  `tambah_total` int(11) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `status` varchar(36) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `kode`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `item_description`, `kode_item`, `item`, `supplier`, `jenis_item`, `sub_total_item`, `sub_total_terima`, `satuan`, `harga`, `potongan`, `sub_total_harga`, `total_akhir_harga`, `pot_nota_percent`, `pot_nota_nilai`, `dp`, `kredit`, `pajak_percent`, `pajak_nilai`, `tanggal`, `description`, `jenis`, `masuk_ke`, `no`, `biaya_lain`, `tambah_total`, `jatuh_tempo`, `tanggal_kirim`, `status`) VALUES
(7, '0001/BL/UTM/0914', NULL, '2021-09-14 09:32:24', '2021-09-14 09:32:24', 1, 1, 'hmmmm', 'BR00003', 'INDOME AYAM BAWANG', 'SP00001', 'MKN', '1', '0', 'GRAM', 2500, '0.00', 2500, 2500, '0.00', '0.00', 0, 2500, '10.00', '0.00', '2021-09-14', 'adad', 'Pembelian', 'UTM', 1, NULL, NULL, NULL, '2021-09-15', 'Pesanan'),
(8, '0002/BL/UTM/0914', NULL, '2021-09-14 09:32:52', '2021-09-14 09:32:52', 1, 1, 'hmmmm', 'BR00003', 'INDOME AYAM BAWANG', 'SP00001', 'MKN', '1', '0', 'GRAM', 2500, '0.00', 3844, 3844, '0.00', '0.00', 0, 3844, '10.00', '0.00', '2021-09-16', 'adad', NULL, 'UTM', 2, 1344, 1, '2021-09-16', NULL, 'Pembelian'),
(9, '0003/BL/UTM/1001', NULL, '2021-10-01 13:31:22', '2021-10-01 13:31:22', 1, 1, 'add', 'BR0003', 'INDOME AYAM BAWANG', 'SP00001', 'MKN', '11', '0', 'DUS', 10000, '0.00', 120000, 120000, '0.00', '0.00', 0, 120000, '0.00', '0.00', '2021-10-01', '', NULL, 'UTM', 3, 10000, 1, '2021-10-01', NULL, 'Pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `kode`, `description`) VALUES
(1, 'JBTB', 'JABODETABEK');

-- --------------------------------------------------------

--
-- Table structure for table `region_sub`
--

CREATE TABLE IF NOT EXISTS `region_sub` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region_sub`
--

INSERT INTO `region_sub` (`id`, `kode`, `description`) VALUES
(1, 'JKT', 'JAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `updated_by`, `created_by`) VALUES
(1, 'Administrator', NULL, NULL, NULL, NULL, NULL),
(2, 'Manager', NULL, NULL, NULL, NULL, NULL),
(3, 'Manager area', NULL, NULL, NULL, NULL, NULL),
(4, 'Supervisor', NULL, NULL, NULL, NULL, NULL),
(5, 'Kasir', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE IF NOT EXISTS `role_modules` (
`id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `access` varchar(20) DEFAULT NULL,
  `list` varchar(20) DEFAULT NULL,
  `edit` varchar(20) DEFAULT NULL,
  `delete` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`id`, `role_id`, `module_id`, `access`, `list`, `edit`, `delete`) VALUES
(8, 1, 1, 'Enabled', 'None', 'None', 'None'),
(9, 1, 2, 'Enabled', 'All', 'All', 'All'),
(12, 2, 1, 'Enabled', 'All', 'All', 'None'),
(13, 2, 2, 'Enabled', 'Group', 'None', 'None'),
(14, 1, 3, 'Enabled', 'None', 'None', 'None'),
(15, 1, 4, 'Enabled', 'All', 'All', 'All'),
(16, 1, 5, 'Enabled', 'All', 'All', 'All'),
(17, 1, 6, 'Enabled', 'All', 'All', 'All'),
(18, 1, 7, 'Enabled', 'All', 'All', 'All'),
(19, 1, 8, 'Enabled', 'None', 'None', 'None'),
(20, 1, 9, 'Enabled', 'None', 'None', 'None'),
(21, 1, 10, 'Enabled', 'All', 'All', 'All'),
(22, 1, 11, 'Enabled', 'All', 'All', 'All'),
(23, 1, 12, 'Enabled', 'All', 'All', 'All'),
(24, 1, 13, 'Enabled', 'None', 'None', 'None'),
(25, 1, 14, 'Enabled', 'None', 'None', 'None'),
(26, 1, 15, 'Enabled', 'None', 'None', 'None'),
(27, 1, 16, 'Enabled', 'None', 'None', 'None'),
(28, 1, 17, 'Enabled', 'None', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `rek_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `description` text,
  `tanggal_lahir` date DEFAULT NULL,
  `sistem_komisi` varchar(64) DEFAULT NULL,
  `type_komisi` varchar(11) DEFAULT NULL,
  `nilai_komisi` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `kode`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `alamat`, `telepon`, `fax`, `kota`, `provinsi`, `negara`, `kode_pos`, `email`, `kontak`, `no_rek`, `rek_name`, `bank`, `description`, `tanggal_lahir`, `sistem_komisi`, `type_komisi`, `nilai_komisi`) VALUES
(2, 'SL00001', 'Kiki Priana', '2021-08-23 19:33:07', '2021-08-23 19:33:07', 1, 1, 'aasd', '', '', 'asd', '', 'safasf', '', 'support@dakisttm.com', '', '214235345346', 'kiki', 'BCA', '', '0000-00-00', 'Total Faktur', 'Persentase', '3450.03');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `rek_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `description` text,
  `limit_jumlah_piutang` varchar(16) DEFAULT NULL,
  `limit_hari_piutang` int(11) DEFAULT NULL,
  `jatuh_tempo` int(11) DEFAULT NULL,
  `maksimum_jumlah` varchar(36) DEFAULT NULL,
  `pajak` varchar(36) DEFAULT NULL,
  `nilai_pajak` varchar(11) DEFAULT NULL,
  `sumber_nilai_pajak` varchar(36) DEFAULT NULL,
  `customer_group` varchar(36) DEFAULT NULL,
  `tipe_potongan` varchar(36) DEFAULT NULL,
  `wilayah` varchar(36) DEFAULT NULL,
  `sub_wilayah` varchar(36) DEFAULT NULL,
  `sales` varchar(36) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `npwp` varchar(46) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `kode`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `alamat`, `telepon`, `fax`, `kota`, `provinsi`, `negara`, `kode_pos`, `email`, `kontak`, `no_rek`, `rek_name`, `bank`, `description`, `limit_jumlah_piutang`, `limit_hari_piutang`, `jatuh_tempo`, `maksimum_jumlah`, `pajak`, `nilai_pajak`, `sumber_nilai_pajak`, `customer_group`, `tipe_potongan`, `wilayah`, `sub_wilayah`, `sales`, `tanggal_lahir`, `npwp`) VALUES
(3, 'SP00001', 'Kiki Priana', '2021-08-22 17:54:45', '2021-08-22 17:54:45', 1, 1, 'sdfsda', '3525', '235235', 'sdf', 'sdasd', 'safasf', 'safasf', 'support@dakisttm.com', 'add', '214235345346', 'kiki', 'BCA', 'assa', '10000.00', 30, 30, '233045.00', 'Default', '0.00', 'Default', 'Bronze', 'Pot. Grup Per Item', 'JBTB', 'JKT', '', '2021-08-10', NULL),
(6, 'SP00002', 'Robet', '2021-08-22 18:13:37', '2021-08-22 18:13:37', 1, 1, 'jakatrta', '', '', 'asfaa', 'sdasd', '', '', '', '', '', '', 'BCA', '', '', 0, 1, '', 'Default', '10.00', 'Default', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '01.342.940.2-091.000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `user_name` varchar(36) DEFAULT NULL,
  `password` varchar(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `related_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `report_to` int(11) DEFAULT NULL,
  `dept` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `role_id`, `related_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `report_to`, `dept`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 1, NULL, '2021-08-04 03:32:01', '2021-08-05 21:22:44', NULL, 3, NULL, 'UTM'),
(3, 'kiki', '202cb962ac59075b964b07152d234b70', 'Kiki Priana', 2, NULL, '2021-08-05 17:57:57', '2021-08-05 21:23:07', 2, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
`id` int(11) NOT NULL,
  `kode` varchar(36) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `akun` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `kode`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `akun`, `alamat`, `telepon`, `fax`) VALUES
(1, 'UTM', 'Utama', 'UTAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_brands`
--
ALTER TABLE `item_brands`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_units`
--
ALTER TABLE `item_units`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_rows`
--
ALTER TABLE `page_rows`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_sub`
--
ALTER TABLE `region_sub`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_brands`
--
ALTER TABLE `item_brands`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_units`
--
ALTER TABLE `item_units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `page_rows`
--
ALTER TABLE `page_rows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `region_sub`
--
ALTER TABLE `region_sub`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
