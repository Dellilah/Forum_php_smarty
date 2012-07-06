-- -----------------------------------------------------
-- Struktura tabeli dla `uzytkownik_forum`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uzytkownik_forum` ;
CREATE  TABLE IF NOT EXISTS `uzytkownik_forum` (
  `id_uz` INT(10) NOT NULL AUTO_INCREMENT ,
  `login` CHAR(20) NOT NULL ,
  `haslo` CHAR(64) NOT NULL ,
  `imie` CHAR(45) NOT NULL ,
  `nazwisko` CHAR(45) NOT NULL ,
  `email` CHAR(45) NOT NULL ,
  `typ` ENUM('user', 'admin', 'moderator') NOT NULL ,
  `podpis` CHAR(250) NULL ,
  `Data_ur` DATE NULL ,
  PRIMARY KEY (`id_uz`) ,
  UNIQUE INDEX `idużytkownik_UNIQUE` (`id_uz` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `e-mail_UNIQUE` (`email` ASC) )
ENGINE=MyISAM DEFAULT CHARSET=utf8;

SHOW WARNINGS;


-- -----------------------------------------------------
-- Struktura tabeli dla `watek`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `watek` ;
CREATE  TABLE IF NOT EXISTS `watek` (
  `id_watek` INT(10) NOT NULL AUTO_INCREMENT ,
  `data_zalozenia` TIMESTAMP DEFAULT NOW() NOT NULL ,
  `nazwa` CHAR(100) NOT NULL ,
  `uzytkownik_forum_id_uz` INT(10) NOT NULL ,
  PRIMARY KEY (`id_watek`) ,
  UNIQUE INDEX `Nazwa_UNIQUE` (`nazwa` ASC) ,
  INDEX `fk_watek_uzytkownik_forum1` (`uzytkownik_forum_id_uz` ASC) ,
  CONSTRAINT `fk_watek_uzytkownik_forum1`
    FOREIGN KEY (`uzytkownik_forum_id_uz` )
    REFERENCES `uzytkownik_forum` (`id_uz` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=MyISAM DEFAULT CHARSET=utf8;

SHOW WARNINGS;


-- -----------------------------------------------------
-- Struktura tabeli dla `post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post` ;
CREATE  TABLE IF NOT EXISTS `post` (
  `id_post` INT NOT NULL AUTO_INCREMENT ,
  `data_dodania` TIMESTAMP DEFAULT NOW() NOT NULL,
  `tresc` VARCHAR(2000) NOT NULL ,
  `uzytkownik_forum_id_uz` INT(10) NOT NULL ,
  `watek_id_watek` INT(10) NOT NULL ,
  PRIMARY KEY (`id_post`) ,
  INDEX `fk_post_uzytkownik_forum1` (`uzytkownik_forum_id_uz` ASC) ,
  INDEX `fk_post_watek1` (`watek_id_watek` ASC) ,
  CONSTRAINT `fk_post_uzytkownik_forum1`
    FOREIGN KEY (`uzytkownik_forum_id_uz` )
    REFERENCES `uzytkownik_forum` (`id_uz` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_watek1`
    FOREIGN KEY (`watek_id_watek` )
    REFERENCES `watek` (`id_watek` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=MyISAM;

SHOW WARNINGS;
