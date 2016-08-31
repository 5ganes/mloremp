<tr>
    <td><strong class="fronttitle">सेवा केन्द्रको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="sewaKendra" class="text" value="<?=$sewaKendra;?>" required /></p>
        <p class="error" id="sewaKendra"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">वाली </strong> :<span class="asterisk">*</span></td>
	<td>
        <div class="inputleft">
        	<div>नाम</div>
            <div>
        		<div class="input_container">
            		<p><input name="cropName" class="text" type="text" id="cropName" placeholder="type a crop" onkeyup="searchCrop()" 
                    value="<?=$cropName?>"></p>
            		<ul id="cropNameList"></ul>
        		</div>
        	</div>
            <div style="clear:both"></div>
        </div>
        <input type="hidden" name="cropCode" value="<?=$cropCode;?>" id="cropCode" />
        <div class="inputleft inputright">
        	<p id="cropImage">
			<? if(isset($_GET['id']))
			{?>
				<? $img=$conn->fetchArray(mysql_query("select image from crop where (name='$cropName' or namenp='$cropName') and code='$cropCode'"));
            	if(file_exists(CMS_GROUPS_DIR.$img['image']))
				{?>
                	<img src="<?=CMS_GROUPS_DIR.$img['image'];?>" style="height:50px;margin-top:-35px;width:70px;" />
      			<? }
			}?>
            </p>
            <p class="error" style="display:none" id="cropNameError"></p>
        </div>
        <div style="clear:both"></div>
  	</td>
</tr>
<tr><td</td></tr>

<tr>
    <td><strong class="fronttitle">कृषकको नाम थर</strong> :<span class="asterisk">*</span></td>
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
    <td><strong class="fronttitle">जग्गाको किसिम</strong> :</td>
    <td >
    	<select name="landType" class="text">
			<?
            $unit=$groups->getUnitByCategory("Land Type");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$landType){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
     	</select>
 	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">वीउको किसिम</strong> :</td>
    <td>
    	<select name="seedType" class="text">
			<?
            $unit=$groups->getUnitByCategory("Seed Type");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$seedType){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
     	</select>
 	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">वाली कटानी</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:27.7%">
            <div>क्षेत्रफल</div>
            <div>
                <select name="productionUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("वाली कटानी");
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
    	<div class="inputleft inputright" style="width:26%">
        	<div>उत्पादन(kg)</div>
            <div>
            	<p><input type="text" name="cropCuttingProduction" class="number" value="<?=$cropCuttingProduction;?>" required /></p>
          		<p class="error" id="cropCuttingProduction"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:26%">
        	<div>चिस्यान(%)</div>
            <div>
            	<p><input type="text" name="moisturePercent" class="number" value="<?=$moisturePercent;?>" required /></p>
          		<p class="error" id="moisturePercent"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">उत्पादकत्व :</strong></td>
    <td>
        <input type="text" name="productivity" class="number" value="<?=$productivity;?>" required />
    </td>
</tr>

<tr>
    <td><strong class="fronttitle">कैफियत :</strong></td>
    <td>
    	<textarea name="remarks" rows="1" style="padding:3px 4px" cols="45"><?=$remarks;?></textarea>
    </td>
</tr>