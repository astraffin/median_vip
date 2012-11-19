<?php include('inc/head.php');?>
<?php include('inc/dbconnect.php');?>
<!--- END HEAD -->
<!--- NAVBAR -->
<?php include('inc/navbar.php');?>
<!--- END NAVBAR -->
<!--- MAIN BODY -->
			<?php
			
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$hashed_password = sha1($password);
			
			$query = mysql_query("INSERT INTO users (fname, lname, address1, address2, email, hashed_password) VALUES ('" . $fname . "', '" . $lname . "', '" . $address1 . "', '" . $address2 . "', '" . $email . "', '" . $hashed_password . "')");
			if (!$query){
				include('inc/regfail.php'); 
			} else {
				include('inc/regwin.php');
			}
			?>
			<?php //include('inc/regsuccess.php');?>
			<?php //include('inc/regfail.php');?>
			


<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
