<!-- DB CONNECT -->
<?php include('inc/dbconnect.php');?>
<!-- END CONNECT-->
<!-- MAIN BODY -->
<?php confirm_session(); ?>
<?php error_reporting(E_ERROR); ?>
<?php
//Set Variables
	$dealer_id = $_SESSION['dealer_id'];
	$dtitle = $_SESSION['dtitle'];
	$ddesc = $_SESSION['ddesc'];
	$oprice = $_SESSION['oprice'];
	$vprice = $_SESSION['vprice'];
	$sdate = $_SESSION['sdate'];
	$imgloc = $_SESSION['imgloc'];
	
//Push deal to DB - Currently partial query
if (mysql_query("INSERT INTO deals (dealer_id, deal_name, deal_text, deal_img, deal_start, deal_oprice, deal_vprice, deal_active) VALUES ( '$dealer_id', '$dtitle', '$ddesc', '$imgloc', DATE(NOW()), '$oprice', '$vprice', 0)")){echo "You fucking win!";} else {echo "You fucking lose!"; echo "<br>" . mysql_error();}

$query = mysql_query("SELECT * FROM deals WHERE dealer_id = '" . $_SESSION['dealer_id'] . "' AND deal_name = '" . $_SESSION['dtitle'] . "'");
$result = mysql_fetch_array($query);
//echo $result['deal_id'];
//print_r($result);
//print_r($_POST);
$_SESSION['deal_id'] = $result['deal_id'];
//print_r($_SESSION);
//echo $_SESSION['deal_id'];
//Sort categories
if ($_POST != NULL){
	foreach ($_POST as $key=>$value) {
		if (strpos($key, 'category') !== false) {
			$cat_new[] = $value;
		}
	}
	
	foreach ($cat_new as $value) {
	mysql_query("INSERT INTO deal2cat (deal_id, cat_id) values (" . $_SESSION['deal_id'] . ", " . $value . ")");
	}
	
}




	

//print_r($_POST);
?>




<!-- END MAIN -->