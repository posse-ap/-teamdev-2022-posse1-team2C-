DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;



-- DROP TABLE IF EXISTS test;

-- CREATE TABLE test (

--   graduate VARCHAR(255)
-- )ENGINE = InnoDB;


DROP TABLE IF EXISTS students;

CREATE TABLE students (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) UNIQUE NOT NULL,
  furigana VARCHAR(255) NOT NULL,
  mail VARCHAR(255) NOT NULL,
  postal_code VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  telephone_number INT,
  birthday date,
  university_id INT,
  faculty VARCHAR(255) NOT NULL,
  department VARCHAR(255) NOT NULL,
  graduate_year INT,
  free_comment VARCHAR(255),
  apply_time date
)ENGINE = InnoDB;

INSERT INTO students VALUES
(1,'武田龍一','タケダリュウイチ','ryuicih@keio.jp','2011111','東京都',89999,20010902,1,'理工学部','電気譲歩が',24,'あ',20220908);







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
  faculty VARCHAR(255) NOT NULL
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
--   CRAFT VALUES
-- -- SET
-- --   email = 'test@posse-ap.com',
-- --   password = sha1('password');
-- ('test@posse-ap.com',sha1('password'));






DROP TABLE IF EXISTS test;

CREATE TABLE test (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  university VARCHAR(255)
)ENGINE = InnoDB;



















-- CREATE TABLE users (
--   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   email VARCHAR(255) UNIQUE NOT NULL,
--   password VARCHAR(255) NOT NULL,
--   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--   updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- );

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


-- DROP TABLE IF EXISTS students;

-- CREATE TABLE students (
--   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   name VARCHAR(255) UNIQUE NOT NULL,
--   furigana VARCHAR(255) NOT NULL,
--   mail VARCHAR(255) NOT NULL,
--   postal_code VARCHAR(255) NOT NULL,
--   address VARCHAR(255) NOT NULL,
--   telephone_number INT,
--   birthday date,
--   university_id INT,
--   faculty VARCHAR(255) NOT NULL,
--   department VARCHAR(255) NOT NULL,
--   graduate_year INT,
--   free_comment VARCHAR(255),
--   apply_time date
-- )ENGINE = InnoDB;

-- INSERT INTO students VALUES
-- (1,'武田龍一','タケダリュウイチ','ryuicih@keio.jp','2011111','東京都',89999,20010902,1,'理工学部','電気譲歩が',24,'あ',20220908);


-- -- DROP TABLE IF EXISTS students;

-- -- CREATE TABLE students (
-- --   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
-- --   name VARCHAR(255) UNIQUE NOT NULL
-- -- )ENGINE = InnoDB;
-- -- INSERT INTO students VALUES
-- -- (1,'武田龍一');

-- DROP TABLE IF EXISTS test;

-- CREATE TABLE test (
--   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   postcode TEXT NOT NULL ,
--   address TEXT NOT NULL,
--   day DATETIME NOT NULL 
--   PRIMARY KEY (`id`)) ENGINE = InnoDB;



--   -- CREATE TABLE test ( id INT NOT NULL AUTO_INCREMENT , postcode TEXT NOT NULL , address TEXT NOT NULL,  day DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
