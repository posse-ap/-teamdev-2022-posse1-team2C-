<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/agentinfo.min.css">
  <link rel="stylesheet" href="../assets/css/sp.min.css">
  <script src="https://kit.fontawesome.com/d806b8b8d2.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <p class="title">
          エージェント企業　詳細
        </p>
        <div class="agent">
          <div class="agent__service">
            <div class="agent__service__img">
              <img src="../assets/img/mynavi.jpg" alt="マイナビ">
            </div>
            <div class="agent__service__main">
              <div class="agent__service__main__name">
                <h3 class="">
                  <i class="far fa-lightbulb"></i>
                  <span>マイナビ</span>
                </h3>
              </div>
              <p class="agent__service__main__info">ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。ここにサービスの特徴が入ります。</p>
            </div>
            <div class="agent__service__inner">
              <div class="agent__service__inner__item">
                <div class="agent__service__inner__item__kinds">
                  <span class="agent__service__inner__item__kind">ES添削</span>
                  <span class="agent__service__inner__item__kind">特別選考</span>
                  <span class="agent__service__inner__item__kind">面接練習</span>
                  <span class="agent__service__inner__item__kind">セミナー開催</span>
                  <span class="agent__service__inner__item__kind">個人面談</span>
                </div>
                <dl class="agent__service__inner__item__graph">
                  <div class="agent__service__inner__item__graph__child">
                    <dt>エージェント企業の規模</dt>
                    <dd>ベンチャー企業</dd>
                  </div>
                  <div class="agent__service__inner__item__graph__child">
                    <dt>紹介先企業の規模</dt>
                    <dd>大手企業</dd>
                  </div>
                  <div class="agent__service__inner__item__graph__child">
                    <dt>独自のサービス</dt>
                    <dd></dd>
                  </div>
                  <div class="agent__service__inner__item__graph__child">
                    <dt>対応エリア</dt>
                    <dd></dd>
                  </div>
                </dl>
              </div>
              <div class="agent__service__inner__analysis">
                <canvas id="myRaderChart" width="100%" height="100%"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
                <script>
                  var ctx = document.getElementById("myRaderChart");
                  var myRadarChart = new Chart(ctx, {
                    type: "radar",
                    data: {
                      labels: ["総合評価", "求人の質", "使いやすさ", "対応の良さ", "サポート力"],
                      datasets: [{
                        data: [2.9, 3.7, 4.5, 3.2, 4.1],
                        backgroundColor: "RGBA(225,95,150, 0.5)",
                        borderColor: "RGBA(225,95,150, 1)",
                        borderWidth: 1,
                        pointStyle: "line",
                      }, ],
                    },
                    options: {
                      legend: {
                        display: false,
                      },
                      responsive: true,
                      tooltips: {
                        enabled: false,
                      },
                      title: {
                        display: false,
                        text: "5段階評価",
                      },
                      scale: {
                        ticks: {
                          suggestedMin: 0,
                          suggestedMax: 5,
                          stepSize: 1,
                          callback: function(value) {
                            return value;
                          },
                        },
                      },
                    },
                  });
                </script>
              </div>
            </div>
          </div>
          <div class="agent__title">担当者紹介</div>
          <div class="agent__staff">
            <div class="agent__staff__img">
              <img src="../assets/img/mynavi.jpg" alt="担当者">
            </div>
            <div class="agent__staff__info">
              <p class="agent__staff__info__name">ななみん</p>
              <p class="agent__staff__info__text">
                ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。
              </p>
            </div>
          </div>
          <div class="agent__staff">
            <div class="agent__staff__img">
              <img src="../assets/img/mynavi.jpg" alt="担当者">
            </div>
            <div class="agent__staff__info">
              <p class="agent__staff__info__name">ななみん</p>
              <p class="agent__staff__info__text">
                ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。ここに担当者の紹介メッセージが入ります。
              </p>
            </div>
          </div>
          <div class="agent__title">企業情報</div>
          <dl class="agent__info">
            <div class="agent__info__contents">
              <dt>企業名</dt>
              <dd>マイナビ</dd>
            </div>
            <div class="agent__info__contents">
              <dt>企業HP（URL）</dt>
              <dd><a href="#">マイナビのHPへ</a></dd>
            </div>
            <div class="agent__info__contents">
              <dt>代表者氏名</dt>
              <dd>湯山トモハル</dd>
            </div>
            <div class="agent__info__contents">
              ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。
            </div>
          </dl>
        </div>
      </main>

      <?php require  "./capsule/aside.php"; ?>
    </div>
  </div>

  <?php require  "./capsule/footer.php"; ?>

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/pagescroll.js"></script>
  <script src="../assets/js/sp.js"></script>
</body>

</html>