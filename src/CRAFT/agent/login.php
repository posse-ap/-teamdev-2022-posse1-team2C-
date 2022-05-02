<?php
session_start();
require('../../dbconnect.php');

if (!empty($_POST)) {
  $login = $db->prepare('SELECT * FROM  WHERE email=? AND password=?');
  $login->execute(array(
    $_POST['email'],
    sha1($_POST['password'])
  ));
  $user = $login->fetch();

  if ($user) {
    $_SESSION = array();
    $_SESSION['user_id'] = $user['id'];
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
  <title>管理者ログイン</title>
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/agent_login.css">
</head>

<body>
  <div class="content">
    <main class="main">
      <!-- <h1>管理者ログイン</h1>
      <form action="/admin/login.php" method="POST">
        <input type="email" name="email" required>
        <input type="password" required name="password">
        <input type="submit" value="ログイン">
      </form>
      <a href="">イベント一覧</a> -->
      <div class="login">
        <div class="login__inner">
          <h1 class="login__inner__title"><span>CRAFT</span>エージェント企業画面ログイン</h1>
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
          <p class="login__inner__text">ログインID・パスワードを忘れた方は<a href="#" class="login__inner__nav">こちら</a></p>
          <hr class="login__inner__border"></hr>
          <p class="login__inner__text">ログインID・パスワードをお持ちでない方は<a href="#" class="login__inner__nav">こちら</a></p>
          <button class="login__inner__new">エージェント会員に申し込む</button>
        </div>
      </div>
    </main>
  </div>
</body>

</html>