<?php
// require('./capsule/session.php');
session_start();

require(dirname(__FILE__) . "../../../dbconnect.php");
$array_forms = ['name', 'url', 'name__kanji', 'name__kana', 'email', 'tel', 'postcode', 'address', 'content'];
$forms_length = count($array_forms);
$mode = 'input';
$errmessage = array();
if (isset($_POST['back']) && $_POST['back']) {
  // 何もしない
} else if (isset($_POST['confirm']) && $_POST['confirm']) {
  for ($i = 0; $i < $forms_length; $i++) {
    if (!$_POST[$array_forms[$i]]) {
      $errmessage[] = "名前を入力してください";
    }
  }
  // if (
  //   $_POST['name']==!'' &&
  //   $_POST['url']==!'' &&
  //   $_POST['name__kanji']==!'' &&
  //   $_POST['name__kana']==!'' &&
  //   $_POST['email']==!'' &&
  //   $_POST['tel']==!'' &&
  //   $_POST['postcode']==!'' &&
  //   $_POST['address']==!'' &&
  //   $_POST['content']==!''
  // ) {
  // 確認画面
  if ($errmessage) {
    $mode = 'input';
  } else {
    $mode = 'confirm';
  }
  for ($i = 0; $i < $forms_length; $i++) {
    $_SESSION[$array_forms[$i]] = htmlspecialchars($_POST[$array_forms[$i]], ENT_QUOTES);
  }

  // }
} else if (isset($_POST['send']) && $_POST['send']) {
  if (
    isset($_SESSION['name']) &&
    isset($_SESSION['url']) &&
    isset($_SESSION['name__kanji']) &&
    isset($_SESSION['name__kana']) &&
    isset($_SESSION['email']) &&
    isset($_SESSION['tel']) &&
    isset($_SESSION['postcode']) &&
    isset($_SESSION['address']) &&
    isset($_SESSION['content'])
  ) {
    $agent = $db->exec('INSERT INTO agents SET 
    name="' . $_SESSION['name'] . '",
    url="' . $_SESSION['url'] . '",
    name__kanji="' . $_SESSION['name__kanji'] . '",
    name__kana="' . $_SESSION['name__kana'] . '",
    email="' . $_SESSION['email'] . '",
    tel="' . $_SESSION['tel'] . '",
    postcode="' . $_SESSION['postcode'] . '",
    address="' . $_SESSION['address'] . '",
    content="' . $_SESSION['content'] . '",
    apply_time= NOW()');
  }

  $_SESSION = array();
  $mode = 'send';
} else {
  for ($i = 0; $i < $forms_length; $i++) {
    $_SESSION[$array_forms[$i]] = "";
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
  <link rel="stylesheet" href="../../assets/css/apply.min.css">
</head>

<body>
  <?php require  "../capsule/header.php"; ?>

  <div class="content">


    <div class="container inner">
      <main class="main">
        <div class="apply" id="apply">
          <?php if ($mode == 'input') { ?>
            <!-- 入力画面 -->
            <?php
            if ($errmessage) {
              echo '<div style="color:red;">';
              echo implode('<br>', $errmessage);
              echo '</div>';
            }
            ?>
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

              <form action="./apply.php" name="apply__form" class="apply__form" method="post">
                <dl class="apply__form__list">
                  <div class="apply__form__item">
                    <dt><label for="name">企業名</label></dt>
                    <dd><input id="name" type="text" name="name" value="<?php echo $_SESSION['name'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="url">URL（企業HP）</label></dt>
                    <dd><input id="url" type="text" name="url" value="<?php echo $_SESSION['url'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="name__kanji">代表者様（漢字）</label></dt>
                    <dd><input id="name__kanji" type="text" name="name__kanji" value="<?php echo $_SESSION['name__kanji'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="name__kana">代表者様（フリガナ）</label></dt>
                    <dd><input id="name__kana" type="text" name="name__kana" value="<?php echo $_SESSION['name__kana'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="email">メールアドレス</label></dt>
                    <dd><input id="email" type="email" name="email" value="<?php echo $_SESSION['email'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="tel">電話番号</label></dt>
                    <dd><input id="tel" type="text" name="tel" value="<?php echo $_SESSION['tel'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="postcode">郵便番号</label></dt>
                    <dd><input id="postcode" type="text" name="postcode" value="<?php echo $_SESSION['postcode'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="address">住所</label></dt>
                    <dd><input id="address" type="text" name="address" value="<?php echo $_SESSION['address'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="content">その他自由記述欄</label></dt>
                    <dd>
                      <input id="content" type="text" name="content" value="<?php echo $_SESSION['content'] ?>"></input>
                    </dd>
                  </div>
                </dl>
                <div class="apply__form__footer">
                  <button class="apply__form__button" type="submit" name="confirm" value="確認">確認画面へ</button>
                </div>
              </form>
            </div>

          <?php } else if ($mode == 'confirm') { ?>

            <div action="./apply.php" name="" class="apply__form" method="post">
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
            </div>
            <form action="./apply.php" name="" class="apply__form" method="post">
              <table class="apply__table">
                <tr>
                  <th class="apply__table__header">企業名</th>
                  <td class="apply__table__data" id="insert__agent"><?php echo $_SESSION['name'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">URL（企業HP）</th>
                  <td class="apply__table__data" id="insert__url"><?php echo $_SESSION['url'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">代表者様（漢字）</th>
                  <td class="apply__table__data" id="insert__name__kanji"><?php echo $_SESSION['name__kanji'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">代表者様（フリガナ）</th>
                  <td class="apply__table__data" id="insert__name__kana"><?php echo $_SESSION['name__kana'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">メールアドレス</th>
                  <td class="apply__table__data" id="insert__mail"><?php echo $_SESSION['email'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">電話番号</th>
                  <td class="apply__table__data" id="insert__tel"><?php echo $_SESSION['tel'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">郵便番号</th>
                  <td class="apply__table__data" id="insert__postcode"><?php echo $_SESSION['postcode'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">住所</th>
                  <td class="apply__table__data" id="insert__address"><?php echo $_SESSION['address'] ?></td>
                </tr>
                <tr>
                  <th class="apply__table__header">その他自由記述欄</th>
                  <td class="apply__table__data" id="insert__content"><?php echo $_SESSION['content'] ?></td>
                </tr>
              </table>
              <div class="apply__form__footer">
                <button class="apply__form__button" id="back" type="submit" name="back" value="戻る">戻る</button>
              </div>
              <div class="apply__form__footer">
                <button class="apply__form__button" id="step2" type="submit" name="send" value="送信">送信する</button>
              </div>
            </form>
        </div>

      <?php } else { ?>

        <div class="apply__thanks" role="apply">
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

      <?php } ?>

    </div>
    </main>

    <?php require  "../capsule/aside.php"; ?>
  </div>

  </div>

  <?php require  "../capsule/footer.php"; ?>



  <script src="../../assets/js/apply_agent.js"></script>

  <script src="../../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../../assets/js/pagescroll.js"></script>
</body>

</html>