<style>
	.priceheading{width:65px; border:1px solid}
	.pricedata{text-align:center; padding:2px; border:none}
	.pricedata input{width:52px;}
</style>
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
    <td><strong class="fronttitle">पकेट क्षेत्र</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="pocketSector" class="text" value="<?=$pocketSector;?>" required /></p>
        <p class="error" id="pocketSector"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कृषि सेवाकेन्द्र</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="sewaKendra" class="text" value="<?=$sewaKendra;?>" required /></p>
        <p class="error" id="sewaKendra"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कृषकको</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:32%">
        	<div>नाम</div>
            <div>
            	<p><input type="text" name="farmerName" class="text" value="<?=$farmerName;?>" style="width:160px" required /></p>
          		<p class="error" id="farmerName"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:17%; margin-left:3%">
        	<div>उमेर</div>
            <div>
            	<p><input type="text" name="farmerAge" class="number" value="<?=$farmerAge;?>" required style="width:65px" /></p>
          		<p class="error" id="farmerAge"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:19%; margin-left:3%">
        	<div>शिक्षा</div>
            <div>
            	<select name="farmerEducation" class="number" style="width:85px">
					<?
                    $unit=$groups->getUnitByCategory("शिक्षा");
                    while($unitGet=$conn->fetchArray($unit))
                    {?>
                        <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$farmerEducation){ echo 'selected="selected"';}?>>
                            <?=$unitGet['name'];?>
                        </option>
                    <? }
                    ?>
                </select>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="width:24%; margin-left:2%">
        	<div>अन्य पेशा</div>
            <div>
            	<p><input type="text" name="otherOccupation" class="number" value="<?=$otherOccupation;?>" required style="width:85px" /></p>
          		<p class="error" id="otherOccupation"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">समुहको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="groupName" class="text" value="<?=$groupName;?>" required /></p>
        <p class="error" id="groupName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
	<td><strong class="fronttitle">क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:29%">
            <div>एकाई</div>
            <div>
                <select name="landAreaUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Area Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$landAreaUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
		</div>        
    	<div class="inputleft inputright" style="margin-left:5%; width:26%">
        	<div>कुल जग्गाको</div>
            <div>
            	<p><input type="text" name="totalArea" class="number" value="<?=$totalArea;?>" required /></p>
          		<p class="error" id="totalArea"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="margin-left:5%; width:31%">
        	<div>खेति गरेको जग्गाको</div>
            <div>
            	<input type="text" name="agricultureArea" class="number" value="<?=$agricultureArea;?>" required />
           		<p class="error" id="agricultureArea"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">परिवार सदस्य संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="familyNumber" class="number" value="<?=$familyNumber;?>" required /></p>
        	<p class="error" id="familyNumber"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बालीको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="cropName" class="text" value="<?=$cropName;?>" required /></p>
        <p class="error" id="cropName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बालीको जात</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="cropSpecies" class="text" value="<?=$cropSpecies;?>" required /></p>
        <p class="error" id="cropSpecies"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बालीको क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:29%">
            <div>एकाई</div>
            <div>
                <select name="cropAreaUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Area Unit");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$cropAreaUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
		</div>        
    	<div class="inputleft inputright" style="margin-left:5%">
        	<div>सिंचित</div>
            <div>
            	<p><input type="text" name="cropIrrigatedArea" class="number" value="<?=$cropIrrigatedArea;?>" required /></p>
          		<p class="error" id="cropIrrigatedArea"></p>
            </div>
      		<div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright" style="margin-left:5%">
        	<div>असिंचित</div>
            <div>
            	<input type="text" name="cropUnirrigatedArea" class="number" value="<?=$cropUnirrigatedArea;?>" required />
           		<p class="error" id="cropUnirrigatedArea"></p>
            </div>
            <div style="clear:both"></div>
      	</div>
        <div style="clear:both"></div>
    </td>
</tr>

<tr>
    <td><strong class="fronttitle">निर्माण खर्च (हजारमा)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="constructionExpense" class="number" value="<?=$constructionExpense;?>" required /></p>
        	<p class="error" id="constructionExpense"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">संकलन कर्ताको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="collectorName" class="text" value="<?=$collectorName;?>" required /></p>
        <p class="error" id="collectorName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">संकलन कर्ताको पद</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="collectorPost" class="text" value="<?=$collectorPost;?>" required /></p>
        <p class="error" id="collectorPost"></p>
    </td>
</tr>

<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बर्ष</strong> :</td>
    <td>
        <select name="fruitYear" class="number" style="width:104px; height:20px;">
        <?
        $unit=$groups->getUnitByCategory("फलफुल बाली बर्ष");
        while($unitGet=$conn->fetchArray($unit))
        {?>
            <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$fruitYear){ echo 'selected="selected"';}?>>
                <?=$unitGet['name'];?>
            </option>  
        <? }
        ?>
        </select>
    </td>
</tr>

<tr>
    <td colspan="20">
    	<h3 class="fronttitle">उत्पादन लागत तथा लाभ</h3>
    	<table border="1" width="100%" cellpadding="2" cellspacing="2">
        	<tr>
            	<th class="profitheading" style="width:175px;">विवरण</th>
                <th class="profitheading">एकाई</th>
                <th class="profitheading">परिमाण</th>
                <th class="profitheading">दर</th>
                <th class="profitheading">जम्मा लागत</th>
                <th class="profitheading" style="width:150px">कैफियत</th>
            </tr>
            <? 
			$com=$conn->exec("select * from fruitcommodities where parentId='$id' order by id ASC");
			?>
            <tr>
            	<td class="padding" style="padding-left:8px"><b>चालु खर्च .......................</b></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding"><b>बिउ वा बिरुवा</b><input name="commodity[]" type="hidden" value="बिउ वा बिरुवा" /></td>
                <td class="padding">के जी / गोटा<input name="commodityUnit[]" type="hidden" value="के जी / गोटा" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a1" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r1" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i1" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding"><b>रेखांकन खर्च</b><input name="commodity[]" type="hidden" value="रेखांकन खर्च" /></td>
                <td class="padding">दिन<input name="commodityUnit[]" type="hidden" value="दिन" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a2" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r2" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i2" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>जनश्रम</strong></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">खाडल खन्न<input name="commodity[]" type="hidden" value="खाडल खन्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a3" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r3" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i3" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">मलखाद प्रयोग गर्न<input name="commodity[]" type="hidden" value="मलखाद प्रयोग गर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a4" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r4" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i4" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">खाडल पुर्न<input name="commodity[]" type="hidden" value="खाडल पुर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a5" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r5" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i5" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">बिरुवा रोप्न<input name="commodity[]" type="hidden" value="बिरुवा रोप्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a6" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r6" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i6" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">काटछाँट गर्न<input name="commodity[]" type="hidden" value="काटछाँट गर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a7" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r7" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i7" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">छापो हाल्न<input name="commodity[]" type="hidden" value="छापो हाल्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a8" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r8" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i8" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">गोडमेल गर्न<input name="commodity[]" type="hidden" value="गोडमेल गर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a9" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r9" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i9" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">फलफुल टिप्न<input type="hidden" name="commodity[]" value="फलफुल टिप्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a10" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r10" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i10" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>हल वा ट्रयाक्टर खर्च</strong></td>
                
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">हल गोरु<input name="commodity[]" type="hidden" value="हल गोरु" /></td>
                <td class="padding">दिन<input name="commodityUnit[]" type="hidden" value="दिन" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a11" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r11" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i11" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">मानिस<input name="commodity[]" type="hidden" value="मानिस" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a12" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r12" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i12" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">ट्रयाक्टर<input name="commodity[]" type="hidden" value="ट्रयाक्टर" /></td>
                <td class="padding">घण्टा<input name="commodityUnit[]" type="hidden" value="घण्टा" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a13" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r13" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i13" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>मल</strong></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">गोबर मल<input name="commodity[]" type="hidden" value="गोबर मल" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a14" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r14" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i14" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">थ्रेसर<input name="commodity[]" type="hidden" value="थ्रेसर" /></td>
                <td class="padding">घण्टा<input name="commodityUnit[]" type="hidden" value="घण्टा" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a15" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r15" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i15" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">युरिया<input name="commodity[]" type="hidden" value="युरिया" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a16" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r16" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i16" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">डी ए पी<input name="commodity[]" type="hidden" value="डी ए पी" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a17" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r17" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i17" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">पोटास<input name="commodity[]" type="hidden" value="पोटास" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a18" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r18" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i18" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">सुक्ष्म तत्व<input name="commodity[]" type="hidden" value="सुक्ष्म तत्व" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a19" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r19" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i19" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>सिंचाई</b><input name="commodity[]" type="hidden" value="सिंचाई" /></td>
                <td class="padding">घण्टा<input name="commodityUnit[]" type="hidden" value="घण्टा" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a20" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r20" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i20" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>बाली संरक्षण खर्च</strong></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">प्रांगारिक<input name="commodity[]" type="hidden" value="प्रांगारिक" /></td>
                <td class="padding">के जी / बोतल<input name="commodityUnit[]" type="hidden" value="के जी / बोतल" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a21" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r21" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i21" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">अप्रांगारिक<input name="commodity[]" type="hidden" value="अप्रांगारिक" /></td>
                <td class="padding">के जी / बोतल<input name="commodityUnit[]" type="hidden" value="के जी / बोतल" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a22" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r22" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i22" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>कृषि औजार खरिद खर्च</b><input name="commodity[]" type="hidden" value="कृषि औजार खरिद खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a23" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r23" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i23" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>बरबन्देज खर्च</b><input name="commodity[]" type="hidden" value="बरबन्देज खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a24" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r24" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i24" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>नेटिंग खर्च</b><input name="commodity[]" type="hidden" value="नेटिंग खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a25" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r25" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i25" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>जग्गा भाडा खर्च</b><input name="commodity[]" type="hidden" value="जग्गा भाडा खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a26" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r26" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i26" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>ब्यबस्थापक खर्च</b><input name="commodity[]" type="hidden" value="ब्यबस्थापक खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a27" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r27" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i27" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>परिबर्तित लागतको खर्च</b><input name="commodity[]" type="hidden" value="परिबर्तित लागतको खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a28" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r28" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i28" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>अन्य खर्च</b><input name="commodity[]" type="hidden" value="अन्य खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a29" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r29" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i29" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            
            <tr>
            	<td class="padding" style="padding-left:8px"><b>पुँजीगत खर्च .......................</b></td>
         	</tr>
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>जग्गा सम्बन्धि</strong></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">मालपोत<input name="commodity[]" type="hidden" value="मालपोत" /></td>
                <td class="padding">रोपनी/कट्ठा<input name="commodityUnit[]" type="hidden" value="रोपनी/कट्ठा" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a30" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r30" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i30" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">पानिपोत<input name="commodity[]" type="hidden" value="पानिपोत" /></td>
                <td class="padding">रोपनी/कट्ठा/बर्ष<input name="commodityUnit[]" type="hidden" value="रोपनी/कट्ठा/बर्ष" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a31" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r31" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i31" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>मर्मत खर्च</b><input name="commodity[]" type="hidden" value="मर्मत खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a32" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r32" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i32" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding" style="padding-left:8px;"><b>ह्रासकट्टी खर्च</b><input name="commodity[]" type="hidden" value="ह्रासकट्टी खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a33" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r33" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i33" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>उत्पादन</strong></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">मुख्य उत्पादन<input name="commodity[]" type="hidden" value="मुख्य उत्पादन" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a34" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r34" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i34" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">सहायक उत्पादन<input name="commodity[]" type="hidden" value="सहायक उत्पादन" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a35" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r35" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i35" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">उप उत्पादन<input name="commodity[]" type="hidden" value="उप उत्पादन" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a36" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r36" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i36" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<td class="padding" style="padding-left:8px"><strong>बजारको विवरण</strong></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">घरमा प्रयोग<input name="commodity[]" type="hidden" value="घरमा प्रयोग" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a37" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r37" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i37" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">नजिकको बजारमा प्रयोग<input name="commodity[]" type="hidden" value="नजिकको बजारमा प्रयोग" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a38" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r38" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i38" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">नोक्सानी<input name="commodity[]" type="hidden" value="नोक्सानी" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a39" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r39" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i39" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
            <tr>
            	<? $comGet=$conn->fetchArray($com); extract($comGet);?>
            	<td class="padding">बजार(सफाई,ग्रेडिङ्ग,प्याकिंग) खर्च<input name="commodity[]" type="hidden" value="बजार(सफाई,ग्रेडिङ्ग,प्याकिंग) खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
            	<td><input type="text" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a40" required /></td>
                <td><input type="text" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r40" required /></td>
                <td><input type="text" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i40" required /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
         	</tr>
           
        </table>
    </td>
</tr>
<tr><td></td></tr>