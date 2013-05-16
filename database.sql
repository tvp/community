DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `crop_x` int(11) NOT NULL,
  `crop_y` int(11) NOT NULL,
  `crop_w` int(11) NOT NULL,
  `crop_h` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `registered`, `first_name`, `last_name`, `second_name`, `website`, `address`, `zip`, `city`, `photo`, `crop_x`, `crop_y`, `crop_w`, `crop_h`)
VALUES
	(4,'aleksey@razbakov.com','+380991939078','96e79218965eb72c92a549dd5a330112','2013-02-03 22:56:23','Алексей','Разбаков','Анатольевич','razbakov.com','','','','',0,0,0,0);