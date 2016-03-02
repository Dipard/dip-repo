<?php
//
// Конттроллер страницы чтения.
//

class C_Page extends C_Base
{
	//
	// Конструктор.
	//
	public function action_index(){
		$mArticles = M_Articles::Instance();

		$articles = $mArticles -> articles_all();
		foreach($articles as $key => $article){
			$articles[$key]['content'] = $mArticles->articles_intro($article);
		}
		$this->title .= 'Главная';
		$this->content = $this->Template('v/v_index.php', array('articles' => $articles));	
	}

	public function action_editor(){
		$mArticles = M_Articles::Instance();
		$articles = $mArticles-> articles_all();	
		$this->title .= 'Консоль редактора';
		$this->content = $this->Template('v/v_editor.php', array('articles' => $articles));	
	}

	public function action_edit(){
		$mArticles = M_Articles::Instance();
		$this->title .= 'Редактирование Статьи';
		$article= $mArticles ->articles_get($_GET['id']);
		if($this->isPost())
		{
			if ($mArticles->articles_edit($_GET['id'], $_POST['newtitle'], $_POST['newcontent']))
	{
		header('Location: index.php?c=page&act=editor');
		die();
	}
	
	$title = $_POST['newtitle'];
	$content = $_POST['newcontent'];
		}
	$latestscom=$mArticles->comments_get($_GET['id']);

		$this->content = $this->Template('v/v_edit.php', array('article' => $article, 'latestscom' => $latestscom));

	}
	//$latestscom=$mArticles->comments_get($_GET['id']);
	public function action_article(){
		$mArticles = M_Articles::Instance();
		$art= $mArticles-> articles_get($_GET['id']);
		$content=$art['content'];
		$title=$art['title'];
		$this->title .='статьи "'.$art['title'].'"';
		$latestscom=$mArticles->comments_get($_GET['id']);
		if($this->isPost()){
			if ($mArticles->comment_new($_POST['name'], $_POST['text'], $_GET['id']))
			{
			header('Location: index.php?c=page&act=index');
			die();
			}
		}
		$this->content=$this->Template('v/v_article.php',array ('content' => $content, 'title' => $title, 'latestscom' => $latestscom));
	}

	public function action_del(){
		$mArticles = M_Articles::Instance();
		if ($mArticles -> articles_delete($_GET['id'])){
			header('Location:index.php?c=page&act=editor');
		}
		else{
			echo "ERROR";
			}
	}
	public function action_del_com(){
		$mArticles = M_Articles::Instance();
		$del=$mArticles->comments_delete();
	}
	public function action_new(){
		$mArticles = M_Articles::Instance();
		$this->title .= 'Добавление новой статьи';
		if($this->isPost()){
			if ($mArticles->articles_new($_POST['title'], $_POST['content']))
		{
			header('Location: index.php?c=page&act=editor');
			die();
		}
			
		$title = $_POST['title'];
		$content = $_POST['content'];
		}
		$this->content = $this->Template('v/v_new.php');
		
	}
}
