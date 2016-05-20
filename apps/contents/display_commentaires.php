<?php
	$reqComm = "SELECT comments.id, comments.author, comments.content, comments.date
				FROM comments
				WHERE comments.id_article=".$articleid;

	$resultComm = mysqli_query($link, $reqComm);

	while ($comments = mysqli_fetch_assoc($resultComm))
	{
		require "views/contents/display_commentaires.phtml";
	}
?>