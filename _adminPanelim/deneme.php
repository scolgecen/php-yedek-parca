<?php

//1.adım
/*
session_start();
if(!isset($_SESSION['admin_kadi'])){

    header("location:login.php");
}else{
        //header("location:index.php");
}*/
include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">TAMİRCİ ADMİN PANELİNE HOŞ GELDİNİZ</h1>
                        <h1 class="page-subhead-line">Sitenizi yönetmek için sol tarafta yer alan menüleri kullanabilirsiniz.  </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
             

            </div>
            <!-- /. PAGE INNER  -->
        </div>
   
      
    
    <!-- bir div kapanması olabilir-->
<?php include "footer.php"; ?>


