<style>
	.priceheading{width:78px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; border:none; width:91px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:130px">जिल्ला</th>
        <th class="priceheading" style="width:190px">पकेट क्षेत्रको नाम</th>
        <th class="priceheading" style="width:160px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">पकेट क्षेत्र(जम्मा)</th>
                </tr>
                <tr>
                    <th class="priceheading">परिवार संख्या</th>
                    <th class="priceheading">जनसंख्या</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:160px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">पकेट क्षेत्र(कृषक)</th>
                </tr>
                <tr>
                    <th class="priceheading">परिवार संख्या</th>
                    <th class="priceheading">जनसंख्या</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:160px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">पकेट क्षेत्र(कृषक)</th>
                </tr>
                <tr>
                    <th class="priceheading">महिला संख्या</th>
                    <th class="priceheading">पुरुष संख्या</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:220px">बालीहरु</th>
        <th class="priceheading" style="width:240px">आधारभूत सेवा</th>
        
        <th class="priceheading" style="width:160px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">क्षेत्रफल(हेक्टर)</th>
                </tr>
                <tr>
                    <th class="priceheading">सिंचित</th>
                    <th class="priceheading">असिंचित</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:160px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">उत्पादन(टन)</th>
                </tr>
                <tr>
                    <th class="priceheading">सिंचित</th>
                    <th class="priceheading">असिंचित</th>
                </tr>
            </table>
        </th>
        
        <th class="priceheading" style="width:190px">कृषकतह मुल्य(प्रति टन)</th>
        <th class="priceheading" style="width:90px">बजार मुल्य(प्रति टन)</th>
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
                        <td class=""><?=$rec['pocketAreaName'];?></td>
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['totalFamilyNumber'];?></td>
                        <td class="pricedata"><?=$rec['totalPopulation'];?></td>
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['farmerFamilyNumber'];?></td>
                        <td class="pricedata"><?=$rec['farmerPopulation'];?></td>
                    </tr>
                </table>
            </td>
            <td style="" border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['femaleNumber'];?></td>
                        <td class="pricedata"><?=$rec['maleNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table style="width:100%">
                    <tr>
                        <td class="pricedata" colspan="20">
                            <? echo $rec['firstCrop'],", ".$rec['secondCrop'].", ".$rec['thirdCrop'];?>
                        </td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table style="width:100%">
                    <tr>
                        <td class="pricedata" colspan="20">
                            <? $unit=$program->getUnitById($rec['fundamentalService']); echo $unit['name'];?>
                        </td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['irrigatedAreaHector'];?></td>
                        <td class="pricedata"><?=$rec['unirrigatedAreaHector'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['irrigatedProductionTon'];?></td>
                        <td class="pricedata"><?=$rec['unirrigatedProductionTon'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['farmerPriceTon'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['marketPriceTon'];?></td>
                    </tr>
                </table>
            </td>
        </tr> 
	<? }?>
</table>