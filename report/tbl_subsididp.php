<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="80%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:450px">नाम</th>
        <? if($rec['donationUnit']==56)
		{?>
        	<th class="priceheading" style="width:300px">जात/जाती</th>
        	<th class="priceheading" style="width:165px">लिगं</th>
        <? }?>
        <th class="priceheading" style="width:300px">गा.वि.स./न. पा.</th>
        <th class="priceheading" style="width:150px">वडा नं.</th>
        <th class="priceheading" style="width:190px">वस्तु</th>
        <th class="priceheading" style="width:135px">रकम(रु)</th>
    </tr>
    <? $don=$program->getDonationByParentId($programId);
    while($donGet=$conn->fetchArray($don))
	{?>
        <tr>
            <td border="0" class=""><?=$donGet['name'];?></td>
             <? if($rec['donationUnit']==56)
            {?>
                <td border="0" class="pricedata"><?=$donGet['cast'];?></td>
                <td border="0" class="pricedata"><? $unit=$program->getUnitById($donGet['gender']); echo $unit['name'];?></td>
            <? }?>
            <td border="0" class="pricedata"><?=$donGet['addressVdcMunicipality'];?></td>
            <td border="0" class="pricedata"><? echo $donGet['addressWardNumber'];?></td>
            <td border="0" class="pricedata"><?=$donGet['object'];?></td>
            <td border="0" class="pricedata"><? echo $donGet['amount'];?></td>
        </tr> 
	<? }?>
</table>