<!-- B.2 MAIN CONTENT -->
<div class="main-content">
      <!-- Pagetitle -->
      <? $wel=$groups->getById(176); $welget=$conn->fetchArray($wel);?>
      <h1 class="pagetitle"><?=$welget['name'];?></h1>
      <!-- Content unit - One column -->
      <div class="column1-unit">
        <p style="text-align:justify;line-height:2.2em">
      		<? echo $welget['shortcontents'];?>
        </p>
		<a href="en/<?=$welget['urlname'];?>">पुरा हेर्नुहोस...</a>
      </div>
      <hr class="clear-contentunit" />
      <!-- Content unit - One column -->
      <div class="column1-unit">
        <h1 class="pagetitle" style=" margin-top:12px">सुचना तथा समाचार</h1>
        <ul>
        	<? $news=$groups->getByParentIdWithLimit(321,20);
			while($newsGet=$conn->fetchArray($news))
			{?>
            	<li><a href="en/<?=$newsGet['urlname'];?>"><?=$newsGet['name'];?></a></li>
        	<? }?>
        	
     	</ul>
      </div>
      <hr class="clear-contentunit" />
      
    </div>
<!-- B.3 SUBCONTENT -->
<div class="main-subcontent">
      <!-- Subcontent unit -->

      <!-- Navigation Level 3 -->
      <h1 class="first">Information Categories</h1>
      <!-- Navigation with grid style -->
      <dl style="margin-bottom:20px" class="nav3-grid">
        <? $info=$groups->getByParentIdWithLimit(241,20);
    while($infoGet=$conn->fetchArray($info))
    {?>
          <dt> <a href="en/<?=$infoGet['urlname'];?>"><?=$infoGet['name'];?></a></dt>
        <? }?>
      </dl>
      
      <div class="subcontent-unit-border">
        <div class="payment">
        	<p>
            	<a href="bills.html" style="color:white; text-align:center; font-size:16px; font-weight:bold; line-height:1.3">
            		भुक्तानीका लागि प्राप्त विलहरुको सार्वजनिकरण
             	</a>
          	</p>
        </div>
      </div>
      
      <div class="subcontent-unit-border">
        
        <h1>Previous Instruments</h1>
        <ul>
        	<? $pre=$groups->getByParentId(332);
			while($preGet=$conn->fetchArray($pre))
			{?>
        		<li><a href="<?=$preGet['urlname'];?>"><?=$preGet['name'];?></a></li>
        	<? }?>
     	</ul>
      </div>
     
    </div>