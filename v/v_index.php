<ul>
		<? foreach ($articles as $article): ?><br/>
			<li>
				<a href="index.php?c=page&act=article&id=<?=$article['id_article']?>">
					<?=$article['title']?><br />
				</a><br />
				<?=($article['content'])?><a href="index.php?c=page&act=article&id=<?=$article['id_article']?>">...читать далее</a>
			</li>
		<? endforeach; ?>
	</ul>
