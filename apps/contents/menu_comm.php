<?php	
	$commid = $comments['id'];
	if (isset($_SESSION['admin']))
	{
		if ($_SESSION['admin']== '0' && $_SESSION['login'] == $comments['author'])
			require 'views/contents/menu_comm_user.phtml';

		if ($_SESSION['admin']== '1')
			require 'views/contents/menu_comm_admin.phtml';
	}
?>