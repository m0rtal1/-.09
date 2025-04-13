<?php
session_start();
require_once('config.php');

if (!isset($_POST['service_category']) || empty(trim($_POST['service_category']))) {
    $_SESSION['message'] = 'Ошибка: категория услуг не может быть пустой';
    header('Location: ../admin_add_price.php');
    exit();
}

$service_category = trim($_POST['service_category']);

try {
    $stmtMySQL = $connect->prepare("INSERT INTO services (id_service, service_name) VALUES (NULL, :service_category)");
    $success = $stmtMySQL->execute([':service_category' => $service_category]);

    if ($success) {
        $_SESSION['message'] = 'Категория услуг создана';
    } else {
        $_SESSION['message'] = 'Ошибка при создании категории услуг';
    }
} catch (PDOException $e) {
    $_SESSION['message'] = 'Ошибка: ' . $e->getMessage();
}

header('Location: ../admin_add_price.php');
exit();
?>