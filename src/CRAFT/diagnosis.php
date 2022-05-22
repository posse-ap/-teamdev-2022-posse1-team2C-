<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/diagnosis.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <p class="title">
          あなたにオススメのエージェント企業は？
        </p>
        <div class="main__inner">
          <ul class="diagnosis">
            <li class="diagnosis__category">
              <p class="diagnosis__category__title">現在の状況</p>
              <dl class="diagnosis__category__first">
                <div class="diagnosis__category__first__item">
                  <dt>卒業年度</dt>
                  <dd>
                    <label><input type="radio" name="graduation" value="23卒">23卒</label>
                    <label><input type="radio" name="graduation" value="24卒">24卒</label>
                    <label><input type="radio" name="graduation" value="25卒">25卒</label>
                    <label><input type="radio" name="graduation" value="26卒">26卒</label>
                  </dd>
                </div>
                <div class="diagnosis__category__first__item">
                  <dt>居住地</dt>
                  <dd>
                    <label><input type="radio" name="address" value="関東">関東</label>
                    <label><input type="radio" name="address" value="それ以外">それ以外</label>
                  </dd>
                </div>
                <div class="diagnosis__category__first__item">
                  <dt>既に得た内定</dt>
                  <dd>
                    <label><input type="radio" name="obtain" value="1つ">1つ</label>
                    <label><input type="radio" name="obtain" value="2つ以上">2つ以上</label>
                    <label><input type="radio" name="obtain" value="なし">なし</label>
                  </dd>
                </div>
                <div class="diagnosis__category__first__item">
                  <dt>インターンシップについて</dt>
                  <dd>
                    <label><input type="radio" name="intern" value="現在経験中">現在経験中</label>
                    <label><input type="radio" name="intern" value="過去に経験あり">過去に経験あり</label>
                    <label><input type="radio" name="intern" value="経験なし">経験なし</label>
                  </dd>
                </div>
              </dl>
            </li>
            <li class="diagnosis__category">
              <p class="diagnosis__category__title">思考スタイル</p>
              <dl class="diagnosis__category__list">
                <div class="diagnosis__category__item">
                  <dt></dt>
                  <dd>
                    <div class="diagnosis__category__item__title">そう思う</div>
                    <div class="diagnosis__category__item__title">ややそう思う</div>
                    <div class="diagnosis__category__item__title">どちらともいえない</div>
                    <div class="diagnosis__category__item__title">ややそう思わない</div>
                    <div class="diagnosis__category__item__title">そう思わない</div>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>自分の経験談・体験談を人に話ことが得意</dt>
                  <dd>
                    <label><input type="radio" name="character_1" value="そう思う"></label>
                    <label><input type="radio" name="character_1" value="ややそう思う"></label>
                    <label><input type="radio" name="character_1" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_1" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_1" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>社会的ステータスを気にする方だ</dt>
                  <dd>
                    <label><input type="radio" name="character_2" value="そう思う"></label>
                    <label><input type="radio" name="character_2" value="ややそう思う"></label>
                    <label><input type="radio" name="character_2" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_2" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_2" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>ルールが定められている環境の方がすきだ</dt>
                  <dd>
                    <label><input type="radio" name="character_3" value="そう思う"></label>
                    <label><input type="radio" name="character_3" value="ややそう思う"></label>
                    <label><input type="radio" name="character_3" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_3" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_3" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>将来やりたいことが決まっている</dt>
                  <dd>
                    <label><input type="radio" name="character_4" value="そう思う"></label>
                    <label><input type="radio" name="character_4" value="ややそう思う"></label>
                    <label><input type="radio" name="character_4" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_4" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_4" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>初めてのことに取り組むときはまず1人で始める</dt>
                  <dd>
                    <label><input type="radio" name="character_5" value="そう思う"></label>
                    <label><input type="radio" name="character_5" value="ややそう思う"></label>
                    <label><input type="radio" name="character_5" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_5" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_5" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>ワークライフバランスを重要視する</dt>
                  <dd>
                    <label><input type="radio" name="character_6" value="そう思う"></label>
                    <label><input type="radio" name="character_6" value="ややそう思う"></label>
                    <label><input type="radio" name="character_6" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_6" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_6" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>自分の行動を振り返る（反省する）ことがある</dt>
                  <dd>
                    <label><input type="radio" name="character_7" value="そう思う"></label>
                    <label><input type="radio" name="character_7" value="ややそう思う"></label>
                    <label><input type="radio" name="character_7" value="どちらともいえない"></label>
                    <label><input type="radio" name="character_7" value="ややそう思わない"></label>
                    <label><input type="radio" name="character_7" value="そう思わない"></label>
                  </dd>
                </div>
              </dl>
            </li>
            <li class="diagnosis__category">
              <p class="diagnosis__category__title">就活に対する価値観</p>
              <dl class="diagnosis__category__list">
                <div class="diagnosis__category__item">
                  <dt></dt>
                  <dd>
                    <div class="diagnosis__category__item__title">そう思う</div>
                    <div class="diagnosis__category__item__title">ややそう思う</div>
                    <div class="diagnosis__category__item__title">どちらともいえない</div>
                    <div class="diagnosis__category__item__title">ややそう思わない</div>
                    <div class="diagnosis__category__item__title">そう思わない</div>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>企業が行う選考の特徴を知っている（グルディスや個人面接、webテストなど）</dt>
                  <dd>
                    <label><input type="radio" name="job_1" value="そう思う"></label>
                    <label><input type="radio" name="job_1" value="ややそう思う"></label>
                    <label><input type="radio" name="job_1" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_1" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_1" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>ある程度自分で就活を始めている</dt>
                  <dd>
                    <label><input type="radio" name="job_2" value="そう思う"></label>
                    <label><input type="radio" name="job_2" value="ややそう思う"></label>
                    <label><input type="radio" name="job_2" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_2" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_2" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>希望する企業だけから内定をもらえればいい</dt>
                  <dd>
                    <label><input type="radio" name="job_3" value="そう思う"></label>
                    <label><input type="radio" name="job_3" value="ややそう思う"></label>
                    <label><input type="radio" name="job_3" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_3" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_3" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>とにかく多くの企業を知りたい</dt>
                  <dd>
                    <label><input type="radio" name="job_4" value="そう思う"></label>
                    <label><input type="radio" name="job_4" value="ややそう思う"></label>
                    <label><input type="radio" name="job_4" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_4" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_4" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>マンツーマンで指導してほしい</dt>
                  <dd>
                    <label><input type="radio" name="job_5" value="そう思う"></label>
                    <label><input type="radio" name="job_5" value="ややそう思う"></label>
                    <label><input type="radio" name="job_5" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_5" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_5" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>就活エージェントがどういうものか知っている</dt>
                  <dd>
                    <label><input type="radio" name="job_6" value="そう思う"></label>
                    <label><input type="radio" name="job_6" value="ややそう思う"></label>
                    <label><input type="radio" name="job_6" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_6" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_6" value="そう思わない"></label>
                  </dd>
                </div>
                <div class="diagnosis__category__item">
                  <dt>希望する職種・業界が決まっている</dt>
                  <dd>
                    <label><input type="radio" name="job_7" value="そう思う"></label>
                    <label><input type="radio" name="job_7" value="ややそう思う"></label>
                    <label><input type="radio" name="job_7" value="どちらともいえない"></label>
                    <label><input type="radio" name="job_7" value="ややそう思わない"></label>
                    <label><input type="radio" name="job_7" value="そう思わない"></label>
                  </dd>
                </div>
              </dl>
            </li>
            <li class="button">
              <button>診断結果を見る</button>
            </li>
          </ul>
        </div>
      </main>

      <?php require  "./capsule/aside.php"; ?>
    </div>
  </div>

  <?php require  "./capsule/footer.php"; ?>

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/q&a.js"></script>
  <script src="../assets/js/pagescroll.js"></script>
</body>

</html>