CREATE DATABASE yeticave
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories
(
  id    INT AUTO_INCREMENT PRIMARY KEY,
  cat_id  VARCHAR(128) NOT NULL UNIQUE,
  cat_name VARCHAR(128) NOT NULL
);

CREATE TABLE users
(
  id         INT AUTO_INCREMENT PRIMARY KEY,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email      VARCHAR(64)  NOT NULL UNIQUE,
  name       VARCHAR(90)  NOT NULL,
  password   VARCHAR(50)  NOT NULL,
  contacts   VARCHAR(128) NOT NULL
);

CREATE TABLE lots
(
  id          INT AUTO_INCREMENT PRIMARY KEY,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name        VARCHAR(64)  NOT NULL,
  description VARCHAR(220) NOT NULL,
  img_link    VARCHAR(300) NOT NULL,
  start_price INT          NOT NULL,
  end_date    DATETIME     NOT NULL,
  bet_step    INT          NOT NULL,
  created_by  INT          NOT NULL,
  category_id INT          NOT NULL,
  win_user_id INT          NOT NULL
);
CREATE TABLE bet
(
  id         INT AUTO_INCREMENT PRIMARY KEY,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price      INT NOT NULL,
  user_id    INT NOT NULL,
  lot_id     INT NOT NULL
);
