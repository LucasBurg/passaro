-- MySQL Workbench Synchronization
-- Generated: 2016-05-12 14:48
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: lucas.mota

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `passaro`.`tratamento_periodo` 
DROP FOREIGN KEY `fk_tratamento_periodo_tratamento_indicacao1`;

ALTER TABLE `passaro`.`tratamento` 
CHANGE COLUMN `nome` `nome` VARCHAR(45) NOT NULL ,
ADD COLUMN `descricao` VARCHAR(100) NULL DEFAULT NULL AFTER `nome`;

CREATE TABLE IF NOT EXISTS `passaro`.`periodo` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NULL DEFAULT NULL,
  `data_inicio` DATETIME NOT NULL,
  `data_fim` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `passaro`.`indicacao` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `passaro`.`periodo_indicacao` (
  `periodo_id` INT(10) UNSIGNED NOT NULL,
  `indicacao_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`periodo_id`, `indicacao_id`),
  INDEX `fk_periodo_indicacao_indicacao1_idx` (`indicacao_id` ASC),
  INDEX `fk_periodo_indicacao_periodo1_idx` (`periodo_id` ASC),
  CONSTRAINT `fk_periodo_indicacao_periodo1`
    FOREIGN KEY (`periodo_id`)
    REFERENCES `passaro`.`periodo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_periodo_indicacao_indicacao1`
    FOREIGN KEY (`indicacao_id`)
    REFERENCES `passaro`.`indicacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `passaro`.`tratamento_periodo` 
DROP COLUMN `bloq_periodo`,
DROP COLUMN `obs`,
DROP COLUMN `data_fim`,
DROP COLUMN `data_inicio`,
DROP COLUMN `tratamento_indicacao_id`,
DROP COLUMN `id`,
ADD COLUMN `periodo_id` INT(10) UNSIGNED NOT NULL AFTER `tratamento_id`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`tratamento_id`, `periodo_id`),
ADD INDEX `fk_tratamento_periodo_periodo1_idx` (`periodo_id` ASC),
ADD INDEX `fk_tratamento_periodo_tratamento1_idx` (`tratamento_id` ASC),
DROP INDEX `fk_tratamento_periodo_tratamento1_idx` ,
DROP INDEX `fk_tratamento_periodo_tratamento_indicacao1_idx` ;

DROP TABLE IF EXISTS `passaro`.`tratamento_indicacao` ;

ALTER TABLE `passaro`.`tratamento_periodo` 
ADD CONSTRAINT `fk_tratamento_periodo_periodo1`
  FOREIGN KEY (`periodo_id`)
  REFERENCES `passaro`.`periodo` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
