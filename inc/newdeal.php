<!-- DB CONNECT -->
<?php include('inc/dbconnect.php');?>
<!-- END CONNECT-->
<!-- MAIN BODY -->

	<div class="page-title">
	<h2>Create a new Deal</h2>
	</div>
	<hr>
	<p>Welcome. Please fill in the inforamtion below and a new Deal will be submitted for approval.</p>		
	<hr>
	
	<form action="dealsub.php" method="post">
	
	<!--[if lte IE 8]><label for="fname">Deal Title: </label><![endif]-->
			<input type="text" name="dtitle" class="span5" placeholder="Deal Title">
	<br>
	<!--[if lte IE 8]><label for="fname">Deal Description: </label><![endif]-->
			<textarea name="ddesc" class="span5" rows="8" placeholder="Deal Description"></textarea>
			
			<hr>
			
	<!--[if lte IE 8]><label for="fname">Orignal Price: </label><![endif]-->
			<input type="text" name="oprice" placeholder="Original Price">
			<br>
	<!--[if lte IE 8]><label for="fname">VIP Price: </label><![endif]-->
			<input type="text" name="vprice" placeholder="VIP Price">
			
			<hr>
			
	<!--[if lte IE 8]><label for="fname">Start Date: </label><![endif]-->
			<input type="text" name="sdate" placeholder="Start Date">
			<br>
	<!--[if lte IE 8]><label for="fname">End Date: </label><![endif]-->
			<input type="text" name="edate" placeholder="End Date">
			
			<hr>
			
	<!--[if lte IE 8]><label for="fname">Orignal Price: </label><![endif]-->
			<input type="text" name="dname" placeholder="Original Price">
			
		
	
	</form>

<!-- END MAIN -->
