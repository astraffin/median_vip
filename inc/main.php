<!-- MAIN BODY -->
<?php

// How sloppy is this?
if (isset($_GET['p'])){$page = $_GET['p'];} else { $_GET['p'] = NULL;}

if (!$_GET['p']){
	$page = "home";
}
//<!-- IS_SETUP ALERT -->
	
	if(isset($_SESSION['is_setup']) && $_SESSION['is_setup'] == 0 && $page != NULL){echo "<div class=\"alert alert-warning\"><strong>Welcome!</strong>&nbsp;You have not yet set your deal interests. <strong>You must configure your user settings before you can continue!</strong></div>";} 
	if(isset($_SESSION['is_setup']) && $_SESSION['is_setup'] == 0 && $page != NULL){$page = "uset";}
//<!-- END IS_SETUP ALERT -->


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