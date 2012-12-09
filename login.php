<?php include('inc/head.php');?>
<?php include('inc/dbconnect.php');?>
<!--- END HEAD -->

<!--- PERFORM LOGIN -->
<?php
			$username = $_POST['username'];
			$password = $_POST['password'];
			$hashed_password = sha1($password);
			
					
			$query = mysql_query("SELECT user_id, fname, is_setup, is_dealer FROM users WHERE username = '" . $username . "' AND hashed_password = '" . $hashed_password . "' LIMIT 1");
			if (!$query){ echo "MySQL Query Failed: " . mysql_error();}
			$query_array = mysql_fetch_array($query);
			$user_id = $query_array['user_id'];
			$fname = $query_array['fname'];
			$issetup = $query_array['is_setup'];
			$isdealer = $query_array['is_dealer'];
			//echo $user_id;
			if ($user_id == NULL) { echo "<!--- NAVBAR -->"; include('inc/navbar.php'); echo "<!--- END NAVBAR -->"; echo "<div class=\"alert alert-error\"><strong>Oops!</strong> &nbsp;Your login attempt failed!<br>Please try again or click \"Forgot password\".</div>"; echo include('inc/lform.php'); } else {$_SESSION['user_id'] = $user_id; $_SESSION['fname'] = $fname; $_SESSION['is_setup'] = $issetup; $_SESSION['is_dealer'] = $isdealer; echo "<script type=\"text/javascript\">window.location = \"index.php?p=deals\"</script>";}
?>
<!--- END LOGIN -->

<!--- MAIN BODY -->
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
