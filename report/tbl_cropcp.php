<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="70%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:85px">जिल्ला</th>
        <th class="priceheading" style="width:145px">
            वाली
        </th>
        <th class="priceheading" style="width:112px">
            <!-- <table>
                <tr>
                    <th colspan="20" style="border:none;"> -->क्षेत्रफल ( हेक्टर )<!-- </th>
                </tr>
                <tr>
                    <th class="priceheading">सिंचित</th>
                    <th class="priceheading">असिंचित</th>
                </tr>
            </table> -->
        </th>
        <th class="priceheading" style="width:112px">
            <!-- <table>
                <tr>
                    <th colspan="20" style="border:none;"> -->उत्पादन ( मेट्रिक टन )<!-- </th>
                </tr>
                <tr>
                    <th class="priceheading">सिंचित</th>
                    <th class="priceheading">असिंचित</th>
                </tr>
            </table> -->
        </th>
        <th class="priceheading" style="width:56px">कृषकतह मुल्य(प्रति टन)</th>
        <th class="priceheading" style="width:56px">बजार मुल्य(प्रति टन)</th>
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
            <td style="" border="0">
                <table>
                    <tr>
                        <td class=""><?=$rec['cropName'];?></td>
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['totalAreaHector'];?></td>
                        <!-- <td class="pricedata"><?=$rec['unirrigatedAreaHector'];?></td> -->
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['totalProductionTon'];?></td>
                        <!-- <td class="pricedata"><?=$rec['unirrigatedProductionTon'];?></td> -->
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['farmerPriceTon'];?></td>
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['marketPriceTon'];?></td>
                    </tr>
                </table>
            </td>
        </tr> 
	<? }?>
</table>