<?php
	$id = $_GET['id'];
	$reqComm = "SELECT comments.id, comments.author, comments.content, comments.date
				FROM comments
				WHERE comments.id_article=".$id;

	$resultComm = mysqli_query($link, $reqComm);

	while ($comments = mysqli_fetch_assoc($resultComm))
	{

		var_dump($comments);	
	}

	require "views/contents/display_commentaires.phtml";
?>