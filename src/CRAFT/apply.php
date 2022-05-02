<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");

// $stmt = $db->query('SELECT id, title FROM events');
// $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

$mode = 'input';
$errmessage = array();
if (isset($_POST['back']) && $_POST['back']) {
  // 何もしない
} else if (isset($_POST['confirm']) && $_POST['confirm']) {
  // 確認画面
  if (!$_POST['name__kanji']) {
    $errmessage[] = "名前を入力してください";
  } else if (mb_strlen($_POST['name__kanji']) > 100) {
    $errmessage[] = "名前は100文字以内にしてください";
  }
  $_SESSION['name__kanji'] = htmlspecialchars($_POST['name__kanji'], ENT_QUOTES);

  if (!$_POST['email']) {
    $errmessage[] = "Eメールを入力してください";
  } else if (mb_strlen($_POST['email']) > 200) {
    $errmessage[] = "Eメールは200文字以内にしてください";
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errmessage[] = "メールアドレスが不正です";
  }
  $_SESSION['email']    = htmlspecialchars($_POST['email'], ENT_QUOTES);

  if (!$_POST['content']) {
    $errmessage[] = "お問い合わせ内容を入力してください";
  } else if (mb_strlen($_POST['content']) > 500) {
    $errmessage[] = "お問い合わせ内容は500文字以内にしてください";
  }
  $_SESSION['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);

  if ($errmessage) {
    $mode = 'input';
  } else {
    $mode = 'confirm';
  }

  $_SESSION['name__kana'] = htmlspecialchars($_POST['name__kana'], ENT_QUOTES);
  $_SESSION['postcode'] = htmlspecialchars($_POST['postcode'], ENT_QUOTES);
  $_SESSION['address'] = htmlspecialchars($_POST['address'], ENT_QUOTES);
  $_SESSION['tel'] = htmlspecialchars($_POST['tel'], ENT_QUOTES);
  $_SESSION['birth'] = htmlspecialchars($_POST['birth'], ENT_QUOTES);
  $_SESSION['university'] = htmlspecialchars($_POST['university'], ENT_QUOTES);
  $_SESSION['faculty'] = htmlspecialchars($_POST['faculty'], ENT_QUOTES);
  $_SESSION['course'] = htmlspecialchars($_POST['course'], ENT_QUOTES);
  $_SESSION['graduate'] = htmlspecialchars($_POST['graduate'], ENT_QUOTES);
  $_SESSION['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);
} else if (isset($_POST['send']) && $_POST['send']) {
  // 送信ボタンを押したとき
  $message  = "お問い合わせを受け付けました \r\n"
    . "名前: " . $_SESSION['name__kanji'] . "\r\n"
    . "email: " . $_SESSION['email'] . "\r\n"
    . "お問い合わせ内容:\r\n"
    . preg_replace("/\r\n|\r|\n/", "\r\n", $_SESSION['content']);
  mail($_SESSION['email'], 'お問い合わせありがとうございます', $message);
  mail('fuga@hogehoge.com', 'お問い合わせありがとうございます', $message);
  $student = $db->exec('INSERT INTO students SET 
  name="' . $_SESSION['name__kanji'] . '",
  furigana="' . $_SESSION['name__kana'] . '",
  mail="' . $_SESSION['email'] . '",
  postal_code="' . $_SESSION['postcode'] . '",
  address="' . $_SESSION['address'] . '",
  telephone_number="' . $_SESSION['tel'] . '",
  birthday="' . $_SESSION['birth'] . '",
  university_id="' . $_SESSION['university'] . '",
  faculty="' . $_SESSION['faculty'] . '",
  department="' . $_SESSION['course'] . '",
  graduate_year="' . $_SESSION['graduate'] . '",
  free_comment="' . $_SESSION['content'] . '",
  apply_time= NOW()');

  $_SESSION = array();
  $mode = 'send';
} else {
  $_SESSION['name__kanji'] = "";
  $_SESSION['name__kana'] = "";
  $_SESSION['email']    = "";
  $_SESSION['tel']    = "";
  $_SESSION['postcode']  = "";
  $_SESSION['address'] = "";
  $_SESSION['birth']    = "";
  $_SESSION['university']  = "";
  $_SESSION['faculty'] = "";
  $_SESSION['course']    = "";
  $_SESSION['graduate']  = "";
  $_SESSION['content']  = "";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/apply.css">
  <link rel="stylesheet" href="../assets/css/index_craft.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>


  <?php if ($mode == 'input') { ?>
    <!-- 入力画面 -->
    <?php
    if ($errmessage) {
      echo '<div style="color:red;">';
      echo implode('<br>', $errmessage);
      echo '</div>';
    }
    ?>

    <div class="content">
      <div class="container inner">
        <main class="main">
          <h2 class="main__title">CRAFT</h2>
          <span class="main__text">
            あなたに合った企業が見つかる！<br />就活エージェント比較サイト
          </span>
          <div class="apply" id="apply">
            <div class="apply__input" role="apply">
              <p class="title">
                新卒エージェント　お問い合わせ
                <span class="title"> 入力</span>
              </p>

              <ul class="stepbar">
                <li class="stepbar__item">
                  <div class="stepbar__item-inner stepbar__item-inner--current">
                    STEP1
                  </div>
                </li>
                <li class="stepbar__item">
                  <div class="stepbar__item-inner">STEP2</div>
                </li>
                <li class="stepbar__item">
                  <div class="stepbar__item-inner">STEP3</div>
                </li>
              </ul>



              <form action="./apply.php" name="apply__form" class="apply__form" method="post">
                <dl class="apply__form__list">
                  <div class="apply__form__item">
                    <dt><label for="agent">お問い合わせ先<br>エージェント企業</label></dt>
                    <dd>
                      <div class="apply__form__item__select">
                        <select id="agent" name="agent">
                          <option value="選択してください" selected disabled>
                            選択してください
                          </option>
                          <option value="アンチパターン">アンチパターン（株）</option>
                          <option value="POSSE">POSSE（株）</option>
                          <option value="HarborS">HarborS（株）</option>
                          <option value="表参道">表参道（株）</option>
                        </select>
                      </div>
                    </dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="name__kanji">お名前（漢字）</label></dt>
                    <dd><input id="name__kanji" type="text" name="name__kanji" value="<?php echo $_SESSION['name__kanji'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="name__kana">お名前（フリガナ）</label></dt>
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
                    <dt><label for="birth">生年月日</label></dt>
                    <dd><input id="birth" type="date" name="birth" value="<?php echo $_SESSION['birth'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="university">大学</label></dt>
                    <dd><input id="university" type="text" name="university" value="<?php echo $_SESSION['university'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="faculty">学部</label></dt>
                    <dd><input id="faculty" type="text" name="faculty" value="<?php echo $_SESSION['faculty'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="course">学科</label></dt>
                    <dd><input id="course" type="text" name="course" value="<?php echo $_SESSION['course'] ?>" /></dd>
                  </div>
                  <div class="apply__form__item">
                    <dt>卒業年度</dt>
                    <dd>
                      <label><input type="radio" name="graduate" value="23" />23卒</label>
                      <label><input type="radio" name="graduate" value="24" />24卒</label>
                      <label><input type="radio" name="graduate" value="25" />25卒</label>
                    </dd>
                  </div>
                  <div class="apply__form__item">
                    <dt><label for="content">その他自由記述欄</label></dt>
                    <dd>
                      <textarea id="content" type="text" name="content" value="<?php echo $_SESSION['content'] ?>"></textarea>
                    </dd>
                  </div>
                </dl>
                <div>
                  <button type="submit" name="confirm" value="確認">確認画面へ</button>
                </div>
              </form>
            </div>

          <?php } else if ($mode == 'confirm') { ?>
            <div class="apply__confirm" role="apply">
              <p class="title">
                新卒エージェント　お問い合わせ
                <span class="title"> 確認</span>
              </p>
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

              <form action="./apply.php" name="" class="apply__form" method="post">
                <table class="apply__table">
                  <tr>
                    <th class="apply__table__header">お問い合わせ先エージェント企業</th>
                    <td class="apply__table__data" id="insert__agent"></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">お名前（漢字）</th>
                    <td class="apply__table__data" id="insert__name__kanji"><?php echo $_SESSION['name__kanji'] ?></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">お名前（フリガナ）</th>
                    <td class="apply__table__data" id="insert__name__kana"><?php echo $_SESSION['name__kana'] ?></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">メールアドレス</th>
                    <td class="apply__table__data" id="insert__email"><?php echo $_SESSION['email'] ?></td>
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
                    <th class="apply__table__header">生年月日</th>
                    <td class="apply__table__data" id="insert__date"><?php echo $_SESSION['birth'] ?></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">大学</th>
                    <td class="apply__table__data" id="insert__univ"><?php echo $_SESSION['university'] ?></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">学部</th>
                    <td class="apply__table__data" id="insert__faculty"><?php echo $_SESSION['faculty'] ?></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">学科</th>
                    <td class="apply__table__data" id="insert__course"><?php echo $_SESSION['course'] ?></td>
                  </tr>
                  <tr>
                    <th class="apply__table__header">卒業年度</th>
                    <td class="apply__table__data" id="insert__graduate"><?php echo $_SESSION['graduate'] ?></td>
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
                  <button class="apply__form__button" id="step2" role="submit" type="submit" name="send" value="送信">送信する</button>
                </div>
              </form>
            </div>
          <?php } else { ?>
            <div class="apply__thanks" role="apply">
              <p class="title">
                新卒エージェント　お問い合わせ
                <span class="title"> 完了</span>
              </p>
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
                <p class="apply__thanks__text">
                  <span>〇〇〇〇〇〇</span>にお問い合わせをした人にオススメ！
                </p>
              </div>
              <section class="section">
                <ul class="agents">
                  <li class="agent">
                    <ul class="agent__list">
                      <li class="agent__item">
                        <img class="img agent__item__img" src="../assets/img/article.png" alt="企業名" width="300px" style="display: inline" />
                      </li>
                      <li class="agent__item">
                        <h3 class="agent__item__name">アンチパターン</h3>
                      </li>
                      <li class="agent__item">
                        <span class="agent__item__title">総合点</span>
                        <span class="star5_rating" data-rate="3.8"></span>
                        <span class="number_rating">3.8</span>
                      </li>
                      <li class="agent__item">
                        <p class="agent__item__info">
                          ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。
                        </p>
                      </li>
                      <li class="agent__item">
                        <button class="agent__item__detail">詳細</button>
                        <button class="agent__item__apply">申し込む</button>
                      </li>
                    </ul>
                  </li>

                  <li class="agent">
                    <ul class="agent__list">
                      <li class="agent__item">
                        <img class="img agent__img" src="../assets/img/article.png" alt="企業名" width="300px" style="display: inline" />
                      </li>
                      <li class="agent__item">
                        <h3 class="agent__item__name">アンチパターン</h3>
                      </li>
                      <li class="agent__item">
                        <span class="agent__item__title">総合点</span>
                        <span class="star5_rating" data-rate="3.8"></span>
                        <span class="number_rating">3.8</span>
                      </li>
                      <li class="agent__item">
                        <p class="agent__item__info">
                          ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。
                        </p>
                      </li>
                      <li class="agent__item">
                        <button class="agent__item__detail">詳細</button>
                        <button class="agent__item__apply">申し込む</button>
                      </li>
                    </ul>
                  </li>

                  <li class="agent">
                    <ul class="agent__list">
                      <li class="agent__item">
                        <img class="img agent__img" src="../assets/img/article.png" alt="企業名" width="300px" style="display: inline" />
                      </li>
                      <li class="agent__item">
                        <h3 class="agent__item__name">アンチパターン</h3>
                      </li>
                      <li class="agent__item">
                        <span class="agent__item__title">総合点</span>
                        <span class="star5_rating" data-rate="3.8"></span>
                        <span class="number_rating">3.8</span>
                      </li>
                      <li class="agent__item">
                        <p class="agent__item__info">
                          ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。
                        </p>
                      </li>
                      <li class="agent__item">
                        <button class="agent__item__detail">詳細</button>
                        <button class="agent__item__apply">申し込む</button>
                      </li>
                    </ul>
                  </li>

                  <li class="agent">
                    <ul class="agent__list">
                      <li class="agent__item">
                        <img class="img agent__img" src="../assets/img/article.png" alt="企業名" width="300px" style="display: inline" />
                      </li>
                      <li class="agent__item">
                        <h3 class="agent__item__name">アンチパターン</h3>
                      </li>
                      <li class="agent__item">
                        <span class="agent__item__title">総合点</span>
                        <span class="star5_rating" data-rate="3.8"></span>
                        <span class="number_rating">3.8</span>
                      </li>
                      <li class="agent__item">
                        <p class="agent__item__info">
                          ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。
                        </p>
                      </li>
                      <li class="agent__item">
                        <button class="agent__item__detail">詳細</button>
                        <button class="agent__item__apply">申し込む</button>
                      </li>
                    </ul>
                  </li>

                  <li class="agent">
                    <ul class="agent__list">
                      <li class="agent__item">
                        <img class="img agent__img" src="../assets/img/article.png" alt="企業名" width="300px" style="display: inline" />
                      </li>
                      <li class="agent__item">
                        <h3 class="agent__item__name">アンチパターン</h3>
                      </li>
                      <li class="agent__item">
                        <span class="agent__item__title">総合点</span>
                        <span class="star5_rating" data-rate="3.8"></span>
                        <span class="number_rating">3.8</span>
                      </li>
                      <li class="agent__item">
                        <p class="agent__item__info">
                          ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。
                        </p>
                      </li>
                      <li class="agent__item">
                        <button class="agent__item__detail">詳細</button>
                        <button class="agent__item__apply">申し込む</button>
                      </li>
                    </ul>
                  </li>

                  <li class="agent">
                    <ul class="agent__list">
                      <li class="agent__item">
                        <img class="img agent__img" src="../assets/img/article.png" alt="企業名" width="300px" style="display: inline" />
                      </li>
                      <li class="agent__item">
                        <h3 class="agent__item__name">アンチパターン</h3>
                      </li>
                      <li class="agent__item">
                        <span class="agent__item__title">総合点</span>
                        <span class="star5_rating" data-rate="3.8"></span>
                        <span class="number_rating">3.8</span>
                      </li>
                      <li class="agent__item">
                        <p class="agent__item__info">
                          ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。ここにエージェント企業の説明が入ります。
                        </p>
                      </li>
                      <li class="agent__item">
                        <button class="agent__item__detail">詳細</button>
                        <button class="agent__item__apply">申し込む</button>
                      </li>
                    </ul>
                  </li>
                </ul>
              </section>
            <?php
          } ?>
        
        </main>
        <?php require  "./capsule/aside.php"; ?>
      </div>
    </div>


    <!-- <script src="../assets/js/apply_user.js"></script> -->
</body>

</html>