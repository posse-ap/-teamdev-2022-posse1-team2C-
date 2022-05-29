<?php
session_start();
require('../../dbconnect.php');
if (isset($_SESSION['agent_id']) && $_SESSION['time'] + 5 > time()) {
    $_SESSION['time'] = time();
    if (!empty($_POST["login"])) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . basename(__FILE__));
        exit();
    }
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/CRAFT/agent/login.php');
    exit();
}
?>
