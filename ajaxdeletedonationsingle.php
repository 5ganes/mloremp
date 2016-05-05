<?
	include('clientobjectsProgram.php');
	$id=$_POST['id'];
	$donationId=mysql_fetch_array(mysql_query("select parentId from donationlist where id='$id'"));
	$subsidiId=$donationId['parentId'];
	$dn=mysql_fetch_array(mysql_query("select donationNumber from tbl_subsidi where id='$subsidiId'"));
	$dn=$dn['donationNumber']-1;
	mysql_query("update tbl_subsidi set donationNumber='$dn' where id='$subsidiId'");
	mysql_query("delete from donationlist where id='$id'");
?>