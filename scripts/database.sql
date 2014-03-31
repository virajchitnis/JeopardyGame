CREATE TABLE `QBanks` (
  `name` varchar(100) NOT NULL,
  `author` varchar(45) NOT NULL,
  `json` text NOT NULL,
  `json_hash` varchar(32) NOT NULL,
  PRIMARY KEY (`json_hash`),
  UNIQUE KEY `json_hash_UNIQUE` (`json_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1