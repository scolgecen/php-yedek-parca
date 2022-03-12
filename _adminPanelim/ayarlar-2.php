
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SİTE GENEL AYARLARI</h1>
                        <h1 class="page-subhead-line">Sitenizin ayarlarını bu sayfadan düzenleyebilirmisiniz.  </h1>

                    </div>
                </div>
                        
                 
                         <?php 

                         if(@$_GET['ayarguncelle']=='ok'){?>
                         <div class="col-md-7">
                         <div class="alert alert-success alert-dismissable col-md-10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Güncelle işleminiz başarılı bir şekilde Gerçekleşti.<a href="#" class="alert-link"> Kapat</a>.
                            </div>
                            </div>
                         <?php } elseif(@$_GET['ayarguncelle']=='no'){?>
                         <div class="col-md-7">
                            <div class="alert alert-danger alert-dismissable col-md-10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Güncelle işlemini yaparken bir hata oluştu.<a href="#" class="alert-link"> Kapat</a>.
                            </div>
                            </div>
                         <?php }?>
                    


                <form action="_DB/islem.php" method="post">
                    <div class="col-md-7">
                         <div class="form-group col-md-10">
                            <label>Site Başlık</label>
                            <input class="form-control" type="text" name="ayar_title" value="<?=$ayarcek["ayar_title"] ?>">
                                    
                          </div>
                    </div>
                    <div class="col-md-7">
                         <div class="form-group col-md-10">
                            <label>Site Açıklaması</label>
                            <textarea name="ayar_description" class="form-control" rows="3"><?=$ayarcek["ayar_description"] ?></textarea>
                         </div>
                    </div>
                     
                    <div class="col-md-7">
                         <div class="form-group col-md-10">
                            <label>Site Anahtar Kelimeler</label>
                            <input class="form-control" type="text" name="ayar_keywords" value="<?=$ayarcek["ayar_keywords"] ?>">
                                    
                          </div>
                    </div>
                     <div class="col-md-7">
                         <div class="form-group col-md-10">
                            <label>Footer</label>
                            <input class="form-control" type="text" name="ayar_footer" value="<?=$ayarcek["ayar_footer"] ?>">
                                    
                          </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group col-md-4">
                            <label>Telefon No :</label>
                            <input class="form-control" type="text" name="ayar_telefon" value="<?=$ayarcek["ayar_telefon"] ?>">
                                    
                        </div>
                    
                         <div class="form-group col-md-3">
                            <label>Facebook Adr.</label>
                            <input class="form-control" type="text" name="ayar_facebook" value="<?=$ayarcek["ayar_facebook"] ?>">
                                    
                          </div>
                          <div class="form-group col-md-3">
                            <label>Twitter Adr.</label>
                            <input class="form-control" type="text" name="ayar_twitter" value="<?=$ayarcek["ayar_twitter"] ?>">
                                    
                          </div>

                    </div>
                    
                      <div class="col-md-7">
                        <div class="form-group col-md-5">
                            <label>Mail Adresiniz</label>
                            <input class="form-control" type="text" name="ayar_mail" value="<?=$ayarcek["ayar_mail"] ?>">
                                    
                          </div>
                          <div class="form-group col-md-5">
                            <label>Fax Numaranız</label>
                            <input class="form-control" type="text" name="ayar_fax" value="<?=$ayarcek["ayar_fax"] ?>">
                                    
                          </div>

                    </div>
                     <div class="col-md-7">
                          <div class="form-group col-md-10">
                            <label>Adres</label>
                            <textarea name="ayar_adres" class="form-control" rows="3"><?=$ayarcek["ayar_adres"] ?></textarea>
                         </div>
                    </div>
                  
                    <div class="col-md-7">
                        <div class="form-group col-md-12">
                        <button class="col-md-10 btn btn-success" type="submit" name="ayarkaydet">AYARLARI KAYDET</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>

?>