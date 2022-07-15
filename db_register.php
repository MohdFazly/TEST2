<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';


$sql="INSERT INTO register13 (first_name,last_name,email,address,hpno,password)
values ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[address]','$_POST[hpno]','$_POST[password]')";
	if (!mysqli_query($conn,$sql)){
		die ('Error: ' .mysqli_error($conn));
	}
echo "<script
type='text/jscript'>alert('New Account has been registered!')</script>";
header('refresh:1 url=register.php');

?>
