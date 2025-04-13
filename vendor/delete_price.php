<?php
session_start();
require_once('config.php');

$id_price = $_GET['id'];

$stmt = $connect->prepare("DELETE FROM price WHERE id_price = :id_price");
$stmt->execute(['id_price' => $id_price]);

$_SESSION['msg'] = 'Услуга удалена.';
header('Location: ../admin_add_price.php');
exit;
?>