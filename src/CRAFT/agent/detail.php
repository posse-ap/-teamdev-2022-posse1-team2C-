<?php
require('./capsule/session.php');
if (!isset($_SESSION['student_number'])) {
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/CRAFT/agent/index.php');
  exit();
}

require(dirname(__FILE__) . "../../../dbconnect.php");
$student_number = $_SESSION['student_number'];
$agent_id = $_SESSION['agent_id'];

$students_stmt = $db->prepare("SELECT * from students_agents_mix WHERE agent_id = ?");
$students_stmt->bindValue(1, $agent_id);
$students_stmt->execute();
$students_data = $students_stmt->fetchAll();

$students_info = [
  '学生氏名',
  'フリガナ',
  'メールアドレス',
  '電話番号',
  '郵便番号',
  '住所',
  '生年月日',
  '大学',
  '学部',
  '学科',
  '卒業年度',
  'その他自由記述欄',
  '申請時刻'
];
$students_data_length = count($students_info);

$agents_stmt = $db->prepare("SELECT * from agents WHERE id = ?");
$agents_stmt->bindValue(1, $agent_id);
$agents_stmt->execute();
$agents_data = $agents_stmt->fetchAll();

$contact = "";
if (isset($_POST['done'])) {
    $contact = "連絡済みにしました";
    echo $contact;
    $contacts_connect_stmt = $db->exec('
UPDATE students_agents_connect SET contact_id = 1
WHERE agent_id = "' . $_SESSION['agent_id'] . '" and
apply_id = "' . $_SESSION['student_number'] . '"');
    $contacts_mix_stmt = $db->exec('DROP TABLE IF EXISTS students_agents_mix;
    CREATE table students_agents_mix AS
    SELECT
      students.id AS id,
      name__kanji,
      name__kana,
      email,
      tel,
      postcode,
      address,
      birth,
      university,
      faculty,
      course,
      graduate,
      content,
      apply_time,
      agent_id,
      contact_id
    FROM
      students
      join students_agents_connect on id = apply_id;');
      $_POST = array();
}
      if (isset($_POST['yet'])) {

        $contacts_connect_stmt = $db->exec('
        UPDATE students_agents_connect SET contact_id = 0
        WHERE agent_id = "' . $_SESSION['agent_id'] . '" and
        apply_id = "' . $_SESSION['student_number'] . '"');
        $contacts_mix_stmt = $db->exec('DROP TABLE IF EXISTS students_agents_mix;
        CREATE table students_agents_mix AS
        SELECT
          students.id AS id,
          name__kanji,
          name__kana,
          email,
          tel,
          postcode,
          address,
          birth,
          university,
          faculty,
          course,
          graduate,
          content,
          apply_time,
          agent_id,
          contact_id
        FROM
          students
          join students_agents_connect on id = apply_id;');
          $_POST = array();
          $contact = "未連絡にしました";
          echo $contact;
}

$students_count_stmt = $db->prepare("SELECT COUNT(*) from students_agents_mix WHERE agent_id=?");
$students_count_stmt->bindValue(1, $agent_id);
$students_count_stmt->execute();
$students_count_data = $students_count_stmt->fetchAll();
$students_count = $students_count_data[0]['COUNT(*)'];

$students_yet_count_stmt = $db->prepare("SELECT COUNT(*) from students_agents_mix WHERE agent_id=? and contact_id = 0");
$students_yet_count_stmt->bindValue(1, $agent_id);
$students_yet_count_stmt->execute();
$students_yet_count_data = $students_yet_count_stmt->fetchAll();
$students_yet_count = $students_yet_count_data[0]['COUNT(*)'];
// echo $students_yet_count;



$students_this_month_count_stmt = $db->prepare("SELECT COUNT(*) FROM students_agents_mix WHERE 
DATE_FORMAT(apply_time, '%Y%m') = DATE_FORMAT(now(), '%Y%m')  and agent_id=?");
$students_this_month_count_stmt->bindValue(1, $agent_id);
$students_this_month_count_stmt->execute();
$students_this_month_count_data = $students_this_month_count_stmt->fetchAll();
$students_this_month_count = $students_this_month_count_data[0]['COUNT(*)'];
// echo $students_this_month_count;

$students_last_month_count_stmt = $db->prepare("SELECT COUNT(*) FROM students_agents_mix WHERE 
DATE_FORMAT(apply_time, '%Y%m') = DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, '%Y%m')
and agent_id=?");
$students_last_month_count_stmt->bindValue(1, $agent_id);
$students_last_month_count_stmt->execute();
$students_last_month_count_data = $students_last_month_count_stmt->fetchAll();
$students_last_month_count = $students_last_month_count_data[0]['COUNT(*)'];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/index-agent.min.css">
  <link rel="stylesheet" href="../../assets/css/detail.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <main class="main">
    <ul class="main__list">
      <li class="main__item">
        <div class="main__item__account">
          <img src="../../assets/img/icon_avatar.svg" alt="icon">
          <p class="main__item__account__name"><?php echo $agents_data[0]['agent']; ?></p>
        </div>
        <hr>
        <ul class="score__list">
          <li class="score__item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="24" r="23.5" fill="#44A3EA" fill-opacity=".1" stroke="#44A3EA"></circle>
              <path d="M26 14h-8a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V20l-6-6z" stroke="#44A3EA" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M26 14v6h6M28 25h-8M28 29h-8M22 21h-2" stroke="#44A3EA" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="score__item__content">
              <small class="score__item__title">お問い合わせ数<br>【今月】</small>
              <br>
              <div class="score__item__value">
                <span class="score__item__number"><?php echo $students_this_month_count;?></span>
              </div>
            </div>
          </li>
          <li class="score__item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="24" r="23.5" fill="#E8AE06" fill-opacity=".1" stroke="#E8AE06"></circle>
              <path d="M30.7 17.5H17.3c-.9 0-1.6.7-1.6 1.7v8.3c0 1 .7 1.7 1.6 1.7h13.4c.9 0 1.6-.8 1.6-1.7v-8.3c0-1-.7-1.7-1.6-1.7zM20.7 32.5h6.6M24 29.2v3.3" stroke="#E8AE06" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="score__item__content">
              <small class="score__item__title">お問い合わせ数<br>【先月】</small>
              <br>
              <div class="score__item__value">
                <span class="score__item__number"><?php echo $students_last_month_count;?></span>
              </div>
            </div>
          </li>
          <li class="score__item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="24" r="23.5" fill="#7C6AE2" fill-opacity=".1" stroke="#7C6AE2"></circle>
              <g fill="#7C6AE2">
                <path d="M24 16.6a6.7 6.7 0 00-4.4 11.7c1 1 1 3.3 1 3.4v.3h6.8v-.3s0-2.3 1-3.4c1.5-1.3 2.3-3.1 2.3-5 0-3.7-3-6.7-6.7-6.7zm3.9 11l-.1.2c-1 1-1.1 2.7-1.1 3.5h-5.4c0-.8-.1-2.6-1.2-3.6a5.9 5.9 0 117.8 0z"></path>
                <path d="M24 18.3c-.2 0-.4.2-.4.4s.2.4.4.4c2.4 0 4.4 2 4.4 4.4 0 .2.2.4.4.4s.4-.2.4-.4c0-2.9-2.3-5.2-5.2-5.2zM26.7 32.5h-5.4a1 1 0 00-1 1c0 .6.5 1 1 1h5.3c.6 0 1-.4 1-1 0-.5-.4-1-1-1zm0 1.2h-5.4s-.2 0-.2-.2l.2-.2h5.3l.2.2-.1.2zM25.9 35H22a1 1 0 00-1 1c0 .5.5 1 1 1H26c.5 0 1-.5 1-1 0-.6-.5-1-1-1zm0 1.2H22L22 36c0-.2.1-.2.2-.2H26s.2 0 .2.2l-.2.2zM24 14.6c.2 0 .4-.2.4-.4v-2.8c0-.2-.2-.4-.4-.4s-.4.2-.4.4v2.8c0 .2.2.4.4.4zM30.8 13c-.2 0-.4 0-.6.2l-1.5 2.3c-.1.2 0 .4.1.6h.2c.2 0 .3 0 .4-.2l1.5-2.3c.1-.1 0-.4-.1-.5zM19.1 16h.2c.2-.2.3-.4.1-.6L18 13a.4.4 0 00-.6 0c-.2 0-.3.3-.1.5l1.5 2.3c0 .2.2.2.3.2zM16.2 18.6l-2.4-1.3c-.2-.1-.5 0-.6.1-.1.2 0 .5.2.6l2.4 1.3h.2c.2 0 .3 0 .4-.2 0-.2 0-.4-.2-.5zM34.8 17.4c-.1-.2-.4-.2-.6-.1l-2.4 1.3c-.2 0-.3.3-.2.5 0 .2.2.2.4.2h.2l2.4-1.3c.2-.1.3-.4.2-.6z"></path>
              </g>
            </svg>
            <div class="score__item__content">
              <small class="score__item__title">お問い合わせ数<br>【累計】</small>
              <br>
              <div class="score__item__value">
                <span class="score__item__number"><?php echo $students_count;?></span>
              </div>
            </div>
          </li>
        </ul>
        <hr>
        <div class="main__item__detail"><a href="#">詳細情報を見る</a></div>
      </li>

      <li class="main__item">
        <div class="myCard">
          <p class="myCard__title"><span class="myCard__title__agent"><?php echo $agents_data[0]['agent']; ?></span>様への新規お問い合わせ数</p>
          <span class="myCard__number"><?php echo $students_yet_count;?></span>
          <p class="myCard__text">対応してない学生に返信をしましょう<br>お問い合わせをいただいた学生の詳細は下記をご覧ください</p>
        </div>
      </li>

      <li class="main__item">
        <div class="student">
          <div class="student__detail">
            <p class="student__detail__title">【学生詳細情報】</p>
            <dl class="student__detail__list">
              <?php for ($i = 1; $i <= $students_data_length; $i++) { ?>
                <div class="student__detail__item">
                  <dt><?php echo $students_info[$i - 1]; ?></dt>
                  <dd><?php echo $students_data[$student_number - 1][$i]; ?></dd>
                </div>
              <?php }; ?>
            </dl>
          </div>
          
          <div class="student__operation">
          <!-- <form method="post"> -->
            <form method="POST" class="student__operation__list">
            
              <li class="student__operation__item">
                <button>取消申請</button>
              </li>
              <li class="student__operation__item">
                <button>メールを送信</button>
              </li>
              <li class="student__operation__item">
                <button name="done">連絡済にする</button>
              </li>
              <li class="student__operation__item">
                <button name="yet">未連絡に戻す</button>
              </li>
              
            </form>
            <!-- </form> -->
          </div>
          
        </div>
      </li>
    </ul>
  </main>
</body>

</html>