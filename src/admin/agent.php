<?php
require('./capsule/session.php');
require('../dbconnect.php');
$agents_stmt = $db->prepare("SELECT * from agents");
$agents_stmt->execute();
$agents_data = $agents_stmt->fetchAll();

$agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents");
$agents_count_stmt->execute();
$agents_count_data = $agents_count_stmt->fetchAll();
$agents_count = $agents_count_data[0]['COUNT(*)'];

$staffs_stmt = $db->prepare("SELECT * from staffs");
$staffs_stmt->execute();
$staffs_data = $staffs_stmt->fetchAll();

for ($j = 1; $j <= $agents_count; $j++) {
  $agent_supports_stmt_[$j] = $db->prepare("SELECT * from agents_supports_mix WHERE agent_id = ?");
  $agent_supports_stmt_[$j]->bindValue(1, $j);
  $agent_supports_stmt_[$j]->execute();
  $agent_supports_data_[$j] = $agent_supports_stmt_[$j]->fetchAll();

  $agent_supports_count_stmt_[$j] = $db->prepare("SELECT COUNT(support) from agents_supports_mix WHERE agent_id = ?");
  $agent_supports_count_stmt_[$j]->bindValue(1, $j);
  $agent_supports_count_stmt_[$j]->execute();
  $agent_supports_count_data_[$j] = $agent_supports_count_stmt_[$j]->fetchAll();
  $agent_supports_count_[$j] = $agent_supports_count_data_[$j][0]['COUNT(support)'];
}
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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#agent1" role="tab" aria-controls="home" aria-selected="true"><?php echo $agents_data[0]['agent']; ?></a>
          </li>
          <?php for ($i = 1; $i < $agents_count; $i++) { ?>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#agent<? echo $i+1; ?>" role="tab" aria-controls="profile" aria-selected="false"><?php echo $agents_data[$i]['agent']; ?></a>
            </li>
          <?php }; ?>


        </ul>
        <div class="tab-content border border-top-0 p-5 mb-3" id="myTabContent">
          <div class="tab-pane fade show active" id="agent1" role="tabpanel">
            <div class="agent__title">サービス詳細</div>
            <div class="agent__staff">
              <div class="agent__staff__img">
                <img src="../assets/img/mynavi.jpg" alt="担当者">
              </div>
              <dl class="agent__staff__info">
                <div class="agent__info__contents">
                  <dt>サービス名</dt>
                  <dd><?php echo $agents_data[0]['service__name'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>サービスの特徴</dt>
                  <dd><?php echo $agents_data[0]['service__detail'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>サポート内容</dt>
                  <dd>
                    <?php for ($j = 0; $j < $agent_supports_count_[1]-1; $j++) { ?>
                      <?php echo $agent_supports_data_[1][$j]['support'];?>
                      ・
                      <?php }?>
                      <?php echo $agent_supports_data_[1][$agent_supports_count_[1]-1]['support']; ?>
                  </dd>
                </div>
                <div class="agent__info__contents">
                  <dt>エージェント企業の規模</dt>
                  <dd><?php echo $agents_data[0]['service__detail'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>取引先企業の規模</dt>
                  <dd><?php echo $agents_data[0]['service__agent__scale'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>対応エリア</dt>
                  <dd><?php echo $agents_data[0]['service__aria'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>独自のサービス</dt>
                  <dd><?php echo $agents_data[0]['service__unique'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>総合評価</dt>
                  <dd><?php echo $agents_data[0]['service__total'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>求人の質</dt>
                  <dd><?php echo $agents_data[0]['service__offer'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>使いやすさ</dt>
                  <dd><?php echo $agents_data[0]['service__useful'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>対応の良さ</dt>
                  <dd><?php echo $agents_data[0]['service__reaction'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>サポート力</dt>
                  <dd><?php echo $agents_data[0]['service__support'] ?></dd>
                </div>
              </dl>
            </div>
            <div class="agent__title">担当者</div>
            <div class="agent__staff">
              <div class="agent__staff__img">
                <img src="../assets/img/mynavi.jpg" alt="担当者">
              </div>
              <dl class="agent__staff__info">
                <div class="agent__info__contents">
                  <dt>担当者氏名</dt>
                  <dd><?php echo $staffs_data[0]['staff__name__kanji'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>担当者氏名（フリガナ）</dt>
                  <dd><?php echo $staffs_data[0]['staff__name__kana'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>電話番号</dt>
                  <dd><?php echo $staffs_data[0]['staff__tel'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>メールアドレス</dt>
                  <dd><?php echo $staffs_data[0]['staff__email'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>部署</dt>
                  <dd><?php echo $staffs_data[0]['staff__dept'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>担当者紹介文</dt>
                  <dd><?php echo $staffs_data[0]['staff__detail'] ?></dd>
                </div>
              </dl>
            </div>
            <div class="agent__title mt-3">企業情報</div>
            <dl class="agent__info">
              <div class="agent__info__contents">
                <dt>企業名</dt>
                <dd><?php echo $agents_data[0]['agent'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>代表者氏名</dt>
                <dd><?php echo $agents_data[0]['name__kanji'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>代表者氏名（フリガナ）</dt>
                <dd><?php echo $agents_data[0]['name__kana'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>URL（企業HP）</dt>
                <dd><a href="#"><?php echo $agents_data[0]['url'] ?></a></dd>
              </div>
              <div class="agent__info__contents">
                <dt>郵便番号</dt>
                <dd><?php echo $agents_data[0]['postcode'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>住所</dt>
                <dd><?php echo $agents_data[0]['address'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>電話番号</dt>
                <dd><?php echo $agents_data[0]['tel'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>メールアドレス</dt>
                <dd><?php echo $agents_data[0]['email'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>連絡先メールアドレス</dt>
                <dd><?php echo $agents_data[0]['contact__email'] ?></dd>
              </div>
              <div class="agent__info__contents">
                <dt>企業紹介</dt>
                <dd><?php echo $agents_data[0]['agent__detail'] ?></dd>
              </div>
            </dl>
          </div>
          <?php for ($i = 1; $i < $agents_count; $i++) { ?>
            <div class="tab-pane fade" id="agent<?php echo $i+1; ?>" role="tabpanel">
              <div class="agent__title">サービス詳細</div>
              <div class="agent__staff">
                <div class="agent__staff__img">
                  <img src="../assets/img/mynavi.jpg" alt="担当者">
                </div>
                <dl class="agent__staff__info">
                  <div class="agent__info__contents">
                    <dt>サービス名</dt>
                    <dd><?php echo $agents_data[$i]['service__name'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>サービスの特徴</dt>
                    <dd><?php echo $agents_data[$i]['service__detail'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>サポート内容</dt>
                    <dd>  
                    <?php for ($j = 0; $j < $agent_supports_count_[$i]-1; $j++) { ?>
                      <?php echo $agent_supports_data_[$i][$j]['support'];?>
                      ・
                      <?php }?>
                      <?php echo $agent_supports_data_[$i][$agent_supports_count_[1]-1]['support']; ?>
                    </dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>エージェント企業の規模</dt>
                    <dd><?php echo $agents_data[$i]['service__detail'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>取引先企業の規模</dt>
                    <dd><?php echo $agents_data[$i]['service__agent__scale'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>対応エリア</dt>
                    <dd><?php echo $agents_data[$i]['service__aria'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>独自のサービス</dt>
                    <dd><?php echo $agents_data[$i]['service__unique'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>総合評価</dt>
                    <dd><?php echo $agents_data[$i]['service__total'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>求人の質</dt>
                    <dd><?php echo $agents_data[$i]['service__offer'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>使いやすさ</dt>
                    <dd><?php echo $agents_data[$i]['service__useful'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>対応の良さ</dt>
                    <dd><?php echo $agents_data[$i]['service__reaction'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>サポート力</dt>
                    <dd><?php echo $agents_data[$i]['service__support'] ?></dd>
                  </div>
                </dl>
              </div>
              <div class="agent__title">担当者</div>
              <div class="agent__staff">
                <div class="agent__staff__img">
                  <img src="../assets/img/mynavi.jpg" alt="担当者">
                </div>
                <dl class="agent__staff__info">
                  <div class="agent__info__contents">
                    <dt>担当者氏名</dt>
                    <dd><?php echo $staffs_data[$i]['staff__name__kanji'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>担当者氏名（フリガナ）</dt>
                    <dd><?php echo $staffs_data[$i]['staff__name__kana'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>電話番号</dt>
                    <dd><?php echo $staffs_data[$i]['staff__tel'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>メールアドレス</dt>
                    <dd><?php echo $staffs_data[$i]['staff__email'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>部署</dt>
                    <dd><?php echo $staffs_data[$i]['staff__dept'] ?></dd>
                  </div>
                  <div class="agent__info__contents">
                    <dt>担当者紹介文</dt>
                    <dd><?php echo $staffs_data[$i]['staff__detail'] ?></dd>
                  </div>
                </dl>
              </div>
              <div class="agent__title mt-3">企業情報</div>
              <dl class="agent__info">
                <div class="agent__info__contents">
                  <dt>企業名</dt>
                  <dd><?php echo $agents_data[$i]['agent'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>代表者氏名</dt>
                  <dd><?php echo $agents_data[$i]['name__kanji'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>代表者氏名（フリガナ））</dt>
                  <dd><?php echo $agents_data[$i]['name__kana'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>URL（企業HP）</dt>
                  <dd><a href="#"><?php echo $agents_data[$i]['url'] ?></a></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>郵便番号</dt>
                  <dd><?php echo $agents_data[$i]['postcode'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>住所</dt>
                  <dd><?php echo $agents_data[$i]['address'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>電話番号</dt>
                  <dd><?php echo $agents_data[$i]['tel'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>メールアドレス</dt>
                  <dd><?php echo $agents_data[$i]['email'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>連絡先メールアドレス</dt>
                  <dd><?php echo $agents_data[$i]['contact__email'] ?></dd>
                </div>
                <div class="agent__info__contents">
                  <dt>企業紹介</dt>
                  <dd><?php echo $agents_data[$i]['agent__detail'] ?></dd>
                </div>
              </dl>

            </div>
          <?php }; ?>

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