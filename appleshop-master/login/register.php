<?php
require_once '../api/database.php'; // подключаем БД
header("Content-type: text/html; charset=utf-8");

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
// Хешируем пароль алгоритмом md5 чтобы пароль хранился в БД в зашифрованном виде
$password = md5($_POST['password']);
// выполняем запись в БД данных, введенных пользователем.
if(isset($email) && isset($password)){
        if(mysqli_query($conn,"INSERT into `polzovateli` (role, name, phone, email, password) VALUES  ('user','$name','$phone','$email','$password')")){
            echo 'Регистрация успешна';
        }else{
            echo 'Ошибка регистрации'; 
        }
}
// Редирект на главную страницу
?>
<script>
    window.location.href = "/"
</script>
