CREATE DATABASE IF NOT EXISTS premillinary_db;
USE premillinary_db;

CREATE TABLE IF NOT EXISTS users_tb (
    user_id   INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    CASE user_role
        WHEN 1 THEN "admin"
        WHEN 2 THEN "security"
        WHEN 3 THEN "employee"
        ELSE        "visitor"
    END AS current_role NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS vehicle_tb (
    vehicle_id   INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plate_number VARCHAR(30) NOT NULL,
    CASE vehicle_type
        WHEN 1 THEN "motorcycle"
        WHEN 2 THEN "car"
        WHEN 3 THEN "bus"
        WHEN 4 THEN "truck"
        ELSE        "other"
    END AS current_vehicle NOT NULL,

    user_id INT(2),
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
    REFERENCES users_tb(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS areas_tb (
    area_id         INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    total_spots     INT(10) NOT NULL,
    vacant_spots    INT(10) NOT NULL,
    occcupied_spots INT(10) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS reservation_tb (
    reservation_id   INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reserved_spot    INT(10) NOT NULL,
    reservation_date DATETIME   NOT NULL,

    user_id INT(2),
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
    REFERENCES users_tb(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS whitelist_tb (
    whitelist_id     INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    whitelisted_spot INT(10) NOT NULL,
    whitelisted_time DATETIME   NOT NULL,

    user_id INT(2),
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
    REFERENCES users_tb(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS blacklist_tb (
    blacklist_id        INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    blacklisted_spot    INT(10) NOT NULL,
    blacklisted_duration DATETIME   NOT NULL,

    user_id INT(2),
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
    REFERENCES users_tb(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS logs_tb (
    log_id   INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lod_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    log_info VARCHAR(30) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS reports_tb (
    report_id   INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    report_info VARCHAR(30) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS taxes_tb (
    tax_id     INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tax_change TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    tax_value  VARCHAR(30) NOT NULL
) ENGINE=InnoDB;
