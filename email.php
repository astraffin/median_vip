<?php include('inc/dbconnect.php');?>
<?php

$result = mysql_query("SELECT * FROM users WHERE alerts = 1");
while ($contact_array = mysql_fetch_array($result)){

// compose message
$message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.";
$message .= " Nam iaculis pede ac quam. Etiam placerat suscipit nulla.";
$message .= " Maecenas id mauris eget tortor facilisis egestas.";
$message .= " Praesent ac augue sed enim aliquam auctor. Ut dignissim ultricies est.";
$message .= " Pellentesque convallis tempor tortor. Nullam nec purus.";

// make sure each line doesn't exceed 70 characters
$message = wordwrap($message, 70);

// send email
//mail($contact_array['email'], 'Email Test', $message);
echo $contact_array['email'];
echo "<br>";
;}

?>