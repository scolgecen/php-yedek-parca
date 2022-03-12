
<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php include "header.php"; ?>

<?php include "sidebar.php";

 if(isset($_GET['modelDuzenle']) && !empty($_GET['modelDuzenle'])){
     $model_id=$_GET["modelDuzenle"];
      $modelDuzenle=$db->prepare("SELECT * from tbl_model where id=:model_id");
    $modelDuzenle->execute(array('model_id'=>$model_id));
    $modelDuzenleResult=$modelDuzenle->fetch(PDO::FETCH_ASSOC);
 }
    // VERİTABANINDAN MARKA İSMİNİ ÇEKME
  $siteMarkaListQuery=$db->prepare("SELECT * from tbl_marka");
  $siteMarkaListQuery->execute(array());
  $siteMarkaListResult=$siteMarkaListQuery->fetchALL(PDO::FETCH_ASSOC);

   

  
 ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">MODEL <?=((isset($_GET['modelDuzenle']))?'DÜZENLEME':'EKLEME');?> Sayfası</h1>
                        <h1 class="page-subhead-line">Araç modellerini ekleme ve düzenleme işlemini bu sayfadan Yapabilirsiniz.  </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             
                <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          MODEL <?=((isset($_GET['modelDuzenle']))?'DÜZENLE':'EKLE');?>     
                                <?php
                                if(@$_GET['islem']=='modelEkle_basarili'){?> 
                                <b style="color: green;">Model Ekleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='modelEkle_basarili') {?>

                                <b style="color: red;">Model Ekleme Yapılamadı.</b>
                                <?php }?>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_DB/islem.php" method="post" enctype="multipart/form-data">
                                
                                  <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Model Resim <?=((isset($_GET['modelDuzenle']))?'Düzenle':'Ekle');?> </label>
                                    <div class="form-group col-md-12">
                                     
                                      <div class="form-group">
                                            
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?=((isset($_GET['modelDuzenle']))?$modelDuzenleResult['modelImage']:'_PanelResimler/_Modeller/no_images.png');?>" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değitir</span><input type="file" name="modelImage"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                      
                                    </div>
                                </div>   
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Marka Adı</label>
                                    <select name="brandName" id="" class="form-control">
                                        <?php foreach ($siteMarkaListResult as $markaListe) {?>
                                           
                                             <option value="<?=$markaListe['id'];?>"<?= ((isset($_GET['modelDuzenle']) && ($modelDuzenleResult['markaID'] == $markaListe['id']))?'selected':'');?>><?=$markaListe['brandName']?></option>
                                        <?php } ?>
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Model Adı</label>
                                    <input type="text" name="modelName" class="form-control" id="default" value="<?=((isset($_GET['modelDuzenle']))?$modelDuzenleResult['modelName']:'');?>" />
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Model AÇIKLAMA</label>
                                    <input type="text" name="modelDescription" class="form-control" id="default" value="<?=((isset($_GET['modelDuzenle']))?$modelDuzenleResult['modelDescription']:'');?>" />
                                </div>

                                  <?php 
                               if(isset($_GET['modelDuzenle'])){ ?>
                                <input type="hidden" name="modelImageEski" value="<?=$modelDuzenleResult['modelImage'];?>">
                                
                                <input type="hidden" name="id_deger" value="<?=$modelDuzenleResult['id'];?>">
                               <?php }?>
                                 
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" style="margin-top:20px; font-size:14px;font-weight:bold;font-family:arial;" name="<?=((isset($_GET['modelDuzenle']))?'modelDuzenle':'modelKaydet');?>">
                                      <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right:10px;"></i>MODEL <?=((isset($_GET['modelDuzenle']))?'DÜZENLE':'EKLE');?></button>
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


