<?php
session_start();
require_once("config.php");

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$patronymic = trim($_POST['patronymic']);
$speciality = trim($_POST['speciality']);
$image = $_FILES['image'];

if (empty($name) or empty($surname)){
    $_SESSION['msg'] = "Ошибка при добавлении специалиста.";
    header('Location: ../admin_add_specialists.php');
    exit;
}



$fileName = 'img/def_avatar.jpg';

if (isset($image) && $image['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($image['error'] === UPLOAD_ERR_OK) {
        $fileDir = 'img/uploads/';

        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0777, true);
        }

        $imageInfo = getimagesize($image['tmp_name']);
        if ($imageInfo === false) {
            $_SESSION['msg'] = "Ошибка: Загружаемый файл не является изображением.";
            header('Location: ../admin_add_specialists.php');
            exit;
        }

        $srcType = image_type_to_extension($imageInfo[2], false);
        $fileName = $fileDir . time() . "_" . $surname . "." . $srcType;
        $filePath = "../" . $fileName;

        if (!move_uploaded_file($image['tmp_name'], $filePath)) {
            $_SESSION['msg'] = "Ошибка при загрузке изображения.";
            header('Location: ../admin_add_specialists.php');
            exit;
        }
    } else {
        $_SESSION['msg'] = "Ошибка загрузки файла.";
        header('Location: ../admin_add_specialists.php');
        exit;
    }
}

$stmtMysql = $connect->prepare("INSERT INTO `doctors` (`id_speciality`, `fname`, `lname`, `sname`, `photo`) 
                                VALUES (:id_speciality, :fname, :lname, :sname, :photo)");
$stmtMysql->bindParam(':id_speciality', $speciality, PDO::PARAM_INT);
$stmtMysql->bindParam(':fname', $name, PDO::PARAM_STR);
$stmtMysql->bindParam(':lname', $surname, PDO::PARAM_STR);
$stmtMysql->bindParam(':sname', $patronymic, PDO::PARAM_STR);
$stmtMysql->bindParam(':photo', $fileName, PDO::PARAM_STR);

if ($stmtMysql->execute()) {
    $_SESSION['msg'] = "Специалист добавлен успешно.";
} else {
    $_SESSION['msg'] = "Ошибка при добавлении специалиста.";
}

header('Location: ../admin_add_specialists.php');
exit;
?>
