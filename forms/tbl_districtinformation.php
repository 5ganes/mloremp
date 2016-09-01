<?
	session_start();
	if(!isset($_SESSION['userId']))
	{
		header("Location: ../programlogin.php");
		exit();
	}
?>
<style>
	.inputleft{width:29%}
	.inputright{width:27%}
</style>
<tr>
    <td><strong class="fronttitle">जिल्लाको क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
            <div>एकाई</div>
            <div>
                <select name="areaUnit" class="number" style="width:100px; height:20px;">
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
        	<div>जम्मा</div>
            <div>
            	<p><input type="text" name="totalArea" class="number" value="<?=$totalArea;?>" required /></p>
                <p class="error" id="totalArea"></p>
          	</div>
            <div style="clear:both"></div>
       	</div>
        <div class="inputleft inputright">
        	<div>खेति योग्य</div>
            <div>
            	<p><input type="text" name="agricultureArea" class="number" value="<?=$agricultureArea;?>" required /></p>
                <p class="error" id="agricultureArea"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>
<tr>
    <td><strong class="fronttitle">खेति गरेको जमिन</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft">
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
            	<p><input type="text" name="unirrigatedArea" class="number" value="<?=$unirrigatedArea;?>" required /></p>
                <p class="error" id="unirrigatedArea"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
        <div class="inputleft inputright">
        	<div>बाँझो</div>
            <div>
            	<p><input type="text" name="barrenArea" class="number" value="<?=$barrenArea;?>" required /></p>
                <p class="error" id="barrenArea"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
        <div style="clear:both"></div>
    </td>
</tr>

<tr>
    <td><strong class="fronttitle">सिचाई हुने समय</strong> :<span class="asterisk">*</span></td>
    <td>
      <div class="inputleft">
            <div>एकाई</div>
            <div>
                <select name="irrigationTimeUnit" class="number" style="width:100px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("सिचाई हुने समय");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$irrigationTimeUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
      </div>   
    </td>
</tr>

<tr>
    <td><strong class="fronttitle">स्थायी क्षेत्रफल</strong> :<span class="asterisk">*</span></td>
    <td>
        <div class="inputleft">
        	<div>घाँसे</div>
            <div>
            	<p><input type="text" name="grassArea" class="number" value="<?=$grassArea;?>" required /></p>
                <p class="error" id="grassArea"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
        <div class="inputleft inputright">
        	<div>बनजंगल</div>
            <div>
            	<p><input type="text" name="forestArea" class="number" value="<?=$forestArea;?>" required /></p>
                <p class="error" id="forestArea"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
        <div>
        <div class="inputleft inputright" style="width:27%;">
        	<div>अन्य</div>
            <div>
            	<p><input type="text" name="otherArea" class="number" value="<?=$otherArea;?>" required /></p>
                <p class="error" id="otherArea"></p>
          	</div>
            <div style="clear:both"></div>
   		</div>
    </td>
</tr>
<tr><td></td></tr>
<tr>
    <td><strong class="fronttitle">जम्मा</strong> :<span class="asterisk">*</span></td>
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
	<td><strong class="fronttitle">कृषक</strong> :<span class="asterisk">*</span></td>
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
	<td><strong class="fronttitle">कृषक</strong> :<span class="asterisk">*</span></td>
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