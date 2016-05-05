<?php
if(!isset($_POST['keyword'])){
	header("Location: programlogin.php");
	exit();
}
include("clientobjects.php");
//echo '<li>'.$_POST['keyword'].'</li>'; die();
$keyword = '%'.$_POST['keyword'].'%';
$sql = mysql_query("SELECT * FROM crop WHERE name LIKE '$keyword'");
while($cropGet=mysql_fetch_array($sql))
{
	// put in bold the written text
	$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $cropGet['name']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $cropGet['name']).'\''.','.'\''.$cropGet['code'].'\''.','.'\''.$cropGet['image'].'\''.')">'.$name.'</li>';
}
?>