<?php

	$id = $_GET['id'];
	$query = 'SELECT id, author, title, content, image, "date" FROM articles WHERE id = $id';
	$res = mysqli_query($link, $query);

	while($_GET['id'] == $id)
	{
		require'views/contents/article.phtml';
	}
	$error = 'Article inconnu';

?>