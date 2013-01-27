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
	$dtitle = $_POST['dtitle'];
	$ddesc = $_POST['ddesc'];
	$oprice = $_POST['oprice'];
	$vprice = $_POST['vprice'];
	$sdate = $_POST['sdate'];



?>
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
