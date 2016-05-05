<?php //include("includes/breadcrumb.php"); ?>

<div class="main-content" style="width:100%; font-size:12px; text-align:justify">
	<h1 class="pagetitle"><?php echo $pageNamenp; ?></h1>

<div class="content">
<?php
  $cont=$groups->getById($pageId);
  $contGet=$conn->fetchArray($cont);
  echo $contGet['contentsnp'];
?>
</div>
</div>