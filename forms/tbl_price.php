<style>
	.priceheading{width:65px; border:1px solid}
	.pricedata{text-align:center; padding:2px; border:none}
	.pricedata input{width:52px; border:1px solid #abadb3}
</style>
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
    <td><strong class="fronttitle">वजारको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="marketName" class="text" value="<?=$marketName;?>" required /></p>
        <p class="error" id="marketName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">संकलन मिति : </strong></td>
    <td>
        <input type="text" name="collectedDate" value="<?php echo $collectedDate; ?>" 
        id="collectedDate" class="nepali-calendar text" required />
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">संकलन कर्ताको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" class="text" name="collector" value="<?=$collector;?>" required /></p>
    </td>
</tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr>
    <td colspan="20">
    	<h3 class="fronttitle">वस्तु (Commodities Details)</h3>
    	<table border="1" width="100%" cellpadding="2" cellspacing="2">
        	<tr>
            	<th class="priceheading" style="width:175px">वस्तु</th>
                <th class="priceheading">एकाई</th>
                <th>
                	<table>
                    	<tr>
                    		
                    		<th colspan="20"><?=$_GET['priceType'];?></th>
                    	</tr>
                        <tr>
                        	<th class="priceheading">1</th>
                            <th class="priceheading">2</th>
                            <th class="priceheading">3</th>
                            <th class="priceheading">4</th>
                            <th class="priceheading">5</th>
                        </tr>
                    </table>	
				</th>
                <th class="priceheading">Average</th>
                <th class="priceheading">Remarks</th>
            </tr>
            
        <?
		if(isset($_GET['priceType'])){ $priceType=$_GET['priceType'];}else{ $priceType="पाक्षिक थोक मूल्य";}
		echo '<input type="hidden" name="priceType" value="'.$priceType.'" />';
		$comm=$crop->getCropPriceByCategory($priceType);
		$rate=$program->getPriceListByParentId($id); $i=1;
		while($commGet=$conn->fetchArray($comm))
		{
			$rateGet=$conn->fetchArray($rate);?>
        	<tr>
            	<td style="border:none">
					<?=$commGet['name'];?>
               		<input type="hidden" name="commodity" value="<?=$commGet['id'];?>" />
                </td>
                <td class="pricedata"><?=$commGet['unit'];?></td>
                <td border="0" style="border:none">
                	<table>
                    	<tr>
                        	<td class="pricedata"><input type="text" name="r1[]" id="r1<?=$i;?>" 
                             onblur="average('r1<?=$i;?>','r2<?=$i;?>','r3<?=$i;?>','r4<?=$i;?>','r5<?=$i;?>','average<?=$i;?>')" 
                             value="<?=$rateGet['rate1'];?>" /></td>
                            <td class="pricedata"><input type="text" name="r2[]" id="r2<?=$i;?>"
                            onblur="average('r1<?=$i;?>','r2<?=$i;?>','r3<?=$i;?>','r4<?=$i;?>','r5<?=$i;?>','average<?=$i;?>')"  
                            value="<?=$rateGet['rate2'];?>" /></td>
                            <td class="pricedata"><input type="text" name="r3[]" id="r3<?=$i;?>"
                            onblur="average('r1<?=$i;?>','r2<?=$i;?>','r3<?=$i;?>','r4<?=$i;?>','r5<?=$i;?>','average<?=$i;?>')"  
                            value="<?=$rateGet['rate3'];?>" /></td>
                            <td class="pricedata"><input type="text" name="r4[]" id="r4<?=$i;?>"
                            onblur="average('r1<?=$i;?>','r2<?=$i;?>','r3<?=$i;?>','r4<?=$i;?>','r5<?=$i;?>','average<?=$i;?>')"  
                            value="<?=$rateGet['rate4'];?>" /></td>
                            <td class="pricedata"><input type="text" name="r5[]" id="r5<?=$i;?>"
                            onblur="average('r1<?=$i;?>','r2<?=$i;?>','r3<?=$i;?>','r4<?=$i;?>','r5<?=$i;?>','average<?=$i;?>')"  
                            value="<?=$rateGet['rate5'];?>" /></td>
                        </tr>
                    </table>
                </td>
                
                <td class="pricedata"><input type="text" name="average[]" id="average<?=$i;?>" value="<?=$rateGet['average'];?>" /></td>
                <td class="pricedata"><input type="text" name="remarks[]" value="<?=$rateGet['remarks'];?>" style="width:120px" /></td>
            </tr>
  		<? $i++; }?>
            
        </table>
    </td>
</tr>
<tr><td></td></tr>