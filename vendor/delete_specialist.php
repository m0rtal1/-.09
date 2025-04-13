<?php
session_start();
require_once('config.php');

$id_doctor = $_POST['id_doctor'];

$stmt = $connect->prepare("DELETE FROM doctors WHERE id_doctor = :id_doctor");
$stmt->execute(['id_doctor' => $id_doctor]);

$_SESSION['msg'] = 'Специалист удален.';
header('Location: ../admin_add_specialists.php');
exit;
?>