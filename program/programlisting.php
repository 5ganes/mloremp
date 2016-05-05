<table width="100%" border="0" cellspacing="0" cellpadding="2">
  	<tr>
    	<td colspan="8" class="heading2">
			&nbsp;<?php
			if ($_GET['groupType']=="select")
			{
				echo "Program List";
			}
			else
			{
				$priceType="";
				if(isset($_GET['priceType'])){ $priceType=" / ".$_GET['priceType'];}
				echo "Showing Programs of " . $program->getNameById($_GET['groupType']).$priceType;
			}
			?>
       	</td>
  	</tr>
  	<tr bgcolor="#F1F1F1">
    	<td class="tahomabold11" style="width:10px">S.No</td>
        <td class="tahomabold11" style="width:130px">आर्थिक वर्ष</td>
    	<td class="tahomabold11" style="width:200px">जिल्ला</td>
   	 	<td class="tahomabold11" style="width:140px">मिती</td>
        <? if(isset($_GET['priceType']))
		{?>
        	<td class="tahomabold11" style="width:140px;">संकलन मिति</td>
        <? }?>
        <? if(isset($_GET['groupType']) and $_GET['groupType']==CROP)
		{?>
        	<td class="tahomabold11" style="width:140px; text-align:left">वाली</td>
        <? }?>
        <td class="tahomabold11" style="width:90px">Publish</td>
    	<td class="tahomabold11" style="width:90px">Weight</td>
    	<td class="tahomabold11" style="width:100px">Action</td>
  	</tr>
  	<?php
	$counter = 0;
	if(isset($_GET['priceType']))
		$result = $program->getTableDataByPriceTypeAndUser($selectedGroupType,$_GET['priceType'],$userGet['id']);
	else	
		$result = $program->getTableDataByTypeAndUserId($selectedGroupType,$userGet['id']);
	while ($row = $conn->fetchArray($result))
	{
		$counter++;
		?>
  		<tr <?php if ($counter % 2 == 0) { echo "bgcolor='#F7F7F7'";} ?>>
            <td valign="top" align="center"><?php echo $counter; ?></td>
            <td valign="top" align="center"><?=$row['fiscalYear'];?></td>
            <td valign="top" align="center">
				<? $uId=$row['userId']; 
				$district=$conn->fetchArray(mysql_query("select district_name from district where id in (select district from usergroups where id='$uId')"));
				echo $district['district_name']; ?>
          	</td>
            <td valign="top" align="center"><?=$row['manualDate'];?></td>
            <? if(isset($_GET['priceType']))
			{?>
            	<td valign="top" align="center"><?=$row['collectedDate'];?></td>
            <? }?>
            <? if(isset($_GET['groupType']) and $_GET['groupType']==CROP)
	    {?>
                <td valign="top" align="left"><?=$row['cropName'];?></td>
            <? }?>
            <td valign="top" align="center"><?=$row['publish'];?></td>
            <td valign="top" align="center"><?php echo $row['weight']; ?></td>
            <td valign="top" align="center">
            	<? if(isset($_GET['priceType']))
				{
      				$priceType="&priceType=".$_GET['priceType'];
                }?>
                <a href="manageprogram.php?page=program&groupType=<?=$_GET['groupType']?><?=$priceType?>&id=<?php echo $row['id']; ?>">Edit</a> /      			
      			<a href="program/manage_program.php?groupType=<?php echo $_GET['groupType'];?><?=$priceType?>&id=<?php echo $row['id']; ?>&delete">Delete</a>
        	</td>
  		</tr>
  		
	<?php }?>
</table>
