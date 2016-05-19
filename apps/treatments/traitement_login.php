<?php
	if (isset($_POST['email'],$_POST['password']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$req = 'SELECT * FROM users';
		$users = mysqli_query($link, $req);

		while ($line = mysqli_fetch_assoc($users))
		{
			if ($line['email'] == $email)
			{
				if ($line['password'] == sha1($pass))
				{
					$_SESSION['login'] = $line['login'];
					if ($line['status'] == 'admin')
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