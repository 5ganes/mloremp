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
        <p><b>Details(English)</b></p>
        <textarea id="contents" name="contents"><?=$groupRow['contents'];?></textarea>
    </div>
    <div style="">
        <p><b>Details(Nepali)</b></p>
        <textarea id="contentsnp" name="contentsnp"><?=$groupRow['contentsnp'];?></textarea>
    </div>
    <div style="clear:both"></div>
</div>
<script type="text/javascript">

    //CKEDITOR.basepath = "/ckeditor/";
    CKEDITOR.replace( 'contents');
    CKEDITOR.replace( 'contentsnp' );
    //var editor_data = CKEDITOR.instances.shortcontents.getData();
</script>