CREATE DATABASE IF NOT EXISTS dream_job_db;
USE dream_job_db;

CREATE TABLE IF NOT EXISTS applications (
    application_id   INT AUTO_INCREMENT PRIMARY KEY,
    first_name       VARCHAR(50)  NOT NULL,
    last_name        VARCHAR(50)  NOT NULL,
    email            VARCHAR(100) NOT NULL,
    phone            VARCHAR(20)  NOT NULL,
    position_applied VARCHAR(100) NOT NULL,
    years_experience INT          NOT NULL DEFAULT 0,
    programming_lang VARCHAR(100) NOT NULL,
    expected_salary  DECIMAL(10,2) NOT NULL,
    date_added       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
