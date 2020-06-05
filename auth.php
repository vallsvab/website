<?php
//получение данных
session_start();
$username = $_GET['Username'];
$password = $_GET['Password'];
//хеширование пароля
//$password = password_hash($password, PASSWORD_DEFAULT);
//$password = explode($password, ".");
//$passwordHashed = $password['1'];

//подключение к базе данных
$db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
if(!$db) {
    $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    if(!$db) {
        $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
        if(!$db) {
            $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");  
        }
    }
}

//объявление функций
function countdb($db) {
    $responce = mysqli_query($db, "SELECT COUNT(1) FROM `users`");
    $result = mysqli_fetch_array($responce);
    return $result[0];
}
function verify($db, $username, $password) {
    $responce = mysqli_query($db, "SELECT * FROM `users` WHERE Username = '".$username."'");
    $result = mysqli_fetch_assoc($responce);
    return $result;
}

//проверка подлинности и вход
if(verify($db, $username, $password)['Password']==$password) {
    $_SESSION['Username'] = $username;
    $_SESSION['Password'] = $password;
    $_SESSION['Type'] = verify($db, $username, $password)['Type'];
    header("Location: http://antaresnews.tk");
}
else {
    echo("Авторизация не удалась!");
}
?>