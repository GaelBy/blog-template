<?php
	$req = $bdd->query('SELECT * FROM articles');

	while($articles = $req->fetch())
	{
		require'views/contents/article.phtml';
	}
	$error = 'Article inconnu';

?>