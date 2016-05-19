<?php
	$title = "Titre";
	$imgUrl = "http://...";
	$description = "La description de votre article...";
	$content = "Le contenu de votre article...";
	if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'edit')
	{
		$id = $_GET['id'];
		$query = 'SELECT title, description, content, image, `date` FROM articles WHERE id = $id';
		$res = mysqli_query($link, $query);
		while ($article = mysqli_fetch_assoc($res))
		{	
			$title = $article['title']; //récupération title bdd
			$imgUrl = $article['imgUrl']; //récupération imgUrl bdd
			$description = $article['description'];// récupération description bdd
			$content = $article['content'];// récupération content bdd
			$createDate = $article['date'];
		}
	}
	require 'views/contents/admin_article.phtml';
?>