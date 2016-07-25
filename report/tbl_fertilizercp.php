<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:225px">जिल्ला</th>
    	<th class="priceheading" style="width:360px">विक्रि केन्द्रको नाम</th>
        <th class="priceheading" style="width:280px">विक्रि केन्द्रको किसिम</th>
        <th class="priceheading" style="width:420px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">ठेगाना</th>
                </tr>
                <tr>
                    <th class="priceheading" style="width:225px">गा.वि.स./न. पा.</th>
                    <th class="priceheading" style="width:100px">वडा नं.</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:350px">प्रोपाइटरको नाम</th>
        <th class="priceheading" style="width:220px">सम्पर्क नं.</th>
        <th class="priceheading" style="width:105px">दर्ता नं.</th>
        <th class="priceheading" style="width:105px">नवीकरण</th>
        <th class="priceheading" style="width:155px">दर्ता भएको वर्ष</th>
        <th class="priceheading" style="width:330px">विक्रि हुने बस्तु</th>
        <th class="priceheading" style="width:330px">कैफियत</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
        <tr>
        	<td>
                <table>
                    <tr>
                        <td class="pricedata"><? $dist=$conn->fetchArray($program->getDistrictByUserId($rec['userId'])); echo $dist['district_name'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['sellingOffice'];?>
            </td>
            <td border="0">
                <table><tr><td class="pricedata"><? $unt=$program->getUnitById($rec['sellingOfficeType']); echo $unt['name'];?></td></tr></table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style="width:225px"><?=$rec['addressVdcMunicipality'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['addressWardNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['proprietorName'];?>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['contactNumber'];?>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['registrationNumber'];?>
            </td>
            <td border="0" class="pricedata">
                <? $unt=$program->getUnitById($rec['renewStatus']); echo $unt['name'];?>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['registeredYear'];?>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['sellingObject'];?>
            </td>
            <td border="0" class="pricedata">
                <?=$rec['remarks'];?>
            </td>
        </tr>
    <? }?> 
</table>