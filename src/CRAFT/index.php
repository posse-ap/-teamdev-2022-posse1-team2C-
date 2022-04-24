<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/apply.min.css">
  <link rel="stylesheet" href="../assets/css/index_craft.min.css">
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
        <div class="apply">
          <div class="apply__input" role="apply">
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

            <p class="apply__title">
              新卒エージェント　お問い合わせ
              <span class="apply__title"> 入力</span>
            </p>

            <form action="/" name="apply__form" class="apply__form">
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
                  <th class="apply__table__header">お問い合わせ先エージェント企業</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">お名前（漢字）</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">お名前（フリガナ）</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">メールアドレス</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">電話番号</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">郵便番号</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">住所</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">生年月日</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">大学</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">学部</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">学科</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">卒業年度</th>
                  <td class="apply__table__data"></td>
                </tr>
                <tr>
                  <th class="apply__table__header">その他自由記述欄</th>
                  <td class="apply__table__data"></td>
                </tr>
              </table>
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
          </div>
      </main>

      <?php require  "./capsule/aside.php"; ?>
    </div>
  </div>

  <script src="../assets/js/app.js?123"></script>
</body>

</html>