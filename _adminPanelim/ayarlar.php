
<?php 
  ob_start();
  session_start();
    if(!$_SESSION['S_adminUserName']){ 
      header("location:login.php");
    }
?>
<?php include "header.php"; ?>

<?php include "sidebar.php";
  $siteAyarQuery=$db->prepare("SELECT * from tbl_ayar where siteId=?");
  $siteAyarQuery->execute(array(0));
  $siteAyarResult=$siteAyarQuery->fetch(PDO::FETCH_ASSOC);
  
 ?>

<div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SİTE GENEL AYARLARI</h1>
                        <h1 class="page-subhead-line">Sitenizin ayarlarını bu sayfadan düzenleyebilirmisiniz.  </h1>

                    </div>
                </div>

                 
                        
                <form action="_DB/islem.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            SİTE AYARLARI
                            <?php
                    if(@$_GET['islem']=='basarili'){?> 
                    <b style="color: green;">Güncelleme Başarılı</b>

                    <?php } elseif(@$_GET['islem']=='basarisiz') {?>

                    <b style="color: red;">Güncelleme Yapılamadı.</b>
                    <?php }?>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <li class=""><a href="#genelAyar" data-toggle="tab">Genel Ayarlar</a>
                                </li>
                                <li class=""><a href="#iletisimAyar" data-toggle="tab">İletişim Ayarları</a>
                                </li>
                                <li class=""><a href="#SosyalAyar" data-toggle="tab">Sosyal Medya Ayarları</a>
                                </li>
                                <li class=""><a href="#googleAyar" data-toggle="tab">Google Ayarları</a>
                                </li>
                                <li class="active"><a href="#mailAyar" data-toggle="tab">Mail Ayarları</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade" id="genelAyar">
                                    <h4>Genel Ayarlar</h4><br>
                                    <div class="form-group col-md-10">
                                      <!--
                                      <div class="form-group">
                                            <label class="control-label col-lg-4">Site Logosu</label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Logo Seç</span><span class="fileupload-exists">Değitir</span><input type="file" name="siteLogo"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                       -->

                                      <!--
                                      <label>Site Logosu</label>
                                      <input class="form-control" type="text" name="siteLogo" value="" placeholder="Lütfen Site Başlığını Giriniz.">
                                      -->
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Site Adresi</label>
                                      <input class="form-control" type="text" name="siteUrl" value="<?=$siteAyarResult['siteUrl']; ?>">
                                    </div>
                                     <div class="form-group col-md-6">
                                      <label>Site Başlık</label>
                                      <input class="form-control" type="text" name="siteTitle" value="<?=$siteAyarResult['siteTitle']; ?>">
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                      <label>Site Anaktar Kelime</label>
                                      <input class="form-control" type="text" name="siteKeywords" value="<?=$siteAyarResult['siteKeywords']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Site yazar</label>
                                      <input class="form-control" type="text" name="siteAuthor" value="<?=$siteAyarResult['siteAuthor']; ?>">
                                    </div>
                                     <div class="form-group col-md-12">
                                      <label>Site Açıklama</label>
                                      <textarea class="form-control" colspan="50" rowspan="5" name="siteDescription" ><?=$siteAyarResult['siteDescription']; ?></textarea>
                                     
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="iletisimAyar">
                                    <h4>İletişim Ayarlar</h4><br>
                                    <div class="form-group col-md-6">
                                      <label>Tel No</label>
                                      <input class="form-control" type="text" name="siteTel" value="<?=$siteAyarResult['siteTel']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Gsm No</label>
                                      <input class="form-control" type="text" name="siteGsm" value="<?=$siteAyarResult['siteGsm']; ?>">
                                    </div>

                                   <div class="form-group col-md-6">
                                      <label>Faks No</label>
                                      <input class="form-control" type="text" name="siteFaks" value="<?=$siteAyarResult['siteFaks']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Adres</label>
                                      <input class="form-control" type="text" name="siteAdres" value="<?=$siteAyarResult['siteAdres']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>İl</label>
                                      <input class="form-control" type="text" name="siteIl" value="<?=$siteAyarResult['siteIl']; ?>">
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                      <label>İlçe</label>
                                      <input class="form-control" type="text" name="siteIlce" value="<?=$siteAyarResult['siteIlce']; ?>">
                                    </div>

                                  
                                </div>
                                <div class="tab-pane fade" id="SosyalAyar">
                                    <h4>Sosyal Ayarlar</h4><br>
                                    <div class="form-group col-md-6">
                                      <label>Facebook</label>
                                      <input class="form-control" type="text" name="siteFacebook" value="<?=$siteAyarResult['siteFacebook']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Twitter</label>
                                      <input class="form-control" type="text" name="siteTwitter" value="<?=$siteAyarResult['siteTwitter']; ?>">
                                    </div>

                                   <div class="form-group col-md-6">
                                      <label>Instagram</label>
                                      <input class="form-control" type="text" name="siteInstagram" value="<?=$siteAyarResult['siteInstagram']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Youtube</label>
                                      <input class="form-control" type="text" name="siteYoutube" value="<?=$siteAyarResult['siteYoutube']; ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="googleAyar">
                                    <h4>Google Api</h4><br>
                                      <div class="form-group col-md-6">
                                      <label>Google Hesabı</label>
                                      <input class="form-control" type="text" name="siteMail" value="<?=$siteAyarResult['siteMail']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Google Recaptcha</label>
                                      <input class="form-control" type="text" name="siteRecapctha" value="<?=$siteAyarResult['siteRecapctha']; ?>">
                                    </div>

                                   <div class="form-group col-md-6">
                                      <label>Google Harita</label>
                                      <input class="form-control" type="text" name="siteMaps" value="<?=$siteAyarResult['siteMaps']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Google Analytics</label>
                                      <input class="form-control" type="text" name="siteAnalystic" value="<?=$siteAyarResult['siteAnalystic']; ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="mailAyar">
                                    <h4>Genel Ayarlar</h4><br>
                                      <div class="form-group col-md-6">
                                      <label>Kullanıcı Adı</label>
                                      <input class="form-control" type="text" name="siteSmtpUser" value="<?=$siteAyarResult['siteSmtpUser']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>Kullanıcı Şifre</label>
                                      <input class="form-control" type="text" name="siteSmtpPassword" value="<?=$siteAyarResult['siteSmtpPassword']; ?>">
                                    </div>

                                   <div class="form-group col-md-6">
                                      <label>SMTP Host</label>
                                      <input class="form-control" type="text" name="siteSmtpHost" value="<?=$siteAyarResult['siteSmtpHost']; ?>">
                                    </div>

                                     <div class="form-group col-md-6">
                                      <label>SMTP Port</label>
                                      <input class="form-control" type="text" name="siteSmtpPort" value="<?=$siteAyarResult['siteSmtpPort']; ?>">
                                    </div>
                                   
                                </div>
                                
                            </div>
                             <div class="form-group col-md-12">
                            <button class="btn btn-success" style="margin-top:20px; font-size:14px;font-weight:bold;font-family:arial;" name="ayarKaydet">
                              <i class="fa fa-floppy-o fa-2x" aria-hidden="true" style="margin-right:10px;"></i>AYARLARI KAYDET</button>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
                </form>

                    <!--site logosu -->
              <div class="row">
                <div class="col-md-4 col-sm-4 col-md-offset-6 col-sm-offset-6 col-xs-12" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          SİTE LOGO <?php
                    if(@$_GET['islem']=='logoGuncelle_basarili'){?> 
                    <b style="color: green;">Güncelleme Başarılı</b>

                    <?php } elseif(@$_GET['islem']=='logoGuncelle_basarisiz') {?>

                    <b style="color: red;">Güncelleme Yapılamadı.</b>
                    <?php }?>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_DB/islem.php" method="post" enctype="multipart/form-data">
                               <br />      
                                <div class="form-group col-md-12">
                                     
                                      <div class="form-group">
                                            
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?=$siteAyarResult['siteLogo']?>" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Logo Seç</span><span class="fileupload-exists">Değitir</span><input type="file" name="siteLogo"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                      
                                    </div>
                                     <input type="hidden" name="eski_yol" value="<?=$siteAyarResult['siteLogo']; ?>">
                                    <button class="btn btn-success" style="font-size:12px;font-weight:bold;font-family:arial;float:right;" name="logoGuncelle">
                              <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right:10px;"></i>Logo Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
              <!-- /site logosu-->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>



