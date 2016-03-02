<form method="post">
	Название статьи<br/>
	<input type="text" name="newtitle" value="<?echo $article['title']?>" /><br/>
	Содержание<br/>
	<textarea name="newcontent"><?echo $article['content']?></textarea><br/>
	<input type="submit" value="Изменить" /><br />
	</form>
	<a href="index.php?c=page&act=del&id=<?=$_GET['id']?>">Удалить</a><br/><br/>
	Комментарии:<br/>
	<ul>
		<? foreach ($latestscom as $a): ?><br/>
			<li>
				<?=$a['name']?><br /> 
				<?=$a['text']?>
			</li>
		<? endforeach; ?>
	</ul>


