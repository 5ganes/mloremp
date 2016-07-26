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
    <td><strong class="fronttitle">पोखरीको प्रकार</strong> :<span class="asterisk">*</span></td>
    <td>
        <div class="inputleft inputright" style="width:14%; margin-left:0">
            <select name="lakeType" class="text" style="width:150px; height:20px;" required>
            <?
            $unit=$groups->getUnitByCategory("पोखरीको प्रकार");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$lakeType){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
            </select>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">पोखरी संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft inputright" style="width:14%;">
    		<p><input type="text" name="lakeNumber" class="number" value="<?=$lakeNumber;?>" required /></p>
        	<p class="error" id="lakeNumber"></p>
    	</div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">जलासयको क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:27.7%">
            <div>एकाई</div>
            <div>
                <select name="areaUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Area Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$areaUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
		</div>        
    	<div class="inputleft inputright" style="width:22%">
        	<div>क्षेत्रफल</div>
            <div>
            	<p><input type="text" name="lakeArea" class="number" value="<?=$lakeArea;?>" required /></p>
          		<p class="error" id="lakeArea"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">गत बर्षको सरदर उत्पादन</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:27.7%">
            <div>एकाई</div>
            <div>
                <select name="productionUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Price Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$productionUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
		</div>        
    	<div class="inputleft inputright" style="width:22%">
        	<div>उत्पादन</div>
            <div>
            	<p><input type="text" name="production" class="number" value="<?=$production;?>" required /></p>
          		<p class="error" id="production"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>