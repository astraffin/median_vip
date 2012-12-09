<!-- MAIN BODY -->
			<div class="page-title">
			<h2>Dealer Registration Page</h2>
			</div>
			<hr>
			<p>Welcome. Please sign up below.</p>		
			<hr>
			
		<form action="process.php" method="post">
			
			<!--[if lte IE 8]><label for="fname">First Name: </label><![endif]-->
			<input type="text" name="fname" placeholder="First Name">
			<br>
			<!--[if lte IE 8]><label for="lname">Last Name: </label><![endif]-->
			<input type="text" name="lname" placeholder="Last Name">
			<br>
			<!--[if lte IE 8]><label for="address1">Address: </label><![endif]-->
			<input type="text" name="address1" placeholder="Address">
			<br>
			<!--[if lte IE 8]><label for="address2">Address (cont.): </label><![endif]-->
			<input type="text" name="address2" placeholder="Address">
			<br><br>
			<!--[if lte IE 8]><label for="email">Email Address: </label><![endif]-->
			<input type="text" name="email" placeholder="Email Address">
			<br>
			<!--[if lte IE 8]><label for="econf">Confirm Email: </label><![endif]-->
			<input type="text" name="econf" placeholder="Confirm Email">
			<hr>
			<!--[if lte IE 8]><label for="password">Choose Password: </label><![endif]-->
			<input type="password" name="password" placeholder="Choose Password">
			<br>
			<!--[if lte IE 8]><label for="pconf">Confirm Password: </label><![endif]-->
			<input type="password" name="pconf" placeholder="Confirm Password">
			
			<hr>
			<button type="submit" class="btn btn-primary" name="continue">Continue &nbsp;<i class="icon-arrow-right icon-white"></i></button>
		</form>

<!-- END MAIN -->
