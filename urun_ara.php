
<?php include"inc/head.php";?>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
 <?php include"inc/header.php";?>
  <?php include"inc/menuler.php";?>
  <section id="mainContent">
    <?php include"inc/slider.php";?>

    <?php if(isset($_POST['arananUrun']) && !empty($_POST['arananUrun'])){
    	 $arananUrun=$_POST['arananUrun'];
		
		$siteUrunAraQuery=$db->prepare("SELECT * from tbl_urun where productName lIKE ?");
      	$siteUrunAraQuery->execute(array("%$arananUrun%"));
      	$siteUrunAraToplam=$siteUrunAraQuery->rowCount();
      	$siteUrunAraResult=$siteUrunAraQuery->fetchALL(PDO::FETCH_ASSOC);
}else{
	echo "Lütfen Aranılacak Ürün Adı Yazınız.";
}
    ?> 
    <?php 
  //ANASAYFA İÇERİK ÇEKİMİ
  $siteAnasayfaMarkaQuery=$db->prepare("SELECT * from tbl_marka limit 5");
  $siteAnasayfaMarkaQuery->execute(array());
  $siteAnasayfaMarkaResult=$siteAnasayfaMarkaQuery->fetchALL(PDO::FETCH_ASSOC);
  // MARKA LOGOLARI ÇEKME

  
     ?>


    
    <div class="row" style="margin-bottom:100px;">

          <div class="col-md-12 col-lg-12">
          <div class="col-md-12 col-lg-12">
          <div class="single_bottom_rightbar">
              <div class="blog_archive wow fadeInDown">
               
              </div>

            <h2 style="margin-top:50px;">Aradığınız Ürünle İlgili Bulunan Sonuçlar</h2>
           
          </div>
          </div>
          </div>
          <ul class="catg1_nav">
              <li>
              <div class="col-md-12">
                <?php if(@$siteUrunAraToplam >0 ) {
                	foreach ($siteUrunAraResult as $urunAra) { ?>
                  <div class="col-md-3 row1_top"><a href="<?=$siteAyarResult['siteUrl']?>yedek-parca-<?=seo($urunAra['productName']).'-'.$urunAra['id'];?>" class="catg1_img"> <img alt="<?=$urunAra['productImage'];?>" src="<?=$siteAyarResult['siteUrl']?>_adminPanelim/<?=$urunAra['productImage'];?>" class="catg1_img_class"> </a><h5 class="post_titile"><a href="<?=$siteAyarResult['siteUrl']?>yedekParcaDetay.php?yedekParca=<?=$urunAra['id'];?>" class="urun_resim_isim"><?=$urunAra['productName'];?></a></h5>
                    <!--
                    <div class="col-md-12 fiyat_stok">
                        <div class="row">
                          <div class="col-md-6"><p>Fiyatı </p> 80.00 TL</div>
                          <div class="col-md-6"><p>Stok Durumu </p> <i class="fa fa-check-square var"       aria-hidden="true"><strong class="stok_var"> Var</strong></i></div>
                        </div>
                    </div>
                  -->
                  </div>
                <?php } }else { ?>
						<h5 class="post_titile">Aradığınız ürüne ait birşey bulunamadı.</h5>
                   <?php } ?>

              </div>
              
            </li>
          </ul>
       </div>
      
       <!-- row sonu-->  
        <!-- row sonu-->  
        <!-- row sonu-->  
<!-- EN ÇOK SATANLAR VE EN ÇOK ARANANLAR-->
        <div class="row" id="cok_stn">
          <div class="col-md-12">
              <div class="col-md-6">
                <div class="single_bottom_rightbar1">
              <div class="blog_archive wow fadeInDown">
               
              </div>

            <h2>Çok Satanlar <span style="float: right; color: #ffa500;"></span></h2>
            
           
          </div>

          <div class="col-md-9">
          <div class="content_middle_middle">
          <div class="slick_slider2">
            
              <?php 
              $siteAnasayfaCokSatanQuery=$db->prepare("SELECT * from tbl_urun order by RAND() limit 50");
              $siteAnasayfaCokSatanQuery->execute(array());
              $siteAnasayfaCokSatanResult=$siteAnasayfaCokSatanQuery->fetchALL(PDO::FETCH_ASSOC);

            ?>
            <?php foreach ($siteAnasayfaCokSatanResult as $key => $anasayfaCokSatan) {?>

            <div class="single_featured_slide"> <a href="<?=$siteAyarResult['siteUrl']?>yedekParcaDetay.php?yedekParca=<?=$anasayfaCokSatan['id'];?>"><img src="<?=$siteAyarResult['siteUrl']?>_adminPanelim/<?=$anasayfaCokSatan['productImage']?>" alt=""></a>
            <h5 class="post_titile"><a href="<?=$siteAyarResult['siteUrl']?>yedekParcaDetay.php?yedekParca=<?=$anasayfaCokSatan['id'];?>" class="urun_resim_isim"><?=$anasayfaCokSatan['productName'];?></a></h5>
               <!--
               <div class="col-md-12 fiyat_stok1">
                    <div class="row">
                          <div class="col-md-5">Fiyatı : <span>80.00 TL</span></div>
                          <div class="col-md-7">Stok Durumu :  <span><i class="fa fa-times yok"     aria-hidden="true"><strong> Yok</strong></i></span></div>
                        </div>
                </div> -->
              
            </div>
            <?php } ?>
          </div>
        </div> 
        </div>
              </div>

              <div class="col-md-6">
                <div class="single_bottom_rightbar1">
              <div class="blog_archive wow fadeInDown">
               
              </div>

            <h2>SİPARİŞ FORMU<span style="float: right; color: #ffa500;"></span> </h2>
           
          </div>

              <div class="contact_bottom">
              
                 <div class="col-md-12 col-lg-12">
                <form action="#" class="contact_form">

                <div class="col-lg-6 col-md-6">
                  <input class="form-control col-lg-3 col-md-3" type="text" placeholder="Ad">
                </div>
                <div class="col-lg-6 col-md-6">
                  <input class="form-control col-lg-3 col-md-3" type="text" placeholder="Soyad">
                </div>
                <div class="col-lg-6 col-md-6">
                  <input class="form-control" type="email" placeholder="Telefon">
                </div>
                <div class="col-lg-6 col-md-6">
                  <input class="form-control" type="email" placeholder="E-Posta">
                </div>
                <div class="col-lg-12 col-md-12">
                  <input class="form-control" type="email" placeholder="Adres">
                </div>
                <div class="col-lg-12 col-md-12">
                  <textarea class="form-control" cols="30" rows="10" placeholder="Sipariş vermek istediğiniz ürünü yazınız."></textarea>
                </div>
                <div class="col-lg-6 col-md-6">
                  <button type="submit" class="form-control btn btn-warning col-lg-6 col-md-6 gonder">SİPARİŞ VER</button>
                 </div>
                  
                  
                  
                 
                </form>
                </div>
              
            </div>
              </div>

              
          </div>
        </div>
      
   
  </section>
</div>
<?php include "inc/footer.php"; ?>