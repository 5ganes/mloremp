<style>
	.priceheading{width:162px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; border:none; width:190px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
        <th class="priceheading" style="width:315px">स्रोत केन्द्र/नर्सरीको नाम</th>
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
        <th class="priceheading" style="width:145px">दर्ता भएको/नभएको</th>
        <th class="priceheading" style="width:160px">दर्ता मिती</th>
        <th class="priceheading" style="width:230px">स्रोत केन्द्रवाट प्रवाह हुने वस्तु तथा सेवा</th>
        <th class="priceheading" style="width:150px">सम्पर्क व्यक्ति</th>
        <th class="priceheading" style="width:130px">फोन नं.</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
        <tr>
            <td border="0">
                <table>
                    <tr><td class=""><?=$rec['shrotKendra'];?></td></tr>
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
                    <tr>
                        <td class="">
                            <? $reg=$program->getUnitById($rec['registration']); echo $reg['name'];?>
                        </td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['registeredDay'];?>/<?=$rec['registeredMonth'];?>/<?=$rec['registeredYear'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['shrotKendraService'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['contactPerson'];?></td></tr>
                </table>
            </td>
            <td border="0">
                <table>
                    <tr><td class="pricedata"><?=$rec['phoneNumber'];?></td></tr>
                </table>
            </td>
        </tr>
    <? }?> 
</table>