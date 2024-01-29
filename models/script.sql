use auth;

CREATE TABLE users
(
    id        int          NOT NULL AUTO_INCREMENT,
    email  varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE forget_password
(
    id        int          NOT NULL AUTO_INCREMENT,
    token varchar(255) NOT NULL,
    expiration_date timestamp NOT NULL,
    user_id int NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);