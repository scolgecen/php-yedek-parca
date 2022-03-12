<?php

ob_start();
session_start();
if(!$_SESSION['S_adminUserName']){ 
header("location:login.php");
}

include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">YÖNETİCİ PANELİNE HOŞ GELDİNİZ</h1>
                        <h1 class="page-subhead-line">Sitenizi yönetmek için sol tarafta yer alan menüleri kullanabilirsiniz.  </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             
                    <div class="row">
                <div class="col-md-7">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding-bottom:20px;">
                            PROFİL BİLGİLERİ <?php if($_SESSION['S_adminUserID']==1):?>
                            <a href="marka_ekle.php">
                                <button class="btn btn-primary" style=" font-size:14px;font-weight:bold;font-family:arial;float:right;" name="ayarKaydet">
                               <i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;"></i>Marka Ekle</button>
                            </a>
                        <?php else:?>
                    <?php endif;?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="row" style="margin-bottom:15px;">
                                  <div class="col-md-3"><strong>Profil Resmi</strong></div>
                                  <div class="col-md-1">:</div>
                                  <div class="col-md-8"><img src="<?=((isset($_SESSION['S_adminUserImage']))?$_SESSION['S_adminUserImage']:'assets/img/user.png');?>" alt="" width="100" height="100"></div>
                                </div>
                                <div class="row" style="margin-bottom:15px;">
                                  <div class="col-md-3"><strong>Kullanıcı Adı</strong></div>
                                  <div class="col-md-1">:</div>
                                  <div class="col-md-8"><?php echo $_SESSION['S_adminUserName'];?></div>
                                </div>
                                <div class="row" style="margin-bottom:15px;">
                                  <div class="col-md-3"><strong>E-Posta Adresi</strong></div>
                                  <div class="col-md-1">:</div>
                                  <div class="col-md-8"><?php echo $_SESSION['S_adminUserMail'];?></div>
                                </div>
                                <div class="row" style="margin-bottom:30px;">
                                  <div class="col-md-3"><strong>Kullanıcı Şifre</strong></div>
                                  <div class="col-md-1">:</div>
                                  <div class="col-md-8"><input type="password" class="form-control" value="" disabled></div>
                                </div>
                                <div class="row" style="margin-bottom:15px;">
                                    <div class="form-kontrol">
                                        <div class="col-md-12">
                                           <a href="kullanici_ekle.php?kullaniciDuzenle=<?=$_SESSION['S_adminUserID'];?>"> <button class="btn btn-success btn-md col-md-3" type="submit">Profil Düzenle</button></a>
                                        </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
                
            </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>


