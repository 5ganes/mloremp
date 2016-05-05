<?
if(!isset($_POST['pn'])){
	header("Location: programlogin.php");
	exit();
}
include('clientobjectsProgram.php');
$pn=$_POST['pn'];?>
<ul class="entrylist">
    <li>
    	<ul>
    		<li style="width:150px;">सहभागीको नाम</li>
  			<li style="width:140px;">ठेगाना</li>
    		<li style="width:70px">लिङ्ग</li>
    		<li style="width:85px">जात / जाती</li>
            <li style="width:55px">उमेर</li>
            <div style="clear:both"></div>
        </ul>
    </li>
	<?
    for($i=0;$i<$pn;$i++)
    {?>
        <li id="delete<?=$i?>">
        	<ul>
            	<li><input type="text" name="participantName[]" class="text" style="width:145px" required /></li>
                <li><input type="text" name="participantAddress[]" class="text" style="width:135px" required /></li>
                <li>
                	<select name="participantGender[]" class="text" style="width:65px">
						<?
                        $unit=$groups->getUnitByCategory("लिगं");
                        while($unitGet=$conn->fetchArray($unit))
                        {?>
                            <option value="<?=$unitGet['id'];?>"><?=$unitGet['name'];?></option>
                        <? }
                        ?>
                    </select>
                </li>
                <li>
                	<select name="participantCast[]" class="text" style="width:90px">
						<?
                        $caste=$program->getCaste();
                        while($casteGet=$conn->fetchArray($caste))
                        {?>
                            <option value="<?=$casteGet['name'];?>">
                                <?=$casteGet['name'];?>
                            </option>  
                        <? }
                        ?>
                    </select>
                </li>
                <li><input type="text" name="participantAge[]" class="text" style="width:40px" required /></li>
                <li style="margin-right:0"><p class="delete" onclick="deleteRow('delete<?=$i?>');">delete</p></li>
                <div style="clear:both"></div>
         	</ul>
      	</li>
    <? }?>
</ul>