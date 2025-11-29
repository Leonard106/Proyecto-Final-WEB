CREATE DATABASE  IF NOT EXISTS `login_db`;
USE `login_db`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `crud_app`.`users` (`username`, `password`) VALUES ('aaron', '123456');
INSERT INTO `crud_app`.`users` (`username`, `password`) VALUES ('leonardo', '123456');
INSERT INTO `crud_app`.`users` (`username`, `password`) VALUES ('angel', '123456');


CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (100) NOT NULL,
    email VARCHAR (100) NOT NULL,
    telefono VARCHAR (15) NOT NULL
);