<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");


$errmessage_agent = array();
$array_agent_forms = [
  'agent', 'name__kanji', 'name__kana', 'url', 'postcode', 'address', 'tel', 'email', 'contact__email',  'agent__detail'
];
$array_agent_message = [
  '貴社名', '代表者様氏名(漢字)', '代表者様氏名(フリガナ)', 'URL', '郵便番号', '住所', '電話番号', 'メールアドレス', '連絡先メールアドレス', '企業紹介'
];
$agent_forms_length = count($array_agent_forms);
for ($i = 0; $i < $agent_forms_length; $i++) {
  $_SESSION[$array_agent_forms[$i]] = '';
}

$errmessage_staff = array();
$array_staff_forms = [
  'staff__name__kanji', 'staff__name__kana', 'staff__tel',  'staff__email', 'staff__dept', 'staff__pass', 'staff__detail'
];

$array_staff_message = [
  '担当者様氏名(漢字)', '担当者様氏名(フリガナ)', '電話番号', 'メールアドレス', '部署', 'パスワード', '担当者紹介文'
];
$staff_forms_length = count($array_staff_forms);
for ($i = 0; $i < $staff_forms_length; $i++) {
  $_SESSION[$array_staff_forms[$i]] = '';
}

$errmessage_service = array();
$array_service_forms = [
  'service__name', 'service__aria', 'service__unique', 'service__detail'
];
$array_service_message = [
  'サービス名', '対応エリア', '独自のサービス', 'サービス紹介'
];
$service_forms_length = count($array_service_forms);
for ($i = 0; $i < $service_forms_length; $i++) {
  $_SESSION[$array_service_forms[$i]] = '';
}

$errmessage_service2 = array();
$array_service2_forms = [
  'support', 'service__agent__scale', 'service__client__scale', 'service__total', 'service__offer', 'service__useful', 'service__reaction', 'service__support'
];
$array_service2_message = [
  'サポート内容', 'エージェント企業の規模', '紹介先企業の規模', '総合評価', '求人の質', '使いやすさ', '対応するの良さ', 'サポート力'
];
$service2_forms_length = count($array_service2_forms);
for ($i = 0; $i < $service2_forms_length; $i++) {
  $_SESSION[$array_service2_forms[$i]] = '';
}





if (isset($_POST['send']) && $_POST['send']) {
  for ($i = 0; $i < $agent_forms_length; $i++) {
    if (!$_POST[$array_agent_forms[$i]] && !$_SESSION[$array_agent_forms[$i]]) {
      $errmessage_agent[] = "{$array_agent_message[$i]}を入力してください";
    } else {
      $errmessage_agent[] = '';
    }
  }

  for ($i = 0; $i < $staff_forms_length; $i++) {
    if (!$_POST[$array_staff_forms[$i]] && !$_SESSION[$array_staff_forms[$i]]) {
      $errmessage_staff[] = "{$array_staff_message[$i]}を入力してください";
    } else {
      $errmessage_staff[] = '';
    }
  }

  for ($i = 0; $i < $service_forms_length; $i++) {
    if (!$_POST[$array_service_forms[$i]] && !$_SESSION[$array_service_forms[$i]]) {
      $errmessage_service[] = "{$array_service_message[$i]}を入力してください";
    } else {
      $errmessage_service[] = '';
    }
  }

  for ($i = 0; $i < $service2_forms_length; $i++) {
    if (!isset($_POST[$array_service2_forms[$i]])) {
      $errmessage_service2[] = "{$array_service2_message[$i]}を入力してください";
    } else {
      $errmessage_service2[] = '';
    }
  }

  for ($i = 0; $i < $agent_forms_length; $i++) {
    $_SESSION[$array_agent_forms[$i]] = $_POST[$array_agent_forms[$i]];
  }

  for ($i = 0; $i < $staff_forms_length; $i++) {
    $_SESSION[$array_staff_forms[$i]] = $_POST[$array_staff_forms[$i]];
  }

  for ($i = 0; $i < $service_forms_length; $i++) {
    $_SESSION[$array_service_forms[$i]] = $_POST[$array_service_forms[$i]];
  }


  if (
    $_SESSION['agent'] == !'' &&
    $_SESSION['name__kanji'] == !'' &&
    $_SESSION['name__kana'] == !'' &&
    $_SESSION['url'] == !'' &&
    $_SESSION['postcode'] == !'' &&
    $_SESSION['address'] == !'' &&
    $_SESSION['tel'] == !'' &&
    $_SESSION['email'] == !'' &&
    $_SESSION['contact__email'] == !'' &&
    $_SESSION['agent__detail'] == !'' &&
    $_SESSION['staff__name__kanji'] == !'' &&
    $_SESSION['staff__name__kana'] == !'' &&
    $_SESSION['staff__tel'] == !'' &&
    $_SESSION['staff__email'] == !'' &&
    $_SESSION['staff__dept'] == !'' &&
    $_SESSION['staff__pass'] == !'' &&
    $_SESSION['staff__detail'] == !'' &&
    $_SESSION['service__name'] == !'' &&
    $_SESSION['service__aria'] == !'' &&
    $_SESSION['service__unique'] == !'' &&
    $_SESSION['service__detail'] == !'' &&
    isset($_POST['support']) == !'' &&
    isset($_POST['service__agent__scale']) == !'' &&
    isset($_POST['service__client__scale']) == !'' &&
    isset($_POST['service__total']) == !'' &&
    isset($_POST['service__offer']) == !'' &&
    isset($_POST['service__useful']) == !'' &&
    isset($_POST['service__reaction']) == !'' &&
    isset($_POST['service__support']) == !''
  ) {
    for ($i = 0; $i < $service2_forms_length; $i++) {
      $_SESSION[$array_service2_forms[$i]] =
        $_POST[$array_service2_forms[$i]];
    }
    for ($i = 0; $i < $agent_forms_length; $i++) {
      $_SESSION[$array_agent_forms[$i]] = $_POST[$array_agent_forms[$i]];
    }

    $agent = $db->exec('INSERT INTO agents SET
    agent="' . $_SESSION['agent'] . '",
    name__kanji="' . $_SESSION['name__kanji'] . '",
    name__kana="' . $_SESSION['name__kana'] . '",
    url="' . $_SESSION['url'] . '",
    postcode="' . $_SESSION['postcode'] . '",
    address="' . $_SESSION['address'] . '",
    tel="' . $_SESSION['tel'] . '",
    email="' . $_SESSION['email'] . '",
    contact__email="' . $_SESSION['contact__email'] . '",
    agent__detail="' . $_SESSION['agent__detail'] . '",
    service__agent__scale="' . $_SESSION['service__agent__scale'] . '",
    service__aria="' . $_SESSION['service__aria'] . '",
    service__unique="' . $_SESSION['service__unique'] . '",
    service__name="' . $_SESSION['service__name'] . '",
    service__total="' . $_SESSION['service__total'] . '",
    service__offer="' . $_SESSION['service__offer'] . '",
    service__useful="' . $_SESSION['service__useful'] . '",
    service__reaction="' . $_SESSION['service__reaction'] . '",
    service__detail="' . $_SESSION['service__detail'] . '",
    service__support="' . $_SESSION['service__support'] . '"
    ');
    for ($i = 0; $i < $staff_forms_length; $i++) {
      $_SESSION[$array_staff_forms[$i]] = $_POST[$array_staff_forms[$i]];
    }
    $staff = $db->exec('INSERT INTO staffs SET
  staff__name__kanji="' . $_SESSION['staff__name__kanji'] . '",
  staff__name__kana="' . $_SESSION['staff__name__kana'] . '",
  staff__tel="' . $_SESSION['staff__tel'] . '",
  staff__email="' . $_SESSION['staff__email'] . '",
  staff__dept="' . $_SESSION['staff__dept'] . '",
  staff__pass="' . sha1($_SESSION['staff__pass']) . '",
  staff__detail="' . $_SESSION['staff__detail'] . '"
  ');
    $service_length = count($_POST['support']);
    $agents_count_stmt = $db->prepare("SELECT COUNT(*) from agents");
    $agents_count_stmt->execute();
    $agents_count_data = $agents_count_stmt->fetchAll();
    $agents_count = $agents_count_data[0]['COUNT(*)'];
    for ($j = 0; $j < $service_length; $j++) {
      $agents_supports_connect = $db->exec('INSERT INTO agents_supports_connect SET
agent_id="' . $agents_count . '",
support_id="' . $_POST['support'][$j] . '"
');
      $agents_supports_mix = $db->exec('
DROP TABLE IF EXISTS agents_supports_mix;

CREATE table agents_supports_mix AS
SELECT
  agent_id,
  support
FROM
  supports
  join agents_supports_connect on support_id = supports.id;

');
    }

    $client__scale_length = count($_POST['service__client__scale']);
    for ($j = 0; $j < $client__scale_length; $j++) {
      $agents_supports_connect = $db->exec('INSERT INTO agents_clientscales_connect SET
agent_id="' . $agents_count . '",
clientscales_id="' . $_POST['service__client__scale'][$j] . '"
');
    }

    $_SESSION = array();
    for ($i = 0; $i < $agent_forms_length; $i++) {
      $_SESSION[$array_agent_forms[$i]] = '';
    }
    for ($i = 0; $i < $staff_forms_length; $i++) {
      $_SESSION[$array_staff_forms[$i]] = '';
    }
    header('Location: http://localhost/admin/add.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/apply.min.css">
  <link rel="stylesheet" href="../assets/css/index-boozer.min.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <div class="container-fluid">
    <div class="row">
      <?php require  "./capsule/aside.php"; ?>
      <script>
        document.getElementById("add").classList.add("active")
      </script>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h2 class="mt-3 mb-3">エージェント企業新規追加</h2>
        <div class="apply mb-5 mt-5" id="apply">
          <div class="apply__input" role="apply">
            <form action="" name="apply__form" class="apply__form" method="post">
              <p class="subtitle">エージェント企業様基本情報</p>
              <dl class="apply__form__list">
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[0];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">

                  <dt><label for="agent">貴社名</label></dt>
                  <dd><input id="agent" type="text" name="agent" value="<?php echo $_SESSION['agent']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[1];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="name__kanji">代表者様氏名</label></dt>
                  <dd><input id="name__kanji" type="text" name="name__kanji" value="<?php echo $_SESSION['name__kanji']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[2];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="name__kana">代表者様氏名（フリガナ）</label></dt>
                  <dd><input id="name__kana" type="text" name="name__kana" value="<?php echo $_SESSION['name__kana']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[3];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="url">URL（企業HP）</label></dt>
                  <dd><input id="url" type="text" name="url" value="<?php echo $_SESSION['url']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[4];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="postcode">郵便番号</label></dt>
                  <dd><input id="postcode" type="text" name="postcode" value="<?php echo $_SESSION['postcode']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[5];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="address">住所</label></dt>
                  <dd><input id="address" type="text" name="address" value="<?php echo $_SESSION['address']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[6];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="tel">電話番号</label></dt>
                  <dd><input id="tel" type="text" name="tel" value="<?php echo $_SESSION['tel']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[7];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="email">メールアドレス</label></dt>
                  <dd><input id="email" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[8];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="email">連絡先メールアドレス</label></dt>
                  <dd><input id="contact__email" type="email" name="contact__email" value="<?php echo $_SESSION['contact__email']; ?>" /></dd>
                </div>


                <?php
                if ($errmessage_agent) {
                  echo '<div style="color:red;">';
                  echo $errmessage_agent[9];
                  echo '</div>';
                }
                ?>

                <div class="apply__form__item">
                  <dt><label for="agent__detail">企業紹介</label></dt>
                  <dd><textarea name="agent__detail" id="agent__detail"><?php echo $_SESSION['agent__detail']; ?></textarea></dd>
                </div>
              </dl>
              <p class="subtitle">担当者様情報</p>
              <dl class="apply__form__list">
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[0];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">

                  <dt><label for="staff__name__kanji">お名前</label></dt>
                  <dd><input id="staff__name__kanji" type="text" name="staff__name__kanji" value="<?php echo $_SESSION['staff__name__kanji']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[1];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">

                  <dt><label for="staff__name__kana">お名前（フリガナ）</label></dt>
                  <dd><input id="staff__name__kana" type="text" name="staff__name__kana" value="<?php echo $_SESSION['staff__name__kana']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[2];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="staff__tel">電話番号</label></dt>
                  <dd><input id="staff__tel" type="text" name="staff__tel" value="<?php echo $_SESSION['staff__tel']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[3];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="staff__email">メールアドレス</label></dt>
                  <dd><input id="staff__email" type="email" name="staff__email" value="<?php echo $_SESSION['staff__email']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[4];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="staff__dept">部署</label></dt>
                  <dd><input id="staff__dept" type="text" name="staff__dept" value="<?php echo $_SESSION['staff__dept']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[5];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="staff__pass">パスワード</label></dt>
                  <dd><input id="staff__pass" type="text" name="staff__pass" value="<?php echo $_SESSION['staff__pass']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_staff) {
                  echo '<div style="color:red;">';
                  echo $errmessage_staff[6];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="staff__detail">担当者紹介文</label></dt>
                  <dd><textarea name="staff__detail" id="staff__detail"><?php echo $_SESSION['staff__detail']; ?></textarea></dd>
                </div>
              </dl>
              <p class="subtitle">サービス詳細</p>
              <dl class="apply__form__list">
                <?php
                if ($errmessage_service) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service[0];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__name">サービス名</label></dt>
                  <dd><input id="service__name" type="text" name="service__name" value="<?php echo $_SESSION['service__name']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[0];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt>サポート内容</dt>
                  <dd>
                    <?php
                    $array_support = [
                      '面接対策', 'セミナー/イベント開催"', '選考対策', '企業紹介', 'ES添削', '内定後のサポート', '選考後のフォロー', '個別面談', '自己分析', '特別選考', 'インターンシップ紹介', '業界研究'
                    ];
                    count($array_support);
                    ?>
                    <?php for ($j = 0; $j < count($array_support); $j++) { ?>
                      <label><input type="checkbox" name="support[]" value="<?php echo $j; ?>" /><?php echo $array_support[$j]; ?></label>
                    <?php }; ?>
                  </dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[1];
                  echo '</div>';
                }
                ?>

                <div class="apply__form__item">
                  <dt>エージェント企業の規模</dt>
                  <dd>
                    <label><input type="radio" name="service__agent__scale" value="ベンチャー企業" />ベンチャー企業</label>
                    <label><input type="radio" name="service__agent__scale" value="中小企業" />中小企業</label>
                    <label><input type="radio" name="service__agent__scale" value="大企業" />大企業</label>
                  </dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[2];
                  echo '</div>';
                }
                ?>

                <div class="apply__form__item">
                  <dt>紹介先企業の規模</dt>
                  <dd>
                    <?php
                    $array_client = [
                      'ベンチャー企業', '中小企業', '大企業'
                    ];
                    count($array_client);
                    ?>
                    <?php for ($j = 0; $j < count($array_client); $j++) { ?>
                      <label><input type="checkbox" name="service__client__scale[]" value="<?php echo $j; ?>" /><?php echo $array_client[$j]; ?></label>
                    <?php }; ?>
                  </dd>
                </div>
                <?php
                if ($errmessage_service) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service[1];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__aria">対応エリア</label></dt>
                  <dd><input id="service__aria" type="text" name="service__aria" value="<?php echo $_SESSION['service__aria']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_service) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service[2];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__unique">独自のサービス</label></dt>
                  <dd><input id="service__unique" type="text" name="service__unique" value="<?php echo $_SESSION['service__unique']; ?>" /></dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[3];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__total">総合評価</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__total" name="service__total">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <?php for ($i = 50; $i >= 0; $i--) { ?>
                          <option value="<?php echo $i * 0.1; ?>"><?php echo $i * 0.1; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                  </dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[4];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__offer">求人の質</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__offer" name="service__offer">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <?php for ($i = 50; $i >= 0; $i--) { ?>
                          <option value="<?php echo $i * 0.1; ?>"><?php echo $i * 0.1; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                  </dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[4];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__useful">使いやすさ</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__useful" name="service__useful">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <?php for ($i = 50; $i >= 0; $i--) { ?>
                          <option value="<?php echo $i * 0.1; ?>"><?php echo $i * 0.1; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                  </dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[5];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__reaction">対応の良さ</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__reaction" name="service__reaction">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <?php for ($i = 50; $i >= 0; $i--) { ?>
                          <option value="<?php echo $i * 0.1; ?>"><?php echo $i * 0.1; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                  </dd>
                </div>
                <?php
                if ($errmessage_service2) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service2[6];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__support">サポート力</label></dt>
                  <dd>
                    <div class="apply__form__item__select">
                      <select id="service__support" name="service__support">
                        <option value="選択してください" selected disabled>
                          選択してください
                        </option>
                        <?php for ($i = 50; $i >= 0; $i--) { ?>
                          <option value="<?php echo $i * 0.1; ?>"><?php echo $i * 0.1; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                  </dd>
                </div>
                <?php
                if ($errmessage_service) {
                  echo '<div style="color:red;">';
                  echo $errmessage_service[3];
                  echo '</div>';
                }
                ?>
                <div class="apply__form__item">
                  <dt><label for="service__detail">サービスの特徴</label></dt>
                  <dd><textarea name="service__detail" id="service__detail"><?php echo $_SESSION['service__detail']; ?></textarea></dd>
                </div>
              </dl>
              <div class="apply__form__footer">
                <button class="apply__form__button border-0" role="submit" type="submit" name="send" value="確認">追加</button>
              </div>
            </form>
          </div>
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