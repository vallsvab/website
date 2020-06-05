<?php
session_start();
$text = $_GET['text'];
$articleid = $_GET['articleid'];
$username = $_SESSION['Username'];
if($username==null) {
    echo("<h1>Комменты могут оставлять только авторизованные пользовали!</h1>");
}
$db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
if(!$db) {
    $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    if(!$db) {
        $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    }
}
publish($username, $text, $articleid, $db);
function publish($username, $text, $articleid, $db) {
    $responce = mysqli_query($db, "INSERT INTO `comments`(`Username`, `Text`, `Datetime`, `Articleid`) VALUES ('".$username."','".$text."',NOW(),".$articleid.")");
}
?>