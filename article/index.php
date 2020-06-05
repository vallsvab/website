<?php
$db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
if(!$db) {
    $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    if(!$db) {
        $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    }
}
$id = $_GET['id'];
$id = htmlspecialchars($id);
function getfromdb($id, $db) {
    $responce = mysqli_query($db, "SELECT * FROM `articles` WHERE id = ".$id);
    $result = mysqli_fetch_assoc($responce);
    return $result;
}
function getcomments($db, $id) {
    $responce = mysqli_query($db, "SELECT * FROM `comments` WHERE Articleid = ".$id);
    return $responce;
}
$article = getfromdb($id, $db);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Antares Space News</title>
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    
       ym(56374378, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>
    <script data-ad-client="ca-pub-6494120359176396" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
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
					<a class="nav-link" href="../index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../articles/index.php">Статьи</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Форум</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- РАЗДЕЛ СТАТЕЙ -->
	<div class="container">
		<div class="row">
			<div class="article">
				<div class="container">
					<div class="row">
						<div class="col-8">
							<img src=<?php
							if(file_exists("../media/article".$article['id']."-full.jpg")==false) {
							    echo("../noimage.jpg");
							}
							else {
							    echo("../media/article".$article['id']."-full.jpg");
							}
							?> class="d-inline-block align-top article-img" width="100%">
							<h2 class="article-heading">
							    <?php
                                echo($article['Header']);
                                if($article['Header']==null) {
                                    echo("<b>Статья не найдена!</b>");
                                }
                                ?>
                                </h2>
							<p class="article-author">Автор: <b><?php echo($article['Author']); ?></b></p>
							<p class="article-text">
							    <?php
							    $article = str_ireplace("\n", "<br>", $article['Text']);
                                echo($article);
                                if($article['Text']==null) {
                                echo("<b>Статья не найдена! Возможно, ссылка по которой вы оказались здесь неверная или устаревшая.</b>");
                                }
                                ?>
							</p>
						</div>
						<div class="col-4">
						</div>
					</div>
				</div>
			</div>
			<div class="comments">
			    <div class="container">
    			    <div class="row">
    			        <br>
    			        <!-- Yandex.RTB R-A-488847-1 -->
                        <div id="yandex_rtb_R-A-488847-1"></div>
                        <script type="text/javascript">
                            (function(w, d, n, s, t) {
                                w[n] = w[n] || [];
                                w[n].push(function() {
                                    Ya.Context.AdvManager.render({
                                        blockId: "R-A-488847-1",
                                        renderTo: "yandex_rtb_R-A-488847-1",
                                        async: true
                                    });
                                });
                                t = d.getElementsByTagName("script")[0];
                                s = d.createElement("script");
                                s.type = "text/javascript";
                                s.src = "//an.yandex.ru/system/context.js";
                                s.async = true;
                                t.parentNode.insertBefore(s, t);
                            })(this, this.document, "yandexContextAsyncCallbacks");
                        </script>
                        <br>
    			        <div class="col">
    			            <h3 class="text-light comments-header">Комментарии:</h3>
    			            <h5 class="text-light comments-header"><b>Напишите комментарий:</b></h5>
    			            <form class="comments-form" action="writecomment.php">
    			                <input type="hidden" name="articleid" value=<?php echo($id); ?>>
    			                <textarea name="text" class="comment-text"></textarea><br>
    			                <input type="submit" value="Отправить" class="btn btn-primary comments-submit">
    			            </form>
    			            <br>
    			            <div class="comments-body">
    			                <div class="comment">
            			            <?php
                                    $row = getcomments($db, $id);        			            
                                    while ($row = mysqli_fetch_row($row)) {
                                        echo("<h6 class='comment-title text-white'><b>".$row['0']."</b></h6>");
                                        echo($row['1']);
                                    }
            			            ?>
        			            </div>
    			            </div>
    			        </div>
    			    </div>
			    </div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<footer class="section" style="background-color: #131313;">
		<div class="container">
      <div class="row">
        <div class="col-1">
					<br>
          <a class="brand" href="index.html">
						<img class="brand-logo-light" src="logo.png" alt="" width="30" height="30">
					</a>
				</div>
				<div class="col-8">
					<br>
	        <p style="color: white;">© Antares Space News 2019. Вся информация размещённая здесь взята из открытых источников.
					Копирование материалов разрешено с указанием ссылки на него. Обратная связь: anton_2319@outlook.com <a href="LICENSE">Лицензия</a>
					</p>
				</div>
        </div>
      </div>
