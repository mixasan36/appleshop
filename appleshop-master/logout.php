<?php
session_start();
// Удаляем переменные сессии (authed, id, email)
unset($_SESSION);
// Уничтожаем все данные сессии
session_destroy();
?>
<script>
    window.location.href = "/login"
</script>
