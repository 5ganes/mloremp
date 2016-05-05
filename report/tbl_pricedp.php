<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:105px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:320px">वस्तु</th>
        <th class="priceheading" style="width:160px">एकाई</th>
        <th class="priceheading" style="width:420px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">खुद्र मुल्य (रु)</th>
                </tr>
                <tr>
                    <th class="priceheading">1</th>
                    <th class="priceheading">2</th>
                    <th class="priceheading">3</th>
                    <th class="priceheading">4</th>
                    <th class="priceheading">5</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:150px">औसत ( रु )</th>
        <th class="priceheading" style="width:400px">कैफियत</th>
    </tr>
    <?
	$priceType=$crop->getCropPriceById($typeId);
	$rate=$program->getPriceListByParentId($programId); //print_r($conn->fetchArray($rate));
    $comm=$crop->getCropPriceByCategory($priceType['priceType']); //print_r($conn->fetchArray($comm));
	while($commGet=$conn->fetchArray($comm))
	{
		$rateGet=$conn->fetchArray($rate);?>
        <tr>
            <td border="0" class=""><?=$commGet['name'];?></td>
            <td border="0" class="pricedata"><?=$commGet['unit'];?></td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style=""><?=$rateGet['rate1'];?></td>
                        <td class="pricedata" style=""><?=$rateGet['rate2'];?></td>
                        <td class="pricedata" style=""><?=$rateGet['rate3'];?></td>
                        <td class="pricedata" style=""><?=$rateGet['rate4'];?></td>
                        <td class="pricedata" style=""><?=$rateGet['rate5'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class="pricedata"><?=$rateGet['average'];?></td>
            <td border="0" class="pricedata"><?=$rateGet['remarks'];?></td>
        </tr> 
	<? }?>
</table>