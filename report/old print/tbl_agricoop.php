<tr>
    <td><span class="title">सहकारीको नाम</span> :</td>
    <td>
        <?=$row['cooperativeName'];?>
    </td>
</tr>
<tr>
    <td><span class="title">ठेगाना</span> :</td>
    <td>
        <div class="inputleft">
            <div>गा.वि.स./न. पा.</div>
            <div><?=$row['addressVdcMunicipality'];?></div>
            <div style="clear:both"></div>
        </div>
        <div class="inputleft inputright">
            <div>वडा नं.</div>
            <div><?=$row['addressWardNumber'];?></div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr>
    <td><span class="title">दर्ता मिति</span> :</td>
    <td>
        <?=$row['registeredDay']."/".$row['registeredMonth']."/".$row['registeredYear'];?>
    </td>
</tr>
<tr>
    <td><span class="title">दर्ता नं.</span> :</td>
    <td>
      	<?=$row['registrationNumber'];?>
    </td>
</tr>
<tr>
    <td><span class="title">सदस्य संख्या</span> :</td>
    <td>
        <div class="inputleft">
            <div>महिला</div>
            <div><?=$row['femaleNumber'];?></div>
            <div style="clear:both"></div>
        </div>
        <div class="inputleft inputright">
            <div>पुरुष</div>
            <div><?=$row['maleNumber'];?></div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
    </td>
</tr>
<tr>
    <td><span class="title">विषयगत कार्यक्षेत्र</span> :</td>
    <td>
      	<?=$row['workingField'];?>
    </td>
</tr>
<tr>
    <td><span class="title">कार्य संचालन गरेका गा.वि.स/न.पा</span> :</td>
    <td>
      	<?=$row['workingVdcMunicipality'];?>
    </td>
</tr>
<tr>
    <td><span class="title">हाल सम्मको जम्मा कोष</span> :</td>
    <td>
      	Rs. <?=$row['totalFund'];?>
    </td>
</tr>
<tr>
    <td><span class="title">कोष परिचालन(ऋण प्रवाह)</span> :</td>
    <td>
      	Rs. <?=$row['debtAmount'];?>
    </td>
</tr>
<tr>
    <td><span class="title">सम्पर्क व्यक्ति/फोन नं</span> :</td>
    <td>
      	<?=$row['contactPerson'];?>
    </td>
</tr>