SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `ddcd` ;
CREATE SCHEMA IF NOT EXISTS `ddcd` DEFAULT CHARACTER SET latin1 ;
USE `ddcd` ;

-- -----------------------------------------------------
-- Table `ddcd`.`traject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`traject` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`traject` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  `duration` INT NOT NULL ,
  `nrtrainings` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`user` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`user` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `activationKey` VARCHAR(128) NOT NULL DEFAULT '' ,
  `createtime` INT(10) NOT NULL DEFAULT '0' ,
  `lastvisit` INT(10) NOT NULL DEFAULT '0' ,
  `lastaction` INT(10) NOT NULL DEFAULT '0' ,
  `lastpasswordchange` INT(10) NOT NULL DEFAULT '0' ,
  `superuser` INT(1) NOT NULL DEFAULT '0' ,
  `status` INT(1) NOT NULL DEFAULT '0' ,
  `avatar` VARCHAR(255) NULL DEFAULT NULL ,
  `notifyType` ENUM('None','Digest','Instant','Threshold') NULL DEFAULT 'Instant' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username` (`username` ASC) ,
  INDEX `status` (`status` ASC) ,
  INDEX `superuser` (`superuser` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`assign`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`assign` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`assign` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `course_id` INT NOT NULL ,
  `completed` ENUM('undone','failed','completed') NOT NULL ,
  `notes` TEXT NULL ,
  PRIMARY KEY (`user_id`, `course_id`) ,
  INDEX `fk_User_has_Course_Course1_idx` (`course_id` ASC) ,
  INDEX `fk_assign_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_User_has_Course_Course1`
    FOREIGN KEY (`course_id` )
    REFERENCES `ddcd`.`traject` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_assign_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `ddcd`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`course` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  `required` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`location` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`location` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`course_has_traject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`course_has_traject` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`course_has_traject` (
  `course_id` INT NOT NULL ,
  `traject_id` INT NOT NULL ,
  PRIMARY KEY (`course_id`, `traject_id`) ,
  INDEX `fk_Course_has_Traject_Traject1_idx` (`traject_id` ASC) ,
  INDEX `fk_Course_has_Traject_Course1_idx` (`course_id` ASC) ,
  CONSTRAINT `fk_Course_has_Traject_Course1`
    FOREIGN KEY (`course_id` )
    REFERENCES `ddcd`.`course` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Course_has_Traject_Traject1`
    FOREIGN KEY (`traject_id` )
    REFERENCES `ddcd`.`traject` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`courseoffer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`courseoffer` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`courseoffer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `course_id` INT NOT NULL ,
  `location_id` INT NULL ,
  `year` INT NOT NULL ,
  `block` INT NOT NULL ,
  `fysiek` TINYINT(1) NOT NULL ,
  `blocked` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_CourseOffer_Course1_idx` (`course_id` ASC) ,
  INDEX `fk_CourseOffer_Location1_idx` (`location_id` ASC) ,
  CONSTRAINT `fk_CourseOffer_Course1`
    FOREIGN KEY (`course_id` )
    REFERENCES `ddcd`.`course` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CourseOffer_Location1`
    FOREIGN KEY (`location_id` )
    REFERENCES `ddcd`.`location` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`enroll`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`enroll` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`enroll` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `courseoffer_id` INT NOT NULL ,
  `completed` ENUM('undone','failed','completed') NOT NULL ,
  `notes` TEXT NULL ,
  PRIMARY KEY (`user_id`, `courseoffer_id`) ,
  INDEX `fk_User_has_CourseOffer_CourseOffer1_idx` (`courseoffer_id` ASC) ,
  INDEX `fk_enroll_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_User_has_CourseOffer_CourseOffer1`
    FOREIGN KEY (`courseoffer_id` )
    REFERENCES `ddcd`.`courseoffer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enroll_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `ddcd`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddcd`.`action`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`action` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`action` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(255) NOT NULL ,
  `comment` TEXT NULL DEFAULT NULL ,
  `subject` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`permission` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`permission` (
  `principal_id` INT(11) NOT NULL ,
  `subordinate_id` INT(11) NOT NULL DEFAULT '0' ,
  `type` ENUM('user','role') NOT NULL ,
  `action` INT(11) NOT NULL ,
  `template` TINYINT(1) NOT NULL ,
  `comment` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`principal_id`, `subordinate_id`, `type`, `action`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`privacysetting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`privacysetting` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`privacysetting` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `message_new_friendship` TINYINT(1) NOT NULL DEFAULT '1' ,
  `message_new_message` TINYINT(1) NOT NULL DEFAULT '1' ,
  `message_new_profilecomment` TINYINT(1) NOT NULL DEFAULT '1' ,
  `appear_in_search` TINYINT(1) NOT NULL DEFAULT '1' ,
  `show_online_status` TINYINT(1) NOT NULL DEFAULT '1' ,
  `log_profile_visits` TINYINT(1) NOT NULL DEFAULT '1' ,
  `ignore_users` VARCHAR(255) NULL DEFAULT NULL ,
  `public_profile_fields` BIGINT(15) UNSIGNED NULL DEFAULT NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`profile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`profile` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`profile` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  `privacy` ENUM('protected','private','public') NOT NULL ,
  `lastname` VARCHAR(50) NOT NULL DEFAULT '' ,
  `firstname` VARCHAR(50) NOT NULL DEFAULT '' ,
  `show_friends` TINYINT(1) NULL DEFAULT '1' ,
  `allow_comments` TINYINT(1) NULL DEFAULT '1' ,
  `email` VARCHAR(255) NOT NULL DEFAULT '' ,
  `street` VARCHAR(255) NULL DEFAULT NULL ,
  `city` VARCHAR(255) NULL DEFAULT NULL ,
  `about` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`profile_comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`profile_comment` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`profile_comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `profile_id` INT(11) NOT NULL ,
  `comment` TEXT NOT NULL ,
  `createtime` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`profile_field`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`profile_field` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`profile_field` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `varname` VARCHAR(50) NOT NULL DEFAULT '' ,
  `title` VARCHAR(255) NOT NULL DEFAULT '' ,
  `hint` TEXT NOT NULL ,
  `field_type` VARCHAR(50) NOT NULL DEFAULT '' ,
  `field_size` INT(3) NOT NULL DEFAULT '0' ,
  `field_size_min` INT(3) NOT NULL DEFAULT '0' ,
  `required` INT(1) NOT NULL DEFAULT '0' ,
  `match` VARCHAR(255) NOT NULL DEFAULT '' ,
  `range` VARCHAR(255) NOT NULL DEFAULT '' ,
  `error_message` VARCHAR(255) NOT NULL DEFAULT '' ,
  `other_validator` VARCHAR(255) NOT NULL DEFAULT '' ,
  `default` VARCHAR(255) NOT NULL DEFAULT '' ,
  `position` INT(3) NOT NULL DEFAULT '0' ,
  `visible` INT(1) NOT NULL DEFAULT '0' ,
  `related_field_name` VARCHAR(255) NOT NULL DEFAULT '' ,
  PRIMARY KEY (`id`) ,
  INDEX `varname` (`varname` ASC, `visible` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`profile_visit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`profile_visit` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`profile_visit` (
  `visitor_id` INT(11) NOT NULL ,
  `visited_id` INT(11) NOT NULL ,
  `timestamp_first_visit` INT(11) NOT NULL ,
  `timestamp_last_visit` INT(11) NOT NULL ,
  `num_of_visits` INT(11) NOT NULL ,
  PRIMARY KEY (`visitor_id`, `visited_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ddcd`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`role` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`role` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(255) NOT NULL ,
  `description` VARCHAR(255) NULL DEFAULT NULL ,
  `is_membership_possible` TINYINT(1) NOT NULL DEFAULT '0' ,
  `price` DOUBLE NULL DEFAULT NULL COMMENT 'Price (when using membership module)' ,
  `duration` INT(11) NULL DEFAULT NULL COMMENT 'How long a membership is valid' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`translation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`translation` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`translation` (
  `message` VARBINARY(255) NOT NULL ,
  `translation` VARCHAR(255) NOT NULL ,
  `language` VARCHAR(5) NOT NULL ,
  `category` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`message`, `language`, `category`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`user_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`user_group` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`user_group` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `owner_id` INT(11) NOT NULL ,
  `participants` TEXT NULL DEFAULT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`user_group_message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`user_group_message` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`user_group_message` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `author_id` INT(11) UNSIGNED NOT NULL ,
  `group_id` INT(11) UNSIGNED NOT NULL ,
  `createtime` INT(11) UNSIGNED NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `message` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ddcd`.`user_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ddcd`.`user_role` ;

CREATE  TABLE IF NOT EXISTS `ddcd`.`user_role` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `role_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`user_id`, `role_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


INSERT INTO `action` (`id`, `title`, `comment`, `subject`) VALUES
(1, 'message_write', NULL, NULL),
(2, 'message_receive', NULL, NULL),
(3, 'user_create', NULL, NULL),
(4, 'user_update', NULL, NULL),
(5, 'user_remove', NULL, NULL),
(6, 'user_admin', NULL, NULL);

INSERT INTO `permission` (`principal_id`, `subordinate_id`, `type`, `action`, `template`, `comment`) VALUES
(1, 0, 'role', 4, 0, ''),
(1, 0, 'role', 5, 0, ''),
(1, 0, 'role', 6, 0, ''),
(1, 0, 'role', 7, 0, ''),
(2, 0, 'role', 1, 0, 'Users can write messages'),
(2, 0, 'role', 2, 0, 'Users can receive messages'),
(2, 0, 'role', 3, 0, 'Users are able to view visits of his profile');

INSERT INTO `privacysetting` (`user_id`, `message_new_friendship`, `message_new_message`, `message_new_profilecomment`, `appear_in_search`, `show_online_status`, `log_profile_visits`, `ignore_users`, `public_profile_fields`) VALUES
(1, 1, 1, 1, 1, 1, 1, '', NULL),
(2, 1, 1, 1, 1, 1, 1, NULL, NULL);

INSERT INTO `profile` (`id`, `user_id`, `timestamp`, `privacy`, `lastname`, `firstname`, `show_friends`, `allow_comments`, `email`, `street`, `city`, `about`) VALUES
(1, 1, '2012-12-04 12:09:23', 'protected', 'admin', 'admin', 1, 1, 'webmaster@example.com', NULL, NULL, NULL),
(2, 2, '2012-12-04 12:09:23', 'protected', 'demo', 'demo', 1, 1, 'demo@example.com', NULL, NULL, NULL);

INSERT INTO `profile_field` (`id`, `varname`, `title`, `hint`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `position`, `visible`, `related_field_name`) VALUES
(1, 'email', 'E-Mail', '', 'VARCHAR', 255, 0, 1, '', '', '', 'CEmailValidator', '', 0, 3, ''),
(2, 'firstname', 'First name', '', 'VARCHAR', 255, 0, 1, '', '', '', '', '', 0, 3, ''),
(3, 'lastname', 'Last name', '', 'VARCHAR', 255, 0, 1, '', '', '', '', '', 0, 3, ''),
(4, 'street', 'Street', '', 'VARCHAR', 255, 0, 0, '', '', '', '', '', 0, 3, ''),
(5, 'city', 'City', '', 'VARCHAR', 255, 0, 0, '', '', '', '', '', 0, 3, ''),
(6, 'about', 'About', '', 'TEXT', 255, 0, 0, '', '', '', '', '', 0, 3, '');

INSERT INTO `role` (`id`, `title`, `description`, `is_membership_possible`, `price`, `duration`) VALUES
(1, 'UserManager', 'This users can manage Users', 0, 0, 0),
(2, 'Demo', 'Users having the demo role', 0, 0, 0),
(3, 'Business', 'Example Business account', 0, 9.99, 7),
(4, 'Premium', 'Example Premium account', 0, 19.99, 28);

INSERT INTO `user` (`id`, `username`, `password`, `activationKey`, `createtime`, `lastvisit`, `lastaction`, `lastpasswordchange`, `superuser`, `status`, `avatar`, `notifyType`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1354622963, 1354623925, 1354623939, 0, 1, 1, NULL, 'Instant'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '', 1354622963, 0, 0, 0, 0, 1, NULL, 'Instant');

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(2, 3);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
