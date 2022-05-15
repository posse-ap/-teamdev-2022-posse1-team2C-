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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/index-boozer.min.css">
  <link rel="stylesheet" href="../assets/css/agentinfo.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="container-fluid">
    <div class="row">
      <?php require  "./capsule/aside.php"; ?>
      <script>
        document.getElementById("agent").classList.add("active")
      </script>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h2 class="mt-3 mb-3">エージェント企業一覧</h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
          </li>
        </ul>
        <div class="tab-content border border-top-0 p-5 mb-3" id="myTabContent">
          <div class="tab-pane fade show active" id="agent1" role="tabpanel">
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
            <div class="agent__title mt-3">企業情報</div>
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
                <dt>郵便番号</dt>
                <dd>112-0001</dd>
              </div>
              <div class="agent__info__contents">
                <dt>住所</dt>
                <dd>静岡県御殿場市小山町</dd>
              </div>
              <div class="agent__info__contents">
                <dt>電話番号</dt>
                <dd>09011111111</dd>
              </div>
              <div class="agent__info__contents">
                <dt>メールアドレス</dt>
                <dd>posse@keio.com</dd>
              </div>
              <div class="agent__info__contents">
                <dt>連絡先メールアドレス</dt>
                <dd>posse@keio.com</dd>
              </div>
              <div class="agent__info__contents">
                ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。ここに企業の紹介が入ります。
              </div>
            </dl>
          </div>
          <div class="tab-pane fade" id="agent2" role="tabpanel"></div>
          <div class="tab-pane fade" id="agent3" role="tabpanel"></div>
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