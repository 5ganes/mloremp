<?
	session_start();
	if(!isset($_SESSION['userId']))
	{
		header("Location: ../programlogin.php");
		exit();
	}
	include("../report/constants.php");
	if($_SESSION['userType']!=USERDISTRICT)
	{
		header("location:../reportcentral.php");
	}
	
	$showSaveForm = false;
	$showListing = false;

	if (isset($_GET['id']))
	{
		$groupResult = $program->getByTypeAndId($_GET['groupType'],$_GET['id']);
		$groupRow = $conn->fetchArray($groupResult);
		extract($groupRow);
		//$selectedGroupType = $groupRow['parentId'];
		$showSaveForm = true;
		$showListing = true;
	}
	if (isset($_GET['groupType']) and $_GET['groupType']!="select")
	{
		$selectedGroupType = $_GET['groupType'];
		$showSaveForm = true;
		$showListing = true;
	}
?>

<style>
	.number{border: 1px solid gray;color: #000000;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 11px;padding: 2px;width:78px;}
	.inputleft{ float:left; width:33%; margin-bottom:3px;}
	.inputright{width:24%;margin-left:2%}
	.inputleft div:first-child{ float:left;}
	.inputleft div:nth-child(2){float:right;}
	.fronttitle{font-size:11px; color:red;}
	.error{float:none; font-size:9px; color:red; text-align:center}
	.entry{border: 1px solid #00c400;color: #a60000;font-size: 11px;font-weight: bold;padding: 0 15px; cursor:pointer}
	.entry:hover{ color:#000}
	.padding{padding:0 8px; padding-left:20px}
	.paddingwidth{ width:80px; margin:4px 7px}
	.remarks{width:140px; margin:4px 7px}
	.profitheading{ width:80px}
	
	/*for trainee*/
	.entrylist{margin:0; padding:0; float:right}
	.entrylist li{ list-style:none;}
	.entrylist li ul{margin:0; padding:0;}
	.entrylist li ul li{list-style:none; float:left; margin-right:10px; margin-bottom:5px;}
	.entrylist li ul li:nth-child(5){margin-right:0px;}
	.entrylist li ul li:nth-child(7){margin-right:0px;}
	.entrylist li:first-child ul li{ text-align:center; font-size:11px; font-weight:bold}
	.delete{border:1px solid gray; color:red; padding:2px 5px; cursor:pointer; padding:0 8px; height:17px; background:#ffe7ce; margin-left:2px;}
	.delete:hover{ color:#bf0000; background:#0F3}
	
</style>
<? //define("COLSPAN", 'colspan="5"');?>
<? //define("COLSPANBIG", 'colspan="15"');?>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td class="bgborder">
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                    <td bgcolor="#FFFFFF">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td valign="top">
                                
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px;">
                                        <tr>
                                            <td class="heading2">
                                                <div style="float: right;">
                                                    <?php
                                                        $addLink = "manageprogram.php?page=program";
                                                        $formLink = "manage_program.php";
                                                    
                                                        if (isset($_GET['groupType']))
                                                        {
                                                         $addLink .= "&groupType=" . $_GET['groupType'];
                                                         $formLink .= "?groupType=" . $_GET['groupType'];
                                                        }
														if(isset($_GET['priceType']))
														{
															$addLink .= "&priceType=" . $_GET['priceType'];	
														}
                                                    ?>
                                                    <a href="<?php echo $addLink ?>" class="headLink"> Add New </a>
                                                </div>
                                                <span style="color:#cc0000">&nbsp;Manage Forms <?="/ ".$program->getNameById($_GET['groupType']);?>
                                                <? if(isset($_GET['priceType'])){ echo "/ ".$_GET['priceType'];}?></span>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                        if(isset($_GET['msg']))
                                        { ?>
                                            <tr><td><div style="color:red; margin:5px 0">&nbsp;&nbsp;<?php echo $_GET['msg']; ?>&nbsp;</div></td></tr>
                                        <? }?>
                                        
                                        <tr>
                                            <td>
                                                <?php
                                                    if (isset($_GET['msg']))
                                                    {
                                                        //echo $msg;
                                                    }
                                                ?>
                                                <form action="program.php" method="get">
                                                    <table border="0" width="100%" cellpadding="2" cellspacing="6">
                                                        <tr>
                                                      <td width="148">
                                                        <strong> Form Category  : </strong>
                                                      </td>
                                                      <td width="200">
                                                            <select name="groupType" onChange="changeTypeProgram(this);" class="list1">
                                                                <?php $program -> getCategories($selectedGroupType); ?>
                                                            </select>
                                                      </td>
                                                      <td>
                                                      	<span style="color:red; font-weight:bold">
															<? if(isset($_GET['priceType'])){ echo "/ ".$_GET['priceType'];}?>
                                                      	</span>
                                                   	  </td>
                                                      
                                                      </tr>
                                                    </table>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                        if ($showSaveForm)
                                        {?>
                                            <tr>
                                                <td>
                                                	<? $prType=$program->getTypeById($selectedGroupType);?>
                                                    <form action="program/<?php echo $formLink; ?>" method="post" enctype="multipart/form-data" 
                                                    onSubmit="return validate(this,'<?=$prType['table_name'];?>');">
                                                        <?php
                                                        if (isset($_GET['id']))
                                                        {?>
                                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                                        <?php }?>
                                                        <table width="100%" border="0" cellspacing="6" cellpadding="2">
                                                            
                                                            <tr>
                                                                <td width="148">
                                                                    <strong>आर्थिक वर्ष :</strong>
                                                                </td>
                                                                <td>
                                                                	<select name="fiscalYear" style="width:100px; padding:2px;">
                                                                    	<?
																		for($year=2050;$year<=date("y")+2056;$year++)
																		{ $check=$year."/".($year+1);?>
																		 <option value="<? echo $check;?>" 
																		 <? if($check==$fiscalYear){ echo 'selected="selected"';}?>>
																		   	<? echo $check;?>
                                                                         </option>		
																		<? }
																		?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                            	<td><strong>जिल्ला </strong></td>
                                                                <td>
                                                                	<? $distId=$userGet['district']; 
																	$distGet=$conn->exec("select district_name from district where id='$distId'");
																	$distGet=$conn->fetchArray($distGet); echo $distGet['district_name'];?>
                                                                	<input type="hidden" name="userId" value="<?=$userGet['id'];?>" />
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td><strong>मिती : </strong></td>
                                                                <td>
                                                                    <input type="text" name="manualDate" value="<?php echo $manualDate; ?>" 
                                                                    id="nepaliDate" class="nepali-calendar text" required />
                                                                </td>
                                                            </tr>
                                                            <input type="hidden" name="tableName" value="<?=$prType['table_name'];?>" />
                                                            <tr><td></td></tr>
                                                            <?
															$file="forms/".$prType['table_name'].".php"; //echo $file; die();
                                                            include($file);
                                                            ?>
                                                            
                                                            <tr><td></td></tr>
                                                            <tr>
                                                                <td><strong>Publish : </strong></td>
                                                                <td>
                                                                    <input type="radio" name="publish" value="Yes" checked="checked" /> Yes 
                                                                    <input type="radio" name="publish" value="No" 
                                                                    <? if($publish=="No"){ echo 'checked="checked"'; }?> /> No
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td><strong>Weight : </strong></td>
                                                                <?php
                                                                if (!isset($weight))
                                                                {
                                                                    $weight = $program -> getLastWeight($_GET['groupType']);
                                                                    
                                                                } ?>
                                                                <td>
                                                                    <input type="text" value="<?php echo $weight ?>" name="weight" class="number">
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                	<input type="submit" value="Save" name="save" class="button">
                                                               		<? if (!isset($_GET['id']))
                                                        			{?>
                                                                    	<input type="reset" value="Clear" name="clear" class="button" />
                                                                	<? }?>
                                                                </td>
                                                            </tr>
                                                        
                                                        </table>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }
                                        if ($showListing)
                                        {?>
                                        <?php }?>
                                    </table>
                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="5"></td>
    </tr>
    
    <?
    if(isset($_GET['groupType']) and $_GET['groupType']!="select")
    {?>
        <tr>
            <td class="bgborder">
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                        <td bgcolor="#FFFFFF">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="top">
                                    <?php
                                        include("programlisting.php");
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    <? }?>
</table>