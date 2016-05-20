<?php
	$reqComm = "SELECT comments.id, users.login AS author, comments.content, comments.date
				FROM comments
				INNER JOIN users
				ON comments.author = users.id
				WHERE comments.id_article=".$articleid;

	$resultComm = mysqli_query($link, $reqComm);

	while ($comments = mysqli_fetch_assoc($resultComm))
	{
		require "views/contents/display_commentaires.phtml";
	}
?>