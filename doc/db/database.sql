SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `projects_inspire` ;
USE `projects_inspire` ;

-- -----------------------------------------------------
-- Table `projects_inspire`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`roles` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`roles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NOT NULL ,
  `description` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_name` (`name` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_inspire`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`users` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(127) NOT NULL ,
  `username` VARCHAR(32) NOT NULL DEFAULT '' ,
  `name` VARCHAR(60) NOT NULL DEFAULT 'Kasutaja' ,
  `password` CHAR(64) NOT NULL ,
  `logins` INT(10) UNSIGNED NOT NULL DEFAULT '0' ,
  `last_login` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_username` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_inspire`.`roles_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`roles_users` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`roles_users` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `role_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`user_id`, `role_id`) ,
  INDEX `fk_role_id` (`role_id` ASC) ,
  CONSTRAINT `roles_users_ibfk_1`
    FOREIGN KEY (`user_id` )
    REFERENCES `projects_inspire`.`users` (`id` )
    ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2`
    FOREIGN KEY (`role_id` )
    REFERENCES `projects_inspire`.`roles` (`id` )
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_inspire`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`sessions` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`sessions` (
  `session_id` VARCHAR(24) NOT NULL ,
  `last_active` INT(10) UNSIGNED NOT NULL ,
  `contents` TEXT NOT NULL ,
  PRIMARY KEY (`session_id`) ,
  INDEX `last_active` (`last_active` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projects_inspire`.`word_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`word_categories` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`word_categories` (
  `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NULL ,
  `icon` VARCHAR(16) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projects_inspire`.`languages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`languages` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`languages` (
  `id` INT NOT NULL ,
  `name` VARCHAR(32) NOT NULL ,
  `code` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projects_inspire`.`words`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_inspire`.`words` ;

CREATE  TABLE IF NOT EXISTS `projects_inspire`.`words` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `string` VARCHAR(255) NOT NULL ,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `approver_id` INT(11) UNSIGNED NULL DEFAULT NULL ,
  `category_id` TINYINT(3) UNSIGNED NOT NULL DEFAULT 1 ,
  `language_id` INT NOT NULL DEFAULT 1 ,
  `approved` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_words_users1` (`approver_id` ASC) ,
  INDEX `fk_words_word_categories1` (`category_id` ASC) ,
  INDEX `fk_words_languages1` (`language_id` ASC) ,
  CONSTRAINT `fk_words_users1`
    FOREIGN KEY (`approver_id` )
    REFERENCES `projects_inspire`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_words_word_categories1`
    FOREIGN KEY (`category_id` )
    REFERENCES `projects_inspire`.`word_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_words_languages1`
    FOREIGN KEY (`language_id` )
    REFERENCES `projects_inspire`.`languages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `projects_inspire`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_inspire`;
INSERT INTO `projects_inspire`.`roles` (`id`, `name`, `description`) VALUES (1, 'login', 'Login');
INSERT INTO `projects_inspire`.`roles` (`id`, `name`, `description`) VALUES (2, 'admin', 'Admin');

COMMIT;

-- -----------------------------------------------------
-- Data for table `projects_inspire`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_inspire`;
INSERT INTO `projects_inspire`.`users` (`id`, `email`, `username`, `name`, `password`, `logins`, `last_login`, `created`) VALUES (1, 'ando@roots.ee', 'ando', 'Ando', 'b15963e0e546a0887aa459a517a88e4cb046734f5c51bab275206445480ce4d5', 0, NULL, '2012-02-02 00:00:00');

COMMIT;

-- -----------------------------------------------------
-- Data for table `projects_inspire`.`roles_users`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_inspire`;
INSERT INTO `projects_inspire`.`roles_users` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `projects_inspire`.`roles_users` (`user_id`, `role_id`) VALUES (1, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `projects_inspire`.`word_categories`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_inspire`;
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (1, 'Random', 'icon-refresh');
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (2, 'Sentences', 'icon-align-left');
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (3, 'Locations', 'icon-road');
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (4, 'Activities', 'icon-shopping-cart');
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (5, 'Nouns', 'icon-user');
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (6, 'Professions', 'icon-facetime-video');
INSERT INTO `projects_inspire`.`word_categories` (`id`, `name`, `icon`) VALUES (7, 'Adjectives', 'icon-fire');

COMMIT;

-- -----------------------------------------------------
-- Data for table `projects_inspire`.`languages`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_inspire`;
INSERT INTO `projects_inspire`.`languages` (`id`, `name`, `code`) VALUES (1, 'Estonian', 'ee');
INSERT INTO `projects_inspire`.`languages` (`id`, `name`, `code`) VALUES (2, 'English', 'en');

COMMIT;
