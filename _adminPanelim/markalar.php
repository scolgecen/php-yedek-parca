<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php
    include "header.php"; 
    include "sidebar.php"; 
    
    // SAYFALAMA AYARLARI

    $sayfada=5;//sayfada gösterilecek içerik miktarını belirtiyoruz.
    $sorgu=$db->prepare("SELECT * from tbl_marka");
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

    // MARKA LİSTELEME SORGUSU
    $siteMarkaQuery=$db->prepare("SELECT * from tbl_marka limit $limit,$sayfada");
    $siteMarkaQuery->execute(array());
    $siteMarkaResult=$siteMarkaQuery->fetchALL(PDO::FETCH_ASSOC);
    //$markaCount=$siteMarkaResult->rowCount();

   

  
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">ARAÇ MARKA EKLEME VE DÜZENLEME SAYFASI</h1>
                        <h1 class="page-subhead-line">Yedek Parçaların Araç Markalarını Bu Sayfadan Düzenleyebilirsiniz. </h1>
                        
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
                           ARAÇ MARKALARI     
                    <?php
                                if(@$_GET['islem']=='markaSilme_basarili'){?> 
                                <b style="color: green;">Marka Silme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='basarisiz') {?>

                                <b style="color: red;">Marka Silme Yapılamadı.</b>
                    <?php }?>
                    <?php
                                if(@$_GET['islem']=='markaDuzenle_basarili'){?> 
                                <b style="color: green;"> Marka Düzenleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='markaDuzenle_basarisiz') {?>

                                <b style="color: red;"> Marka Düzenleme Yapılamadı.</b>
                     <?php }?>
                    <a href="marka_ekle.php">
                        <button class="btn btn-primary" style=" font-size:14px;font-weight:bold;font-family:arial;float:right;" name="ayarKaydet">
                       <i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;"></i>Marka Ekle</button>
                   </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Marka Resim</th>
                                            <th>Marka Adı</th>
                                            <th>Marka Açıklama</th>
                                            <th>İşlemler</th>
                                         </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    
                                    foreach($siteMarkaResult as $markalar){
                                        ?>
                                        <tr>
                                        <td><?=$markalar['id']?></td>
                                        <td><img src="<?=$markalar['brandImage']?>" alt="" style="width:50px;height:50px;"></td>
                                        <td><?=$markalar['brandName']?></td>
                                        <td><?=$markalar['brandDescription']?></td>
                                         <td>
                                        <a href="marka_ekle.php?markaDuzenle=<?=$markalar['id']?>">
                                            <button class="btn btn-primary">Düzenle</button>
                                        </a>&nbsp;
                                        <a href="_Db/islem.php?markaSil=ok&marka_id=<?= $markalar['id'];?>">
                                            <button class="btn btn-danger">Sil</button>
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
                        <a href="markalar.php?sayfa=<?=$s;?>"><?=$s;?></a>

                    </li>
                    <?php } else {?>
                    <li>    
                    <a href="markalar.php?sayfa=<?=$s;?>"><?=$s;?></a>

                    </li>
                    <?php } } ?>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>


