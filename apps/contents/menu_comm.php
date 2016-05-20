<?php	
	$commid = $comments['id'];
	if (isset($_SESSION['status']))
	{
		if ($_SESSION['status']== 'user' && $_SESSION['login'] == $comments['author'])
			require 'views/contents/menu_comm_user.phtml';

		if ($_SESSION['status']== 'admin')
			require 'views/contents/menu_comm_admin.phtml';
	}
?>