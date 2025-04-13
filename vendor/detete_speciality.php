<?php
session_start();
require_once('config.php');

$id_speciality = $_POST['id_speciality'];

$stmt = $connect->prepare("DELETE FROM speciality WHERE id_speciality = :id_speciality");
$stmt->execute(['id_speciality' => $id_speciality]);

$_SESSION['msg'] = 'Специализация удалена.';
header('Location: ../admin_add_specialists.php');
exit;
?>