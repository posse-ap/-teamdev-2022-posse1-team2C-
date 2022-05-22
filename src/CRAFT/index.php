<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");

$agents_stmt = $db->prepare("SELECT * from agents");
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
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/index-user.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="content">
    <div class="container inner">
      <main class="main">
        <p class="title">
          エージェント企業を探す
        </p>
        <section class="section">
          <div class="search">
            <div class="search__box">
              <dl class="search__list">
                <div class="search__item">
                  <dt>サポート体制</dt>
                  <dd>就職セミナー</dd>
                  <dd>じっくり面接対策</dd>
                  <dd>ES添削</dd>
                </div>
                <div class="search__item">
                  <dt>得意な業種・業界</dt>
                  <dd>総合コンサル</dd>
                  <dd>IT系</dd>
                  <dd>エンタメ</dd>
                  <dd>教育</dd>
                  <dd>金融</dd>
                </div>
                <div class="search__item">
                  <dt>公開求人数</dt>
                  <dd class="select__wrapper">
                    <select name="" id="">
                      <option value="選択してください" selected disabled>
                        選択してください
                      </option>
                      <option value="～3万">～3万</option>
                      <option value="3万～5万">3万～5万</option>
                      <option value="5万～10万">5万～10万</option>
                      <option value="10万～">10万～</option>
                    </select>
                  </dd>
                </div>
                <div class="search__item">
                  <dt>公開求人数</dt>
                  <dd class="select__wrapper">
                    <select name="" id="">
                      <option value="選択してください" selected disabled>
                        選択してください
                      </option>
                      <option value="～3万">～3万</option>
                      <option value="3万～5万">3万～5万</option>
                      <option value="5万～10万">5万～10万</option>
                      <option value="10万～">10万～</option>
                    </select>
                  </dd>
                </div>
                <div class="search__item">
                  <button>検索する</button>
                </div>
              </dl>
            </div>
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

                  <?php for ($k = 0; $k <= $agent_supports_count_[$j] - 1; $k++) { ?>
                    <p><?php echo $agent_supports_data_[$j][$k]['support']; ?></p>
                  <?php }; ?>
                  <p></p>
                  <p></p>
                  <p></p>
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
</body>

</html>