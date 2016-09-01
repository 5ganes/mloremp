<tr>
    <td><strong class="fronttitle">ताालिम भएको मिति</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:28.4%">
        	<div>गते</div>
            <div>
            	<select name="trainingDay" class="text" style="width:120px">
					<?
                        for($day=1;$day<=32;$day++)
                        {?>
                         <option value="<? echo $day;?>" <? if($day==$trainingDay){ echo 'selected="selected"';}?>>
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
            	<select name="trainingMonth" class="text" style="width:120px;">
					<?
                    $unit=$groups->getUnitByCategory("Month");
                    while($unitGet=$conn->fetchArray($unit))
                    {?>
                        <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$trainingMonth){ echo 'selected="selected"';}?>>
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
            	<select name="trainingYear" class="text" style="width:120px">
					<?
                        for($year=2060;$year<=date("y")+2056;$year++)
                        {?>
                         <option value="<? echo $year;?>" <? if($year==$trainingYear){ echo 'selected="selected"';}?>>
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
    <td><strong class="fronttitle">तालिमको नाम</strong> :<span class="asterisk">*</span></td>
    <td>
    	<p><input type="text" name="trainingName" class="text" value="<?=$trainingName;?>" required /></p>
        <p class="error" id="trainingName"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">तालिमको स्तर</strong> :</td>
    <td>
    	<select name="trainingLevel" class="text" onChange="sewakendra_get(this.value)">
            <?
			$level=mysql_query("select id,program_level from programlevel where publish='Yes'");
			while($levelGet=mysql_fetch_array($level))
			{?>
				<option value="<?=$levelGet['id'];?>" <? if($trainingLevel==$levelGet['id']){ echo 'selected="selected"';}?>>
					<?=$levelGet['program_level'];?>
              	</option>	
			<? }
			?>
        </select>&nbsp;&nbsp;
        सेवाकेन्द्र : 
        <select name="sewakendra" class="text" id="sewakendra">
            
        </select>
 	</td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">सहभागी संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:20%">
        	<p>
            	<input type="text" name="participantNumber" class="number" value="<?=$participantNumber;?>" id="pn" 
				<? if(!isset($_GET['id'])){ echo "required"; }else{ echo "disabled";}?>/>
          		<? if(isset($_GET['id'])){?> <input type="hidden" name="participantNumber" value="<?=$participantNumber;?>" id="epn" /> <? }?>
            </p>
        	<p class="error" id="participantNumber" style="text-align:left; margin-left:9x; font-size:11px;"></p>
    	</div>
        <div class="inputleft inputright" style="width:30%">
        	<p class="entry" <? if(!isset($_GET['id'])){?> onclick="participantEntry();" <? }?>>
            	<? if(!isset($_GET['id'])){ echo "ताालिम सहभागी हाल्नुहोस";}else{ echo "ताालिम सहभागीहरु";}?>
         	</p>
        </div>
        
        <? if(!isset($_GET['id']))
		{?>
        	<div class="inputleft inputright" style="width:30%;color:red; display:none" id="pnError">
        		[ Please Enter Participants ]
            </div>
        <? }?>
        <? if(isset($_GET['id']))
		{?>
        	<div class="inputleft inputright" style="width:30%">
        		<p class="entry" onclick="entrySingle();">
            		<? echo "Add new row";?>
         		</p>
        	</div>
        <? }?>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr id="entryTr">
	<td></td>
	<td>
    	<div id="entry">
        	<? if(isset($_GET['id']))
			{
				echo '<ul class="entrylist" id="entrylist">';
				echo '<li>
    					<ul>
							<li style="width:150px;">सहभागीको नाम</li>
							<li style="width:140px;">ठेगाना</li>
							<li style="width:70px">लिङ्ग</li>
							<li style="width:85px">जात / जाती</li>
							<li style="width:55px">उमेर</li>
							<div style="clear:both"></div>
						</ul>
					</li>';
            	$trainee=$program->getTraineeByTrainingId($_GET['id']); $i=0;
				while($tGet=$conn->fetchArray($trainee))
				{?>
					<li id="delete<?=$i?>">
                        <ul>
                            <li>
                            	<input type="text" name="participantName[]" class="text" style="width:145px" value="<?=$tGet['participantName'];?>" required />
                           	</li>
                            <li>
                            	<input type="text" name="participantAddress[]" class="text" style="width:135px" value="<?=$tGet['participantAddress'];?>" 
                            	required />
                        	</li>
                            <li>
                                <select name="participantGender[]" class="text" style="width:65px">
                                    <?
                                    $unit=$groups->getUnitByCategory("लिगं");
                                    while($unitGet=$conn->fetchArray($unit))
                                    {?>
                                        <option value="<?=$unitGet['id'];?>" <? if($unitGet['id']==$tGet['participantGender']){ echo 'selected="selected"';}?>>
                                            <?=$unitGet['name'];?>
                                        </option>
                                    <? }
                                    ?>
                                </select>
                            </li>
                            <li>
                            	<select name="participantCast[]" class="text" style="width:90px">
									<?
                                    $caste=$program->getCaste();
                                    while($casteGet=$conn->fetchArray($caste))
                                    {?>
                                        <option value="<?=$casteGet['name'];?>" <? if($casteGet['name']==$tGet['participantCast']){ echo 'selected="selected"';}?>>
                                            <?=$casteGet['name'];?>
                                        </option>  
                                    <? }
                                    ?>
                                </select>	
                           	</li>
                            <li>
                            	<input type="text" name="participantAge[]" class="text" style="width:40px" value="<?=$tGet['participantAge'];?>" required />
                            </li>
                            <li style="margin-right:0"><p class="delete" onclick="deleteRowEdit('delete<?=$i?>','<?=$tGet['id']?>');">delete</p></li>
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
    <td><strong class="fronttitle">पुरुष संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="maleNumber" class="number" value="<?=$maleNumber;?>" required /></p>
       	 	<p class="error" id="maleNumber"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">महिला संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="femaleNumber" class="number" value="<?=$femaleNumber;?>" required /></p>
        	<p class="error" id="femaleNumber"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">दलितको संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
            <p><input type="text" name="lowcastNumber" class="number" value="<?=$lowcastNumber;?>" required /></p>
            <p class="error" id="lowcastNumber"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">जनजातिको संख्या</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="indigenousNumber" class="number" value="<?=$indigenousNumber;?>" required /></p>
        	<p class="error" id="indigenousNumber"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<tr>
    <td><strong class="fronttitle">अन्य</strong> :<span class="asterisk">*</span></td>
    <td>
    	<div class="inputleft" style="width:14%">
    		<p><input type="text" name="otherNumber" class="number" value="<?=$otherNumber;?>" required /></p>
        	<p class="error" id="indigenousNumber"></p>
    	</div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr><td></td></tr>

<script type="text/javascript">
    function sewakendra_get(value){
        // alert(value);
        var xml;
        if(window.XMLHttpRequest)
        {
            xml=new XMLHttpRequest();
        }
        else
        {
            xml=new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xml.onreadystatechange=function()
        {           
            if(xml.readyState==4)
            {
                document.getElementById("sewakendra").innerHTML=xml.responseText;
            }
        }
        
        var url="forms/sewakendra_ajax.php?id="+value;
        //alert(url);
        xml.open("GET", url, true);
        xml.send();
    }
</script>