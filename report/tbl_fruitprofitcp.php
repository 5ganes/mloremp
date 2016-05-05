<style>
	.priceheading{width:107px; border:1px solid; font-size:13px}
	.pricedata{text-align:center; padding:2px; width:105px;}

	.hdr{ border:1px solid; margin-bottom:5px;}
	.hdr div{ width:336px; line-height:14px;}
	
</style>
<div class="hdr">
        	<div class="sitename" style="float:left">
        		<h4>पकेट क्षेत्र: <?=$rec['pocketSector'];?></h4>
                <h4>कृषि सेवाकेन्द्र: <?=$rec['sewaKendra'];?></h4>
          		<h4>गा.वि.स./न. पा./वडा: <? echo $rec['addressVdcMunicipality']."/".$rec['addressWardNumber'];?></h4>
            	<h4>कृषकको नाम/उमेर: <? echo $rec['farmerName']."/".$rec['farmerAge'];?></h4>
            </div>
            <div class="sitename" style="float:left">
                <h4>कृषकको शिक्षा/अन्य पेशा: <? echo $rec['farmerEducation']."/".$rec['otherOccupation'];?></h4>
          		<h4>समुहको नाम: <?=$rec['groupName'];?></h4>
            	<h4>क्षेत्रफल(कुल जग्गाको)(हे): <?=$rec['totalAreaHector'];?></h4>
            	<h4>क्षेत्रफल(खेति गरेको जग्गाको)(हे): <?=$rec['agricultureAreaHector'];?></h4>
            </div>
            <div class="sitename" style="float:left">
          		<h4>परिवार सदस्य संख्या: <?=$rec['familyNumber'];?></h4>
                <h4>बालीको नाम: <?=$rec['cropName'];?></h4>
                <h4>बालीको जात: <?=$rec['cropSpecies'];?></h4>
            	<h4>बालीको क्षेत्रफल(सिंचित/असिंचित)(हे): <? echo $rec['cropIrrigatedAreaHector']."/".$rec['cropUnirrigatedAreaHector'];?></h4>
            </div>
            <div class="sitename" style="float:left">
                <h4>निर्माण खर्च(रु): <?=$rec['constructionExpense'];?></h4>
                <h4>संकलन कर्ताको नाम: <?=$rec['collectorName'];?></h4>
                <h4>संकलन कर्ताको पद: <?=$rec['collectorPost'];?></h4>
                <h4>बर्ष: <? $unit=$program->getUnitById($rec['fruitYear']); echo $unit['name'];?></h4>
          	</div>
            <div style="clear:both"></div>
     	</div>
<table class="report" width="70%" cellspacing="2" cellpadding="2" border="1" style="font-size:14px">
    <tr>
    	<th class="priceheading" style="width:400px">जिल्ला</th>
    	<th class="priceheading" style="width:500px">विवरण</th>
        <th class="priceheading" style="width:160px">एकाई</th>
        
        <th class="priceheading" style="width:150px">परिमाण</th>
        <th class="priceheading" style="width:400px">दर(Rs)</th>
        <th class="priceheading" style="width:210px">जम्मा लागत(Rs)</th>
        <th class="priceheading" style="width:400px">कैफियत</th>
    </tr>
    <?
	$cp=$program->getFruitCommoditiesByParentId($programId); //print_r($conn->fetchArray($rate));
	while($cpGet=$conn->fetchArray($cp))
	{?>
        <tr>
        	<td>
                <table>
                    <tr>
                        <td class="pricedata"><? $dist=$conn->fetchArray($program->getDistrictByUserId($rec['userId'])); echo $dist['district_name'];?></td>
                    </tr>
                </table>
            </td>
            <td border="0" class=""><?=$cpGet['commodity'];?></td>
            <td border="0" class="pricedata"><?=$cpGet['commodityUnit'];?></td>
            <td border="0" class="pricedata"><?=$cpGet['amount'];?></td>
            <td border="0" class="pricedata"><?=$cpGet['rate'];?></td>
            <td border="0" class="pricedata"><?=$cpGet['investment'];?></td>
            <td border="0" class="pricedata"><?=$cpGet['remarks'];?></td>
        </tr> 
	<? }?>
</table>