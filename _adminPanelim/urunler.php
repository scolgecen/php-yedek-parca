<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php


include "header.php"; include "sidebar.php"; 

// MODEL LİSTELEME SORGUSU
  // SAYFALAMA AYARLARI

    $sayfada=10;//sayfada gösterilecek içerik miktarını belirtiyoruz.
    $sorgu=$db->prepare("SELECT * from tbl_urun");
    $sorgu->execute();
    $toplam_icerik=$sorgu->rowCount();
    $toplam_sayfa=ceil($toplam_icerik/$sayfada);

    //eğer sayfa girilmemişse 1 varsayalım.
    $sayfa=isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
    if($sayfa < 1) $sayfa =1;

    // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayakım
    if($sayfa > $toplam_sayfa) $sayfa=$toplam_sayfa;

    $limit =($sayfa - 1)* $sayfada;
                                   
    //SAYFALAMA AYARLARI BİTİŞ
    $siteUrunQuery=$db->prepare("SELECT * from tbl_urun limit $limit,$sayfada");
    $siteUrunQuery->execute(array());
    $siteUrunResult=$siteUrunQuery->fetchALL(PDO::FETCH_ASSOC);

    //MARKA ADI SORGUSU
?>


  
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">YEDEK PARÇA EKLEME VE DÜZENLEME SAYFASI</h1>
                        <h1 class="page-subhead-line">Yedek Parçaları Bu Sayfadan Düzenleyebilirsiniz. </h1>
                        <div class="input-group col-md-4 pull-right" style="margin-bottom:5px;">
                                    <input type="text" class="form-control" placeholder="Arama.." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button">ARA</button>
                                    </span>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                    <!-- /row-->
                    <div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding-bottom:20px;">
                           ARAÇ YEDEK PARÇALARI
                           
                            <?php
                                if(@$_GET['islem']=='urunSilme_basarili'){?> 
                                <b style="color: green;">Yedek Parça Silme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='urunSilme_basarisiz') {?>

                                <b style="color: red;">Yedek Parça Silme Yapılamadı.</b>
                             <?php }?>
                             <?php
                                if(@$_GET['islem']=='modelDuzenle_basarili'){?> 
                                <b style="color: green;"> Model Düzenleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='modelDuzenle_basarisiz') {?>

                                <b style="color: red;"> Model Düzenleme Yapılamadı.</b>
                         <?php }?>
                          <a href="urun_ekle.php"> <button class="btn btn-primary" style=" font-size:14px;font-weight:bold;font-family:arial;float:right;" name="ayarKaydet">
                                      <i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;"></i>Yedek Parça Ekle</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="10%">Ürün Resim</th>
                                            <th width="30%">Ürün Adı</th>
                                            <th width="15%">Araç Model</th>
                                            <th width="15%">Araç Marka</th>
                                            <th width="30%">İşlemler</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                          <?php 
                                    
                                    foreach($siteUrunResult as $urunler){
                                        $model_id=$urunler['productModel'];
                                        $marka_id=$urunler['productBrand'];
                                        ?>
                                        <tr>
                                        <td><?=$urunler['id']?></td>
                                        <td><img src="<?=$urunler['productImage']?>" alt="" style="width:50px;height:50px;"></td>
                                        <td><?=$urunler['productName']?></td>
                                        <td>
                                            
                                            <?php
                                                $siteModelNameQuery=$db->prepare("SELECT * from tbl_model where id=:model_id");
                                                $siteModelNameQuery->execute(array('model_id'=>$model_id));
                                                $siteModelNameResult=$siteModelNameQuery->fetch(PDO::FETCH_ASSOC); 
                                            ?>
                                                <span class="label md label-warning col-md-7 col-sm-7 col-lg-7" style="height:30px; line-height:25px; font-weight:bold;font-size:14px;width:auto;color:black;opacity: 0.7; text-align:left;"><?=$siteModelNameResult['modelName'];?></span>
                                                
                                                
                                        </td>
                                        <td>
                                            
                                            <?php
                                                $siteMarkaNameQuery=$db->prepare("SELECT * from tbl_marka where id=:marka_id");
                                                $siteMarkaNameQuery->execute(array('marka_id'=>$marka_id));
                                                $siteMarkaNameResult=$siteMarkaNameQuery->fetch(PDO::FETCH_ASSOC); 
                                            ?>
                                                <span class="label md label-warning col-md-7 col-sm-7 col-lg-7" style="height:30px; line-height:25px; font-weight:bold;font-size:14px;width:auto;color:black;opacity: 0.7; text-align:left;"><?=$siteMarkaNameResult['brandName'];?></span>
                                                
                                        </td>
                                         <td>
                                        <a href="model_ekle.php?urunGoster=<?=$urunler['id']?>">
                                            <button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Gör</button>
                                        </a>&nbsp;
                                        <a href="urun_ekle.php?urunDuzenle=<?=$urunler['id']?>">
                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Düzenle</button>
                                        </a>&nbsp;
                                        <a href="_Db/islem.php?urunSil=ok&urun_id=<?= $urunler['id'];?>">
                                            <button class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Sil</button>
                                        </a>
                                        </td>
                                       
                                        </tr>
                                        <?php }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
                
            </div><!-- /row-->
            <ul class="pagination pull-right" style="padding:0px;margin:0px;">
                        <li class="disabled"><a href="#">&laquo;</a></li>
                       <?php 

                    $s=0;
                    while($s < $toplam_sayfa){

                    $s++; ?>    
                    <?php if($s==$sayfa) { ?>
                    <li class="active">
                        <a href="urunler.php?sayfa=<?=$s;?>"><?=$s;?></a>

                    </li>
                    <?php } else {?>
                    <li>    
                    <a href="urunler.php?sayfa=<?=$s;?>"><?=$s;?></a>

                    </li>
                    <?php } } ?>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>


