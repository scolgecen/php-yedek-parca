<?php 

//session_destroy();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Bootstrap Advance Admin Template</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <style>
  body{ background-image:url(assets/img/tamirci9.jpg);
  background-attachment: fixed;
  -moz-background-size:100% 100% ;
  -o-background-size:100% 100%;
  -webkit-background-size:100% 100%;
  background-size:100% 100%;
    }
  </style>

</head>
<body>
    <div class="container">
        <div class="row text-center " style="padding-top:50px;">
            <div class="col-md-12">
                
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                
                <div class="panel-body" style="background-color:orange;opacity: 0.7; margin-top: 80px;border-radius: 5px;">
                    <?php if(@$_GET['adminGiris']=='basariliGiris'){?>
                         
                          <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check" aria-hidden="true"></i> Giriş Başarılı
                                <?php header("refresh: 1; url=index.php"); ?>
                          </div>

                        <?php } if(@$_GET['adminGiris']=='cikis'){?>

                           <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check" aria-hidden="true"></i> Başarıyla Çıkış Yaptınız.
                                <?php header("refresh: 2; url=index.php"); ?>

                            </div>

                        <?php } elseif(@$_GET['adminGiris']=='hataliGiris'){?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                      Hatalı giriş

                            </div>
                         <?php } ?>
                       

                    <form role="form" action="_DB/islem.php" method="post">
                        <hr />
                        <h4 style="font-weight: bold; text-align: center;">ADMİN GİRİŞ</h4>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" class="form-control" placeholder="Kullanıcı Adı : " name="adminUserName" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>  
                            <input type="text" class="form-control"  placeholder="E-Posta Adresi :" name="adminUserMail" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>  
                            <input type="password" class="form-control"  placeholder="Kullanıcı Şifre :" name="adminUserPassword" />
                        </div>

                    

                    
                     <button class="btn btn-primary " style="width: 100%; font-weight: bold;" type="submit"
                     name="adminGirisYap">Giriş Yap</button>
                     <hr />
                     
                 </form>
             </div>

         </div>


     </div>
 </div>

</body>
</html>
