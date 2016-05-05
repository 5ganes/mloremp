<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:105px;}
</style>
<table class="report" width="70%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:200px">जिल्ला</th>
    	<th class="priceheading" style="width:320px">सहभागीको नाम</th>
        <th class="priceheading" style="width:400px">ठेगाना</th>
        <th class="priceheading" style="width:150px">लिङ्ग</th>
        <th class="priceheading" style="width:270px">जात / जाती</th>
    </tr>
    <?
	$trainee=$program->getTraineeByParentId($programId); //print_r($conn->fetchArray($rate));
	while($traineeGet=$conn->fetchArray($trainee))
	{?>
        <tr>
        	<td>
                <table>
                    <tr>
                        <td class="pricedata"><? $dist=$conn->fetchArray($program->getDistrictByUserId($rec['userId'])); echo $dist['district_name'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class=""><?=$traineeGet['participantName'];?></td>
            <td border="0" class=""><?=$traineeGet['participantAddress'];?></td>
            <td border="0" class="pricedata">
				<? $unit=$program->getUnitById($traineeGet['participantGender']); echo $unit['name'];?>
           	</td>
            <td border="0" class="pricedata"><?=$traineeGet['participantCast'];?></td>
        </tr> 
	<? }?>
</table>