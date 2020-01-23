<?php
header("Content-type: application/json; charset=utf-8");
session_start();
// выводим в формате JSON информацию о сессии
print json_encode($_SESSION);
