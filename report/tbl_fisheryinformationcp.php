<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="70%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:85px">जिल्ला</th>
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
        <th class="priceheading" style="width:56px">पोखरीको प्रकार</th>
        <th class="priceheading" style="width:56px">पोखरी संख्या</th>
        <th class="priceheading" style="width:140px">जलासयको क्षेत्रफल ( हे )</th>
        <th class="priceheading" style="width:140px">माछाको जात</th>
        <th class="priceheading" style="width:70px">गत बर्षको सरदर उत्पादन(Ton)</th>
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
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:273px;"><?=$rec['farmerName'];?></td></tr>
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
                    <tr><td class="pricedata"><? $unt=$program->getUnitById($rec['lakeType']); echo $unt['name'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['lakeNumber'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:210px"><?=$rec['lakeAreaHector'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:210px"><?=$rec['fishSpecies'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:210px"><?=$rec['productionTon'];?></td></tr>
                </table>
            </td>
        </tr>
    <? }?> 
</table>