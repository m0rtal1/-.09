<?php
session_start();
require_once('config.php');

$user_id = $_SESSION['user']['id_user'];

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$password_repeat = $_POST['password-repeat'] ?? '';

$errors = [];

if (!empty($email)) {
    $stmt = $connect->prepare("SELECT id_user FROM users WHERE login = ? AND id_user != ?");
    $stmt->execute([$email, $user_id]);
    if ($stmt->fetch()) {
        $errors[] = "Эта почта уже используется другим пользователем";
    }
}

if (!empty($password) || !empty($password_repeat)) {
    if ($password !== $password_repeat) {
        $errors[] = "Пароли не совпадают";
    }
}

if (!empty($errors)) {
    $_SESSION['message'] = $errors;
    header('location:../profile.php');
    exit();
}

if (!empty($email) || !empty($password)) {
    $query = "UPDATE users SET ";
    $params = [];
    
    if (!empty($email)) {
        $query .= "login = ?, ";
        $params[] = $email;
    }

    if (!empty($password)) {
        $query .= "password = ?, ";
        $params[] = password_hash($password, PASSWORD_DEFAULT);
    }

    $query = rtrim($query, ', ');
    $query .= " WHERE id_user = ?";
    $params[] = $user_id;

    $stmt = $connect->prepare($query);
    $stmt->execute($params);

    $_SESSION['message'] = "Данные успешно обновлены";
}

header('location:../profile.php');
exit();
?>
