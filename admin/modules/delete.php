<?php
//Зависимости
require_once("../modules/database.php");

session_start();
if($_SESSION['Type']!="admin") {
    echo("<img src='accessdenited.jpg' height='100%'/>");
    exit(0);
}
$id = $_POST['id'];
//Бекапим данные
$backup = getfromdb($id);
file_put_contents("backups/backup-article".$id.".txt", $backup['Header'], FILE_APPEND);
file_put_contents("backups/backup-article".$id.".txt", $backup['Introtext'], FILE_APPEND);
file_put_contents("backups/backup-article".$id.".txt", $backup['Text'], FILE_APPEND);
file_put_contents("backups/backup-article".$id.".txt", $backup['Author'], FILE_APPEND);
//Удаляем
removeArticle($id);
header("Location: /");
?>
