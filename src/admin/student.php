<?php
// require('./capsule/session.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/index-boozer.min.css">
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">BOOZER</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="サイドバーメニュー" aria-expanded="false" aria-label="ナビゲーションの切替">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="search" placeholder="検索" aria-label="検索">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">サインアウト</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">
                <span data-feather="home"></span>
                ダッシュボード
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./student.php">
                <span data-feather="file"></span>
                学生<span class="sr-only">(現位置)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                製品
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                顧客
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                報告
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                統合
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>保存されたレポート</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                今月
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                前四半期
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                社会的関与
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                年末販売
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h2 class="mt-3 mb-3">お問い合わせをした学生一覧</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">お問い合わせ時刻</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">氏名</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">大学</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">お問い合わせ先</th>
                <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1">詳細</th>
                <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1">削除</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>尾関なな海</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>湯山智晴</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>千羽maria</td>
                <td>東京大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>福場脩真</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>2022年4月6日 15:45:04</td>
                <td>森本健介</td>
                <td>慶應義塾大学</td>
                <td>マイナビ</td>
                <td><button class="bg-secondary">詳細</button></td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.table-responsive -->
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