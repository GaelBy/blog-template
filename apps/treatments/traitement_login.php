<?php
	if (isset($_POST['email'],$_POST['password']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$req = 'SELECT * FROM users
		WHERE email= '.$email;/** Pascal : Donc si vous avez 9999999999999999999999 utilisateurs vous les récupérez tous pour savoir si y'en a un qui correspond ? **/
		/** Pascal : Selectionnez plutot les users qui ont le bon email :) **/
		/** Pascal : SELECT * FROM users WHERE email=$email **/
		$users = mysqli_query($link, $req);
		if (!empty($users))
		{
			while ($line = mysqli_fetch_assoc($users))
			{
				if ($line['password'] == sha1($pass))
				{
					$_SESSION['login'] = $line['login'];
					if ($line['status'] == 'admin')
						$_SESSION['status'] = 'admin';
					/** Pascal : Mettez plutot $_SESSION['admin'] = 0 ou 1 **/
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