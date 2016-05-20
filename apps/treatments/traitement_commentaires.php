<?php
	if (isset($_SESSION['login']))
	{
		if (isset($_GET['action']) && $_GET['action'] == 'delete')
			{
				$commid = $_GET['commid'];
				$articleid = $_GET['articleid'];
				$query = "DELETE FROM comments WHERE id=".$commid;
				mysqli_query($link, $query);
				header('Location: index.php?page=article&id='.$articleid);
				exit;
			}
		else if (isset($_POST['action']) && isset($_POST['articleid']))
		{
			$commid = $_POST['commid'];
			$articleid = $_POST['articleid'];
			$content = mysqli_real_escape_string($link, $_POST['content']);
			if (strlen($content) < 5)
				$error = "commentaire trop court";
			else if (strlen($content) > 511)
				$error = "commentaire trop long";

			if (($_SESSION['status'] == 'admin'|| $_POST['author'] == $_SESSION['login'])
				&& $_POST['action'] == 'edit') //EDIT COMM
			{
				if (empty($error))
				{
					$query = 'UPDATE comments SET content = "'.$content.'" WHERE id = "'.$commid.'"';
					mysqli_query($link, $query);
					header('Location: index.php?page=article&id='.$articleid);
					exit;
				}

			}
			if (($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'user')
					 && $_POST['action'] == 'add')
			{
				$author = $_SESSION['login'];
				if (empty($error))
				{
					$query = "INSERT INTO comments(id_article, author, content) VALUES ('".$articleid."', '".$author."', '".$content."')";
					mysqli_query($link, $query);
					header('Location: index.php?page=article&id='.$articleid);
					exit;
				}
			}
		}
	}
	else
	{
		header('Location: index.php?page=login');//redirection si utilisateur non connecté
		exit;
	}
?>