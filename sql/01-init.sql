CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT CREATE,SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

-- USE appDB;
-- CREATE TABLE IF NOT EXISTS users (
--   id INT(11) NOT NULL AUTO_INCREMENT,
--   login VARCHAR(20) NOT NULL,
--   password_hash CHAR(128) NOT NULL,
--   PRIMARY KEY (ID),
--   UNIQUE (login)
-- );

-- CREATE TABLE IF NOT EXISTS notes (
--   id INT(11) NOT NULL AUTO_INCREMENT,
--   user_id INT(11) NOT NULL,
--   title VARCHAR(128) NOT NULL,
--   body TEXT NOT NULL,
--   creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (ID),
--   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- );


-- INSERT INTO users(login, password_hash) VALUES ("matvey", "{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=");
