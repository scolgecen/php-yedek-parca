<?php 
  $siteMenuQuery=$db->prepare("SELECT * from tbl_marka limit 5");
  $siteMenuQuery->execute(array());
  $siteMenuResult=$siteMenuQuery->fetchALL(PDO::FETCH_ASSOC);

  //SİTE HAKKIMIZDA
  $siteHakkimizdaQuery=$db->prepare("SELECT * from tbl_hakkimizda where id=345");
  $siteHakkimizdaQuery->execute(array());
  $siteHakkimizdaResult=$siteHakkimizdaQuery->fetch(PDO::FETCH_ASSOC);
  // MARKA LOGOLARI ÇEKME
  $siteMenuTumMarkalarQuery=$db->prepare("SELECT * from tbl_marka limit 20");
  $siteMenuTumMarkalarQuery->execute(array());
  $siteMenuTumMarkalarResult=$siteMenuTumMarkalarQuery->fetchALL(PDO::FETCH_ASSOC);


  


?>
<div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <li class=""><a href="anasayfa">ANASAYFA</a></li>
            <?php foreach ($siteMenuResult as $menu) {
                $siteAltMenuQuery=$db->prepare("SELECT * from tbl_model where markaID=:marka_id");
                $siteAltMenuQuery->execute(array('marka_id'=>$menu['id']));
                $siteAltMenuResult=$siteAltMenuQuery->fetchALL(PDO::FETCH_ASSOC);
            ?>
            
            <li class="dropdown"> <a href="<?= $siteAyarResult['siteUrl'];?>markalar-<?=seo($menu['brandName']).'-'.$menu['id'];?>" target="_blank" class="" data-toggle="dropdown" role="button" aria-expanded="false"><?=$menu['brandName'];?></a>
                  <?php if($siteAltMenuQuery->rowCount()>0) {?>
                      <ul class="dropdown-menu" role="menu">
                         <?php foreach ($siteAltMenuResult as $altMenu) {?>
                          <li><a href="<?=$siteAyarResult['siteUrl'];?>modeller-<?=seo($altMenu['modelName']).'-'.$altMenu['id'];?>"><?=$altMenu['modelName']?></a></li>
                         <?php }?>
                      </ul>
                  <?php }?>
            </li>

            <?php }?>
             
         
            <li class="dropdown"> <a href="" class="" data-toggle="dropdown" role="button" aria-expanded="false">TÜM MARKALAR</a>
                 <ul class="dropdown-menu" role="menu">
                     <?php foreach ($siteMenuTumMarkalarResult as $tumMarkalar) {?>
                     <li><a href="<?=$siteAyarResult['siteUrl'];?>markalar-<?=seo($tumMarkalar['brandName']).'-'.$tumMarkalar['id'];?>"><?=$tumMarkalar['brandName']?></a></li>
                      <?php } ?>
                  </ul>
             </li> 
            
            <li class="li_iletisim"><a class="li_iletisim_a" href="iletisim">ILETISIM</a></li>
            <li class="li_siparis"><a class="li_siparis_a" href="siparis">SIPARIS VER</a></li>
            <li class="li_siparis"><a class="li_siparis_a" href="hakkimizda">HAKKIMIZDA</a></li>
           </ul>

        </div>
      </div>
    </nav>
  </div>