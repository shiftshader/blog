DROP DATABASE blog if exist;
CREATE DATABASE blog;
USE blog;
create table author (
id int auto_increment, 
ime varchar(65),
prezime varchar(65),
pol varchar(10),
primary key(id)
);
CREATE TABLE `posts`
(
id INT AUTO_INCREMENT,
title VARCHAR(60),
body text,
author VARCHAR(60),
created_at DATE,
author_id int,
PRIMARY KEY (id),
FOREIGN KEY (author_id) REFERENCES author(id)
);

create table comments(
id INT AUTO_INCREMENT,
author VARCHAR(60),
text text,
post_id INT,
author_id INT,
PRIMARY KEY (id),
FOREIGN KEY (post_id) REFERENCES posts(id),
FOREIGN KEY (author_id) REFERENCES author(id)
);