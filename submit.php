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
	$filedir = "files/";
	$subdir = $_SESSION['user_id'] . "/";
	mkdir("files/" . $subdir, 0777);
	$ext = findexts($_FILES['uploadedfile']['name']);
	$tpr = $_SERVER['REQUEST_TIME'] + rand();
	$filename = $_SESSION['user_id'] . "_" . $tpr . "." . $ext;

//Upload file and save in files dir
$filedir = $filedir . $subdir;
$filedir = $filedir . $filename;


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $filedir)) {
	$imgloc = $filedir;
} else {
	echo "There was an error uploading the file, please try again";
}

//Display Preview

echo "<div class=\"alert\"><strong>Heads up! This is just a preview. Click the button below to \"Submit this deal\" for approval.</strong></div>";
echo "<div class=\"span4\">";
echo "<a href=\"" . $imgloc . "\"><img src=\"" . $imgloc . "\" class=\"img-polaroid\" width=\"400px\"></a>";
echo "</div>";
echo "<div class=\"span7\">";
	
echo "<h1>" . $dtitle . "</h1>";
	
echo "<h3>Store Name</h3>";
echo "<h5>54 Store address<br>Store address, MA 02134</h5>";
	
	
echo "</div>";
echo "<div class=\"span10\">";
echo "<br><br>";
echo "<p>" .  $ddesc . "</p>";

echo "</div>";
	
echo "<div class=\"span6\">";

echo "</div>";
echo "<div class=\"span4\">";
echo "<br><br>";

echo "<input type=\"button\" value=\"Submit this Deal\" class=\"btn btn-large btn-block btn-primary\" type=\"button\">";
	
echo "</div>";





?>
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
