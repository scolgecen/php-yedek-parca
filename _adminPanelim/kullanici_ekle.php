<?php

ob_start();
session_start();
if(!$_SESSION['S_adminUserName']){ 
header("location:login.php");
}

    include "header.php"; 
    include "sidebar.php"; 
    
    //KULLANICI DÜZENLE İD

     if(isset($_GET['kullaniciDuzenle']) && !empty($_GET['kullaniciDuzenle'])){
    $kullanici_id=$_GET["kullaniciDuzenle"];
    $kullaniciDuzenle=$db->prepare("SELECT * from tbl_admin where id=:kullanici_id");
    $kullaniciDuzenle->execute(array('kullanici_id'=>$kullanici_id));
    $kullaniciDuzenleResult=$kullaniciDuzenle->fetch(PDO::FETCH_ASSOC);
    }
    //YETKİ LİSTESİ
    $siteYetkiQuery=$db->prepare("SELECT * from tbl_yetki");
    $siteYetkiQuery->execute(array());
    $siteYetkiResult=$siteYetkiQuery->fetchALL(PDO::FETCH_ASSOC);
 ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">KULLANICI EKLEME SAYFASINA HOŞ GELDİNİZ</h1>
                        <h1 class="page-subhead-line">Kullanıcı Ekleme ve Düzenleme İşlemlerini Burdan Yapabilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          KULLANICI <?=((isset($_GET['kullaniciDuzenle']))?'DÜZENLE':'EKLE');?>     
                                <?php
                                if(@$_GET['islem']=='modelEkle_basarili'){?> 
                                <b style="color: green;">Kullanıcı Ekleme Başarılı</b>

                                <?php } elseif(@$_GET['islem']=='modelEkle_basarili') {?>

                                <b style="color: red;">Kullanıcı Ekleme Yapılamadı.</b>
                                <?php }?>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_DB/islem.php" method="post" enctype="multipart/form-data">
                                
                                  <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Kullanıcı Resim <?=((isset($_GET['kullaniciDuzenle']))?'Düzenle':'Ekle');?> </label>
                                    <div class="form-group col-md-12">
                                     
                                      <div class="form-group">
                                            
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?=((isset($_GET['kullaniciDuzenle']))?$kullaniciDuzenleResult['adminUserImage']:'_PanelResimler/_Yoneticiler26501212882848127802Default_yonetici.png');?>" alt="" width="200" height="150"/></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değitir</span><input type="file" name="adminUserImage"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                      
                                    </div>
                                </div>   
                                
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Kullanıcı Adı</label>
                                    <input type="text" name="adminUserName" class="form-control" id="default" value="<?=((isset($_GET['kullaniciDuzenle']))?$kullaniciDuzenleResult['adminUserName']:'');?>" />
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Kullanıcı E-Posta Adresi</label>
                                    <input type="text" name="adminUserMail" class="form-control" id="default" value="<?=((isset($_GET['kullaniciDuzenle']))?$kullaniciDuzenleResult['adminUserMail']:'');?>" />
                                </div>
                                 <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Kullanıcı Şifre</label>
                                    <input type="password" name="adminUserPassword" class="form-control" id="default" value="<?=((isset($_GET['kullaniciDuzenle']))?'':'');?>" />
                                </div>
                                <div class="form-group has-default col-md-10 col-sm-10">
                                    <label class="control-label" for="default">Kullanıcı Yetki</label>
                                    <select name="adminUserRole" id="" class="form-control">
                                        <?php foreach ($siteYetkiResult as $yetki) {?>
                                           <option value="<?=$yetki['id'];?>"<?= ((isset($_GET['kullaniciDuzenle']) && ($kullaniciDuzenleResult['adminUserRole'] == $yetki['id']))?'selected':'');?>><?=$yetki['adminUserRoleName']?></option>
                                        <?php } ?>
                                        
                                        
                                    </select>
                                </div>

                                  <?php 
                               if(isset($_GET['kullaniciDuzenle'])){ ?>
                                <input type="hidden" name="adminImageEski" value="<?=$kullaniciDuzenleResult['adminUserImage'];?>">
                                
                                <input type="hidden" name="id_deger" value="<?=$kullaniciDuzenleResult['id'];?>">
                                <input type="hidden" name="adminPassword" value="<?=$kullaniciDuzenleResult['adminUserPassword'];?>">
                               <?php }?>
                                 
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" style="margin-top:20px; font-size:14px;font-weight:bold;font-family:arial;" name="<?=((isset($_GET['kullaniciDuzenle']))?'kullaniciDuzenle':'kullaniciKaydet');?>">
                                      <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right:10px;"></i>KULLANICI <?=((isset($_GET['kullaniciDuzenle']))?'DÜZENLE':'EKLE');?></button>
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


