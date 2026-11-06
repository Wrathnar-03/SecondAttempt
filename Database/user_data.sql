CREATE DATABASE IF NOT EXISTS WebDB;
USE WebDB;

CREATE TABLE IF NOT EXISTS UserTB(
    user_id INT PRIMARY KEY AUTO_INCREMENT;
    user_name VARCHAR(100) NOT NULL;
    user_password VARCHAR(225) NOT NULL;
    user_type ENUM('admin', 'security', 'visitor') DEFAULT 'admin';
);
