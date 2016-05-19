<?php
	if (isset($_SESSION['login']))
	{
		if ($_SESSION['status'] == 'admin') //temporaire, à terme vérifier dans la DB
			require 'views/header_admin.phtml';
		else
			require 'views/header_user.phtml';
	}
	else
		require 'views/header_guest.phtml';
?> 