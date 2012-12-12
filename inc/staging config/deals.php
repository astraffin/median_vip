<!-- MAIN BODY -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<h2>Deals Page</h2>

<?php
//$imgpath = path to image for deal populated from database
//$dealtext_short = deal_text from database cut to 140char.
$deal_data = mysql_query("SELECT * FROM deals WHERE DATE(deal_end) >= DATE(NOW())");
	
while ($deal = mysql_fetch_array($deal_data)){
		
	if (isset($deal)){
		$deal_name = $deal['deal_name'];
		$img_path = $deal['deal_img'];
		$dealtext = $deal['deal_text'];
		
echo "<div class=\"span10\"><hr></div>";
echo "<div class=\"span2\"><img src=\"";
echo $img_path;
echo "\" class=\"img-polaroid\"></div><div class=\"span6\">";
echo "<h3>" . $deal_name . "</h3>";
echo "<p>" . $dealtext . "</p></div>";
echo "<div class=\"span2\">";
echo "<br><input type=\"button\" value=\"Details\"";
echo "class=\"btn btn-primary\"></div>";
	}	
}	

?>
	
	
<!-- END MAIN -->
