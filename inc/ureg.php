<!-- DB CONNECT -->
<?php include('inc/dbconnect.php');?>
<!-- END CONNECT-->
<!-- MAIN BODY -->
<!-- FORM VALIDATION VARIABLES -->
<?php
$fname = $lname = $address1 = $address2 = $city = $state = $zip = $birthdate = $email = $econf = $password = $pconf = $income = "";
$fnameerr = $lnameerr = $address1err = $address2err = $cityerr = $stateerr = $ziperr = $birthdateerr = $emailerr = $econferr = $passworderr = $pconferr = $incomeerr = "";
$errors = 0;
$email_exist = "adfghgfrliudfhgeubfaybrkhghmjtbrebntazdxt"; //SUPER SECRET EMAIL VERIFICATION KEY
$username_exist = "adfghgfrliudfhgeubfaybrkhghmjtbrebntazdxt"; //SUPER SECRET USERNAME VERIFICATION KEY

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	if (empty($_POST['fname'])){
		$fnameerr = "Please include your first name.";
		$errors++;
	}
	else {
		$fname = $_POST['fname'];
	}
	if (empty($_POST['lname'])) {
		$lnameerr = "Please include your last name.";
		$errors++;
	}
	else {
		$lname = $_POST['lname'];
	}
	if (empty($_POST['address1'])) {
		$address1err = "Please include your address.";
		$errors++;
	}
	else {
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
	}
	if (empty($_POST['city'])) {
		$cityerr = "Please include your city.";
		$errors++;
	} 
	else {
		$city = $_POST['city'];
	}
	if (empty($_POST['state'])) {
		$stateerr = "Please include your state.";
		$errors++;
	} 
	else {
		$state = $_POST['state'];
	}
	if (empty($_POST['zip'])) {
		$ziperr = "Please include your zip code.";
		$errors++;
	} 
	else {
		$zip = $_POST['zip'];
	}
	if (empty($_POST['email'])) {
		$emailerr = "Please include your email address.";
		$errors++;
	} 
	else {
		
		$email = $_POST['email'];
		$econf = $_POST['econf'];
	}
	if (empty($_POST['birthdate'])) {
		$birthdateerr = "Please include your birth date.";
		$errors++;
	} 
	else {
		$birthdate = $_POST['birthdate'];
	}
	if (empty($_POST['username'])) {
		$usernameerr = "Please include a username.";
		$errors++;
	}
	else {
		$username = $_POST['username'];
	}
	if (empty($_POST['password'])) {
		$passworderr = "Please include a password.";
		$errors++;
	}
	else {
		$password = $_POST['password'];
		$pconf = $_POST['pconf'];
	}
	if (!strcasecmp($email, $econf) == 0) {
		$econferr = "Email addresses do not match";
		$errors++;
	}
	if ($pconf !== $password) {
		$pconferr = "Passwords do not match.";
		$errors++;
	}
	
	$query = mysql_query("SELECT email FROM users WHERE email = '" . $_POST['email'] . "'");
	$query_array = mysql_fetch_array($query);
		
	if ($query_array['email'] != NULL){
	$email_exist = $query_array['email'];
	}
	
	if ((strcasecmp($email_exist, $_POST['email']) == 0)) {
			$emailerr = "This email address is already associated with an account.";
			$errors++;
			
	} 
	
	$query = mysql_query("SELECT username FROM users WHERE username = '" . $_POST['username'] . "'");
	$query_array = mysql_fetch_array($query);
		
	if ($query_array['username'] != NULL){
	$username_exist = $query_array['username'];
	}
	
	if ((strcasecmp($username_exist, $_POST['username']) == 0)) {
			$usernameerr = "This username is already associated with an account.";
			$errors++;
			
	} 
	
	
	if ($errors == 0) {
	$hashed_password = sha1($password);
	$is_dealer = $_POST['dealer'];
	$query = mysql_query("INSERT INTO users (fname, lname, address1, address2, city, state, zip, email, birthdate, income, username, hashed_password, is_dealer) VALUES ('" . $fname . "', '" . $lname . "', '" . $address1 . "', '" . $address2 . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $email . "', '" . $birthdate . "', '" . $income . "', '" . $username . "', '" . $hashed_password . "', '" . $is_dealer . "')");
	if (!$query) {
		echo "Error adding user to the database! " . mysql_error();
	}
	include('regwin.php');
	$formkiller = true;
	echo "<div style=\"display: none;\"><!-- FORM KILLER -->";
}
}



?>

<!-- END FORM VARIABLES -->
			<div class="page-title">
			<h2>User Registration Page</h2>
			</div>
			<hr>
			<p>Welcome. Please sign up below.</p>		
			<hr>
			<?php if ($errors >= 1) {echo "<div class=\"alert alert-error\"><h4>Oops!</h4><p>There are <strong>" . $errors . " errors</strong> that need to be addressed before you can register.</div>";} ?>
		<form action="index.php?p=ureg" method="post">
			
			<!--[if lte IE 8]><label for="fname">First Name: </label><![endif]-->
			<input type="text" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($fname);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $fnameerr . "</strong>";?></span>

			<br>
			<!--[if lte IE 8]><label for="lname">Last Name: </label><![endif]-->
			<input type="text" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($lname);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $lnameerr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="address1">Address: </label><![endif]-->
			<input type="text" name="address1" placeholder="Address" value="<?php echo htmlspecialchars($address1);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $address1err . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="address2">Address (cont.): </label><![endif]-->
			<input type="text" name="address2" placeholder="Address" value="<?php echo htmlspecialchars($address2);?>">
			<br>
			<!--[if lte IE 8]><label for="city">City: </label><![endif]-->
			<input type="text" name="city" placeholder="City" value="<?php echo htmlspecialchars($city);?>"><span class="text-error reg-alerts"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $cityerr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="state">State: </label><![endif]-->
			<input type="text" name="state" placeholder="State" value="<?php echo htmlspecialchars($state);?>"><span class="text-error reg-alerts"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $stateerr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="zip">Zip: </label><![endif]-->
			<input type="text" name="zip" placeholder="Zip" value="<?php echo htmlspecialchars($zip);?>"><span class="text-error reg-alerts"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $ziperr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="birthdate">Birthdate: </label><![endif]-->
			<input type="text" name="birthdate" placeholder="Birthdate" value="<?php echo htmlspecialchars($birthdate);?>"><span class="text-error reg-alerts"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $birthdateerr . "</strong>";?></span>
			<br><br>
		
			<!--[if lte IE 8]><label for="email">Email Address: </label><![endif]-->
			<input type="text" name="email" placeholder="Email Address" value="<?php echo htmlspecialchars($email);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $emailerr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="econf">Confirm Email: </label><![endif]-->
			<input type="text" name="econf" placeholder="Confirm Email" value="<?php echo htmlspecialchars($econf);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $econferr . "</strong>";?></span>
			<hr>
			<!--[if lte IE 8]><label for="password">Choose Username: </label><![endif]-->
			<input type="text" name="username" placeholder="Choose Username" value="<?php echo htmlspecialchars($username);?>"><span class="text-error reg-alerts"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $usernameerr . "</strong>";?></span>
			<br><br>
			<!--[if lte IE 8]><label for="password">Choose Password: </label><![endif]-->
			<input type="password" name="password" placeholder="Choose Password" value="<?php echo htmlspecialchars($password);?>"><span class="text-error reg-alerts"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $passworderr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="pconf">Confirm Password: </label><![endif]-->
			<input type="password" name="pconf" placeholder="Confirm Password" value="<?php echo htmlspecialchars($pconf);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $pconferr . "</strong>";?></span>

			<hr>
			<button type="submit" class="btn btn-primary" name="continue">Continue &nbsp;<i class="icon-arrow-right icon-white"></i></button>
		</form>

<?php if ($formkiller == true) {echo "</div><!-- END FORM KILLER -->";} ?>
<!-- END MAIN -->
