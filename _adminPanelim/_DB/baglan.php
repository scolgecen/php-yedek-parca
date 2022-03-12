<?php 

try{

	$db=new PDO("mysql:host=localhost;dbname=_cheryyedekparca;charset=utf8;","root","");

	function seo($s) {
		$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',','?');
		$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
		$s = str_replace($tr,$eng,$s);
		$s = strtolower($s);
		$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
		$s = preg_replace('/\s+/', '-', $s);
		$s = preg_replace('|-+|', '-', $s);
		$s = preg_replace('/#/', '', $s);
		$s = str_replace('.', '', $s);
		$s = trim($s, '-');
		return $s;
	}
	//error_reporting(0); 
	//$sqlsiteURL="SELECT * from tbl_ayar";
	//$siteURLQuery=$db->query($sqlsiteURL);
	//$siteUrlResult=mysql_fetch_assoc($siteURLQuery);
	//$siteURL=$siteUrlResult['siteurl'];
	//define('siteURL',$siteURL);
	//echo siteURL;

	//echo "pdo firma Veritabanı bağlantısı başarılı";
}
catch (PDOException $e){

echo $e->getMessage();
}
	
?>