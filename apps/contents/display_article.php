<?php
	$reqComm = "SELECT articles.title FROM comments INNER JOIN articles ON comments.id_article = articles.id";
	$resultComm = mysqli_query($link, $reqComm);
	$reqArticle = "SELECT id, author, title, description, content, image, 'date' FROM articles";
	$resultArticle  = mysqli_query($link, $reqArticle);


	while ($article = mysqli_fetch_assoc($resultArticle))
	{
		$nbrComm = 0;
		while ($comm = mysqli_fetch_assoc($resultComm))
		{
			if ($article['title'] = $comm['title'])
				$nbrComm++;
		}
		require 'views/contents/display_article.phtml';
	}
?>