<?php
	if (isset($_POST['email'],$_POST['password']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$req = $bdd->query('SELECT * FROM users');
		while ($users = $req->fetch())
		{
			if ($users['email'] == $email)
			{
				if ($users['password'] == sha1($pass))
				{
					$_SESSION['login'] = $users['login'];
					if ($users['status'] == 'admin')
						$_SESSION['status'] = 'admin';
					header('Location: index.php?page=home');
					exit;
				}
				$error = 'Mot de passe incorrect';
			}
		}
		$error = 'Email non reconnu';
	}
?>