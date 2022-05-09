<?php
session_start();
require('../../dbconnect.php');
if (isset($_SESSION['agent_id']) && $_SESSION['time'] + 60 * 60 * 24 > time()) {
    $_SESSION['time'] = time();
    if (!empty($_POST)) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . basename(__FILE__));
        exit();
    }
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/CRAFT/agent/login.php');
    exit();
}
?>
