<tr>
	<td><strong class="fronttitle">वाली </strong> :<span class="asterisk">*</span></td>
	<td>
        <div class="inputleft">
        	<div>नाम</div>
            <div>
        		<div class="input_container">
            		<p><input name="cropName" class="text" type="text" id="cropName" placeholder="type a crop" onkeyup="searchCrop()" 
                    value="<?=$cropName?>" required></p>
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
    <td><strong class="fronttitle"> क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
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
    	<div class="inputleft inputright">
        	<div>सिंचित</div>
            <div>
            	<p><input type="text" name="irrigatedArea" class="number" value="<?=$irrigatedArea;?>" required /></p>
          		<p class="error" id="irrigatedArea"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright">
        	<div>असिंचित</div>
            <div>
            	<input type="text" name="unirrigatedArea" class="number" value="<?=$unirrigatedArea;?>" required />
           		<p class="error" id="unirrigatedArea"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        
        <? if(isset($_GET['id']))
     	{?>
        	<!--<div class="inputleft inputright">
                <div>जम्मा :</div>
                <div style="float:left">&nbsp;[ <?=$totalArea;?> Hector ]</div>
                <div style="clear:both"></div>
            </div>-->
		<? }?>
        
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>
<tr>
    <td><strong class="fronttitle">उत्पादन</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
    		<div>एकाई</div>
            <div>
            	<select name="productionUnit" class="text" style="width:104px;">
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
        <div class="inputleft inputright">
        	<div>सिंचित</div>
        	<div>
            	<p><input type="text" name="irrigatedProduction" class="number" value="<?=$irrigatedProduction;?>" required /></p>
        		<p class="error" id="irrigatedProduction"></p>
  			</div>
        </div>
        <div class="inputleft inputright">
        	<div>असिंचित</div>
        	<div>
            	<p><input type="text" name="unirrigatedProduction" class="number" value="<?=$unirrigatedProduction;?>" required /></p>
        		<p class="error" id="unirrigatedProduction"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>
<tr>
	<td><strong class="fronttitle">कृषकतह मुल्य</strong> :</td>
	<td>
    	<div class="inputleft">
        	<div>एकाई</div>
            <div>
            	<select name="farmerUnit" class="number" style="width:104px; height:20px;">
              	<?
              	$unit=$groups->getUnitByCategory("Price Unit");
              	while($unitGet=$conn->fetchArray($unit))
              	{?>
                	<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$farmerUnit){ echo 'selected="selected"';}?>>
						<?=$unitGet['name'];?>
                   	</option>
              	<? }
              	?>
            	</select>
    		</div>
            <div style="clear:both"></div>
     	</div>
        <div class="inputleft inputright">
        	<div>मुल्य (Rs)</div>
            <div>
            	<p><input type="text" name="farmerPrice" class="number" value="<?=$farmerPrice;?>" required /></p>
          		<p class="error" id="farmerPrice"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
	</td>
</tr>
<tr><td></td></tr>
<tr>
	<td><strong class="fronttitle">बजार मुल्य</strong> :</td>
	<td>
    	<div class="inputleft">
        	<div>एकाई</div>
            <div>
            	<select name="marketUnit" class="number" style="width:104px; height:20px;">
              	<?
              	$unit=$groups->getUnitByCategory("Price Unit");
              	while($unitGet=$conn->fetchArray($unit))
              	{?>
                	<option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$marketUnit){ echo 'selected="selected"';}?>>
						<?=$unitGet['name'];?>
                   	</option>  
              	<? }
              	?>
            	</select>
           	</div>
            <div style="clear:both"></div>
      	</div>
        <div class="inputleft inputright">
    		<div>मुल्य (Rs)</div>
            <div>
            	<p><input type="text" name="marketPrice" class="number" value="<?=$marketPrice;?>" required /></p>
          		<p class="error" id="marketPrice"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
	</td>
</tr>