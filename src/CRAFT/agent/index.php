<?php
require('./capsule/session.php');
require(dirname(__FILE__) . "../../../dbconnect.php");

$agent_id =  $_SESSION['agent_id'];

$agents_stmt = $db->prepare("SELECT * from agents WHERE id = ?");
$agents_stmt->bindValue(1, $agent_id);
$agents_stmt->execute();
$agents_data = $agents_stmt->fetchAll();


for ($j = 0; $j <= 2; $j++) {

    $students_stmt_[$j] = $db->prepare("SELECT * from students_agents_mix WHERE agent_id = ? and contact_id=?");
    $students_stmt_[$j]->bindValue(1, $agent_id);
    $students_stmt_[$j]->bindValue(2, $j);
    $students_stmt_[$j]->execute();
    $students_data_[$j] = $students_stmt_[$j]->fetchAll();
    // echo $students_data_[$j][0]['id'];


    $students_count_stmt_[$j] = $db->prepare("SELECT COUNT(*) from students_agents_mix WHERE agent_id=? and contact_id=?");
    $students_count_stmt_[$j]->bindValue(1, $agent_id);
    $students_count_stmt_[$j]->bindValue(2, $j);
    $students_count_stmt_[$j]->execute();
    $students_count_data_[$j] = $students_count_stmt_[$j]->fetchAll();
    $students_count_[$j] = $students_count_data_[$j][0]['COUNT(*)'];
    // echo $j;
}

// echo $students_data_[2][0]['id'];


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




if (isset($_POST['student_number'])) {
    $_SESSION['student_number'] = $_POST['student_number'];
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/CRAFT/agent/detail.php');
    exit();
}
// echo $students_data_[1][1]['id']

// echo $students_count_[2];

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
                                <span class="score__item__number"><?php echo $students_this_month_count; ?></span>
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
                                <span class="score__item__number"><? echo $students_last_month_count; ?></span>
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
                                <span class="score__item__number"><?php echo $students_count; ?></span>
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
                    <span class="myCard__number"><?php echo $students_yet_count; ?></span>
                    <p class="myCard__text">対応してない学生に返信をしましょう<br>お問い合わせをいただいた学生の詳細は下記をご覧ください</p>
                </div>
            </li>

            <li class="main__item">
                <div class="student">
                    <div class="student__tab" role="tablist">
                        <button class="student__tab__button" role="tab" aria-controls="panel1" aria-selected="true">未対応の学生</button>
                        <button class="student__tab__button" role="tab" aria-controls="panel2" aria-selected="false">対応済の学生</button>
                        <button class="student__tab__button" role="tab" aria-controls="panel3" aria-selected="false">お問い合わせを断った学生</button>
                    </div>
                    <div class="student__panel">


                        <div id="panel1" role="tabpanel" class="student__panel__item">
                            <h3 class="student__panel__item__title">未対応の学生一覧</h3>
                            <form action="./index.php" method="POST">
                                <dl class="student__panel__item__content">
                                    <div class="student__panel__item__content__piece">
                                        <dt>氏名</dt>
                                        <?php for ($i = 1; $i <= $students_count_[0]; $i++) { ?>
                                            <dd><?php echo $students_data_[0][$i - 1]['name__kanji'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>メールアドレス</dt>
                                        <?php for ($i = 1; $i <= $students_count_[0]; $i++) { ?>
                                            <dd><?php echo $students_data_[0][$i - 1]['email'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>大学</dt>
                                        <?php for ($i = 1; $i <= $students_count_[0]; $i++) { ?>
                                            <dd><?php echo $students_data_[0][$i - 1]['university']; ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>卒業年度</dt>
                                        <?php for ($i = 1; $i <= $students_count_[0]; $i++) { ?>
                                            <dd><?php echo $students_data_[0][$i - 1]['graduate'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>自由記述</dt>
                                        <?php for ($i = 1; $i <= $students_count_[0]; $i++) { ?>
                                            <dd><?php echo $students_data_[0][$i - 1]['content'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>詳細</dt>
                                        <?php for ($i = 0; $i < $students_count_[0]; $i++) { ?>
                                            <dd><button type="submit" name="student_number" value="<?php echo $students_data_[0][$i]['id']; ?>">詳細</button></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>申請時刻</dt>
                                        <?php for ($i = 1; $i <= $students_count_[0]; $i++) { ?>
                                            <dd><?php echo $students_data_[0][$i - 1]['apply_time']; ?></dd>
                                        <?php }; ?>
                                    </div>
                                </dl>
                            </form>
                        </div>


                        <div id="panel2" role="tabpanel" class="student__panel__item" hidden>
                            <h3 class="student__panel__item__title">対応済みの学生一覧</h3>
                            <form method="POST">
                                <dl class="student__panel__item__content">
                                    <div class="student__panel__item__content__piece">
                                        <dt>氏名</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><?php echo $students_data_[1][$i - 1]['name__kanji'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>メールアドレス</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><?php echo $students_data_[1][$i - 1]['email'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>大学</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><?php echo $students_data_[1][$i - 1]['university']; ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>卒業年度</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><?php echo $students_data_[1][$i - 1]['graduate'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>自由記述</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><?php echo $students_data_[1][$i - 1]['content'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>詳細</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><button type="submit" name="student_number" value="<?php echo $students_data_[1][$i - 1]['id']; ?>">詳細</button></dd>
                                        <?php }; ?>
                                    </div>


                                    <div class="student__panel__item__content__piece">
                                        <dt>申請時刻</dt>
                                        <?php for ($i = 1; $i <= $students_count_[1]; $i++) { ?>
                                            <dd><?php echo $students_data_[1][$i - 1]['apply_time'] ?></dd>
                                        <?php }; ?>
                                    </div>

                                </dl>
                            </form>
                        </div>


                        <div id="panel3" role="tabpanel" class="student__panel__item" hidden>
                            <h3 class="student__panel__item__title">お問い合わせを断った学生一覧</h3>
                            <form method="POST">
                                <dl class="student__panel__item__content">
                                    <div class="student__panel__item__content__piece">
                                        <dt>氏名</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><?php echo $students_data_[2][$i - 1]['name__kanji'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>メールアドレス</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><?php echo $students_data_[2][$i - 1]['email'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>大学</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><?php echo $students_data_[2][$i - 1]['university']; ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>卒業年度</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><?php echo $students_data_[2][$i - 1]['graduate'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>自由記述</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><?php echo $students_data_[2][$i - 1]['content'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                    <div class="student__panel__item__content__piece">
                                        <dt>詳細</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><button type="submit" name="student_number" value="<?php echo $students_data_[2][$i - 1]['id']; ?>">詳細</button></dd>
                                        <?php }; ?>
                                    </div>


                                    <div class="student__panel__item__content__piece">
                                        <dt>申請時刻</dt>
                                        <?php for ($i = 1; $i <= $students_count_[2]; $i++) { ?>
                                            <dd><?php echo $students_data_[2][$i - 1]['apply_time'] ?></dd>
                                        <?php }; ?>
                                    </div>
                                </dl>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </main>

    <script src="https://kit.fontawesome.com/65129cd335.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/index-agent.js"></script>
</body>

</html>