<tr>
    <td><strong class="fronttitle">महिना</strong> :</td>
    <td>
    	<select name="month" class="text" style="width:110px;">
        	<?
			$unit=$groups->getUnitByCategory("Month");
			while($unitGet=$conn->fetchArray($unit))
			{?>
				<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$month){ echo 'selected="selected"';}?>>
					<?=$unitGet['name'];?>
				</option>
			<? }
			?>
        </select>
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
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बाली स्थिती</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:38%">
            <div>बाली लगाउने कार्य भैरहेको(%)</div>
            <div>
                <p><input type="text" name="cropWork" class="number" value="<?=$cropWork;?>" /></p>
                <p class="error" id="cropWork"></p>
            </div>
		</div>        
    	<div class="inputleft inputright" style="width:33%">
        	<div>बाली बढने अवस्था(%)</div>
            <div>
            	<p><input type="text" name="cropGrowth" class="number" value="<?=$cropGrowth;?>" required /></p>
          		<p class="error" id="cropGrowth"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:38%; margin-left:0">
        	<div>बालीको फूल लाग्ने अवस्था(%)</div>
            <div>
            	<p><input type="text" name="cropMaturity" class="number" value="<?=$cropMaturity;?>" required /></p>
           		<p class="error" id="cropMaturity"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        
        <div class="inputleft inputright" style="width:33%">
        	<div>बाली कटानी भैरहेको(%)</div>
            <div>
            	<p><input type="text" name="cropHarvest" class="number" value="<?=$cropHarvest;?>" required /></p>
           		<p class="error" id="cropHarvest"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">दैवि प्रकोपको असर</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:38%">
            <div>दैवि प्रकोपको किसिम</div>
            <div style="height:19px">
                <select name="affectedUnit" class="text" style="width:100px; height:20px">
                	<?
					$unit=$groups->getUnitByCategory("Disaster Type");
					while($unitGet=$conn->fetchArray($unit))
					{?>
						<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$affectedUnit){ echo 'selected="selected"';}?>>
							<?=$unitGet['name'];?>
						</option>
					<? }
					?>
                </select>
            </div>
		</div>        
    	<div class="inputleft inputright" style="width:33%">
        	<div>प्रभावित क्षेत्रफल(%)</div>
            <div>
            	<p><input type="text" name="affectedArea" class="number" value="<?=$affectedArea;?>" required /></p>
          		<p class="error" id="affectedArea"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:38%; margin-left:0">
        	<div>प्रभावित परिवार संख्या</div>
            <div>
            	<p><input type="text" name="affectFamilyNo" class="number" value="<?=$affectFamilyNo;?>" required /></p>
           		<p class="error" id="affectFamilyNo"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        
        <div class="inputleft inputright" style="width:33%">
        	<div>उत्पादनमा क्षती(मे.टन)</div>
            <div>
            	<p><input type="text" name="productionLoss" class="number" value="<?=$productionLoss;?>" required /></p>
           		<p class="error" id="productionLoss"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बर्षा स्थिती</strong> :</td>
    <td>
    	<select name="rainCondition" class="text" style="width:110px;">
        	<?
			$unit=$groups->getUnitByCategory("Rain/Temperature");
			while($unitGet=$conn->fetchArray($unit))
			{?>
				<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$rainCondition){ echo 'selected="selected"';}?>>
					<?=$unitGet['name'];?>
				</option>
			<? }
			?>
        </select>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">तापक्रम</strong> :</td>
    <td>
    	<select name="temperature" class="text" style="width:110px;">
        	<?
			$unit=$groups->getUnitByCategory("Rain/Temperature");
			while($unitGet=$conn->fetchArray($unit))
			{?>
				<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$temperature){ echo 'selected="selected"';}?>>
					<?=$unitGet['name'];?>
				</option>
			<? }
			?>
        </select>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">रासायनिक मलको आपुर्ति</strong> :</td>
    <td>
    	<select name="fertilizerSupplied" class="text" style="width:110px;">
        	<?
			$unit=$groups->getUnitByCategory("Fertilizer Supply");
			while($unitGet=$conn->fetchArray($unit))
			{?>
				<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$fertilizerSupplied){ echo 'selected="selected"';}?>>
					<?=$unitGet['name'];?>
				</option>
			<? }
			?>
        </select>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बाली लगाउन समाप्त भएको</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
    		<div>एकाई</div>
            <div>
            	<select name="farmingEndedAreaUnit" class="text" style="width:110px;">
				<?
                $unit=$groups->getUnitByCategory("Area Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$farmingEndedAreaUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            </div>
        </div>
        <div class="inputleft inputright" style="width:28%">
        	<div>कुल क्षेत्रफल</div>
        	<div>
            	<p><input type="text" name="farmingEndedArea" class="number" value="<?=$farmingEndedArea;?>" required /></p>
        		<p class="error" id="farmingEndedArea"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">फूलफुल्ने अवस्था भए आशातित र कटानी भई सकेको भए वास्तविक</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
    		<div>एकाई</div>
            <div>
            	<select name="cutProductionUnit" class="text" style="width:110px;">
				<?
                $unit=$groups->getUnitByCategory("Price Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$cutProductionUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            </div>
        </div>
        <div class="inputleft inputright" style="width:28%">
        	<div>उत्पादन</div>
        	<div>
            	<p><input type="text" name="cutProduction" class="number" value="<?=$cutProduction;?>" required /></p>
        		<p class="error" id="cutProduction"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">गतबर्षको दाजोमा क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
    		<div>एकाई</div>
            <div>
            	<select name="lowHighAreaUnit" class="text" style="width:110px;">
				<?
                $unit=$groups->getUnitByCategory("Low/High");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$lowHighAreaUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            </div>
        </div>
        <div class="inputleft inputright" style="width:28%">
        	<div>क्षेत्रफल(Hec)</div>
        	<div>
            	<p><input type="text" name="lowHighArea" class="number" value="<?=$lowHighArea;?>" required /></p>
        		<p class="error" id="lowHighArea"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">गतबर्षको दाजोमा उत्पादन</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
    		<div>एकाई</div>
            <div>
            	<select name="lowHighProductionUnit" class="text" style="width:110px;">
				<?
                $unit=$groups->getUnitByCategory("Low/High");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$lowHighProductionUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            </div>
        </div>
        <div class="inputleft inputright" style="width:28%">
        	<div>उत्पादन(Ton)</div>
        	<div>
            	<p><input type="text" name="lowHighProduction" class="number" value="<?=$lowHighProduction;?>" required /></p>
        		<p class="error" id="lowHighProduction"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कैफियत :</strong></td>
    <td>
    	<textarea name="remarks" rows="1" style="padding:3px 4px" cols="44"><?=$remarks;?></textarea>
    </td>
</tr>