<tr>
    <td class="heading2">
        <span style="color:#cc0000">
            &nbsp;Manage Form Reports 
            <? $distName=$program->getDistrictById($_GET['districtId']); echo "/ ".$distName['district_name'];?>
        </span>
    </td>
</tr>
<tr>
    <td class="bgborder">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td bgcolor="#FFFFFF">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                      <td>
                      <table width="100%"  border="0" cellpadding="4" cellspacing="0">
                         
                          <tr bgcolor="#F1F1F1">
                            <td class="tahomabold11" style="width:100px">S.No</td>
                            <td class="tahomabold11" style="text-align:left">Form Category</td>
                            <td class="tahomabold11" style="width:250px">District</td>
                            <td class="tahomabold11">Action</td>
                        </tr>
                          
                          <?php
                          $counter = 0;
                          
                          //$district=$program->getDistrictByUserId($_GET['districtId']);
                          //$district=$conn->fetchArray($district); 
                          $result = $program->getProgramTypes();
                          while ($row = $conn->fetchArray($result))
                          {
                            $counter++;
                            ?>
                            <tr <?php if ($counter % 2 == 0) { echo "bgcolor='#F7F7F7'";} ?>>
                                <td valign="top" align="center"><?php echo $counter; ?></td>
                                <td valign="top" align="left"><?=$row['program_name'];?></td>
                                <td valign="top" align="center"><? echo $distName['district_name']?></td>
                                <td valign="top" align="center">
                                   <a href="reportcentral.php?typeId=<?php echo $row['id']; ?>&districtId=<?php echo $distName['id']; ?>">Show</a>
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