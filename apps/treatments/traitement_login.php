<?php
	if (isset($_POST['email'],$_POST['password']))
	{
		$email = mysqli_real_escape_string($link,$_POST['email']);
		$pass = $_POST['password'];
		$req = 'SELECT login, password, admin FROM users
		WHERE email = "'.$email.'"';
		
		$users = mysqli_query($link, $req);
		if (!empty($users))
		{
			while ($line = mysqli_fetch_assoc($users))
			{
				if (password_verify($pass, $line['password']))
				{
					$_SESSION['login'] = $line['login'];
					if ($line['admin'] == '1')
						$_SESSION['admin'] = '1';

					header('Location: index.php?page=home');
					exit;
				}
				$error = 'Mot de passe incorrect';
			}
		}
		else
			$error = 'Email non reconnu';
	}
?>