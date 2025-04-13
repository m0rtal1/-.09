<?php
require_once('config.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$id_status = 2;
$formattedDate = NULL;

if(!empty($date)){
    $dateTimeObj = DateTime::createFromFormat('d-m-Y H:i', $date);

    if (!$dateTimeObj) {
        die('Ошибка: неверный формат даты! Получено: ' . $date);
    }
    
    $formattedDate = $dateTimeObj->format('Y-m-d H:i:s');
}





$appointStmt = $connect->prepare("INSERT INTO `appoints` 
    (`child_fname`, `child_lname`, `child_pname`, `phone_number`, `email`, `id_service`, `appoint_date`, `id_appoint_status`) 
    VALUES (:child_fname, :child_lname, :child_pname, :phone_number, :email, :id_service, :appoint_date, :id_status)");

$appointStmt->bindParam(':child_fname', $name);
$appointStmt->bindParam(':child_lname', $surname);
$appointStmt->bindParam(':child_pname', $patronymic);
$appointStmt->bindParam(':phone_number', $phone);
$appointStmt->bindParam(':email', $email);
$appointStmt->bindParam(':id_service', $doctor);
$appointStmt->bindParam(':appoint_date', $formattedDate);
$appointStmt->bindParam(':id_status', $id_status);

$appointStmt->execute();

header('Location: ../admin_appoints.php');
exit;
?>