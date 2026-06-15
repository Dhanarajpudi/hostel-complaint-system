-- Create Database
CREATE DATABASE IF NOT EXISTS hostel_db;
USE hostel_db;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100) UNIQUE,
password VARCHAR(255),
role VARCHAR(20)
);

-- COMPLAINTS TABLE
CREATE TABLE IF NOT EXISTS complaints (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
complaint TEXT,
status VARCHAR(50) DEFAULT 'Pending',
priority VARCHAR(20),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- SAMPLE ADMIN USER (password = 1234)
-- NOTE: This is a hashed password for '1234'
INSERT INTO users (name, email, password, role) VALUES
('Admin', '[admin@gmail.com](mailto:admin@gmail.com)', '$2y$10$wH7zQw8Qp9vZ7wXKQZ3e6u5Xj2kZ5gQZ3yJX7xvFz7Q7k9kz9Zx2G', 'admin');

