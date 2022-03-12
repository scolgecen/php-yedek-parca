
    
    <?php
        include "_DB/baglan.php";
     /*
        
        $ayarsor=mysql_query("SELECT * from ayarlar");
        $ayarcek=mysql_fetch_assoc($ayarsor);
        */
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
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background:white;">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="background:white!important;"><img src="_PanelResimler/logo/cheryyedekparca.png" width="245" height="50"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    
                   
                </button>
                
            </div>
             
              
            
            <div class="header-right">
                
                
                <a href="logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-sign-out fa-2x"></i></a>
                 <ul class="nav navbar-nav">
                    
                
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle btn btn-default" data-toggle="dropdown" style="margin:0px; padding-bottom:0px; padding-top:12px; margin-right:3px; padding-right:5px; border:0px; font-weight:bold;">Yönetici : &nbsp;<SPAN style="text-decoration:underline; font-size:16px;"><?Php echo $_SESSION['S_adminUserName']?></SPAN>&nbsp; &nbsp;<i class="fa fa-user fa-2x"></i> </a>
                        <ul class="dropdown-menu" role="menu"  style="margin-top:5px; background:#00ca79;  width:80px; padding-right:0px; font-weight:bold;margin-top:10px; margin-bottom:10px;">
                            
                            
                            <li style="padding:0px; margin:0px; background-color:black; color:white; width:50px;" ><a style="background-color:#00ca79; color:white;" href="profil.php">Profil Ayarları</a></li>
                            <li style="padding:0px; margin:0px; background-color:#00ca79; color:white; width:50px;" ><a style="background-color:#00ca79; color:white;" href="ayarlar.php">Genel Ayarlar</a></li>
                           
                        </ul>
                    </li>
                   

                    </ul>

            </div>
        </nav>