<?php
	if (isset($_POST['login'], $_POST['email'], $_POST['confirmEmail'], $_POST['password'], $_POST['confirmPassword']))
	{

		$login = $_POST['login'];
		$email = $_POST['email'];
		$confirmEmail = $_POST['confirmEmail'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];

		if (strlen($login) <2)
			$error = 'Votre pseudo est trop court ! (< 2 caractères)';
		else if (strlen($login) >32)
			$error = 'Votre pseudo est trop long ! (> 32 caractères)';/** Pascal : Attention dans la db le champs fait 31 caractères **/

		if ($email != $confirmEmail)
			$error = 'E-mail différents !';
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			$error = 'Email non valide';

		if ($password != $confirmPassword)
			$error = 'Mots de passe différents !';
		else if (strlen($password) <4)
			$error = 'password trop court ! (au moins 4 caractères)';

		if (empty($error))
		{
			$password = sha1($password);/** Pascal : C'est bien mais on fera bientôt mieux :) **/
			$query = 'INSERT INTO users(login, email, password) VALUES ("'.$login.'", "'.$email.'", "'.$password.'")';
			/** Pascal : Pour le status dans la db, utilisez plutot un boolean qu'un varchar : 0 = user et 1 = admin **/
			mysqli_query($link, $query);
			header('Location: index.php?page=login');
			exit;
		}
	}
?>