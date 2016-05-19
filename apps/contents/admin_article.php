<?php
	$title = "Titre";
	$titleEdit = "";
	$imgUrl = "http://...";
	$imgUrlEdit = "";
	$description = "La description de votre article...";
	$content = "Le contenu de votre article...";
	$createDate = '';

	if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'edit')
	{
		$id = $_GET['id'];
		$query = 'SELECT title, description, content, image, `date` 
		FROM articles 
		WHERE id = '.$id;
		$res = mysqli_query($link, $query);
		while ($article = mysqli_fetch_assoc($res))
		{
			$titleEdit = $article['title'];
			$description = $article['description'];
			$content = $article['content'];
			$imgUrlEdit = $article['image'];
			$createDate = $article['date'];
		}
	}
	require 'views/contents/admin_article.phtml';
?>