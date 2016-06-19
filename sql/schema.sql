CREATE DATABASE demodb;

use demodb;

CREATE TABLE visitor(
count int not null
);

INSERT INTO visitor (count) VALUES (0);

CREATE USER 'app_usr'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'app_usr'@'localhost' WITH GRANT OPTION;

CREATE USER 'app_usr'@'%' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'app_usr'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;