<style>
	.download{width:650px;}
	.download ul{ margin:0;}
	.download ul li{ list-style:none;}
</style>	
<?php //include("includes/breadcrumb.php"); ?>
<div class="main-content" style="width:100%; font-size:12px;text-align:justify">
<h1 class="pagetitle"><?php echo $pageNamenp; ?></h1>
<div class="content">
<?php
  $cont=$groups->getById($pageId);
  $contGet=$conn->fetchArray($cont);
  echo $contGet['contentsnp'];
?>
<br />
<?
	if($pageId==350 or $pageId==341)
	{
		echo '<div class="download"><ul>';
		$down=$groups->getByParentId($pageId);
		while($downRow=$conn->fetchArray($down))
		{?>
			<li>
            	<div style="float:left;width:500px;"><?=$downRow['namenp'];?></div>
            	<div style="float:right;">
                	<a href="<?=CMS_FILES_DIR.$downRow['contents'];?>"><img src="img/pdf.png" width="30" /></a>
             	</div>
            	<div style="clear:both"></div>
			</li>
		<? }
		echo '</ul></div>';
	}
?>


</div>
</div>