<tr>
    <td><strong class="fronttitle">सहकारीको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="cooperativeName" class="text" value="<?=$cooperativeName;?>" required /></p>
        <p class="error" id="cooperativeName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">ठेगाना</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:45%">
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
    <td><strong class="fronttitle">दर्ता मिति</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:18%">
        	<div>गते</div>
            <div>
            	<select name="registeredDay" class="text" style="width:80px">
					<?
                        for($day=1;$day<=32;$day++)
                        {?>
                         <option value="<? echo $day;?>" <? if($day==$registeredDay){ echo 'selected="selected"';}?>>
                            <? echo $day;?>
                         </option>		
                        <? }
                    ?>
                </select>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:23%; margin-left:4%">
        	<div>महिना</div>
            <div>
            	<select name="registeredMonth" class="text" style="width:105px;">
					<?
                    $unit=$groups->getUnitByCategory("Month");
                    while($unitGet=$conn->fetchArray($unit))
                    {?>
                        <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$registeredMonth){ echo 'selected="selected"';}?>>
                            <?=$unitGet['name'];?>
                        </option>
                    <? }
                    ?>
                </select>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:26%; margin-left:5%">
        	<div>वर्ष</div>
            <div>
            	<select name="registeredYear" class="text" style="width:105px">
					<?
                        for($year=2050;$year<=date("y")+2056;$year++)
                        {?>
                         <option value="<? echo $year;?>" <? if($year==$registeredYear){ echo 'selected="selected"';}?>>
                            <? echo $year;?>
                         </option>		
                        <? }
                    ?>
                </select>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">दर्ता नं.</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="registrationNumber" class="number" value="<?=$registrationNumber;?>" required /></p>
        <p class="error" id="registrationNumber"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">सदस्य संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:28.4%">
        	<div>महिला</div>
            <div>
            	<p><input type="text" name="femaleNumber" class="text" style="width:115px;" value="<?=$femaleNumber;?>" required /></p>
          		<p class="error" id="femaleNumber"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:26%; margin-left:5%">
        	<div>पुरुष</div>
            <div>
            	<p><input type="text" name="maleNumber" class="number" style="width:115px;" value="<?=$maleNumber;?>" required /></p>
          		<p class="error" id="maleNumber"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">विषयगत कार्यक्षेत्र</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="workingField" class="text" value="<?=$workingField;?>" required /></p>
        <p class="error" id="workingField"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कार्य संचालन गरेका गा.वि.स/न.पा</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><textarea name="workingVdcMunicipality" rows="1" style="padding:3px 4px" cols="44" required><?=$workingVdcMunicipality;?></textarea></p>
        <p class="error" id="workingVdcMunicipality"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">हाल सम्मको जम्मा कोष</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="totalFund" class="number" value="<?=$totalFund;?>" required /></p>
        	<p class="error" id="totalFund"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कोष परिचालन(ऋण प्रवाह)(Rs)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="debtAmount" class="number" value="<?=$debtAmount;?>" required /></p>
        	<p class="error" id="debtAmount"></p>
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