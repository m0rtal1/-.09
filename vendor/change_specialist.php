<?php
session_start();
require_once("config.php");

$id = $_POST['id_doctor'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$speciality = $_POST['speciality'];
$image = $_FILES['photo'];

if ($image['error'] === UPLOAD_ERR_OK) {
    $fileDir = 'img/uploads/';
    
    if (!is_dir($fileDir)) {
        mkdir($fileDir, 0777, true);
    }

    $imageInfo = getimagesize($image['tmp_name']);
    if ($imageInfo === false) {
        $_SESSION['msg'] = "Ошибка: загруженный файл не является изображением.";
        header('Location: ../admin_add_specialists.php');
        exit;
    }

    $srcType = image_type_to_extension($imageInfo[2], false);
    $fileName = $fileDir . time() . $surname . '.' . $srcType;
    $filePath = '../' . $fileName;

    if (!move_uploaded_file($image['tmp_name'], $filePath)) {
        $_SESSION['msg'] = "Ошибка при загрузке файла.";
        header('Location: ../admin_add_specialists.php');
        exit;
    }

    $stmtMysql = $connect->prepare("UPDATE doctors SET id_speciality = :id_speciality, fname = :fname, lname = :lname, sname = :sname, photo = :photo WHERE id_doctor = :id_doctor");
    $stmtMysql->bindParam(':photo', $fileName);
} else {
    $stmtMysql = $connect->prepare("UPDATE doctors SET id_speciality = :id_speciality, fname = :fname, lname = :lname, sname = :sname WHERE id_doctor = :id_doctor");
}

$stmtMysql->bindParam(':id_speciality', $speciality);
$stmtMysql->bindParam(':fname', $name);
$stmtMysql->bindParam(':lname', $surname);
$stmtMysql->bindParam(':sname', $patronymic);
$stmtMysql->bindParam(':id_doctor', $id);

$stmtMysql->execute();

$_SESSION['msg'] = "Специалист изменен успешно.";
header('Location: ../admin_add_specialists.php');
exit;
?>
