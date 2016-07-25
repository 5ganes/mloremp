<tr>
    <td><strong class="fronttitle">पकेट क्षेत्रको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="pocketAreaName" class="text" value="<?=$pocketAreaName;?>" required /></p>
        <p class="error" id="pocketAreaName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">पकेट क्षेत्र (जम्मा)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
        	<div>परिवार संख्या</div>
            <div>
            	<p><input type="text" name="totalFamilyNumber" class="number" value="<?=$totalFamilyNumber;?>" required /></p>
                <p class="error" id="totalFamilyNumber"></p>
          	</div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright">
        	<div>जनसंख्या</div>
            <div>
            	<p><input type="text" name="totalPopulation" class="number" value="<?=$totalPopulation;?>" required /></p>
                <p class="error" id="totalPopulation"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">पकेट क्षेत्र (कृषक)</strong> :<span class="asterisk">*</span></td>
	<td>
    	<div class="inputleft">
        	<div>परिवार संख्या</div>
            <div>
            	<p><input type="text" name="farmerFamilyNumber" class="number" value="<?=$farmerFamilyNumber;?>" required /></p>
          		<p class="error" id="farmerFamilyNumber"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright">
        	<div>जनसंख्या</div>
            <div>
            	<p><input type="text" name="farmerPopulation" class="number" value="<?=$farmerPopulation;?>" required /></p>
          		<p class="error" id="farmerPopulation"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">पकेट क्षेत्र (कृषक)</strong> :<span class="asterisk">*</span></td>
	<td>
    	<div class="inputleft">
            <div>महिला संख्या</div>
            <div>
                <p><input type="text" name="femaleNumber" class="number" value="<?=$femaleNumber;?>" required /></p>
          		<p class="error" id="femaleNumber"></p>
            </div>
		</div>        
    	<div class="inputleft inputright">
        	<div>पुरुष संख्या</div>
            <div>
            	<p><input type="text" name="maleNumber" class="number" value="<?=$maleNumber;?>" required /></p>
          		<p class="error" id="maleNumber"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">बालीहरु रोज्नुहोस</strong> :</td>
	<td>
        <div class="inputleft" style="width:30%">
        	<select name="firstCrop" class="text">
                <option value="none">None</option>
                <?
                $crop1=$crop->getCrops();
                while($crop1Get=$conn->fetchArray($crop1))
                {?>
                    <option value="<?=$crop1Get['name'];?>" <? if($crop1Get['name']==$firstCrop){ echo 'selected="selected"';}?> style="padding:0 2px">
                        <?=$crop1Get['name'];?>
                    </option>  
                <? }
                ?>
         	</select>
        </div>
        <div class="inputleft inputright" style="width:30%">
        	<select name="secondCrop" class="text">
                <option value="none">None</option>
                <?
                $crop2=$crop->getCrops();
                while($crop2Get=$conn->fetchArray($crop2))
                {?>
                    <option value="<?=$crop2Get['name'];?>" <? if($crop2Get['name']==$secondCrop){ echo 'selected="selected"';}?> style="padding:0 2px">
                        <?=$crop2Get['name'];?>
                    </option>  
                <? }
                ?>
         	</select>
        </div>
        <div class="inputleft inputright">
        	<select name="thirdCrop" class="text">
                <option value="none">None</option>
                <?
                $crop3=$crop->getCrops();
                while($crop3Get=$conn->fetchArray($crop3))
                {?>
                    <option value="<?=$crop3Get['name'];?>" <? if($crop3Get['name']==$thirdCrop){ echo 'selected="selected"';}?> style="padding:0 2px">
                        <?=$crop3Get['name'];?>
                    </option>  
                <? }
                ?>
         	</select>
        </div>
        <div style="clear:both"></div>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">आधारभूत सेवा</strong> :<span class="asterisk">*</span></td>
    <td>
        <select name="fundamentalService" class="number" style="width:104px; height:20px;">
          <?
          $unit=$groups->getUnitByCategory("आधारभूत सेवा");
          while($unitGet=$conn->fetchArray($unit))
          {?>
              <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$fundamentalService){ echo 'selected="selected"';}?>>
                  <?=$unitGet['name'];?>
              </option>  
          <? }
          ?>
        </select>
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
        <div class="inputleft inputright" style="width: 27%">
        	<div>मुल्य (हजारमा)</div>
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
        <div class="inputleft inputright" style="width: 27%">
    		<div>मुल्य (हजारमा)</div>
            <div>
            	<p><input type="text" name="marketPrice" class="number" value="<?=$marketPrice;?>" required /></p>
          		<p class="error" id="marketPrice"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
	</td>
</tr>