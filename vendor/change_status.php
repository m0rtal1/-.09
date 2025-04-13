<?php
session_start();
require_once('config.php');

$id_user = $_SESSION['user']['id_user'];
$id_order = $_POST['id_order'];
$id_status = $_POST['id_status'];

$query = "UPDATE `orders` SET `id_status`= :id_status WHERE id_order = :id_order";
$stmt = $connect->prepare($query);
$stmt->execute(['id_order' => $id_order, 'id_status' => $id_status]);

$_SESSION['msg'] = 'Статус изменен.';
header('Location: ../orders.php');
exit;
?>