CREATE DATABASE IF NOT EXISTS WebDB;
USE WebDB;

CREATE TABLE IF NOT EXISTS ReserveTB(
    reserve_id INT PRIMARY KEY AUTO_INCREMENT;
    user_id INT NOT NULL;
    vehicle_id INT NOT NULL;
    spot_id INT NOT NULL;
    reserve_date DATETIME NOT NULL;

    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES user_data(user_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    ;
    
    CONSTRAINT fk_vehicle
        FOREIGN KEY (vehicle_id)
        REFERENCES Vehicle_data(vehicle_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    ;

    CONSTRAINT fk_spot
        FOREIGN KEY (spot_id)
        REFERENCES area_data(spot_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    ;
);
