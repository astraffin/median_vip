<!-- MAIN BODY -->
<?php
$page = $_GET['p'];
if (!$page) {
	require_once('home.php');
} else if ($page) {
	require_once($page . ".php");
} else {
	require_once('404.html');
}
?>
<!-- END MAIN -->