<?php
session_start();
require(dirname(__FILE__) . "/../dbconnect.php");

if (!isset($_SESSION['agent_id'])) {
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/CRAFT/index.php');
  exit();
}

$agent_id = $_SESSION['agent_id']-1;

$agents_stmt = $db->prepare("SELECT * from agents");
$agents_stmt->execute();
$agents_data = $agents_stmt->fetchAll();

$staffs_stmt = $db->prepare("SELECT * from staffs");
$staffs_stmt->execute();
$staffs_data = $staffs_stmt->fetchAll();

$clientscales_stmt = $db->prepare("SELECT * from agents_clientscales_mix where agent_id=?");
$clientscales_stmt->bindValue(1, $agent_id);
$clientscales_stmt->execute();
$clientscales_data = $clientscales_stmt->fetchAll();

$clientscales_count_stmt = $db->prepare("SELECT COUNT(clientscale) from agents_clientscales_mix WHERE agent_id = ?");
$clientscales_count_stmt->bindValue(1, $agent_id);
$clientscales_count_stmt->execute();
$clientscales_count_data = $clientscales_count_stmt->fetchAll();
$clientscales_count = $clientscales_count_data[0]['COUNT(clientscale)'];

$agent_supports_stmt = $db->prepare("SELECT * from agents_supports_mix WHERE agent_id = ?");
$agent_supports_stmt->bindValue(1, $agent_id);
$agent_supports_stmt->execute();
$agent_supports_data = $agent_supports_stmt->fetchAll();

$agent_supports_count_stmt = $db->prepare("SELECT COUNT(support) from agents_supports_mix WHERE agent_id = ?");
$agent_supports_count_stmt->bindValue(1, $agent_id);
$agent_supports_count_stmt->execute();
$agent_supports_count_data = $agent_supports_count_stmt->fetchAll();
$agent_supports_count = $agent_supports_count_data[0]['COUNT(support)'];
?>

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
                  <span><?php echo $agents_data[$agent_id]['service__name']; ?></span>
                </h3>
              </div>
              <p class="agent__service__main__info"><?php echo $agents_data[$agent_id]['service__detail']; ?></p>
            </div>
            <div class="agent__service__inner">
              <div class="agent__service__inner__item">
                <div class="agent__service__inner__item__kinds">
                  <?php for ($i = 0; $i < $agent_supports_count; $i++) { ?>
                    <span class="agent__service__inner__item__kind"><? echo $agent_supports_data[$i]['support']; ?></span>
                  <?php } ?>
                </div>
                <dl class="agent__service__inner__item__graph">
                  <div class="agent__service__inner__item__graph__child">
                    <dt>エージェント企業の規模</dt>
                    <dd><?php echo $agents_data[$agent_id]['service__agent__scale']; ?></dd>
                  </div>
                  <div class="agent__service__inner__item__graph__child">
                    <dt>紹介先企業の規模</dt>
                    <dd>
                      <?php
                      for ($i = 0; $i < $clientscales_count - 1; $i++) {
                        echo $clientscales_data[0]['clientscale']; ?>・
                      <?php }?>
                      <?php if($clientscales_count>0){
                      echo $clientscales_data[$clientscales_count - 1]['clientscale'];}
                      else{
                        echo '-';
                      } ?>

                    </dd>
                  </div>
                  <div class="agent__service__inner__item__graph__child">
                    <dt>独自のサービス</dt>
                    <dd><?php echo $agents_data[$agent_id]['service__unique']; ?></dd>
                  </div>
                  <div class="agent__service__inner__item__graph__child">
                    <dt>対応エリア</dt>
                    <dd><?php echo $agents_data[$agent_id]['service__aria'] ?></dd>
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
                        data: [
                          <?php echo $agents_data[$agent_id]['service__total']; ?>,
                          <?php echo $agents_data[$agent_id]['service__offer']; ?>,
                          <?php echo $agents_data[$agent_id]['service__useful']; ?>,
                          <?php echo $agents_data[$agent_id]['service__reaction']; ?>,
                          <?php echo $agents_data[$agent_id]['service__support']; ?>
                        ],
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
              <p class="agent__staff__info__name"><?php echo $staffs_data[$agent_id]['staff__name__kanji']; ?></p>
              <p class="agent__staff__info__text">
                <?php echo $staffs_data[$agent_id]['staff__detail']; ?>
              </p>

            </div>
          </div>
          <div class="agent__title">企業情報</div>
          <dl class="agent__info">
            <div class="agent__info__contents">
              <dt>企業名</dt>
              <dd><?php echo $agents_data[$agent_id]['agent']; ?></dd>
            </div>
            <div class="agent__info__contents">
              <dt>企業HP（URL）</dt>
              <dd><a href="<?php echo $agents_data[$agent_id]['url']; ?>"><?php echo $agents_data[$agent_id]['agent']; ?>のHPへ</a></dd>
            </div>
            <div class="agent__info__contents">
              <dt>代表者氏名</dt>
              <dd><?php echo $agents_data[$agent_id]['name__kanji']; ?></dd>
            </div>
            <div class="agent__info__contents">
              <?php echo $agents_data[$agent_id]['agent__detail']; ?>
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