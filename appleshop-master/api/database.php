<?php
//Данные для подключения к бд
$host = "127.0.0.1:3306";
$username = "root";
$password = "";
$db = "appleshop";
// Установление соединения с БД
$conn = new mysqli($host, $username, $password, $db);
// Корректное отображение символов из бд
$conn->set_charset('utf8');

if(mysqli_connect_errno($conn))
    {
        echo 'Ошибка подключения к БД';
    }
?>