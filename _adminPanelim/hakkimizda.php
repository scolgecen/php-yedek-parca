<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php include "header.php"; ?>

<?php include "sidebar.php";
  $siteHakkimizdaQuery=$db->prepare("SELECT * from tbl_hakkimizda where id=?");
  $siteHakkimizdaQuery->execute(array(345));
  $siteHakkimizdaResult=$siteHakkimizdaQuery->fetch(PDO::FETCH_ASSOC);
  
 ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Hakkımızda Sayfası</h1>
                        <h1 class="page-subhead-line">Hakkımızda Bilgilerini Girmek İçin Aşağıdaki Formu Doldurunuz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             
                <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          HAKKIMIZDA    <?php
                                if(@$_GET['islem']=='basarili'){?> 
                                <b style="color: green;"> Güncelleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='basarisiz') {?>

                                <b style="color: red;">Güncelleme Yapılamadı.</b>
                                <?php }?>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_DB/islem.php" method="post" enctype="multipart/form-data">
                               <br />      
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Vizyonumuz</label>
                                    <input type="text" name="siteVizyon" class="form-control" id="default" value="<?=$siteHakkimizdaResult['siteVizyon']?>" />
                                </div>

                                 <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Misyonumuz</label>
                                    <input type="text" name="siteMisyon" class="form-control" id="default" value="<?=$siteHakkimizdaResult['siteMisyon']?>"/>
                                </div>
                                 <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Kısa Yazı</label>
                                    <input type="text" name="siteKisaYazi" class="form-control" id="default" value="<?=$siteHakkimizdaResult['siteKisaYazi']?>" />
                                </div>
                                 <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Açıklama</label>
                                    <textarea id="" cols="30" rows="5" name="SiteIcerik" class="form-control"><?=$siteHakkimizdaResult['SiteIcerik']?></textarea>
                                    
                                </div>
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" style="margin-top:20px; font-size:14px;font-weight:bold;font-family:arial;" name="hakkimizdaKaydet">
                                      <i class="fa fa-floppy-o fa-2x" aria-hidden="true" style="margin-right:10px;"></i>AYARLARI KAYDET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>


