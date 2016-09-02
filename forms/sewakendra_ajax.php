<?php
	require_once("../data/conn.php");
	$conn = new Dbconn();

	$id=$_GET['id'];
	$sql=mysql_query("select id,sewakendraName from sewakendra where trainingLevel='$id'");
	echo '<option value="">Select</option>';
	while($data=mysql_fetch_array($sql)){?>
		<option value="<?php echo $data['id'] ?>"><?php echo $data['sewakendraName'] ?></option>
	<? }
?>