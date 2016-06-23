CREATE DATABASE demodb;

use demodb;

CREATE TABLE voteoption(
id int AUTO_INCREMENT,
description text not null,
primary key (id)
);

CREATE TABLE vote(
id int AUTO_INCREMENT,
voteid int not null,
primary key (id),
foreign key (voteid) references voteoption(id)
);

# insert some default voting options
INSERT INTO voteoption(description) VALUES
('option a'),
('option b'),
('option c');

# insert some dummy votes
INSERT INTO vote (voteid) VALUES 
(1),(2),(2),(1),(1),(1),(2),(1),(2);

CREATE USER 'app_usr'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'app_usr'@'localhost' WITH GRANT OPTION;

CREATE USER 'app_usr'@'%' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'app_usr'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;

