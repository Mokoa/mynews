CREATE TABLE users(
    userID INT(11) AUTO_INCREMENT,
    userName VARCHAR(50),
    password VARCHAR(32),
    email VARCHAR(50),
    toutiao BOOL DEFAULT false,
    caijing BOOL DEFAULT false,
    tiyu BOOL DEFAULT false,
    yule BOOL DEFAULT false,
    junshi BOOL DEFAULT false,
    jiaoyu BOOL DEFAULT false,
    gupiao BOOL DEFAULT false,
    xingzuo BOOL DEFAULT false,
    PRIMARY KEY(userID),
    UNIQUE (email)
);