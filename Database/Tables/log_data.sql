CREATE DATABASE IF NOT EXISTS WebDB;
USE WebDB;

CREATE TABLE IF NOT EXISTS LogTB(
    log_id INT PRIMARY KEY AUTO_INCREMENT;
    user_id INT NOT NULL;
    creation_time DATETIME NOT NULL;
    log_type ENUM('entering', 'exiting', 'report', 'other') DEFAULT 'other';
    log_details VARCHAR(100) NOT NULL;

    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES user_data(user_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    ;
);
