<?php
	if(isset($_GET['articleid']))
	{
		$articleid = $_GET['articleid'];
		$query = 'SELECT articles.id, users.login AS author, title, content, image, articles.`date` 
		FROM articles 
		INNER JOIN users
		ON articles.author = users.id
		WHERE articles.id = '.$articleid;
		
		$res = mysqli_query($link, $query);
		while ($article = mysqli_fetch_assoc($res))
		{
			$author = $article['author'];
			$title = $article['title'];
			$content = $article['content'];
			$image = $article['image'];
			$date = date_create_from_format('Y-m-d H:i:s', $article['date']);
			$createDate = date_format($date, 'd/m/Y H:i:s');
		
		}

		require'views/contents/article.phtml';
	}
	$error = 'Article inconnu';
?>