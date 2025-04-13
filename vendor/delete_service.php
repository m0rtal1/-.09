<?php
session_start();
require_once('config.php');

$service_id = $_POST['service_id'];

$stmt = $connect->prepare("DELETE FROM services WHERE id_service = :service_id");
$stmt->execute(['service_id' => $service_id]);

$_SESSION['msg'] = 'Категория удалена.';
header('Location: ../admin_add_price.php');
exit;
?>