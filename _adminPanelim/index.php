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
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <h5>TOPLAM ARAÇ MARKA SAYISI : 15</h5>
                                <i class="fa fa-shopping-cart fa-5x"></i>
                             </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                 <h5>TOPLAM ARAÇ MODEL SAYISI : 15</h5>
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <h5>TOPLAM YEDEK PARÇA SAYISI : 15</h5>
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>


