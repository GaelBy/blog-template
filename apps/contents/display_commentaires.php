<?php
	$reqComm = "SELECT comments.id, users.login AS author, comments.content, comments.date
				FROM comments
				INNER JOIN users
				ON comments.author = users.id
				WHERE comments.id_article=".$articleid;

	$resultComm = mysqli_query($link, $reqComm);

	while ($comments = mysqli_fetch_assoc($resultComm))
	{
		$date = date_create_from_format('Y-m-d H:i:s', $comments['date']);
		$comments['date'] = date_format($date, 'd/m/Y H:i:s');
		require "views/contents/display_commentaires.phtml";
	}
?>