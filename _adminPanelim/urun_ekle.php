<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php include "header.php"; ?>

<?php include "sidebar.php";

if(isset($_GET['urunDuzenle']) && !empty($_GET['urunDuzenle'])){
    $urun_id=$_GET["urunDuzenle"];

        $urunDuzenle=$db->prepare("SELECT * from tbl_urun where id=:urun_id");
        $urunDuzenle->execute(array('urun_id'=>$urun_id));
        $urunDuzenleResult=$urunDuzenle->fetch(PDO::FETCH_ASSOC);
 }

 //MARKA LİSTESİNİN SORGUSU


    $siteMarkaListQuery=$db->prepare("SELECT * from tbl_marka");
    $siteMarkaListQuery->execute(array());
    $siteMarkaListResult=$siteMarkaListQuery->fetchALL(PDO::FETCH_ASSOC);

    $siteModelListQuery=$db->prepare("SELECT * from tbl_model");
    $siteModelListQuery->execute(array());
    $siteModelListResult=$siteModelListQuery->fetchALL(PDO::FETCH_ASSOC);

  
 ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">YEDEK PARÇA <?=((isset($_GET['urunDuzenle']))?'DÜZENLEME':'EKLEME');?>  SAYFASI</h1>
                        <h1 class="page-subhead-line">Yedek parça ekleme ve düzenleme işlemini bu sayfadan Yapabilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             
                <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          YEDEK PARÇA <?=((isset($_GET['urunDuzenle']))?'DÜZENLEME':'EKLEME');?>
                          <?php
                                if(@$_GET['islem']=='urunEkle_basarili'){?> 
                                <b style="color: green;"> Yedek Parça Ekleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='urunEkle_basarisiz') {?>

                                <b style="color: red;">Yedek Parça Ekleme Yapılamadı.</b>
                                <?php }?>
                            <?php
                                if(@$_GET['islem']=='urunDuzenle_basarili'){?> 
                                <b style="color: green;"> Yedek Parça Düzenleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='urunDuzenle_basarisiz') {?>

                                <b style="color: red;">Yedek Parça Düzenleme Yapılamadı.</b>
                                <?php }?>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_DB/islem.php" method="post" enctype="multipart/form-data">
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Yedek Parça Resim <?=((isset($_GET['urunDuzenle']))?'Düzenle':'Ekle');?> </label>
                                    <div class="form-group col-md-12">
                                     
                                      <div class="form-group">
                                            
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?=((isset($_GET['urunDuzenle']))?$urunDuzenleResult['productImage']:'_PanelResimler/_Urunler/no_images.png');?>" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değitir</span><input type="file" name="productImage"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                      
                                    </div>
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Marka Adı</label>
                                    <select name="productBrand" id="" class="form-control">
                                        <?php foreach ($siteMarkaListResult as $markaListe) {?>
                                        

                                         <option value="<?=$markaListe['id'];?>"<?= ((isset($_GET['urunDuzenle']) && ($urunDuzenleResult['productBrand'] == $markaListe['id']))?'selected':'');?>><?=$markaListe['brandName']?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Model Adı</label>
                                    <select name="productModel" id="" class="form-control">
                                        <?php foreach ($siteModelListResult as $modelListe) {?>

                                       <option value="<?=$modelListe['id'];?>"<?= ((isset($_GET['urunDuzenle']) && ($urunDuzenleResult['productModel'] == $modelListe['id']))?'selected':'');?>><?=$modelListe['modelName']?></option>

                                        <?php } ?>
                                    </select>
                                </div>      
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Yedek Parça Adı</label>
                                    <input type="text" name="productName" class="form-control" id="default" value="<?=((isset($_GET['urunDuzenle']))?$urunDuzenleResult['productName']:'');?>" />
                                </div>

                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Yedek Parça Açıklama</label>
                                    <textarea name="productDescription" id="" cols="30" rows="5" class="form-control"><?=((isset($_GET['urunDuzenle']))?$urunDuzenleResult['productDescription']:'');?></textarea>
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <div class="col-md-4">
                                       <label class="control-label" for="default">Durum</label>
                                        <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value=""> Aktif
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label" for="default">Stok</label>
                                        <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value=""> Var
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label" for="default">Fiyatı</label>
                                        <input type="text" name="productPrice" class="form-control" id="default" value="" placeholder="Fiyat girin.." />
                                    </div>
                                </div>
                                <?php 
                                if(isset($_GET['urunDuzenle'])){ ?>
                                <input type="hidden" name="urunImageEski" value="<?=$urunDuzenleResult['productImage'];?>">
                                
                                <input type="hidden" name="id_deger" value="<?=$urunDuzenleResult['id'];?>">
                               <?php }?>
                               <div class="form-group col-md-12">
                                    <button class="btn btn-success" style="margin-top:20px; font-size:14px;font-weight:bold;font-family:arial;" name="<?=((isset($_GET['urunDuzenle']))?'urunDuzenle':'urunKaydet');?>">
                                      <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right:10px;"></i>YEDEK PARÇA <?=((isset($_GET['urunDuzenle']))?'DÜZENLE':'EKLE');?></button>
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


