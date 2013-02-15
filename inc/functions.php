<?php

function confirm_session(){
if (!isset($_SESSION['user_id'])){
	echo "<h4 class=\"text-error\">Access denied:</h4><h4>Please login or register to access this page.</h4><br>";
	require_once('lform.php');
	die;
	}
}

function findexts ($filename)
{
$filename = strtolower($filename);
$exts = split("[/\\.]", $filename);
$n = count($exts)-1;
$exts = $exts[$n];
return $exts;
	
}

function truncate_string($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

function verify_image($filename)
{
	
}

?>