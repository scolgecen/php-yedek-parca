<?php

 require_once "_adminPanelim/_DB/baglan.php";
 // SİTE AYARLARI ÇEKME

 
  $siteAyarQuery=$db->prepare("SELECT * from tbl_ayar where siteId=?");
  $siteAyarQuery->execute(array(0));
  $siteAyarResult=$siteAyarQuery->fetch(PDO::FETCH_ASSOC);
  // SLİDER RESİM ÇEKME

  $siteSliderQuery=$db->prepare("SELECT * from tbl_model limit 5");
  $siteSliderQuery->execute(array());
  $siteSliderResult=$siteSliderQuery->fetchALL(PDO::FETCH_ASSOC);
  //MODEL İSİMLER LİMİT 15
  $siteModelLimitQuery=$db->prepare("SELECT * from tbl_model order by Rand() limit 16");
  $siteModelLimitQuery->execute(array());
  $siteModelLimitResult=$siteModelLimitQuery->fetchALL(PDO::FETCH_ASSOC);
  // MARKA LOGOLARI ÇEKME

  $siteSliderMarkaQuery=$db->prepare("SELECT * from tbl_marka order by rand() limit 5");
  $siteSliderMarkaQuery->execute(array());
  $siteSliderMarkaResult=$siteSliderMarkaQuery->fetchALL(PDO::FETCH_ASSOC);
  //ÜRÜNLER

 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">	
<title><?php echo $siteAyarResult['siteTitle']; ?></title>	
<meta name="keywords" content="<?php echo $siteAyarResult['siteKeywords']; ?>" />
<meta name="description" content="<?php echo $siteAyarResult['siteDescription']; ?>">
<meta name="author" content="<?php echo $siteAyarResult['siteAuthor']; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="chery-yedek-parca.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $siteAyarResult['siteUrl']; ?>assets/css/chery_yedek_parca.css">
<style>

</style>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>