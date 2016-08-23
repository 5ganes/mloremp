<? include('clientobjects.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>
	बजार अनुसन्धान तथा तथ्यांक व्यवस्थापन कार्यक्रम-
	<?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "गृह पृष्‍ठ";}?>
</title>
<? include('baselocation.php'); ?>
<meta name="description" content="Market Research and Stastistics Management Programme" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_setup.css" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_text.css" />
</head>
<body>
<!-- Main Page Container -->
<div class="page-container">
  <!-- For alternative headers START PASTE here -->
  <!-- A. header--->
  <div class="header">
    <!-- A.1 header-TOP -->
    <div class="header-top">
      <!-- Sitelogo and sitename -->
      <div class="logo">
      	<a class="sitelogo" href="<?=SITE_URL;?>"><img src="img/home.png" /></a>
      </div>
      <div class="sitename">
        <? include("program/titlenp.php");?>
      </div>
      <!-- Navigation Level 0 -->
      <div class="nav0">
        <img src="img/flagnepal.gif" />
        <p style="margin:0px 0 0;font-size:13px;"><a href="<?=SITE_URL;?>en" style="color:white">English</a></p>
      </div>
      <div style="clear:both"></div>
      
    </div>
    <!-- A.2 header-MIDDLE -->
    
    <!-- A.3 header-BOTTOM -->
    <div class="header-bottom">
      <!-- Navigation Level 2 (Drop-down menus) -->
      <div class="nav2">
        	<? createMenuNp(0, "Header"); ?>
      </div>
    </div>
    
  </div>
  <!-- For alternative headers END PASTE here -->
  <!-- B. MAIN -->
  <div class="main">
    <!-- B.1 MAIN NAVIGATION -->
    <div class="main-navigation">
      <!-- Navigation Level 3 -->
      
      <? $msg=$groups->getById(274); $msgGet=$conn->fetchArray($msg); ?>
      <h1 style="margin:0"><?=$msgGet['namenp'];?></h1>
      <img src="<?=CMS_GROUPS_DIR.$msgGet['image'];?>" width="150px" style="margin:7px 7px 7px 14px" />
      <p style="text-align:justify"><?=$msgGet['shortcontentsnp'];?>...<br />
      <a style="float:right" href="<?=$msgGet['urlname'];?>">पुरा हेर्नुहोस...</a></p>

      <? $msg=$groups->getById(INFO_OFFICER); $msgGet=$conn->fetchArray($msg); ?>
      <h1 style="margin:0"><?=$msgGet['namenp'];?></h1>
      <img src="<?=CMS_GROUPS_DIR.$msgGet['image'];?>" width="150px" style="margin:7px 7px 7px 14px" />
      <p style="text-align:justify"><?=$msgGet['shortcontentsnp'];?>...<br />
      <a style="float:right" href="<?=$msgGet['urlname'];?>">पुरा हेर्नुहोस...</a></p>

      <!-- Template infos -->
      <h1 style="margin:0">महत्वपुर्ण लिंकहरु</h1>
      <ul style="margin:0 5px 0 6px">
      	<? $links=$groups->getByParentIdWithLimit(275, 10);
		while($linksGet=$conn->fetchArray($links))
		{?>
   			<li><a href="<?=$linksGet['contents'];?>" target="_blank"><?=$linksGet['namenp'];?></a></li>
        <? }?>
      </ul>
 
    </div>
    
    <div class="dynamic">
    	
        <?php 
			if(isset($_GET['action']))
			{
				$action = $_GET['action'];
				$action = str_replace(".","", $action);
				include("includes/".$action.".php");			
			}				
			else if(isset($pageLinkType))
			{
				if ($pageLinkType == ""){}
				else{ include("includes/cmspage.php"); }
			}
			else{ include("includes/mainnp.php"); }
		?>
        
  	</div>
    <div style="clear:both"></div>
  </div>
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;">
    <p>Copyright &copy; 20<?=date("y");?> MRSMP | All Rights Reserved</p>
    <p class="credits"> <a href="<?=SITE_URL?>">गृह पृष्‍ठ</a> | <a href="contact">सम्पर्क ठेगाना</a> | <a href="feedback">सुझाब तथा सल्लाह</a></p>
  </div>
</div>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>
<? //session_destroy(); ?>