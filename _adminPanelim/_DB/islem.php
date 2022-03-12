<?php
ob_start();
session_start();
include "baglan.php";?>
<?php


// LOGİN OLMA

if(isset($_POST['adminGirisYap'])){
//echo "giriş yapıldı.";


	$adminUserName=$_POST['adminUserName'];
	$adminUserPassword=md5($_POST['adminUserPassword']);
	$adminUserMail=$_POST['adminUserMail'];
	if($adminUserName && $adminUserPassword && $adminUserMail){

	  $siteAdminQuery=$db->prepare("SELECT * from tbl_admin where adminUserName=:name and adminUserPassword=:password and adminUserMail=:mail ");
	  $siteAdminQuery->execute(array('name'=>$adminUserName,'password'=>$adminUserPassword,'mail'=>$adminUserMail));
	  $adminCount=$siteAdminQuery->rowCount();
	  $siteAdminResult=$siteAdminQuery->fetch(PDO::FETCH_ASSOC);
	  if($adminCount>0){
	  	$_SESSION['S_adminUserID']=$siteAdminResult['id'];
	  	$_SESSION['S_adminName']=$siteAdminResult['adminName'];
	  	$_SESSION['S_adminUserName']=$siteAdminResult['adminUserName'];
	  	$_SESSION['S_adminUserPassword']=$siteAdminResult['adminUserPassword'];
	  	$_SESSION['S_adminUserMail']=$siteAdminResult['adminUserMail'];
	  	$_SESSION['S_adminUserImage']=$siteAdminResult['adminUserImage'];
	  	header("location:../login.php?adminGiris=basariliGiris");
	  }else{

	  	header("location:../login.php?adminGiris=hataliGiris");
	  }
	}else{
			header("location:../login.php?adminGiris=hataliGiris");
	}

}

//GENEL AYARLAR
if(isset($_POST['ayarKaydet'])){

		$ayarkaydet=$db->prepare("UPDATE tbl_ayar SET 
			siteUrl=:url,
			siteDescription=:aciklama,
			siteKeywords=:anahtar,
			
			siteAuthor=:yazar,
			siteTitle=:baslik,
			siteTel=:tel,
			siteGsm=:gsm,
			siteFaks=:faks,
			siteAdres=:adres,
			siteIl=:il,
			siteIlce=:ilce,
			siteMail=:mail,
			siteRecapctha=:recapctha,
			siteMaps=:maps,
			siteAnalystic=:analystic,
			siteFacebook=:facebook,
			siteTwitter=:twitter,
			siteInstagram=:instagram,
			siteYoutube=:youtube,
			siteSmtpUser=:Smtpuser,
			siteSmtpPassword=:Smtppassword,
			siteSmtpHost=:Smtphost,
			siteSmtpPort=:Smtpport
			 where siteId=0");
		$update=$ayarkaydet->execute(array(
		'url'=>$_POST['siteUrl'],
		'aciklama'=>$_POST['siteDescription'],
		'anahtar'=>$_POST['siteKeywords'],

		'yazar'=>$_POST['siteAuthor'],
		'baslik'=>$_POST['siteTitle'],
		'tel'=>$_POST['siteTel'],
		'gsm'=>$_POST['siteGsm'],
		'faks'=>$_POST['siteFaks'],
		'adres'=>$_POST['siteAdres'],
		'il'=>$_POST['siteIl'],
		'ilce'=>$_POST['siteIlce'],
		'mail'=>$_POST['siteMail'],
		'recapctha'=>$_POST['siteRecapctha'],
		'maps'=>$_POST['siteMaps'],
		'analystic'=>$_POST['siteAnalystic'],
		'facebook'=>$_POST['siteFacebook'],
		'twitter'=>$_POST['siteTwitter'],
		'instagram'=>$_POST['siteInstagram'],
		'youtube'=>$_POST['siteYoutube'],
		'Smtpuser'=>$_POST['siteSmtpUser'],
		'Smtppassword'=>$_POST['siteSmtpPassword'],
		'Smtphost'=>$_POST['siteSmtpHost'],
		'Smtpport'=>$_POST['siteSmtpPort']
			));

		if($update){

		header("location:../ayarlar.php?islem=basarili");

		}
		else{

			header("location:../ayarlar.php?islem=basarisiz");
		}



}

if(isset($_POST['hakkimizdaKaydet'])){

		$hakkimizdakaydet=$db->prepare("UPDATE tbl_hakkimizda SET 
			siteVizyon=:vizyon,
			siteMisyon=:misyon,
			siteKisaYazi=:kisaYazi,
			SiteIcerik=:icerik  where id=345");

		$update=$hakkimizdakaydet->execute(array(
		'vizyon'=>$_POST['siteVizyon'],
		'misyon'=>$_POST['siteMisyon'],
		'kisaYazi'=>$_POST['siteKisaYazi'],
		'icerik'=>$_POST['SiteIcerik']));
		
		if($update){

		header("location:../hakkimizda.php?islem=basarili");

		}
		else{

			header("location:../hakkimizda.php?islem=basarisiz");
		}

}

if(isset($_POST['logoGuncelle'])){

		$uploads_dir ='../_PanelResimler';
		$tmp_name =$_FILES['siteLogo']['tmp_name'];
		$name =$_FILES['siteLogo']['name'];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;
		move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

				$duzenle=$db->prepare("UPDATE tbl_ayar SET siteLogo=:logo where siteId=0");
				$update=$duzenle->execute(array('logo'=>$refimgyol));


		if($update){
				$resimsilunlink=$_POST['eski_yol'];

				unlink('../'.$resimsilunlink);

				header("location:../ayarlar.php?islem=logoGuncelle_basarili");

			}else{

				header("location:../ayarlar.php?islem=logoGuncelle_basarisiz");

			}




}
if(isset($_POST['markaEkle'])){

$uploads_dir ='../_PanelResimler/_Markalar';
$tmp_name =$_FILES['brandImage']['tmp_name'];
$name =$_FILES['brandImage']['name'];
$benzersizsayi1=rand(20000,32000);
$benzersizsayi2=rand(20000,32000);
$benzersizsayi3=rand(20000,32000);
$benzersizsayi4=rand(20000,32000);
$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;
move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
$sliderkaydet=$db->prepare("INSERT INTO tbl_marka SET 
	brandName=:markaAd,
	brandSeoLink=:markaSeoLink,
	brandDescription=:markaAciklama,
	brandImage=:markaResim");
$insert=$sliderkaydet->execute(array(
'markaAd'=>$_POST['brandName'],
'markaSeoLink'=>seo($_POST['brandName']),
'markaAciklama'=>$_POST['brandDescription'],
'markaResim'=>$refimgyol
	));
if($insert){


	header("location:../marka_ekle.php?islem=markaEkle_basarili");

}
else{

	header("location:../marka_ekle.php?islem=markaEkle_basarisiz");
}


}

if(isset($_POST['markaDuzenle'])){

$uploads_dir ='../_PanelResimler/_Markalar';

if(empty($_FILES['brandImage']['name'])){
	$brandImageEski=$_POST['brandImageEski'];
}
	$tmp_name =$_FILES['brandImage']['tmp_name'];
	$name =$_FILES['brandImage']['name'];

$benzersizsayi1=rand(20000,32000);
$benzersizsayi2=rand(20000,32000);
$benzersizsayi3=rand(20000,32000);
$benzersizsayi4=rand(20000,32000);
$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

if(!empty($_FILES['brandImage']['name'])){
$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;

move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
}else{
	$refimgyol=$brandImageEski;
}

$markakaydet=$db->prepare("UPDATE  tbl_marka SET 
	brandName=:markaAd,
	brandSeoLink=:markaSeoLink,
	brandDescription=:markaAciklama,
	brandImage=:markaResim where id={$_POST['id_deger']}");
$duzenle=$markakaydet->execute(array(
'markaAd'=>$_POST['brandName'],
'markaSeoLink'=>seo($_POST['brandName']),
'markaAciklama'=>$_POST['brandDescription'],
'markaResim'=>$refimgyol
	));

if($duzenle){

	
	if(!empty($_FILES['brandImage']['name'])){
		unlink('../'.$_POST['brandImageEski']);
	}
	
	header("location:../markalar.php?islem=markaDuzenle_basarili");

}
else{

	header("location:../markalar.php?islem=markaDuzenle_basarisiz");
}


}


if(isset($_GET["markaSil"])){

$fizikselSilme=$db->prepare("SELECT brandImage from tbl_marka where id=:marka_id");
$fizikselSilme->execute(array('marka_id'=>$_GET['marka_id']));
 $fizikselKontrolResult=$fizikselSilme->fetch(PDO::FETCH_ASSOC);
$fizikselAdres=$fizikselKontrolResult['brandImage'];

$sil=$db->prepare("DELETE from tbl_marka where id=:marka_id ");
$kontrol=$sil->execute(array(
'marka_id'=>$_GET['marka_id']));

if($kontrol){

	$markaResimsilunlink=$_POST['eski_yol'];

				$sonuc=unlink('../'.$fizikselAdres);
				if($sonuc){
					header("location:../markalar.php?islem=markaSilme_basarili");
				}else{
					echo "Silme Hatalı";
				}
	

}
else{

	header("location:../markalar.php?islem=markaSilme_basarisiz");
}
 




}

if(isset($_POST['modelKaydet'])){

$uploads_dir ='../_PanelResimler/_Modeller';
$tmp_name =$_FILES['modelImage']['tmp_name'];
$name =$_FILES['modelImage']['name'];
$benzersizsayi1=rand(20000,32000);
$benzersizsayi2=rand(20000,32000);
$benzersizsayi3=rand(20000,32000);
$benzersizsayi4=rand(20000,32000);
$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;
move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
$modelEkle=$db->prepare("INSERT INTO tbl_model SET 
	markaID=:marka_id,
	modelName=:modelAd,
	modelSeoLink=:modelSeoLink,
	modelDescription=:modelAciklama,
	modelImage=:modelResim");
$Ekle=$modelEkle->execute(array(
'marka_id'=>$_POST['brandName'],
'modelAd'=>$_POST['modelName'],
'modelSeoLink'=>seo($_POST['modelName']),
'modelAciklama'=>$_POST['modelDescription'],
'modelResim'=>$refimgyol
	));
if($Ekle){


	header("location:../model_ekle.php?islem=modelEkle_basarili");

}
else{

	header("location:../model_ekle.php?islem=modelEkle_basarisiz");
}


}
//MODEL DÜZENLEME İŞLEMİ


if(isset($_POST['modelDuzenle'])){


//$id= $_POST['id_deger'];


$uploads_dir ='../_PanelResimler/_Modeller';

if(empty($_FILES['modelImage']['name'])){
	$modelImageEski=$_POST['modelImageEski'];
}
	$tmp_name =$_FILES['modelImage']['tmp_name'];
	$name =$_FILES['modelImage']['name'];

$benzersizsayi1=rand(20000,32000);
$benzersizsayi2=rand(20000,32000);
$benzersizsayi3=rand(20000,32000);
$benzersizsayi4=rand(20000,32000);
$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
if(!empty($_FILES['modelImage']['name'])){
$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;

move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
}else{
	$refimgyol=$modelImageEski;
}

$modelDuzenle=$db->prepare("UPDATE tbl_model SET 
	markaID=:marka_id,
	modelName=:modelAd,
	modelSeoLink=:modelSeoLink,
	modelDescription=:modelAciklama,
	modelImage=:modelResim where id={$_POST['id_deger']}");
$duzenle=$modelDuzenle->execute(array(
'marka_id'=>$_POST['brandName'],
'modelAd'=>$_POST['modelName'],
'modelSeoLink'=>seo($_POST['modelName']),
'modelAciklama'=>$_POST['modelDescription'],
'modelResim'=>$refimgyol
	));
if($duzenle){

	
	if(!empty($_FILES['modelImage']['name'])){
		unlink('../'.$_POST['modelImageEski']);
	}
	
	header("location:../modeller.php?islem=modelDuzenle_basarili");

}
else{

	header("location:../modeller.php?islem=modelDuzenle_basarisiz");
}


}

///MODEL SİLME İŞLEMİ

if(isset($_GET["modelSil"])){

$fizikselSilme=$db->prepare("SELECT modelImage from tbl_model where id=:model_id");
$fizikselSilme->execute(array('model_id'=>$_GET['model_id']));
 $fizikselKontrolResult=$fizikselSilme->fetch(PDO::FETCH_ASSOC);
$fizikselAdres=$fizikselKontrolResult['modelImage'];

$sil=$db->prepare("DELETE from tbl_model where id=:model_id ");
$kontrol=$sil->execute(array(
'model_id'=>$_GET['model_id']));

if($kontrol){

	//$markaResimsilunlink=$_POST['eski_yol'];

				$sonuc=unlink('../'.$fizikselAdres);
				if($sonuc){
					header("location:../modeller.php?islem=modelSilme_basarili");
				}else{
					echo "Silme Hatalı";
				}
	

}
else{

	header("location:../modeller.php?islem=modelSilme_basarisiz");
}
 

}



	
if(isset($_POST['urunKaydet'])){

$uploads_dir ='../_PanelResimler/_Urunler';
$tmp_name =$_FILES['productImage']['tmp_name'];
$name =$_FILES['productImage']['name'];
$benzersizsayi1=rand(20000,32000);
$benzersizsayi2=rand(20000,32000);
$benzersizsayi3=rand(20000,32000);
$benzersizsayi4=rand(20000,32000);
$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;
move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
$modelEkle=$db->prepare("INSERT INTO tbl_urun SET 
	productName			=:urunAdi,
	productSeoLink		=:urunSeoLink,
	productModel		=:urunModelAdi,
	productBrand		=:urunBrandAdi,
	productDescription	=:urunAciklama,
	productImage		=:urunResim");
$Ekle=$modelEkle->execute(array(
'urunAdi'=>$_POST['productName'],
'urunSeoLink'=>seo($_POST['productName']),
'urunModelAdi'=>$_POST['productModel'],
'urunBrandAdi'=>$_POST['productBrand'],
'urunAciklama'=>$_POST['productDescription'],
'urunResim'=>$refimgyol
	));
if($Ekle){


	header("location:../urun_ekle.php?islem=urunEkle_basarili");

}
else{

	header("location:../urun_ekle.php?islem=urunEkle_basarisiz");
}


}
//YEDEK PARÇA DÜZENLEME



if(isset($_POST['urunDuzenle'])){



$uploads_dir ='../_PanelResimler/_Urunler';

if(empty($_FILES['productImage']['name'])){
	$urunImageEski=$_POST['urunImageEski'];
}
	$tmp_name =$_FILES['productImage']['tmp_name'];
	$name =$_FILES['productImage']['name'];

$benzersizsayi1=rand(20000,32000);
$benzersizsayi2=rand(20000,32000);
$benzersizsayi3=rand(20000,32000);
$benzersizsayi4=rand(20000,32000);
$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
if(!empty($_FILES['productImage']['name'])){
$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;

move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
}else{
	$refimgyol=$urunImageEski;
}

$urunDuzenle=$db->prepare("UPDATE tbl_urun SET 
	productName=:urunAd,
	productSeoLink=:urunSeoLink,
	productModel=:urunModelAdi,
	productBrand=:urunMarkaAd,
	productDescription=:urunAciklama,
	productImage=:urunResim where id={$_POST['id_deger']}");
$duzenle=$urunDuzenle->execute(array(
'urunAd'=>$_POST['productName'],
'urunSeoLink'=>seo($_POST['productName']),
'urunModelAdi'=>seo($_POST['productModel']),
'urunMarkaAd'=>$_POST['productBrand'],
'urunAciklama'=>$_POST['productDescription'],
'urunResim'=>$refimgyol
	));
if($duzenle){

	
	if(!empty($_FILES['productImage']['name'])){
		unlink('../'.$_POST['urunImageEski']);
	}
	
	header("location:../urunler.php?islem=urunDuzenle_basarili");

}
else{

	header("location:../urunler.php?islem=urunDuzenle_basarisiz");
}


}


///YEDEK PARÇA SİLME

if(isset($_GET["urunSil"])){


$fizikselSilme=$db->prepare("SELECT productImage from tbl_urun where id=:urun_id");
$fizikselSilme->execute(array('urun_id'=>$_GET['urun_id']));
 $fizikselKontrolResult=$fizikselSilme->fetch(PDO::FETCH_ASSOC);
$fizikselAdres=$fizikselKontrolResult['productImage'];

$sil=$db->prepare("DELETE from tbl_urun where id=:urun_id ");
$kontrol=$sil->execute(array(
'urun_id'=>$_GET['urun_id']));

if($kontrol){

	//$markaResimsilunlink=$_POST['eski_yol'];

				$sonuc=unlink('../'.$fizikselAdres);
				if($sonuc){
					header("location:../urunler.php?islem=urunSilme_basarili");
				}else{
					echo "Silme Hatalı";
				}
	

}
else{

	header("location:../urunler.php?islem=urunSilme_basarisiz");
}
 

}

?>






