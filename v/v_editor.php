<ul>
	<li>
		<b><a href="index.php?c=page&act=new">Добавить новую статью</a></b>
	</li>		
		<? foreach ($articles as $article): ?>
			<li>
				<a href="index.php?c=page&act=edit&id=<?=$article['id_article']?>">
					<?=$article['title']?>
				</a>
			</li>
		<? endforeach; ?>
	</ul>
