<?php
include_once '../api/database.php';
include_once '../api/security.php';
$id= $_GET['id'];
$userid = $_SESSION['id'];

if(isset($id)){
        if(mysqli_query($conn,"DELETE from cart WHERE cartid = '$id' and userid = '$userid'")){
            echo 'Успех';
        }else{
            echo 'Ошибка';
        }
}
?>
<script>
    window.location.href = "/cart"
</script>
