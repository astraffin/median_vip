<?php include('inc/dbconnect.php');?>
<?php require_once('inc/functions.php');?>
<?php
require 'classes/class.phpmailer.php';
$deal_id = 0;
$alert_result = mysql_query("SELECT * FROM users WHERE alerts = 1"); // Pull all users that want emails
while ($contact_array = mysql_fetch_array($alert_result)){           // For this user, generate an email

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mandrillapp.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'alex.straffin@gmail.com';          // SMTP username
$mail->Password = '_b__OU-oNODIqiyDqmz1Ug';           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'no-reply@medianvip.com';
$mail->FromName = 'Median VIP';
$mail->AddAddress($contact_array['email']);           // Add a recipient


$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = $contact_array['fname'] . ", " . 'Here are your latest deals!';

$cat_result = mysql_query("SELECT * FROM user2cat WHERE user_id = " . $contact_array['user_id']); // For this user pull all associated category_IDs


//$mail->Body    = 'The categories that you subscribe to are: ';
while ($content_array = mysql_fetch_array($cat_result)){          // For this category, show the next deal
	
//$mail->Body   .= $content_array['cat_id'] . ", ";

//  PROBLEM
$deal_result = mysql_query("SELECT DISTINCT deal_id FROM deal2cat WHERE cat_id = " . $content_array['cat_id']); // For this category pull all associated deal_IDs
// /PROBLEM

while ($deal_array = mysql_fetch_array($deal_result)){             // For this deal proceed to next step
//-------------------------------------------------------------------------------------------------------------------------------------------

//$imgpath = path to image for deal populated from database
//$dealtext_short = deal_text from database cut to 186char.
$deal_data = mysql_query("SELECT * FROM deals WHERE deal_id = " . $deal_array['deal_id']);
//removed from sql query while start and end dates are up in the air
//WHERE DATE(deal_end) >= DATE(NOW())
	
while ($deal = mysql_fetch_array($deal_data)){
	
	if (isset($deal) AND $deal_id != $deal['deal_id']){
		$deal_id = $deal['deal_id'];
		$deal_name = $deal['deal_name'];
		$img_path = $deal['deal_img'];
		$deal_text = $deal['deal_text'];
		$deal_text = truncate_string($deal_text, 186);
		$deal_oprice = $deal['deal_oprice'];
		$deal_vprice = $deal['deal_vprice'];
		$deal_sprice = $deal_oprice - $deal_vprice;
		
		
		
		

$mail->Body    .=  "<div class=\"span2\"><div class=\"deal-thumb\"><img src=\"";
$mail->Body    .=  $website_url . $img_path;                         //Edit for Localhosting files (PLEASE REMOVE)
$mail->Body    .=  "\" class=\"img-polaroid\"></div></div><div class=\"span6\">";
$mail->Body    .=  "<h3>" . htmlspecialchars($deal_name) . "</h3>";
$mail->Body    .=  "<p>" . htmlspecialchars($deal_text) . "</p></div>";
$mail->Body    .=  "<div class=\"span2\">";
$mail->Body    .=  "<br>";
$mail->Body    .=  "<span class=\"label label-success\"><i class=\"icon-tag icon-white\"></i><strong>SAVE " . $deal_sprice . "!</strong></span>";
$mail->Body    .=  "<br><br>";
$mail->Body    .=  "<a href=\"" . $website_url . "index.php?p=detail&DID=" . $deal_id . "\" ";
$mail->Body    .=  "class=\"btn btn-primary\">Details</a></div>";
$mail->Body    .=  "<div class=\"span10\"><hr></div>";
		}
	}	
}	
//------------------------------------------------------------------------------------------------------------------------------------------
}
}

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';