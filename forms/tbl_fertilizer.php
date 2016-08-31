<tr>
    <td><strong class="fronttitle">विक्रि केन्द्रको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="sellingOffice" class="text" value="<?=$sellingOffice;?>" required /></p>
        <p class="error" id="sellingOffice"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">विक्रि केन्द्रको किसिम</strong> :</td>
	<td>
    	<select name="sellingOfficeType" class="text">
			<?
            $unit=$groups->getUnitByCategory("विक्रि केन्द्रको किसिम");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$sellingOfficeType){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
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
    <td><strong class="fronttitle">प्रोपाइटरको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="proprietorName" class="text" value="<?=$proprietorName;?>" required /></p>
        <p class="error" id="proprietorName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">सम्पर्क नं.</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:29.3%">
    		<p><input type="text" name="contactNumber" class="text" value="<?=$contactNumber;?>" required /></p>
        	<p class="error" id="contactNumber"></p>
        </div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">दर्ता नं.</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="registrationNumber" class="text" value="<?=$registrationNumber;?>" required /></p>
        <p class="error" id="registrationNumber"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">नवीकरण</strong> :</td>
    <td>
        <select name="renewStatus" class="text">
            <?
            $unit=$groups->getUnitByCategory("नवीकरण");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$renewStatus){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
        </select>
    </td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">दर्ता भएको वर्ष</strong> :</td>
	<td>
    	<select name="registeredYear" class="text" style="width:120px">
			<?
				for($year=2060;$year<=date("y")+2056;$year++)
				{?>
				 <option value="<? echo $year;?>" <? if($year==$registeredYear){ echo 'selected="selected"';}?>>
					<? echo $year;?>
				 </option>		
				<? }
			?>
     	</select>
  	</td>
</tr>
<tr><td></td></tr>
<tr>
	<td><strong class="fronttitle">विक्रि हुने बस्तु </strong> :<span class="asterisk">*</span></td>
	<td>
    	<div class="inputleft" style="width:100%">
			<p>
			<? $pieces = explode(",", $sellingObject);?>
            <input type="checkbox" name="sobj[]" value="मल" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="मल"){ echo 'checked="checked"';}} ?> /> मल &nbsp;
            
            <input type="checkbox" name="sobj[]" value="विउ" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="विउ"){ echo 'checked="checked"';}} ?> /> विउ &nbsp;
            
            <input type="checkbox" name="sobj[]" value="विषादी" 
             <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="विषादी"){ echo 'checked="checked"';}} ?> /> विषादी &nbsp;
             
             <input type="checkbox" name="sobj[]" value="औजार/उपकरण" 
             <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="औजार/उपकरण"){ echo 'checked="checked"';}} ?> /> औजार/उपकरण &nbsp;
            
            <input type="checkbox" name="sobj[]" value="अन्य" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="अन्य"){ echo 'checked="checked"';}} ?> /> अन्य
            </p>
            <p class="error" id="sobj"></p>
  		</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बिक्री परिमाण</strong> :</td>
    <td>
        <div class="inputleft" style="width:26%">
            <div>एकाई</div>
            <div>
                <select name="sellAmountUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Price Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$sellAmountUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="inputleft inputright" style="width: 23%; margin-left: 6%">
            <div>परिमाण</div>
            <div>
                <p><input type="text" name="sellAmount" class="number" value="<?=$sellAmount;?>" required /></p>
                <p class="error" id="sellAmount"></p>
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बिक्री मुल्य</strong> :</td>
    <td>
        <div class="inputleft" style="width:26%">
            <div>एकाई</div>
            <div>
                <select name="sellPriceUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Price Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$sellPriceUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="inputleft inputright" style="width: 25%; margin-left: 6%">
            <div>मुल्य(हजारमा)</div>
            <div>
                <p><input type="text" name="sellPrice" class="number" value="<?=$sellPrice;?>" required /></p>
                <p class="error" id="sellPrice"></p>
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कैफियत :</strong></td>
    <td>
    	<textarea name="remarks" rows="1" style="padding:3px 4px" cols="44"><?=$remarks;?></textarea>
    </td>
</tr>