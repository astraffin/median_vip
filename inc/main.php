<!-- MAIN BODY -->
<?php

// How sloppy is this?
if (isset($_GET['p'])){$page = $_GET['p'];} else { $_GET['p'] = NULL;}

if (!$_GET['p']){
	$page = "home";
}

if (!include($page . '.php')){
	echo "<script type=\"text/javascript\"> window.location = \"404.html\" </script>";;
}


//if (!$page) {
//	require_once('home.php');
//} else if ($page) {
//	require_once($page . ".php");
//} else {
//	require_once('404.html');
//}

?>
<!-- END MAIN -->