<?php
try {
    $connect = new PDO("mysql:host=localhost;dbname=detgrad;charset=utf8", "root", "");
} catch (PDOException $e) {
    die("Ошибка подключения к MySQL: " . $e->getMessage());
}
?>