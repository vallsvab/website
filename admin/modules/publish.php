<?php
//Зависимости
require_once("../modules/database.php");

session_start();
if($_SESSION['Type']!="admin") {
    echo("<img src='accessdenited.jpg' height='100%'/>");
    exit(0);
}
$header = $_POST['header'];
$introtext = $_POST['introtext'];
$text = $_POST['text'];
$author = $_POST['author'];


publishArticle($header, $introtext, $text, $author, $db);
header("Location: /admin");
?>
