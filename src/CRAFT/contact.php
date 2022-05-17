<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/contact.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <p class="title">
          「CRAFT」へのご要望・ご質問
        </p>

        <div class="attention">
          <p class="attention__title">お問い合わせ前の注意事項</p>
          <div class="attention__inner">
            <ul class="attention__inner__list">
              <li class="attention__inner__item">
                お問い合わせ前に、<a href="./q&a.php">よくある質問</a>をご確認ください。
              </li>
              <li class="attention__inner__item">
                お問い合わせの内容によりましては、お時間を頂戴する場合がございます。
              </li>
              <li class="attention__inner__item">
                皆様からいただいたご意見・ご感想・お問い合わせは、必ず目を通しておりますが、個別に返信・対応をお約束するものではございません。あらかじめご了承ください。
              </li>
              <li class="attention__inner__item">
                本お問い合わせフォームは、エージェント企業へのお問い合わせをお受けする窓口ではございません。エージェント企業へのお問い合わせをご希望の方は<a href="./apply.php">こちら</a>からよろしくお願いいたします。
              <li class="attention__inner__item">
                いただいた個人情報は、お問合わせ内容の確認・返信以外には使用いたしません。同意いただいた上で、お問い合わせください。本サービスの個人情報保護方針および、個人情報のお取り扱いについては、<a href="#">こちら</a>よりご確認いただけます。
              </li>
              <li class="attention__inner__item">
                返信内容の二次使用は固くお断りいたします。
              </li>
            </ul>
          </div>
        </div>

        <form action="/" class="contact__form" role="contact__form">
          <dl class="contact__form__list">
            <div class="contact__form__item">
              <dt><label for="name">お名前</label></dt>
              <dd><input id="name" type="text" name="name"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="email">メールアドレス</label></dt>
              <dd><input id="email" type="email" name="email"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="tel">電話番号</label></dt>
              <dd><input id="tel" type="text" name="tel"></dd>
            </div>
            <div class="contact__form__item">
              <dt><label for="content">お問い合わせ内容</label></dt>
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
          <a href="./index.php">
            <button class="contact__thanks__button">
              トップページへ戻る
            </button>
          </a>
        </div>
      </main>

      <?php require  "./capsule/aside.php"; ?>
    </div>
  </div>

  <?php require  "./capsule/footer.php"; ?>

  <script src="../assets/js/contact.js"></script>

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/pagescroll.js"></script>
</body>

</html>