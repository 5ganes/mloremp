<?php
class Crop
{
	function save($id, $name, $namenp, $urlname, $code, $shortcontents, $contents, $publish, $featured, $weight)
	{
		global $conn;
		
		$id = cleanQuery($id);
		$name = cleanQuery($name);
		$namenp = cleanQuery($namenp);
		$urlname = cleanQuery($urlname);
		$code = cleanQuery($code);
		$shortcontents = cleanQuery($shortcontents);
		$contents = cleanQuery($contents);
		$publish = cleanQuery($publish);
		$featured = cleanQuery($featured);
		$weight = cleanQuery($weight);
		
		if($id > 0)
		{
			$sql = "UPDATE crop
						SET
							name = '$name',
							namenp = '$namenp',
							urlname = '$urlname',
							code = '$code',
							shortcontents = '$shortcontents',
							contents = '$contents',
							publish = '$publish',
							featured = '$featured',
							weight = '$weight'
							
						WHERE
							id = '$id'";
			$f="edit";
		}
		else
		{
			$sql = "INSERT INTO crop 
						SET
							name = '$name',
							namenp = '$namenp',
							urlname = '$urlname',
							code = '$code',
							shortcontents = '$shortcontents',
							contents = '$contents',
							publish = '$publish',
							featured = '$featured',
							weight = '$weight',
							onDate = NOW()";
		
			$f="add";
		}
		$conn->exec($sql);
		$iid=$conn->insertId(); //echo $iid; die();
		
		if($f=="edit")
		{
			mysql_query("delete from flip where editId='$id'");
			$f=mysql_query("insert into flip set tableName='crop', type='edit', editId='$id', addId=''");
		}
		return $iid;
	}
	
	function getLastWeight()
	{
		global $conn;
		
		$sql = "SElECT weight FROM crop ORDER BY weight DESC LIMIT 1"; //echo "hi"; die();
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row['weight'] + 10;
		}
		else
			return 10;
	}
	
	function getById($id)
	{
		global $conn;

		$id = cleanQuery($id);

		$sql = "SElECT * FROM crop WHERE id = '$id'";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function isUnique($id=0, $urlname)
	{
		global $conn;
		
		$sql = "SELECT COUNT(id) cnt FROM crop WHERE urlname = '$urlname' AND id <> '$id'";

		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		if($row['cnt'] > 0)
		{
			return false;
		}
		return true;
	}
	
	function saveImage($id)
	{
		global $conn;
		global $_FILES;
		
		if ($_FILES['image']['size'] <= 0)
			return;
		
		$id = cleanQuery($id);
		$filename = $_FILES['image']['name'];
		
		/*$ext = end(explode(".", $filename));
		$image = $id . "." . $ext;*/
		$image = $filename;
		
		copy($_FILES['image']['tmp_name'], "../". CMS_GROUPS_DIR . $image);
		
		$sql = "UPDATE crop SET image = '$image' WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function deleteImage($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		$result = $this->getById($id);
		$row = $conn->fetchArray($result);
		$image = "../". CMS_GROUPS_DIR . $row['image'];
		
		if (file_exists($image))
			unlink($image);
		
		$sql = "UPDATE crop SET image = '' WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function delete($id)
	{  
		global $conn;
		
		$id = cleanQuery($id);
		
		$result = $this->getById($id);
		$row = $conn->fetchArray($result);
		
		$file = "../" . CMS_GROUPS_DIR . $row['image'];
		
		if (file_exists($file) && !empty($row['image']))
			unlink($file);
		
		$sql = "DELETE FROM crop WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function getCrops()
	{
		global $conn;
		
		$sql = "SElECT * FROM crop WHERE publish = 'Yes' order by weight";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getByCategoryId($categoryId)
	{
		global $conn;
		
		$sql = "SElECT * FROM crop WHERE categoryId='$categoryId' and publish = 'Yes' order by weight";
		$result = $conn->exec($sql);
		return $result;
	}
	
	//for crop price detals
	function getCropPriceLastWeight()
	{
		global $conn;
		
		$sql = "SElECT weight FROM cropprice ORDER BY weight DESC LIMIT 1"; //echo "hi"; die();
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row['weight'] + 10;
		}
		else
			return 10;
	}
	
	function saveCropPrice($id, $name, $unit, $cropType, $publish, $weight)
	{
		global $conn;
		
		$id = cleanQuery($id);
		$name = cleanQuery($name);
		$unit = cleanQuery($unit);
		$cropType = implode(",", $cropType);
		$publish = cleanQuery($publish);
		$weight = cleanQuery($weight);
		
		if($id > 0)
		{
			$sql = "UPDATE cropprice
						SET
							name = '$name',
							unit = '$unit',
							cropType = '$cropType',
							publish = '$publish',
							weight = '$weight'
							
						WHERE
							id = '$id'";
		}
		else
		{
			$sql = "INSERT INTO cropprice 
						SET
							name = '$name',
							unit = '$unit',
							cropType = '$cropType',
							publish = '$publish',
							weight = '$weight',
							onDate = NOW()";
		
		}
		
		$conn->exec($sql);
		if($id > 0)
			return $conn -> affRows();
		return $conn->insertId();
	}
	
	function getCropPriceById($id)
	{
		global $conn;

		$id = cleanQuery($id);

		$sql = "SElECT * FROM cropprice WHERE id = '$id'";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function deleteCropPrice($id)
	{  
		global $conn;
		
		$id = cleanQuery($id);
		$sql = "DELETE FROM cropprice WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function getCropPriceByCategory($category)
	{
		global $conn;
		
		$sql = "SElECT * FROM cropprice WHERE cropType like '%$category%' and publish = 'Yes' order by weight";
		$result = $conn->exec($sql);
		return $result;
	}
	
}