<?php
include 'config/connect.php';
define('BASE_URL', 'http://localhost/E_commerce_site/');
if (!isset($_REQUEST['token'])) {
    header('location: ' . BASE_URL);
}


$statement = $pdo->prepare("SELECT * FROM user_tbl WHERE token=?");
$statement->execute([$_REQUEST['token']]);
$total = $statement->rowCount();
if ($total) {
    $statement = $pdo->prepare("UPDATE user_tbl SET status=? WHERE token=?");
    $statement->execute([1, $_REQUEST['token']]);
    $total = $statement->rowCount();


    header('location: ' . BASE_URL . 'registration-success.php');
} else {
    header('location: ' . BASE_URL);
}
