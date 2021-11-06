DROP DATABASE IF EXISTS blog;
CREATE DATABASE blog;
USE blog;
CREATE TABLE author (
id INT AUTO_INCREMENT, 
ime VARCHAR(65),
prezime VARCHAR(65),
pol VARCHAR(10),
PRIMARY KEY(id)
);
CREATE TABLE posts
(
id INT AUTO_INCREMENT,
title VARCHAR(60),
body text,
author VARCHAR(60),
created_at DATE,
author_id INT,
PRIMARY KEY (id),
FOREIGN KEY (author_id) REFERENCES author(id)
);

CREATE TABLE comments(
id INT AUTO_INCREMENT,
author VARCHAR(60),
text TEXT,
post_id INT,
author_id INT,
PRIMARY KEY (id),
FOREIGN KEY (post_id) REFERENCES posts(id),
FOREIGN KEY (author_id) REFERENCES author(id)
);






 ///create 5 users then ////////
/////// insert comments /////// 

USE blog;
INSERT INTO `comments` (`author`, `text`, `post_id`, `author_id`)
 VALUES ('Cune Zdravkovic', 'Dal je moguce', 1,null),
 ('Pera Peric', 'Dal je moguce', 1,null),
 ('Dafina Ognjanovic', 'Opet pise lorem', 3,null),
 ('Boban Stevic', 'Neki Komentar', 3,null),
 ('Mara Maric', 'WoW', 4,null);



