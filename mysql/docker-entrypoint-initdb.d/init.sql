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
  faculty VARCHAR(255) NOT NULL,
  department VARCHAR(255) NOT NULL,
  graduate_year INT,
  free_comment VARCHAR(255),
  apply_time date
);

INSERT INTO students VALUES
('高梨彩音','タカナシアヤネ','ayane@posse.com','0010002','東京都港区赤坂1-1-1','2022/06/01',1,'カルチャー部','誕生日お祝い科',23,'コメント',2022/04/27),
('石井麻由奈','イシイマユナ','mayuna@posse.com','1234567','神奈川県横浜市港区日吉1-2-3','2001/05/01',2,'テック部','キューピー科',30,'POSSE大好き',2022/06/28)

DROP TABLE IF EXISTS universities;

CREATE TABLE universities (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  university VARCHAR(255)
);

INSERT INTO universities VALUES
(1,'POSSE大学'),
(2,'立應大学');


DROP TABLE IF EXISTS students_agent_connect;

CREATE TABLE students_agent_connect (
  -- id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  apply_id INT,
  agent_id INT
);

INSERT INTO students_agent_connect VALUES 
(1,1),
(1,2),
(2,2),
(2,3);


DROP TABLE IF EXISTS agents;

CREATE TABLE agents (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  agent VARCHAR(255) NOT NULL,
  URL VARCHAR(255),
  agent_president VARCHAR(255),
  president_furigana VARCHAR(255),
  postal_code VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  telephone_number INT,
  mail VARCHAR(255) NOT NULL,
  remind_mail VARCHAR(255) NOT NULL
);
INSERT INTO agents VALUES 
('POSSE（株）','https://posse-ap.com/','石田大輝','イシダダイキ','1234567','千葉県ディズニーランド市',09012345678,'posse@mr.com','mr-posse@rikkyo.jp'),
('表参道（株）','https://posse-ap.com/','小堺駿','コザカイシュン','2345678','千葉県野田市',08052340011,'makisyun@gmail.com','harbors@docomo.ne.jp')


DROP TABLE IF EXISTS managers;

CREATE TABLE managers (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  furigana VARCHAR(255),
  telephone_number VARCHAR(255),
  mail VARCHAR(255),
  password VARCHAR(255) NOT NULL,
  agent_id INT,
  faculty VARCHAR(255) NOT NULL
);



INSERT INTO managers  VALUES
('石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
('武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部');


DROP TABLE IF EXISTS agent_info;

CREATE TABLE agent_info (
  agent_id INT,
  feautre VARCHAR(255),
  strengths VARCHAR(255),
  photo VARCHAR(255),
  employment_rate INT,
  suppliers_number INT,
  job_opnings INT
);



INSERT INTO agent_info  VALUES
(1,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(2,'あさかだいすこあさかしか勝たんby龍一','あさかに告白したいがためらってる','',100,500,400);


DROP TABLE IF EXISTS specialties;

CREATE TABLE specialties (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  specialties VARCHAR(255) NOT NULL
);
INSERT INTO specialties  VALUES
('理系'),('文系'),('その他');

DROP TABLE IF EXISTS specialties_agents_connect;

CREATE TABLE specialties_agents_connect (
  agent_id INT,
  specialties_id INT
);

INSERT INTO specialties_agents_connect  VALUES
(1,1),(1,3),(2,3);


DROP TABLE IF EXISTS recommendations;

CREATE TABLE recommendations (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  recommendations VARCHAR(255) NOT NULL
);

INSERT INTO recommendations  VALUES
('ES添削'),
('面接'),
('グループディスカッション');


DROP TABLE IF EXISTS recommendations_agents_connect;

CREATE TABLE recommendations_agents_connect (
  agent_id INT,
  recommendations_id INT
);

INSERT INTO recommendations_agents_connect  VALUES
(1,3),(2,1),(2,2);


DROP TABLE IF EXISTS tags;

CREATE TABLE tags (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  tags VARCHAR(255) NOT NULL
);

INSERT INTO tags VALUES 
('理系'),
('文系'),
('エンジニア'),
('コンサル'),
('マスコミ');


DROP TABLE IF EXISTS tags_agents_connect;

CREATE TABLE tags_agents_connect (
  agent_id INT,
  tags_id INT
);


INSERT INTO tags_agents_connect VALUES 
(1,1),
(1,2),
(1,3),
(2,2),
(2,3);

DROP TABLE IF EXISTS CRAFT;

CREATE TABLE CRAFT (
  log_id VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO CRAFT VALUES 
('boozer','CRAFT');

























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
