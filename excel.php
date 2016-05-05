<? session_start();
if(!isset($_SESSION['userId'])){
	header("Location: programlogin.php"); exit();
}
require_once("data/conn.php");
require_once("data/program.php");
$conn = new Dbconn();
$program = new Program();
require_once("data/sqlinjection.php");
require_once("data/constants.php");
$typeId=$_GET['typeId'];
$fiscalYear=$_GET['fiscalYear'];
$userId=$_GET['userId'];

//Write it to CSV file
$output = fopen("php://output",'w') or die("Can't open php://output");
header("Content-Type:application/csv"); 
header("Content-Disposition:attachment;filename=data.csv");
echo "\xEF\xBB\xBF"; //Important use UTF8 BOM to convert special characters

if($typeId==DISTRICT){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fYear[] =$row["fiscalYear"];$tArea[]=$row['totalAreaHector'];$aArea[]=$row['agricultureAreaHector'];$iArea[]=$row['irrigatedAreaHector'];
		$uArea[]=$row['unirrigatedArea'];$bArea[]=$row['barrenAreaHector'];$gArea[]=$row['grassAreaHector'];
		$fArea[]=$row['forestAreaHector'];$oArea[]=$row['otherAreaHector'];$tFNumber[] =$row["totalFamilyNumber"];$tPopulation[] =$row["totalPopulation"];
		$fNumber[] =$row["femaleNumber"];$mNumber[] =$row["maleNumber"];$fFNumber[] =$row["farmerFamilyNumber"];$fPopulation[] =$row["farmerPopulation"];
	};
	fputcsv($output, array('Fiscal Year','Total Area(H)','Agriculture Area(H)','Irrigated Area(H)','Unirrigated Area(H)','Barren Area(H)',
	'Grass Area(H)','Forest Area(H)','Other Area(H)','Total Family Number','Total Population','Female Number','Male Number','Farmer Family Number',
	'Farmer Population'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$tArea[$c],$aArea[$c],$iArea[$c],$uArea[$c],$bArea[$c],$gArea[$c],$fArea[$c],$oArea[$c],$tFNumber[$c],
		$tPopulation[$c],$fNumber[$c],$mNumber[$c],$fFNumber[$c],$fPopulation[$c]));	
	}	
}
else if($typeId==CROP){
	$record=$program->getTableDataByTypeAndFiscalYearAndCropListAndUserId($typeId,$fiscalYear,$_POST['cropName'],$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fYear[] =$row["fiscalYear"];$cName[]=$row['cropName'];$iArea[]=$row['irrigatedAreaHector'];$uArea[]=$row['unirrigatedArea'];
		$iProduction[]=$row['irrigatedProductionTon'];$uProduction[]=$row['unirrigatedProductionTon'];$fPrice[]=$row['farmerPriceTon'];
		$mPrice[]=$row['marketPriceTon'];
	};
	fputcsv($output, array('Fiscal Year','Crop Name','Irrigated Area(H)','Unirrigated Area(H)','Irrigated Production(T)','Unirrigated Production(T)',
	'Farmer Price(Per Ton)','Market Price(Per Ton)'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$cName[$c],$iArea[$c],$uArea[$c],$iProduction[$c],$uProduction[$c],$fPrice[$c],$mPrice[$c]));	
	}	
}
else if($typeId==POCKETAREA){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fYear[] =$row["fiscalYear"];$pAName[]=$row['pocketAreaName'];$tFNumber[]=$row['totalFamilyNumber'];$tPopulation[]=$row['totalPopulation'];
		$fNumber[]=$row['femaleNumber'];$mNumber[]=$row['maleNumber'];$fFNumber[]=$row['farmerFamilyNumber'];$fPopulation[]=$row['farmerPopulation'];
		$cName[]=$row['firstCrop'].",".$row['secondCrop'].",".$row['thirdCrop'];
		$iArea[]=$row['irrigatedAreaHector'];$uArea[]=$row['unirrigatedAreaHector'];$iProduction[]=$row['irrigatedProductionTon'];
		$uProduction[]=$row['unirrigatedProductionTon'];$fPrice[]=$row['farmerPriceTon'];$mPrice[]=$row['marketPriceTon'];
	};
	fputcsv($output, array('Fiscal Year','Pocket Area','Total Family Number','Total Population','Female Number','Male Number','Farmer Family Number',
	'Farmer Population','Crops','Irrigated Area(H)','Unirrigated Area(H)','Irrigated Production(T)','Unirrigated Production(T)','Farmer Price(per ton)',
	'Market Price(per ton)'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$pAName[$c],$tFNumber[$c],$tPopulation[$c],$fNumber[$c],$mNumber[$c],$fFNumber[$c],$fPopulation[$c],$cName[$c],
		$iArea[$c],$uArea[$c],$iProduction[$c],$uProduction[$c],$fPrice[$c],$mPrice[$c]));	
	}	
}
else if($typeId==NURSERY){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$r=$program->getUnitById($row['registration']);
		$fYear[] =$row["fiscalYear"];$sKendra[]=$row['shrotKendra'];$vdc[]=$row['addressVdcMunicipality'];$ward[]=$row['addressWardNumber'];
		$reg[]=$r['name'];$rDate[]=$row['registeredDay']."/".$row['registeredMonth']."/".$row['registeredYear'];$sKService[]=$row['shrotKendraService'];
		$cPerson[]=$row['contactPerson'];$pNumber[]=$row['phoneNumber'];
	};
	fputcsv($output, array('Fiscal Year','Shrot Kendra','VDC/Municipality','Ward No','Registration','Registration Date','Shrot Kendra Service',
	'Contact Person','Phone Number'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$sKendra[$c],$vdc[$c],$ward[$c],$reg[$c],$rDate[$c],$sKService[$c],$cPerson[$c],$pNumber[$c]));	
	}	
}
else if($typeId==CROPCUTTING){
	$record=$program->getTableDataByTypeAndFiscalYearAndCropListAndUserId($typeId,$fiscalYear,$_POST['cropName'],$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$lt=$program->getUnitById($row['landType']);$st=$program->getUnitById($row['seedType']);$pu=$program->getUnitById($row['productionUnit']);
		$fYear[] =$row["fiscalYear"];$cName[]=$row['cropName'];$fName[]=$row['farmerName'];$sKendra[]=$row['sewaKendra'];$vdc[]=$row['addressVdcMunicipality'];
		$ward[]=$row['addressWardNumber'];$lType[]=$lt['name'];$sType[]=$st['name'];$pUnit[]=$pu['name'];$cCProduction[]=$row['cropCuttingProduction'];$mPercent[]=$row['moisturePercent'];
	};
	fputcsv($output, array('Fiscal Year','Crop Name','Farmer Name','Sewa Kendra','VDC/Municipality','Ward No','Land Type','Seed Type','Production Unit',
	'Cropcutting Production(T)','Moisture(%)'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$cName[$c],$fName[$c],$sKendra[$c],$vdc[$c],$ward[$c],$lType[$c],$sType[$c],$pUnit[$c],$cCProduction[$c],$mPercent[$c]));	
	}	
}
else if($typeId==MONTHLYREPORTING)
{
	$record=$program->getTableDataByTypeAndFiscalYearAndCropListAndMonthAndUserId($typeId,$fiscalYear,$_POST['cropName'],$_POST['month'],$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$m=$program->getUnitById($row['month']);$au=$program->getUnitById($row['affectedUnit']);$rc=$program->getUnitById($row['rainCondition']);
		$t=$program->getUnitById($row['temperature']);$fs=$program->getUnitById($row['fertilizerSupplied']);
		$lhau=$program->getUnitById($row['lowHighAreaUnit']);$lhpu=$program->getUnitById($row['lowHighProductionUnit']);
		
		$fYear[] =$row["fiscalYear"];$month[]=$m['name'];$cName[]=$row['cropName'];$cWork[]=$row['cropWork'];$cGrowth[]=$row['cropGrowth'];
		$cMaturity[]=$row['cropMaturity'];$cHarvest[]=$row['cropHarvest'];$aUnit[]=$au['name'];$aArea[]=$row['affectedArea'];
		$aFNo[]=$row['affectFamilyNo'];$pLoss[]=$row['productionLoss'];$rCondition[]=$rc['name'];$temp[]=$t['name'];$fSupplied[]=$fs['name'];
		$fEArea[]=$row['farmingEndedAreaHector'];$cProduction[]=$row['cutProductionTon'];$lHArea[]=$row['lowHighArea']." ".$lhau['name'];
		$lHProduction[]=$row['lowHighProduction']." ".$lhpu['name'];$rem[]=$row['remarks'];
		
	};
	fputcsv($output, array('Fiscal Year','Month','Crop Name','Crop Work(%)','Crop Growth(%)','Crop Maturity(%)','Crop Harvest(%)','Disaster Type',
	'Affected Aera(%)','Affected Family No','Production Loss(Ton)','Rain Condition','Temperature','Fertilizer Supplied','Farming Ended Area(H)',
	'Cut Production(T)','Low High Area(H)','Low High Production(T)','Remarks'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$month[$c],$cName[$c],$cWork[$c],$cGrowth[$c],$cMaturity[$c],$cHarvest[$c],$aUnit[$c],$aArea[$c],$aFNo[$c],
		$pLoss[$c],$rCondition[$c],$temp[$c],$fSupplied[$c],$fEArea[$c],$cProduction[$c],$lHArea[$c],$lHProduction[$c],$rem[$c]));	
	}
}
else if($typeId==FERTILIZER){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$sot=$program->getUnitById($row['sellingOfficeType']);
		$fYear[] =$row["fiscalYear"];$sOffice[]=$row['sellingOffice'];$sOType[]=$sot['name'];$vdc[]=$row['addressVdcMunicipality'];
		$ward[]=$row['addressWardNumber'];$pName[]=$row['proprietorName'];$cNumber[]=$row['contactNumber'];$rNumber[]=$row['registrationNumber'];
		$rYear[]=$row['registeredYear'];$sObject[]=$row['sellingObject'];$rem[]=$row['remarks'];
	};
	fputcsv($output, array('Fiscal Year','Selling Office','Office Type','VDC/Municipality','Ward No','Proprietor Name','Contact Number','Registration No',
	'Registered Year','Selling Object','Remarks'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$sOffice[$c],$sOType[$c],$vdc[$c],$ward[$c],$pName[$c],$cNumber[$c],$rNumber[$c],$rYear[$c],$sObject[$c],$rem[$c]));	
	}	
}
else if($typeId==GROUPS){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$gs=$program->getUnitById($row['groupStatus']);
		$fYear[] =$row["fiscalYear"];$gName[]=$row['groupName'];$vdc[]=$row['addressVdcMunicipality'];$ward[]=$row['addressWardNumber'];
		$eYear[]=$row['establishedYear'];$fNumber[]=$row['femaleNumber'];$mNumber[]=$row['maleNumber'];
		$rDate[]=$row['registeredDay']."/".$row['registeredMonth']."/".$row['registeredYear'];$rNumber[]=$row['registrationNumber'];
		$mDay[]=$row['meetingDay'];$cFPMonth[]=$row['collectedFundPerMonth'];$tFund[]=$row['totalFund'];$dAmount[]=$row['debtAmount'];
		$gStatus[]=$gs['name'];$cPerson[]=$row['contactPerson'];
	};
	fputcsv($output, array('Fiscal Year','Group Name','VDC/Municipality','Ward No','Established Year','Female Number','Male Number','Registered Date',
	'Registration Number','Meeting Day','Per Month Collection(Rs)','Total Fund(Rs)','Debt Amount(Rs)','Group Status','Contact Person'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$gName[$c],$vdc[$c],$ward[$c],$eYear[$c],$fNumber[$c],$mNumber[$c],$rDate[$c],$rNumber[$c],$mDay[$c],$cFPMonth[$c],
		$tFund[$c],$dAmount[$c],$gStatus[$c],$cPerson[$c]));	
	}	
}
else if($typeId==COOP){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fYear[] =$row["fiscalYear"];$cName[]=$row['cooperativeName'];$vdc[]=$row['addressVdcMunicipality'];$ward[]=$row['addressWardNumber'];
		$rDate[]=$row['registeredDay']."/".$row['registeredMonth']."/".$row['registeredYear'];$rNumber[]=$row['registrationNumber'];
		$fNumber[]=$row['femaleNumber'];$mNumber[]=$row['maleNumber'];$wField[]=$row['workingField'];$wvdc[]=$row['workingVdcMunicipality'];
		$tFund[]=$row['totalFund'];$dAmount[]=$row['debtAmount'];$cPerson[]=$row['contactPerson'];
	};
	fputcsv($output, array('Fiscal Year','Cooperative Name','VDC/Municipality','Ward No','Registered Date','Registration Number','Female Number','Male Number',
	'Working Field','Working VDC/Municipality','Total Fund(Rs)','Debt Amount(Rs)','Contact Person'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$cName[$c],$vdc[$c],$ward[$c],$rDate[$c],$rNumber[$c],$fNumber[$c],$mNumber[$c],$wField[$c],$wvdc[$c],
		$tFund[$c],$dAmount[$c],$cPerson[$c]));	
	}	
}
else if($typeId==MARKET){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$mt=$program->getUnitById($row['marketType']);
		$fYear[] =$row["fiscalYear"];$mName[]=$row['marketName'];$mType[]=$mt['name'];$mArea[]=$row['marketAreaHector'];$eYear[]=$row['establishedYear'];
		$vdc[]=$row['addressVdcMunicipality'];$ward[]=$row['addressWardNumber'];$mDay[]=$row['marketDay'];$gInvestment[]=$row['governmentInvestment'];
		$aPTQuantity[]=$row['agricultureProductTradeQuantityTon'];$aPTAmount[]=$row['agricultureProductTradeAmount'];$cPerson[]=$row['contactPerson'];
	};
	fputcsv($output, array('Fiscal Year','Market Name','Market Type','Market Area(H)','Established Year','VDC/Municipality','Ward No','Market Day(Weekly)',
	'Government Investment(Rs)','Agri Product Trade Quantity(T)','Agri Product Trade Amount(Rs)','Contact Person'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$mName[$c],$mType[$c],$mArea[$c],$eYear[$c],$vdc[$c],$ward[$c],$mDay[$c],$gInvestment[$c],$aPTQuantity[$c],
		$aPTAmount[$c],$cPerson[$c]));	
	}	
}
else if($typeId==INSURANCE){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fYear[] =$row["fiscalYear"];$cName[]=$row['cropName'];$cArea[]=$row['cropAreaHector'];$iAmount[]=$row['insuranceAmount'];$rem[]=$row['remarks'];
	};
	fputcsv($output, array('Fiscal Year','Crop Name','Crop Area(H)','Insurance Amount(Rs)','Remarks'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$cName[$c],$cArea[$c],$iAmount[$c],$rem[$c]));	
	}	
}
else if($typeId==FARMER){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fit=$program->getUnitById($row['farmerIdType']);
		$fYear[] =$row["fiscalYear"];$fName[]=$row['farmerName'];$vdc[]=$row['addressVdcMunicipality'];$ward[]=$row['addressWardNumber'];
		$fAge[]=$row['farmerAge'];$fCaste[]=$row['farmerCaste'];$fIType[]=$fit['name'];
	};
	fputcsv($output, array('Fiscal Year','Farmer Name','VDC/Municipality','Ward No','Farmer Age','Farmer Caste','Farmer ID Type'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$fName[$c],$vdc[$c],$ward[$c],$fAge[$c],$fCaste[$c],$fIType[$c]));	
	}	
}
else if($typeId==FISHERY){
	$record=$program->getTableDataByTypeAndFiscalYearAndUserId($typeId,$fiscalYear,$userId);
	//Store it into the array
	while ($row = mysql_fetch_array($record))
	{
		$fit=$program->getUnitById($row['farmerIdType']);
		$fYear[] =$row["fiscalYear"];$fName[]=$row['farmerName'];$vdc[]=$row['addressVdcMunicipality'];$ward[]=$row['addressWardNumber'];
		$lNumber[]=$row['lakeNumber'];$lArea[]=$row['lakeAreaHector'];$prod[]=$row['productionTon'];
	};
	fputcsv($output, array('Fiscal Year','Farmer Name','VDC/Municipality','Ward No','Lake Number','Lake Area(H)','Production(Ton)'));
	for($c=0;$c<count($fYear);$c++)
	{
		fputcsv($output, array($fYear[$c],$fName[$c],$vdc[$c],$ward[$c],$lNumber[$c],$lArea[$c],$prod[$c]));	
	}	
}
/*
	else if($typeId==PRICE)
	{
		$record=$program->getTableDataByTypeAndFiscalYearAndPriceTypeAndMonth($typeId,$fiscalYear,$_POST['priceType'],$_POST['month']);
	}
	else if($typeId==SUBSIDI)
	{
		$record=$program->getTableDataByTypeAndFiscalYearAndProgramName($typeId,$fiscalYear,$_POST['programName']);
	}
*/

fclose($output) or die("Can't close php://output");
?>