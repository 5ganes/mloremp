<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; border:none; width:107px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:360px">सेवा केन्द्रको नाम</th>
        <th class="priceheading" style="width:280px">वाली</th>
        <th class="priceheading" style="width:350px">कृषकको नाम थर</th>
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
        <th class="priceheading" style="width:120px">जग्गाको किसिम</th>
        <th class="priceheading" style="width:105px">वीउको किसिम</th>
        <th class="priceheading" style="width:220px">वाली कटानी <br />उत्पादन(kg)</th>
        <th class="priceheading" style="width:100px">चिस्यान(%)</th>
        <th class="priceheading" style="width:100px">उत्पादकत्व</th>
        <th class="priceheading" style="width:330px">कैफियत</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
        <tr>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['sewaKendra'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['cropName'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['farmerName'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style="width:225px"><?=$rec['addressVdcMunicipality'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['addressWardNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><? $unt=$program->getUnitById($rec['landType']); echo $unt['name'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><? $unt=$program->getUnitById($rec['seedType']); echo $unt['name'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="">
                            <? $unt=$program->getUnitById($rec['productionUnit']);
                            echo $rec['cropCuttingProduction']." / (".$unt['name'].")";?>
                        </td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['moisturePercent'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['productivity'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['remarks'];?></td></tr>
                </table>
            </td>
        </tr>
    <? }?> 
</table>