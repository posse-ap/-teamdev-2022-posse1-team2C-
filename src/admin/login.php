<?php
session_start();
require('../dbconnect.php');

if (!empty($_POST)) {
  $login = $db->prepare('SELECT * FROM CRAFT WHERE log_id=? AND password=?');
  $login->execute(array(
    $_POST['loginID'],
    sha1($_POST['password'])
  ));
  $user = $login->fetchAll();
  if ($user) {
    $_SESSION = array();
    $_SESSION['CRAFT'] = $user[0]['id'];
    $_SESSION['time'] = time();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/index.php');
    exit();
  } else {
    $error = 'fail';
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/agent_login.css">
</head>

<body>
<!-- <div>
    <h1>管理者ログイン</h1>
    <form  method="POST">
      <input type="text" name="loginID" required>
      <input type="text" required name="password">
      <input type="submit" value="ログイン">
    </form>
    <a href="/index.php">イベント一覧</a>
  </div> -->
  <div class="content">
    <main class="main">
      <div class="login">
        <div class="login__inner">
          <h1 class="login__inner__title"><span>boozer</span>ログイン</h1>
          <form method="post" class="login__inner__form">
            <dl class="login__inner__form__list">
              <div class="login__inner__form__item">
                <dt><label for="loginID">ログインID</label></dt>
                <dd><input id="loginID" type="text" name="loginID"></dd>
              </div>
              <div class="login__inner__form__item">
                <dt><label for="password">パスワード</label></dt>
                <dd><input id="password" type="text" name="password"></dd>
              </div>
              <div class="login__inner__form__footer"></div>
              <button class="login__inner__form__button" id="submit">ログインする</button>
            </dl>
          </form>
        </div>
      </div>
    </main>
  </div>
  <a href="./students.php">生徒</a>
</body>

</html>