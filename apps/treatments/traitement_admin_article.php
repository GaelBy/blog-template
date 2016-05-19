<?php
	if (isset($_SESSION['login']))
	{
		if ($_SESSION['status'] == 'admin')
		{
			if (isset($_GET['action']))
			{
				$action = $_GET['action'];
				if ($action == 'delete')
				{
					if (isset($_GET['id']))
					{
						//Supprimer un article
						$id = $_GET['id'];
						$query = 'DELETE FROM articles WHERE id = $id LIMIT 1';
						mysqli_query($link, $query);
						//Supprimer les commentaires
						$query = 'DELETE FROM comments WHERE id_article = $id';
						mysqli_query($link, $query);
						header('Location: index.php?page=home');
						exit;
					}
					else
						$error = 'Il manque l\'id de l\'article';
				}
				else if (isset($_POST['title'], $_POST['imgUrl'], $_POST['description'], $_POST['content']))
				{
					$title = $_POST['title'];
					$imgUrl = $_POST['imgUrl'];
					$description = $_POST['description'];
					$content = $_POST['content'];

					if (strlen($title) < 3)
						$error = 'Titre trop court';
					else if (strlen($title) > 32)
						$error = 'Titre trop long';
					if (!filter_var($imgUrl, FILTER_VALIDATE_URL))
						$error = 'L\'url de votre image n\'est pas valide';
					if (strlen($description) < 10 )
						$error ='Description trop courte';
					else if (strlen($description) > 128) 
						$error = 'Description trop longue';
					if (strlen($content) < 30 )
						$error ='Le contenu est trop court';
					else if (strlen($content) > 1024) 
						$error = 'Le contenu est trop long';
					if (empty($error))
					{
						if ($action == 'add')
						{
							//creation d'un article
							$author = $_SESSION['login'];
							$query = 'INSERT INTO articles (author, title, description, content, image) VALUES (?,?,?,?,?)';
							$req = mysqli_prepare($link, $query);
							mysqli_stmt_bind_param($req, "sssss", $author, $title, $description, $content, $imgUrl);
							mysqli_stmt_execute($req);
							mysqli_stmt_close($req);
							header('Location: index.php?page=home');
							exit;
						}
						else if ($action == 'edit');
						{
							if (isset($_GET['id']))
							{
								//modifier un article
								$id = $_GET['id'];
								$lastDate = date('Y-m-d H:i:s');
								$query = 'UPDATE articles SET title = $title, description = $description, content = $content, image = $imgUrl, `date` = $createDate, last_date = $lastDate WHERE id = $id';
								mysqli_query($link, $query);
								header('Location: index.php?page=home');
								exit;
							}
							else
								$error = 'Il manque l\'id de l\'article';
						}
					}
				}
				else 
					$error = 'Veuillez renseigner tous les champs!';
			}
		}
		else
		{
			//redirection + msg disant "Vous n'avez pas les droits necessaire pour acceder à cette page"
			$error = 'Vous n\'avez pas les droits nécessaires';
			header('Location: index.php?page=home');
			exit;
		}
	}
	else
	{
		header('Location: index.php?page=login');//redirection si utilisateur non connecté
		exit;
	}

?>