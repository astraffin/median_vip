<?php confirm_session(); ?>
<!-- DB CONNECT -->
<?php include('inc/dbconnect.php');?>
<!-- END CONNECT-->
<!-- MAIN BODY -->
<?php error_reporting(E_ERROR); ?>
	<div class="page-title">
	<h2>Create a  New Deal</h2>
	</div>
	<hr>
	<p>Welcome. Please fill in the information below and a new deal will be submitted for approval.</p>		
	<hr>
	
	<form action="preview.php" enctype="multipart/form-data" method="post">
	
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
			
	
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
	<p><strong><em>Upload an image for this deal:</em></strong></p>
	Choose a file to upload: <br>
	<input name="uploadedfile" type="file"><br>
	<hr>
			<div class="alert"><strong>Note: All deals run for 30 days from original start date</strong></div>

	<hr>
	
	<button type="submit" class="btn btn-primary">
	Continue&nbsp;&nbsp;<i class="icon-arrow-right icon-white"></i>
	</button>
		
	
	</form>

<!-- END MAIN -->
