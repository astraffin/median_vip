<!-- MAIN BODY -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<?php
	$deal_id = $_GET['DID'];
	//echo $_SESSION['user_id'];
	//Checks to see if this deals already been got by this user
	$gotquery = mysql_query("SELECT * FROM user2deal WHERE user_id = " . $_SESSION['user_id'] . " AND deal_id = " . $deal_id);
	$got = mysql_fetch_array($gotquery);
	if ($got != NULL) {$thisdeal_sent = 1;}
	
	if ($_POST['deal_id'] == $deal_id){
		$thisuser_id = $_POST['user_id'];
		$thisdeal_id = $_POST['deal_id'];
		$thisdealer_id = $_POST['dealer_id'];
		$thisdeal_sent = 1;
		
		mysql_query("INSERT INTO user2deal (user_id, deal_id, dealer_id, date_req) VALUES ('$thisuser_id', '$thisdeal_id', '$thisdealer_id', NOW())");
	} 
	
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

			$dealer_id = $dealer['dealer_id'];
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
	<form action="index.php?p=detail&DID=<?php echo $deal_id;?>" enctype="multipart/form-data" method="post">
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
	<input type="hidden" name="deal_id" value="<?php echo $deal_id; ?>">
	<input type="hidden" name="dealer_id" value="<?php echo $dealer_id; ?>">
	<input type="submit" <?php if ($thisdeal_sent == 1){ echo "disabled=\"disabled\" value=\"You Got It!\"";} else { echo "value=\"Get this Deal\""; } ?> class="btn btn-large btn-block btn-primary">
	</form>
	</div>

