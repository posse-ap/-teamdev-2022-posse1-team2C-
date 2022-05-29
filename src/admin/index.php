<?php
require('./capsule/session.php');
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/index-boozer.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="container-fluid">
    <div class="row">
      <?php require  "./capsule/aside.php"; ?>
      <script>
        document.getElementById("dashboard").classList.add("active")
      </script>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h2 class="mt-5">お問い合わせ数top5【今月】</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">企業名</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">お問い合わせ数</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">アクセス数</th>
                <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1">削除</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.table-responsive -->
        <h2 class="mt-5">お問い合わせ数top5【累計】</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">企業名</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">お問い合わせ数</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">アクセス数</th>
                <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1">削除</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.table-responsive -->
        <h2 class="mt-5">アクセス数数top5【今月】</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">企業名</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">お問い合わせ数</th>
                <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">アクセス数</th>
                <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1">削除</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
                <td><button class="bg-danger">削除</button></td>
              </tr>
              <tr>
                <td>マイナビ</td>
                <td>100</td>
                <td>1000</td>
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