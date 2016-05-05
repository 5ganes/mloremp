<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; border:none; width:107px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:360px">महिना</th>
        <th class="priceheading" style="width:280px">वाली</th>
        <th class="priceheading" style="width:420px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">बाली स्थिती</th>
                </tr>
                <tr>
                    <th class="priceheading" style="width:225px">बाली लगाउने कार्य भैरहेको(%)</th>
                    <th class="priceheading" style="width:100px">बाली बढने अवस्था(%)</th>
                    <th class="priceheading" style="width:225px">बालीको फूल लाग्ने अवस्था(%)</th>
                    <th class="priceheading" style="width:100px">बाली कटानी भैरहेको(%)</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:420px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">दैवि प्रकोपको असर</th>
                </tr>
                <tr>
                    <th class="priceheading" style="width:225px">दैवि प्रकोपको किसिम</th>
                    <th class="priceheading" style="width:100px">प्रभावित क्षेत्रफल(%)</th>
                    <th class="priceheading" style="width:225px">प्रभावित परिवार संख्या</th>
                    <th class="priceheading" style="width:100px">उत्पादनमा क्षती(टन)</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:350px">बर्षा स्थिती</th>
        <th class="priceheading" style="width:350px">तापक्रम</th>
        <th class="priceheading" style="width:350px">रासायनिक मलको आपुर्ति</th>
        <th class="priceheading" style="width:340px">बाली लगाउन समाप्त भएको क्षेत्रफल(हे)</th>
        <th class="priceheading" style="width:350px">फूलफुल्ने अवस्था भए आशातित र कटानी भई सकेको भए वास्तविक उत्पादन(टन)</th>
        <th class="priceheading" style="width:350px">गतबर्षको दाजोमा क्षेत्रफल(हे)</th>
        <th class="priceheading" style="width:350px">गतबर्षको दाजोमा उत्पादन(टन)</th>
        <th class="priceheading" style="width:350px">कैफियत</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
        <tr>
            <td border="0">
                <table><tr><td class=""><? $unt=$program->getUnitById($rec['month']); echo $unt['name'];?></td></tr></table>
            </td>
            <td border="0">
                <table><tr><td class=""><?=$rec['cropName'];?></td></tr></table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style="width:225px"><?=$rec['cropWork'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['cropGrowth'];?></td>
                        <td class="pricedata" style="width:225px"><?=$rec['cropMaturity'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['cropHarvest'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style="width:225px"><?=$rec['affectedUnit'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['affectedArea'];?></td>
                        <td class="pricedata" style="width:225px"><?=$rec['affectFamilyNo'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['productionLoss'];?></td>
                    </tr>
                </table>
            </td>
            
            
            <td border="0">
                <table><tr><td class=""><? $unt=$program->getUnitById($rec['rainCondition']); echo $unt['name'];?></td></tr></table>
            </td>
            <td border="0">
                <table><tr><td class=""><? $unt=$program->getUnitById($rec['temperature']); echo $unt['name'];?></td></tr></table>
            </td>
            <td border="0">
                <table><tr><td class=""><? $unt=$program->getUnitById($rec['fertilizerSupplied']); echo $unt['name'];?></td></tr></table>
            </td>
            <td border="0">
                <table><tr><td class="pricedata"><?=$rec['farmingEndedAreaHector'];?></td></tr></table>
            </td>
            <td border="0">
                <table><tr><td class="pricedata"><?=$rec['cutProductionTon'];?></td></tr></table>
            </td>
            <td border="0">
                <table><tr><td class=""><?=$rec['lowHighArea']; $unt=$program->getUnitById($rec['lowHighAreaUnit']); echo " ".$unt['name'];?></td></tr></table>
            </td>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['lowHighProduction']; $unt=$program->getUnitById($rec['lowHighProductionUnit']); echo " ".$unt['name'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table><tr><td class=""><?=$rec['remarks'];?></td></tr></table>
            </td>
        </tr>
    <? }?> 
</table>