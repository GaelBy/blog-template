<?php
	if(isset($_GET['articleid']))
	{
		$articleid = $_GET['articleid'];
		$query = 'SELECT id, author, title, content, image, `date` 
		FROM articles WHERE id = '.$articleid;
		
		$res = mysqli_query($link, $query);
		while ($article = mysqli_fetch_assoc($res))
		{
			$author = $article['author'];
			$title = $article['title'];
			$content = $article['content'];
			$image = $article['image'];
			$createDate = $article['date'];
		}

		require'views/contents/article.phtml';
	}
	$error = 'Article inconnu';
?>