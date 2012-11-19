<?php include('inc/head.php');?>
<?php include('inc/dbconnect.php');?>
<!--- END HEAD -->
<!--- PERFORM LOGOUT -->
<?php
		
		$_SESSION = array();
		
		if (isset($_COOKIE[session_name()])){
		setcookie(session_name(), "", time()-42000, "/");
		}
?>
<!--- END LOGOUT -->
<!--- NAVBAR -->
<?php include('inc/navbar.php');?>
<!--- END NAVBAR -->
<!--- MAIN BODY -->

<?php
		if(session_destroy()){
		
		echo "<h4 class=\"text-error\">You have successfully logged out!</h4>";
		require_once('inc/lform.php');
		echo "<br><br><a class=\"btn btn-primary\" href=\"index.php\">Go To Home Page&nbsp;&nbsp;<i class=\"icon-arrow-right icon-white\"></i></a>";
		}

?>
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
