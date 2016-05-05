<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:107px;}
</style>
<table class="report" width="100%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:450px">समूह को नाम</th>
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
        <th class="priceheading" style="width:220px">समूहको गठन भएको वर्ष</th>
        <th class="priceheading" style="width:420px">
            <table>
                <tr>
                    <th colspan="20" style="border:none;">समूहको सदस्य संख्या</th>
                </tr>
                <tr>
                    <th class="priceheading" style="width:210px">महिला</th>
                    <th class="priceheading" style="width:210px">पुरुष</th>
                </tr>
            </table>
        </th>
        <th class="priceheading" style="width:210px">दर्ता मिति</th>
        <th class="priceheading" style="width:210px">दर्ता नं.</th>
        <th class="priceheading" style="width:220px">नियमित वैठक वस्ने दिन</th>
        <th class="priceheading" style="width:155px">कोष संकलन(प्रति महिना)Rs</th>
        <th class="priceheading" style="width:300px">हाल सम्मको जम्मा कोष(Rs)</th>
        <th class="priceheading" style="width:230px">कोष परिचालन(ऋण प्रवाह)(Rs)</th>
        <th class="priceheading" style="width:250px">समूहको अवस्था</th>
        <th class="priceheading" style="width:330px">सम्पर्क व्यक्ति/फोन नं</th>
    </tr>
    <? while($rec=$conn->fetchArray($record))
	{?>
    	<tr>
            <td border="0" class="pricedata"><?=$rec['groupName'];?></td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata" style="width:225px"><?=$rec['addressVdcMunicipality'];?></td>
                        <td class="pricedata" style="width:100px"><?=$rec['addressWardNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0">
                <table><tr><td class="pricedata"><?=$rec['establishedYear'];?></td></tr></table>
            </td>
            <td border="0">
                <table>
                    <tr>
                        <td class="pricedata"><?=$rec['femaleNumber'];?></td>
                        <td class="pricedata"><?=$rec['maleNumber'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class="pricedata"><? echo $rec['registeredDay']."/".$rec['registeredMonth']."/".$rec['registeredYear'];?></td>
            <td border="0" class="pricedata"><?=$rec['registrationNumber'];?></td>
            <td border="0" class="pricedata"><?=$rec['meetingDay'];?></td>
            <td border="0" class="pricedata"><?=$rec['collectedFundPerMonth'];?></td>
            <td border="0" class="pricedata"><?=$rec['totalFund'];?></td>
            <td border="0" class="pricedata"><?=$rec['debtAmount'];?></td>
            <td border="0" class="pricedata"><? $unt=$program->getUnitById($rec['groupStatus']); echo $unt['name'];?></td>
            <td border="0" class="pricedata"><?=$rec['contactPerson'];?></td>
        </tr> 
	<? }?>
</table>