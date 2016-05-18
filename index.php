<?php	
	session_start();
	$access = array('home', 'login', 'register', 'admin_article', 'article', 'commentaire', 'logout');
	$page = 'home' /*page courante : home par default*/ ;
	if (isset($_GET['page']))
	{
		if (in_array($_GET['page'], $access))
			$page = $_GET['page'];
	}
	$access_traitement = array('login', 'register', 'admin_article', 'commentaire', 'logout');
	if (in_array($page, $access_traitement))
		require('apps/treatments/traitement_'.$page.'.php');// apps/traitement_login.php ou apps/traitement_register.php ou apps/traitement_contact.php
	require 'apps/skel.php';
?>
