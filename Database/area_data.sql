CREATE DATABASE IF NOT EXISTS WebDB;
USE WebDB;

CREATE TABLE IF NOT EXISTS AreaTB(
    spot_id INT PRIMARY KEY AUTO_INCREMENT;
    spot_type ENUM('regular', 'whitelisted', 'reserved') DEFAULT 'regular';
    occupation BOOLEAN DEFAULT FALSE;
);
