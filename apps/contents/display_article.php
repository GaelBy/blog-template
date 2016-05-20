<?php
	$reqComm = "SELECT id_article 
				FROM comments";

	$reqArticle = "SELECT articles.id, users.login AS author, title, description, content, image, articles.`date`
				   FROM articles
				   INNER JOIN users
				   ON articles.author = users.id";

	$resultArticle  = mysqli_query($link, $reqArticle);

	while ($article = mysqli_fetch_assoc($resultArticle))
	{
		$nbrComm = 0;
		$resultComm = mysqli_query($link, $reqComm);

		while ($comm = mysqli_fetch_assoc($resultComm))
		{
			if ($article['id'] == $comm['id_article'])
				$nbrComm++;
		}
		
		$id = $article['id'];

		require 'views/contents/display_article.phtml';
	}
?>