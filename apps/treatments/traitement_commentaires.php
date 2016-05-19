<?php
	if (isset($_POST['auteur'], $_POST['titre'], $_POST['content'], $_POST['date']))
	{

		$auteur = $_POST['auteur'];
		$titre = $_POST['titre'];
		$content = $_POST['content'];
		$date = $_POST['date'];

		if(strlen($commentaire) 500<)
			$error = 'Votre commentaire est trop long ! (> 500 caractères)';

		if(empty($error))
		{

		}
	}