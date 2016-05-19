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
				  WHERE id = ?';
		$req = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($req, "i", $id);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $titleEdit, $description, $content, $imgUrlEdit, $createDate);
		mysqli_stmt_fetch($req);
		mysqli_stmt_close($req);
	}
	require 'views/contents/admin_article.phtml';
?>