
<div class="container">
  <div class="row">
      <div class="col-md-12 col-sm-12 top-link">
          <a href="<?php echo URL; ?>">Majsteria</a> » <a href="<?php echo URL; ?>znajdz/all">Kategorie</a> <span>» <a href="<?php echo URL . 'znajdz/' . $this->subcategory->seo_url; ?>"><?php echo $this->subcategory->name; ?></a></span>
        </div>
    </div>
</div>
<?php /* TOP BANNER
<div class="container">
  <div class="row">
      <div class="col-md-12 col-sm-12 cat-banner">
          <img src="<?php echo URL; ?>public/images/top-banner.png" class="img-responsive" alt="top-banner"> 
            <button class="btn btn-default navbar-btn cat-banner-btn banner-button" type="button">Wyceń koszty »</button>
        </div>
    </div>
</div>
    */ ?>
<div class="container">
  <div class="row">
      <div class="col-md-9 col-sm-9">
         <?php /*   <div class="col-md-12 col-sm-12 padd-null category-top">
          <hr>
          <h1> Wszystko co musisz wiedzieć o zatrudnieniu 
                <?php echo $this->subcategory->specialist_name; ?> </h1>
          <hr>
        </div> */ ?>
 
          <?php echo $this->subcategory->content; ?>

          <div class="col-md-12 col-sm-12 category-shadow"> <img class="img-responsive" src="<?php echo URL; ?>public/images/shadow.png" alt=""> </div>
          <a name="get_quotes"></a>
          <div class="col-md-12 col-sm-12 category-mid-sec padd-null">
        <div class="col-md-12 col-sm-12 category-head padd-null">
              <h1>Znalezienie <?php echo $this->subcategory->specialist_name; ?> nigdy nie było tak proste</h1>
            </div>
        <div class="col-md-4 col-sm-4 padd-null category-mid">
              <div class="center-block shape-no1">
          <p id="digits">1</p>
          </div>
              <div class="center-block"> <img src="<?php echo URL; ?>public/images/first.png" class="img-responsive center-block">
            <p>Powiedz czego potrzebujesz</p>
          </div>
            </div>
        <div class="col-md-4 col-sm-4 padd-null category-mid">
              <div class="center-block shape-no1">
          <p id="digits">2</p>
          </div>
              <div class="center-block"> <img src="<?php echo URL; ?>public/images/second.png" class="img-responsive center-block">
            <p>Wykonawcy z kategorii <?php echo $this->subcategory->name; ?> kontaktują się z Tobą</p>
          </div>
            </div>
        <div class="col-md-4 col-sm-4 padd-null">
              <div class="center-block shape-no1">
          <p id="digits">3</p>
          </div>
              <div class="center-block category-mid1"> <img src="<?php echo URL; ?>public/images/third.png" class="img-responsive center-block">
            <p>Wybór najlepszej oferty z dziedziny <?php echo $this->subcategory->specialist_name; ?></p>
          </div>
            </div>
      </div>
          <div class="col-md-12 col-sm-12 category-shadow"> <img class="img-responsive" src="<?php echo URL; ?>public/images/shadow.png" alt=""> </div>
        </div>
        
      <div class="col-md-3 col-sm-3 padd-null">
        <?php /*
            <div class="col-md-12 col-sm-12 padd-null right-pannel-first">
            <div class="col-md-12 col-sm-12 padd-null pannel-inner">
                  <h3> Use our directory to find local Air Conditioning Installers </h3>
              </div>
              <ul id="air">
              <li><a href="#">» Air Conditioning Sydney</a></li>
              <li><a href="#">» Air Conditioning NSW</a></li>
              <li><a href="#">» Air Conditioning Melbourne</a></li>
              <li><a href="#">» Air Conditioning Victoria</a></li>
              <li><a href="#">» Air Conditioning Brisbane</a></li>
              <li><a href="#">» Air Conditioning Queensland</a></li>
              <li><a href="#">» Air Conditioning Adelaide</a></li>
              <li><a href="#">» Air Conditioning South Australia</a></li>
              <li><a href="#">» Air Conditioning Perth</a></li>
              <li><a href="#">» Air Conditioning WA</a></li>
              <li><a href="#">» Air Conditioning Canberra</a></li>
              <li><a href="#">» Air Conditioning ACT</a></li>
              <li><a href="#">» Air Conditioning Darwin</a></li>
              <li><a href="#">» Air Conditioning Northern Territory</a></li>
              <li><a href="#">» Air Conditioning Hobart</a></li>
            </ul>
          </div>      
          <div class="col-md-12 col-sm-12 padd-null">
               <div class=" col-md-12 col-sm-12 search-style">
                  <div class="form-group">
                      <label>or enter your location to search
                        <input type="name" class="form-control" placeholder="Enter suburb or postcode">
                        <button type="submit" class="btn btn-default">Search</button>
                      </label>
                    </div>
                 </div>
            </div>
            <div class="col-md-12 col-sm-12 padd-null right-pannel-first1">
            <div class="col-md-12 col-sm-12 padd-null pannel-inner1">
                  <h3>Related Categories for Air Conditioning</h3>
              </div>
                  <ul id="air1">
                    <li><a href="#">» Ducted Air Conditioning</a></li>
                    <li><a href="#">» Evaporative Cooling Air Conditioning</a></li>
                    <li><a href="#">» Air Conditioning Installation</a></li>
                    <li><a href="#">» Refrigeration Air Conditioning</a></li>
                    <li><a href="#">» Air Conditioning Repair</a></li>
                    <li><a href="#">» Reverse Cycle Air Conditioning</a></li>
                  </ul>
                  <button type="submit" class="btn btn-default pull-right show-cat-btn">Show more</button>
          </div>
            
            <div class="col-md-12 col-sm-12 padd-null right-pannel-first1">
            <div class="col-md-12 col-sm-12 padd-null pannel-inner1">
                  <h3>Associations</h3>
              </div>
                  <ul id="air1">
                    <li><a href="#">» Australian Refrigeration Council Ltd</a></li>
                  </ul>
          </div>
            
            <div class="col-md-12 col-sm-12 padd-null right-pannel-first1">
            <div class="col-md-12 col-sm-12 padd-null pannel-inner1">
                  <h3>Featured Articles</h3>
                    <h4>Related Air Conditioners Articles</h4>
              </div>
                  <ul id="air1">
                    <li><a href="#">» How Much Does Ducted Air Con Cost?</a></li>
                    <li><a href="#">» Guide to Ducted Air Conditioning Prices</a></li>
                    <li><a href="#">» Ducted Air Con vs Split Systems</a></li>
                    <li><a href="#">» Licensing for Air Con and Refrigeration</a></li>
                    <li><a href="#">» Ducted Air Conditioning Running Costs</a></li>
                    <li><a href="#">» How Does Solar Air Conditioning Work?</a></li>
                  </ul>
          </div>
            */ ?>
          <div class="col-md-12 col-sm-12 padd-null right-pannel-last">
              <div class="col-md-12 col-sm-12 padd-null pannel-last">
                      <h3>Otrzymaj bezpłatne wyceny od <?php echo $this->subcategory->specialist_name; ?> </h3>
                </div>
              <img src="<?php echo URL; ?>public/images/hand.png" class="center-block right-pannel-last-img" width="58" height="79" alt="hand">
                <p>
                  1. Powiedz nam czego potrzebujesz w kategorii <?php echo $this->subcategory->specialist_name; ?> <br />
                  2. Najlepiej pasujący wykonawcy z kategorii <?php echo $this->subcategory->name; ?> kontaktują się z Tobą <br />
                  3. Porównujesz oferty i wybierasz najlepszą, oszczędzając czas i pieniądze
                </p> 
                <center><a href="#get_quotes"><button type="button" class="btn btn-default blue-btn">DODAJ ZLECENIE »</button></a></center>
            </div>
        </div>
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <?php require VIEWS_PATH . '_templates/add_project_form.php'; ?>
        </div>
    </div>
</div>
