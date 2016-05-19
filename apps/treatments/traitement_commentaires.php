<?php
	if (isset($_SESSION['login']))
	{
<<<<<<< HEAD
		if ($_SESSION['status'] == 'admin'
			&& $_SESSION['status']== 'user'
			&& $_GET['action']== 'edit')
=======
		if ($_SESSION['status'] == 'admin')/** Pascal : Tout le monde peut commenter :) **/
>>>>>>> aba706194d626bfa7e767360bed89fc5e8710037
		{
			if (isset($_POST['content']))
			{
				$commid = $_GET['commid'];
				$content = $_POST['content'];

				if(strlen($content) <500)/** Pascal : Dans votre db la taille max est de 511, vous pouvez faire mieux :p **/
					$error = 'Votre commentaire est trop long ! (> 500 caractères)';

				if(empty($error))
				{
					$author = $_SESSION['login'];
<<<<<<< HEAD
					$query = "UPDATE comments
							  SET content = '".$content."'
							  WHERE id = ".$commid;
					mysqli_query($link, $query);
=======
					$query = 'INSERT INTO comments (author, title, content) VALUES (?,?,?)';
					/** Pascal : Les requêtes préparées sont plus lentes si elles ne sont pas répétées, donc évitez ici en tout cas **/
					$req = mysqli_prepare($link, $query);
					mysqli_stmt_bind_param($req, "sss", $author, $title, $content);
					mysqli_stmt_execute($req);
					mysqli_stmt_close($req);
>>>>>>> aba706194d626bfa7e767360bed89fc5e8710037
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