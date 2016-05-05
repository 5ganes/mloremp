<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:225px">जिल्ला</th>
    	<th class="priceheading" style="width:450px">वजारको नाम</th>
        <th class="priceheading" style="width:300px">बजारको प्रकार</th>
        <th class="priceheading" style="width:165px">बजार क्षेत्रफल(हे.)</th>
        <th class="priceheading" style="width:150px">संञ्चालन शुरु<br>भएको बर्ष</th>
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
        <th class="priceheading" style="width:150px">बजार लाग्ने दिन<br>(हप्तामा)</th>
        <th class="priceheading" style="width:190px">बजार निमार्णमा<br>सरकारी लगानी(रु)</th>
        <th class="priceheading" style="width:135px">बार्षिक कृषि उपजको कारोवार(टन)</th>
        <th class="priceheading" style="width:220px">बार्षिक कृषि उपजको कारोवार रकम(रु)</th>
        <th class="priceheading" style="width:300px">सम्पर्क व्यक्ति/फोन नं</th>
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
            <td border="0" class="pricedata"><?=$rec['marketName'];?></td>
            <td border="0" class="pricedata"><? $unit=$program->getUnitById($rec['marketType']); echo $unit['name'];?></td>
            <td border="0" class="pricedata"><?=$rec['marketAreaHector'];?></td>
            <td border="0" class="pricedata"><?=$rec['establishedYear'];?></td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style="width:225px"><?=$rec['addressVdcMunicipality'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['addressWardNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class="pricedata"><? echo $rec['marketDay'];?></td>
            <td border="0" class="pricedata"><?=$rec['governmentInvestment'];?></td>
            <td border="0" class="pricedata"><? echo $rec['agricultureProductTradeQuantityTon'];?></td>
            <td border="0" class="pricedata"><? echo $rec['agricultureProductTradeAmount'];?></td>
            <td border="0" class="pricedata"><? echo $rec['contactPerson'];?></td>
        </tr>
    <? }?> 
</table>