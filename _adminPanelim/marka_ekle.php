<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php include "header.php"; ?>

<?php include "sidebar.php";
  //$siteHakkimizdaQuery=$db->prepare("SELECT * from tbl_hakkimizda where id=?");
  //$siteHakkimizdaQuery->execute(array(345));
  //$siteHakkimizdaResult=$siteHakkimizdaQuery->fetch(PDO::FETCH_ASSOC);
  if(isset($_GET['markaDuzenle']) && !empty($_GET['markaDuzenle'])){
     $marka_id=$_GET["markaDuzenle"];

    $markaDuzenle=$db->prepare("SELECT * from tbl_marka where id=:marka_id");
    $markaDuzenle->execute(array('marka_id'=>$marka_id));

     $markaDuzenleResult=$markaDuzenle->fetch(PDO::FETCH_ASSOC);
    

   
  }
 ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">MARKA <?=((isset($_GET['markaDuzenle']))?'DÜZENLE':'EKLE');?> Sayfası</h1>
                        <h1 class="page-subhead-line">Araç Markalarını ekleme ve düzenleme işlemini bu sayfadan Yapabilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             
                <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          MARKA <?=((isset($_GET['markaDuzenle']))?'DÜZENLE':'EKLE');?>   
                          <?php
                                if(@$_GET['islem']=='markaEkle_basarili'){?> 
                                <b style="color: green;"> Marka Ekleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='markaEkle_basarisiz') {?>

                                <b style="color: red;"> Marka Ekleme Yapılamadı.</b>
                                <?php }?>
                               
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_DB/islem.php" method="post" enctype="multipart/form-data">     
                                 <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Marka Resim <?=((isset($_GET['markaDuzenle']))?'Düzenle':'Ekle');?> </label>
                                    <div class="form-group col-md-12">
                                     
                                      <div class="form-group">
                                            
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?=((isset($_GET['markaDuzenle']))?$markaDuzenleResult['brandImage']:'_PanelResimler/_Markalar/no_images.png');?>" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değitir</span><input type="file" name="brandImage"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                      
                                    </div>
                                </div>
                                
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Marka Adı</label>
                                    <input type="text" name="brandName" class="form-control" id="default" value="<?=((isset($_GET['markaDuzenle']))?$markaDuzenleResult['brandName']:'');?>" />
                                </div>
                               
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Marka Açıklama</label>
                                    <input type="text" name="brandDescription" class="form-control" id="default" value="<?=((isset($_GET['markaDuzenle']))?$markaDuzenleResult['brandDescription']:'');?>" />
                                </div>
                               <?php 
                               if(isset($_GET['markaDuzenle'])){ ?>
                                <input type="hidden" name="brandImageEski" value="<?=$markaDuzenleResult['brandImage'];?>">
                                <input type="hidden" name="id_deger" value="<?=$markaDuzenleResult['id'];?>">
                               <?php }?>

                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" style="margin-top:20px; font-size:14px;font-weight:bold;font-family:arial;" name="<?=((isset($_GET['markaDuzenle']))?'markaDuzenle':'markaEkle');?>">
                                      <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right:10px;"></i>MARKA <?=((isset($_GET['markaDuzenle']))?'Düzenle':'Ekle');?></button>
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


