<?php    ini_set('display_errors', 'Off');
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
$con = new mysqli("localhost","eduincst_aparna_paints","EduInCS@tech#2218","eduincst_aparna_paints");

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
// else{
//   echo "done";
// }
?>
