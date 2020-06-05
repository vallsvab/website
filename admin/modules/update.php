<?php
//Зависимости
require_once("../modules/database.php");

session_start();
if(isset($_SESSION['Type'])) {
    if($_SESSION['Type']!="admin") {
        echo("<img src='accessdenited.jpg' height='100%'/>");
        exit(0);
    }
}
else {
    exit(0);
}
$header = $_POST['header'];
$introtext = $_POST['introtext'];
$text = $_POST['text'];
$author = $_POST['author'];
$id = $_POST['id'];
editArticle($header, $introtext, $text, $author, $id, $db);
header("Location: /admin");
?>
