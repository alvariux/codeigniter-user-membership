CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `server_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `app_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `server_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `app_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `server_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `app_profile` (`id`, `user_id`, `address`, `state`, `city`, `phone`, `mobile`) VALUES
(1,1,'','','','','');

INSERT INTO `app_roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

INSERT INTO `app_users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`) VALUES
(1, 'admin', 'user', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user@gmail.com');


CREATE TABLE IF NOT EXISTS `app_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `server_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `role_id_idx` (`role_id`)
) ENGINE=InnoDB;


INSERT INTO `app_user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1);


ALTER TABLE `app_profile`
  ADD CONSTRAINT `app_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `app_user_roles`
--
ALTER TABLE `app_user_roles`
  ADD CONSTRAINT `app_user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `app_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
