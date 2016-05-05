<?php
	include ("../fckeditor/fckeditor.php");
	$sBasePath="../fckeditor/";
?>
<div>
	<div style="float:left; width:49%;">
    	<p>Summary(English)</p>
		<textarea name="shortcontents" rows="10" cols="45"><?=$groupRow['shortcontents'];?></textarea>
	</div>
    <div style="float:right; width:49%">
		<p>Summary(Nepali)</p>
		<textarea name="shortcontentsnp" rows="10" cols="45"><?=$groupRow['shortcontentsnp'];?></textarea>
	</div>
    <div style="clear:both"></div>
</div>
	
<div>
	<div style="">
		<?
        echo '<p>Details(English)</p>';
        $oFCKeditor = new FCKeditor('contents');
        $oFCKeditor->BasePath	= $sBasePath ;
        $oFCKeditor->Value		= $groupRow['contents'];
        $oFCKeditor->Height		= "200";
        $oFCKeditor->ToolbarSet	= "Rupens";	
        $oFCKeditor->Create();
		?>	
	</div>
    <div style="">
		<? echo '<p>Details(Nepali)</p>';
        $oFCKeditor = new FCKeditor('contentsnp');
        $oFCKeditor->BasePath	= $sBasePath ;
        $oFCKeditor->Value		= $groupRow['contentsnp'];
        $oFCKeditor->Height		= "200";
        $oFCKeditor->ToolbarSet	= "Rupens";	
        $oFCKeditor->Create();
    	?>
	</div>
    <div style="clear:both"></div>
</div>