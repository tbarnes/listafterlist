CREATE TABLE `lal`.`list-categories` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(2000) NOT NULL , `description` VARCHAR(2000) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

insert into `list-categories` (name) values ('business'),('education'),('entertainment'),('everything else'),('life'),('science'),('sports'),('technology'),('travel')