-- MySQL dump 10.13  Distrib 5.6.16, for osx10.7 (x86_64)
--
-- Host: localhost    Database: dev_jeopardy
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `QBanks`
--

DROP TABLE IF EXISTS `QBanks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QBanks` (
  `name` text NOT NULL,
  `author` text NOT NULL,
  `json` text NOT NULL,
  `json_hash` varchar(32) NOT NULL,
  PRIMARY KEY (`json_hash`),
  UNIQUE KEY `json_hash_UNIQUE` (`json_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QBanks`
--

LOCK TABLES `QBanks` WRITE;
/*!40000 ALTER TABLE `QBanks` DISABLE KEYS */;
INSERT INTO `QBanks` VALUES ('2229midreview2014','Claudia Pine-Simon','[{\"category\":\"BUS Protocols\",\"question\":\"This supports 127 devices and has a bandwidth of 4.8 gbps\",\"answer\":\"What is USB 3.0?\",\"weight\":\"1\"},{\"category\":\"BUS Protocols\",\"question\":\"This is a very high speed bus which can have several lanes and thus have variable bandwidth, depending on bus width.  Replaced AGP bus.\",\"answer\":\"What is PCIe (Peripheral Component Interconnect Express )?\",\"weight\":\"5\"},{\"category\":\"BUS Protocols\",\"question\":\"This protocol supports 63 devices and has a range from 100Mbps to 3.2 gbps\",\"answer\":\"What is firewire?\",\"weight\":\"10\"},{\"category\":\"BUS Protocols\",\"question\":\"This bus connects primary storage and the CPU.\",\"answer\":\"What is the Frontside bus (FSB)?\",\"weight\":\"15\"},{\"category\":\"BUS Protocols\",\"question\":\"The operating system checks this high speed area first when retrieving data/instruction for CPU.\",\"answer\":\"What is Cache?\",\"weight\":\"20\"},{\"category\":\"Hardware\",\"question\":\"A processor which uses a reduced instruction set and pipelining.\",\"answer\":\"What is a RISC processor?\",\"weight\":\"1\"},{\"category\":\"Hardware\",\"question\":\"A voltage which may signal abnormal behavior(trap or exception, completion, software requests or access request.\",\"answer\":\"What is an interrupt?\",\"weight\":\"5\"},{\"category\":\"Hardware\",\"question\":\"A ROM which is responsible for POST, updating CMOS and loading OS system files.\",\"answer\":\"What is the BIOS?\",\"weight\":\"10\"},{\"category\":\"Hardware\",\"question\":\"Synchronizes the internal workings of the computer using pulses.\",\"answer\":\"What is the System Clock?\",\"weight\":\"15\"},{\"category\":\"Hardware\",\"question\":\"This register decodes the instruction and address.\",\"answer\":\"What is the MAR?\",\"weight\":\"20\"},{\"category\":\"Software\",\"question\":\"This type of software is responsible for the general operation of a computer.\",\"answer\":\"What is system software?\",\"weight\":\"1\"},{\"category\":\"Software\",\"question\":\"This type is the fastest memory access and is  part of the processor.\",\"answer\":\"What is Level 1 Cache?\",\"weight\":\"5\"},{\"category\":\"Software\",\"question\":\"A part in memory associated within the program. When an interrupt is received, all the variables, registers including the PC register,  It is also referred to as a stack area.\",\"answer\":\"What is a PCB?\",\"weight\":\"10\"},{\"category\":\"Software\",\"question\":\"Refers to OS system files which get loaded into primary storage upon boot.\",\"answer\":\"What is the kernel?\",\"weight\":\"15\"},{\"category\":\"Software\",\"question\":\"Name three basic Windows kernel system files\",\"answer\":\"What are command.com, msdos.sys and io.sys?\",\"weight\":\"20\"},{\"category\":\"Computer Genius\",\"question\":\"A two way register in the CPU responsible for reading or  writing to a memory cell.\",\"answer\":\"What is the MDR?\",\"weight\":\"1\"},{\"category\":\"Computer Genius\",\"question\":\"The ability to process more than one instruction per clock cycle.\",\"answer\":\"What is superscalar?\",\"weight\":\"5\"},{\"category\":\"Computer Genius\",\"question\":\"All dual core processors PC\'s have at least 0 -31of these voltage lines which connect to I/O devices.\",\"answer\":\"What are interrupts?\",\"weight\":\"10\"},{\"category\":\"Computer Genius\",\"question\":\"I/O memory data transfer occurs in blocks using this channel which bypasses the CPU. Ex.Hard drives\",\"answer\":\"What is DMA?\",\"weight\":\"15\"},{\"category\":\"Computer Genius\",\"question\":\"This interface connects various buses in a PC.\",\"answer\":\"What are bus bridges?\",\"weight\":\"20\"},{\"category\":\"CPU\",\"question\":\"The component of the CPU that fetches and decodes instructions.\",\"answer\":\"What is the control unit?\",\"weight\":\"1\"},{\"category\":\"CPU\",\"question\":\"The CPU component that is responsible for execution.\",\"answer\":\"What is the ALU?\",\"weight\":\"5\"},{\"category\":\"CPU\",\"question\":\"Creates a “1” bit on an optical disc.\",\"answer\":\"What is a LAN?\",\"weight\":\"10\"},{\"category\":\"CPU\",\"question\":\"An abnormal hardware interrupt\",\"answer\":\"What is a trap or exception?\",\"weight\":\"15\"},{\"category\":\"CPU\",\"question\":\"A newer bus protocol designed to replace the older PCI and AGP standards.  It is actually a serial based technology.\",\"answer\":\"What is PCIe PCI express?\",\"weight\":\"20\"},{\"category\":\"Memory\",\"question\":\"Refers to Dynamic RAM\",\"answer\":\"What is primary storage?\",\"weight\":\"1\"},{\"category\":\"Memory\",\"question\":\"This type of memory has more transistors and does not have to be refreshed.\",\"answer\":\"What is static ram?\",\"weight\":\"5\"},{\"category\":\"Memory\",\"question\":\"This type of memory accesses twice as much during a machine cycle.\",\"answer\":\"What is DDR\",\"weight\":\"10\"},{\"category\":\"Memory\",\"question\":\"This refers to memory which uses space on a hard drive to expand \\\"primary storage\\\"\",\"answer\":\"What is virtual memory?\",\"weight\":\"15\"},{\"category\":\"Memory\",\"question\":\"This refers to the excessive accesses to a hard drive by the OS to swap pages.\",\"answer\":\"What is thrashing?\",\"weight\":\"20\"}]','80327df300475cd4bd127c3cd5fc05ab');
/*!40000 ALTER TABLE `QBanks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-27 17:45:24
