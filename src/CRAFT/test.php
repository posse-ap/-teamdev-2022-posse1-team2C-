<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");

$stmt = $db->query('SELECT id, title FROM events');
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サンプル</title>
</head>



<main>
    <h2>入力フォーム</h2>
    <!-- 入力フォームを作成 -->
    <!-- <form  method="post">
<textarea name="buhin" cols="30" rows="10" placeholder="ここに記入"></textarea><br>
<button type="submit" name="button">登録する</button>
</form> -->
    <!-- 入力フォームここまで -->
</main>
<!-- action="./admin/index.php" -->
<!-- <div class="apply__form__item"> -->


<!-- <form action="/" name="apply__form" class="apply__form" method="post">
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
                  <dd><input id="name__kanji" type="text" name="name__kanji" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="name__kana">お名前（フリガナ）</label></dt>
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
                  <dt><label for="birth">生年月日</label></dt>
                  <dd><input id="birth" type="date" name="birth" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="university">大学</label></dt>
                  <dd><input id="university" type="text" name="university" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="faculty">学部</label></dt>
                  <dd><input id="faculty" type="text" name="faculty" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="course">学科</label></dt>
                  <dd><input id="course" type="text" name="course" /></dd>
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
                    <textarea id="content" type="text" name="content"></textarea>
                  </dd>
                </div>
              </dl>
              <div class="apply__form__footer">
                <button class="apply__form__button" id="step1" role="submit" type="submit" name="button">確認画面へ</button>
              </div>
            </form> -->

            <form  name="apply__form" class="apply__form" method="post">
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
                  <dd><input id="name__kanji" type="text" name="name__kanji" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="name__kana">お名前（フリガナ）</label></dt>
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
                  <dt><label for="birth">生年月日</label></dt>
                  <dd><input id="birth" type="date" name="birth" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="university">大学</label></dt>
                  <dd><input id="university" type="text" name="university" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="faculty">学部</label></dt>
                  <dd><input id="faculty" type="text" name="faculty" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="course">学科</label></dt>
                  <dd><input id="course" type="text" name="course" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt>卒業年度</dt>
                  <dd>
                    <label><input type="radio" name="graduate" value="23" />23卒</label>
                    <label><input type="radio" name="graduate" value="24" />24卒</label>
                    <label><input type="radio" name="graduate" value="25" />25卒</label>
                  </dd>
                </div>
                <!-- <div class="apply__form__item">
                  <dt>職業</dt>
                  <dd>
                    <label><input type="checkbox" name="job" value="学生" />学生</label>
                    <label><input type="checkbox" name="job" value="社会人" />社会人</label>
                  </dd>
                </div> -->
                <div class="apply__form__item">
                  <dt><label for="content">その他自由記述欄</label></dt>
                  <dd>
                    <textarea id="content" type="text" name="content"></textarea>
                  </dd>
                </div>
              </dl>
              <div>
                <button  type="submit" name="button">確認画面へ</button>
              </div>
            </form>









<!-- <form method="post">
    <div class="apply__form__item">
    <dt><label for="postcode">郵便番号</label></dt>
    <dd><input  id="postcode" type="text" name='postcode' /></dd>
    </div>
    <div class="apply__form__item">
        <dt><label for="address">住所</label></dt>
        <dd><input id="address" type="text" name="address" /></dd>
    </div>

    <button type="submit" name="button">登録する</button>
</form> -->
<!-- <button type="submit" name="button">登録する</button> -->



<?php

if (!empty($_POST)) {
  $alert = "<script type='text/javascript'>alert('こちらは侍エンジニアです。');</script>";
  echo $alert;
    $student = $db->exec('INSERT INTO students SET 
    name="' . $_POST['name__kanji'] .'",
    furigana="' . $_POST['name__kana'] .'",
    mail="' . $_POST['email'] .'",
    postal_code="' . $_POST['postcode'] .'",
    address="'. $_POST['address'] .'",
    telephone_number="' . $_POST['tel'] .'",
    birthday="'. $_POST['birth'] .'",
    university_id="'. $_POST['university'] .'",
    faculty="'. $_POST['faculty'] .'",
    department="'. $_POST['course'] .'",
    graduate_year="'. $_POST['graduate'] .'",
    free_comment="'. $_POST['content'] .'",
    apply_time = NOW()');
}
?>





<h2>登録結果！</h2>



<ul>
    <?php foreach ($events as $key => $event) : ?>
        <li>
            <?= $event["id"]; ?>:<?= $event["title"]; ?>
        </li>
    <?php endforeach; ?>
    <a href="/admin/index.php">管理者ページ</a>
</ul>

<body>
</body>

</html>