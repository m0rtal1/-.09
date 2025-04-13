<?php
session_start();
require_once('config.php');

$id_appoint = $_POST['id_appoint'];

$stmt = $connect->prepare("DELETE FROM appoints WHERE id_appoint = :id_appoint");
$stmt->execute(['id_appoint' => $id_appoint]);

$_SESSION['msg'] = 'Запись удалена.';
header('Location: ../admin_appoints.php');
exit;
?>