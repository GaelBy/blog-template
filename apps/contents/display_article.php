<?php
	$reqComm = "SELECT id_article 
				FROM comments";

	$reqArticle = "SELECT id, author, title, description, content, image, `date`
				   FROM articles";

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
		
		$articleid = $article['id'];

		require 'views/contents/display_article.phtml';
	}
?>