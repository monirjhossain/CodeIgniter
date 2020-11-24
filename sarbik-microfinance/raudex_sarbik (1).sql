-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 06:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raudex_sarbik`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_asset`
--

CREATE TABLE `sk_asset` (
  `asset_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `asset_cat_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item` varchar(255) CHARACTER SET utf8 NOT NULL,
  `purchase_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `supplier` varchar(255) CHARACTER SET utf8 NOT NULL,
  `asset_condition` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cost` float NOT NULL,
  `warranty` varchar(255) CHARACTER SET utf8 NOT NULL,
  `yearly_depreciation_increase_decrease` varchar(255) CHARACTER SET utf8 NOT NULL,
  `depreciation_percent` int(11) NOT NULL,
  `pdf_file` varchar(255) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_bank`
--

CREATE TABLE `sk_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_bank_account`
--

CREATE TABLE `sk_bank_account` (
  `account_id` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `account_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_depositor_account_open`
--

CREATE TABLE `sk_depositor_account_open` (
  `account_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `opening_date` date NOT NULL,
  `opening_money` int(11) NOT NULL,
  `interestPercent` int(11) NOT NULL,
  `deposit_type` int(11) NOT NULL,
  `ac_status` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_depositor_account_open`
--

INSERT INTO `sk_depositor_account_open` (`account_id`, `account_no`, `memberId`, `opening_date`, `opening_money`, `interestPercent`, `deposit_type`, `ac_status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '2020-03-21', 150, 7, 30, 'running', '2020-06-27', '2020-06-27', 17, 17),
(2, 1, 2, '2020-03-21', 0, 0, 1, 'running', '2020-06-27', '2020-07-05', 17, 17),
(3, 2, 1, '2020-03-21', 200, 7, 30, 'running', '2020-06-27', '2020-06-27', 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `sk_depositor_collection_by_account_open`
--

CREATE TABLE `sk_depositor_collection_by_account_open` (
  `collection_id` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `collected_date` date NOT NULL,
  `collected_by` int(11) NOT NULL,
  `profit` float NOT NULL,
  `collected_money` int(11) NOT NULL,
  `uttolon_money` int(11) NOT NULL,
  `paid_to` varchar(255) CHARACTER SET utf8 NOT NULL,
  `paid_to_mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `paid_bank_account_id` int(11) NOT NULL,
  `paid_check_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_depositor_collection_by_account_open`
--

INSERT INTO `sk_depositor_collection_by_account_open` (`collection_id`, `accountId`, `collected_date`, `collected_by`, `profit`, `collected_money`, `uttolon_money`, `paid_to`, `paid_to_mobile`, `paid_bank_account_id`, `paid_check_no`, `voucher_no`, `details`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, '2020-11-24', 0, 0, 500, 0, '', '', 0, '', '', '', '2020-11-24', '2020-11-24', 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `sk_dipositor_member`
--

CREATE TABLE `sk_dipositor_member` (
  `depositor_id` int(11) NOT NULL,
  `member_no` int(11) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `field_officer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `union_name` varchar(255) NOT NULL,
  `upojela` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `member_fee` int(3) NOT NULL,
  `member_picture_path` varchar(255) NOT NULL,
  `member_picture_name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `total_installment` int(3) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(3) NOT NULL,
  `updated_by` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sk_dipositor_member`
--

INSERT INTO `sk_dipositor_member` (`depositor_id`, `member_no`, `nid`, `date`, `field_officer`, `name`, `gender`, `father_name`, `mother_name`, `husband_name`, `village`, `union_name`, `upojela`, `district`, `mobile`, `member_fee`, `member_picture_path`, `member_picture_name`, `details`, `total_installment`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '2699501936733', '2020-03-21', 0, 'ফারুক হাসান  {সভাপতি}', 1, 'সত্তার শেখ', 'ফুলমতি বেগেম ', '', 'ধোপাডাঙ্গা ', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৭৩৯-৫১০১৩৩', 50, 'shrom-kollan/depositor_img/jjjjjjjjjjj.jpg', 'jjjjjjjjjjj.jpg', '', 1, '2020-06-26', '2020-07-18', 17, 17),
(2, 2, '29118201951331', '2020-03-21', 0, 'রোকমান শেখ {সহ-সভাপতি]', 1, 'মৃত- হাকিম শেখ ', 'মৃত সকিনা বেগম', '', 'ধোপাডাঙ্গ্ ', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৭৩১২০৪৯৪৩', 50, 'shrom-kollan/depositor_img/RUKMAN.jpg', 'RUKMAN.jpg', '', 365, '2020-06-29', '2020-07-18', 17, 17),
(3, 3, '20012914720000146', '2020-03-21', 0, 'মো রাকিব সেক(রাজ)  সাধারন সম্পাদক ', 1, 'মো সামশুল সেক', 'রিনা বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '01731433133', 0, 'shrom-kollan/depositor_img/RAKIB.jpg', 'RAKIB.jpg', '', 365, '2020-06-30', '2020-07-18', 17, 17),
(4, 4, '20012911820101319', '2020-03-21', 0, 'মো তামিম সেক [কোষাধক্ষ ]', 1, 'মোকাম্মেল সেক ', 'হোসনেয়ারা বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৭০৫৭৯৬১২৫', 0, 'shrom-kollan/depositor_img/TAMIM_2.jpg', 'TAMIM_2.jpg', '', 365, '2020-06-30', '2020-07-18', 17, 17),
(5, 5, '১৯৯০২৯১১৮২০০০০০৫২', '2020-03-21', 0, 'জনী অধিকারী [সিনিয়ার সদস্য]', 1, 'নিরোধ অধিকারী ', 'নমিতা অধিকারী ', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৭২৬৬১৬৩৬৭', 0, 'shrom-kollan/depositor_img/JONY.jpg', 'JONY.jpg', '', 365, '2020-06-30', '2020-07-18', 17, 17),
(6, 6, '২৮৫৫৫৪৮২৯৯', '2020-03-21', 0, 'মো চুন্নু মাতুব্বর [সিনিয়ার সদস্য ২]', 1, 'মৃত কাদের মাতুব্বর ', 'খেরো বেগম ', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৭৯৪৫৩৮৮০৯', 0, 'shrom-kollan/depositor_img/CHUNNU_MATUBBOR.jpg', 'CHUNNU_MATUBBOR.jpg', '', 365, '2020-06-30', '2020-07-18', 17, 17),
(7, 7, '5557946257', '2020-03-21', 0, 'মো আলামিন মোল্লা ', 1, 'পাচু মোল্লা ', 'সবিরন নেছা ', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৮৮৩৯৩৪০৬৩', 0, 'shrom-kollan/depositor_img/ALAMIN.jpg', 'ALAMIN.jpg', '', 365, '2020-06-30', '2020-07-05', 17, 17),
(8, 8, '6004215064', '2020-03-21', 0, 'মামুন গাজী ', 1, 'তারা গাজী', 'মনজিলা বেগম ', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৯২১১৮৭০৭৭', 50, 'shrom-kollan/depositor_img/MAMUN2.jpg', 'MAMUN2.jpg', '', 365, '2020-06-30', '2020-07-18', 17, 17),
(9, 9, '২০০২২৯১১৮২০০১৪৩২৯', '1970-01-01', 0, 'মোছাঃ রাবিয়া আক্তার ', 0, 'এনায়েত ফকির ', 'দোলেনা বেগম ', 'নোমান হুসাইন', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১', 50, 'shrom-kollan/depositor_img/RABIYA.jpg', 'RABIYA.jpg', '', 365, '2020-07-01', '2020-07-18', 17, 17),
(10, 10, '19772911820100114', '2020-03-21', 0, 'এনায়েত ', 1, 'নৈমদ্দীন ফকির  ', 'লালজা খাতুন', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১৭', 50, 'shrom-kollan/depositor_img/ENAET1.jpg', 'ENAET1.jpg', '', 365, '2020-07-01', '2020-07-05', 17, 17),
(11, 11, '২৯১১৮২০১৯৪৯২১', '2020-03-21', 0, 'মনোযারা বেগম', 0, '', 'উম্মেদুন নেছা', 'মজিবুর খাঁন', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩', 0, 'shrom-kollan/depositor_img/MONOARA.jpg', 'MONOARA.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(12, 12, '২৯২৪৭০৭১৫৮৩১৮', '2020-03-21', 0, 'আলাউদ্দীন সিকদার ', 1, 'মৃত ফটিক সিকদার ', 'হাজেরা খাতুন', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩', 0, 'shrom-kollan/depositor_img/106116105_273645567288931_6174674076834798173_n1.jpg', '106116105_273645567288931_6174674076834798173_n1.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(13, 13, '১৯৯৪২৯১১৮২০০০০১০', '2020-03-21', 0, 'সুমন তালুকদার', 1, '', '', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩', 0, 'shrom-kollan/depositor_img/SUMON.jpg', 'SUMON.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(14, 14, '২০০১২৯১১৮২০০০২৯০০', '2020-03-21', 0, 'মো. সাগর খানঁ', 1, 'মো.তৈয়ব আলি খান', 'মোছা.নাজমা বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩', 0, 'shrom-kollan/depositor_img/SAGOR.jpg', 'SAGOR.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(15, 15, '৩৭০৭১৫০৬০৭', '2020-03-21', 0, 'কামাল মোল্রা', 1, 'মো. মজিদ মোল্রা', 'তাসলিমা বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩৪', 0, 'shrom-kollan/depositor_img/KAMAL.jpg', 'KAMAL.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(16, 16, '৪৬৫৭৮৫৫৪২৭', '2020-03-21', 0, 'মো:আজাদ সেক', 1, 'মৃত- হাকিম শেখ ', 'মৃত সকিনা বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩', 0, 'shrom-kollan/depositor_img/011.jpg', '011.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(17, 17, '১৯৫১৮৪৪৩১৩', '2020-03-21', 0, 'মো:শরীফ কাজী', 1, 'মো:জলীল কাজী', 'মোছা:মমতাজ বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩', 50, 'shrom-kollan/depositor_img/SORIF.jpg', 'SORIF.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(18, 18, '১৯৯৮২৯১১৮২০০০২৩৮১', '2020-03-21', 0, 'রাব্বি শেখ', 1, 'মো:শামুচল আলম সেক', 'রীনা বেগম', '', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩৪', 0, 'shrom-kollan/depositor_img/হহহহহহহহ.jpg', 'হহহহহহহহ.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(19, 19, '২৯১১৮২০১৯৫১৫০', '2020-03-21', 0, 'রীনা বেগম', 0, '', 'মৃত.আমেনা বেগম', 'সামশুল আলম', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '০১২৩৪৫', 0, 'shrom-kollan/depositor_img/02.jpg', '02.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(20, 20, '২০০২২৯১১৮২০০০৫৮৫১', '2020-03-21', 0, 'মোছাঃ সুবর্ণা আক্তার ', 0, 'মোঃ বক্কার শেখ ', 'মোছাঃ মরজিনা বেগম ', 'মো রাব্বি শেখ  ', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '৬৭৭৬৮৮', 50, 'shrom-kollan/depositor_img/SUBORNA_AKTHER.jpg', 'SUBORNA_AKTHER.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17),
(21, 21, '২৯১৬২৩৯০১৭৫২২', '2020-03-21', 0, 'হাসিনা বেগম ', 0, '', 'মোসাঃ ফিরোজা বেগম ', 'মোঃ রিপন খাঁন ', 'ধোপাডাঙ্গা', 'চাঁদপুর বাজার', 'ফরিদপুর সদর', 'ফরিদপুর', '৫৪৬৪', 50, 'shrom-kollan/depositor_img/HASSINA_BEGUM.jpg', 'HASSINA_BEGUM.jpg', '', 365, '2020-07-18', '2020-07-18', 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `sk_govt_holy_day_calender`
--

CREATE TABLE `sk_govt_holy_day_calender` (
  `date_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `date` date NOT NULL,
  `cause` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_govt_holy_day_calender`
--

INSERT INTO `sk_govt_holy_day_calender` (`date_id`, `year`, `date`, `cause`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2020, '2020-11-24', 'Chuti ', '2020-11-24', '2020-11-24', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `sk_loan_account`
--

CREATE TABLE `sk_loan_account` (
  `loan_id` int(11) NOT NULL,
  `loan_account` int(11) NOT NULL,
  `loanMemberId` int(11) NOT NULL,
  `disburse_date` date NOT NULL,
  `approved_loan_amount` int(11) NOT NULL,
  `interestPercent` int(11) NOT NULL,
  `deposit_type` int(11) NOT NULL,
  `ac_status` varchar(255) NOT NULL,
  `total_installment` int(11) NOT NULL,
  `installment_fee` int(11) NOT NULL,
  `sc_money` int(11) NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `check_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_check_img_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_check_img_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kothai` varchar(255) CHARACTER SET utf8 NOT NULL,
  `service_charge` int(11) NOT NULL,
  `kistir_poriman` int(11) NOT NULL,
  `grohon_date` date NOT NULL,
  `installment_start_date` date NOT NULL,
  `jamindar_name_one` varchar(255) CHARACTER SET utf8 NOT NULL,
  `relation_one` varchar(255) CHARACTER SET utf8 NOT NULL,
  `jamindar_name_two` varchar(255) CHARACTER SET utf8 NOT NULL,
  `relation_two` varchar(255) CHARACTER SET utf8 NOT NULL,
  `paid_bank_account_id` int(11) NOT NULL,
  `paid_check_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_loan_account`
--

INSERT INTO `sk_loan_account` (`loan_id`, `loan_account`, `loanMemberId`, `disburse_date`, `approved_loan_amount`, `interestPercent`, `deposit_type`, `ac_status`, `total_installment`, `installment_fee`, `sc_money`, `bank_name`, `check_no`, `bank_check_img_path`, `bank_check_img_name`, `kothai`, `service_charge`, `kistir_poriman`, `grohon_date`, `installment_start_date`, `jamindar_name_one`, `relation_one`, `jamindar_name_two`, `relation_two`, `paid_bank_account_id`, `paid_check_no`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 0, '2020-11-10', 50000, 10, 1, 'running', 10, 500, 5000, 'BR852365', '25369858', '', '', 'Fifty Thousands tk only', 100, 50000, '2020-12-16', '2020-11-17', 'Minar', 'Brother', 'Shohrab', 'Brother', 0, '25365897', '2020-11-24', '2020-11-24', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `sk_loan_collection`
--

CREATE TABLE `sk_loan_collection` (
  `id` int(11) NOT NULL,
  `acc_id` varchar(255) DEFAULT NULL,
  `today` varchar(255) DEFAULT NULL,
  `installment_date` varchar(255) DEFAULT NULL,
  `per_installment_fee` float DEFAULT NULL,
  `per_installment_fine` float NOT NULL,
  `soncoy` float DEFAULT NULL,
  `sc_profit` float NOT NULL,
  `sc_cash_out` float NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_loan_member`
--

CREATE TABLE `sk_loan_member` (
  `loan_member_id` int(11) NOT NULL,
  `field_officer` int(11) NOT NULL,
  `member_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `pesha` varchar(255) NOT NULL,
  `nid_no` bigint(20) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `pa_gram` varchar(255) NOT NULL,
  `pa_dak` varchar(255) NOT NULL,
  `pa_upojela` varchar(255) NOT NULL,
  `pa_jela` varchar(255) NOT NULL,
  `pra_gram` varchar(255) NOT NULL,
  `pra_dak` varchar(255) NOT NULL,
  `pra_upojela` varchar(255) NOT NULL,
  `pra_jela` varchar(255) NOT NULL,
  `bank_check_img_path` varchar(255) NOT NULL,
  `bank_check_img_name` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sk_voucher`
--

CREATE TABLE `sk_voucher` (
  `voucher_id` int(11) NOT NULL,
  `paid_to` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `account_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `check_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `voucher_category_id` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `memo_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `voucher_money` float NOT NULL,
  `voucher_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `details` varchar(255) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email_address` varchar(255) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `user_details` text NOT NULL,
  `contact_address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `img_path`, `img_name`, `admin_type`, `user_details`, `contact_address`, `mobile`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(17, 'RAKIB', 'sarbik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin_img/101556218_349793059321572_5345772276652441600_n.png', '101556218_349793059321572_5345772276652441600_n.png', 'super_admin', '', '', '', '2019-01-04', '2020-06-24', 17, 17),
(23, 'Monir Hossain', 'monir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin_img/20190209_135945.jpg', '20190209_135945.jpg', '', '', 'Narayanganj', '01948283811', '0000-00-00', '2020-11-24', 0, 0),
(24, 'Shohrab', 'shohrab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin_img/41jVgPb81aL__SX342_QL70_ML2_.jpg', '41jVgPb81aL__SX342_QL70_ML2_.jpg', 'admin', '', 'Chandpur', '', '2020-11-24', '2020-11-24', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset_category`
--

CREATE TABLE `tbl_asset_category` (
  `asset_category_id` int(11) NOT NULL,
  `asset_category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `asset_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(255) CHARACTER SET utf8 NOT NULL,
  `shortName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department`, `shortName`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'MD RAKIB ', '', '2020-06-27', '2020-06-27', 17, 17),
(2, 'MD FARUQ', 'HASSAN', '2020-06-27', '2020-06-27', 17, 17),
(3, 'MD RUKMAN ', 'SHEIKH', '2020-06-27', '2020-06-27', 17, 17),
(4, 'MD TAMIM ', 'SHEK', '2020-06-27', '2020-06-27', 17, 17),
(5, 'JONI ', 'ADHIKARI', '2020-06-27', '2020-06-27', 17, 17),
(6, 'MD CHUNNU', 'MATUBBAR', '2020-06-27', '2020-06-27', 17, 17),
(7, 'MD ALAMIN', 'MULLA', '2020-06-27', '2020-06-27', 17, 17),
(8, 'MD MAMUN ', 'GAZI', '2020-06-27', '2020-06-27', 17, 17),
(9, 'MST RABIYA', 'AKTHER', '2020-06-27', '2020-06-27', 17, 17),
(10, 'YNAET', 'FHOKIR', '2020-06-27', '2020-06-27', 17, 17),
(11, 'MONOARA', 'BEGUM', '2020-06-27', '2020-06-27', 17, 17),
(12, 'ALAUDDIN', 'SHIKDER', '2020-06-27', '2020-06-27', 17, 17),
(13, 'SUMON', 'TALUKDER', '2020-06-27', '2020-06-27', 17, 17),
(14, 'MD SAGOR  ', 'KHAN', '2020-06-27', '2020-06-27', 17, 17),
(15, 'KAMAL', 'MOLLA', '2020-06-27', '2020-06-27', 17, 17),
(16, 'MD AZAD', 'SHEIKH', '2020-06-27', '2020-06-27', 17, 17),
(17, 'MD SHORIF', 'KAZI', '2020-06-27', '2020-06-27', 17, 17),
(18, 'RABBI', 'SHEIKH', '2020-06-27', '2020-06-27', 17, 17),
(19, 'RINA ', 'BEGUM', '2020-06-27', '2020-06-27', 17, 17),
(20, 'MST.SUBORNA', 'AKTHER', '2020-06-27', '2020-06-27', 17, 17),
(21, 'HASINA', 'BEGUM', '2020-06-27', '2020-06-27', 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `departmentId`, `designation`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 4, 'MD RAKIB ', '2020-06-28', '2020-06-28', 17, 17),
(2, 5, 'shohrab', '2020-11-24', '2020-11-24', 23, 23),
(3, 2, 'Minar', '2020-11-24', '2020-11-24', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `emp_type` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_designation` varchar(255) NOT NULL,
  `emp_mobile` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_picture_path` varchar(255) NOT NULL,
  `emp_picture_name` varchar(255) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_details` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_voucher`
--

CREATE TABLE `tbl_salary_voucher` (
  `svoucher_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `svoucher_date` date NOT NULL,
  `smemo_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `svoucher_money` int(11) NOT NULL,
  `svoucher_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sdetails` varchar(255) CHARACTER SET utf8 NOT NULL,
  `spicture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher_category`
--

CREATE TABLE `tbl_voucher_category` (
  `voucher_cat_id` int(11) NOT NULL,
  `voucher_category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `voucher_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `sk_asset`
--
ALTER TABLE `sk_asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `sk_bank`
--
ALTER TABLE `sk_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `sk_bank_account`
--
ALTER TABLE `sk_bank_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `sk_depositor_account_open`
--
ALTER TABLE `sk_depositor_account_open`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `sk_depositor_collection_by_account_open`
--
ALTER TABLE `sk_depositor_collection_by_account_open`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `sk_dipositor_member`
--
ALTER TABLE `sk_dipositor_member`
  ADD PRIMARY KEY (`depositor_id`);

--
-- Indexes for table `sk_govt_holy_day_calender`
--
ALTER TABLE `sk_govt_holy_day_calender`
  ADD PRIMARY KEY (`date_id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- Indexes for table `sk_loan_account`
--
ALTER TABLE `sk_loan_account`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `sk_loan_collection`
--
ALTER TABLE `sk_loan_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sk_loan_member`
--
ALTER TABLE `sk_loan_member`
  ADD PRIMARY KEY (`loan_member_id`);

--
-- Indexes for table `sk_voucher`
--
ALTER TABLE `sk_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email_address` (`admin_email_address`);

--
-- Indexes for table `tbl_asset_category`
--
ALTER TABLE `tbl_asset_category`
  ADD PRIMARY KEY (`asset_category_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tbl_salary_voucher`
--
ALTER TABLE `tbl_salary_voucher`
  ADD PRIMARY KEY (`svoucher_id`);

--
-- Indexes for table `tbl_voucher_category`
--
ALTER TABLE `tbl_voucher_category`
  ADD PRIMARY KEY (`voucher_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_asset`
--
ALTER TABLE `sk_asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_bank`
--
ALTER TABLE `sk_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_bank_account`
--
ALTER TABLE `sk_bank_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_depositor_account_open`
--
ALTER TABLE `sk_depositor_account_open`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sk_depositor_collection_by_account_open`
--
ALTER TABLE `sk_depositor_collection_by_account_open`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sk_dipositor_member`
--
ALTER TABLE `sk_dipositor_member`
  MODIFY `depositor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sk_govt_holy_day_calender`
--
ALTER TABLE `sk_govt_holy_day_calender`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sk_loan_account`
--
ALTER TABLE `sk_loan_account`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sk_loan_collection`
--
ALTER TABLE `sk_loan_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_loan_member`
--
ALTER TABLE `sk_loan_member`
  MODIFY `loan_member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_voucher`
--
ALTER TABLE `sk_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_asset_category`
--
ALTER TABLE `tbl_asset_category`
  MODIFY `asset_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salary_voucher`
--
ALTER TABLE `tbl_salary_voucher`
  MODIFY `svoucher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_voucher_category`
--
ALTER TABLE `tbl_voucher_category`
  MODIFY `voucher_cat_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
