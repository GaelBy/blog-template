<?php
	$title = "Titre";
	$imgUrl = "http://...";
	$description = "La description de votre article...";
	$content = "Le contenu de votre article...";
	if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'edit')
	{
		$title = ""; //récupération title bdd
		$imgUrl = ""; //récupération imgUrl bdd
		$description = "";// récupération description bdd
		$content = "";// récupération content bdd
	}
	require 'views/contents/admin_article.phtml';
?>