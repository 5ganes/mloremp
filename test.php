<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('mrsmp');
mysql_set_charset("utf8");
$rows = mysql_query('SELECT * FROM tbl_crop');

//Store it into the array
while ($row = mysql_fetch_array($rows)){
	$cName[] =$row["cropName"];
	$fYear[] =$row["fiscalYear"];
};
//Write it to CSV file
$output = fopen("php://output",'w') or die("Can't open php://output");
header("Content-Type:application/csv"); 
header("Content-Disposition:attachment;filename=data.csv");
echo "\xEF\xBB\xBF"; //Important use UTF8 BOM to convert special characters
fputcsv($output, array('Fiscal Year','Crop Name'));
for($c=0;$c<strlen($cName);$c++)
{
	fputcsv($output, array($fYear[$c], $cName[$c]));
	//fputcsv($output,explode(',',$fiscalYear));
	//fputcsv($output,explode(',',$cropName));	
}

fclose($output) or die("Can't close php://output");

?>