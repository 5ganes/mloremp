<style>
    .priceheading{width:65px; border:1px solid}
    .pricedata{text-align:center; padding:2px; border:none}
    .pricedata input{width:52px;}
    #current-cost, #economic-cost, #total_cost{color:red;}
</style>
<script type="text/javascript">
    function investment(id1value,id2,investment){
        num=id2;
        id2=document.getElementById(id2).value;
        if(id1value!='' && id2!=''){
            // alert(id2);
            var sum = parseFloat(id1value)*parseFloat(id2);
            // var sum = id2;
            //alert(sum);
            document.getElementById(investment).value=sum;

            var num = num.replace( /\D+/g, '');
            var total_cost=0;
            if(num<=32){
                var tsum=0; var i=1;
                for(i=1; i<=32;i++){
                    id='i'+i;
                    total = document.getElementById(id).value;
                    if(total!='')
                        tsum = tsum + parseFloat(total);
                }
                document.getElementById('current-cost').innerHTML=tsum;
                document.getElementById('current-cost-val').value=tsum;
                var second=document.getElementById('economic-cost-val').value;
                if(second=='')
                    second=0;
                total_cost=innerHTML=tsum+parseFloat(second);
                document.getElementById('total_cost').innerHTML=total_cost;
                document.getElementById('total_cost_val').value=total_cost;
            }
            else if(num>=33 && num<=36){
                var tsum=0; var i=1;
                for(i=33; i<=36;i++){
                    id='i'+i;
                    total = document.getElementById(id).value;
                    if(total!='')
                        tsum = tsum + parseFloat(total);
                }
                document.getElementById('economic-cost').innerHTML=tsum;
                document.getElementById('economic-cost-val').value=tsum;
                var first=document.getElementById('current-cost-val').value;
                if(first=='')
                    first=0;
                total_cost=innerHTML=tsum+parseFloat(first);
                document.getElementById('total_cost').innerHTML=total_cost;
                document.getElementById('total_cost_val').value=total_cost;
            }
            // else if(num>=44 && num<=49){
            //     var tsum=0; var i=1;
            //     for(i=44; i<=49;i++){
            //         id='i'+i;
            //         total = document.getElementById(id).value;
            //         if(total!='')
            //             tsum = tsum + parseFloat(total);
            //     }
            //     document.getElementById('production').innerHTML=tsum;
            //     document.getElementById('production-val').value=tsum;
            // }
        }
    }
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#cropId').change(function(){
            var cropId=this.value;
            // alert(cropId);
            $.ajax({
                type : 'post',
                url : 'forms/get_cropvariety.php', 
                data :  {cropId:cropId}, 
                dataType:'html',
                success : function(data)
                {
                    // console.log('sdfd');
                    $('#cropVarietyId').html(data);
                }
            });

        });
    });
</script>

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
        <p>
            <select name="cropId" id="cropId" style="width:300px;" required>
                <option value="">Select Crop</option>
                <?php
                $crop=$crop->getCrops();
                while($cropGet=$conn->fetchArray($crop))
                {?>
                    <option value="<?=$cropGet['id'];?>" <? if($cropId==$cropGet['id'] or $_GET['cropId']==$cropGet['id'])
                    { echo 'selected="selected"';}?>><?=$cropGet['name'];?></option>
                <? }?>      
            </select>
            <!-- <input type="text" name="cropName" class="text" value="<?=$cropName;?>" required /> -->
        </p>
        <!-- <p class="error" id="cropId"></p> -->
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">बालीको जात</strong> :<span class="asterisk">*</span></td>
    <td>
        <p>
            <select name="cropVarietyId" id="cropVarietyId" style="width:300px" required>
                <option value="">Select Crop Variety</option>
                <?php
                    if(isset($id)){
                        $variety = $conn->fetchArray($cropvariety->getById($cropVarietyId));
                        echo '<option value="'.$cropVarietyId.'" selected>'.$variety['name'].'</select>';
                    }
                ?>
            </select>
            <!-- <input type="text" name="cropSpecies" class="text" value="<?=$cropSpecies;?>" required /> -->
        </p>
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
        <div class="inputleft" style="width:29%; margin-left:5%">
            <div>सिंचित अवस्था</div>
            <div>
                <select name="irrigationUnit" class="number" style="width:104px; height:20px;">
                <?
                $unit=$groups->getUnitByCategory("Land Type");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$irrigationUnit){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>  
                <? }
                ?>
                </select>
            </div>
        </div>        
        <div class="inputleft inputright" style="margin-left:5%">
            <div>क्षेत्रफल</div>
            <div>
                <input type="text" name="cropArea" class="number" value="<?=$cropArea;?>" required />
                <p class="error" id="cropArea"></p>
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
                <td class="padding" style="padding-left:8px">
                    <b>चालु खर्च(Rs): <span id="current-cost"><?=$current_cost?></span></b>
                    <input type="hidden" id="current-cost-val" name="current_cost" value="<?=$current_cost?>" />
                </td>  
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding"><b>बिउ वा बिरुवा</b><input name="commodity[]" type="hidden" value="बिउ वा बिरुवा" /></td>
                <td class="padding">के जी / गोटा<input name="commodityUnit[]" type="hidden" value="के जी / गोटा" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r1','i1')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a1" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a1','i1')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r1" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i1" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding"><b>रेखांकन खर्च</b><input name="commodity[]" type="hidden" value="रेखांकन खर्च" /></td>
                <td class="padding">दिन<input name="commodityUnit[]" type="hidden" value="दिन" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r2','i2')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a2" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a2','i2')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r2" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i2" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <td class="padding" style="padding-left:8px"><strong>जनश्रम</strong></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">खाडल खन्न<input name="commodity[]" type="hidden" value="खाडल खन्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r3','i3')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a3" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a3','i3')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r3" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i3" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">मलखाद प्रयोग गर्न<input name="commodity[]" type="hidden" value="मलखाद प्रयोग गर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r4','i4')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a4" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a4','i4')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r4" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i4" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">खाडल पुर्न<input name="commodity[]" type="hidden" value="खाडल पुर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r5','i5')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a5" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a5','i5')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r5" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i5" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">बिरुवा रोप्न<input name="commodity[]" type="hidden" value="बिरुवा रोप्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r6','i6')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a6" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a6','i6')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r6" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i6" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">काटछाँट गर्न<input name="commodity[]" type="hidden" value="काटछाँट गर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r7','i7')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a7" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a7','i7')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r7" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i7" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">छापो हाल्न<input name="commodity[]" type="hidden" value="छापो हाल्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r8','i8')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a8" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a8','i8')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r8" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i8" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">गोडमेल गर्न<input name="commodity[]" type="hidden" value="गोडमेल गर्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r9','i9')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a9" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a9','i9')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r9" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i9" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">फलफुल टिप्न<input type="hidden" name="commodity[]" value="फलफुल टिप्न" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r10','i10')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a10" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a10','i10')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r10" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i10" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>

            <tr>
                <td class="padding" style="padding-left:8px"><strong>हल वा ट्रयाक्टर खर्च</strong></td>
            </tr>

            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">हल गोरु<input type="hidden" name="commodity[]" value="हल गोरु" /></td>
                <td class="padding">दिन<input name="commodityUnit[]" type="hidden" value="दिन" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r11','i11')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a11" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a11','i11')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r11" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i11" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">मानिस<input type="hidden" name="commodity[]" value="मानिस" /></td>
                <td class="padding">जना<input name="commodityUnit[]" type="hidden" value="जना" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r12','i12')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a12" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a12','i12')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r12" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i12" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">ट्रयाक्टर<input name="commodity[]" type="hidden" value="ट्रयाक्टर" /></td>
                <td class="padding">घण्टा<input name="commodityUnit[]" type="hidden" value="घण्टा" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r13','i13')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a13" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a13','i13')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r13" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i13" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">थ्रेसर<input name="commodity[]" type="hidden" value="थ्रेसर" /></td>
                <td class="padding">घण्टा<input name="commodityUnit[]" type="hidden" value="घण्टा" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r14','i14')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a14" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a14','i14')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r14" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i14" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <td class="padding" style="padding-left:8px"><strong>मल</strong></td>
                
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">गोबर मल<input name="commodity[]" type="hidden" value="गोबर मल" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r15','i15')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a15" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a15','i15')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r15" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i15" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">युरिया<input name="commodity[]" type="hidden" value="युरिया" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r16','i16')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a16" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a16','i16')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r16" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i16" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">डी ए पी<input name="commodity[]" type="hidden" value="डी ए पी" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r17','i17')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a17" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a17','i17')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r17" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i17" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">पोटास<input name="commodity[]" type="hidden" value="पोटास" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r18','i18')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a18" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a18','i18')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r18" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i18" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">सुक्ष्म तत्व<input name="commodity[]" type="hidden" value="सुक्ष्म तत्व" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r19','i19')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a19" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a19','i19')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r19" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i19" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">बोर्ड टेस्ट<input name="commodity[]" type="hidden" value="बोर्ड टेस्ट" /></td>
                <td class="padding">टेस्ट<input name="commodityUnit[]" type="hidden" value="टेस्ट" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r20','i20')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a20" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a20','i20')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r20" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i20" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">सिंचाई<input name="commodity[]" type="hidden" value="सिंचाई" /></td>
                <td class="padding">घण्टा<input name="commodityUnit[]" type="hidden" value="घण्टा" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r21','i21')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a21" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a21','i21')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r21" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i21" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <td class="padding" style="padding-left:8px"><strong>बाली संरक्षण खर्च</strong></td>
                
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">प्राङ्गारिक धुलो<input name="commodity[]" type="hidden" value="प्राङ्गारिक धुलो" /></td>
                <td class="padding">के जी/बोतल<input name="commodityUnit[]" type="hidden" value="के जी/बोतल" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r22','i22')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a15" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a22','i22')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r22" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i22" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">प्राङ्गारिक झोल<input name="commodity[]" type="hidden" value="प्राङ्गारिक झोल" /></td>
                <td class="padding">के जी/बोतल<input name="commodityUnit[]" type="hidden" value="के जी/बोतल" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r23','i23')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a23" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a23','i23')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r23" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i23" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">रासायनिक धुलो<input name="commodity[]" type="hidden" value="रासायनिक धुलो" /></td>
                <td class="padding">के जी/बोतल<input name="commodityUnit[]" type="hidden" value="के जी/बोतल" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r24','i24')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a24" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a24','i24')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r24" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i24" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">रासायनिक झोल<input name="commodity[]" type="hidden" value="रासायनिक झोल" /></td>
                <td class="padding">के जी/बोतल<input name="commodityUnit[]" type="hidden" value="के जी/बोतल" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r25','i25')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a25" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a25','i25')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r25" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i25" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">कृषि औजार खरिद खर्च<input name="commodity[]" type="hidden" value="कृषि औजार खरिद खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r26','i26')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a26" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a26','i26')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r26" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i26" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">बरबन्देज खर्च<input name="commodity[]" type="hidden" value="बरबन्देज खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r27','i27')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a27" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a27','i27')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r27" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i27" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">नेटिंग खर्च<input name="commodity[]" type="hidden" value="नेटिंग खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r28','i28')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a28" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a28','i28')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r28" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i28" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">जग्गा भाडा खर्च<input name="commodity[]" type="hidden" value="जग्गा भाडा खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r29','i29')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a29" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a29','i29')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r29" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i29" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">ब्यबस्थापक खर्च<input name="commodity[]" type="hidden" value="ब्यबस्थापक खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r30','i30')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a30" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a30','i30')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r30" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i30" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">परिबर्तित लागतको व्याज खर्च<input name="commodity[]" type="hidden" value="परिबर्तित लागतको व्याज खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r31','i31')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a31" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a31','i31')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r31" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i31" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">अन्य खर्च<input name="commodity[]" type="hidden" value="अन्य खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r32','i32')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a32" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a32','i32')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r32" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i32" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            
            <tr>
                <td class="padding" style="padding-left:8px">
                    <b>पुजीगत खर्च(Rs): <span id="economic-cost"><?=$economic_cost?></span></b>
                    <input type="hidden" id="economic-cost-val" name="economic_cost" value="<?=$economic_cost?>" />
                </td>
                
            </tr>
            <tr>
                <td class="padding" style="padding-left:8px"><strong>जग्गा सम्बन्धि</strong></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">मालपोत<input name="commodity[]" type="hidden" value="मालपोत" /></td>
                <td class="padding">रोपनी/कट्ठा<input name="commodityUnit[]" type="hidden" value="रोपनी/कट्ठा" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r33','i33')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a33" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a33','i33')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r33" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i33" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">पानिपोत<input name="commodity[]" type="hidden" value="पानिपोत" /></td>
                <td class="padding">रोपनी/कट्ठा/बर्ष<input name="commodityUnit[]" type="hidden" value="रोपनी/कट्ठा/बर्ष" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r34','i34')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a34" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a34','i34')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r34" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i34" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding"><b>मर्मत खर्च</b><input name="commodity[]" type="hidden" value="मर्मत खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r35','i35')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a35" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a35','i35')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r35" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i35" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding"><b>ह्रासकट्टी खर्च</b><input name="commodity[]" type="hidden" value="ह्रासकट्टी खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r36','i36')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a36" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a36','i36')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r36" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i36" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>

            <tr style="border:none"><td style="border:none"></td>&nbsp;</tr>
            <tr>
                <td class="padding" style="padding-left:8px">
                    <b>जम्मा लागत खर्च(Rs): <span id="total_cost"><?=$total_cost?></span></b>
                    <input type="hidden" id="total_cost_val" name="total_cost" value="<?=$total_cost?>" />
                </td>
                
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">मुख्य उत्पादन<input name="commodity[]" type="hidden" value="मुख्य उत्पादन" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r37','i37')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a44" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a37','i37')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r37" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i37" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">सहायक उत्पादन<input name="commodity[]" type="hidden" value="सहायक उत्पादन" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r38','i38')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a45" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a38','i38')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r38" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i38" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">उप उत्पादन<input name="commodity[]" type="hidden" value="उप उत्पादन" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r39','i39')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a46" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a39','i39')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r39" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i39" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <td class="padding" style="padding-left:8px"><b>बजारको विवरण</b></td>
                
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">घरमा प्रयोग<input name="commodity[]" type="hidden" value="घरमा प्रयोग" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r40','i40')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a40" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a40','i40')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r40" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i40" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">नजिकको बजारमा प्रयोग<input name="commodity[]" type="hidden" value="नजिकको बजारमा प्रयोग" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r41','i41')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a41" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a41','i41')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r41" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i41" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">नोक्सानी<input name="commodity[]" type="hidden" value="नोक्सानी" /></td>
                <td class="padding">के जी<input name="commodityUnit[]" type="hidden" value="के जी" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r42','i42')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a42" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a42','i42')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r42" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i42" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
            <tr>
                <? $comGet=$conn->fetchArray($com); extract($comGet);?>
                <td class="padding">बजार(सफाई,ग्रेडिङ्ग,प्याकिंग) खर्च<input name="commodity[]" type="hidden" value="बजार(सफाई,ग्रेडिङ्ग,प्याकिंग) खर्च" /></td>
                <td class="padding">रु<input name="commodityUnit[]" type="hidden" value="रु" /></td>
                <td><input type="number" onkeyup="investment(this.value,'r43','i43')" class="number paddingwidth" name="amount[]" value="<?=$amount;?>" id="a43" required /></td>
                <td><input type="number" onkeyup="investment(this.value,'a43','i43')" class="number paddingwidth" name="rate[]" value="<?=$rate;?>" id="r43" required /></td>
                <td><input type="number" class="number paddingwidth" name="investment[]" value="<?=$investment;?>" id="i43" readonly /></td>
                <td><input type="text" class="number remarks" name="remarks[]" value="<?=$remarks;?>" /></td>
            </tr>
        </table>
    </td>
</tr>
<tr><td></td></tr>