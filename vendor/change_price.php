<?php
session_start();

require_once("config.php");

$action = $_POST['action'];
$price = $_POST['price'];
$id_price = $_POST['id_price'];

$stmtMysql = $connect->prepare("UPDATE `price` SET `action` = :action, `price` = :price WHERE `id_price` = :id_price");
$stmtMysql->bindParam(':id_price', $id_price);
$stmtMysql->bindParam(':price', $price);
$stmtMysql->bindParam(':action', $action);
$stmtMysql->execute();

$_SESSION['msg'] = "Услуга обновлена успешно.";
header('Location: ../admin_add_price.php');
?>