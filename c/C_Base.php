<?php

// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы

	//
	// Конструктор.
	//
	function __construct()
	{		
	}
	
	protected function before()
	{
		$this->title = 'Находимся на странице ';
		$this->content = '';
		$mArticles = M_Articles::Instance();
		$this->latests = $mArticles->articles_latests();
		foreach($this->latests as $key => $article){
			$this->latests[$key]['content'] = $mArticles->articles_intro($article);
		}
	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content, 'latests' => $this->latests);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
