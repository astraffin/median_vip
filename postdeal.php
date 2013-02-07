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
	$dtitle = $_SESSION['dtitle'];
	$ddesc = $_SESSION['ddesc'];
	$oprice = $_SESSION['oprice'];
	$vprice = $_SESSION['vprice'];
	$sdate = $_SESSION['sdate'];
	$imgloc = $_SESSION['imgloc'];
	
//Currently partial query
if (mysql_query("INSERT INTO deals (deal_name, deal_text, deal_img) VALUES ( '$dtitle', '$ddesc', '$imgloc') ")){echo "You fucking win!";} else {echo "You fucking lose!"; echo "<br>" . mysql_error();}


?>
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
