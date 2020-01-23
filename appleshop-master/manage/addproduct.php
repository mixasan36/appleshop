<?php
include_once '../api/database.php';
include_once '../api/security.php';

$admin = $_SESSION['role'];
$name = $_REQUEST['name'];
$description = $_REQUEST['description'];
$price = $_REQUEST['price'];
$url = $_REQUEST['url'];

// Проверка, является ли пользователь админом
if(($admin == 'admin') && isset($name)){
    if(mysqli_query($conn,"INSERT into `technika` (name, price, description, imgurl) VALUES  ('$name','$price','$description','$url')")){
        echo 'Товар добавлен';
    }else{
        echo 'Ошибка';
    }
}

// Редирект на предыдущую страницу
?>
<script>
    window.location.href = "/manage"
</script>
