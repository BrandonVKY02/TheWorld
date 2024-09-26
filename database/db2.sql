CREATE DATABASE theworldmusic CHARACTER SET utf8 COLLATE utf8_general_ci;
USE theworldmusic;

CREATE TABLE users (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE, 
  name VARCHAR(255),  
  password VARCHAR(255) 
);

CREATE TABLE music (
  songid INT(11) AUTO_INCREMENT PRIMARY KEY,
  artist VARCHAR(255),
  songname VARCHAR(255),
  genre VARCHAR(255),
  uploadedby INT(11),
  img longblob,
  FOREIGN KEY (uploadedby) REFERENCES user(id)
);

CREATE TABLE favmusic (
  id INT(11),
  songid INT(11),
  FOREIGN KEY (id) REFERENCES user(id),
  FOREIGN KEY (songid) REFERENCES music(songid)
);

CREATE TABLE contactus ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(50) NOT NULL, 
    email VARCHAR(50) NOT NULL, 
    messages TEXT NOT NULL 
);