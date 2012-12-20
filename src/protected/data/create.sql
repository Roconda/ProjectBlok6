SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- -----------------------------------------------------
-- Table `traject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `traject` ;

CREATE  TABLE IF NOT EXISTS `traject` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  `duration` INT NOT NULL ,
  `nrcourses` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

CREATE  TABLE IF NOT EXISTS `user` (
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
-- Table `assign`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `assign` ;

CREATE  TABLE IF NOT EXISTS `assign` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `traject_id` INT NOT NULL ,
  `startdate` date NOT NULL,
  `completed` ENUM('uncompleted','failed','completed') NOT NULL ,
  `notes` TEXT NULL ,
  PRIMARY KEY (`user_id`, `traject_id`) ,
  INDEX `fk_User_has_Course_Course1_idx` (`traject_id` ASC) ,
  INDEX `fk_assign_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_User_has_Course_Course1`
    FOREIGN KEY (`traject_id` )
    REFERENCES `traject` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_assign_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course` ;

CREATE  TABLE IF NOT EXISTS `course` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  `required` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `location` ;

CREATE  TABLE IF NOT EXISTS `location` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course_has_traject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_has_traject` ;

CREATE  TABLE IF NOT EXISTS `course_has_traject` (
  `course_id` INT NOT NULL ,
  `traject_id` INT NOT NULL ,
  PRIMARY KEY (`course_id`, `traject_id`) ,
  INDEX `fk_Course_has_Traject_Traject1_idx` (`traject_id` ASC) ,
  INDEX `fk_Course_has_Traject_Course1_idx` (`course_id` ASC) ,
  CONSTRAINT `fk_Course_has_Traject_Course1`
    FOREIGN KEY (`course_id` )
    REFERENCES `course` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Course_has_Traject_Traject1`
    FOREIGN KEY (`traject_id` )
    REFERENCES `traject` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `courseoffer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courseoffer` ;

CREATE  TABLE IF NOT EXISTS `courseoffer` (
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
    REFERENCES `course` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CourseOffer_Location1`
    FOREIGN KEY (`location_id` )
    REFERENCES `location` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enroll`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enroll` ;

CREATE  TABLE IF NOT EXISTS `enroll` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `courseoffer_id` INT NOT NULL ,
  `completed` ENUM('uncompleted','failed','completed') NOT NULL ,
  `notes` TEXT NULL ,
  PRIMARY KEY (`user_id`, `courseoffer_id`) ,
  INDEX `fk_User_has_CourseOffer_CourseOffer1_idx` (`courseoffer_id` ASC) ,
  INDEX `fk_enroll_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_User_has_CourseOffer_CourseOffer1`
    FOREIGN KEY (`courseoffer_id` )
    REFERENCES `courseoffer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enroll_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `action`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `action` ;

CREATE  TABLE IF NOT EXISTS `action` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(255) NOT NULL ,
  `comment` TEXT NULL DEFAULT NULL ,
  `subject` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `permission` ;

CREATE  TABLE IF NOT EXISTS `permission` (
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
-- Table `privacysetting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `privacysetting` ;

CREATE  TABLE IF NOT EXISTS `privacysetting` (
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
-- Table `profile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `profile` ;

CREATE  TABLE IF NOT EXISTS `profile` (
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
-- Table `profile_comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `profile_comment` ;

CREATE  TABLE IF NOT EXISTS `profile_comment` (
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
-- Table `profile_field`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `profile_field` ;

CREATE  TABLE IF NOT EXISTS `profile_field` (
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
-- Table `profile_visit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `profile_visit` ;

CREATE  TABLE IF NOT EXISTS `profile_visit` (
  `visitor_id` INT(11) NOT NULL ,
  `visited_id` INT(11) NOT NULL ,
  `timestamp_first_visit` INT(11) NOT NULL ,
  `timestamp_last_visit` INT(11) NOT NULL ,
  `num_of_visits` INT(11) NOT NULL ,
  PRIMARY KEY (`visitor_id`, `visited_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `role` ;

CREATE  TABLE IF NOT EXISTS `role` (
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
-- Table `translation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `translation` ;

CREATE  TABLE IF NOT EXISTS `translation` (
  `message` VARBINARY(255) NOT NULL ,
  `translation` VARCHAR(255) NOT NULL ,
  `language` VARCHAR(5) NOT NULL ,
  `category` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`message`, `language`, `category`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `user_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user_group` ;

CREATE  TABLE IF NOT EXISTS `user_group` (
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
-- Table `user_group_message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user_group_message` ;
CREATE TABLE IF NOT EXISTS `usergroup_messages` (
  
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  
	`author_id` int(11) unsigned NOT NULL,
  
	`group_id` int(11) unsigned NOT NULL,
  
	`createtime` int(11) unsigned NOT NULL,
  
	`title` varchar(255) NOT NULL,
  
	`message` text NOT NULL,
  PRIMARY KEY (`id`) 
) 
ENGINE=InnoDB 
DEFAULT CHARSET=utf8 
AUTO_INCREMENT=1 ;


-- -----------------------------------------------------
-- Table `user_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user_role` ;

CREATE  TABLE IF NOT EXISTS `user_role` (
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

DROP TABLE IF EXISTS `yumtextsettings`;
CREATE TABLE IF NOT EXISTS `yumtextsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('en','de','fr','pl','ru','es','ro','nl') NOT NULL DEFAULT 'en',
  `text_email_registration` text,
  `subject_email_registration` text,
  `text_email_recovery` text,
  `text_email_activation` text,
  `text_friendship_new` text,
  `text_friendship_confirmed` text,
  `text_profilecomment_new` text,
  `text_message_new` text,
  `text_membership_ordered` text,
  `text_payment_arrived` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `yumtextsettings` (`id`, `language`, `text_email_registration`, `subject_email_registration`, `text_email_recovery`, `text_email_activation`, `text_friendship_new`, `text_friendship_confirmed`, `text_profilecomment_new`, `text_message_new`, `text_membership_ordered`, `text_payment_arrived`) VALUES
(1, 'en', 'You have registered for this Application. To confirm your E-Mail address, please visit {activation_url}', 'You have registered for an application', 'You have requested a new Password. To set your new Password,\n										please go to {recovery_url}', 'Your account has been activated. Thank you for your registration.', 'New friendship Request from {username}: {message}. To accept or ignore this request, go to your friendship page: {link_friends} or go to your profile: {link_profile}', 'The User {username} has accepted your friendship request', 'You have a new profile comment from {username}: {message} visit your profile: {link_profile}', 'You have received a new message from {username}: {message}', 'Your order of membership {membership} on {order_date} has been taken. Your order Number is {id}. You have choosen the payment style {payment}.', 'Your payment has been received on {payment_date} and your Membership {id} is now active'),
(2, 'de', 'Sie haben sich für unsere Applikation registriert. Bitte bestätigen Sie ihre E-Mail adresse mit diesem Link: {activation_url}', 'Sie haben sich für eine Applikation registriert.', 'Sie haben ein neues Passwort angefordert. Bitte klicken Sie diesen link: {recovery_url}', 'Ihr Konto wurde freigeschaltet.', 'Der Benutzer {username} hat Ihnen eine Freundschaftsanfrage gesendet. \n\n							 Nachricht: {message}\n\n							 Klicken sie <a href="{link_friends}">hier</a>, um diese Anfrage zu bestätigen oder zu ignorieren. Alternativ können sie <a href="{link_profile}">hier</a> auf ihre Profilseite zugreifen.', 'Der Benutzer {username} hat ihre Freundschaftsanfrage bestätigt.', '\n							 Benutzer {username} hat Ihnen eine Nachricht auf Ihrer Pinnwand hinterlassen: \n\n							 {message}\n\n							 <a href="{link}">hier</a> geht es direkt zu Ihrer Pinnwand!', 'Sie haben eine neue Nachricht von {username} bekommen: {message}', 'Ihre Bestellung der Mitgliedschaft {membership} wurde am {order_date} entgegen genommen. Die gewählte Zahlungsart ist {payment}. Die Auftragsnummer lautet {id}.', 'Ihre Zahlung wurde am {payment_date} entgegen genommen. Ihre Mitgliedschaft mit der Nummer {id} ist nun Aktiv.'),
(3, 'es', 'Te has registrado en esta aplicación. Para confirmar tu dirección de correo electrónico, por favor, visita {activation_url}.', 'Te has registrado en esta aplicación.', 'Has solicitado una nueva contraseña. Para establecer una nueva contraseña, por favor ve a {recovery_url}', 'Tu cuenta ha sido activada. Gracias por registrarte.', 'Has recibido una nueva solicitud de amistad de {user_from}: {message} Ve a tus contactos: {link}', 'Tienes un nuevo comentario en tu perfil de {username}: {message} visita tu perfil: {link}', 'Please translatore thisse hiere toh tha espagnola langsch {username}', 'Has recibido un mensaje de {username}: {message}', 'Tu orden de membresía {membership} de fecha {order_date} fué tomada. Tu número de orden es {id}. Escogiste como modo de pago {payment}.', 'Tu pago fué recibido en fecha {payment_date}. Ahora tu Membresía {id} ya está activa'),
(4, 'fr', '', '', '', '', '', '', '', '', '', ''),
(5, 'ro', '', '', '', '', '', '', '', '', '', ''),
(6, 'nl', 'U heeft zich geregistreerd voor deze Applicatie. Om uw e-mail adres te bevestigen ga naar {activation_url}', 'U heeft zich geregistreerd voor een Applicatie.', 'U heeft een nieuw wachtwoord aangevraagt. Om uw nieuwe wachtwoord intestellen ga naar {recovery_url}', ' Uw account is geactiveerd. Dankuwel voor uw registratie.', 'Nieuw vriendschap Verzoek van {username}: {message}. Om dit verzoek te accepteren of te negeren, ga naar uw vriendschap pagina: {link_friends} of ga naar uw profiel: {link_profile}', 'De Gebruiker {username} heeft uw vriendschap verzoek geaccepteerd', 'U heeft een nieuw profiel bericht van {username}: {message} ga naar uw profiel: {link_profile}', 'U heeft een nieuw bericht ontvangen van {username}: {message} ', 'Uw verzoek voor lidmaatschap {membership} op {order_date} is ontvangen. Uw verzoek Nummer is {id}. U hebt voor de betaalmethode {payment} gekozen.', 'Uw betaling is ontvangen op {payment_date} en uw lidmaatschap {id} is nu actief');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
