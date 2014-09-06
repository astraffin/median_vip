<!-- MAIN BODY -->
<?php confirm_session(); ?>
<?php include('inc/dbconnect.php');?>
<h2>User Profile</h2>
<hr>
<?php

//MySQL Query
$query = mysql_query("SELECT * FROM users WHERE user_id = '" . $_SESSION[user_id] . "'");
if (!$query){ echo "MySQL Query Failed: " . mysql_error();}
$query_array = mysql_fetch_array($query);

$fname = $query_array['fname'];
$lname = $query_array['lname'];
$address1 = $query_array['address1'];
$address2 = $query_array['address2'];
$city = $query_array['city'];
$state = $query_array['state'];
$zip = $query_array['zip'];
$email = $query_array['email'];
$birthdate = $query_array['birthdate'];
$startdate = $query_array['startdate'];


echo "<div class=\"span2\"><div><img src=\"";
echo ".\\files\\" . $_SESSION[user_id] . "\\profile\\" . $_SESSION[user_id] . ".png";
echo "\" class=\"img-polaroid\"></div></div>";
echo "<div class=\"span6\">";
echo "<h4>" . $fname . " ";
echo $lname . "<br></h4>";
echo $address1 . " ";
echo $address2 . "<br>";
echo $city . ", ";
echo $state . " ";
echo $zip . "<br>";
echo $email . "<br>";
echo $birthdate . "<br>";
echo $startdate . "<br>";
echo "</div>";
?>
<!-- END MAIN -->
