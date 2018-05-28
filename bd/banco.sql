-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 10:47 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartera`
--

CREATE TABLE `cartera` (
  `idcartera` int(6) NOT NULL,
  `nombrecartera` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartera`
--

INSERT INTO `cartera` (`idcartera`, `nombrecartera`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `codigo` int(6) NOT NULL,
  `monto` int(9) NOT NULL,
  `idestado` int(3) NOT NULL,
  `rutcliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`codigo`, `monto`, `idestado`, `rutcliente`) VALUES
(0, 0, 1, '19277273-7'),
(1, 100000, 2, '19277273-7'),
(2, 252000, 1, '19277273-7'),
(3, 100000, 1, '19277273-7'),
(4, 100000, 2, '19277273-7'),
(65, 6545625, 1, '19277273-7'),
(655, 6545642, 1, '19277273-7');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `rutcliente` varchar(10) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(90) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `idcartera` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`rutcliente`, `nombres`, `apellidos`, `email`, `telefono`, `idcartera`) VALUES
('19277273-7', 'andrea soledad', 'herrera zuÃ±iga', 'pindi_12@hotmail.com', '525897459', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `idestado` int(3) NOT NULL,
  `nombreestado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`idestado`, `nombreestado`) VALUES
(1, 'deuda'),
(2, 'pagado');

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `numhistorial` int(6) NOT NULL,
  `numpago` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `numpago` int(6) NOT NULL,
  `fechadepago` date NOT NULL,
  `rutcliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) NOT NULL,
  `nombreusuario` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `idcartera` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombreusuario`, `password`, `nombre`, `apellido`, `idcartera`) VALUES
(1, 'admin', 'admin', 'JosÃ©', 'rodriguez', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartera`
--
ALTER TABLE `cartera`
  ADD PRIMARY KEY (`idcartera`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cheque_estado` (`idestado`),
  ADD KEY `cheque_cliente` (`rutcliente`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rutcliente`),
  ADD KEY `cliente_cartera` (`idcartera`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`numhistorial`),
  ADD KEY `historial_pago` (`numpago`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`numpago`),
  ADD KEY `pago_cliente` (`rutcliente`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `usuario_cartera` (`idcartera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartera`
--
ALTER TABLE `cartera`
  MODIFY `idcartera` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `numhistorial` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `numpago` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `cheque_cliente` FOREIGN KEY (`rutcliente`) REFERENCES `cliente` (`rutcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cheque_estado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_cartera` FOREIGN KEY (`idcartera`) REFERENCES `cartera` (`idcartera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_pago` FOREIGN KEY (`numpago`) REFERENCES `pago` (`numpago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_cliente` FOREIGN KEY (`rutcliente`) REFERENCES `cliente` (`rutcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_cartera` FOREIGN KEY (`idcartera`) REFERENCES `cartera` (`idcartera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
