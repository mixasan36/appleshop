<?php
  session_start();
  // Проверка авторизации пользователя по значению authed
  if(!isset($_SESSION["authed"])){
    header("location: 127.0.0.1:3000");
  }
?>