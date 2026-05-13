CREATE DATABASE small_project;

USE small_project;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO users (name, email) VALUES
('Jignesh', 'jignesh@example.com'),
('Rahul', 'rahul@example.com'),
('Amit', 'amit@example.com');
