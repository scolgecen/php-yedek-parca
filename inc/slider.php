<div class="content_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm6">
          <div class="latest_slider">
            <div class="slick_slider">
               <?php foreach ($siteSliderResult as $slider) {?>
                 <div class="single_iteam"><img src="<?=$siteAyarResult['siteUrl']?>_adminPanelim/<?=$slider['modelImage']?>" alt="<?=$slider['modelName'];?>">
                <h2><a class="slider_tittle" href="<?=$siteAyarResult['siteUrl']?>modeller-<?=seo($slider['modelName']).'-'.$slider['id'];?>"><?=$slider['modelName']?> Modeline Ait Yedek Parçalar</a></h2>
              </div>
              <?php }?>
             
             
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <?php foreach ($siteSliderMarkaResult as $sliderMarka) {?>
          <div style="float:left; margin:10px;">
            <a href="<?=$siteAyarResult['siteUrl']?>markalar-<?=seo($sliderMarka['brandName']).'-'.$sliderMarka['id'];?>">
          <img src="<?=$siteAyarResult['siteUrl']?>_adminPanelim/<?=$sliderMarka['brandImage']?>" alt="<?=$sliderMarka['brandName'];?>" style="width:50px;height:50px;border-radius:5px;">
        </a>
          </div>
         
           <?php }?>
          <div class="clear" style="clear:both; margin-right:10px;">
           <hr style="margin-bottom:0px;">
           
         </div>
       
         <div class="col-md-12" style="border-radius:10px; color:white; margin-bottom:10px;opacity:0.8; width:97%;">
          <div class="col-md-12">
           <h2 style="color:gray; margin-left:20px; margin-bottom:10px;font-family:arial;">BURAK OTO</h2>
         </div>
           <div class="col-md-12">
              <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="single_footer_top wow fadeInLeft">
           
            <ul class="flicker_nav">
              <li><a href="#"><img src="burakoto/1.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/2.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/3.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/4.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/5.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/6.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/7.jpg" alt="" width="75" height="75"></a></li>
              <li><a href="#"><img src="burakoto/8.jpg" alt="" width="75" height="75"></a></li>
            
          </div>
        </div>
             
            </div>
           
         </div>
          <!-- Model isimler-->
          
         <?php foreach ($siteModelLimitResult as $modelLmit) {?>
          <div class="" style="float:left; margin:5px;">
            <a class="btn btn-xs btn-default" href="<?=$siteAyarResult['siteUrl']?>modeller-<?=seo($modelLmit['modelName']).'-'.$modelLmit['id'];?>">
            <?=$modelLmit['modelName'];?>
            </a>
          </div>
         
           <?php }?>
          
          <!-- //Model isimler-->
         
         
           
      </div>
    </div>



    <!-- 
 <div class="content_top_right">
            <ul class="featured_nav wow fadeInDown">
              <?php foreach ($siteSliderMarkaResult as $sliderMarka) {?>
                <li><img src="<?=$siteAyarResult['siteUrl']?>_adminPanelim/<?=$sliderMarka['brandImage']?>" alt="<?=$sliderMarka['brandName'];?>">
                <div class="title_caption"><a href="<?=$siteAyarResult['siteUrl']?>markalar-<?=seo($sliderMarka['brandName']).'-'.$sliderMarka['id'];?>"><?=$sliderMarka['brandName']?> Yedek Parça Listesini Görmek İçin Tıklayın...</a></div>
              </li>
              <?php }?>
             
             
            </ul>
          </div>
        </div>
    -->