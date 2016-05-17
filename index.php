<?php
	$access = array(/* Tab contenant les pages disponibles du site */);
	$page = '' /*page courante : home par default*/ ;
	if (isset($_GET['page']))
	{
		if (in_array($_GET['page'], $access))
			$page = $_GET['page'];
	}
	require 'apps/skel.php';
?>