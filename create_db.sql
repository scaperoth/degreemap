#CREATE DATABASE degreemap;

#CREATE USER 'degreemapuser'@'localhost' IDENTIFIED BY 'D3gR33M@p_@pPlIc@tI0n_M@k3R';

#GRANT ALL ON degreemap.* TO 'degreemapuser'@'localhost';

CREATE TABLE IF NOT EXISTS `mydb`.`Course` (
  `title` VARCHAR(45) NOT NULL,
  `semester` INT(1) NOT NULL,
  `credits` INT(1) NOT NULL,
  `description` TEXT NULL,
  `link` TEXT NOT NULL,
  `label-color` VARCHAR(20) NOT NULL,
  `label-message` VARCHAR(20) NOT NULL,
  `position` INT(1) NOT NULL,
  PRIMARY KEY (`title`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Student` (
  `student_id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB;