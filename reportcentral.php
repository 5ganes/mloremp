<?
	session_start();
	if(!isset($_SESSION['userId']))
	{
		header("Location: programlogin.php");
		exit();
	}
	include("report/constants.php");
	if($_SESSION['userType']==USERDISTRICT)
	{
		header("location:manageprogram.php");
		exit();
	}

	include('clientobjectsProgram.php'); 
	$sess=$_SESSION['userId']; $user=mysql_query("select * from usergroups where id='$sess'");
	$userGet=mysql_fetch_array($user);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>
	Market Research and Stastistics Management Programme-
	<?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?>
</title>
<? include('baselocation.php'); ?>
<meta name="description" content="Market Research and Stastistics Management Programme" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_setup.css" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_text.css" />
<link rel="stylesheet" type="text/css" href="css/program.css" />
<script language="javascript" src="js/cms.js"></script>

<!--for date picker-->
<script type="text/javascript" src="datepicker/jquery.js"></script>
<script type="text/javascript" src="datepicker/nepali.datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="datepicker/nepali.datepicker.css" />
<script>
	$(document).ready(function(){
		$('.nepali-calendar').nepaliDatePicker();
		$('.collectedDate').nepaliDatePicker();
	});
</script>
<!--end date picker-->
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

<!--css for crop search... also needed that jquery.js file which has also been used for datepicker-->
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
  ol.menu li {
        margin: 0;
        padding: 0;
        background: #00c400;
        color: #FFF;
        font: bold 13px Tahoma, Geneva, sans-serif;
    }
    ol.menu li p {
        padding: 5px 10px;
        margin: 0;
    }
    ol.menu li ul {
        margin: 0;
        padding: 0;
        background: #ececec;
    }
    ol.menu li li {
        background: #f2fff4;
        list-style-position: inside;
        color: #000;
        border-bottom: 1px solid #006193;
        padding: 3px 10px;
    }
    ol.menu li a {
        font: normal 11px Tahoma, Geneva, sans-serif;
        text-decoration: none;
        color: #000;
    }
</style>
</head>
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->
<? if(isset($_GET['groupType']) and isset($_GET['id']))
{?>
	<? $row = $program->getByTypeAndId($_GET['groupType'],$_GET['id']); $rowGet=$conn->fetchArray($row); extract($rowGet);?>
<? }?>
<body onload="<? if($donationUnit==56){?>displayCastOnSelected()<? }else if($registration==7){?>displayRegistrationOnSelected()<? }?>">
<!-- Main Page Container -->
<div class="page-container">
  <!-- For alternative headers START PASTE here -->
  <!-- A. header--->
  <div class="header">
    <!-- A.1 header-TOP -->
    <div class="header-top">
     	<? include("program/header.php");?>
    </div>
    
    <!-- A.3 header-BOTTOM -->
    <div class="header-bottom" style="margin-top:5px;">
      <!-- Navigation Level 2 (Drop-down menus) -->
      <div class="nav2">
        	<? include("program/menucentral.php"); ?>
      </div>
    </div>
    
  </div>
  <!-- For alternative headers END PASTE here -->
  <!-- B. MAIN -->
  <div class="main" style="margin-top:0.1%;">

<?php //include("includes/breadcrumb.php"); ?>

<div class="contentHdr">
	<?
    	$sess=$_SESSION['userId']; $user=mysql_query("select * from usergroups where id='$sess'");
		$userGet=mysql_fetch_array($user);
	?>
</div>

<div class="content">
	
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF" class="program">
  	<tr>
    <td width="21%" valign="top">
		<ol class="menu">
                
            <li>
                <p>Generate Form Reports</p>
                <ol>
                	<? $result = $program->getProgramTypes();
					while ($row = $conn->fetchArray($result))
					{?>
						<li>
							<a href="reportcentral.php?typeId=<?php echo $row['id']; ?>"><?=$row['program_name'];?></a>
						</li>
					<? }?>
                    
                </ol>
            </li>
        </ol>
 	</td>
    
    <td width="79%" valign="top"><!--report td starts-->
    
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
                                                
												<?
												if(isset($_GET['typeId']))
												{
                                               		include("report/programlistcentral.php");
												}
												else if(isset($_GET['districtId']))
												{
													include("report/typelistcentral.php");	
												}
												else
												{?>
													<tr>
                                                    	<td>
                                                        	<? include("program/programhome.php");?>
														</td>
                                                  	</tr>
												<? }?>
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
    
    </td><!--report td ends-->
  	</tr>
    </table>

</div>

</div>
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;">
    <p>Copyright &copy; 20<?=date("y");?> MRSMP | All Rights Reserved</p>
    <p class="credits"> <a href="<?=SITE_URL?>">गृह पृष्‍ठ</a> | <a href="contact">सम्पर्क ठेगाना</a> | <a href="feedback">सुझाब तथा सल्लाह</a></p>
  </div>
</div>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>