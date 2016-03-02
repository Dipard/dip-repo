<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	<div id="menu">
		<a href="index.php">Читать текст</a> |
		<a href="index.php?c=page&act=editor">Редактировать текст</a>
	</div>
	<div class="wraper">
		<div class="left">
		<h1>Последние добавленные</h1>
	<ul>
		<? foreach ($latests as $article): ?><br/>
			<li>
				<a href="index.php?c=page&act=article&id=<?=$article['id_article']?>">
					<?=$article['title']?><br />
				</a><br />
				<?=($article['content'])?><a href="index.php?c=page&act=article&id=<?=$article['id_article']?>">...читать далее</a>
			</li>
		<? endforeach; ?>
	</ul>
</div>
	<div class="right">
	<div id="content">
		<?=$content?>
	</div>
	</div>
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</div>
</body>
</html>
