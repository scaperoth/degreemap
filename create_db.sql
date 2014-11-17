#CREATE DATABASE degreemap;

#CREATE USER 'degreemapuser'@'localhost' IDENTIFIED BY 'D3gR33M@p_@pPlIc@tI0n_M@k3R';

#GRANT ALL ON degreemap.* TO 'degreemapuser'@'localhost';

CREATE TABLE IF NOT EXISTS `degreemap`.`courses` (
  `semester` INT(1) NOT NULL,
  `position` INT(1) NOT NULL,
  `title` VARCHAR(45) ,
  `credits` INT(1) ,
  `description` TEXT NULL,
  `link` TEXT NULL,
  `labelcolor` VARCHAR(20) ,
  `labelmessage` VARCHAR(45) ,
  PRIMARY KEY (`position`, `semester`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `degreemap`.`student` (
  `student_id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB;