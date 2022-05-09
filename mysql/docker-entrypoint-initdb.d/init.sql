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
  name__kanji VARCHAR(255)  NOT NULL,
  name__kana VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  tel VARCHAR(255) NOT NULL,
  postcode VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  birth date,
  university INT,
  faculty VARCHAR(255) NOT NULL,
  course VARCHAR(255) NOT NULL,
  graduate INT,
  content VARCHAR(255),
  apply_time date
)ENGINE = InnoDB;


INSERT INTO students VALUES
(1,'高梨彩音','タカナシアヤネ','ayane@posse.com','0010002','2345678','東京都港区赤坂1-1-1','2022-06-01',1,'カルチャー部','誕生日お祝い科',23,'コメント','2022-04-27'),
(2,'石井麻由奈','イシイマユナ','mayuna@posse.com','1234567','2345679','神奈川県横浜市港区日吉1-2-3','2001-05-01',2,'テック部','キューピー科',30,'POSSE大好き','2022-06-28');

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
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255),
  name__kanji VARCHAR(255),
  name__kana VARCHAR(255),
  email VARCHAR(255) NOT NULL,
  tel VARCHAR(255) NOT NULL,
  postcode VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  content VARCHAR(255) NOT NULL,
  remind_mail VARCHAR(255) NOT NULL
);
INSERT INTO agents VALUES 
(1,'POSSE（株）','https://posse-ap.com/','石田大輝','イシダダイキ','posse@mr.com','09012345678','1234567','千葉県ディズニーランド市','コメント','mr-posse@rikkyo.jp'),
(2,'表参道（株）','https://posse-ap.com/','小堺駿','コザカイシュン','makisyun@gmail.com','08052340011','2345678','千葉県野田市','コメント','harbors@docomo.ne.jp');


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
(1,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(2,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部');


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
(1,'理系'),
(2,'文系'),
(3,'その他');

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
(1,'ES添削'),
(2,'面接'),
(3,'グループディスカッション');


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
(1,'理系'),
(2,'文系'),
(3,'エンジニア'),
(4,'コンサル'),
(5,'マスコミ');


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

-- DROP TABLE IF EXISTS CRAFT;

-- CREATE TABLE CRAFT (
--   log_id VARCHAR(255) NOT NULL,
--   password VARCHAR(255) NOT NULL
-- );

-- INSERT INTO CRAFT VALUES 
-- ('boozer','CRAFT');


DROP TABLE IF EXISTS CRAFT;

CREATE TABLE CRAFT (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  log_id VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO

  agent_login
SET
  log_id = 'test1@posse-ap.com',
  password =sha1('password1');

INSERT INTO
  agent_login
SET
  log_id = 'test2@posse-ap.com',
  password =sha1('password2');


-- DROP TABLE IF EXISTS agent_login;

-- CREATE TABLE agent_login (
--   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   log_id VARCHAR(255) NOT NULL,
--   password VARCHAR(255) NOT NULL
-- );

-- INSERT INTO agent_login VALUES 
-- ('boozer1',sha1('CRAFT')),
-- ('boozer2',sha1('CRAFT'));

DROP TABLE IF EXISTS agent_login;

CREATE TABLE agent_login (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  log_id VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
  agent_login
SET
  log_id = 'test1@posse-ap.com',
  password =sha1('password1');

INSERT INTO
  agent_login
SET
  log_id = 'test2@posse-ap.com',
  password =sha1('password2');


INSERT INTO
  agent_login
SET
  log_id = 'test2@posse-ap.com',
  password =sha1('password2');

