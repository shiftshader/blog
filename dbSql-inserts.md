DROP DATABASE blog;
CREATE DATABASE blog;
USE blog;
CREATE TABLE `posts`
(
id INT AUTO_INCREMENT,
title VARCHAR(60),
body text,
author VARCHAR(60),
created_at DATE,
PRIMARY KEY (id)
);
SELECT * FROM `posts` LIMIT 1000;
INSERT INTO `posts` (title, body, author, created_at) VALUES ("Naslov prvi", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend, tortor vel porttitor venenatis, lorem lectus viverra elit, et tincidunt nulla eros id risus. Sed eu massa rhoncus, congue neque in, tincidunt elit. Vivamus maximus porttitor ipsum in dapibus. Nullam libero mauris, rhoncus eu dictum vel, molestie ac sem. Nunc venenatis elit nunc, ac euismod enim pellentesque et.", "Marinko Rokvic", "2019-08-08");
INSERT INTO `posts` (title, body, author, created_at) VALUES ("Naslov drugi", "Suspendisse egestas aliquam ipsum. Quisque quis lorem pretium, porta sapien non, feugiat velit. Morbi ipsum nibh, euismod vitae neque in, ultricies mollis purus. Nam velit felis, maximus sit amet dapibus vel, rutrum luctus tellus. Praesent at metus fringilla, interdum tellus ac, viverra neque.", "Mile Kitic", "2019-01-08");
INSERT INTO `posts` (title, body, author, created_at) VALUES ("Naslov treci", "In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tempus, quam sed rhoncus consequat, dui tellus congue sem, eu egestas augue enim vitae lectus. Quisque quis lectus augue. Nulla ut lectus pharetra, ornare libero at, vestibulum turpis. Duis dictum vehicula cursus. In eu tortor vel nisl cursus accumsan et quis urna. Lorem ipsum dolor sit amet,", "Dzeki Chen", "2020-08-08");
CREATE TABLE `comments`
(
id INTEGER AUTO_INCREMENT,
author VARCHAR(60),
text text,
post_id INT UNIQUE NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (post_id) REFERENCES posts(id)
);
INSERT INTO `comments` (author, text, post_id) VALUES ("Zan Klod Van Dam", "Komentar number 1", 1);
INSERT INTO `comments` (author, text, post_id) VALUES ("Nixa Zuzu", "Komentar no2", 2);
INSERT INTO `comments` (author, text, post_id) VALUES ("Nolifer", "Tekst br 999909 komentara", 3);
SELECT * FROM `comments` LIMIT 1000;


test
////////////////////////////////////////////////////////////////

create table author (
id int auto_increment, 
ime varchar(65),
prezime varchar(65),
pol varchar(10),
author_id int,
primary key(id),
foreign key (author_id) references posts(id)
);
