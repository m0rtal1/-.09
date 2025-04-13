<?php
session_start();

require_once("config.php");

$name = $_POST['name'];
$description = $_POST['description'];

$stmtMysql = $connect->prepare("INSERT INTO `speciality`(`speciality_name`, `speciality_description`) VALUES (:name, :description)");
$stmtMysql->bindParam(':name', $name);
$stmtMysql->bindParam(':description', $description);
$stmtMysql->execute();

$_SESSION['msg'] = "Специальность добавлена успешно.";
header('Location: ../admin_add_specialists.php');
?>