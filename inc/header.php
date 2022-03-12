 <header id="header">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="<?php echo $siteAyarResult['siteUrl']; ?>">
            <img src="<?php echo $siteAyarResult['siteUrl']; ?>_adminPanelim/<?php echo $siteAyarResult['siteLogo']; ?>" alt="<?php echo $siteAyarResult['siteTitle']; ?>"></a></div>
          <div class="header_bottom_right"><a href="#"></a></div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <div class="input-group col-md-6 col-xs-12 pull-right" style="margin-top:50px; color:gray; background-color:#eee; padding:10px; border-radius:5px; opacity:0.8">
        <div>
            <label class="from-control"><i class="fa fa-user"></i> Ziyaretçi :</label>
            <label class="from-control"  style="color:gray;"> <strong>1</strong></label>
        </div>
        <div>
            <label class="from-control"><i class="fa fa-group"></i> Toplam Ziyaretçi :</label>
            <label class="from-control"  style="color:gray;"> <strong>10</strong></label>
        </div>
        </div>

      </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
       <div class="input-group col-md-6 pull-right col-xs-12" style="margin-top:2px;margin-bottom:2px;">
        <form role="form" action="arama" method="post">
          <div class="input-group">

              <input type="text" class="form-control" name="arananUrun" placeholder="Arama.."/>
                                                        <span class="form-group input-group-btn">
                <button class="btn btn-warning" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Ara
                </button>
              </span>
          </div>
         </form>
        
        </div>
        
       </div>

     
      

      
       
    </div>
  </header>