<?php
// require('./capsule/session.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/apply.min.css">
  <link rel="stylesheet" href="../assets/css/index-boozer.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="container-fluid">
    <div class="row">
      <?php require  "./capsule/aside.php"; ?>
      <script>
        document.getElementById("add").classList.add("active")
      </script>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h2 class="mt-3 mb-3">エージェント企業新規追加</h2>
        <div class="apply mb-5 mt-5" id="apply">
          <div class="apply__input" role="apply">
            <form action="/" name="apply__form" class="apply__form">
              <p class="subtitle">エージェント企業様基本情報</p>
              <dl class="apply__form__list">
                <div class="apply__form__item">
                  <dt><label for="agent">貴社名</label></dt>
                  <dd><input id="agent" type="text" name="agent" /></dd>
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
                  <dt><label for="url">URL（企業HP）</label></dt>
                  <dd><input id="url" type="text" name="url" /></dd>
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
                  <dt><label for="tel">電話番号</label></dt>
                  <dd><input id="tel" type="text" name="tel" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="email">メールアドレス</label></dt>
                  <dd><input id="email" type="email" name="email" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="email">連絡先メールアドレス</label></dt>
                  <dd><input id="email" type="email" name="email" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="agent__detail">企業紹介</label></dt>
                  <dd><textarea name="agent__detail" id="agent__detail"></textarea></dd>
                </div>
              </dl>
              <p class="subtitle">担当者様情報</p>
              <dl class="apply__form__list">
                <div class="apply__form__item">
                  <dt><label for="staff__name__kanji">お名前</label></dt>
                  <dd><input id="staff__name__kanji" type="text" name="staff__name__kanji" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="staff__name__kana">お名前（フリガナ）</label></dt>
                  <dd><input id="staff__name__kana" type="text" name="staff__name__kana" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="staff__tel">電話番号</label></dt>
                  <dd><input id="staff__tel" type="text" name="staff__tel" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="staff__email">メールアドレス</label></dt>
                  <dd><input id="staff__email" type="email" name="staff__email" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="staff__detail">担当者紹介文</label></dt>
                  <dd><textarea name="staff__detail" id="staff__detail"></textarea></dd>
                </div>
              </dl>
              <p class="subtitle">サービス詳細</p>
              <dl class="apply__form__list">
                <div class="apply__form__item">
                  <dt><label for="service__name">サービス名</label></dt>
                  <dd><input id="service__name" type="text" name="service__name" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__intro">サービス紹介</label></dt>
                  <dd><input class="textbox" id="service__intro" type="text" name="service__intro" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt>サポート内容</dt>
                  <dd>
                    <label><input type="checkbox" name="service__support" value="面接対策" />面接対策</label>
                    <label><input type="checkbox" name="service__support" value="セミナー/イベント開催" />セミナー/イベント開催</label>
                    <label><input type="checkbox" name="service__support" value="選考対策" />選考対策</label>
                    <label><input type="checkbox" name="service__support" value="企業紹介" />企業紹介</label>
                    <label><input type="checkbox" name="service__support" value="ES添削" />ES添削</label>
                    <label><input type="checkbox" name="service__support" value="内定後のサポート" />内定後のサポート</label>
                    <label><input type="checkbox" name="service__support" value="選考後のフォロー" />選考後のフォロー</label>
                    <label><input type="checkbox" name="service__support" value="個別面談" />個別面談</label>
                    <label><input type="checkbox" name="service__support" value="自己分析" />自己分析</label>
                    <label><input type="checkbox" name="service__support" value="特別選考" />特別選考</label>
                    <label><input type="checkbox" name="service__support" value="インターンシップ紹介" />インターンシップ紹介</label>
                    <label><input type="checkbox" name="service__support" value="業界研究" />業界研究</label>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt>エージェント企業の規模</dt>
                  <dd>
                    <label><input type="radio" name="service__agent__scale" value="ベンチャー企業" />ベンチャー企業</label>
                    <label><input type="radio" name="service__agent__scale" value="中小企業" />中小企業</label>
                    <label><input type="radio" name="service__agent__scale" value="大企業" />大企業</label>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt>取引先企業の規模</dt>
                  <dd>
                    <label><input type="checkbox" name="service__client__scale" value="ベンチャー企業" />ベンチャー企業</label>
                    <label><input type="checkbox" name="service__client__scale" value="中小企業" />中小企業</label>
                    <label><input type="checkbox" name="service__client__scale" value="大手企業" />大手企業</label>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__aria">対応エリア</label></dt>
                  <dd><input id="service__aria" type="text" name="service__aria" /></dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__total">総合評価</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__total" name="service__total">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <option value="5.0">5.0</option>
                        <option value="4.9">4.9</option>
                        <option value="4.8">4.8</option>
                        <option value="4.7">4.7</option>
                        <option value="4.6">4.6</option>
                        <option value="4.5">4.5</option>
                        <option value="4.4">4.4</option>
                        <option value="4.3">4.3</option>
                        <option value="4.2">4.2</option>
                        <option value="4.1">4.1</option>
                        <option value="4.0">4.0</option>
                        <option value="3.9">3.9</option>
                        <option value="3.8">3.8</option>
                        <option value="3.7">3.7</option>
                        <option value="3.6">3.6</option>
                        <option value="3.5">3.5</option>
                        <option value="3.4">3.4</option>
                        <option value="3.3">3.3</option>
                        <option value="3.2">3.2</option>
                        <option value="3.1">3.1</option>
                        <option value="3.0">3.0</option>
                        <option value="2.9">2.9</option>
                        <option value="2.8">2.8</option>
                        <option value="2.7">2.7</option>
                        <option value="2.6">2.6</option>
                        <option value="2.5">2.5</option>
                        <option value="2.4">2.4</option>
                        <option value="2.3">2.3</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.0">2.0</option>
                        <option value="1.9">1.9</option>
                        <option value="1.8">1.8</option>
                        <option value="1.7">1.7</option>
                        <option value="1.6">1.6</option>
                        <option value="1.5">1.5</option>
                        <option value="1.4">1.4</option>
                        <option value="1.3">1.3</option>
                        <option value="1.2">1.2</option>
                        <option value="1.1">1.1</option>
                        <option value="1.0">1.0</option>
                        <option value="0.9">0.9</option>
                        <option value="0.8">0.8</option>
                        <option value="0.7">0.7</option>
                        <option value="0.6">0.6</option>
                        <option value="0.5">0.5</option>
                        <option value="0.4">0.4</option>
                        <option value="0.3">0.3</option>
                        <option value="0.2">0.2</option>
                        <option value="0.1">0.1</option>
                        <option value="0.0">0.0</option>
                      </select>
                    </div>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__offer">求人の質</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__offer" name="service__offer">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <option value="5.0">5.0</option>
                        <option value="4.9">4.9</option>
                        <option value="4.8">4.8</option>
                        <option value="4.7">4.7</option>
                        <option value="4.6">4.6</option>
                        <option value="4.5">4.5</option>
                        <option value="4.4">4.4</option>
                        <option value="4.3">4.3</option>
                        <option value="4.2">4.2</option>
                        <option value="4.1">4.1</option>
                        <option value="4.0">4.0</option>
                        <option value="3.9">3.9</option>
                        <option value="3.8">3.8</option>
                        <option value="3.7">3.7</option>
                        <option value="3.6">3.6</option>
                        <option value="3.5">3.5</option>
                        <option value="3.4">3.4</option>
                        <option value="3.3">3.3</option>
                        <option value="3.2">3.2</option>
                        <option value="3.1">3.1</option>
                        <option value="3.0">3.0</option>
                        <option value="2.9">2.9</option>
                        <option value="2.8">2.8</option>
                        <option value="2.7">2.7</option>
                        <option value="2.6">2.6</option>
                        <option value="2.5">2.5</option>
                        <option value="2.4">2.4</option>
                        <option value="2.3">2.3</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.0">2.0</option>
                        <option value="1.9">1.9</option>
                        <option value="1.8">1.8</option>
                        <option value="1.7">1.7</option>
                        <option value="1.6">1.6</option>
                        <option value="1.5">1.5</option>
                        <option value="1.4">1.4</option>
                        <option value="1.3">1.3</option>
                        <option value="1.2">1.2</option>
                        <option value="1.1">1.1</option>
                        <option value="1.0">1.0</option>
                        <option value="0.9">0.9</option>
                        <option value="0.8">0.8</option>
                        <option value="0.7">0.7</option>
                        <option value="0.6">0.6</option>
                        <option value="0.5">0.5</option>
                        <option value="0.4">0.4</option>
                        <option value="0.3">0.3</option>
                        <option value="0.2">0.2</option>
                        <option value="0.1">0.1</option>
                        <option value="0.0">0.0</option>
                      </select>
                    </div>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__useful">使いやすさ</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__useful" name="service__useful">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <option value="5.0">5.0</option>
                        <option value="4.9">4.9</option>
                        <option value="4.8">4.8</option>
                        <option value="4.7">4.7</option>
                        <option value="4.6">4.6</option>
                        <option value="4.5">4.5</option>
                        <option value="4.4">4.4</option>
                        <option value="4.3">4.3</option>
                        <option value="4.2">4.2</option>
                        <option value="4.1">4.1</option>
                        <option value="4.0">4.0</option>
                        <option value="3.9">3.9</option>
                        <option value="3.8">3.8</option>
                        <option value="3.7">3.7</option>
                        <option value="3.6">3.6</option>
                        <option value="3.5">3.5</option>
                        <option value="3.4">3.4</option>
                        <option value="3.3">3.3</option>
                        <option value="3.2">3.2</option>
                        <option value="3.1">3.1</option>
                        <option value="3.0">3.0</option>
                        <option value="2.9">2.9</option>
                        <option value="2.8">2.8</option>
                        <option value="2.7">2.7</option>
                        <option value="2.6">2.6</option>
                        <option value="2.5">2.5</option>
                        <option value="2.4">2.4</option>
                        <option value="2.3">2.3</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.0">2.0</option>
                        <option value="1.9">1.9</option>
                        <option value="1.8">1.8</option>
                        <option value="1.7">1.7</option>
                        <option value="1.6">1.6</option>
                        <option value="1.5">1.5</option>
                        <option value="1.4">1.4</option>
                        <option value="1.3">1.3</option>
                        <option value="1.2">1.2</option>
                        <option value="1.1">1.1</option>
                        <option value="1.0">1.0</option>
                        <option value="0.9">0.9</option>
                        <option value="0.8">0.8</option>
                        <option value="0.7">0.7</option>
                        <option value="0.6">0.6</option>
                        <option value="0.5">0.5</option>
                        <option value="0.4">0.4</option>
                        <option value="0.3">0.3</option>
                        <option value="0.2">0.2</option>
                        <option value="0.1">0.1</option>
                        <option value="0.0">0.0</option>
                      </select>
                    </div>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__reaction">対応するの良さ</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__reaction" name="service__reaction">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <option value="5.0">5.0</option>
                        <option value="4.9">4.9</option>
                        <option value="4.8">4.8</option>
                        <option value="4.7">4.7</option>
                        <option value="4.6">4.6</option>
                        <option value="4.5">4.5</option>
                        <option value="4.4">4.4</option>
                        <option value="4.3">4.3</option>
                        <option value="4.2">4.2</option>
                        <option value="4.1">4.1</option>
                        <option value="4.0">4.0</option>
                        <option value="3.9">3.9</option>
                        <option value="3.8">3.8</option>
                        <option value="3.7">3.7</option>
                        <option value="3.6">3.6</option>
                        <option value="3.5">3.5</option>
                        <option value="3.4">3.4</option>
                        <option value="3.3">3.3</option>
                        <option value="3.2">3.2</option>
                        <option value="3.1">3.1</option>
                        <option value="3.0">3.0</option>
                        <option value="2.9">2.9</option>
                        <option value="2.8">2.8</option>
                        <option value="2.7">2.7</option>
                        <option value="2.6">2.6</option>
                        <option value="2.5">2.5</option>
                        <option value="2.4">2.4</option>
                        <option value="2.3">2.3</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.0">2.0</option>
                        <option value="1.9">1.9</option>
                        <option value="1.8">1.8</option>
                        <option value="1.7">1.7</option>
                        <option value="1.6">1.6</option>
                        <option value="1.5">1.5</option>
                        <option value="1.4">1.4</option>
                        <option value="1.3">1.3</option>
                        <option value="1.2">1.2</option>
                        <option value="1.1">1.1</option>
                        <option value="1.0">1.0</option>
                        <option value="0.9">0.9</option>
                        <option value="0.8">0.8</option>
                        <option value="0.7">0.7</option>
                        <option value="0.6">0.6</option>
                        <option value="0.5">0.5</option>
                        <option value="0.4">0.4</option>
                        <option value="0.3">0.3</option>
                        <option value="0.2">0.2</option>
                        <option value="0.1">0.1</option>
                        <option value="0.0">0.0</option>
                      </select>
                    </div>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__support">サポート力</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__support" name="service__support">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <option value="5.0">5.0</option>
                        <option value="4.9">4.9</option>
                        <option value="4.8">4.8</option>
                        <option value="4.7">4.7</option>
                        <option value="4.6">4.6</option>
                        <option value="4.5">4.5</option>
                        <option value="4.4">4.4</option>
                        <option value="4.3">4.3</option>
                        <option value="4.2">4.2</option>
                        <option value="4.1">4.1</option>
                        <option value="4.0">4.0</option>
                        <option value="3.9">3.9</option>
                        <option value="3.8">3.8</option>
                        <option value="3.7">3.7</option>
                        <option value="3.6">3.6</option>
                        <option value="3.5">3.5</option>
                        <option value="3.4">3.4</option>
                        <option value="3.3">3.3</option>
                        <option value="3.2">3.2</option>
                        <option value="3.1">3.1</option>
                        <option value="3.0">3.0</option>
                        <option value="2.9">2.9</option>
                        <option value="2.8">2.8</option>
                        <option value="2.7">2.7</option>
                        <option value="2.6">2.6</option>
                        <option value="2.5">2.5</option>
                        <option value="2.4">2.4</option>
                        <option value="2.3">2.3</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.0">2.0</option>
                        <option value="1.9">1.9</option>
                        <option value="1.8">1.8</option>
                        <option value="1.7">1.7</option>
                        <option value="1.6">1.6</option>
                        <option value="1.5">1.5</option>
                        <option value="1.4">1.4</option>
                        <option value="1.3">1.3</option>
                        <option value="1.2">1.2</option>
                        <option value="1.1">1.1</option>
                        <option value="1.0">1.0</option>
                        <option value="0.9">0.9</option>
                        <option value="0.8">0.8</option>
                        <option value="0.7">0.7</option>
                        <option value="0.6">0.6</option>
                        <option value="0.5">0.5</option>
                        <option value="0.4">0.4</option>
                        <option value="0.3">0.3</option>
                        <option value="0.2">0.2</option>
                        <option value="0.1">0.1</option>
                        <option value="0.0">0.0</option>
                      </select>
                    </div>
                  </dd>
                </div>
                <div class="apply__form__item">
                  <dt><label for="service__detail">サービス紹介</label></dt>
                  <dd><textarea name="service__detail" id="service__detail"></textarea></dd>
                </div>
              </dl>
              <div class="apply__form__footer">
                <button class="apply__form__button border-0" role="submit">追加</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>