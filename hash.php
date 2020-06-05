<?php
$data = $_GET['data'];
//хеширование
$password = password_hash($data, PASSWORD_DEFAULT);
echo($password);
$password = explode(".", $password)[1];
echo($password);
?>