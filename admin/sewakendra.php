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

$weight = $sewakendra -> getSubLastWeight();
//echo $weight;

if($_GET['type'] == "edit")
{
	$result = $sewakendra->getById($_GET['id']);
	$editRow = $conn->fetchArray($result);	
	extract($editRow);
}
if($_POST['type'] == "Save")
{
	extract($_POST);
	
	if(empty($sewakendraName))
		$errMsg .= "<li>Please enter sewakendra name</li>";
	if(empty($organizationHead))
		$errMsg .= "<li>Please enter Organization Head Name</li>"	;
	if(empty($phone))
		$errMsg .= "<li>Please enter phone</li>";
	if(empty($email))
		$errMsg .= "<li>Please enter email</li>";
		
	if(empty($errMsg))
	{
		$pid = $sewakendra -> save($id, $sewakendraName, $organizationHead, $phone, $address, $email,$org_info,$trainingLevel, $publish, $weight);
		if($id > 0)
			$pid = $id;
		$sewakendra -> saveImage($pid);
		//$users -> saveMap($pid);
		if($id>0)
			header("Location: sewakendra.php?type=edit&id=$id&msg=Sewakendra details updated successfully");
		else
			header("Location: sewakendra.php?msg=Sewakendra details saved successfully");
		exit();
	}		
}

if($_GET['type'] == "removeImage")
{
	$sewakendra->deleteImage($_GET['id']);
	//echo "hello";
	//header("location: sewakendra.php?type=edit&id=".$_GET['id']."&msg=User image deleted successfully.");?>
	<script> document.location='sewakendra.php?type=edit&id=<?=$_GET['id']?>&msg=Sewakendra image deleted successfully.' </script>
<? }

if($_GET['type']=="del")
{
		$sewakendra -> delete($_GET['id']);?>
    	<script> document.location='sewakendra.php?&msg=Sewakendra deleted successfully.' </script>    
<? }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style1 {
	color: #FF0000
}

-->
</style>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

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

                      <td class="heading2">&nbsp; Manage Sewakendra

                        <div style="float: right;">

                          <?

														$addNewLink = "sewakendra.php";

													if(isset($_GET['category']) && !empty($_GET['category']))

														$addNewLink .= "?category=".$_GET['category'];

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

                            <tr>

                              <td>&nbsp;</td>

                              <td class="tahomabold11"><strong> Sewakendra Name : <span class="asterisk">*</span></strong></td>

                              <td><label for="title"></label>

                                <input name="sewakendraName" type="text" class="text" id="sewakendraName" value="<?= $sewakendraName; ?>" required/></td>

                            </tr>

                            <tr><td></td></tr>                           

                            <tr>

                              <td>&nbsp;</td>

                              <td class="tahomabold11"><strong> Organization Head : <span class="asterisk">*</span></strong></td>

                              <td><label for="title"></label>

                                <input name="organizationHead" type="text" class="text" id="organizationHead" value="<?= $organizationHead; ?>" required/></td>

                            </tr>

                            <tr><td></td></tr>                           

                            <tr>

                              <td>&nbsp;</td>

                              <td class="tahomabold11"><strong>Phone Number : <span class="asterisk">*</span></strong></td>

                              <td><label for="title"></label>

                                <input name="phone" type="text" class="text" id="phone" value="<?= $phone; ?>" required/></td>

                            </tr>

                            <tr><td></td></tr>

                            <tr>

                              <td>&nbsp;</td>

                              <td class="tahomabold11"><strong>Address : <span class="asterisk">*</span></strong></td>

                              <td><label for="title"></label>

                                <input name="address" type="text" class="text" id="address" value="<?= $address; ?>" required/></td>

                            </tr>

                            <tr><td></td></tr>                           

                            <tr>

                              <td>&nbsp;</td>

                              <td class="tahomabold11"><strong>Email : <span class="asterisk">*</span></strong></td>

                              <td><label for="title"></label>

                                <input name="email" type="text" class="text" id="email" value="<?= $email; ?>" required/></td>

                            </tr>
                            <tr><td></td></tr>

                            <tr>

                              <td>&nbsp;</td>

                              <td class="tahomabold11"><strong>Training Level : <span class="asterisk">*</span></strong></td>

                              <td><label for="title"></label>
                                <select name="trainingLevel" class="text">
                                  <?
                                  $level=mysql_query("select id,program_level from programlevel where publish='Yes'");
                                  while($levelGet=mysql_fetch_array($level))
                                  {?>
                                    <option value="<?=$levelGet['id'];?>" <? if($trainingLevel==$levelGet['id']){ echo 'selected="selected"';}?>>
                                      <?=$levelGet['program_level'];?>
                                    </option> 
                                  <? }
                                  ?>
                                </select>
                              </td>

                            </tr>
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Organization Information :</strong></td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr><td></td></tr>

                            <tr>
                              <td></td>
                              <td colspan="2">
                                <textarea id="org_info" name="org_info"><?=$org_info;?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'org_info');
                                </script>                							
                              </td>
                            </tr>
                            <tr><td></td></tr>                            
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Publish :</strong></td>
                              <td>
                              	<label>
                                  <input name="publish" type="radio" id="featured_0" value="No" checked="checked" />
                                  No</label>
                                <label>
                                  <input type="radio" name="publish" value="Yes" id="featured_1" <? if($publish == 'Yes') echo 'checked="checked"';?> />
                                  Yes</label>
                              </td>
                            </tr>
                            
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Weight :</strong></td>
                              <td><input name="weight" type="text" class="text" id="weight" value="<?php echo $weight; ?>" style="width:25px;" /></td>

                            </tr>

                            <tr><td></td></tr>

							<? if(file_exists("../".CMS_GROUPS_DIR.$editRow['image']) and $editRow['image']!='' && $_GET['type'] == 'edit')
							{?>
                                <tr>
                                  <td></td>
                                  <td class="tahomabold11"><strong>Current Image : </strong></td>
                                  <td><img src="../data/imager.php?file=../<?= CMS_GROUPS_DIR.$editRow['image']; ?>&amp;mw=150&amp;mh=150" />
                                  [ <a href="sewakendra.php?type=removeImage&id=<?= $id?>">Remove Image</a>]</td>
                                </tr>
                            <? }?>
                            <tr><td></td></tr>
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Image :</strong></td>
                              <td><label for="image"></label>
                                <input type="file" name="image" id="image" /></td>
                            </tr>
                            <tr><td></td></tr>
                         
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                              	<input name="type" type="submit" class="button" id="button" value="Save" />
                              	<?php if($_GET['type'] == "edit"){?>
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

                      <td class="heading2">&nbsp;Sewakendra List</td>

                    </tr>

                    <tr>

                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">

                          <tr bgcolor="#F1F1F1" class="tahomabold11">

                            <td width="1">&nbsp;</td>
                            <td width="5">SN</td>

                            <td style=""><strong>Image</strong></td>

                            <td style="" width="160"> Sewakendra Name </td>

                            
                            <td>Training Level</td>

                            <td style="" width="90">Phone</td>
                            <td style="" width="90">Email</td>
                            
                            <td style="">Show</td>

                            <td style="">Weight</td>

                            <td style=""><strong>Action</strong></td>

                          </tr>

                          <?php

							$counter = 0;

							$pagename = "sewakendra.php?";

							$sql = "SELECT sewakendra.*,programlevel.program_level FROM sewakendra 
              inner join programlevel on sewakendra.trainingLevel=programlevel.id";

							$sql .= " ORDER BY weight";

							//echo $sql;

							$limit = 50;

							include("paging.php"); $count=0;

							while($row = $conn -> fetchArray($result))

							{?>

                          		<tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>

                                    <td valign="top">&nbsp;</td>
                                    <td valign="top"><?=++$count;?></td>

                                    <td valign="top"><img src="../<?= CMS_GROUPS_DIR.$row['image']; ?>" width="40" height="30" /></td>

                                    <td valign="top"><?= $row['sewakendraName'] ?></td>

                                    
                                    <td valign="top"><?=$row['program_level'];?></td>

                                    <td valign="top"><?=$row['phone'];?></td>
                                    <td valign="top"><?=$row['email'];?></td>
                                    
                                    

                                    <td valign="top">

                            		<?

									$changeTo = 'Yes';

									if ($row['publish'] == 'Yes')

										$changeTo = 'No';

									?>

                              		(<?=$row['publish'];?>)</td>

                            		<td valign="top"><?= $row['weight'] ?></td>

                            		<td valign="top"> [ <a href="sewakendra.php?type=edit&id=<?= $row['id']?>">Edit</a> | <a href="#" onClick="javascript: if(confirm('This will permanently remove this record from database. Continue?')){ document.location='sewakendra.php?type=del&id=<?php echo $row['id']; ?>'; }">
                                    Delete</a> ]</td>

                          </tr>

                          <?

													}

													?>

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