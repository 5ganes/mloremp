<?php
if(!isset($_POST['crop'])){
	header("Location: programlogin.php");
	exit();
}
include("clientobjects.php");
$crop = $_POST['crop'];
$sql = mysql_query("SELECT id FROM crop WHERE name='$crop'");
if(mysql_num_rows($sql)<1)
{
	echo "[ select a crop ]";	
}
else
{
	echo "bb";	
}
?>