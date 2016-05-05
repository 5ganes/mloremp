<?
	session_start();
	include("programloginprocess.php");
	include('clientobjectsProgram.php'); 
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
	<style>
		.tahomabold11{line-height: 8px;}
	</style>
</head>
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->
<body>
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
        	<? createMenu(0, "Header"); ?>
      </div>
    </div>
    
  </div>
  <!-- For alternative headers END PASTE here -->
  <!-- B. MAIN -->
  <div class="main" style="margin:100px 0 100px 325px; width:400px; padding-bottom:0;">

    <link href="css/user.css" rel="stylesheet" type="text/css">
    
    <div class="contentHdr" style="background:#fff; margin-bottom:3%">
        <h2 style="background:#FFF; margin-left:21px">Login Here</h2>
    </div>
    
    <div class="content" style="">
    
        <table style="box-shadow:none" width="" border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF">
      		<tr> 
        		<td width="100%" height="100" align="center" valign="middle">
                	<table style="box-shadow:none" width="42%"  border="0" align="center" cellpadding="0" cellspacing="3">
    					<tr>
    						<td>
                            	<table style="box-shadow:none" width="100%"  border="0" cellpadding="0" cellspacing="3" 
                                class="tahomabold11">
    								<form action="<?php echo $PHP_SELF; ?>" method="post" name="frmUserLogin">
    									<?php if(!empty($errMsg)){ ?> 
                  							<tr align="center">
                    							<td colspan="3" class="warning"><?php echo $errMsg; ?></td>
                  							</tr>
                  						<?php } ?>
                  						<tr>
                    						<td width="11%">&nbsp;</td>
                      						<td width="30%" align="left" style="font-weight:bold; font-size:11px;">Username:</td> 
                    						<td width="59%" align="left">
                                            	<input name="uname" type="text" class="text" style="padding:0 2px; 
                                                border:1px solid; height:17px">
                                           	</td>
                  						</tr>
    			  						<tr><td>&nbsp;</td></tr>
                  						<tr>
    										<td>&nbsp;</td>
                      						<td align="left" style="font-weight:bold; font-size:11px">Password:</td> 
                    						<td align="left">
                                            	<input name="pswd" type="password" class="text" style="padding:0 2px; 
                                                border:1px solid; height:17px">
                                           	</td>
                  						</tr>
    									<tr><td>&nbsp;</td></tr>
                  						<tr>
                    						<td>&nbsp;</td> 
                    						<td>&nbsp;</td>
                    						<td align="left">
                                            	<input name="btnUserLogin" type="submit" class="button" value=" Login ">
                                           	</td>
                  						</tr>
                					</form>
            					</table>
                          	</td>
          				</tr>
        			</table>
        			<br>
              	</td>
      		</tr>
    	</table>

    </div>

  </div>
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;">
    <p>Copyright &copy; 20<?=date("y");?> MRSMP | All Rights Reserved</p>
    <p class="credits"> <a href="<?=SITE_URL?>">गृह पृष्‍ठ</a> | <a href="en/contact">सम्पर्क ठेगाना</a> | <a href="en/feedback">सुझाब तथा सल्लाह</a></p>
  </div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-159243-24";
urchinTracker();
</script>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>



