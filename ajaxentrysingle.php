<? include('clientobjectsProgram.php'); $pn=$_POST['pn'];?>
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
    <li style="margin-right:0"><p class="delete" onclick="deleteRow('delete<?=$pn-1?>');">delete</p></li>
    <div style="clear:both"></div>
</ul>