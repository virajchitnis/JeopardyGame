CREATE TABLE `QBanks` (
  `name` text NOT NULL,
  `author` text NOT NULL,
  `json` text NOT NULL,
  `json_hash` varchar(32) NOT NULL,
  PRIMARY KEY (`json_hash`),
  UNIQUE KEY `json_hash_UNIQUE` (`json_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
