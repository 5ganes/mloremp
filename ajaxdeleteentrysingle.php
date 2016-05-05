<?
	include('clientobjectsProgram.php');
	$id=$_POST['id'];
	$trainingId=mysql_fetch_array(mysql_query("select parentId from entrylist where id='$id'"));
	$trainingId=$trainingId['parentId'];
	$pn=mysql_fetch_array(mysql_query("select participantNumber from tbl_training where id='$trainingId'"));
	$pn=$pn['participantNumber']-1;
	mysql_query("update tbl_training set participantNumber='$pn' where id='$trainingId'");
	mysql_query("delete from entrylist where id='$id'");
?>