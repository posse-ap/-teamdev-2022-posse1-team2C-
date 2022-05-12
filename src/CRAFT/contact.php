<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/contact_craft.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <h2 class="main__title">CRAFT</h2>
        <span class="main__text">
          あなたに合った企業が見つかる！<br />就活エージェント比較サイト
        </span>
        <p class="title">
          「CRAFT」へのご要望・ご質問
        </p>

        <form method="post" action="/" class="contact__form" role="contact__form">
          <dl class="contact__form__list">
            <div class="contact__form__item">
              <dt><label for="name">氏名</label></dt>
              <dd><input id="name" type="text" name="name" value="<?php echo $_SESSION['name'] ;?>"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="email">メールアドレス</label></dt>
              <dd><input id="email" type="email" name="email" value="<?php echo $_SESSION['email'] ;?>"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="tel">電話番号</label></dt>
              <dd><input id="tel" type="text" name="tel" value="<?php echo $_SESSION['tel'] ;?>"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="subject">件名</label></dt>
              <dd><input id="subject" type="text" name="subject"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="content">内容</label></dt>
              <dd><textarea id="content" type="text" name="content"></textarea></dd>
            </div>
            <div class="contact__form__footer">
              <button class="contact__form__button" type="submit">送信する</button>
            </div>
          </dl>
        </form>

        <div class="contact__thanks" role="contact__form" hidden>
          <p class="contact__thanks__complete">
            お問い合わせを受け付けました
          </p>
          <p class="contact__thanks__text">
            この度はお問い合わせしていただき、誠にありがとうございます。<br />ご入力いただきました内容を確認後、担当者よりご連絡させていただきます。
          </p>
          <button class="contact__thanks__button">
            トップページへ戻る
          </button>
        </div>
      </main>

      <?php require  "./capsule/aside.php"; ?>
    </div>
  </div>

  <script src="../assets/js/contact.js"></script>
</body>

</html>