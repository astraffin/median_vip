<?php include('inc/head.php');?>
<?php confirm_session(); ?>

<?php include('inc/dbconnect.php');?>
<!--- END HEAD -->
<!--- NAVBAR -->
<?php include('inc/navbar.php');?>
<!--- END NAVBAR -->
<!--- MAIN BODY -->
<?php
error_reporting(E_ERROR);
//Set Variables
	$dtitle = $_POST['dtitle'];
	$_SESSION['dtitle'] = mysql_escape_string($_POST['dtitle']);
	$ddesc = $_POST['ddesc'];
	$_SESSION['ddesc'] = mysql_escape_string($_POST['ddesc']);
	$oprice = $_POST['oprice'];
	$_SESSION['oprice'] = mysql_escape_string($_POST['oprice']);
	$vprice = $_POST['vprice'];
	$_SESSION['vprice'] = mysql_escape_string($_POST['vprice']);
	$sdate = $_POST['sdate'];
	$_SESSION['sdate'] = mysql_escape_string($_POST['sdate']);
	$filedir = "files/";
	$subdir = $_SESSION['user_id'] . "/";
	mkdir("files/" . $subdir, 0777);
	$ext = findexts($_FILES['uploadedfile']['name']);
	$tpr = $_SERVER['REQUEST_TIME'];
	$filename = $_SESSION['user_id'] . "_" . $tpr . "." . $ext;

//Upload file and save in files dir
$filedir = $filedir . $subdir;
$filedir = $filedir . $filename;

//Sloppy img check, server does not save file if extension does not match but the file still goes to temp dir I think
if ((($ext == "jpg") || ($ext == "jpeg") || ($ext == "png") || ($ext == "gif")) && (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $filedir))) {
	$imgloc = $filedir;
} else {
	echo "There was an error uploading the file, please try again";
	echo "<br><br><br><br>";
	echo "<button class=\"btn btn-large btn-block btn-primary span2\" onclick=\"history.go(-1);\">";
	echo "<i class=\"icon-arrow-left icon-white\"></i> Go Back</button>";
	die;
}

//Display Preview

echo "<div class=\"alert\"><strong>Heads up! This is just a preview. Click the button below to \"Submit this deal\" for approval.</strong></div>";
echo "<div class=\"span4\">";
echo "<a href=\"" . $imgloc . "\"><img src=\"" . $imgloc . "\" class=\"img-polaroid\" width=\"400px\"></a>";
echo "</div>";
echo "<div class=\"span7\">";
	
echo "<h1>" . htmlspecialchars($dtitle) . "</h1>";
	
echo "<h3>Store Name</h3>";
echo "<h5>54 Store address<br>Store address, MA 02134</h5>";
	
	
echo "</div>";
echo "<div class=\"span10\">";
echo "<br><br>";
echo "<p>" .  htmlspecialchars($ddesc) . "</p>";

echo "</div>";
	


?>
<!--Selections -->
<div class="span10">
<br><br>
<hr>
<strong>Please select the the categories related to your deal.</strong><br><em>(Select as many as you like)</em>
<hr>
			<?php
			echo "<form action=\"index.php?p=dset\" method=\"post\">";
		//Displays categories		
				$query = mysql_query("SELECT * FROM categories");
					
			
				while ($category = mysql_fetch_array($query)){
				
				if (isset($category)){
					$cat_id = $category['cat_id'];
					$cat_name = $category['cat_name'];
					$parent_cat = $category['parent_cat'];
					
										
					echo "<label class=\"checkbox\">";
					echo "<input type=\"checkbox\"";
					echo "name=\"category" . $cat_id . "\" ";
					echo "value=" . $cat_id . ">";
					echo $cat_name . "</label> <br>";
					
					
					
					}
				}
?>
</div>
<?php
echo "<div class=\"span6\">";
echo "<br><br>";
echo "<button class=\"btn btn-large btn-block btn-primary span2\" onclick=\"history.go(-1);\">";
echo "<i class=\"icon-arrow-left icon-white\"></i> Go Back</button>";

echo "</div>";

echo "<div class=\"span4\">";
echo "<br><br>";

echo "<input type=\"submit\" value=\"Submit this Deal\" class=\"btn btn-large btn-block btn-primary\">";
//Allocate variables to post global
$_SESSION['imgloc'] = mysql_escape_string($imgloc);
//Testing without


echo "</div>";
?>
<!--- END MAIN -->
<!--- FOOTER -->
<?php include('inc/footer.php');?>
<!--- END FOOTER -->
