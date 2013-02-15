<!-- MAIN BODY -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<h2>Deals Page</h2>

<?php
//$imgpath = path to image for deal populated from database
//$dealtext_short = deal_text from database cut to 140char.
$deal_data = mysql_query("SELECT * FROM deals");
//removed from sql query while start and end dates are up in the air
//WHERE DATE(deal_end) >= DATE(NOW())
	
while ($deal = mysql_fetch_array($deal_data)){
		
	if (isset($deal)){
		$deal_id = $deal['deal_id'];
		$deal_name = $deal['deal_name'];
		$img_path = $deal['deal_img'];
		$deal_text = $deal['deal_text'];
		$deal_text = truncate_string($deal_text, 186);
		
echo "<div class=\"span10\"><hr></div>";
echo "<div class=\"span2\"><img src=\"";
echo $img_path;
echo "\" class=\"img-polaroid\"></div><div class=\"span6\">";
echo "<h3>" . htmlspecialchars($deal_name) . "</h3>";
echo "<p>" . htmlspecialchars($deal_text) . "</p></div>";
echo "<div class=\"span2\">";
echo "<br><a href=\"index.php?p=detail&DID=" . $deal_id . "\" ";
echo "class=\"btn btn-primary\">Details</a></div>";
	}	
}	

?>
	
	
<!-- END MAIN -->

