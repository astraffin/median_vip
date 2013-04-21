<!-- DB CONNECT -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<!-- END CONNECT-->
<!-- MAIN BODY -->
<!-- FORM VALIDATION VARIABLES -->
<?php error_reporting(E_ERROR); ?>
<?php
$dname = $address1 = $address2 = $email = $econf = $state = $zip = $phone = "";
$dnameerr = $address1err = $address2err = $emailerr = $stateerr = $ziperr = $phoneerr = "";
$errors = 0;
$email_exist = "adfghgfrliudfhgeubfaybrkhghmjtbrebntazdxt"; //SUPER SECRET EMAIL VERIFICATION KEY
$dname_exist = "adfghgfrliudfhgeubfaybrkhghmjtbrebntazdxt"; //SUPER SECRET USERNAME VERIFICATION KEY

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	if (empty($_POST['dname'])){
		$dnameerr = "Please include your company name.";
		$errors++;
	}
	else {
		$dname = $_POST['dname'];
	}
	if (empty($_POST['address1'])) {
		$address1err = "Please include your address.";
		$errors++;
	}
	else {
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
	}
	if (empty($_POST['email'])) {
		$emailerr = "Please include your email address.";
		$errors++;
	} 
	else {
		
		$email = $_POST['email'];
		$econf = $_POST['econf'];
	}
	if (empty($_POST['state'])){
		$stateerr = "Please include your state.";
		$errors++;
	}
	else {
		$state = $_POST['state'];
	}
	if (empty($_POST['zip'])){
		$ziperr = "Please include your zip code.";
		$errors++;
	}
	else {
		$zip = $_POST['zip'];
	}
	if (empty($_POST['phone'])){
		$phoneerr = "Please include your phone number.";
		$errors++;
	}
	else {
		$phone = $_POST['phone'];
	}
	if (!strcasecmp($email, $econf) == 0) {
		$econferr = "Email addresses do not match";
		$errors++;
	}
	
	
	$query = mysql_query("SELECT email FROM dealers WHERE dealer_email = '" . $_POST['email'] . "'");
	$query_array = mysql_fetch_array($query);
		
	if ($query_array['dealer_email'] != NULL){
	$email_exist = $query_array['dealer_email'];
	}
	
	if ((strcasecmp($email_exist, $_POST['email']) == 0)) {
			$emailerr = "This email address is already associated with an account.";
			$errors++;
			
	} 
	
	$query = mysql_query("SELECT dealer_name FROM dealers WHERE dealername = '" . $_POST['dname'] . "'");
	$query_array = mysql_fetch_array($query);
		
	if ($query_array['dname'] != NULL){
	$username_exist = $query_array['dname'];
	}
	
	if ((strcasecmp($username_exist, $_POST['dname']) == 0)) {
			$usernameerr = "This company name is already associated with an account.";
			$errors++;
			
	} 
	
	
	if ($errors == 0) {
	$hashed_password = sha1($password);
	$is_dealer = $_POST['dealer'];
	$query = mysql_query("INSERT INTO dealers (user_id, dealer_name, dealer_address1, dealer_address2, dealer_state, dealer_zip, dealer_phone, dealer_email, start_date) VALUES ('" . $_SESSION['user_id'] . "', '" . mysql_escape_string($dname) . "', '" . mysql_escape_string($address1) . "', '" . mysql_escape_string($address2) . "', '" . mysql_escape_string($state) . "', '" . mysql_escape_string($zip) . "', '" . mysql_escape_string($phone) . "', '" . mysql_escape_string($email) . "', DATE(NOW()))");
	if (!$query) {
		echo "Error adding company to the database! " . mysql_error();
	}
	include('regwin.php');
	$formkiller = true;
	echo "<div style=\"display: none;\"><!-- FORM KILLER -->";
}
}



?>

<!-- END FORM VARIABLES -->
			<div class="page-title">
			<h2>Dealer Registration Page</h2>
			</div>
			<hr>
			<p>Welcome. Please sign up below.</p>		
			<hr>
			<?php if ($errors >= 1) {echo "<div class=\"alert alert-error\"><h4>Oops!</h4><p>There are <strong>" . $errors . " errors</strong> that need to be addressed before you can register.</div>";} ?>
		<form action="index.php?p=dreg" method="post">
			
			<!--[if lte IE 8]><label for="fname">Company Name: </label><![endif]-->
			<input type="text" name="dname" placeholder="Company Name" value="<?php echo htmlspecialchars($dname);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $dnameerr . "</strong>";?></span>

			<br>
			<!--[if lte IE 8]><label for="address1">Address: </label><![endif]-->
			<input type="text" name="address1" placeholder="Address" value="<?php echo htmlspecialchars($address1);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $address1err . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="address2">Address (cont.): </label><![endif]-->
			<input type="text" name="address2" placeholder="Address (cont.)" value="<?php echo htmlspecialchars($address2);?>">
			<br>
			<!--[if lte IE 8]><label for="state">State: </label><![endif]-->
			<input type="text" name="state" placeholder="State" value="<?php echo htmlspecialchars($state);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $stateerr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="zip">Zip Code: </label><![endif]-->
			<input type="text" name="zip" placeholder="Zip Code" value="<?php echo htmlspecialchars($zip);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $ziperr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="phone">Phone Number: </label><![endif]-->
			<input type="text" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($phone);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $phoneerr . "</strong>";?></span>
			<br>
			<br>
			<!--[if lte IE 8]><label for="email">Email Address: </label><![endif]-->
			<input type="text" name="email" placeholder="Email Address" value="<?php echo htmlspecialchars($email);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $emailerr . "</strong>";?></span>
			<br>
			<!--[if lte IE 8]><label for="econf">Confirm Email: </label><![endif]-->
			<input type="text" name="econf" placeholder="Confirm Email" value="<?php echo htmlspecialchars($econf);?>"><span class="text-error"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>" . $econferr . "</strong>";?></span>
			<hr>

			<button type="submit" class="btn btn-primary" name="continue">Continue &nbsp;<i class="icon-arrow-right icon-white"></i></button>
		</form>

<?php if ($formkiller == true) {echo "</div><!-- END FORM KILLER -->";} ?>
<!-- END MAIN -->
