<?php	
	$commid = $comments['id'];
	if (isset($_SESSION['login']))
	{
		if (isset($_SESSION['admin']) && $_SESSION['admin']== '1')
			require 'views/contents/menu_comm_admin.phtml';
		else if ($_SESSION['login'] == $comments['author'])
			require 'views/contents/menu_comm_user.phtml';

	}
?>