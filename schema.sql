CREATE DATABASE dogs
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE dogs;

CREATE TABLE breeds (
  id    INT AUTO_INCREMENT PRIMARY KEY,
  breed VARCHAR(70) NOT NULL,
  about TEXT NOT NULL,
  image VARCHAR(100) NOT NULL,
  link  VARCHAR(100) NOT NULL
);

ALTER TABLE breeds ENGINE = MyISAM;

CREATE UNIQUE INDEX breed_id ON breeds(id);
CREATE FULLTEXT INDEX breed ON breeds(breed, about);
CREATE INDEX breed_image ON breeds(image);
CREATE INDEX link ON breeds(link);