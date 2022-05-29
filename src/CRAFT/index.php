<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");

$agents_stmt = $db->prepare("SELECT * from agents_supports_mix");
$agents_stmt->execute();
$agents_data = $agents_stmt->fetchAll();

$agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents");
$agents_count_stmt->execute();
$agents_count_data = $agents_count_stmt->fetchAll();
$agents_count = $agents_count_data[0]['COUNT(*)'];

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

$supports_stmt = $db->prepare("SELECT support from supports");
$supports_stmt->execute();
$supports_data = $supports_stmt->fetchAll();
$support_length = count($supports_data);

for ($i = 0; $i < $support_length; $i++) {
  if (isset($_POST[$supports_data[$i][0]])) {
    $support = $supports_data[$i][0];
    $agents_stmt = $db->prepare('SELECT * from agents_supports_mix where support=?');
    $agents_stmt->bindValue(1, $support);
    $agents_stmt->execute();
    $agents_data = $agents_stmt->fetchAll();

    $agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents_supports_mix where support=?");
    $agents_count_stmt->bindValue(1, $support);
    $agents_count_stmt->execute();
    $agents_count_data = $agents_count_stmt->fetchAll();
    $agents_count = $agents_count_data[0]['COUNT(*)'];
  }
};

for ($j = 1; $j <= $agents_count; $j++) {
  if (isset($supports_data[$j][0])) {
    $agent_supports_stmt_[$j] = $db->prepare("SELECT * from agents_supports_mix WHERE agent_id = ?");
    $agent_supports_stmt_[$j]->bindValue(1, $agents_data[$j - 1]['agent_id']);
    $agent_supports_stmt_[$j]->execute();
    $agent_supports_data_[$j] = $agent_supports_stmt_[$j]->fetchAll();

    $agent_supports_count_stmt_[$j] = $db->prepare("SELECT COUNT(support) from agents_supports_mix WHERE agent_id = ?");
    $agent_supports_count_stmt_[$j]->bindValue(1, $j);
    $agent_supports_count_stmt_[$j]->execute();
    $agent_supports_count_data_[$j] = $agent_supports_count_stmt_[$j]->fetchAll();
    $agent_supports_count_[$j] = $agent_supports_count_data_[$j][0]['COUNT(support)'];
  }
}

$array_area = ['首都圏', '全国'];
count($array_area);
for ($k = 0; $k < count($array_area); $k++) {
  if (isset($_POST[$array_area[$k]])) {
    $area = $array_area[$k];
    $agents_stmt = $db->prepare('SELECT * from agents where service__aria=?');
    $agents_stmt->bindValue(1, $area);
    $agents_stmt->execute();
    $agents_data = $agents_stmt->fetchAll();

    $agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents where service__aria=?");
    $agents_count_stmt->bindValue(1, $area);
    $agents_count_stmt->execute();
    $agents_count_data = $agents_count_stmt->fetchAll();
    $agents_count = $agents_count_data[0]['COUNT(*)'];
  };
}

$array_scale = ['大手企業', 'ベンチャー企業'];
for ($k = 0; $k < count($array_scale); $k++) {
  if (isset($_POST[$array_scale[$k]])) {
    $scale = $array_scale[$k];;
    $agents_stmt = $db->prepare('SELECT * from agents where service__agent__scale=?');
    $agents_stmt->bindValue(1, $scale);
    $agents_stmt->execute();
    $agents_data = $agents_stmt->fetchAll();

    $agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents where service__agent__scale=?");
    $agents_count_stmt->bindValue(1, $scale);
    $agents_count_stmt->execute();
    $agents_count_data = $agents_count_stmt->fetchAll();
    $agents_count = $agents_count_data[0]['COUNT(*)'];
  };
}

$array_scores = ['score1', 'score2'];
$array_total = [4.0, 3.0];
for ($k = 0; $k < count($array_scores); $k++) {
  if (isset($_POST[$array_scores[$k]])) {
    $scores = $array_total[$k];
    $agents_stmt = $db->prepare('SELECT * from agents where service__total>=?');
    $agents_stmt->bindValue(1, $scores);
    $agents_stmt->execute();
    $agents_data = $agents_stmt->fetchAll();

    $agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents where service__total>=?");
    $agents_count_stmt->bindValue(1, $scores);
    $agents_count_stmt->execute();
    $agents_count_data = $agents_count_stmt->fetchAll();
    $agents_count = $agents_count_data[0]['COUNT(*)'];
  };
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scales=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/index-user.min.css">
  <link rel="stylesheet" href="../assets/css/sp.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>
  <script>
    document.getElementById("index").classList.add("active")
  </script>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <p class="title">
          エージェント企業を探す
        </p>
        <section class="section">
          <div class="search">
            <dl class="search__list">
              <form method="post">
                <div class="search__item">
                  <dt>サービス内容</dt>
                  <?
                  for ($i = 0; $i < $support_length; $i++) {
                  ?>
                    <button name="<?php echo $supports_data[$i][0]; ?>"><?php echo $supports_data[$i][0] ?></button>
                  <?
                  }
                  ?>
                </div>
              </form>
              <form method="post">
                <div class="search__item">
                  <dt>対応エリアから探す</dt>
                  <button name="首都圏">首都圏</button>
                  <button name="全国">全国</button>
                </div>
              </form>
              <form method="post">
                <div class="search__item">

                  <dt>紹介先企業の規模</dt>
                  <button name="大手企業">大手企業</button>
                  <button name="ベンチャー企業">ベンチャー企業</button>
                </div>
              </form>
              <form method="post">
                <div class="search__item">
                  <dt>総合評価から探す</dt>
                  <button name="score1">4.0~</button>
                  <button name="score2">3.0~</button>
                </div>
              </form>
            </dl>
          </div>
        </section>
        <section class="section">
          <ul class="agents">
            <?php for ($j = 1; $j <= $agents_count; $j++) { ?>
              <li class="agent">
                <ul class="agent__list">
                  <li class="agent__item">
                    <img class="img agent__item__img" src="../assets/img/agent.png" alt="企業名" width="300px" style="display: inline" />
                  </li>
                  <li class="agent__item">
                    <h3 class="agent__item__name"><?php echo $agents_data[$j - 1]['agent']; ?></h3>
                  </li>
                  <li class="agent__item">
                    <span class="agent__item__title">総合点</span>
                    <span class="star5_rating" data-rate="<?php echo $agents_data[$j - 1]['service__total']; ?>"></span>
                    <span class="number_rating"><?php echo $agents_data[$j - 1]['service__total']; ?></span>
                  </li>

                  <?php for ($k = 0; $k < $agent_supports_count_[$agent_supports_data_[$j][1][0]]; $k++) { ?>
                    <form method="post">
                      <p><?php echo $agent_supports_data_[$j][$k]['support']; ?></p>
                    </form>
                  <?php }; ?>
                  <li class="agent__item">
                    <p class="agent__item__info">
                      <?php echo $agents_data[$j - 1]['service__detail'];; ?>
                    </p>
                  </li>
                  <li class="agent__item">
                    <button class="agent__item__detail">詳細</button>
                    <button class="agent__item__apply">申し込む</button>
                  </li>
                </ul>
              </li>
            <?php }; ?>
          </ul>
        </section>
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