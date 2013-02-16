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
	

			if ($user_id == NULL) { echo "<!--- NAVBAR -->"; include('inc/navbar.php'); echo "<!--- END NAVBAR -->"; echo "<div class=\"alert alert-error\"><strong>Oops!</strong> &nbsp;Your login attempt failed!<br>Please try again or click \"Forgot password\".</div>"; echo include('inc/lform.php'); } else {$_SESSION['user_id'] = $user_id; $_SESSION['fname'] = $fname; $_SESSION['is_setup'] = $issetup; $_SESSION['is_dealer'] = $isdealer; echo "<script type=\"text/javascript\">window.location = \"index.php?p=deals\"</script>";}
			
			//Check to see if user is associated with a Dealer
			$dealer_query = mysql_query("SELECT * FROM dealers WHERE user_id = '" . $user_id . "'");
			$dealer_array = mysql_fetch_array($dealer_query);
			
			//If user is a dealer, set is_dealer to 1 both in DB and in $_SESSION
			if ($dealer_array != NULL){
				mysql_query("UPDATE users SET is_dealer=1 WHERE user_id = '" . $user_id . "'");
				$_SESSION['is_dealer'] = 1;
				$_SESSION['dealer_id'] = $dealer_array['dealer_id'];

			} 
?>
<!--- END LOGIN -->

<!--- MAIN BODY -->
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
