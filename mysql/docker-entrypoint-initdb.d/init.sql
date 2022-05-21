DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;





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
  university VARCHAR(255) NOT NULL,
  faculty VARCHAR(255) NOT NULL,
  course VARCHAR(255) NOT NULL,
  graduate INT,
  content VARCHAR(255) NOT NULL,
  apply_time DATETIME
)ENGINE = InnoDB;


INSERT INTO students VALUES
(1,'高梨彩音','タカナシアヤネ','ayane@posse.com','0010002','2345678','東京都港区赤坂1-1-1','2022-06-01','慶應義塾大学','カルチャー部','誕生日お祝い科',23,'コメント','2022-04-27 00:00:12'),
(2,'石井麻由奈','イシイマユナ','mayuna@posse.com','1234567','2345679','神奈川県横浜市港区日吉1-2-3','2001-05-01','慶應義塾大学','テック部','キューピー科',30,'POSSE大好き','2022-06-28 13:00:00'),
(3,'遠藤愛期','タカナシアヤネ','manaki@posse.com','0010002','2345678','東京都港区赤坂1-1-1','2022-06-01','慶應義塾大学','カルチャー部','誕生日お祝い科',23,'コメント','2022-04-27 00:00:12'),
(4,'中澤和貴','イシイマユナ','kazuki@posse.com','1234567','2345679','神奈川県横浜市港区日吉1-2-3','2001-05-01','慶應義塾大学','テック部','キューピー科',30,'POSSE大好き','2022-06-28 13:00:00'),
(5,'武田龍一','イシイマユナ','ryuichi@posse.com','1234567','2345679','神奈川県横浜市港区日吉1-2-3','2001-05-01','慶應義塾大学','テック部','キューピー科',30,'POSSE大好き','2022-06-28 13:00:00');

DROP TABLE IF EXISTS agents;

CREATE TABLE agents (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  agent VARCHAR(255),
  service__name VARCHAR(255),
  name__kanji VARCHAR(255),
  name__kana VARCHAR(255),
  url VARCHAR(255),
  postcode VARCHAR(255),
  address VARCHAR(255),
  tel VARCHAR(255),
  email VARCHAR(255),
  contact__email VARCHAR(255),
  agent__detail VARCHAR(255),
  service__agent__scale VARCHAR(255),
  service__aria VARCHAR(255),
  service__total FLOAT,
  service__offer FLOAT,
  service__useful FLOAT,
  service__reaction FLOAT,
  service__support FLOAT,
  service__detail VARCHAR(255)
);
INSERT INTO agents VALUES 
(1,'リクルート','リクナビ就職エージェント','北村吉弘','キタムラヨシヒロ','https://www.recruit.co.jp/',
'100-6640','東京都千代田区丸の内1-9-2グラントウキョウサウスタワー','03-6835-3000','recruit@gmail.com','recruitcontact@gmail.com','',
'大手企業','全国','4.2','4.2','4.3','4.2','4.3','リクナビ就職エージェントは、紹介求人数が圧倒的に多いのが魅力です。人材大手のリクルートが運営していることもあり、同系列の転職向けサービス「リクルートエージェント」では、30万件を超える求人を保有しています。また、アプリでやりとりが完結できることも特徴の一つです。アプリを入れて通知オンにしておけば、大事な連絡を見逃すことも無く、情報をより早くキャッチできるので活用しましょう。'),
(2,'ベネッセ','doda新卒エージェント','小林仁','コバヤシジン','https://www.benesse.co.jp/',
'700-8686','岡山市北区南方3-7-17 ','086-225-1100','benesse@gmail.com','benessecontact@gmail.com' ,'',
'大手企業','全国','4.0','4.2','4.1','3.9','4.1',
'doda新卒エージェントは、最速1週間のスピード内定が可能です。dodaでしか紹介されない特別選考ルートを案内されることもあり、選考にかかる労力と時間を大きく削減できます。さらに、キャリアカウンセラーの国家資格を持つアドバイザーが在籍しています。就職のプロから支援を受けられるので、他の就活生に差をつけられます。'),
(3,'マイナビ','マイナビ新卒紹介','土屋芳明','ツチヤヨシアキ','https://job.mynavi.jp/2023/',
'101-0003','東京都千代田区一ツ橋一丁目1番1号','03-6267-4000','mynavi@gmail.com','mynavicontact@gmail.com','',
'大手企業','全国','3.8','3.8','3.9','3.7','3.8','マイナビ新卒紹介は、企業と相互に情報提供しあっているため、企業から得た情報を就活生にも共有してくれます。その企業が何を重視しているか、面接で見ているポイントなどを熟知しているので、情報収集に活用しましょう。そして、就活セミナーや研修が充実しています。就活生を就職させることで、企業から手数料を受け取るビジネスなので、セミナーや研修にも力を入れ就活成功率を高めています。'),
(4,'キャリアデザインセンター','type就活エージェント','多田弘實','タダヒロミ','https://cdc.type.jp/',
'107-0052','東京都港区赤坂3-21-20赤坂ロングビーチビル','050-2018-2521','careerdesign@gmail.com','careerdesigcontact@gmail.com','',
'大手企業','首都圏','3.6','3.4','3.7','3.4','3.3',
'type就活エージェントは、創業20年という長い歴史があり、豊富なノウハウで就活サポートをしてくれます。また、1万社以上の企業情報を持っており、サポート力・求人量ともに業界最高クラスです。また、就職が決まるまで、都内の指定シェアハウスを無料で使えます。地方出身の就活生を全力で支援してくれるので、上京を考えている人はぜひ使いたいエージェントです。'),
(5,'ディスコ','キャリタス就活エージェント','関家一馬','セキヤカズマ','https://www.disco.co.jp/jp/',
'143-8580','東京都大田区大森北2-13-11','03-4590-1000','disco@gmail.com','discocontact@gmail.com','',
'','全国','3.6','3.8','3.6','3.3','3.7',
'キャリタス就活エージェントは、厳選したホワイト企業だけを紹介してくれます。独自に企業を審査し、直接取材を通して信頼できると判断した企業だけに絞っているので、安心して利用できます。「学生目線」をモットーにしており、サポートしてあげるという立場ではなく、就活生自身が納得できる就職を第一に考えてくれることで人気のエージェントです。'),
(6,'ポート','キャリアパーク就活エージェント','春日博文','カスガヒロフミ','https://www.theport.jp/',
'160-0023','東京都新宿区西新宿8-17-1 住友不動産新宿グランドタワー 12F','03-5937-6731','port@gmail.com','portcontact@gmail.com','',
'','全国','3.4','3.5','3.0','3.4','3.4',
'キャリアパーク就職エージェントは、平均5回以上の面談を通した徹底サポートが魅力です。それでいて最短1週間の内定スピードも実現しているので、就活に焦りを感じている人はぜひ利用したいエージェントです。また、厳選した優良求人を多数扱っています。全国417万社から、独自の基準で4,000社ほどまでに限定し、本当におすすめできる求人だけを紹介してくれます'),
(7,'NaS','Dig UP CAREER','鎌田睦','カマタリク','https://nas-inc.co.jp/',
'150-0011','東京都渋谷区東3-14-15 MOビル9F','','nas@gmail.com','nascontact@gmail.com','',
'ベンチャー企業','全国','3.3','3.3','3.4','3.5','3.2','DiG UP CAREERは、LINEで気軽にやり取りできるのがメリットです。メールだと連絡を見落としてしまうこともありますが、LINEなら日常的に利用するので、重要な連絡を見落とす心配がありません。さらに広告・人材・IT・不動産業界の求人を多く扱っています。該当の業界に就職したいと考えている人は、ぜひ登録して求人紹介してもらいましょう。'),
(8,'シンクトワイス','キャリセン就活エージェント','猪俣知明','イノマタトモアキ','https://www.thinktwice.co.jp/',
'107-0052','東京都港区赤坂4-8-14赤坂坂東ビルディング5階','03-6825-5450','thinktwice@gmail.com','thinktwicecontact@gmail.com','',
'','全国','3.3','3.6','3.7','3.4','3.2','キャリセン就活エージェントは、過去の利用者のESや内定情報を閲覧できます。どんなESで内定を勝ち取っているのか、面接で何を聞かれたのかなど情報収集できるので、活用しない手はありません。加えて、選考後のフィードバックの手厚さが魅力です。合否に関わらず、企業側からの印象や良かった点・悪かった点を伝えてくれるので、次の選考に反省を活かせます。'),
(9,'DYM','ミーツカンパニー','水谷佑毅','ミズタニユウキ','https://dym.asia/',
'141-0032','東京都品川区大崎 1-11-2 ゲートシティ大崎 イーストタワー10階','03-5745-0200','dym@gmail.com','dymcontact@gmail.com','',
'','全国','3.3','3.2','3.6','3.4','3.1','ミーツカンパニーは、就活イベントを通して優良企業を紹介しており、特別選考を案内してくれる場合もあります。特別選考では、面接回数が減るなどの待遇を受けられ、スムーズに就活を進められます。さらにグループディスカッションの練習にも最適です。就活生同士のディスカッションの場として利用できます。'),
(10,'ネオキャリア','就活エージェントneo','西澤亮一','ニシザワリョウイチ','https://www.neo-career.co.jp/',
'160-0023','東京都新宿区西新宿1-22-2 新宿サンエービル 2階','03-5908-8040','neocareer@gmail.com','neocareercontact@gmail.com','',
'ベンチャー企業','','3.2','3.1','3.4','3.5','2.9','就職エージェントneoは、就職サポート歴15年の老舗エージェントです。内定実績が4万件、紹介企業数が1万件と、業界でも最高クラスの実績があります。そして、10年後を見据えた企業紹介をしてくれます。就活生にとって、本当に相性の良い企業紹介を心がけており、入社後のミスマッチが少ないと評判のエージェントです。'),
(11,'HRクラウド','Job Spring','中島悠揮','ナカシマユウキ','https://hr-cloud.co.jp/',
'101-0051','東京都千代田区神田神保町2-5-3 北沢ビル8階A','03-6261-5989','hrcloud@gmail.com','hrcloudcontact@gmail.com','',
'ベンチャー企業','首都圏','3.0','3.3','3.1','3.1','2.7','Job Springは、LINE連携で登録・利用できます。メールだと連絡忘れや見落としが生じやすいですが、LINEなら日常的に利用するため、連絡漏れなどの心配がいりません。また、AIマッチングで適性診断ができます。診断を通して、自分に合った業種・職種が分かるので、まだ方向性を決めかねている人はぜひ参考にしてみましょう。'),
(12,'レバシーズ','キャリアチケット','岩槻知秀','イワツキトモヒデ','https://leverages.jp/',
'150-6190','東京都渋谷区渋谷2-24-12 渋谷スクランブルスクエア 24F・25F','03-5774-1632','leverages@gmail.com','leveragescontact@gmail.com','',
'ベンチャー企業','全国','3.0','3.3','3.1','2.8','3.0','キャリアチケットは、紹介企業を平均5社としています。何十件も受けるのではなく、本当に自分に合った企業とだけ選考を進めてくれるので、余計な労力と時間を省けます。そして、厳選された優良求人だけを扱っています。独自の基準で紹介企業を絞っているため、ホワイトな職場を求めている人におすすめです。');

DROP TABLE IF EXISTS students_agent_connect;

CREATE TABLE students_agent_connect (
  apply_id INT,
  agent_id INT
);

INSERT INTO students_agent_connect VALUES 
(1,1),
(1,2),
(2,2),
(2,3),
(3,1),
(3,2),
(4,1),
(5,2);

DROP TABLE IF EXISTS students_agents_mix;
CREATE table students_agents_mix  AS  
SELECT 
  students.id AS id,
  name__kanji,
  name__kana,
  email ,
  tel,
  postcode,
  address,
  birth ,
  university,
  faculty,
  course ,
  graduate,
  content,
  apply_time,
  agent_id

    FROM  students join students_agent_connect on id=apply_id;


DROP TABLE IF EXISTS supports;

CREATE TABLE supports (
  id INT,
  support VARCHAR(255)
);

INSERT INTO supports VALUES 
(1,'面接対策'),
(2,'セミナー/イベント開催'),
(3,'選考対策'),
(4,'企業紹介'),
(5,'ES添削'),
(6,'内定後のサポート'),
(7,'選考後のフォロー'),
(8,'個別面談'),
(9,'自己分析'),
(10,'特別選考'),
(11,'インターンシップ紹介'),
(12,'業界研究');


DROP TABLE IF EXISTS agents_supports_connect;

CREATE TABLE agents_supports_connect (
  agent_id INT,
  support_id INT
);

INSERT INTO agents_supports_connect VALUES 
(1,12),
(1,5),
(1,4),
(1,2),
(1,7),
(2,10),
(2,1),
(2,5),
(2,8),
(2,4),
(2,3),
(2,2),
(3,10),
(3,2),
(3,1),
(3,11),
(3,8),
(3,4),
(3,3),
(4,10),
(4,1),
(4,4),
(4,3),
(4,6),
(4,2),
(5,1),
(5,12),
(5,4),
(5,3),
(5,7),
(5,2),
(6,8),
(6,9),
(6,10),
(6,3),
(6,4),
(7,2),
(7,10),
(7,1),
(7,4),
(7,3),
(7,7),
(7,6),
(8,10),
(8,9),
(8,12),
(8,8),
(8,7),
(8,2),
(9,10),
(9,2),
(9,4),
(9,5),
(9,1),
(10,9),
(10,10),
(10,12),
(10,4),
(10,3),
(10,8),
(10,6),
(11,12),
(11,9),
(11,11),
(11,2),
(11,4),
(11,5),
(11,1),
(12,10),
(12,8),
(12,2),
(12,9),
(12,4),
(12,5),
(12,1);


DROP TABLE IF EXISTS agents_supports_mix;
CREATE table agents_supports_mix  AS  
SELECT 
agent_id,
support
    FROM  supports  join agents_supports_connect on support_id=supports.id;

DROP TABLE IF EXISTS clientscales;

CREATE TABLE clientscales (
  id INT,
  clientscale VARCHAR(255)
);

INSERT INTO clientscales VALUES 
(1,'ベンチャー企業'),
(2,'中小企業'),
(3,'大企業');


DROP TABLE IF EXISTS agents_clientscales_connect;

CREATE TABLE agents_clientscales_connect (
  agent_id INT,
  clientscales_id INT
);

INSERT INTO agents_clientscales_connect VALUES 
(1,2),
(1,3),
(2,2),
(2,3),
(3,2),
(3,3),
(4,2),
(4,3),
(7,1),
(10,1),
(10,3),
(11,1),
(12,1);


DROP TABLE IF EXISTS staffs;

CREATE TABLE staffs (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  staff__name__kanji VARCHAR(255) NOT NULL,
  staff__name__kana VARCHAR(255),


  staff__tel VARCHAR(255),
    staff__email VARCHAR(255),
  staff__detail VARCHAR(255)
);



INSERT INTO managers  VALUES
(1,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(2,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部'),
(3,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(4,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部'),
(5,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(6,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部'),
(7,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(8,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部'),
(9,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(10,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部'),
(11,'石川朝香','イシキワアサカ','09068757384','asaka@keio.jp','Asaka',1,'本部'),
(12,'武田龍一','タケダリュウイチ','08011330789','ryuuichi@keio.jp','Ryuichi',2,'日吉支部');


DROP TABLE IF EXISTS agent_info;

CREATE TABLE agent_info (
  agent_id INT,
  feature VARCHAR(255),
  strengths VARCHAR(255),
  photo VARCHAR(255),
  employment_rate INT,
  suppliers_number INT,
  job_opnings INT
);



INSERT INTO agent_info  VALUES
(1,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(2,'あさかだいすこあさかしか勝たん','あさか','',100,500,400),
(3,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(4,'あさかだいすこあさかしか勝たん','あさか','',100,500,400),
(5,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(6,'あさかだいすこあさかしか勝たん','あさか','',100,500,400),
(7,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(8,'あさかだいすこあさかしか勝たん','あさか','',100,500,400),
(9,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(10,'あさかだいすこあさかしか勝たん','あさか','',100,500,400),
(11,'ちょこが大好きちょこだよ','じゅんにセクハラされたことない','',50,1000,200),
(12,'あさかだいすこあさかしか勝たん','あさか','',100,500,400);



DROP TABLE IF EXISTS CRAFT;

CREATE TABLE CRAFT (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  log_id VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



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
