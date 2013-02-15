<!--MAIN BODY -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<?php
	$deal_id = $_GET['DID'];
	
	
	$deal_data = mysql_query("SELECT * FROM deals WHERE 'deal_id' = '" . $deal_id . "'");
	
	
	while ($deal = mysql_fetch_array($deal_data)){
		if (isset($deal)){
			$imgloc = $deal['deal_img'];
			$deal_title = $deal['deal_name'];
			$deal_text = $deal['deal_text'];
	
			echo $deal_id;
			echo $imgloc;
			
			}else{
			
			echo "$deal is not set";
	
		}
	}
	
	
	
	?>
	<div class="span4">
	<img src="<?php $imgloc; ?>" class="img-polaroid" width="250px">
	</div>
	<div class="span7">
	
	<h1><?php echo $deal_title; ?></h1>
	
	<h3><?php echo $client_name; ?></h3>
	<h5><?php echo $client_address1; ?><br><?php echo $client_address2; ?></h5>
	
	
	</div>
	<div class="span10">
	<br><br>
	<p><?php echo $deal_text; ?></p>
	
	</div>
	
	<div class="span6">
		<!--- related deals -->
	</div>
	<div class="span4">
	<br><br>
	<input type="button" value="Get this Deal" class="btn btn-large btn-block btn-primary" type="button">
	
	</div>

