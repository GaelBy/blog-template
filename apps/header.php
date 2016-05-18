<?php
	if (isset($_SESSION['login']))
	{
		if ($_SESSION['login'] == 'admin') //temporaire, à terme vérifier dans la DB
			require 'views/header_admin.phtml';
		else
			require 'views/header_user.phtml';
	}
	
	else
		require 'views/header_guest.phtml';
?> 