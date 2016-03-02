<h1><?=$title?></h1>
	<br />
	<p><?=$content?></p>
	<hr/>
<form method="post">
	<h2>Оставьте свой комментарий</h2><br/>
	Автор комментария<br/>
	<input type="text" 
	name="name"/><br/>
	Комментарий<br/>
	<textarea name="text"></textarea><br/>
	<input type="submit" value="Отправить" /><br />
	</form>
<h2>Последние комментарии</h2>
	<ul>
		<? foreach ($latestscom as $a): ?><br/>
			<li>
				<h3><?=$a['name']?></h3><br /> 
				<?=$a['text']?>
			</li>
		<? endforeach; ?>
	</ul>
<hr/>
