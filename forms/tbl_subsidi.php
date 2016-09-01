<style>
.entrylist li ul li {
    margin-right: 7px;
}
.entrylist li ul li:nth-child(5){margin-right:7px;}
.entrylist li ul li:nth-child(7){margin-right:7px;}
</style>
<tr>
    <td><strong class="fronttitle">कार्यक्रमको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="programName" class="text" value="<?=$programName;?>" required /></p>
        <p class="error" id="programName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कार्यक्रम भएको मिति</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:28.4%">
        	<div>गते</div>
            <div>
            	<select name="programDay" class="text" style="width:120px">
					<?
                        for($day=1;$day<=32;$day++)
                        {?>
                         <option value="<? echo $day;?>" <? if($day==$programDay){ echo 'selected="selected"';}?>>
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
            	<select name="programMonth" class="text" style="width:120px;">
					<?
                    $unit=$groups->getUnitByCategory("Month");
                    while($unitGet=$conn->fetchArray($unit))
                    {?>
                        <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$programMonth){ echo 'selected="selected"';}?>>
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
            	<select name="programYear" class="text" style="width:120px">
					<?
                        for($year=2060;$year<=date("y")+2056;$year++)
                        {?>
                         <option value="<? echo $year;?>" <? if($year==$programYear){ echo 'selected="selected"';}?>>
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
    <td><strong class="fronttitle">विनियोजित अनुदान रकम (हजार)</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="subsidiAmount" class="number" value="<?=$subsidiAmount;?>" required /></p>
       	 	<p class="error" id="subsidiAmount"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">अनुदान प्रकार</strong> :<span class="asterisk">*</span></td>
    <td>
        <div class="inputleft" style="width:13%">
            <select name="donationType" class="text" style="width:80px;">
                <?
                $unit=$groups->getUnitByCategory("अनुदान प्रकार");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" 
                    <? if($unitGet['id']==$donationType){ echo 'selected="selected"';}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">अनुदान पाउने</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:13%">
            <select name="donationUnit" class="text" style="width:80px;" onChange="displayCast(this);">
                <?
                $unit=$groups->getUnitByCategory("अनुदान पाउने");
                while($unitGet=$conn->fetchArray($unit))
                {?>
                    <option value="<?=$unitGet['id'];?>" 
					<? if($unitGet['id']==$donationUnit){ echo 'selected="selected"';}else{ if(isset($_GET['id'])){ echo "disabled";}}?>>
                        <?=$unitGet['name'];?>
                    </option>
                <? }
                ?>
            </select>
            <input type="hidden" id="dUnitAlert" value="<?=$donationUnit;?>" />
       	</div>
        <div class="inputleft inputright" style="width:21%; margin-left:3%">
        	<div>संख्या</div>
            <div>
            	<p>
                	<input type="text" name="donationNumber" class="number" value="<?=$donationNumber;?>" id="dn" 
					<? if(!isset($_GET['id'])){ echo "required"; }else{ echo "disabled";}?> />
                	<? if(isset($_GET['id'])){?> <input type="hidden" name="donationNumber" value="<?=$donationNumber;?>" id="edn" /> <? }?>
                </p>
          		<p class="error" id="donationNumber"></p>
            </div>
            <div style="clear:both"></div>
       	</div>
        
        <div class="inputleft inputright" style="width:20%">
        	<p class="entry" <? if(!isset($_GET['id'])){?> onclick="donationEntry();" <? }?>>
            	<? if(!isset($_GET['id'])){ echo "विवरण हाल्नुहोस";}else{ echo "विवरण";}?>
         	</p>
        </div>
        <? if(!isset($_GET['id']))
		{?>
        	<div class="inputleft inputright" style="width:30%; color:red; display:none" id="dnError">
           		[ Please Enter Donation Info ]
        	</div>
        <? }?>
        <? if(isset($_GET['id']))
		{?>
        	<div class="inputleft inputright" style="width:21%">
        		<p class="entry" onclick="donationSingle();">
            		<? echo "Add new row";?>
         		</p>
        	</div>
        <? }?>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr id="entryTr">
	<td colspan="20">
    	<div id="entry">
        	<? if(isset($_GET['id']))
			{?>
				<ul class="entrylist" id="entrylist">
					<li>
    					<ul>
							<li style="width:140px;">नाम</li>
                            <?
							if($donationUnit==56)
							{?>
                            	<li style="width:70px">जात/जाती</li>
            					<li style="width:50px">लिगं</li>
                                <li style="width:55px">उमेर</li>
							<? }?>
                            <li style="width:105px;">गा.वि.स./न. पा.</li>
							<li style="width:50px">वडा नं.</li>
							<li style="width:110px">वस्तु</li>
							<li style="width:75px">रकम(रु)</li>
							<div style="clear:both"></div>
						</ul>
					</li>
                <?
            	$donation=$program->getDonationByParentId($_GET['id']); $i=0;
				while($dGet=$conn->fetchArray($donation))
				{?>
					<li id="delete<?=$i?>">
                        <ul>
                            <li>
                            	<input type="text" name="name[]" class="text" style="width:135px" value="<?=$dGet['name'];?>" required />
                           	</li>
                            <?
							if($donationUnit==56)
							{?>
                            	<li><input type="text" name="cast[]" class="text" style="width:70px" value="<?=$dGet['cast'];?>" required /></li>
                                <li>
                                    <select name="gender[]" class="text" id="gender" style="width:50px;">
                                        <option value="">लिगं</option>
                                        <?
                                        $unit=$groups->getUnitByCategory("लिगं");
                                        while($unitGet=$conn->fetchArray($unit))
                                        {?>
                                            <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$dGet['gender']){ echo 'selected="selected"';}?>>
                                                <?=$unitGet['name'];?>
                                            </option>
                                        <? }
                                        ?>
                                    </select>
                                </li>
                                <li><input type="text" name="age[]" class="text" style="width:40px" value="<?=$dGet['age'];?>" required /></li>
                            <? }?>
                            <li>
                            	<input type="text" name="addressVdcMunicipality[]" class="text" style="width:100px" 
                                value="<?=$dGet['addressVdcMunicipality'];?>" 
                            	required />
                        	</li>
                            <li>
                            	<input type="text" name="addressWardNumber[]" class="text" style="width:56px" 
                                value="<?=$dGet['addressWardNumber'];?>" 
                            	required />
                        	</li>
                            <li>
                            	<input type="text" name="object[]" class="text" style="width:100px" value="<?=$dGet['object'];?>" required />
                           	</li>
                            <li style="margin-right:0">
                            	<input type="text" name="amount[]" class="text" style="width:60px" value="<?=$dGet['amount'];?>" required />
                           	</li>
                            <li style="margin-right:0"><p class="delete" onclick="deleteRowEditDonation('delete<?=$i?>','<?=$dGet['id']?>');">delete</p></li>
                            <div style="clear:both"></div>
                        </ul>
      				</li>
				<? $i++; }
				echo '</ul>';
            }?>
        </div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">कैफियत :</strong></td>
    <td>
    	<textarea name="remarks" rows="1" style="padding:3px 4px" cols="44"><?=$remarks;?></textarea>
    </td>
</tr>