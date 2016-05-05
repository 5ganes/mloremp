<?
session_start();
if(!isset($_SESSION['userId']))
{
	header("Location: ../programlogin.php");
	exit();
}
include('../clientobjectsProgram.php');
$typeId=$_GET['typeId']; $programId=$_GET['programId'];
if(isset($typeId) and isset($programId))
{
	$rec=$conn->fetchArray($program->getTableDataByTypeAndId($typeId,$programId));
	$fiscalYear=$rec['fiscalYear'];
}
else if(isset($typeId) and !isset($programId))
{
	$fiscalYear=$_GET['fiscalYear'];
	
}

?>
<style>
	body{ margin:0; padding:0; font-size:13px;}
	.container{width:100%; padding:0; border:1px solid; margin:0 auto}
	.header{height:100px; border:1px solid; background:#CCC;}
	.main{border:1px solid; line-height:1.9em}
	.footer{height:100px; border:1px solid; background:#CCC;}
	.sitename{ line-height:0.5em; margin-top:0%}
	.sitename h1, .sitename h2, .sitename h3, .sitename h4{ margin:11px}
	.sitename h1{font-size: 16px;}
	.sitename h2{font-size: 14px; font-weight:normal}
	.sitename h3{font-size: 13px; font-weight:normal}
	.sitename h4{font-size: 14px;}
	.print{color:red;padding:5px 10px; text-decoration:none; background:#000;}
	.print:hover{color:white}
	th{font-size:13px;}
</style>
<html>
<head>
	<? $title=$program->getTypeById($typeId);?>
	<title>Report - <?=$title['program_name'];?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--printing-->
	<script>
		function printContent(el){
			//document.getElementById(e1).style="font-size:15px";
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>
	<!--end printing-->
</head>
<body>
	<div class="container" id="container">
    	<div class="header">
        	<div class="sitename" style="float:left">
        		<h1>नेपाल सरकार</h1>
                <h2>कृषि विकास मन्त्रालय</h2>
                <h2>कृषि विभाग</h2>
                <h3>कृषि व्यवसाय प्रवर्द्धन तथा बजार विकास निर्देशनालय</h3>
                <h4>बजार अनुसन्धान तथा तथ्यांक व्यवस्थापन कार्यक्रम</h4>
          	</div>
            
			<? if($typeId==TRAININGREPO){?>
            <div class="sitename" style="float:right">
                <h4>महिला संख्या: <?=$rec['femaleNumber'];?></h4>
                <h4>दलितको संख्या: <?=$rec['lowcastNumber'];?></h4>
                <h4>जनजातिको संख्या: <?=$rec['indigenousNumber'];?></h4>
                <h4>अन्य: <?=$rec['otherNumber'];?></h4>
            </div>
            <div class="sitename" style="float:right">
          		<h4>तालिमको नाम: <?=$rec['trainingName'];?></h4>
                <h4>
                  तालिमको स्तर :<? $tlevel=$rec['trainingLevel'];$unt=$conn->fetchArray($conn->exec("select program_level from programlevel where id='$tlevel'"));
              	  echo $unt['program_level'];?>
                </h4>
                <h4>सहभागी संख्या: <?=$rec['participantNumber'];?></h4>
                <h4>पुरुष संख्या: <?=$rec['maleNumber'];?></h4>
            </div>
            <? }?>
            <? if($typeId==SUBSIDI){?>
            <div class="sitename" style="float:right">
                <h4>विनियोजित अनुदान रकम(हजार): <?=$rec['subsidiAmount'];?></h4>
                <h4>अनुदान पाउने: <? $unit=$program->getUnitById($rec['donationUnit']); echo $unit['name'];?></h4>
            	<h4>कार्यक्रम भएको मिति: <?=$rec['programDay']."/".$rec['programMonth']."/".$rec['programYear'];?>
            </div>
            <? }?>
            <div class="sitename" style="float:right; text-align:right">
                <h1><?=$title['program_name'];?></h1>
                <h4>आर्थिक वर्ष : <?=$fiscalYear;?></h4>
                <? if($typeId==PRICE){?>
                	<h4><?=$rec['priceType'];?> / <?=$rec['marketName']?></h4>
                	<h4>संकलन मिति: <?=$rec['collectedDate'];?> / संकलन कर्ताको नाम :<?=$rec['collector'];?></h4>
          		<? }?>
                <? if($typeId==TRAININGREPO){?>
                <h4>ताालिम मिति: <?=$rec['trainingDay']."/".$rec['trainingMonth']."/".$rec['trainingYear'];?></h4>
                <? }?>
            </div>
            <div style="clear:both"></div>
     	</div>
        <div class="main">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            	<tr>
            		<td>
                    	<?
						if(isset($typeId) and isset($programId))
							$record=$program->getTableDataByTypeAndId($typeId,$programId);
						else if(isset($typeId) and !isset($programId))
						{
						if($typeId==CROP or $typeId==CROPCUTTING)
							$record=$program->getTableDataByTypeAndFiscalYearAndCropListAndDistrict($typeId,$fiscalYear,$_POST['cropName'],$_GET['district']);
						else if($typeId==MONTHLYREPORTING)
							$record=$program->getTableDataByTypeAndFiscalYearAndCropListAndMonthAndDistrict($typeId,$fiscalYear,$_POST['cropName'],
							$_POST['month'],$_GET['district']);
						else if($typeId==PRICE)
							$record=$program->getTableDataByTypeAndFiscalYearAndPriceTypeAndMonthAndDistrict($typeId,$fiscalYear,$_GET['district'],
							$_POST['month'],$_GET['userId']);
						else if($typeId==SUBSIDI)
						$record=$program->getTableDataByTypeAndFiscalYearAndProgramNameAndDistrict($typeId,$fiscalYear,$_POST['programName'],$_GET['district']);
						else
							$record=$program->getTableDataByTypeAndFiscalYearAndDistrict($typeId,$fiscalYear,$_GET['district']);
						}
						?>
                    	<? include($title['table_name']."cp.php");?>
            		</td>
          		</tr>
        	</table>
        </div>
        <div class="footer">
        	<div class="sitename">
            	<h4 style="margin:5% 1% 0">Copyright @MRSMP. Powered By: Team Krishighar</h4>
            </div>
        </div>
    </div>
	<div style="font-size: 22px;font-weight: bold;margin: 10px auto;width: 100%;">
    	<a href="#container" class="print" onClick="printContent('container')">Print</a>
    </div>
</body>