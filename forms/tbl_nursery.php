<tr>
    <td><strong class="fronttitle">स्रोत केन्द्र/नर्सरीको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="shrotKendra" class="text" value="<?=$shrotKendra;?>" required /></p>
        <p class="error" id="shrotKendra"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">ठेगाना</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:41%">
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
	<td><strong class="fronttitle">दर्ता भएको/नभएको</strong> :</td>
	<td>
    	<div class="inputleft" style="width:21%">
            <select name="registration" class="number" onChange="displayRegistration(this);" style="width:105px">
                <?
                $unit=$groups->getUnitByCategory("Registration");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$registration){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
            </select>
      	</div>
        <style>
        	#rDay{width:23%; display:none}
			#rMonth{width:26%; margin-left:3%;}
			#rYear{width:23%; margin-left:3%;}
        </style>
        <div class="inputleft" id="rDay">
        	<div>गते</div>
            <div>
            	<select name="registeredDay" class="text" style="width:120px" id="registeredDay">
					<option value="">day</option>
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
        <div class="inputleft inputright" style="display:none" id="rMonth">
        	<div>महिना</div>
            <div>
            	<select name="registeredMonth" class="text" style="width:120px;" id="registeredMonth">
					<option value="">month</option>
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
        <div class="inputleft inputright" style="display:none" id="rYear">
        	<div>वर्ष</div>
            <div>
            	<select name="registeredYear" class="text" style="width:120px" id="registeredYear">
					<option value="">year</option>
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
	<td><strong class="fronttitle">स्रोत केन्द्रवाट प्रवाह हुने वस्तु तथा सेवा </strong> :<span class="asterisk">*</span></td>
	<td>
    	<div class="inputleft" style="width:100%">
        	<p>
			<? $pieces = explode(",", $shrotKendraService);?>
            <input type="checkbox" name="sks[]" value="फलफुल नर्सरी" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="फलफुल नर्सरी"){ echo 'checked="checked"';}} ?> /> फलफुल नर्सरी &nbsp;
            
            <input type="checkbox" name="sks[]" value="तरकारी नर्सरी" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="तरकारी नर्सरी"){ echo 'checked="checked"';}} ?> /> तरकारी नर्सरी &nbsp;
            
            <input type="checkbox" name="sks[]" value="मत्स्य ह्याचरी" 
             <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="मत्स्य ह्याचरी"){ echo 'checked="checked"';}} ?> /> मत्स्य ह्याचरी &nbsp;
             
            <input type="checkbox" name="sks[]" value="मौरी स्रोत केन्द्र" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="मौरी स्रोत केन्द्र"){ echo 'checked="checked"';}} ?> /> मौरी स्रोत केन्द्र &nbsp;
            
            <input type="checkbox" name="sks[]" value="वीउ विजन स्रोत केन्द्र" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="वीउ विजन स्रोत केन्द्र"){ echo 'checked="checked"';}} ?> /> वीउ विजन स्रोत केन्द <br />
            
            <input type="checkbox" name="sks[]" value="अन्य स्रोत केन्द्रहरु" 
            <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="अन्य स्रोत केन्द्रहरु"){ echo 'checked="checked"';}} ?> /> अन्य स्रोत केन्द्रहरु
            </p>
            <p class="error" id="sks"></p>
  		</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>
<tr>
    <td><strong class="fronttitle">सम्पर्क व्यक्ति</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" class="text" name="contactPerson" value="<?=$contactPerson;?>" required /></p>
    </td>
</tr>
<tr><td></td></tr>
<tr>
    <td><strong class="fronttitle">फोन नं.</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:29%">
    		<p><input type="text" name="phoneNumber" class="text" value="<?=$phoneNumber;?>" required /></p>
        	<p class="error" id="phoneNumber"></p>
  		</div>
        <div style="clear:both"></div>
    </td>
</tr>