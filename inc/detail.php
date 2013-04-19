<!-- MAIN BODY -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<?php
	$deal_id = $_GET['DID'];
	
	
	$deal_data = mysql_query("SELECT * FROM deals WHERE deal_id = '" . $deal_id . "'");
	
	$deal = mysql_fetch_array($deal_data);
		
			$imgloc = $deal['deal_img'];
			$deal_title = $deal['deal_name'];
			$deal_text = $deal['deal_text'];
			$deal_oprice = $deal['deal_oprice'];
			$deal_vprice = $deal['deal_vprice'];
			$deal_sprice = $deal_oprice - $deal_vprice;
	
	$dealer_data = mysql_query("SELECT * FROM dealers WHERE dealer_id = '" . $deal['dealer_id'] . "'");
			
	$dealer = mysql_fetch_array($dealer_data);

			$dealer_name = $dealer['dealer_name'];
			$dealer_address1 = $dealer['dealer_address1'];
			$dealer_address2 = $dealer['dealer_address2'];
			$dealer_state = $dealer['dealer_state'];
			$dealer_zip = $dealer['dealer_zip'];
			$dealer_phone = $dealer['dealer_phone'];
			$dealer_email = $dealer['dealer_email'];
			

	
	
	?>
	<div class="span4">
	<img src="<?php echo $imgloc; ?>" class="img-polaroid" width="400px">
	</div>
	<div class="span7">
	<!-- INSERT SALE BURST BELOW -->
	
	<h1><?php echo $deal_title; ?></h1>
	<div class="vprice-burst"><i class="icon-certificate"></i><div class="vprice"><center><strong>SAVE<br>$<?php echo $deal_sprice . "!"; ?></strong></center></div></div>
	<h3><?php echo $dealer_name; ?></h3>
	<h5><?php echo $dealer_address1; ?><br><?php echo $dealer_address2; ?><br><?php echo $dealer_state . ", " . $dealer_zip; ?><br><?php echo "Phone: " . $dealer_phone; ?><br><?php echo "Email: " . $dealer_email; ?></h5>
	
	
	</div>
	<div class="span10">
	
	<p><?php echo $deal_text; ?></p>
	
	</div>
	
	<div class="span6">
		<!--- related deals -->
	</div>
	<div class="span4">
	<br><br>
	<input type="button" value="Get this Deal" class="btn btn-large btn-block btn-primary" type="button">
	
	</div>

