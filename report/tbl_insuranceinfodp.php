<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="60%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
        <th class="priceheading" style="width:145px">विमकको नाम</th>

        <th class="priceheading" style="width:145px">वाली</th>
        <th class="priceheading" style="width:56px">विमित बालीको क्षेत्रफल(हे)</th>
        <th class="priceheading" style="width:56px">विमांक रकम(रु)</th>
        <th class="priceheading" style="width:56px">किसानको संख्या</th>
        <th class="priceheading" style="width:140px">सुझाबहरु</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
        <tr>
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:273px;"><?=$rec['insuranceHolder'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata" style="width:273px;"><?=$rec['cropName'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['cropAreaHector'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['insuranceAmount'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['totalFarmer'];?></td></tr>
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