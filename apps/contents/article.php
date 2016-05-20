<?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
<<<<<<< HEAD
		$query = 'SELECT id, author, title, content, image, `date FROM articles WHERE id = ?';
=======
		$query = 'SELECT id, author, title, content, image, `date` FROM articles WHERE id = ?';
>>>>>>> b4b2642605b3da145a604f150aa2b54ae0a15433
		
		$req = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($req, "i", $id);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $id, $author, $title, $content, $image, $createDate);
		mysqli_stmt_fetch($req);
		mysqli_stmt_close($req);

		require'views/contents/article.phtml';
	}
	$error = 'Article inconnu';
?>