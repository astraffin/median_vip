<!--- NAVBAR -->
<?php error_reporting(E_ERROR); ?>

<?php $page = NULL ?>

<?php if (isset($_GET['p'])) {$page = $_GET['p'];} ?>

<!-- USER SESSION TEST -->
<?php
if (isset($_SESSION['user_id'])){
	$user_session = TRUE;
} else {
	$user_session = FALSE;
}
$_SESSION['is_dealer'] = $_SESSION['is_dealer'];
if ($_SESSION['is_dealer'] == 1){$isdealer = 1;} else {$isdealer = 0; }

?>
<!-- END USER SESSION TEST-->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php">Median Mag: VIP Club</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li <?php if (!$page){echo "class=\"active\"";}?>><a href="index.php">Home</a></li>
                            <li <?php if (!$user_session){echo "class=\"nav-hidden\"";}?><?php if ($page == "deals"){echo " class=\"active\"";}?>><a href="index.php?p=deals">Deals</a></li>
							<li <?php if (!$user_session){echo " class=\"nav-hidden\"";}?> class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <!-- Commented out User Dashboard. Use? -->
									<!-- <li <?php /*if ($page == "udash"){echo "class=\"active\"";} */ ?>><a href="index.php?p=udash">Dashboard</a></li> -->
									<li <?php if ($page == "uset"){echo "class=\"active\"";}?>><a href="index.php?p=uset">Settings</a></li>
									<li <?php if ($page == "upro"){echo "class=\"active\"";}?>><a href="index.php?p=upro">Profile</a></li>
                                    <li <?php if ($page == "uhist"){echo "class=\"active\"";}?>><a href="index.php?p=uhist">History</a></li>
                                    <li class="divider"></li>
									<li <?php if ($isdealer != 0){echo "class=\"nav-hidden\"";} if ($page == "dreg"){echo "class=\"active\"";}?>><a href="index.php?p=dreg">Become a Dealer</a></li>
                                    <li <?php if ($isdealer != 1){echo "class=\"nav-hidden\"";}?> class="nav-header">Dealer Tools</li>
                                    <li <?php if ($isdealer != 1){echo "class=\"nav-hidden\"";} if ($page == "dpro"){echo "class=\"active\"";}?>><a href="index.php?p=dpro">Dealer Profile</a></li>
                                    <li <?php if ($isdealer != 1){echo "class=\"nav-hidden\"";} if ($page == "ddash"){echo "class=\"active\"";}?>><a href="index.php?p=ddash">Dealer Dashboard</a></li>
									<li <?php if ($isdealer != 1){echo "class=\"nav-hidden\"";} if ($page == "mndls"){echo "class=\"active\"";}?>><a href="index.php?p=mndls">Manage Deals</a></li>
									<li <?php if ($isdealer != 1){echo "class=\"nav-hidden\"";} if ($page == "new"){echo "class=\"active\"";}?>><a href="index.php?p=new">New Deal</a></li>
									
								</ul>
                            </li>
                            <li <?php if ($page == "about"){echo "class=\"active\"";}?>><a href="index.php?p=about">About</a></li>
				
							<?php if(!$user_session){echo "<li><a href=\"index.php?p=ureg\" data-toggle=\"modal\">Register</a></li>";}?>
							
<!-- Logout Confirmation -->
<?php if(isset($_GET['lo']) && $_GET['lo'] == 1){echo "<li class=\"nav-notice\"><span class=\"text-error\"></span><span class=\"responsive-hide text-error\">You have successfully logged out!</span><span class=\"text-error\"></span></li>";} ?>
<!-- End logout confirmation -->
							
                        </ul>

                        <?php if(!$user_session){echo "<form action=\"login.php\" method=\"post\" class=\"navbar-form pull-right\">
                            <input class=\"span2\" type=\"text\" name=\"username\" placeholder=\"Username\">
                            <input class=\"span2\" type=\"password\" name=\"password\" placeholder=\"Password\">
                            <button type=\"submit\" class=\"btn\">Sign in</button></form>";}else{ 
							echo "<ul class=\"nav nav-welcome\"><span class=\"nav-greeting\">Hi, " . $_SESSION['fname'] . "</span></li></ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"logout.php\" class=\"btn btn-mini btn-inverse\"> Sign out</a>";}?>
                        
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
<!-- END NAVBAR -->

<!-- MAIN CONTAINER START -->
<div class="container">

