CREATE DATABASE IF NOT EXISTS WebDB;
USE WebDB;

CREATE TABLE IF NOT EXISTS TaxTB(
    tax_id INT PRIMARY KEY AUTO_INCREMENT;
    tax_value DECIMAL(10,2) NOT NULL;
    vehicle_type ENUM('motorcycle', 'car', 'bus', 'truck') DEFAULT 'motorcycle';
);
