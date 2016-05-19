<?php
	if (isset($_SESSION['login']))
	{
		if ($_SESSION['status'] == 'admin')
		{
			if (isset($_POST['author'], $_POST['title'], $_POST['content'], $_POST['imgUrl'], $_POST['date']))
			{
				$author = $_POST['author'];
				$title = $_POST['title'];
				$content = $_POST['content'];
				$imgUrl = $_POST['imgUrl'];
				$date = $_POST['date'];

				if(strlen($content) <500)
					$error = 'Votre commentaire est trop long ! (> 500 caractères)';

				if(empty($error))
				{
					$author = $_SESSION['login'];
					$query = 'INSERT INTO comments (author, title, content, image) VALUES (?,?,?,?)';
					$req = mysqli_prepare($link, $query);
					mysqli_stmt_bind_param($req, "ssss", $author, $title, $content, $imgUrl);
					mysqli_stmt_execute($req);
					mysqli_stmt_close($req);
					header('Location: index.php?page=home');
					exit;
				}
			}
			else 
				$error = 'Veuillez renseigner tous les champs!';
		}
	}
	else
	{
		header('Location: index.php?page=login');//redirection si utilisateur non connecté
		exit;
	}
?>