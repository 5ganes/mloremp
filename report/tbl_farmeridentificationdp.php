<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="65%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
        <th class="priceheading" style="width:145px">कृषकको नाम</th>
        <th class="priceheading" style="width:160px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">ठेगाना</th>
                </tr>
                <tr>
                    <th class="priceheading">गा.वि.स./न. पा.</th>
                    <th class="priceheading">वडा नं.</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:56px">कृषकको उमेर</th>
        <th class="priceheading" style="width:56px">गर्ने मुख्य वाली</th>
        <th class="priceheading" style="width:80px">जात/जाती</th>
        <th class="priceheading" style="width:140px">प्राप्त गरेको आइडीको किसिम</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
        <tr>
            <td border="0">
                <table>
                    <tr><td class="" style="width:273px;"><?=$rec['farmerName'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['addressVdcMunicipality'];?></td>
                        <td class="pricedata"><?=$rec['addressWardNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['farmerAge'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['mainCrop'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['farmerCaste'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:210px"><? $unt=$program->getUnitById($rec['farmerIdType']); echo $unt['name'];?></td></tr>
                </table>
            </td>
        </tr>
    <? }?> 
</table>