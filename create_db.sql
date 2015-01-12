#CREATE DATABASE degreemap;

#CREATE USER 'degreemapuser'@'localhost' IDENTIFIED BY 'D3gR33M@p_@pPlIc@tI0n_M@k3R';

#GRANT ALL ON degreemap.* TO 'degreemapuser'@'localhost';


CREATE TABLE IF NOT EXISTS `degreemap`.`users` (
  `username` VARCHAR(90) NOT NULL,
  `password` TEXT NOT NULL,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NOT NULL,
  `is_advisor` INT(11) NOT NULL DEFAULT '0',
  `is_admin` INT(11) NOT NULL DEFAULT '0',
  `advisor_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8

CREATE TABLE IF NOT EXISTS `degreemap`.`courses` (
  `semester` INT(1) NOT NULL DEFAULT '1',
  `position` INT(1) NOT NULL,
  `username` VARCHAR(60) NOT NULL DEFAULT 'default',
  `title` VARCHAR(45) NULL DEFAULT 'Default',
  `credits` INT(1) NULL DEFAULT '3',
  `description` TEXT NULL DEFAULT NULL,
  `link` VARCHAR(200) NULL DEFAULT '#',
  `labelcolor` VARCHAR(20) NULL DEFAULT 'alert',
  `labelmessage` VARCHAR(45) NULL DEFAULT 'status',
  PRIMARY KEY (`semester`, `position`, `username`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8

ALTER TABLE `degreemap`.`courses` 
ADD INDEX `fk_username_idx` (`username` ASC);
ALTER TABLE `degreemap`.`courses` 
ADD CONSTRAINT `fk_username`
  FOREIGN KEY (`username`)
  REFERENCES `degreemap`.`users` (`username`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
