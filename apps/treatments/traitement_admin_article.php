<?php
	if (isset($_SESSION['user']))
	{
		if (isset($_GET['action'])
		{
			$action = $_GET['action'];
			if ($action == 'delete')
			{
				if (isset($_GET['id']))
				{
					//Supprimer un article
				}
				else
					$error = 'Il manque l\'id de l\'article';
			}
			if (isset($_POST['title'], $_POST['imgUrl'], $_POST['description'], $_POST['content']))
			{
				$title = $_POST['title'];
				$imgUrl = $_POST['imgUrl'];
				$description = $_POST['description'];
				$content = $_POST['content'];

				if (strlen($title) < 3)
					$error = 'Titre trop court';
				else if (strlen($title) > 20)
					$error = 'Titre trop long';
				if (!filter_var($imgUrl, FILTER_VALIDATE_URL))
					$error = 'L\'url de votre image n\'est pas valide';
				if (strlen($description) < 10 )
					$error ='Description trop courte';
				elseif (strlen($description) > 50) 
					$error = 'Description trop longue';
				if (strlen($content) < 30 )
					$error ='Le contenu est trop court';
				elseif (strlen($content) > 500) 
					$error = 'Le contenu est trop long';
				if (empty($error))
				{
					if ($action == 'add')
					{
						$date = date('d.m.Y');
						//creation d'un article
					}
					else if ($action == 'edit');
					{
						//modifier un article
					}
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