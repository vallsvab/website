<?php
$address = file_get_contents("../modules/moduledata/database/authip");
$username = file_get_contents("../modules/moduledata/database/authusername");
$password = file_get_contents("../modules/moduledata/database/authpasswd");
$databasename = file_get_contents("../modules/moduledata/database/databasename");
$db = mysqli_connect($address, $username, $password, $databasename);
if(!$db) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    echo("Не удалось соединиться с базой данных");
}
function countTable($table) {
    $responce = mysqli_query($db, "SELECT COUNT(1) FROM `".$table."`");
    $result = mysqli_fetch_array($responce);
    return $result[0];
}
function getArticle($id) {
    $responce = mysqli_query($db, "SELECT * FROM `articles` WHERE id = ".$id);
    $result = mysqli_fetch_assoc($responce);
    return $result;
}
function getAllArticles() {
    $responce = mysqli_query($db, "SELECT * FROM `articles` WHERE 1");
    $result = mysqli_fetch_all($responce);
    return $result;
}
function removeArticle($db, $id) {
    $responce = mysqli_query($db, "DELETE FROM `articles` WHERE id = ".$id);
}
function publishArticle($header, $introtext, $text, $author, $db) {
    $id = countdb("articles")+1;
    $responce = mysqli_query($db, "INSERT INTO `articles`(`Header`, `Introtext`, `Text`, `Author`, `id`) VALUES ('".$header."','".$introtext."','".$text."','".$author."', ".$id.")");
}
function editArticle($header, $introtext, $text, $author, $id, $db) {
    $responce = mysqli_query($db, "UPDATE `articles` SET `Header` = '".$header."' WHERE `articles`.`id` = ".$id);
    $responce = mysqli_query($db, "UPDATE `articles` SET `Introtext` = '".$introtext."' WHERE `articles`.`id` = ".$id);
    $responce = mysqli_query($db, "UPDATE `articles` SET `Text` = '".$text."' WHERE `articles`.`id` = ".$id);
    $responce = mysqli_query($db, "UPDATE `articles` SET `Author` = '".$author."' WHERE `articles`.`id` = ".$id);
}
?>
