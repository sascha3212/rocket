SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `absentie`;
CREATE TABLE `absentie` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `notitie` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `absentietype_absentietype_id` int(11) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_absentie_users1_idx` (`users_id`),
  KEY `fk_absentie_absentietype1_idx` (`absentietype_absentietype_id`),
  CONSTRAINT `fk_absentie_absentietype1` FOREIGN KEY (`absentietype_absentietype_id`) REFERENCES `absentietype` (`absentietype_id`),
  CONSTRAINT `fk_absentie_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `absentietype`;
CREATE TABLE `absentietype` (
  `absentietype_id` int(11) NOT NULL AUTO_INCREMENT,
  `absentietype` varchar(45) NOT NULL,
  PRIMARY KEY (`absentietype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `absentietype` (`absentietype_id`, `absentietype`) VALUES
(1,	'onbetaald'),
(2,	'snipperdag'),
(3,	'vakantie'),
(4,	'ziek');

DROP TABLE IF EXISTS `autorisatie`;
CREATE TABLE `autorisatie` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `notitie` varchar(45) DEFAULT NULL,
  `rol_rol_id` int(11) NOT NULL,
  `recht_recht_id` int(11) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_autorisatie_rol1_idx` (`rol_rol_id`),
  KEY `fk_autorisatie_recht1_idx` (`recht_recht_id`),
  CONSTRAINT `fk_autorisatie_recht1` FOREIGN KEY (`recht_recht_id`) REFERENCES `recht` (`recht_id`),
  CONSTRAINT `fk_autorisatie_rol1` FOREIGN KEY (`rol_rol_id`) REFERENCES `rol` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `betaling`;
CREATE TABLE `betaling` (
  `betaling_id` int(11) NOT NULL AUTO_INCREMENT,
  `bankrekening` varchar(45) DEFAULT NULL,
  `kas` int(1) DEFAULT '1',
  `bedrag` decimal(6,2) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) NOT NULL,
  `contract_contract_id` int(11) NOT NULL,
  PRIMARY KEY (`betaling_id`),
  KEY `fk_betaling_users1_idx` (`users_id`),
  KEY `fk_betaling_contract1_idx` (`contract_contract_id`),
  CONSTRAINT `fk_betaling_contract1` FOREIGN KEY (`contract_contract_id`) REFERENCES `contract` (`contract_id`),
  CONSTRAINT `fk_betaling_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `betaling` (`betaling_id`, `bankrekening`, `kas`, `bedrag`, `datum`, `users_id`, `contract_contract_id`) VALUES
(1,	'NL11RABO1234567',	1,	15.00,	'2016-11-01 13:15:13',	4,	1),
(2,	'NL12RABO1234567',	1,	35.00,	'2016-11-30 20:34:07',	4,	3),
(3,	'NL11RABO1234567',	1,	10.00,	'2016-12-12 09:52:34',	4,	3);

DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notitie` varchar(255) DEFAULT NULL,
  `lespakket_lespakket_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `instructeur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `fk_contract_lespakket1_idx` (`lespakket_lespakket_id`),
  KEY `user_id` (`users_id`),
  KEY `fk_contract_instructeur` (`instructeur_id`),
  CONSTRAINT `fk_contract_instructeur` FOREIGN KEY (`instructeur_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_contract_lespakket1` FOREIGN KEY (`lespakket_lespakket_id`) REFERENCES `lespakket` (`lespakket_id`),
  CONSTRAINT `fk_contract_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `contract` (`contract_id`, `datum`, `notitie`, `lespakket_lespakket_id`, `users_id`, `instructeur_id`) VALUES
(1,	'2016-10-30 23:00:00',	NULL,	1,	4,	7),
(3,	'2016-10-31 13:43:35',	NULL,	4,	4,	3);

DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) NOT NULL,
  `locatie` varchar(255) NOT NULL,
  `mailbericht_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_document_mailbericht_idx` (`mailbericht_id`),
  CONSTRAINT `fk_document_mailbericht` FOREIGN KEY (`mailbericht_id`) REFERENCES `mailbericht` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `feestdag`;
CREATE TABLE `feestdag` (
  `datum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `feestdag` varchar(45) NOT NULL,
  `notitie` text,
  PRIMARY KEY (`datum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `feestdag` (`datum`, `einddatum`, `feestdag`, `notitie`) VALUES
('2016-12-05',	'2016-12-06',	'Sinterklaas',	'');

DROP TABLE IF EXISTS `infobeheer`;
CREATE TABLE `infobeheer` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `rol_rol_id` int(11) NOT NULL,
  `informatie_informatie_id` int(11) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_infobeheer_rol1_idx` (`rol_rol_id`),
  KEY `fk_infobeheer_informatie1_idx` (`informatie_informatie_id`),
  CONSTRAINT `fk_infobeheer_informatie1` FOREIGN KEY (`informatie_informatie_id`) REFERENCES `informatie` (`informatie_id`),
  CONSTRAINT `fk_infobeheer_rol1` FOREIGN KEY (`rol_rol_id`) REFERENCES `rol` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `informatie`;
CREATE TABLE `informatie` (
  `informatie_id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(225) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `informatie` text NOT NULL,
  `nieuws` int(1) NOT NULL DEFAULT '0',
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  PRIMARY KEY (`informatie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `informatie` (`informatie_id`, `titel`, `image`, `informatie`, `nieuws`, `startdatum`, `einddatum`) VALUES
(1,	'De gestolen banden',	NULL,	'Op 1 Januari 2016 zijn er 20 autobanden gestolen, wie heeft dit gedaan?',	0,	'2016-01-01',	'2020-08-23'),
(2,	'Rijschool rocket gekozen tot de beste van Nederland',	NULL,	'Uit de test is gebleken dat Rocket Rijschool de beste rijschool van nederland is',	1,	'2016-11-04',	'2017-05-05');

DROP TABLE IF EXISTS `les`;
CREATE TABLE `les` (
  `les_id` int(11) NOT NULL,
  `lesdatum` date NOT NULL,
  `starttijd` time NOT NULL,
  `eindtijd` time NOT NULL,
  `lesverslag` text,
  `ophaaladres` varchar(255) DEFAULT NULL,
  `geannuleerd` int(4) NOT NULL,
  `instructeur` int(11) NOT NULL,
  `klant` int(11) NOT NULL,
  `lestype_lestype_id` int(11) NOT NULL,
  `voertuig_kenteken` varchar(12) NOT NULL,
  PRIMARY KEY (`les_id`),
  KEY `fk_les_users1_idx` (`instructeur`),
  KEY `fk_les_users2_idx` (`klant`),
  KEY `fk_les_lestype1_idx` (`lestype_lestype_id`),
  KEY `fk_les_voertuig1_idx` (`voertuig_kenteken`),
  CONSTRAINT `fk_les_lestype1` FOREIGN KEY (`lestype_lestype_id`) REFERENCES `lestype` (`lestype_id`),
  CONSTRAINT `fk_les_users1` FOREIGN KEY (`instructeur`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_les_users2` FOREIGN KEY (`klant`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_les_voertuig1` FOREIGN KEY (`voertuig_kenteken`) REFERENCES `voertuig` (`kenteken`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `lespakket`;
CREATE TABLE `lespakket` (
  `lespakket_id` int(11) NOT NULL AUTO_INCREMENT,
  `lespakket` varchar(45) NOT NULL,
  `lessenaantal` int(11) NOT NULL,
  `actie` int(11) DEFAULT NULL,
  `voertuigtype_voertuigtype_id` int(11) NOT NULL,
  PRIMARY KEY (`lespakket_id`),
  KEY `fk_lespakket_voertuigtype1_idx` (`voertuigtype_voertuigtype_id`),
  CONSTRAINT `fk_lespakket_voertuigtype1` FOREIGN KEY (`voertuigtype_voertuigtype_id`) REFERENCES `voertuigtype` (`voertuigtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `lespakket` (`lespakket_id`, `lespakket`, `lessenaantal`, `actie`, `voertuigtype_voertuigtype_id`) VALUES
(1,	'standaard',	20,	NULL,	1),
(2,	'buzz-off',	6,	NULL,	2),
(3,	'slip back2straight',	3,	NULL,	3),
(4,	'standaard',	20,	NULL,	3),
(5,	'truck in five',	14,	NULL,	4),
(14,	'Ijs rem test',	5,	10,	4),
(16,	'Brommer driften',	7,	20,	2);

DROP TABLE IF EXISTS `lesprijs`;
CREATE TABLE `lesprijs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `prijs` decimal(6,2) NOT NULL,
  `lespakket_lespakket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lesprijs_lespakket1_idx` (`lespakket_lespakket_id`),
  CONSTRAINT `fk_lesprijs_lespakket1` FOREIGN KEY (`lespakket_lespakket_id`) REFERENCES `lespakket` (`lespakket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `lesprijs` (`id`, `startdatum`, `einddatum`, `prijs`, `lespakket_lespakket_id`) VALUES
(1,	'2016-10-21',	'2017-11-26',	1200.00,	1),
(2,	'2016-10-22',	'2017-10-26',	192.00,	2),
(3,	'2016-10-23',	'2017-10-26',	107.10,	3),
(4,	'2016-10-24',	'2017-10-26',	800.00,	4),
(5,	'2016-10-25',	'2017-10-26',	1820.00,	5),
(6,	'2016-11-04',	'2020-08-23',	1000.00,	14),
(7,	'2016-11-04',	'2020-08-23',	340.00,	16);

DROP TABLE IF EXISTS `lestype`;
CREATE TABLE `lestype` (
  `lestype_id` int(11) NOT NULL AUTO_INCREMENT,
  `lestype` int(11) NOT NULL,
  `prijspercentage` varchar(45) NOT NULL,
  PRIMARY KEY (`lestype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `lesverichting`;
CREATE TABLE `lesverichting` (
  `rijhandeling_rijhandeling_id` int(11) NOT NULL,
  `les_les_id` int(11) NOT NULL,
  KEY `fk_lesverichting_rijhandeling1_idx` (`rijhandeling_rijhandeling_id`),
  KEY `fk_lesverichting_les1_idx` (`les_les_id`),
  CONSTRAINT `fk_lesverichting_les1` FOREIGN KEY (`les_les_id`) REFERENCES `les` (`les_id`),
  CONSTRAINT `fk_lesverichting_rijhandeling1` FOREIGN KEY (`rijhandeling_rijhandeling_id`) REFERENCES `rijhandeling` (`rijhandeling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `licentie`;
CREATE TABLE `licentie` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `voertuigtype_voertuigtype_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_licentie_voertuigtype1_idx` (`voertuigtype_voertuigtype_id`),
  KEY `fk_licentie_users1_idx` (`users_id`),
  CONSTRAINT `fk_licentie_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_licentie_voertuigtype1` FOREIGN KEY (`voertuigtype_voertuigtype_id`) REFERENCES `voertuigtype` (`voertuigtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `licentie` (`startdatum`, `einddatum`, `voertuigtype_voertuigtype_id`, `users_id`) VALUES
('2016-11-01',	NULL,	3,	3),
('2016-11-02',	NULL,	2,	7),
('2016-11-03',	'2018-04-18',	1,	3),
('2016-11-30',	NULL,	1,	7),
('2016-12-01',	'2020-12-12',	2,	3);

DROP TABLE IF EXISTS `mailbericht`;
CREATE TABLE `mailbericht` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verzendDatum` date NOT NULL,
  `onderwerp` varchar(255) NOT NULL,
  `mailbericht` text NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mailbericht_users1_idx` (`users_id`),
  CONSTRAINT `fk_mailbericht_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `mailontvangers`;
CREATE TABLE `mailontvangers` (
  `mailbericht_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`mailbericht_id`),
  KEY `fk_mailontvangers_users1_idx` (`users_id`),
  CONSTRAINT `fk_mailontvangers_mailbericht1` FOREIGN KEY (`mailbericht_id`) REFERENCES `mailbericht` (`id`),
  CONSTRAINT `fk_mailontvangers_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `onderdeel`;
CREATE TABLE `onderdeel` (
  `onderdeel_id` int(11) NOT NULL AUTO_INCREMENT,
  `onderdeel` varchar(45) NOT NULL,
  `omschrijving` text,
  `voertuigtype_voertuigtype_id` int(11) NOT NULL,
  PRIMARY KEY (`onderdeel_id`),
  KEY `fk_onderdeel_voertuigtype1_idx` (`voertuigtype_voertuigtype_id`),
  CONSTRAINT `fk_onderdeel_voertuigtype1` FOREIGN KEY (`voertuigtype_voertuigtype_id`) REFERENCES `voertuigtype` (`voertuigtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `onderdeelprijs`;
CREATE TABLE `onderdeelprijs` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `prijs` char(1) NOT NULL,
  `onderdeel_onderdeel_id` int(11) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_onderdeelprijs_onderdeel1_idx` (`onderdeel_onderdeel_id`),
  CONSTRAINT `fk_onderdeelprijs_onderdeel1` FOREIGN KEY (`onderdeel_onderdeel_id`) REFERENCES `onderdeel` (`onderdeel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `onderhoudsbeurt`;
CREATE TABLE `onderhoudsbeurt` (
  `beurtnummer` int(11) NOT NULL AUTO_INCREMENT,
  `startdatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `arbeidsloon` decimal(8,2) NOT NULL,
  `km-stand` int(11) NOT NULL,
  `voertuig_kenteken` varchar(12) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`beurtnummer`),
  KEY `fk_onderhoudsbeurt_voertuig1_idx` (`voertuig_kenteken`),
  KEY `fk_onderhoudsbeurt_users1_idx` (`users_id`),
  CONSTRAINT `fk_onderhoudsbeurt_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_onderhoudsbeurt_voertuig1` FOREIGN KEY (`voertuig_kenteken`) REFERENCES `voertuig` (`kenteken`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `recht`;
CREATE TABLE `recht` (
  `recht_id` int(11) NOT NULL AUTO_INCREMENT,
  `recht` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`recht_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `reparatiebon`;
CREATE TABLE `reparatiebon` (
  `aantal` int(11) DEFAULT NULL,
  `onderhoudsbeurt_beurtnummer` int(11) NOT NULL,
  `onderdeel_onderdeel_id` int(11) NOT NULL,
  KEY `fk_reparatiebon_onderhoudsbeurt1_idx` (`onderhoudsbeurt_beurtnummer`),
  KEY `fk_reparatiebon_onderdeel1_idx` (`onderdeel_onderdeel_id`),
  CONSTRAINT `fk_reparatiebon_onderdeel1` FOREIGN KEY (`onderdeel_onderdeel_id`) REFERENCES `onderdeel` (`onderdeel_id`),
  CONSTRAINT `fk_reparatiebon_onderhoudsbeurt1` FOREIGN KEY (`onderhoudsbeurt_beurtnummer`) REFERENCES `onderhoudsbeurt` (`beurtnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `rijhandeling`;
CREATE TABLE `rijhandeling` (
  `rijhandeling_id` int(11) NOT NULL AUTO_INCREMENT,
  `rijhandeling` varchar(255) NOT NULL,
  `voertuigtype_voertuigtype_id` int(11) NOT NULL,
  PRIMARY KEY (`rijhandeling_id`),
  KEY `fk_rijhandeling_voertuigtype1_idx` (`voertuigtype_voertuigtype_id`),
  CONSTRAINT `fk_rijhandeling_voertuigtype1` FOREIGN KEY (`voertuigtype_voertuigtype_id`) REFERENCES `voertuigtype` (`voertuigtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rol` (`rol_id`, `rol`) VALUES
(1,	'admin'),
(2,	'instructeur'),
(3,	'klant');

DROP TABLE IF EXISTS `roltoekenning`;
CREATE TABLE `roltoekenning` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `rol_rol_id` int(11) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_roltoekenning_users1_idx` (`users_id`),
  KEY `fk_roltoekenning_rol1_idx` (`rol_rol_id`),
  CONSTRAINT `roltoekenning_ibfk_4` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `roltoekenning_ibfk_5` FOREIGN KEY (`rol_rol_id`) REFERENCES `rol` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `roltoekenning` (`startdatum`, `einddatum`, `users_id`, `rol_rol_id`) VALUES
('2016-10-29',	NULL,	2,	1),
('2016-10-30',	NULL,	3,	2),
('2016-10-31',	NULL,	4,	3),
('2016-11-01',	NULL,	35,	3),
('2016-11-02',	NULL,	33,	3),
('2016-11-03',	NULL,	30,	3),
('2016-11-04',	NULL,	5,	3),
('2016-11-05',	NULL,	7,	2),
('2016-11-06',	NULL,	36,	3);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(45) DEFAULT NULL,
  `tussenvoegsel` varchar(10) DEFAULT NULL,
  `achternaam` varchar(45) DEFAULT NULL,
  `geboren` varchar(45) DEFAULT NULL,
  `geslacht` varchar(1) DEFAULT NULL,
  `adres` varchar(45) DEFAULT NULL,
  `huisnr` varchar(10) DEFAULT NULL,
  `postcode` varchar(15) DEFAULT NULL,
  `plaats` varchar(45) DEFAULT NULL,
  `telefoon` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `geboren`, `geslacht`, `adres`, `huisnr`, `postcode`, `plaats`, `telefoon`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2,	'Piet',	'',	'weetniet',	'27-02-1998',	'M',	'Zangvogelweg',	'140',	'1234 XD',	'Amersfoort',	'0612345678',	'Piet@rocket.cunt',	'piet',	'$2y$10$u6QeG5FJiGJZrwgpPrQj2eHvLz56huWnWPh7prwuPduNSPLU6T/Zq',	'bqQFtNeQdJcltimVjzXxEYdHECqLpAwX4COwSVwkK1i6Ct4AwE2ia4ewe1xe',	'2016-10-30 18:25:03',	'2016-11-08 10:50:06'),
(3,	'Karel',	'',	'dinges',	'12-12-2016',	'M',	'Zangvogelweg',	'140',	'1234 XD',	'Amersfoort',	'0612345678',	'karel@rocket.com',	'karel',	'$2y$10$bR56Pz/R.4RvGVoZeQLelOnvJ8U5vU0/IyxedmFExGBHcut99RU5C',	'XE2pOmXsaVfiJwnurnnP73ggkK1EmGN61xN9ZEpQyO4otZoXEyLmmKBUPk5i',	'2016-10-30 19:00:15',	'2016-10-30 19:00:22'),
(4,	'mien',	'de',	'Vries',	'08-03-1968',	'V',	'Plezier',	'69',	'1245 PS',	'Amsterdam',	'0678923491',	'Mien@rocket.com',	'mien',	'$2y$10$pKco7ASp2i/J5mUpJ1Mv7usdewZUeSAJbq2czW.wEOZtuKhJ0NWku',	'grzbuRmHoK76oJejDjk11D790aqNMsnZqUxDFsujQJK7fwGIbtR9ay4P69WK',	'2016-10-30 19:05:09',	'2016-11-02 12:01:16'),
(5,	'Wilko',	'',	'Dekkers',	'23-08-1998',	'M',	'Harderwijkerbank',	'24',	'3752 TP',	'Bunschoten-Spakenburg',	'06 57935477',	'wilko.dekkers@gmail.com',	'wilkodekkers',	'$2y$10$owdDZk3A9qgonhk5SgGQPO43dGeYX.X7ySZBdmg0tDvBLMRkfeOpu',	NULL,	'2016-10-31 10:01:28',	'2016-11-04 08:37:05'),
(7,	'Sascha',	'',	'Landegge',	'21-05-1998',	'M',	'Zangvogelweg',	'140',	'2681 HR',	'Amersfoort',	'0612379841',	'sascha@gmail.com',	'saschalandegge',	'$2y$10$ZWmK0sl2QNPCEko5MJm2EOF2loSQjb/0nlE2L1FQAEkBEdvevYGgy',	'Hubqx3wfVKKlJiXsPK0MrpxIE8ygf1hITUjGIeVQ8mpx0EAuzycyUsdzn527',	'2016-10-31 10:07:08',	'2016-11-04 08:35:02'),
(30,	'Kimberley',	'van der',	'Kleij',	'27-02-1998',	'V',	'Muizenweide',	'129',	'1234 HS',	'Zoetermeer',	'0623291379',	'kimberley@gmail.com',	'kimberleyvanderkleij',	'$2y$10$nJhXv0xO7hRLlqxdAIaN7OunowuHLJHXoosU8M4BmdtJpBhtr3/ba',	'6St99ovGvWF5HynoXs4AgaliEaryChuCzPzlOgwLBQ6F0kUt3Zit4JFnw9dV',	'2016-10-31 13:35:31',	'2016-11-08 10:55:36'),
(32,	'Arnout',	'',	'Quint',	'12-12-2016',	'M',	'Poepopdestoep',	'69',	'1213 SJ',	'Woudenberg',	'0621389034',	'arnout@gmail.com',	NULL,	NULL,	NULL,	'2016-10-31 13:43:35',	'2016-10-31 13:43:35'),
(33,	'Lars',	'van',	'Scheijndel',	'2016-04-29',	'M',	'Karelweg',	'69',	'7337 PL',	'Nijkerk',	'0612345678',	'lars@gmail.com',	'larsvanscheijndel',	'$2y$10$RD3ZSt/iqAvhgeJT3XjO4.9OH4Nidkj5mthGEiOEWxHK6Z6ptJ7D6',	NULL,	'2016-11-04 13:58:06',	'2016-11-04 13:58:59'),
(35,	'Dennis',	'',	'Snijder',	'27-02-1998',	'M',	'Kopervlinder',	'21',	'1234 HS',	'Nijkerk',	'0612345678',	'dennis@snijder.io',	'dennissneijder',	'$2y$10$JhjHszKxVHEnckQPzC3WkuFC/AmJ0FwscegjTOSpwluhm28ylmyJ2',	NULL,	'2016-11-04 14:05:16',	'2016-11-04 14:05:16'),
(36,	'Manon',	'van',	'Otten',	'24-03-1975',	'V',	'Zangvogelweg',	'140',	'1234 XD',	'Amersfoort',	'0612345678',	'manon@gmail.com',	'manonvanotten',	'$2y$10$bjLL3WoeEEnCmhzzI/YIJOoEg6Vq0RVqsCpAUwtpG11OeIWHJUL/.',	NULL,	'2016-11-04 14:07:54',	'2016-11-04 14:07:54');

DROP TABLE IF EXISTS `voertuig`;
CREATE TABLE `voertuig` (
  `kenteken` varchar(12) NOT NULL,
  `merk` varchar(45) NOT NULL,
  `aankoopdatum` date NOT NULL,
  `voertuigtype_voertuigtype_id` int(11) NOT NULL,
  PRIMARY KEY (`kenteken`),
  KEY `fk_voertuig_voertuigtype1_idx` (`voertuigtype_voertuigtype_id`),
  CONSTRAINT `fk_voertuig_voertuigtype1` FOREIGN KEY (`voertuigtype_voertuigtype_id`) REFERENCES `voertuigtype` (`voertuigtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `voertuig` (`kenteken`, `merk`, `aankoopdatum`, `voertuigtype_voertuigtype_id`) VALUES
('678-S-67',	'BMW',	'1997-04-12',	3),
('CD-CD-45',	'HEZIK',	'2016-12-14',	4),
('GH-567-G',	'Scannia',	'1990-11-21',	4),
('XD-XD-69',	'Mercedesx',	'2015-06-10',	1),
('ZYK-420-L',	'Vespa',	'2012-05-27',	2);

DROP TABLE IF EXISTS `voertuiggebruiker`;
CREATE TABLE `voertuiggebruiker` (
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `voertuig_kenteken` varchar(12) NOT NULL,
  PRIMARY KEY (`startdatum`),
  KEY `fk_voertuiggebruiker_users1_idx` (`users_id`),
  KEY `fk_voertuiggebruiker_voertuig1_idx` (`voertuig_kenteken`),
  CONSTRAINT `fk_voertuiggebruiker_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_voertuiggebruiker_voertuig1` FOREIGN KEY (`voertuig_kenteken`) REFERENCES `voertuig` (`kenteken`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `voertuiggebruiker` (`startdatum`, `einddatum`, `users_id`, `voertuig_kenteken`) VALUES
('2016-12-08',	NULL,	3,	'XD-XD-69');

DROP TABLE IF EXISTS `voertuigtype`;
CREATE TABLE `voertuigtype` (
  `voertuigtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `lestype` varchar(45) NOT NULL,
  `rijbewijs` varchar(10) NOT NULL,
  PRIMARY KEY (`voertuigtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `voertuigtype` (`voertuigtype_id`, `lestype`, `rijbewijs`) VALUES
(1,	'auto',	'B'),
(2,	'brommer',	'AM'),
(3,	'motor',	'A'),
(4,	'vrachtwagen',	'C');

DROP TABLE IF EXISTS `werkdag`;
CREATE TABLE `werkdag` (
  `werkdag` int(11) NOT NULL,
  `startdatum` date NOT NULL,
  `eindDatum` date NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`werkdag`,`startdatum`),
  KEY `fk_werkdag_users1_idx` (`users_id`),
  CONSTRAINT `fk_werkdag_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2016-12-12 16:00:29
