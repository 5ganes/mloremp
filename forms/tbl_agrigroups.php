<tr>
    <td><strong class="fronttitle">समूह को नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="groupName" class="text" value="<?=$groupName;?>" required /></p>
        <p class="error" id="groupName"></p>
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
	<td><strong class="fronttitle">समूहको गठन भएको वर्ष</strong> :</td>
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
    <td><strong class="fronttitle">समूहको सदस्य संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:32%">
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
    <td><strong class="fronttitle">दर्ता मिति</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:32%">
        	<div>गते</div>
            <div>
            	<select name="registeredDay" class="text" style="width:120px">
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
        <div class="inputleft inputright" style="width:26%; margin-left:5%">
        	<div>महिना</div>
            <div>
            	<select name="registeredMonth" class="text" style="width:120px;">
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
	<td><strong class="fronttitle">नियमित वैठक वस्ने दिन</strong> :</td>
	<td>
    	<select name="meetingDay" class="number" style="width:85px;">
			<?
				for($day=1;$day<=32;$day++)
				{?>
				 <option value="<? echo $day;?>" <? if($day==$meetingDay){ echo 'selected="selected"';}?>>
					<? echo $day;?>
				 </option>		
				<? }
			?>
     	</select>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कोष संकलन(प्रति महिना)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="collectedFundPerMonth" class="number" value="<?=$collectedFundPerMonth;?>" required /></p>
        	<p class="error" id="collectedFundPerMonth"></p>
    	</div>
        <div style="clear:both"></div>
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
	<td><strong class="fronttitle">समूहको अवस्था</strong> :</td>
	<td>
    	<select name="groupStatus" class="number" style="width:85px;">
			<?
            $unit=$groups->getUnitByCategory("समूहको अवस्था");
            while($unitGet=$conn->fetchArray($unit))
            {?>
                <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$groupStatus){ echo 'selected="selected"';}?>>
                    <?=$unitGet['name'];?>
                </option>  
            <? }
            ?>
     	</select>
  	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">सम्पर्क व्यक्ति/फोन नं</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" class="text" name="contactPerson" value="<?=$contactPerson;?>" required /></p>
    </td>
</tr>