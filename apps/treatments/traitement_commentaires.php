<?php
	if (isset($_SESSION['login']))
	{
		if ($_SESSION['status'] == 'admin'
			&& $_SESSION['status']== 'user'
			&& $_GET['action']== 'edit')
		{
			if (isset($_POST['content']))
			{
				$commid = $_GET['commid'];
				$content = $_POST['content'];

				if(strlen($content) <500)
					$error = 'Votre commentaire est trop long ! (> 500 caractères)';

				if(empty($error))
				{
					$author = $_SESSION['login'];
					$query = "UPDATE comments
							  SET content = '".$content."'
							  WHERE id = ".$commid;
					mysqli_query($link, $query);
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