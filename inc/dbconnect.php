<!-- DATABASE CONNECTION -->
<?php
// Include Config
include('config.php');


// Connect
$link = mysql_connect($db_server, $db_user, $db_pass);
if (!$link) {
	die("Database Connection Failed : " . mysql_error());
}


//Select
$db_selected = mysql_select_db($db_name, $link);
if (!$db_selected) {
	die("Database Selection Failed : " . mysql_error());
} 


?>
<!-- END DATABASE CONNECTION -->