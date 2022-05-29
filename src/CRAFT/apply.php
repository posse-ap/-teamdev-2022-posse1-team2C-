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

$array_forms = ['name__kanji', 'name__kana', 'email', 'tel', 'postcode', 'address', 'university', 'faculty', 'course', 'content'];
$array2_forms = ['agent', 'birth', 'graduate'];
$forms_length = count($array_forms);
$forms2_length = count($array2_forms);
$array_errmessage = [
    'お名前(漢字)', 'お名前(フリガナ)', 'メールアドレス', '電話番号', '郵便番号', '住所', '大学', '学部', '学科'
];
$array2_errmessage = [
    'お問い合わせ先エージェント企業', '生年月日', '卒業年度'
];
$errmessage = array();
$errmessage2 = array();
for ($i = 0; $i < $forms_length - 1; $i++) {
    $errmessage[$i] = '';
}
for ($i = 0; $i < $forms2_length; $i++) {
    $errmessage2[$i] = '';
}
$mode = 'input';
if (isset($_POST['back']) && $_POST['back']) {
    // 何もしない
} else if (isset($_POST['confirm']) && $_POST['confirm']) {
    for ($i = 0; $i < $forms_length; $i++) {
        $_SESSION[$array_forms[$i]] = $_POST[$array_forms[$i]];
    }
    // $errmessage = array();
    for ($i = 0; $i < $forms_length - 1; $i++) {
        if (!$_SESSION[$array_forms[$i]]) {
            $errmessage[$i] = "{$array_errmessage[$i]}を入力してください";
        } else {
            $errmessage[$i] = '';
        }
    }


    for ($i = 0; $i < $forms2_length; $i++) {
        if (isset($_POST[$array2_forms[$i]])) {
            $_SESSION[$array2_forms[$i]] =
                $_POST[$array2_forms[$i]];
        }
    }
    for ($i = 0; $i < $forms2_length; $i++) {
        if (!$_SESSION[$array2_forms[$i]]) {
            $errmessage2[$i] = "{$array2_errmessage[$i]}を入力してください";
        } else {
            $errmessage2[$i] = '';
        }
    }

    if (
        isset($_POST['agent']) &&
        isset($_POST['name__kanji']) &&
        isset($_POST['name__kana']) &&
        isset($_POST['email']) &&
        isset($_POST['tel']) &&
        isset($_POST['postcode']) &&
        isset($_POST['address']) &&
        isset($_POST['birth']) &&
        isset($_POST['university']) &&
        isset($_POST['faculty']) &&
        isset($_POST['course']) &&
        isset($_POST['graduate']) &&
        isset($_POST['content'])
    ) {
        $mode = 'confirm';
        $_SESSION['agent'] = $_POST['agent'];
        $_SESSION['birth'] = $_POST['birth'];
        $_SESSION['graduate'] = $_POST['graduate'];
        for ($i = 0; $i < $forms_length; $i++) {
            $_SESSION[$array_forms[$i]] = $_POST[$array_forms[$i]];
        }
    }
} else if (isset($_POST['send']) && $_POST['send']) {
    if (

        isset($_SESSION['agent']) &&
        isset($_SESSION['name__kanji']) &&
        isset($_SESSION['name__kana']) &&
        isset($_SESSION['email']) &&
        isset($_SESSION['tel']) &&
        isset($_SESSION['postcode']) &&
        isset($_SESSION['address']) &&
        isset($_SESSION['birth']) &&
        isset($_SESSION['university']) &&
        isset($_SESSION['faculty']) &&
        isset($_SESSION['course']) &&
        isset($_SESSION['graduate']) &&
        isset($_SESSION['content'])
    ) {
        $student = $db->exec('INSERT INTO students SET 
    name__kanji="' . $_SESSION['name__kanji'] . '",
    name__kana="' . $_SESSION['name__kana'] . '",
    email="' . $_SESSION['email'] . '",
    postcode="' . $_SESSION['postcode'] . '",
    address="' . $_SESSION['address'] . '",
    tel="' . $_SESSION['tel'] . '",
    birth="' . $_SESSION['birth'] . '",
    university="' . $_SESSION['university'] . '",
    faculty="' . $_SESSION['faculty'] . '",
    course="' . $_SESSION['course'] . '",
    graduate="' . $_SESSION['graduate'] . '",
    content="' . $_SESSION['content'] . '",
    apply_time= NOW()');
        $students_count_stmt = $db->prepare("SELECT COUNT(*) from students");
        $students_count_stmt->execute();
        $students_count_data = $students_count_stmt->fetchAll();
        $students_count = $students_count_data[0]['COUNT(*)'];
        $students_agents_connect = $db->exec('INSERT INTO students_agents_connect SET 
    apply_id="' . $students_count . '",
    agent_id="' . $_SESSION['agent'] . '",
    contact_id=0
    ');
        $agents_supports_mix = $db->exec('
    DROP TABLE IF EXISTS students_agents_mix;

CREATE table students_agents_mix AS
SELECT
    students.id AS id,
    name__kanji,
    name__kana,
    email,
    tel,
    postcode,
    address,
    birth,
    university,
    faculty,
    course,
    graduate,
    content,
    apply_time,
    agent_id
FROM
    students
    join students_agents_connect on id = apply_id;
');
    }
    $_SESSION = array();
    for ($i = 0; $i < $forms_length; $i++) {
        $_SESSION[$array_forms[$i]] = '';
    }
    for ($i = 0; $i < $forms2_length; $i++) {
        $_SESSION[$array2_forms[$i]] = '';
    }
    $mode = 'send';
} else {
    for ($i = 0; $i < $forms_length; $i++) {
        $_SESSION[$array_forms[$i]] = "";
    }
    for ($i = 0; $i < $forms2_length; $i++) {
        $_SESSION[$array2_forms[$i]] = "";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFT【申し込み】</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/apply.css">
    <link rel="stylesheet" href="../assets/css/index-user.css">
    <link rel="stylesheet" href="../assets/css/sp.css">
</head>

<body>
    <?php require  "./capsule/header.php"; ?>
    <script>
        document.getElementById("apply").classList.add("active")
    </script>

    <div class="content">


        <div class="container inner">
            <main class="main">
                <div class="apply" id="apply">
                    <?php if ($mode == 'input') { ?>
                        <!-- 入力画面 -->
                        <div class="apply__input" role="apply">
                            <p class="title">
                                新卒エージェント　お問い合わせ
                                <span class="title"> 入力</span>
                            </p>

                            <ul class="stepbar">
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner stepbar__item-inner--current">
                                        入力
                                    </div>
                                </li>
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner">
                                        確認
                                    </div>
                                </li>
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner">
                                        完了
                                    </div>
                                </li>
                            </ul>
                            <?php
                            if ($errmessage2[0]) {
                                echo '<div style="color:red;">';
                                echo $errmessage2[0];
                                echo '</div>';
                            }
                            ?>


                            <form action="./apply.php" name="apply__form" class="apply__form" method="post">
                                <dl class="apply__form__list">
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="agent">お問い合わせ先<br>エージェント企業</label></dt>
                                        <dd>
                                            <div class="apply__form__item__select">
                                                <select name="agent" id="agent">
                                                    <option selected disabled>
                                                        選択してください
                                                    </option>
                                                    <?php for ($i = 0; $i < $agents_count; $i++) { ?>
                                                        <option value="<?php echo $agents_data[$i]['id']; ?>"><?php echo $agents_data[$i]['agent']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                        </dd>
                                    </div>
                                    <?php
                                    if ($errmessage[0]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[0];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="name__kanji">お名前（漢字）</label></dt>
                                        <dd><input id="name__kanji" type="text" name="name__kanji" placeholder="例）岡本太郎" value="<?php echo $_SESSION['name__kanji']; ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[1]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[1];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="name__kana">お名前（フリガナ）</label></dt>
                                        <dd><input id="name__kana" type="text" name="name__kana" placeholder="例）オカモトタロウ" value="<?php echo $_SESSION['name__kana'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[2]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[2];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="email">メールアドレス</label></dt>
                                        <dd><input id="email" type="email" name="email" placeholder="例）posse@keio.jp" value="<?php echo $_SESSION['email'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[3]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[3];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="tel">電話番号</label></dt>
                                        <dd><input id="tel" type="text" name="tel" placeholder="例）09012345678" value="<?php echo $_SESSION['tel'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[4]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[4];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="postcode">郵便番号</label></dt>
                                        <dd><input id="postcode" type="text" name="postcode" placeholder="例）1120001" value="<?php echo $_SESSION['postcode'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[5]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[5];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="address">住所</label></dt>
                                        <dd><input id="address" type="text" name="address" placeholder="例）静岡県横浜市港区1-23-4" value="<?php echo $_SESSION['address'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage2[1]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage2[1];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="birth">生年月日</label></dt>
                                        <dd><input id="birth" type="date" name="birth" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[6]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[6];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="university">大学</label></dt>
                                        <dd><input id="university" type="text" name="university" placeholder="例）東京大学" value="<?php echo $_SESSION['university'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[7]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[7];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="faculty">学部</label></dt>
                                        <dd><input id="faculty" type="text" name="faculty" placeholder="例）理工学部" value="<?php echo $_SESSION['faculty'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage[8]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage[8];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt><label for="course">学科</label></dt>
                                        <dd><input id="course" type="text" name="course" placeholder="例）経済経営学科" value="<?php echo $_SESSION['course'] ?>" /></dd>
                                    </div>
                                    <?php
                                    if ($errmessage2[2]) {
                                        echo '<div style="color:red;">';
                                        echo $errmessage2[2];
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__require">必須</div>
                                        </div>
                                        <dt>卒業年度</dt>
                                        <dd>
                                            <label><input type="radio" name="graduate" value="23" />23卒</label>
                                            <label><input type="radio" name="graduate" value="24" />24卒</label>
                                            <label><input type="radio" name="graduate" value="25" />25卒</label>
                                        </dd>
                                    </div>
                                    <div class="apply__form__item">
                                        <div class="apply__label">
                                            <div class="apply__label__option">任意</div>
                                        </div>
                                        <dt><label for="content">その他自由記述欄</label></dt>
                                        <dd>
                                            <textarea id="content" type="text" name="content" placeholder="エージェント企業へお伝えしたいことがありましたらご記入ください" value="<?php echo $_SESSION['content'] ?>"></textarea>
                                        </dd>
                                    </div>
                                </dl>
                                <div>
                                    <button class="apply__form__button" type="submit" name="confirm" value="確認">確認画面へ</button>
                                </div>
                            </form>
                        </div>

                    <?php } else if ($mode == 'confirm') { ?>

                        <div class="apply__confirm" role="apply">
                            <p class="title">
                                新卒エージェント　お問い合わせ
                                <span class="title"> 確認</span>
                            </p>
                            <ul class="stepbar">
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner">
                                        入力
                                    </div>
                                </li>
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner stepbar__item-inner--current">
                                        確認
                                    </div>
                                </li>
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner">
                                        完了
                                    </div>
                                </li>
                            </ul>

                            <form action="./apply.php" name="" class="apply__form" method="post">
                                <table class="apply__table">
                                    <tr>
                                        <th class="apply__table__header">お問い合わせ先エージェント企業</th>
                                        <td class="apply__table__data" id="insert__agent"><?php echo $agents_data[$_SESSION['agent'] - 1]['agent']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">お名前（漢字）</th>
                                        <td class="apply__table__data" id="insert__name__kanji"><?php echo $_SESSION['name__kanji'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">お名前（フリガナ）</th>
                                        <td class="apply__table__data" id="insert__name__kana"><?php echo $_SESSION['name__kana'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">メールアドレス</th>
                                        <td class="apply__table__data" id="insert__email"><?php echo $_SESSION['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">電話番号</th>
                                        <td class="apply__table__data" id="insert__tel"><?php echo $_SESSION['tel'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">郵便番号</th>
                                        <td class="apply__table__data" id="insert__postcode"><?php echo $_SESSION['postcode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">住所</th>
                                        <td class="apply__table__data" id="insert__address"><?php echo $_SESSION['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">生年月日</th>
                                        <td class="apply__table__data" id="insert__date"><?php echo $_SESSION['birth'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">大学</th>
                                        <td class="apply__table__data" id="insert__univ"><?php echo $_SESSION['university'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">学部</th>
                                        <td class="apply__table__data" id="insert__faculty"><?php echo $_SESSION['faculty'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">学科</th>
                                        <td class="apply__table__data" id="insert__course"><?php echo $_SESSION['course'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">卒業年度</th>
                                        <td class="apply__table__data" id="insert__graduate"><?php echo $_SESSION['graduate'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="apply__table__header">その他自由記述欄</th>
                                        <td class="apply__table__data" id="insert__content"><?php echo $_SESSION['content'] ?></td>
                                    </tr>
                                </table>
                                <div class="apply__form__footer">
                                    <button class="apply__form__button" id="back" type="submit" name="back" value="戻る">戻る</button>
                                </div>
                                <div class="apply__form__footer">
                                    <button class="apply__form__button" id="step2" role="submit" type="submit" name="send" value="送信">送信する</button>
                                </div>
                            </form>
                        </div>

                    <?php } else { ?>

                        <div class="apply__thanks" role="apply">
                            <p class="title">
                                新卒エージェント　お問い合わせ
                                <span class="title"> 完了</span>
                            </p>
                            <ul class="stepbar">
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner">
                                        入力
                                    </div>
                                </li>
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner">
                                        確認
                                    </div>
                                </li>
                                <li class="stepbar__item">
                                    <div class="stepbar__item-inner stepbar__item-inner--current">
                                        完了
                                    </div>
                                </li>
                            </ul>

                            <div class="apply__thanks__inner">
                                <p class="apply__thanks__complete">
                                    申し込みを受け付けました
                                </p>
                                <p class="apply__thanks__text">
                                    この度は申し込みしていただき、誠にありがとうございます。<br /><br />ご入力いただきました内容を確認後、担当者よりご連絡させていただきます。<br />お急ぎのご連絡やご不明な点などございましたら
                                    <a href="#" class="apply__thanks__nav">こちら</a>
                                    からご連絡ください。
                                </p>
                                <button class="apply__thanks__button">
                                    トップページへ戻る
                                </button>
                            </div>
                        </div>
                    <?php } ?>

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