<?php
	if (isset($_SESSION['status']) && $_SESSION['status'] == 'admin')
		require 'views/contents/menu_burger.phtml';
?>