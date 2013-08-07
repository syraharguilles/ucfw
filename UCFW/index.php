<?php
	date_default_timezone_set('UTC');
	$page = (isset($_GET['page']) && $_GET['page'] != "" ? $_GET['page'] : "");
	$content = "content/$page.php";

	if($page)
		include $content;
	else
		include 'content/guest.php'
?>