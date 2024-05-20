-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 06:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `Customer_Id` int(10) NOT NULL,
  `Customer_Name` varchar(100) DEFAULT NULL,
  `Customer_Type` varchar(50) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `License_No` varchar(50) DEFAULT NULL,
  `Business_Attn` varchar(50) DEFAULT NULL,
  `Business_Number` varchar(50) DEFAULT NULL,
  `Business_Address` varchar(150) DEFAULT NULL,
  `Business_Email` varchar(50) DEFAULT NULL,
  `Billing_Address` varchar(150) DEFAULT NULL,
  `Financial_Attn` varchar(100) DEFAULT NULL,
  `Financial_Number` varchar(50) DEFAULT NULL,
  `Financial_Email` varchar(50) DEFAULT NULL,
  `VAT_REG_No` varchar(50) DEFAULT NULL,
  `Account_Manager_Name` varchar(50) DEFAULT NULL,
  `Account_Manager_Number` varchar(50) DEFAULT NULL,
  `Account_Manager_Email` varchar(50) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Create_By` varchar(50) DEFAULT NULL,
  `Create_Date` varchar(50) DEFAULT NULL,
  `Update_By` varchar(50) DEFAULT NULL,
  `Update_Date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`Customer_Id`, `Customer_Name`, `Customer_Type`, `Address`, `License_No`, `Business_Attn`, `Business_Number`, `Business_Address`, `Business_Email`, `Billing_Address`, `Financial_Attn`, `Financial_Number`, `Financial_Email`, `VAT_REG_No`, `Account_Manager_Name`, `Account_Manager_Number`, `Account_Manager_Email`, `Status`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`) VALUES
(1, 'AAA', '221', '22', '1231313', '33', '44', '55', '66', '77', '888', '99', '000', '121', '123', '321', '33311', 'Active', '4', '02/04/2024-02:02:16pm', NULL, NULL),
(2, 'CUSTOMER NAME', 'CUSTOMER TYPE', 'CUSTOMER  ADDRESS', 'LICENSE_NO', 'BUSINESS ATTN.', 'BUSINESS CONTACT NUMBER', 'BUSINESS ADDRESS', 'BUSINESS EMAIL ADDRESS', 'BILLING ADDRESS', 'FINANCIAL ATTN.', 'FINANCIAL  CONTACT NUMBER', 'FINANCIAL EMAIL ADDRESS', 'VAT REG NO', 'ACCOUNT MANAGER NAME', 'ACCOUNT MANAGER NUMBER', 'ACCOUNT MANAGER EMAIL', 'Active', NULL, '02/04/2024-11:43:21pm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_info_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `create_info` varchar(30) NOT NULL,
  `update_info` varchar(30) NOT NULL,
  `customer_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_info_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `create_info`, `update_info`, `customer_status`) VALUES
(1, '0', '147882236', '0', '0', '16', '0', 'Delete'),
(2, '0', '147882236', '0', '0', '16', '0', 'Delete'),
(3, 'customer 11', '2242433331', 'adsad@gmaoada1', 'adadas adada1', '16/09/2022 | 4', '31/03/2024-11:29:18pm | ', 'Delete'),
(4, 'Dhali Abir', '01684924439', 'dhaliabir@gmail.com', 'Mirpur,Dhaka', '19/09/2022 | 4', 'N', 'Active'),
(5, 'Pori', '016849233', 'pori@gmail.com', 'Dhaka', '24/09/2022-02:32:44am | 4', 'N', 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `service_info`
--

CREATE TABLE `service_info` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(80) NOT NULL,
  `service_unit` varchar(80) NOT NULL,
  `service_day_cost` varchar(80) NOT NULL,
  `service_rate` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_info` varchar(30) NOT NULL,
  `update_info` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_info`
--

INSERT INTO `service_info` (`service_id`, `service_name`, `service_unit`, `service_day_cost`, `service_rate`, `status`, `create_info`, `update_info`) VALUES
(1, 'Test 1', '30', '30', '4400', 'Delete', '31/03/2024-01:05:32pm|4', '01/04/2024-12:54:16am|'),
(2, 'Test3', '22', '222', '33', 'Delete', '31/03/2024-01:15:47pm|4', '31/03/2024-11:05:40pm|'),
(3, 'Test 2', '21', '324', '32234', 'Delete', '31/03/2024-01:21:10pm|4', '01/04/2024-12:54:19am|'),
(4, 'Test 2', '21', '324', '32234', 'Delete', '31/03/2024-01:21:10pm|4', '31/03/2024-01:23:18pm|4'),
(5, 'Hello', '111', '222', '3333', 'Delete', '31/03/2024-01:22:44pm|4', '01/04/2024-12:54:14am|'),
(6, 'aa', '33', 'adad', '123', 'Delete', '31/03/2024-11:06:28pm|', '01/04/2024-12:54:10am|'),
(7, 'Internet', '500', '5', '300', 'Active', '01/04/2024-12:55:12am|', 'A'),
(8, 'ITES 1', '500', '205', '25', 'Active', '01/04/2024-12:55:37am|', '02/04/2024-11:54:08pm|'),
(9, 'IPLC-Google', '1', '50', '40', 'Active', '02/04/2024-11:54:36pm|', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `UserType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Status`, `UserType`) VALUES
(1, 'Dhali', 'dhali@gmail.com', '1235822', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'Active', 'ADMIN'),
(2, 'Tset', 'adad@gmail.com', '1111', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'Active', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_info_id`);

--
-- Indexes for table `service_info`
--
ALTER TABLE `service_info`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `Customer_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_info`
--
ALTER TABLE `service_info`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
