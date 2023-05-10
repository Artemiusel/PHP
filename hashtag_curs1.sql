CREATE DATABASE hashtag_curs;

USE hashtag_curs;

CREATE TABLE hashtags (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tag_name VARCHAR(50) NOT NULL,
  tag_description TEXT NOT NULL,
  author_name VARCHAR(50) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);