<?php
include_once '../api/database.php';
include_once '../api/security.php';

$admin = $_SESSION['role'];
$id = $_REQUEST['id'];

// Проверка админа
if(($admin == 'admin') && isset($id)){
        if(mysqli_query($conn,"DELETE from technika WHERE id = '$id'")){
            echo 'Успех';
        }else{
            echo 'Ошибка';
        }
}
?>
<script>
    window.location.href = "/manage"
</script>
