<?php
// require('./capsule/session.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/apply.min.css">
  <link rel="stylesheet" href="../../assets/css/index_craft.css">
</head>

<body>
  <?php require  "../capsule/header.php"; ?>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <h2 class="main__title">CRAFT</h2>
        <span class="main__text">
          あなたに合った企業が見つかる！<br />就活エージェント比較サイト
        </span>
        <div class="apply" id="apply">
          <div class="apply__input" role="apply">
            <ul class="stepbar">
              <li class="stepbar__item">
                <div class="stepbar__item-inner stepbar__item-inner--current">STEP1</div>
              </li>
              <li class="stepbar__item">
                <div class="stepbar__item-inner">
                  STEP2
                </div>
              </li>
              <li class="stepbar__item">
                <div class="stepbar__item-inner">STEP3</div>
              </li>
            </ul>

            <p class="apply__title">
              新卒エージェント新規会員登録
              <span class="apply__title"> 入力</span>
            </p>

            <form action="/" name="apply__form" class="apply__form">
              <dl class="apply__form__list">
                <div class="apply__form__item">
                  <dt><label for="name">企業名</label></dt>
                  <dd><input id="name" type="text" name="name" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="url">URL（企業HP）</label></dt>
                  <dd><input id="url" type="text" name="url" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="name__kanji">代表者様（漢字）</label></dt>
                  <dd><input id="name__kanji" type="text" name="name__kanji" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="name__kana">代表者様（フリガナ）</label></dt>
                  <dd><input id="name__kana" type="text" name="name__kana" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="email">メールアドレス</label></dt>
                  <dd><input id="email" type="email" name="email" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="tel">電話番号</label></dt>
                  <dd><input id="tel" type="text" name="tel" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="postcode">郵便番号</label></dt>
                  <dd><input id="postcode" type="text" name="postcode" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="address">住所</label></dt>
                  <dd><input id="address" type="text" name="address" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="content">その他自由記述欄</label></dt>
                  <dd>
                    <textarea id="content" type="text" name="content"></textarea>
                  </dd>
                </div>
              </dl>
              <div class="apply__form__footer">
                <button class="apply__form__button" id="step1" role="submit">確認画面へ</button>
              </div>
            </form>
          </div>

          <div class="apply__confirm" role="apply" hidden="true">
            <ul class="stepbar">
              <li class="stepbar__item">
                <div class="stepbar__item-inner">STEP1</div>
              </li>
              <li class="stepbar__item">
                <div class="stepbar__item-inner stepbar__item-inner--current">
                  STEP2
                </div>
              </li>
              <li class="stepbar__item">
                <div class="stepbar__item-inner">STEP3</div>
              </li>
            </ul>

            <p class="apply__title">
              新卒エージェント　お問い合わせ
              <span class=""> 確認</span>
            </p>

            <form action="/" name="" class="apply__form">
              <table class="apply__table">
                <tr>
                  <th class="apply__table__header">企業名</th>
                  <td class="apply__table__data" id="insert__agent"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">URL（企業HP）</th>
                  <td class="apply__table__data" id="insert__url"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">代表者様（漢字）</th>
                  <td class="apply__table__data" id="insert__name__kanji"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">代表者様（フリガナ）</th>
                  <td class="apply__table__data" id="insert__name__kana"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">メールアドレス</th>
                  <td class="apply__table__data" id="insert__mail"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">電話番号</th>
                  <td class="apply__table__data" id="insert__tel"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">郵便番号</th>
                  <td class="apply__table__data" id="insert__postcode"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">住所</th>
                  <td class="apply__table__data" id="insert__address"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">その他自由記述欄</th>
                  <td class="apply__table__data" id="insert__content"></td>
                </tr>
              </table>
              <div class="apply__form__footer">
                <button class="apply__form__button" id="back">戻る</button>
              </div>
              <div class="apply__form__footer">
                <button class="apply__form__button" id="step2" role="submit">送信する</button>
              </div>
            </form>
          </div>

          <div class="apply__thanks" role="apply" hidden="true">
            <ul class="stepbar">
              <li class="stepbar__item">
                <div class="stepbar__item-inner">STEP1</div>
              </li>
              <li class="stepbar__item">
                <div class="stepbar__item-inner">STEP2</div>
              </li>
              <li class="stepbar__item">
                <div class="stepbar__item-inner stepbar__item-inner--current">
                  STEP3
                </div>
              </li>
            </ul>

            <p class="apply__title">
              新卒エージェント　お問い合わせ
              <span class="apply__title"> 完了</span>
            </p>

            <div class="apply__thanks__inner">
              <p class="apply__thanks__complete">
                お問い合わせを受け付けました
              </p>
              <p class="apply__thanks__text">
                この度はお問い合わせしていただき、誠にありがとうございます。<br /><br />ご入力いただきました内容を確認後、担当者よりご連絡させていただきます。<br />お急ぎのご連絡やご不明な点などございましたら
                <a href="#" class="apply__thanks__nav">こちら</a>
                からご連絡ください。
              </p>
              <button class="apply__thanks__button">
                トップページへ戻る
              </button>
            </div>
          </div>
        </div>
      </main>

      <?php require  "../capsule/aside.php"; ?>
    </div>
  </div>

  <script src="../../assets/js/apply_agent.js"></script>
</body>

</html>