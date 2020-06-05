<?php
//Зависимости
require_once("../modules/database.php");

session_start();
if($_SESSION['Type']!="admin") {
    echo("<img src='accessdenited.jpg' height='100%'/>");
    exit(0);
}
$id = htmlspecialchars($_POST['id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Antares Engine - Панель управления</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<style>
	body {
		background-image: url("bg.png") ;
		background-position: center center;
		background-attachment: fixed;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #131313;">
		<a class="navbar-brand" href="/">
			<img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			<b>Antares Space News</b>
		</a>
		<div class="navbar navbar-expand-lg " id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link">Панель управления</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- РАЗДЕЛ УПРАВЛЕНИЯ -->
	<div class="container">
		<div class="row">
			<div class="article-pub">
				<h3 class="article-pub-header">Редактирование статьи</h3>
				<form class="article-pub-form form-group" method="post" action="update.php">
					<input name = "header" type="text" class="article-input" placeholder="Заголовок статьи" value="<?php echo(htmlspecialchars(getfromdb($id, $db)['Header'])); ?>" autocomplete="off">
					<br>
					<br>
					<input name = "author" type="text" class="article-input" placeholder="Авторство" value="<?php echo(getfromdb($id, $db)['Author']); ?>" autocomplete="off">
					<br>
					<br>
					<textarea name = "introtext" class="article-textarea" placeholder="Краткий текст статьи">
					    <?php echo(getfromdb($id, $db)['Introtext']); ?>
					</textarea>
					<br>
					<br>
					<textarea name = "text" class="article-textarea" placeholder="Полный текст статьи">
					    <?php echo(getfromdb($id, $db)['Text']); ?>
					</textarea>
					<br>
					<br>
					<input type="hidden" name="id" value="<?php echo($id); ?>">
					<input style = "position: relative; left: 5%;" type="submit" value="Редактировать" class="btn btn-primary">
				</form>
				<form action="//antaresnews.tk/admin">
				    <input style = "position: relative; left: 5%;" type="submit" value="Отмена" class="btn btn-secondary">
				</form>
			</div>
		</div>
	</body>
</html>
