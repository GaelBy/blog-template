<?php

if (isset($_POST['pseudo'], $_POST['email'], $_POST['confirmEmail'] $_POST['password'], $_POST['confirmPassword']))
{

	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$confirmEmail = $_POST['confirmEmail'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if (strlen($pseudo) <2)
		$error = 'Votre pseudo est trop court ! (< 2 caractères)';
	else if (strlen($pseudo) >30)
		$error = 'Votre pseudo est trop long ! (>30 caractères)';

	if ($email != $confirmEmail)
		$error = 'E-mail différents !';
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		$error = 'Email non valide';

	if ($password != $confirmPassword)
		$error = 'Mots de passe différents !';
	else if (strlen($password) <4)
		$error = 'password trop court ! (au moin 4 caractères)';
}
?>