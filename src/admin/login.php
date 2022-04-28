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
  <div class="content">
    <main class="main">
      <div class="login">
        <div class="login__inner">
          <h1 class="login__inner__title"><span>boozer</span>ログイン</h1>
          <form action="/" method="" class="login__inner__form">
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
</body>

</html>