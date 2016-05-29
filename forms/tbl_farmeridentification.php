<?
	session_start();
	if(!isset($_SESSION['userId']))
	{
		header("Location: ../programlogin.php");
		exit();
	}
?>
<tr>
    <td><strong class="fronttitle">कृषकको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="farmerName" class="text" value="<?=$farmerName;?>" required /></p>
        <p class="error" id="farmerName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">ठेगाना</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:42%">
        	<div>गा.वि.स./न. पा.</div>
            <div>
            	<p><input type="text" name="addressVdcMunicipality" class="text" value="<?=$addressVdcMunicipality;?>" required /></p>
          		<p class="error" id="addressVdcMunicipality"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:22%;">
        	<div>वडा नं.</div>
            <div>
            	<p><input type="text" name="addressWardNumber" class="number" value="<?=$addressWardNumber;?>" required /></p>
          		<p class="error" id="addressWardNumber"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कृषकको उमेर</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft inputright" style="width:14%; margin-left: 0">
    		<p><input type="text" name="farmerAge" class="number" value="<?=$farmerAge;?>" required /></p>
        	<p class="error" id="farmerAge"></p>
    	</div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">जात/जाती</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft inputright" style="width:26%; margin-left: 0">
    		<select name="farmerCaste" class="text">
			<?
            $caste=$program->getCaste();
            while($casteGet=$conn->fetchArray($caste))
            {?>
                <option value="<?=$casteGet['name'];?>" <? if($casteGet['name']==$farmerCaste){ echo 'selected="selected"';}?>>
                    <?=$casteGet['name'];?>
                </option>  
            <? }
            ?>
     	</select>
    	</div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">प्राप्त गरेको आइडीको किसिम</strong> :</td>
    <td >
    	<select name="farmerIdType" class="text">
			<?
            $unit=$groups->getUnitByCategory("कृषक आइडी");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$farmerIdType){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
     	</select>
 	</td>
</tr>
<tr><td></td></tr>