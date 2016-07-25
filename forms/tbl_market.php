<tr>
    <td><strong class="fronttitle">वजारको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="marketName" class="text" value="<?=$marketName;?>" required /></p>
        <p class="error" id="marketName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बजारको प्रकार</strong> :</td>
    <td>
    	<select name="marketType" class="text" style="width:29%">
			<?
            $unit=$groups->getUnitByCategory("बजारको प्रकार");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$marketType){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
     	</select>
 	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बजार क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:29%">
    		<div>एकाई</div>
            <div>
            	<select name="marketAreaUnit" class="text" style="width:110px;">
				<?
                $unit=$groups->getUnitByCategory("Area Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$marketAreaUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            </div>
        </div>
        <div class="inputleft inputright">
        	<div>परिमाण</div>
        	<div>
            	<p><input type="text" name="marketArea" class="number" value="<?=$marketArea;?>" required /></p>
        		<p class="error" id="marketArea"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">संञ्चालन शुरु भएको बर्ष</strong> :</td>
    <td>
    	<select name="establishedYear" class="text" style="width:120px">
			<?
				for($year=2060;$year<=date("y")+2056;$year++)
				{?>
				 <option value="<? echo $year;?>" <? if($year==$establishedYear){ echo 'selected="selected"';}?>>
					<? echo $year;?>
				 </option>		
				<? }
			?>
		</select>
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
        <div class="inputleft inputright" style="width:26%; margin-left:5%">
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
    <td><strong class="fronttitle">कमान्ड गा वि स/न पा संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
        <p><input type="number" name="command_vdc_mun_number" class="number" value="<?=$command_vdc_mun_number;?>" required /></p>
        <p class="error" id="command_vdc_mun_number"></p>
    </td>
</tr>

<tr>
    <td><strong class="fronttitle">बजार लाग्ने दिन(हप्तामा)</strong> :</td>
    <td>
    	<select name="marketDay" class="text" style="width:83px">
			<?
                for($day=1;$day<=7;$day++)
                {?>
                 <option value="<? echo $day;?>" <? if($day==$marketDay){ echo 'selected="selected"';}?>>
                    <? echo $day;?>
                 </option>		
                <? }
            ?>
        </select>
 	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बजार निमार्णमा सरकारी लगानी (हजारमा)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="governmentInvestment" class="number" value="<?=$governmentInvestment;?>" required /></p>
        	<p class="error" id="governmentInvestment"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बार्षिक कृषि उपजको कारोवार</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
    		<div>एकाई</div>
            <div>
            	<select name="agricultureProductTradeUnit" class="text" style="width:110px;">
				<?
                $unit=$groups->getUnitByCategory("Price Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$agricultureProductTradeUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            </div>
        </div>
        <div class="inputleft inputright">
        	<div>परिमाण</div>
        	<div>
            	<p><input type="text" name="agricultureProductTradeQuantity" class="number" value="<?=$agricultureProductTradeQuantity;?>" required /></p>
        		<p class="error" id="agricultureProductTradeQuantity"></p>
  			</div>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बार्षिक कृषि उपजको कारोवार रकम(हजारमा)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="agricultureProductTradeAmount" class="number" value="<?=$agricultureProductTradeAmount;?>" required /></p>
        	<p class="error" id="agricultureProductTradeAmount"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">सम्पर्क व्यक्ति/फोन नं</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" class="text" name="contactPerson" value="<?=$contactPerson;?>" required /></p>
    </td>
</tr>