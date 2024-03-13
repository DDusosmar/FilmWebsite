CREATE TABLE `reviews`(
    `ReviewID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `MovieID` BIGINT NOT NULL,
    `UserID` BIGINT NOT NULL,
    `Rating` INT NOT NULL,
    `Review` TEXT NOT NULL,
    `Date` DATE NOT NULL
);

CREATE TABLE `films`(
    `FilmID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Title` VARCHAR(255) NOT NULL,
    `Beschrijving` TEXT NOT NULL,
    `Genre` INT NOT NULL,
    `Regisseur` VARCHAR(255) NOT NULL,
    `Release Year` YEAR NOT NULL,
    `Runtime` INT NOT NULL,
    `Rating` DECIMAL(8, 2) NOT NULL,
    `PosterImage` BLOB NOT NULL,
    `UploadedBy` INT NOT NULL
);

CREATE TABLE `genre`(
    `GenreID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Genre_name` VARCHAR(255) NOT NULL
);

INSERT INTO genre (Genre_name)
VALUES
    (01,'Action'),
    (02,'Comedy'),
    (03,'Drama'),
    (04,'Horror'),
    (05,'Romance'),
    (06,'Sci-Fi'),
    (07,'Thriller'),
    (08,'Animation'),
    (09,'Documentary'),
    (10,'Fantasy');


CREATE TABLE `users`(
    `UserID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Username` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Password` VARCHAR(255) NOT NULL,
    `Created_at` TIMESTAMP NOT NULL
);