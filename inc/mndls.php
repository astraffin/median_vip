<!--- MAIN BODY -->
<?php include('inc/dbconnect.php');?>
<?php confirm_session(); ?>
<h2>Manage Deals</h2>
<br>
<h4>Active Deals</h4>
<?php 
$dealer_id = $_SESSION['dealer_id'];

?>
<?php
$dealer_id = $_SESSION['dealer_id'];
//$imgpath = path to image for deal populated from database
//$dealtext_short = deal_text from database cut to 140char.
$deal_data = mysql_query("SELECT * FROM deals WHERE dealer_id = '" . $dealer_id . "' and deal_active = 1");
//removed from sql query while start and end dates are up in the air
//WHERE DATE(deal_end) >= DATE(NOW())

while ($deal = mysql_fetch_array($deal_data)){
		
	if (isset($deal)){
		$deal_id = $deal['deal_id'];
		$deal_name = $deal['deal_name'];
		$img_path = $deal['deal_img'];
		$deal_text = $deal['deal_text'];
		$deal_text = truncate_string($deal_text, 186);
		$deal_oprice = $deal['deal_oprice'];
		$deal_vprice = $deal['deal_vprice'];
		$deal_sprice = $deal_oprice - $deal_vprice;
		
		
		
echo "<div class=\"span10\"><hr></div>";
echo "<div class=\"span2\"><div class=\"deal-thumb\"><img src=\"";
echo $img_path;
echo "\" class=\"img-polaroid\"></div></div><div class=\"span6\">";
echo "<h3>" . htmlspecialchars($deal_name) . "</h3>";
echo "<p>" . htmlspecialchars($deal_text) . "</p></div>";
echo "<div class=\"span2\">";
echo "<br>";
//echo "<span class=\"label label-success\"><i class=\"icon-tag icon-white\"></i><strong>SAVE " . $deal_sprice . "!</strong></span>";
echo "<br><br>";
echo "<a href=\"index.php?p=detail&DID=" . $deal_id . "\" ";
echo "class=\"btn btn-primary\">Edit</a>";

echo " ";
echo "<a href=\"index.php?p=detail&DID=" . $deal_id . "\" ";
echo "class=\"btn btn-danger\">Deactivate</a>";
echo "<br>";
echo "Deals Sent: 4950";
echo "</div>";
	}	
}	

?>
<div class="span10"><hr></div>
<br>
</div>
<div class="container">
<h4>Inactive Deals</h4>
<?php
$deal_data = mysql_query("SELECT * FROM deals WHERE dealer_id = '" . $dealer_id . "' and deal_active = 0");
//removed from sql query while start and end dates are up in the air
//WHERE DATE(deal_end) >= DATE(NOW())

while ($deal = mysql_fetch_array($deal_data)){
		
	if (isset($deal)){
		$deal_id = $deal['deal_id'];
		$deal_name = $deal['deal_name'];
		$img_path = $deal['deal_img'];
		$deal_text = $deal['deal_text'];
		$deal_text = truncate_string($deal_text, 186);
		$deal_oprice = $deal['deal_oprice'];
		$deal_vprice = $deal['deal_vprice'];
		$deal_sprice = $deal_oprice - $deal_vprice;
		
		
		
echo "<div class=\"span10\"><hr></div>";
echo "<div class=\"span2\"><div class=\"deal-thumb\"><img src=\"";
echo $img_path;
echo "\" class=\"img-polaroid\"></div></div><div class=\"span6\">";
echo "<h3>" . htmlspecialchars($deal_name) . "</h3>";
echo "<p>" . htmlspecialchars($deal_text) . "</p></div>";
echo "<div class=\"span2\">";
echo "<br>";
//echo "<span class=\"label label-success\"><i class=\"icon-tag icon-white\"></i><strong>SAVE " . $deal_sprice . "!</strong></span>";
echo "<br><br>";
echo "<a href=\"index.php?p=detail&DID=" . $deal_id . "\" ";
echo "class=\"btn btn-primary\">Edit</a>";
echo " ";
echo "<a href=\"index.php?p=detail&DID=" . $deal_id . "\" ";
echo "class=\"btn btn-success\">Activate</a>";
echo "<br>";
echo "Deals Sent: 4950";
echo "</div>";
	}	else {
	    echo "You have no inactive deals.";
	    
	}
}

?>
</div>

<!--- END MAIN -->