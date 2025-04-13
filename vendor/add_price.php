<?php
session_start();

require_once("config.php");

$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];

$stmtMysql = $connect->prepare("INSERT INTO `price`(`id_service`, `price`, `action`) VALUES (:category, :price, :name)");
$stmtMysql->bindParam(':category', $category);
$stmtMysql->bindParam(':price', $price);
$stmtMysql->bindParam(':name', $name);
$stmtMysql->execute();

$_SESSION['msg'] = "Услуга добавлена успешно.";
header('Location: ../admin_add_price.php');
?>