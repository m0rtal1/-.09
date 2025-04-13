<?php
session_start();

require_once("config.php");

$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['password-repeat'];

$check_user_mysql = $connect->prepare("SELECT * FROM users WHERE login = :email");
$check_user_mysql->bindParam(':email', $email);
$check_user_mysql->execute();
$emailExistsMysql = $check_user_mysql->fetchColumn() > 0;

if ($emailExistsMysql) {
    $_SESSION['msg'] = 'Пользователь с этим эл. адресом уже существует';
    header('Location: ../registration.php');
    die();
}

if ($password !== $passwordRepeat) {
    $_SESSION['msg'] = 'Пароли не совпадают';
    header('Location: ../registration.php');
    die();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$stmtMySQL = $connect->prepare("INSERT INTO users (login, password) VALUES (:email, :password)");
$stmtMySQL->bindParam(':email', $email);
$stmtMySQL->bindParam(':password', $password);
$mysqlSuccess = $stmtMySQL->execute();

if ($mysqlSuccess) {
    $_SESSION['msg'] = "Регистрация успешна!";
    header("location:../enter.php");
    die();
} else {
    $_SESSION['msg'] = "Ошибка регистрации";
    header("location:../registration.php");
}
