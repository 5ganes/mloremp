<?
if(!isset($_POST['dn'])){
	header("Location: programlogin.php");
	exit();
}
include('clientobjectsProgram.php'); $dn=$_POST['dn']; $dUnitAlert=$_POST['dUnitAlert'];?>
<ul>
    <li><input type="text" name="name[]" class="text" style="width:135px" required /></li>
    <?
	if($dUnitAlert==56)
	{?>
		<li><input type="text" name="cast[]" class="text" style="width:70px" required /></li>
		<li>
			<select name="gender[]" class="text" id="gender" style="width:50px;">
				<option value="">लिगं</option>
				<?
				$unit=$groups->getUnitByCategory("लिगं");
				while($unitGet=$conn->fetchArray($unit))
				{?>
					<option value="<?=$unitGet['id'];?>">
						<?=$unitGet['name'];?>
					</option>
				<? }
				?>
			</select>
		</li>
        <li><input type="text" name="age[]" class="text" style="width:40px" required /></li>
	<? }?>
    <li><input type="text" name="addressVdcMunicipality[]" class="text" style="width:100px" required /></li>
    <li><input type="text" name="addressWardNumber[]" class="text" style="width:56px" required /></li>
    <li><input type="text" name="object[]" class="text" style="width:100px" required /></li>
    <li style="margin-right:0"><input type="text" name="amount[]" class="text" style="width:60px" required /></li>
    <li style="margin-right:0"><p class="delete" onclick="deleteRowDonation('delete<?=$dn-1?>');">delete</p></li>
    <div style="clear:both"></div>
</ul>