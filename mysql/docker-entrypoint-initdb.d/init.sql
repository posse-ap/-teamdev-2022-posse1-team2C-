DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;



DROP TABLE IF EXISTS students;

CREATE TABLE students (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) UNIQUE NOT NULL,
  furigana VARCHAR(255) NOT NULL,
  mail VARCHAR(255) NOT NULL,
  postal_code VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  telephone_number INT,
  birthday INT,
  university_id INT,
  faculity VARCHAR(255) NOT NULL,
  department VARCHAR(255) NOT NULL,
  graduate_year INT,
  free_comment VARCHAR(255),
  apply_time date
);

DROP TABLE IF EXISTS universities;

CREATE TABLE universities (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  university VARCHAR(255)
);


DROP TABLE IF EXISTS students_agent_connect;

CREATE TABLE students_agent_connect (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  apply_id INT
);


DROP TABLE IF EXISTS agents;

CREATE TABLE agents (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  agent VARCHAR(255) NOT NULL,
  URL VARCHAR(255),
  agent_president VARCHAR(255),
  president_furigana VARCHAR(255),
  address VARCHAR(255) NOT NULL,
  telephone_number INT,
  mail VARCHAR(255) NOT NULL,
  remaind_mail VARCHAR(255) NOT NULL
);


DROP TABLE IF EXISTS managers;

CREATE TABLE managers (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  furigana VARCHAR(255),
  telephone_number VARCHAR(255),
  mail VARCHAR(255),
  password VARCHAR(255) NOT NULL,
  agent_id VARCHAR(255) NOT NULL,
  faculity VARCHAR(255) NOT NULL
);


DROP TABLE IF EXISTS agent_info;

CREATE TABLE agent_info (
  agent_id INT,
  feautre VARCHAR(255),
  strengths VARCHAR(255),
  photo VARCHAR(255),
  employment_rate INT,
  suppliers_number VARCHAR(255) NOT NULL,
  job_opnings INT
);

DROP TABLE IF EXISTS specialties;

CREATE TABLE specialties (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  specialties VARCHAR(255) NOT NULL
);






DROP TABLE IF EXISTS specialties_agents_connect;

CREATE TABLE specialties_agents_connect (
  agent_id INT,
  specialties_id INT
);


DROP TABLE IF EXISTS recommendations;

CREATE TABLE recommendations (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  recommendations VARCHAR(255) NOT NULL
);


DROP TABLE IF EXISTS recommendations_agents_connect;

CREATE TABLE recommendations_agents_connect (
  agent_id INT,
  recommendations_id INT
);


DROP TABLE IF EXISTS tags;

CREATE TABLE tags (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  tags VARCHAR(255) NOT NULL
);


DROP TABLE IF EXISTS tags_agents_connect;

CREATE TABLE tags_agents_connect (
  agent_id INT,
  tags_id INT
);


DROP TABLE IF EXISTS CRAFT;

CREATE TABLE CRAFT (
  log_id VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);


























-- INSERT INTO
--   users
-- SET
--   email = 'test@posse-ap.com',
--   password = sha1('password');

-- DROP TABLE IF EXISTS events;

-- CREATE TABLE events (
--   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   title VARCHAR(255) NOT NULL,
--   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--   updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- );

-- INSERT INTO
--   events
-- SET
--   title = 'イベント1';

-- INSERT INTO
--   events
-- SET
--   title = 'イベント2';