<?php include"inc/head.php";?>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
 <?php include"inc/header.php";?>
  <?php include"inc/menuler.php";?>
  <section id="mainContent">
    <?php include"inc/slider.php";?>
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 adres_bilgi">
         
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
              <div class="single_bottom_rightbar1 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="blog_archive wow fadeInDown">
                 
                </div>

                   <h2>Adres Bilgileri</h2>
           
                 </div>

                   <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d191.0371301379059!2d32.760547649226666!3d39.99517569802121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9ba3c9737a83fde5!2sburak+oto+-+tata+-+geely+-+chery+-+dfm+yedek+par%C3%A7alar%C4%B1!5e0!3m2!1str!2str!4v1500283387935" width="100%" height="400" frameborder="0" style="border:0; border-radius: 10px;" allowfullscreen></iframe>          

             

            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
              <div class="row"> <!-- row Başı -->
             <div class="single_bottom_rightbar1 col-md-12 col-lg-12 col-sm-12 col-xs-12">
              <div class="blog_archive wow fadeInDown">
               
              </div>

            <h2>Telefon Bilgileri</h2>
           
          </div>
          <div class="tel_cerceve">
              <div class="tel">
                <p>TEL 1 : <span><?=$siteAyarResult['siteTel'];?></span></p> 
              </div>
              <div class="tel">
                 <p>TEL 2 : <span><?=$siteAyarResult['siteGsm'];?></span></p>
              </div>
              <div class="tel">
                <p>FAX : <span><?=$siteAyarResult['siteFaks'];?></span></p> 
              </div>
            </div>
          </div><!-- row sonu -->
          <div class="row"> <!-- row Başı -->
              <div class="single_bottom_rightbar1 col-md-12 col-lg-12 col-sm-12 col-xs-12">
              <div class="blog_archive wow fadeInDown">
               
              </div>

            <h2>Sosyal Medya</h2>
           
          </div>
          <div class="sosyal">
                <p>
               <a href="<?=$siteAyarResult['siteFacebook'];?>"><span><i class="fa fa-facebook-square fa-4x facem"></i></span></a>
               <a href="<?=$siteAyarResult['siteTwitter'];?>"><span><i class="fa fa-twitter-square fa-4x twit"></i></span></a>
               <a href="<?=$siteAyarResult['siteYoutube'];?>"><span><i class="fa fa-youtube-square fa-4x youtube"></i></span></a>
                </p> 
          </div>
          </div><!-- row sonu -->  
              
            </div>
          </div>
        </div>
        
      
   
  </section>
</div>
<?php include "inc/footer.php"; ?>