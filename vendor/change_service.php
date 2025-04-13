<?php
session_start();
require_once('config.php');

$id_service = $_POST['service_id'];;
$service_name = $_POST['service_name'];

$query = "UPDATE `services` SET `service_name`= :service_name WHERE id_service = :id_service";
$stmt = $connect->prepare($query);
$stmt->execute(['id_service' => $id_service, 'service_name' => $service_name]);

$_SESSION['msg'] = 'Категория изменена.';
header('Location: ../admin_add_price.php');
exit;
?>