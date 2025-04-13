<?php
session_start();
require_once("config.php");

$email = $_POST['email'];
$password = $_POST['password'];

// Получаем хеш пароля из базы
$checkUserMySQL = $connect->prepare("SELECT users.*, roles.role_name 
                                       FROM users
                                       JOIN roles ON users.id_role = roles.id_role
                                       WHERE login = :email");
$checkUserMySQL->bindParam(':email', $email);
$checkUserMySQL->execute();
$userMySQL = $checkUserMySQL->fetch(PDO::FETCH_ASSOC);

if ($userMySQL && password_verify($password, $userMySQL['password'])) {
    // Авторизация успешна, сохраняем данные пользователя в сессии
    $_SESSION['user'] = [
        'id_user' => $userMySQL['id_user'],
        'login' => $userMySQL['login'],
        'role' => $userMySQL['role_name'],
        'id_role' => $userMySQL['id_role']
    ];
    header('Location: ../index.php');
    exit();
} else {
    $_SESSION['msg'] = 'Неверный email или пароль';
    header('Location: ../enter.php');
    exit();
}
?>
