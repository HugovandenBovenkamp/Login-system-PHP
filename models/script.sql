use auth;

CREATE TABLE users
(
    id        int          NOT NULL AUTO_INCREMENT,
    email  varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);