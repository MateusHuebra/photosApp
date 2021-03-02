-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `name` VARCHAR(64) NULL,
  `email` VARCHAR(128) NOT NULL,
  `pass` VARCHAR(32) NOT NULL,
  `photo` VARCHAR(64) NULL,
  `cover` VARCHAR(64) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `userame_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `photo_UNIQUE` (`photo` ASC),
  UNIQUE INDEX `cover_UNIQUE` (`cover` ASC));


-- -----------------------------------------------------
-- Table `post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(255) NULL,
  `picture` VARCHAR(64) NULL,
  `createdAt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `userId_idx` (`userId` ASC),
  CONSTRAINT `userId`
    FOREIGN KEY (`userId`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `like`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `like` (
  `postId` INT UNSIGNED NOT NULL,
  `userId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`postId`, `userId`),
  INDEX `likePost_idx` (`postId` ASC),
  INDEX `likeUser_idx` (`userId` ASC),
  CONSTRAINT `likePost`
    FOREIGN KEY (`postId`)
    REFERENCES `post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `likeUser`
    FOREIGN KEY (`userId`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `comment` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `postId` INT UNSIGNED NOT NULL,
  `userId` INT(10) UNSIGNED NOT NULL,
  `text` VARCHAR(255) NOT NULL,
  `createdAt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `commentPost_idx` (`postId` ASC),
  INDEX `commentUser_idx` (`userId` ASC),
  CONSTRAINT `commentPost`
    FOREIGN KEY (`postId`)
    REFERENCES `post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `commentUser`
    FOREIGN KEY (`userId`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `follow`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `follow` (
  `userId` INT(10) UNSIGNED NOT NULL,
  `followsId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`userId`, `followsId`),
  CONSTRAINT `fk_follow_1`
    FOREIGN KEY (`userId`)
    REFERENCES `user` (`id`),
    FOREIGN KEY (`followsId`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);