<?php
session_start();
require_once('config.php');

$id_speciality = $_POST['id_speciality'];
$name = $_POST['name'];
$description = $_POST['description'];

$stmt = $connect->prepare("UPDATE `speciality` SET `speciality_name` = :speciality_name, `speciality_description` = :speciality_description WHERE id_speciality = :id_speciality");
$stmt->bindParam(':id_speciality', $id_speciality);
$stmt->bindParam(':speciality_name', $name);
$stmt->bindParam(':speciality_description', $description);
$stmt->execute();

$_SESSION['msg'] = 'Специализация изменена.';
header('Location: ../admin_add_specialists.php');
exit;
?>