CREATE DATABASE IF NOT EXISTS WebDB;
USE WebDB;

CREATE TABLE IF NOT EXISTS VehicleTB(
    vehicle_id INT PRIMARY KEY AUTO_INCREMENT;
    user_id INT NOT NULL;
    vehicle_type ENUM('motorcycle', 'car', 'bus', 'truck') DEFAULT 'motorcycle';
    plate_number VARCHAR(100) NOT NULL;

    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES user_data(user_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    ;
);
