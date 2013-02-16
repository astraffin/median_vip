<?php include('inc/head.php');?>
<?php confirm_session(); ?>

<?php include('inc/dbconnect.php');?>
<!--- END HEAD -->
<!--- NAVBAR -->
<?php include('inc/navbar.php');?>
<!--- END NAVBAR -->
<!--- MAIN BODY -->
<?php

//Set Variables
	$dealer_id = $_SESSION['dealer_id'];
	$dtitle = $_SESSION['dtitle'];
	$ddesc = $_SESSION['ddesc'];
	$oprice = $_SESSION['oprice'];
	$vprice = $_SESSION['vprice'];
	$sdate = $_SESSION['sdate'];
	$imgloc = $_SESSION['imgloc'];

	
//Currently partial query
if (mysql_query("INSERT INTO deals (dealer_id, deal_name, deal_text, deal_img, deal_start, deal_oprice, deal_vprice) VALUES ( '$dealer_id', '$dtitle', '$ddesc', '$imgloc', DATE(NOW()), '$oprice', '$vprice')")){echo "You fucking win!";} else {echo "You fucking lose!"; echo "<br>" . mysql_error();}


?>
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
