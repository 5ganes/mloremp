<?php
	include('../clientobjectsProgram.php');
	$cropId=$_POST['cropId'];
	if($cropId!=''){
		$variety=$cropvariety->getCropVarietiesByCropId($cropId);
		if($conn->numRows($variety)>0){
			while($varietyGet=$conn->fetchArray($variety)){
				echo '<option value='.$varietyGet['id'].'>'.$varietyGet['name'].'</option>';
			}
		}
		else
			echo '<option value="">No records found</option>';
	}
	else
		echo '<option value="">Select Crop Variety</option>';