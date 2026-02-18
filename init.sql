-- Run this SQL to create database and tables
CREATE DATABASE IF NOT EXISTS interview_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE interview_portal;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150) UNIQUE,
  password VARCHAR(255),
  role ENUM('candidate','admin') DEFAULT 'candidate',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS interviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  domain VARCHAR(100),
  level VARCHAR(50),
  created_by INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  interview_id INT,
  qtext TEXT,
  qtype ENUM('mcq','text') DEFAULT 'text',
  options TEXT NULL,
  correct_answer TEXT NULL,
  points INT DEFAULT 1,
  FOREIGN KEY (interview_id) REFERENCES interviews(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS attempts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  interview_id INT,
  score INT DEFAULT 0,
  total INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS answers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  attempt_id INT,
  question_id INT,
  answer TEXT,
  points_awarded INT DEFAULT 0
);
