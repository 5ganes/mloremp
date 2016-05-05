<style>
	.inputleft{ float:left; width:17%; margin-bottom:3px;}
</style>
<script src="sumoselect/jquery.sumoselect.js"></script>
<link href="sumoselect/sumoselect.css" rel="stylesheet" />
<script type="text/javascript">
	$(document).ready(function () {
		window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 1 });
		window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
		window.testSelAll = $('.testSelAll').SumoSelect({okCancelInMulti:true, selectAll:true });
		window.testSelAll2 = $('.testSelAll2').SumoSelect({selectAll:true });

		window.Search = $('.search-box').SumoSelect({ csvDispCount: 1, search: true, searchText:'Enter here.' });
		window.searchSelAll = $('.search-box-sel-all').SumoSelect({ csvDispCount: 1, selectAll:true, search: true, searchText:'Enter here.', 
		okCancelInMulti:true });
	});
</script>

<script>
	function sumoSelect()
	{
		var cropName = [];
		var district = [];
		var month = [];
		var priceType = [];
		var programName = [];
		$('.crop').find('.selected').each(function(){
			cropName.push($(this).attr('data-val'));
		});
		$('.district').find('.selected').each(function(){
			district.push($(this).attr('data-val'));
		});
		$('.month').find('.selected').each(function(){
			month.push($(this).attr('data-val'));
		});
		$('.price').find('.selected').each(function(){
			priceType.push($(this).attr('data-val'));
		});
		$('.program').find('.selected').each(function(){
			programName.push($(this).attr('data-val'));
		});
		cropName=cropName.toString();
		district=district.toString();
		month=month.toString();
		priceType=priceType.toString();
		programName=programName.toString();
		
		$('<input />').attr('type', 'hidden')
          .attr('name', "cropName")
          .attr('value', cropName)
          .appendTo('#myForm');
		
		$('<input />').attr('type', 'hidden')
          .attr('name', "district")
          .attr('value', district)
          .appendTo('#myForm');
	    
		$('<input />').attr('type', 'hidden')
          .attr('name', "month")
          .attr('value', month)
          .appendTo('#myForm');
		
		$('<input />').attr('type', 'hidden')
          .attr('name', "priceType")
          .attr('value', priceType)
          .appendTo('#myForm');
		
		$('<input />').attr('type', 'hidden')
          .attr('name', "programName")
          .attr('value', programName)
          .appendTo('#myForm');
		
		//alert(month); return false;
		return true;
	}
</script>
<style>
	#program p{ width:188px;}
	.price p{ width:170px;}
	#month p{width:100px;}
	.district p{width:120px;}
	
	.printexcel{font-size:12px; margin-left:5px; color:red; cursor:pointer; font-weight:bold; padding:1px 12px; border:1px solid}
        .printexcel:hover{color:#000}
</style>

<tr>
    <td class="heading2">
        <span style="color:#cc0000">
            &nbsp;Manage Form Reports 
            <?
          	$prName=$program->getTypeById($_GET['typeId']); //$distName=$program->getDistrictById($_GET['districtId']);
         	echo "/ ".$prName['program_name']; //echo " / ".$distName['district_name'];
            ?>
        </span>
    </td>
</tr>
<tr>
	<td class="bgborder">
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
		<td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			
			<tr>
			  <td>
			  
              <!-- reporting-->
         	  <table width="100%" cellspacing="0" cellpadding="2" border="0" style="font-size:11px;">
              	<tr>
               		<td>
                    	<table width="100%" cellspacing="6" cellpadding="2" border="0" style="margin:1% 0">
                             <form method="post" action="" id="myForm" onsubmit="sumoSelect();">
                             	<tr>
                                    <td width="70"><strong>आर्थिक वर्ष: </strong></td>
                                    <td width="110">
                                        <div class="" style="width:17%">
                                            <select name="fiscalYear" style="width:100px; padding:2px;">
                                                <?
                                                for($year=2050;$year<=date("y")+2056;$year++)
                                                { 	$check=$year."/".($year+1);?>
                                                    <option value="<? echo $check;?>"><? echo $check;?></option>		
                                                <? }
                                                ?>
                                            </select>
                                        </div>
                                   	</td>
                                    
                                    <td width="100">
                                        <div class="district" style="width:20%; height:24px;" id="district">
                                            <select multiple="multiple" placeholder="Select District" class="testSelAll2" 
                                            onchange="console.log($(this).children(':selected').length)" required>
												<?
                                                $dist=$program->getDistrictsByUsers();
												while($distGet=$conn->fetchArray($dist))
												{?>
                                                    <option value="<?=$distGet['id'];?>">
                                                        <?=$distGet['district_name'];?>
                                                    </option>
                                                <? }
                                                ?>
                                            </select>
                                        </div>
                                        <div style="clear:both"></div>
                                    </td>
                                    
                                    <? if($prName['table_name']=="tbl_monthlyreporting" or $prName['table_name']=="tbl_price")
							 		{?>
                                    	
                                        <td>
                                            <div class="inputleft month" style="width:78%; height:21px;" id="month">
                                                <select multiple="multiple" placeholder="Select Months" class="testSelAll2" 
                                                onchange="console.log($(this).children(':selected').length)" required>
                                                    <?
                                                    $unit=$groups->getUnitByCategory("Month");
                                                    while($unitGet=$conn->fetchArray($unit))
                                                    {?>
                                                        <option value="<?=$unitGet['id'];?>">
                                                            <?=$unitGet['name'];?>
                                                        </option>
                                                    <? }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    <? }?>
                                    
                                    <? if($prName['table_name']=="tbl_crop" or $prName['table_name']=="tbl_cropcutting" or 
									$prName['table_name']=="tbl_monthlyreporting")
							 		{?>
                                    	
                                        <td width="200">
                                            <div class="inputleft crop" style="width:53%; height:21px;">
                                                <select multiple="multiple" placeholder="Crops" class="testSelAll2" 
                                                onchange="console.log($(this).children(':selected').length)" required>
                                                   <?
                                                   $crp=$crop->getCrops();
                                                   while($crpGet=$conn->fetchArray($crp))
                                                   {?>
                                                        <option value="<?=$crpGet['name'];?>"><?=$crpGet['name'];?></option>
                                                    <? }?>
                                                </select>
                                            </div>
                                            <div style="clear:both"></div>
                                        </td>
                                    <? }?>
                                    
									<? if($prName['table_name']=="tbl_price")
							 		{?>
                                    	
                                        <td>
                                            <div class="inputleft price" style="width:53%; height:21px;">
                                                <select multiple="multiple" placeholder="Price Type" class="testSelAll2" 
                                                onchange="console.log($(this).children(':selected').length)" required>
                                                   <option value="पाक्षिक खुद्रा मूल्य">Quarterly Retail Price</option>
                                                   <option value="पाक्षिक सिमावर्तिय खुद्रा मूल्य">Quarterly Border Retail Price</option>
                                                    <option value="पाक्षिक थोक मूल्य">Quarterly Wholesale Price</option>
                                                </select>
                                            </div>
                                            <div style="clear:both"></div>
                                        </td>
                                    <? }?>
                                    
                                    <? if($prName['table_name']=="tbl_subsidi")
							 		{?>
                                    	<td width="90"><strong>कार्यक्रम छान्नुहोस्</strong></td>
                                        <td width="210">
                                            <div class="inputleft program" style="width:98%; height:21px;" id="program">
                                                <select multiple="multiple" placeholder="Select Program" class="testSelAll2" 
                                                onchange="console.log($(this).children(':selected').length)" required>
                                                    <?
                                                    $prm=$conn->exec("select programName from tbl_subsidi order by weight");
                                                    while($prmGet=$conn->fetchArray($prm))
                                                    {?>
                                                        <option value="<?=$prmGet['programName'];?>">
                                                            <?=$prmGet['programName'];?>
                                                        </option>
                                                    <? }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    <? }?>
                                    
                                    <td><input type="submit" name="search" class="number" value="Search Records" /></td>
                                </tr>
                             
                            </form>                           
                   		</table>
                 	</td>
              	</tr>
       		  </table>
			  <!--end reporting-->
              
              </td>
			</tr>
		  </table></td>
	  </tr>
		</table>
	</td>
</tr>

<?
if(isset($_POST['search']))
{?>
<tr>
    <td class="heading2">
        <span style="color:#cc0000">
            &nbsp; 
            <?
                $prName=$program->getTypeById($_GET['typeId']);
                echo $prName['program_name']." List";
            ?>
        </span>
    </td>
</tr>
<tr>
	<td class="bgborder">
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
		<td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			
			<tr>
			  <td>
			  <table width="100%"  border="0" cellpadding="4" cellspacing="0">
				 
				  <tr bgcolor="#F1F1F1">
					<td class="tahomabold11" style="width:100px">S.No</td>
					<td class="tahomabold11" style="text-align:left">Fiscal Year</td>
					<td class="tahomabold11" style="width:250px">District</td>
					<td class="tahomabold11" style="width:250px">Upload Date</td>
					<td class="tahomabold11">Action</td>
				</tr>
				  
				  <?php
				  $counter = 0;
				  
				  $district=$program->getDistrictByUserId($_SESSION['userId']);
				  $district=$conn->fetchArray($district);
				  extract($_POST); //print_r($district); die();
				  if($prName['table_name']=="tbl_crop" or $prName['table_name']=="tbl_cropcutting")
				  {
						//echo $cropName; die();
						$table=$program->getTableDataByTypeAndFiscalYearAndCropListAndDistrict($_GET['typeId'],$fiscalYear,$cropName,$district);  
				  }
				  else if($prName['table_name']=="tbl_monthlyreporting")
				  {
						$table=$program->getTableDataByTypeAndFiscalYearAndCropListAndMonthAndDistrict($_GET['typeId'],$fiscalYear,$cropName,$month,$district);  
				  }
				  else if($prName['table_name']=="tbl_price")
				  {
					  $table=$program->getTableDataByTypeAndFiscalYearAndPriceTypeAndMonthAndDistrict($_GET['typeId'],$fiscalYear,$priceType,$month,$district);  
				  }
				  else if($prName['table_name']=="tbl_subsidi")
				  {
						$table=$program->getTableDataByTypeAndFiscalYearAndProgramNameAndDistrict($_GET['typeId'],$fiscalYear,$programName,$district);  
				  }
				  else
				  {
				  		$table=$program->getTableDataByTypeAndFiscalYearAndDistrict($_GET['typeId'],$fiscalYear,$district);
				  }
				  while ($row = $conn->fetchArray($table))
				  {
					$counter++;
					?>
					<tr <?php if ($counter % 2 == 0) { echo "bgcolor='#F7F7F7'";} ?>>
						<td valign="top" align="center"><?php echo $counter; ?></td>
						<td valign="top" align="left"><?=$row['fiscalYear'];?></td>
						<td valign="top" align="center">
							<? $distName=$program->getDistrictByUserId($row['userId']); $distName=$conn->fetchArray($distName); 
							echo $distName['district_name'];?>
                     	</td>
						<td valign="top" align="center"><? echo $row['manualDate'];?></td>
						<td valign="top" align="center">
						   <a href="report/districtprintcentral.php?typeId=<?=$_GET['typeId']?>&programId=<?php echo $row['id'];?>&district=<?=$district?>" 
                           target="_blank">Print</a> 
						</td>
					</tr>
				  <? }?>
					
			  </table>
			  </td>
			</tr>
		  </table></td>
	  </tr>
		</table>
	</td>
</tr>

<? if($prName['table_name']!="tbl_price" and $prName['table_name']!="tbl_training" and $prName['table_name']!="tbl_subsidi" and 
$prName['table_name']!="tbl_cropprofit" and $prName['table_name']!="tbl_fruitprofit")
{?>
    <tr>
        <td>
            <table>
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                	<?
					$link='report/districtprintcentral.php?typeId='.$_GET['typeId'].'&district='.$district.'&fiscalYear='.$fiscalYear;
					$excel='excelcp.php?typeId='.$_GET['typeId'].'&district='.$district.'&fiscalYear='.$fiscalYear;
					if($prName['table_name']=="tbl_crop" or $prName['table_name']=="tbl_cropcutting")
					{
						$fInput='<input type="hidden" name="cropName" value="'.$cropName.'" />';
					}
					if($prName['table_name']=="tbl_monthlyreporting")
					{
						$fInput='<input type="hidden" name="cropName" value="'.$cropName.'" />';
						$fInput=$fInput.'<input type="hidden" name="month" value="'.$month.'" />';
					}
					if($prName['table_name']=="tbl_price")
					{
						$fInput='<input type="hidden" name="priceType" value="'.$priceType.'" />';
						$fInput=$fInput.'<input type="hidden" name="month" value="'.$month.'" />';
					}
					if($prName['table_name']=="tbl_subsidi")
					{
						$fInput='<input type="hidden" name="programName" value="'.$programName.'" />';
					}
					?>
                    <td>
                        <form action="<?=$link?>" method="post">
							<?=$fInput;?> 
                            <input class="printexcel" type="submit" name="print" value="Print Records" formtarget="_blank" />
                       	</form>
                    </td>
                    <td>
                    	<form action="<?=$excel?>" method="post">
							<?=$fInput;?> 
                            <input class="printexcel" type="submit" name="print" value="Export to Excel" />
                       	</form>
                  	</td>
                </tr>
            </table>
        </td>
    </tr>
<? }?>

<? }?>