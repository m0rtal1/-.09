<?php
session_start();

require_once("config.php");

$id_appoint = $_POST['id_appoint'];
$name = $_POST['child-name'];
$surname = $_POST['child-surname'];
$patronymic = $_POST['child-patronymic'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$id_status = $_POST['status'];

$dateTimeObj = DateTime::createFromFormat('d-m-Y H:i', $date);

if (!$dateTimeObj) {
    die('Ошибка: неверный формат даты! Получено: ' . $date);
}

$formattedDate = $dateTimeObj->format('Y-m-d H:i:s');

$stmtMysql = $connect->prepare("UPDATE `appoints` SET `child_fname`=:child_fname, `child_lname`=:child_lname, 
`child_pname`=:child_pname, `phone_number`=:phone_number,
`email`=:email, `id_service`=:id_service,
`appoint_date`=:appoint_date, `id_appoint_status`=:id_appoint_status
 WHERE `id_appoint` = :id_appoint");
$stmtMysql->bindParam(':id_appoint', $id_appoint);
$stmtMysql->bindParam(':child_fname', $name);
$stmtMysql->bindParam(':child_lname', $surname);
$stmtMysql->bindParam(':child_pname', $patronymic);
$stmtMysql->bindParam(':phone_number', $phone);
$stmtMysql->bindParam(':email', $email);
$stmtMysql->bindParam(':id_service', $doctor);
$stmtMysql->bindParam(':appoint_date', $formattedDate);
$stmtMysql->bindParam(':id_appoint_status', $id_status);
$stmtMysql->execute();

$_SESSION['msg'] = "Запись успешно.";
header('Location: ../admin_appoints.php');
?>