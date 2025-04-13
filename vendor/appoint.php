<?php
require_once('config.php');
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$doctor = $_POST['doctor'];
$id_user = $_POST['id_user'];

$appointStmt = $connect->prepare("INSERT INTO `appoints`(`id_user`, `child_fname`, `child_lname`, `child_pname`, `phone_number`, `email`, `id_service`) 
VALUES (:id_user, :child_fname, :child_lname, :child_pname, :phone_number, :email, :id_service)");
$appointStmt ->bindParam(':child_fname', $name);
$appointStmt ->bindParam(':child_lname', $surname);
$appointStmt ->bindParam(':child_pname', $patronymic);
$appointStmt ->bindParam(':phone_number', $phone);
$appointStmt ->bindParam(':email', $email);
$appointStmt ->bindParam(':id_service', $doctor);
$appointStmt ->bindParam(':id_user', $id_user);
$appointStmt ->execute();
header('location: ../appointment.php')
?>