<?php

function confirm_session(){
if (!isset($_SESSION['user_id'])){
	echo "<h4 class=\"text-error\">Access denied:</h4><h4>Please login or register to access this page.</h4><br>";
	require_once('lform.php');
	die;
	}
}



?>