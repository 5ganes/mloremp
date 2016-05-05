<tr>
    <td><strong class="fronttitle">विमित बाली</strong> :<span class="asterisk">*</span></td>
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
    <td><strong class="fronttitle">विमित बालीको</strong> :<span class="asterisk">*</span></td>
    <td>
        <div class="inputleft">
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
        <div class="inputleft inputright">
            <div>क्षेत्रफल</div>
            <div>
                <p><input type="text" name="cropArea" class="number" value="<?=$cropArea;?>" required /></p>
                <p class="error" id="cropArea"></p>
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">विमांक रकम(रु)</strong> :<span class="asterisk">*</span></td>
    <td>
        <div class="inputleft inputright" style="width:14%">
            <p><input type="text" name="insuranceAmount" class="number" value="<?=$insuranceAmount;?>" required /></p>
            <p class="error" id="insuranceAmount"></p>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">किसानको संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
        <div class="inputleft inputright" style="width:14%">
            <p><input type="text" name="totalFarmer" class="number" value="<?=$totalFarmer;?>" required /></p>
            <p class="error" id="totalFarmer"></p>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">सुझाबहरु :</strong></td>
    <td>
        <textarea name="remarks" rows="1" style="padding:3px 4px" cols="44"><?=$remarks;?></textarea>
    </td>
</tr>