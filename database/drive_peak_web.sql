-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2024 at 03:19 PM
-- Server version: 8.0.35
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drive_peak_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `company_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nic` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `company_id`, `name`, `nic`, `email`, `password`) VALUES
('1', '123', 'shamal', '20093278949', 'shamal@gmail.com', '123@SA');

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact_no`
--

CREATE TABLE `admin_contact_no` (
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_contact_no`
--

INSERT INTO `admin_contact_no` (`admin_id`, `contact_no`) VALUES
('1', '775956803');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `company_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nic` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`company_id`, `admin_id`, `agent_id`, `name`, `nic`, `email`, `password`) VALUES
('123', '1', '1', 'pavan', '200497783267', 'pavan@gmail.com', '123@A'),
('123', '1', '2', 'Saman', '200045893267', 'saman@gmail.com', '234@A'),
('123', '1', '3', 'Vihan', '200132125680', 'vihan@gmail.com', '746@A'),
('123', '1', '4', 'Amal', '200245789356', 'amal@gmail.com', ' 771@A'),
('123', '1', '5', 'Praveen', '200066896732', 'praveen@gmail.com', '342@A'),
('123', '1', '6', 'Dinesh', '200156789043', 'dinesh@gmail.com', '303@A');

-- --------------------------------------------------------

--
-- Table structure for table `agent_contact_no`
--

CREATE TABLE `agent_contact_no` (
  `agent_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent_contact_no`
--

INSERT INTO `agent_contact_no` (`agent_id`, `contact_no`) VALUES
('1', '705678902'),
('2', '769008765'),
('3', '773426755'),
('4', '706763080'),
('5', '752215577'),
('6', '779044321');

-- --------------------------------------------------------

--
-- Table structure for table `chief_engineer`
--

CREATE TABLE `chief_engineer` (
  `admin_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `engineer_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chief_engineer`
--

INSERT INTO `chief_engineer` (`admin_id`, `engineer_id`, `nic`, `name`, `email`, `password`) VALUES
('1', '1', '200331810134', 'kumal sandaru', 'kumalsandaru@gmail.com', 'kumal123');

-- --------------------------------------------------------

--
-- Table structure for table `chief_engineer_contact_no`
--

CREATE TABLE `chief_engineer_contact_no` (
  `engineer_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chief_engineer_contact_no`
--

INSERT INTO `chief_engineer_contact_no` (`engineer_id`, `contact_no`) VALUES
('1', 717860025);

-- --------------------------------------------------------

--
-- Table structure for table `chief_engineer_my_profile`
--

CREATE TABLE `chief_engineer_my_profile` (
  `engineer_id` int NOT NULL,
  `nic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chief_engineer_my_profile`
--

INSERT INTO `chief_engineer_my_profile` (`engineer_id`, `nic`, `name`, `email`, `password`) VALUES
(2, '13w', 'qwe', '12@4', '2'),
(3, '123456', 'Raminda Dulmin', 'ramindarulzz@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `manager_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `claim_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`manager_id`, `vehicle_id`, `customer_id`, `claim_id`, `status`, `amount`) VALUES
('1', 'CAD22', '1', '1', 'reject', 25000),
('1', 'CBG41', '1', '2', 'reject', 25000),
('1', 'CNJ85', '1', '3', 'approve', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `claim_intimation`
--

CREATE TABLE `claim_intimation` (
  `claim_intimation_id` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `engineer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `insured_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_no` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_model` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_category` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` int NOT NULL,
  `chassi_number` char(15) COLLATE utf8mb4_general_ci NOT NULL,
  `driver_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date DEFAULT NULL,
  `place` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_cindition` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claim_intimation`
--

INSERT INTO `claim_intimation` (`claim_intimation_id`, `engineer_id`, `insured_name`, `vehicle_no`, `vehicle_model`, `vehicle_category`, `phone_number`, `chassi_number`, `driver_name`, `date`, `place`, `description`, `vehicle_cindition`) VALUES
('9992', '1', 'kumal', 'cae6743', 'bmw', 'car', 71678256, 'me2373733', 'ashan', '0000-00-00', 'colombo', 'bhbsgdhjs', 'hbsdsn');

-- --------------------------------------------------------

--
-- Table structure for table `claim_manager`
--

CREATE TABLE `claim_manager` (
  `admin_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `manager_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `engineer_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claim_manager`
--

INSERT INTO `claim_manager` (`admin_id`, `manager_id`, `engineer_id`, `nic`, `name`, `email`, `password`) VALUES
('1', '1', '1', '200211603754', 'Ashan Jayakody', 'ashanjay@gmail.com', 'ashan123');

-- --------------------------------------------------------

--
-- Table structure for table `claim_manager_contact_no`
--

CREATE TABLE `claim_manager_contact_no` (
  `manager_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claim_manager_contact_no`
--

INSERT INTO `claim_manager_contact_no` (`manager_id`, `contact_no`) VALUES
('1', 773565874);

-- --------------------------------------------------------

--
-- Table structure for table `csr`
--

CREATE TABLE `csr` (
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `csr_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nic` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csr`
--

INSERT INTO `csr` (`admin_id`, `csr_id`, `name`, `nic`, `email`, `password`) VALUES
('1', '1', 'Olivia', '200351128106', 'hafsarifai01@gmail.com', 'ot7'),
('1', '2', 'Priya', '258745123678', 'priya@gmail.com', 'abcd'),
('1', '3', 'Rohan', '203648751295', 'rohan@gmail.com', 'lmao'),
('1', '4', 'Varun', '200078962513', 'varun@gmail.com', 'rofl'),
('1', '5', 'Akash', '199978256341', 'akash@gmail.com', 'idk');

-- --------------------------------------------------------

--
-- Table structure for table `csr_contact_no`
--

CREATE TABLE `csr_contact_no` (
  `csr_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csr_contact_no`
--

INSERT INTO `csr_contact_no` (`csr_id`, `contact_no`) VALUES
('1', '754689510'),
('2', '777804621'),
('3', '777412368'),
('4', '777871230'),
('5', '757862543');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `home_no` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `street` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `admin_id`, `agent_id`, `nic`, `email`, `password`, `home_no`, `street`, `city`) VALUES
('1', 'kamal', 'perera', '1', '1', '200274903349 ', 'dishani@gmail.com', '123@R', '437/12', 'kottawa', 'pannipitiy'),
('2', 'Rusith', 'Jayakody', '1', '2', '200100895621 ', 'rusith@gmail.com', '924@R', '502/B', 'Kottawa', 'Pannipitiy'),
('3', 'Dinuka', 'Perera', '1', '1', '200290102030', 'dinuka@gmail.com', '845@R', '31/A', 'Malabe', 'Athurugiri'),
('4', 'Asanda', 'Guruge', '1', '3', '200080542190', 'asanda@gmail.com', '519@R', '45/2', 'Kirulapone', 'Colombo'),
('5', 'Wasantha', 'Wijesundar', '1', '4', '200264993044 ', 'wasantha@gmail.com', '745@R', '89/2', 'Wijerama', 'Gangodawil'),
('6', 'Awishka', 'Karunarath', '1', '6', '200100609987 ', 'awishka@gmail.com', '348@R', '12/A', 'Rajagiriya', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact_no`
--

CREATE TABLE `customer_contact_no` (
  `customer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_contact_no`
--

INSERT INTO `customer_contact_no` (`customer_id`, `contact_no`) VALUES
('1', '776678844'),
('2', '761112345'),
('3', '770905477'),
('4', '708904465'),
('5', '759097734'),
('6', '765577884');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `customer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `csr_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `inquiry_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `inquiry` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_comapanay_contact_no`
--

CREATE TABLE `insurance_comapanay_contact_no` (
  `company_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_comapanay_contact_no`
--

INSERT INTO `insurance_comapanay_contact_no` (`company_id`, `contact_no`) VALUES
('123', '1176534223');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_company`
--

CREATE TABLE `insurance_company` (
  `company_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_company`
--

INSERT INTO `insurance_company` (`company_id`, `name`, `type`, `email`, `address`) VALUES
('123', 'Drive Peak', 'Vehicle Insurance', 'dishani@gmail.com', '123/4,colombo');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `method` varchar(7) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`admin_id`, `customer_id`, `payment_id`, `amount`, `payment_date`, `method`) VALUES
('1', '1', '1', 250000, '0000-00-00', 'online'),
('1', '2', '2', 3000000, '0000-00-00', 'online'),
('1', '3', '3', 245668, '0000-00-00', 'online'),
('1', '4', '4', 1000000, '0000-00-00', 'online'),
('1', '5', '6', 120000, '0000-00-00', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `company_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `policy_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `coverage_type` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `admin_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `report_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `report_date` date DEFAULT NULL,
  `report_type` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`admin_id`, `report_id`, `report_date`, `report_type`) VALUES
('1', '1', '0000-00-00', '0000-00-00'),
('1', '2', '0000-00-00', '0000-00-00'),
('1', '3', '0000-00-00', '0000-00-00'),
('1', '4', '0000-00-00', '0000-00-00'),
('1', '5', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `customer_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`customer_id`, `vehicle_id`, `model`, `year`) VALUES
('1', 'CAD22', 'Toyota Camry', '0000-00-00'),
('2', 'CBG41', 'Honda Civic', '0000-00-00'),
('3', 'CNJ85', 'Suzuki Alto', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `admin_contact_no`
--
ALTER TABLE `admin_contact_no`
  ADD PRIMARY KEY (`admin_id`,`contact_no`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `agent_contact_no`
--
ALTER TABLE `agent_contact_no`
  ADD PRIMARY KEY (`agent_id`,`contact_no`);

--
-- Indexes for table `chief_engineer`
--
ALTER TABLE `chief_engineer`
  ADD PRIMARY KEY (`engineer_id`),
  ADD KEY `engineer_FK_1` (`admin_id`);

--
-- Indexes for table `chief_engineer_contact_no`
--
ALTER TABLE `chief_engineer_contact_no`
  ADD PRIMARY KEY (`engineer_id`,`contact_no`);

--
-- Indexes for table `chief_engineer_my_profile`
--
ALTER TABLE `chief_engineer_my_profile`
  ADD PRIMARY KEY (`engineer_id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `claim_intimation`
--
ALTER TABLE `claim_intimation`
  ADD PRIMARY KEY (`claim_intimation_id`),
  ADD KEY `engineer_id` (`engineer_id`);

--
-- Indexes for table `claim_manager`
--
ALTER TABLE `claim_manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `manager_FK1` (`admin_id`),
  ADD KEY `manager_FK2` (`engineer_id`);

--
-- Indexes for table `claim_manager_contact_no`
--
ALTER TABLE `claim_manager_contact_no`
  ADD PRIMARY KEY (`manager_id`,`contact_no`);

--
-- Indexes for table `csr`
--
ALTER TABLE `csr`
  ADD PRIMARY KEY (`csr_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `csr_contact_no`
--
ALTER TABLE `csr_contact_no`
  ADD PRIMARY KEY (`csr_id`,`contact_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `customer_contact_no`
--
ALTER TABLE `customer_contact_no`
  ADD PRIMARY KEY (`contact_no`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `csr_id` (`csr_id`);

--
-- Indexes for table `insurance_comapanay_contact_no`
--
ALTER TABLE `insurance_comapanay_contact_no`
  ADD PRIMARY KEY (`company_id`,`contact_no`);

--
-- Indexes for table `insurance_company`
--
ALTER TABLE `insurance_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `insurance_company` (`company_id`);

--
-- Constraints for table `admin_contact_no`
--
ALTER TABLE `admin_contact_no`
  ADD CONSTRAINT `admin_contact_no_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `insurance_company` (`company_id`);

--
-- Constraints for table `agent_contact_no`
--
ALTER TABLE `agent_contact_no`
  ADD CONSTRAINT `agent_contact_no_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`agent_id`);

--
-- Constraints for table `chief_engineer`
--
ALTER TABLE `chief_engineer`
  ADD CONSTRAINT `engineer_FK_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `chief_engineer_contact_no`
--
ALTER TABLE `chief_engineer_contact_no`
  ADD CONSTRAINT `engineer_contact_FK` FOREIGN KEY (`engineer_id`) REFERENCES `chief_engineer` (`engineer_id`);

--
-- Constraints for table `claim`
--
ALTER TABLE `claim`
  ADD CONSTRAINT `claim_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`),
  ADD CONSTRAINT `claim_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `claim_manager` (`manager_id`),
  ADD CONSTRAINT `claim_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `claim_intimation`
--
ALTER TABLE `claim_intimation`
  ADD CONSTRAINT `claim_intimation_ibfk_1` FOREIGN KEY (`engineer_id`) REFERENCES `chief_engineer` (`engineer_id`);

--
-- Constraints for table `claim_manager`
--
ALTER TABLE `claim_manager`
  ADD CONSTRAINT `manager_FK1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `manager_FK2` FOREIGN KEY (`engineer_id`) REFERENCES `chief_engineer` (`engineer_id`);

--
-- Constraints for table `claim_manager_contact_no`
--
ALTER TABLE `claim_manager_contact_no`
  ADD CONSTRAINT `manager_contact_FK` FOREIGN KEY (`manager_id`) REFERENCES `claim_manager` (`manager_id`);

--
-- Constraints for table `csr`
--
ALTER TABLE `csr`
  ADD CONSTRAINT `csr_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `csr_contact_no`
--
ALTER TABLE `csr_contact_no`
  ADD CONSTRAINT `csr_contact_no_ibfk_1` FOREIGN KEY (`csr_id`) REFERENCES `csr` (`csr_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`agent_id`);

--
-- Constraints for table `customer_contact_no`
--
ALTER TABLE `customer_contact_no`
  ADD CONSTRAINT `customer_contact_no_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `inquiry_ibfk_2` FOREIGN KEY (`csr_id`) REFERENCES `csr` (`csr_id`);

--
-- Constraints for table `insurance_comapanay_contact_no`
--
ALTER TABLE `insurance_comapanay_contact_no`
  ADD CONSTRAINT `insurance_comapanay_contact_no_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `insurance_company` (`company_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `insurance_company` (`company_id`),
  ADD CONSTRAINT `policy_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
