CREATE DATABASE demodb;

use demodb;

CREATE TABLE vistor(
count int not null
);

CREATE USER 'app_usr'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'app_usr'@'localhost' WITH GRANT OPTION;

CREATE USER 'app_usr'@'%' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'app_usr'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;