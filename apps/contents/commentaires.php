<?php
	$action = 'add';
	$commContent['content'] = "";
	$commid = "";
	$articleid = $_GET['articleid'];
	$author = "";
	if (isset($_GET['commid'], $_GET['action']))
	{
		$commid = $_GET['commid'];
		if ($_GET['action'] == 'edit')
		{
			$action = 'edit';
			$query = 'SELECT content, users.login AS author 
			FROM comments 
			INNER JOIN users
			ON comments.author = users.id
			WHERE comments.id = '.$commid;
			$req = mysqli_query($link, $query);
			$commContent = mysqli_fetch_assoc($req);
			$author = $commContent['author'];
		}
		else 
			$action = 'add';
	}
	require "views/contents/commentaires.phtml";
?>