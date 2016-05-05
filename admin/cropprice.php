<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}
if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;
		
$weight = $crop -> getCropPriceLastWeight();
if($_GET['type'] == "edit")
{
	$result = $crop->getCropPriceById($_GET['id']);
	$editRow = $conn->fetchArray($result);	
	extract($editRow);
}
if($_POST['type'] == "Save")
{
	extract($_POST);
	
	if($name=="")
		$errMsg .= "<li>Please enter crop Name</li>";
	if($unit=="")
		$errMsg .= "<li>Please enter crop unit</li>";
	
	if(empty($errMsg))
	{
		$cropType=$_POST['cropType'];
		$pid = $crop -> saveCropPrice($id, $name, $unit, $cropType, $publish, $weight);
		if($id > 0)
			$pid = $id;
		if($id>0)
			header('Location: cropprice.php?type=edit&id='.$id.'&msg=Crop Price details updated successfully');
		else
			header('Location: cropprice.php?msg=Crop Price details saved successfully');
		exit();
	}		
}

if($_GET['type'] == "tooglePublish")
{
	$id = $_GET['id'];
	$changeTo = $_GET['changeTo'];
	
	$sql = "UPDATE cropprice SET publish='$changeTo' WHERE id='$id'";
	$conn->exec($sql);
	header('location: cropprice.php?&msg=Crop Show/Hide status toogled successfully.');
	
}
	
if($_GET['type']=="del")
{
		$crop -> deleteCropPrice($_GET['id']);
		//echo "hello";
		//header("Location : cropprice.php?&msg=product deleted successfully.");?>
    	<script> document.location='cropprice.php?msg=Crop deleted successfully.' </script>    
<? }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp; Manage Crops for Price List
                        <div style="float: right;">
                          <?
								if($_GET['categoryId']){ $categoryId=$_GET['categoryId'];}else{ $categoryId="select";}
							$addNewLink = "cropprice.php?categoryId=$categoryId";
						  ?>
                          <a href="<?= $addNewLink?>" class="headLink">Add New</a></div></td>
                    </tr>
                    <tr>
                      <td>

                      <form action="<?= $_REQUEST['uri']?>" method="post" enctype="multipart/form-data">
                      <table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <?php if(!empty($errMsg)){ ?>
                          <tr align="left">
                            <td colspan="3" class="err_msg"><?php echo $errMsg; ?></td>
                          </tr>
                          <?php } ?>                          
                           <tr><td></td></tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td class="tahomabold11"><strong> Crop Name : <span class="asterisk">*</span></strong></td>
                              <td>
                                <input name="name" type="text" class="text" value="<?=$name;?>" required /> 
                              </td>
                            </tr>
                            <tr><td></td></tr>                          
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Unit : <span class="asterisk">*</span></strong></td>
                              <td>
                              		<input type="text" name="unit" value="<?=$unit;?>" required /> 
                              </td>
                            </tr>
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Crop Type :</strong></td>
                              <td>
                              		<? $pieces = explode(",", $cropType);?>
                              		<input type="checkbox" name="cropType[]" value="पाक्षिक खुद्रा मूल्य"
                                    <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="पाक्षिक खुद्रा मूल्य"){ echo 'checked="checked"';}} ?> /> पाक्षिक खुद्रा मूल्य 
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" name="cropType[]" value="पाक्षिक सिमावर्तिय खुद्रा मूल्य"
                                    <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="पाक्षिक सिमावर्तिय खुद्रा मूल्य"){ echo 'checked="checked"';}} ?> /> 
                                    पाक्षिक सिमावर्तिय खुद्रा मूल्य &nbsp;&nbsp;&nbsp;
                                    
                                    <input type="checkbox" name="cropType[]" value="पाक्षिक थोक मूल्य"
                                    <? for($i=0;$i<=strlen($pieces);$i++){ if($pieces[$i]=="पाक्षिक थोक मूल्य"){ echo 'checked="checked"';}} ?> /> पाक्षिक थोक मूल्य
                              </td>
                            </tr>
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Publish :</strong></td>
                              <td>
                              	<label><input name="publish" type="radio" id="featured_0" value="No" checked="checked" /> No</label>
                                <label>
                                  <input type="radio" name="publish" value="Yes" id="featured_1" <? if($publish == 'Yes') echo 'checked="checked"';?> />
                                  Yes
                             	</label>
                              </td>
                            </tr>
                            <tr><td></td></tr>      
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Weight :</strong></td>
                              <td><input name="weight" type="text" class="text" id="weight" value="<?php echo $weight; ?>" style="width:25px;" /></td>
                            </tr>
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                              	<input name="type" type="submit" class="button" id="button" value="Save" />
                              	<?php if($_GET['type'] == "edit"){ ?>
                              	<input type="hidden" value="<?= $id?>" name="id" id="id" />
                                <?php }else{ ?>                                
                                <input name="reset" type="reset" class="button" id="button2" value="Clear" />
                                <?php } ?>
                                </td>
                            </tr>
                            
                            
                                                    
                        </table>
                        </form></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr height="5"><td></td></tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      	<td class="heading2">
                      		Crop List
                    	</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
                            <td style="width:150px">Crop Name</td>
                            <td style="width:60px;">Crop Unit</td>
                            <td style="width:10px;">Show</td>
                            <td style="width:10px">Weight</td>
                            <td style="width:73px"><strong>Action</strong></td>
                          </tr>
                          <?php
							
								$counter = 0;
								$pagename = "cropprice.php?";
								$limit = 50;
								$sql = "SELECT * FROM cropprice";
								$sql=$sql." ORDER BY weight";
								include("paging.php");
								while($row = $conn -> fetchArray($result))
								{?>
                          			<tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                                    <td valign="top">&nbsp;</td>
                                    <td valign="top"><?= $row['name'] ?></td>
                                    <td valign="top"><?= $row['unit'] ?></td>
                                   
                                    <td valign="top">
                            		<?
									$changeTo = 'Yes';
									if ($row['publish'] == 'Yes')
										$changeTo = 'No';
									?>
                              		(<a href="cropprice.php?type=tooglePublish&id=<?= $row['id']?>&changeTo=<?=$changeTo;?>"><?=$row['publish'];?></a>)</td>
                                    
                            		<td valign="top"><?= $row['weight'] ?></td>
                            		<td valign="top">
                                    	[ <a href="cropprice.php?type=edit&id=<?= $row['id']?>">Edit</a> | 
                                        <a href="#" onClick="javascript: if(confirm('This will permanently remove this crop price from database. Continue?')){
                                         document.location='cropprice.php?type=del&id=<?php echo $row['id']; ?>'; }">Delete</a> ]
                                 	</td>
                          			</tr>
                          		<? }?>
                        
                        </table>
                      <?php include("paging_show.php"); ?></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
<?php die(); ?>