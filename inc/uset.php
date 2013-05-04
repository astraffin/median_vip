<!-- DB CONNECT -->
<?php include('inc/dbconnect.php');?>
<!-- END CONNECT-->
<!-- MAIN BODY -->
<?php confirm_session(); ?>
<?php error_reporting(E_ERROR); ?>
<?php
//post results
if ($_POST != NULL){
	foreach ($_POST as $key=>$value) {
		if (strpos($key, 'category') !== false) {
			$cat_new[] = $value;
		}
	}
	mysql_query("DELETE FROM user2cat WHERE user_id = " . $_SESSION['user_id']);
	foreach ($cat_new as $value) {
	mysql_query("INSERT INTO user2cat (user_id, cat_id) values (" . $_SESSION['user_id'] . ", " . $value . ")");
	}
	mysql_query("UPDATE users SET is_setup = 1 WHERE user_id = " . $_SESSION['user_id']);
	
	//Make user is_setup = true
	$_SESSION['is_setup'] = 1;
	
	//send to deals page
	echo "<script type=\"text/javascript\">
	<!--
	window.location = \"http://localhost/median_vip/index.php?p=deals\"
	//-->
	</script>";
}

//debug: created array of new chosen categories
//Print_r($cat_new);
//echo $_SESSION['user_id'];

//CATEGORY ASSOCIATIONS

	//pulls categories associated with user from DB
		$user2cat_query = mysql_query("SELECT cat_id FROM user2cat WHERE user_id = " . $_SESSION['user_id']);
	//defines array bucket
		$cat_array = array();
	//populates array bucket with user's associated category IDs
		while ($user2cat_array = mysql_fetch_array($user2cat_query)){
			$cat_array[] = $user2cat_array['cat_id'];
		}
			//debug: verify arrays are associating correctly
			//Print_r($cat_array);
		
//END CATEGORY ASSOCIATIONS
//CARS

//END CARS
//INCOME
if ($_POST != NULL){
	$current_income = $_POST['income'];
} else {
$query = mysql_query("SELECT income FROM users WHERE user_id = " . $_SESSION['user_id']);
$current_income = mysql_fetch_array($query);
$current_income = $current_income['income'];
}
$income = $_POST['income'];
mysql_query("UPDATE users SET income = " . $income . " WHERE user_id = " . $_SESSION['user_id']);
//END INCOME

?>
<h2>User Settings</h2>

			
			<form action="index.php?p=uset" method="post">
			<hr>
			<strong>What types of deals are you interested in?</strong><br><em>(Select as many as you like)</em>
			<hr>
			<?php
				
				$query = mysql_query("SELECT * FROM categories");
					
			
				while ($category = mysql_fetch_array($query)){
				
				if (isset($category)){
					$cat_id = $category['cat_id'];
					$cat_name = $category['cat_name'];
					$parent_cat = $category['parent_cat'];
					
										
					echo "<label class=\"checkbox\">";
					echo "<input type=\"checkbox\"";
				//if category is associated with user, show as checked
					if (in_array($cat_id, $cat_array)){
						echo "checked=\"checked\"";
						
						}
					echo "name=\"category" . $cat_id . "\" ";
					echo "value=" . $cat_id . ">";
					echo $cat_name . "</label> <br>";
					
					
					
					}
				}
			
			?>
			<hr>
			Please select your vehicle(s):
			<br><br>
			
			<select class="input-small">
				<option>Year</option>
				<option>Year</option>
				<option>Year</option>
				<option>Year</option>
			</select>
			<select class="input-small">
				<option>Make</option>
				<option>Make</option>
				<option>Make</option>
				<option>Make</option>
			</select>
			<select class="input-small">
				<option>Model</option>
				<option>Model</option>
				<option>Model</option>
				<option>Model</option>
			</select>
			<select class="input-small">
				<option>Trim</option>
				<option>Trim</option>
				<option>Trim</option>
				<option>Trim</option>
			</select>
			<br><br>
			
<!-- Add Vehicle Div -->
			<div id="addVehicle" style="display:none">
			<select class="input-small">
				<option>Year</option>
				<option>Year</option>
				<option>Year</option>
				<option>Year</option>
			</select>
			<select class="input-small">
				<option>Make</option>
				<option>Make</option>
				<option>Make</option>
				<option>Make</option>
			</select>
			<select class="input-small">
				<option>Model</option>
				<option>Model</option>
				<option>Model</option>
				<option>Model</option>
			</select>
			<select class="input-small">
				<option>Trim</option>
				<option>Trim</option>
				<option>Trim</option>
				<option>Trim</option>
			</select>
			<br><br>
			</div>
<!-- Add vehicle div end-->

			<button class="btn" type="button" onclick="toggle_visibility('addVehicle');">Add a vehicle</button>
			
			<hr>
			Please select your income level:
			<br><br>
			<select name="income"><span class="text-error reg-alerts">
				<option value="1"<?php if ($current_income == 1){echo "selected=\"selected\"";}?>>0-25,000</option>
				<option value="2"<?php if ($current_income == 2){echo "selected=\"selected\"";}?>>25,001-45,000</option>
				<option value="3" <?php if ($current_income == 3){echo "selected=\"selected\"";}?>>45,001-75,000</option>
				<option value="4"<?php if ($current_income == 4){echo "selected=\"selected\"";}?>>75,001-UP</option>
			</select>

			<hr>
			<button type="submit" class="btn btn-primary" name="continue">Update &nbsp;<i class="icon-arrow-right icon-white"></i></button>
			
			</form>
			

<!-- END MAIN -->