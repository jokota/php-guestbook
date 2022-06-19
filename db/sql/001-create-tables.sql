/* drop table */
DROP TABLE IF EXISTS `guestbook`.`guest`;

/* create table */
CREATE TABLE `guestbook`.`guest` (
  `id` INT(32) NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(64) NOT NULL , 
  `mail` VARCHAR(128) NOT NULL , 
  `address` VARCHAR(256) NOT NULL , 
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
